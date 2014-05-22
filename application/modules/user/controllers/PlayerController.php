<?php
require_once 'Zend/Json.php';
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/common.php');
class User_PlayerController extends Zend_Controller_Action {
	public $model;

	/**
	 *
	 */
	public function init() {
		$root_dir = dirname(dirname(dirname(__FILE__))) . '/';
		require_once ($root_dir . 'default/models/IndexModel.php');
		$this->model = new IndexModel ();
		initPage($this, '/application/modules/');
	}
	
	public function playereditAction() {
		$id = $this->getRequest ()->id;
		$userinfo = $this->model->joinInfo('player', array('rate'), $id, 'delete_flag', '0');
	
		$tokenHandler = new Custom_Auth_Token;
		$this->view->token = $tokenHandler->getToken('playeredit');
	
		$this->view->json = Zend_Json::encode($userinfo);
	}
	
	public function playerupdateAction() {
		$lgnchk = logincheck ( 'user', $this );
		if(!$lgnchk) {
			return $this->_forward ( 'erroruser', 'index', 'error' );
		}
		$adapter = dbadapter ();
		$param = dbconnect ();
	
		$db = Zend_Db::factory ( $adapter, $param );
		$params = $this->getRequest()->getParams();
	
		// Get token and tag from request for authentication
		$token = $params['token'];
		$tag = $params['action_tag'];
	
		// Validate token
		$tokenHandler = new Custom_Auth_Token();
		if (!$tokenHandler->validateToken($token,$tag)) {
			return $this->_forward ( 'passworderror', 'index', 'error' );
		}
	
		$loginid = get_object_vars (Zend_Auth::getInstance()->getIdentity());
	
		$target_info = $this->model->joinInfo ('player', array('rate'), $params ['player_id_edit'], 'delete_flag', '0');
	
		if ($params ['player_name_edit'] != $target_info ['player_name']) {
			$ndc = $this->model->NameDuplicateCheck ( 'player', 'player_name', "'" . $params ['player_name_edit'] ."'" );
		} else {
			$ndc = true;
		}
	
		if ($ndc) {
			$db->beginTransaction();
	
			try {
				$player = array (
						'player_id' => $params ['player_id_edit'],
						'steam_id' => $params['steam_id_edit'],
						'player_name' => $params ['player_name_edit'],
						'memo' => $params ['memo_edit'],
						'warn_flag' => $params['warn_flag_edit'],
						'delete_flag' => $params ['delete_flag_edit'],
						'last_editor' => $loginid['user_name'],
						'updated_on' => NULL
				);
	
				$result = $this->model->update ( 'player', $player );
	
				if($params['rate_edit'] > $target_info ['rate']) {
					$max_rate = $params['rate_edit'];
				} else {
					$max_rate = $target_info['rate'];
				}
	
				$rate = array (
						'rate_id' => $target_info ['rate_id'],
						'rate' => $params ['rate_edit'],
						'previous_rate' => $target_info['rate'],
						'max_rate' => $max_rate,
						'last_editor' => $loginid['user_name'],
						'updated_on' => NULL
				);
	
				$result2 = $this->model->update ( 'rate', $rate );
	
				$rate_log = array(
						'edited_player_id' => $params ['player_id_edit'],
						'edited_rate_id' => $target_info['rate_id'],
						'previous_name' => $target_info['player_name'],
						'previous_rate' => $target_info['rate'],
						'new_rate' => $params['rate_edit'],
						'previous_status' => $target_info['delete_flag'],
						'new_status' => $params['delete_flag_edit'],
						'previous_memo' => $target_info['memo'],
						'new_memo' => $params['memo_edit'],
						'user_id' => $loginid['user_id']
				);
	
				$result3 = $this->model->insert ( 'rate_editlog', $rate_log );
				$db->commit();
	
			}  catch (Exception $e) {
				$db->rollBack();
				echo $e->getMessage();
			}
	
		} else {
			return $this->_forward ( 'error', 'index', 'error' );
		}
		$this->view->result = htmlspecialchars($result, ENT_QUOTES);
	
	}
	
	public function playercreateAction() {
	
	}
	
	public function playerinsertAction() {
		$lgnchk = logincheck ( 'user', $this );
		if(!$lgnchk) {
			return $this->_forward ( 'erroruser', 'index', 'error' );
		}
		$adapter = dbadapter ();
		$params = dbconnect ();
	
		$db = Zend_Db::factory ( $adapter, $params );
		$params = $this->getRequest ()->getParams ();
	
		// Get token and tag from request for authentication
		$token = $params['token'];
		$tag = $params['action_tag'];
	
		// Validate token
		$tokenHandler = new Custom_Auth_Token();
		if (!$tokenHandler->validateToken($token,$tag)) {
			return $this->_forward ( 'passworderror', 'index', 'error' );
		}
		$loginid = get_object_vars(Zend_Auth::getInstance()->getIdentity());
	
		$ndc = $this->model->NameDuplicateCheck ( 'player', 'player_name', "'" . $params ['player_name'] . "'" );
		if ($ndc) {
	
			$db->beginTransaction();
	
			try {
				$rate_maxid = $this->model->getMaxID ( 'rate' ) + 1;
					
				$player = array (
						'rate_id' => $rate_maxid,
						'steam_id' => $params['steam_id'],
						'player_name' => $params ['player_name'],
						'memo' => $params ['memo'],
						'warn_flag' => $params['warn_flag'],
						'delete_flag' => $params ['delete_flag'],
						'last_editor' => $loginid['user_name'],
						'created_on' => date('c')
				);
				$result = $this->model->insert ( 'player', $player );
	
				$this->view->result = htmlspecialchars($result, ENT_QUOTES);
	
				$rate = array (
						'rate' => $params ['rate'],
						'previous_rate' => $params['rate'],
						'max_rate' => $params['rate'],
						'last_editor' => $loginid['user_name'],
						'created_on' => date('c')
				);
	
				$result2 = $this->model->insert ( 'rate', $rate );
	
				$player_maxid = $this->model->getMaxID ( 'player' );
	
				$rate_log = array(
						'edited_player_id' => $player_maxid,
						'edited_rate_id' => $rate_maxid,
						'previous_rate' => 1600,
						'new_rate' => $params['rate'],
						'user_id' => $loginid['user_id']
				);
	
				$result3 = $this->model->insert ( 'rate_editlog', $rate_log );
	
				$db->commit();
	
			}  catch (Exception $e) {
				$db->rollBack();
				echo $e->getMessage();
			}
	
		} else {
			return $this->_forward ( 'error', 'index', 'error' );
		}
	}
	
	public function playerdeleteAction() {
		if(!logincheck ( 'user', $this )){
			$this->_forward('login', 'index', 'user');
		}
		$adapter = dbadapter ();
		$params = dbconnect ();
	
		$db = Zend_Db::factory ( $adapter, $params );
		$params = $this->getRequest ()->getParams ();
		$loginid = get_object_vars(Zend_Auth::getInstance()->getIdentity());
	
		$db->beginTransaction();
	
		try {
			$data = array (
					'player_id' => $params ['id'],
					'last_editor' => $loginid['user_name'],
					'delete_flag' => 1,
					'updated_on' => NULL
			);
			$result = $this->model->update ( 'player', $data );
				
			$rate_log = array(
					'edited_player_id' => $params ['id'],
					'previous_rate = new_rate',
					'previous_status' => 0,
					'new_status' => 1,
					'user_id' => $loginid['user_id']
			);
			$result2 = $this->model->insert ( 'rate_editlog', $rate_log );
			$db->commit();
				
		}  catch (Exception $e) {
			$db->rollBack();
			echo $e->getMessage();
		}
	
		$this->view->result = htmlspecialchars($result, ENT_QUOTES);
	}
	
	public function playerdeletedAction() {
		if(!logincheck ( 'user', $this )){
			$this->_forward('login', 'index', 'user');
		}
		$params = $this->getRequest ()->getParams ();
	
		if (!array_key_exists('search_player_name', $params)){
			// init
			$this->view->search_player_name = htmlspecialchars(null, ENT_QUOTES);
			$this->view->search_rate_up = htmlspecialchars(null, ENT_QUOTES);
			$this->view->search_rate_down = htmlspecialchars(null, ENT_QUOTES);
			$this->view->search_game_number = htmlspecialchars(null, ENT_QUOTES);
		}
	
		$this->view->title = htmlspecialchars('削除済みプレイヤー', ENT_QUOTES);
		$this->view->ratesearch = htmlspecialchars(dirname ( dirname ( dirname ( __FILE__ ) ) ) . '/default/views/player/ratesearch.tpl', ENT_QUOTES);
	}
	
	public function deletedlistAction() {
		if(!logincheck ( 'user', $this )){
			$this->_forward('login', 'index', 'user');
		}
		$params = $this->getRequest()->getParams();
		showlist($params, 'deletedlist', '1', $this);
	}
	
	public function playerrevertAction() {
		if(!logincheck ( 'user', $this )){
			$this->_forward('login', 'index', 'user');
		}
		$adapter = dbadapter ();
		$params = dbconnect ();
	
		$db = Zend_Db::factory ( $adapter, $params );
		$params = $this->getRequest ()->getParams ();
		$loginid = get_object_vars(Zend_Auth::getInstance()->getIdentity());
	
		$db->beginTransaction();
	
		try {
			$data = array (
					'player_id' => $params ['id'],
					'last_editor' =>  $loginid['user_name'],
					'delete_flag' => 0,
					'updated_on' => NULL
			);
			$result = $this->model->update ( 'player', $data );
				
			$rate_log = array(
					'edited_player_id' => $params ['id'],
					'prebious_rate = new_rate',
					'previous_status' => 1,
					'new_status' => 0,
					'user_id' => $loginid['user_id']
			);
			$result2 = $this->model->insert ( 'rate_editlog', $rate_log );
			$db->commit();
		}  catch (Exception $e) {
			$db->rollBack();
			echo $e->getMessage();
		}
		$this->view->result = htmlspecialchars($result, ENT_QUOTES);
	}
	
	public function commentlistAction() {
		if(!logincheck ( 'user', $this )){
			$this->_forward('login', 'index', 'user');
		}
		$comments = $this->model->joinList('player_note', array('player'), 'player_note.delete_flag', '0', 'player_note_id DESC', 'player_note.created_on as posted_date');
	
		$paginator = Zend_Paginator::factory($comments);
	
		// set maximum items to be displayed in a page
		$paginator->setItemCountPerPage(20);
		$paginator->setCurrentPageNumber($this->_getParam('page'));
		$pages = $paginator->getPages();
		$pageArray = get_object_vars($pages);
	
		$this->view->pages = $pageArray;
		$this->view->comments = $paginator->getIterator ();
	
		$this->view->title = htmlspecialchars('プレイヤーコメントリスト', ENT_QUOTES);
	}
	
	public function commentdeleteAction() {
		if(!logincheck ( 'user', $this )){
			$this->_forward('login', 'index', 'user');
		}
		$params = $this->getRequest ()->getParams ();
	
		$loginid = get_object_vars(Zend_Auth::getInstance()->getIdentity());
	
		$data = array (
				'player_note_id' => $params ['id'],
				'edit_user_id' => $loginid['user_id'],
				'delete_flag' => 1,
				'updated_on' => NULL
		);
		$result = $this->model->update ( 'player_note', $data );
	
		$this->view->result = htmlspecialchars($result, ENT_QUOTES);
	}
	
	public function commentdeletedAction() {
		if(!logincheck ( 'user', $this )){
			$this->_forward('login', 'index', 'user');
		}
		$comments = $this->model->joinList('player_note', array('player'), 'player_note.delete_flag', '1', 'player_note_id DESC', 'player_note.updated_on as edited_date');
		$paginator = Zend_Paginator::factory($comments);
	
		// set maximum items to be displayed in a page
		$paginator->setItemCountPerPage(20);
		$paginator->setCurrentPageNumber($this->_getParam('page'));
		$pages = $paginator->getPages();
		$pageArray = get_object_vars($pages);
	
		$this->view->pages = $pageArray;
		$this->view->comments = $paginator->getIterator ();
	
		$this->view->title = htmlspecialchars('削除済みプレイヤーコメント', ENT_QUOTES);
	}
	
	
	public function commentrevertAction() {
		if(!logincheck ( 'user', $this )){
			$this->_forward('login', 'index', 'user');
		}
		$params = $this->getRequest ()->getParams ();
	
		$loginid = get_object_vars(Zend_Auth::getInstance()->getIdentity());
	
		$data = array (
				'player_note_id' => $params ['id'],
				'edit_user_id' =>  $loginid['user_id'],
				'delete_flag' => 0,
				'updated_on' => NULL
		);
		$result = $this->model->update ( 'player_note', $data );
	
		$this->view->result = htmlspecialchars($result, ENT_QUOTES);
	}
	
	public function monthlyrateeditAction() {
		if(!logincheck ( 'user', $this )){
			$this->_forward('login', 'index', 'user');
		}
		$join_table = array('player', 'rate', 'user');
		$join_columns = array('player', 'rate', 'user');
		$module_columns = array('edited_player', 'edited_rate', 'user');
		$today = date("Y-m-d H:i:s");
		$lastmonth = date("Y-m-d H:i:s",strtotime("-1 month"));
		$where = "edited_on >= '$lastmonth'";
		$sort = 'edited_on DESC';
	
		$players = $this->model->getCustomJoin('rate_editlog', $join_table, $join_columns, $module_columns, $where, null, null, $sort, null);
		$this->view->title = htmlspecialchars('今月のレート変更', ENT_QUOTES);
		$this->view->items = $players;
	}
}