<?php
// 
require_once 'Zend/Json.php';
require_once (str_replace('/application/modules/default', '', dirname (dirname(__FILE__))) . '/tools/common.php');

class MemberController extends Zend_Controller_Action {
	public $model;
	
	/**
	 * 
	 */
	public function init() {
		
		$root_dir = dirname (dirname(__FILE__)) . '/';
		require_once $root_dir . 'models/IndexModel.php';
		$this->model = new IndexModel ();
		$ADMIN_TEMPLATE = $root_dir . '../../../themes/layout/';
		$this->view->header = htmlspecialchars($ADMIN_TEMPLATE . 'header.tpl', ENT_QUOTES);
		$this->view->footer = htmlspecialchars($ADMIN_TEMPLATE . 'footer.tpl', ENT_QUOTES);
		$this->view->list = htmlspecialchars($root_dir . '/views/index/list.tpl', ENT_QUOTES);
		$this->view->base = htmlspecialchars($root_dir, ENT_QUOTES);
		$this->view->playercreate = htmlspecialchars($root_dir . 'views/member/playercreate.tpl', ENT_QUOTES);
		$this->view->changepassword = htmlspecialchars($root_dir . 'views/member/changepassword.tpl', ENT_QUOTES);
		$this->view->createupdate = htmlspecialchars($root_dir . 'views/admin/updatecreate.tpl', ENT_QUOTES);
		$this->view->usercreate = htmlspecialchars($root_dir . 'views/admin/usercreate.tpl', ENT_QUOTES);
		
		header("X-Content-Type-Options: nosniff");
		$authStorage = Zend_Auth::getInstance ()->getStorage ();
		if ($authStorage->isEmpty ()) {
			$loginid = null;
		} else {
			$loginid = get_object_vars(Zend_Auth::getInstance()->getIdentity());
		}
		
		if (is_null($loginid)) {
			$this->view->member = htmlspecialchars(false, ENT_QUOTES);
			$this->view->admin = htmlspecialchars(false, ENT_QUOTES);
			$this->view->username = htmlspecialchars('ようこそゲストさん', ENT_QUOTES);
		} else {
			if ($loginid['user_control'] === 'administrator') {
				$this->view->member = htmlspecialchars(true, ENT_QUOTES);
				$this->view->admin = htmlspecialchars(true, ENT_QUOTES);
			} else {
				$this->view->member = htmlspecialchars(true, ENT_QUOTES);
				$this->view->admin = htmlspecialchars(false, ENT_QUOTES);
			}
			$this->view->username = htmlspecialchars('あなたは' . $loginid['user_name'] . 'としてログインしています。', ENT_QUOTES);
		}
	}
	
	public function indexAction() {
		$this->logincheck ( 'member', $this );
		$this->view->member = htmlspecialchars(true, ENT_QUOTES);
		$params = $this->getRequest ()->getParams ();
	
		if (!array_key_exists('search_player_name', $params)){
			// init
			$this->view->search_player_name = htmlspecialchars(null, ENT_QUOTES);
			$this->view->search_rate_up = htmlspecialchars(null, ENT_QUOTES);
			$this->view->search_rate_down = htmlspecialchars(null, ENT_QUOTES);
		}
	
		$this->view->title = htmlspecialchars('プレイヤー一覧(編集可能)', ENT_QUOTES);
		$this->view->ratesearch = htmlspecialchars(dirname ( dirname ( __FILE__ ) ) . '/views/index/ratesearch.tpl', ENT_QUOTES);
		$this->view->playeredit = htmlspecialchars(dirname (dirname(__FILE__)) . '/' . 'views/member/playerinfo.tpl', ENT_QUOTES);
	}
	
	public function playerdetailAction() {
		$params = $this->getRequest()->getParams();
		Detail($params, $this);
		$this->view->title = htmlspecialchars('プレイヤー詳細情報', ENT_QUOTES);
	}
	
	public function gamemanageAction() {
		$this->logincheck ( 'member', $this );
		$this->view->member = htmlspecialchars(true, ENT_QUOTES);
		$games = $this->model->getList('gamelog', '1', 'game_status', null);
		
		$this->view->title = 'ゲームの編集';
		$this->view->games = $games;
		$this->view->gamereport = htmlspecialchars(dirname (dirname(__FILE__)) . '/' . 'views/member/gamereport.tpl', ENT_QUOTES);
	}
	
	public function userreportAction() {
		$lgnchk = $this->logincheck ( 'member', $this );
		if(!$lgnchk) {
			return false;
		}
		$params = $this->getRequest ()->getParams ();
		
		$id = $params['gamelog_id'];
		$game = $this->model->getInfo('gamelog', $id, null);
	
		$team1 = null;
		$team2 = null;
		$team1_member = 0;
		$team2_member = 0;
		$i = 1;
		$j = 1;
	
		foreach($game as $key => $value) {
			if($key === 'player'.$i.'_team' && !is_null($value)){
				if($value == 1){
					${'player'.$i.'_team'} = 1;
				} elseif(!is_null($value)) {
					${'player'.$i.'_team'} = 2;
				}
				$i++;
					
			} elseif($key === 'player'.$i.'_team'){
				$i++;
			}
	
			if($key === 'player'.$j.'_name' && !is_null($value)){
				if(${'player'.$j.'_team'} == 1){
					$team1['member_' . $team1_member] = htmlspecialchars($value, ENT_QUOTES);
					$team1_member++;
				} elseif(!is_null($value)){
					$team2['member_' . $team2_member] = htmlspecialchars($value, ENT_QUOTES);
					$team2_member++;
				}
				$j++;
			} elseif ($key === 'player'.$j.'_name') {
				$j++;
			}
	
			$team1['num_member'] = $team1_member;
			$team2['num_member'] = $team2_member;
	
		}
	
		$tokenHandler = new Custom_Auth_Token;
		$this->view->token = Zend_Json::encode($tokenHandler->getToken('userreport'));
		$this->view->team1 =  Zend_Json::encode($team1);
		$this->view->team2 = Zend_Json::encode($team2);
	
		$this->view->item = Zend_Json::encode($game);
		$this->view->now = Zend_Json::encode(date('Y-m-d H:i:s'));
	}
	
	public function reportAction() {
		$this->logincheck ( 'member', $this );
		$params = $this->getRequest ()->getParams ();
		
		// Get token and tag from request for authentication
		$token = $params['token'];
		$tag = $params['action_tag'];
		
		// Validate token
		$tokenHandler = new Custom_Auth_Token();
		if (!$tokenHandler->validateToken($token,$tag)) {
			return $this->_forward ( 'passworderror' );
		}
		$this->view->result = htmlspecialchars(report($params, $this), ENT_QUOTES);
	
	}
	
	public function usercancelAction() {
		$params = $this->getRequest ()->getParams ();
		$log = array (
				'gamelog_id' => $params ['game_id'],
				'game_status' => 2,
		);
	
		$result = $this->model->update('gamelog', $log);
		$this->view->result = htmlspecialchars($result, ENT_QUOTES);
	}
	
	public function editlistAction() {
		$params = $this->getRequest ()->getParams ();
		showlist($params, 'editlist', '0', $this);
	}
	
	public function playereditAction() {
		$id = $this->getRequest ()->id;
		$userinfo = $this->model->joinInfo('player', array('rate'), $id, 'delete_flag', '0');
		
		$tokenHandler = new Custom_Auth_Token;
		$this->view->token = $tokenHandler->getToken('playeredit');
		
		$this->view->json = Zend_Json::encode($userinfo);
	}
	
	public function playerupdateAction() {
		$lgnchk = $this->logincheck ( 'member', $this );
		if(!$lgnchk) {
			return false;
		}
		$this->logincheck ( 'member', $this );
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
			return $this->_forward ( 'passworderror' );
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
						'player_name' => $params ['player_name_edit'],
						'memo' => $params ['memo_edit'],
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
			return $this->_forward ( 'error' );
		}
		$this->view->result = htmlspecialchars($result, ENT_QUOTES);
	
	}
	
	public function playercreateAction() {
		
	}
	
	public function playerinsertAction() {
		$lgnchk = $this->logincheck ( 'member', $this );
	if(!$lgnchk) {
			return false;
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
			return $this->_forward ( 'passworderror' );
		}
		$loginid = get_object_vars(Zend_Auth::getInstance()->getIdentity());
	
		$ndc = $this->model->NameDuplicateCheck ( 'player', 'player_name', "'" . $params ['player_name'] . "'" );
		if ($ndc) {
	
			$db->beginTransaction();
	
			try {
				$rate_maxid = $this->model->getMaxID ( 'rate' ) + 1;
					
				$player = array (
						'rate_id' => $rate_maxid,
						'player_name' => $params ['player_name'],
						'memo' => $params ['memo'],
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
			return $this->_forward ( 'error' );
		}
	}
	
	public function playerdeleteAction() {
		$this->logincheck ( 'member', $this );
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
		$this->logincheck ( 'member', $this );
		$params = $this->getRequest ()->getParams ();
	
		if (!array_key_exists('search_player_name', $params)){
			// init
			$this->view->search_player_name = htmlspecialchars(null, ENT_QUOTES);
			$this->view->search_rate_up = htmlspecialchars(null, ENT_QUOTES);
			$this->view->search_rate_down = htmlspecialchars(null, ENT_QUOTES);
		}
	
		$this->view->title = htmlspecialchars('削除済みプレイヤー', ENT_QUOTES);
		$this->view->ratesearch = htmlspecialchars(dirname ( dirname ( __FILE__ ) ) . '/views/index/ratesearch.tpl', ENT_QUOTES);
	}
	
	public function deletedlistAction() {
		$this->logincheck ( 'member', $this );
		$params = $this->getRequest()->getParams();
		showlist($params, 'deletedlist', '1', $this);
	}
	
	public function playerrevertAction() {
		$this->logincheck ( 'member', $this );
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
	
	public function passwordupdateAction() {
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
			return $this->_forward ( 'passworderror' );
		}
		
		$loginid = get_object_vars(Zend_Auth::getInstance()->getIdentity());
		if ($params['user_id_password'] != $loginid['user_id'] 
			|| $params['user_name_password'] != $loginid['user_name']) {
			return $this->_forward ( 'passworderror' );
		}
		$db->beginTransaction();
		
		try {
			$user = array (
					'user_id' => $loginid ['user_id'],
					'user_name' => $loginid ['user_name'],
					'user_password' => md5($params ['change_password']),
					'last_editor' => $loginid['user_name'],
					'updated_on' => NULL
			);
			
			$result = $this->model->update ('user', $user);

			$user_log = array(
					'edited_user_id' => $loginid ['user_id'],
					'new_name' => $loginid ['user_name'],
					'memo' => 'edited password by user',
					'new_control' => $loginid['user_control'],
					'user_id' => $loginid['user_id']
			);
			$result2 = $this->model->insert ( 'user_editlog', $user_log );
			$db->commit();
		}  catch (Exception $e) {
			$db->rollBack();
			echo $e->getMessage();
		}
			
		$this->view->result = htmlspecialchars($result, ENT_QUOTES);
	}
	
	public function manualAction() {
		$this->view->title = htmlspecialchars('権限者用取説', ENT_QUOTES);
	}
	
	public function loginAction() {
		$this->view->title = htmlspecialchars('ログイン画面', ENT_QUOTES);
	}
	
	public function logoutAction() {
		$this->model->Logout();
		$this->view->title = htmlspecialchars('ログアウトしました。', ENT_QUOTES);
	}
	
	public function editpasswordAction() {
		$loginid = get_object_vars(Zend_Auth::getInstance()->getIdentity());
	
		$user_id = $loginid['user_id'];
		$user_name = $loginid['user_name'];
		
		$tokenHandler = new Custom_Auth_Token;
		$this->view->token = htmlspecialchars($tokenHandler->getToken('editpassword'), ENT_QUOTES);
		
		$this->view->user_id = htmlspecialchars($user_id, ENT_QUOTES);
		$this->view->user_name = htmlspecialchars($user_name, ENT_QUOTES);
	}
	
	public function monthlyrateeditAction() {
		$this->logincheck ( 'member', $this );
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
	
	public function replaymanageAction(){
		$where = 'replay_id is not null';
		$sort = 'gamelog_id DESC';
		$games = $this->model->searchList('gamelog', $where, null, null, $sort);
	
		$result = TeamDevide($games);
		
		$paginator = Zend_Paginator::factory($games);
		
		// set maximum items to be displayed in a page
		$perpage = 5;
		$paginator->setItemCountPerPage($perpage);
		$paginator->setCurrentPageNumber($this->_getParam('page'));
		$pages = $paginator->getPages();
		$pageArray = get_object_vars($pages);
		
		$this->view->pages = $pageArray;
		$this->view->perpage = $perpage;
		$this->view->title = "リプレイの管理";
		$this->view->games = $paginator->getIterator();
		$this->view->team1 = $result[0];
		$this->view->team2 = $result[1];
	}
	
	public function replaydeleteAction() {
		$params = $this->getRequest()->getParams();
		
		$data = array (
				'gamelog_id' => $params ['gamelog_id'],
				'replay_id' => null
		);
		$result = $this->model->update ( 'gamelog', $data );
		$data_dir = str_replace('/application/modules/default', '', dirname (dirname(__FILE__))) . '/data/replay/';
		unlink($data_dir.$params['replay_id'].'.html');
	}
	
	protected function logincheck($mode) {
		$authStorage = Zend_Auth::getInstance ()->getStorage ();
		if ($authStorage->isEmpty ()) {
			return $this->_forward ( 'login', $mode );
			return false;
		}
	
		return true;
	}
	
	
	public function authAction() {
		try {
			$username = $this->getRequest ()->getParam ( 'user_name' );
			$password = $this->getRequest ()->getParam ( 'user_password' );
	
			$logininfo = $this->model->LoginAuthentication ( $username, $password );
	
			$auth = Zend_Auth::getInstance ();
			if ($auth->hasIdentity ()) {
				$result = "login was successful.";
				$loginid = Zend_Auth::getInstance ()->getIdentity ();
	
				$this->view->login = htmlspecialchars(true, ENT_QUOTES);
			} else {
				$result = "login failed";
				$this->view->login = htmlspecialchars(false, ENT_QUOTES);
			}
			
			loginlog($username, $auth, $this);
			
			$this->view->title = htmlspecialchars('ログイン', ENT_QUOTES);
			$this->view->result = htmlspecialchars($result, ENT_QUOTES);
		} catch ( Exception $e ) {
			$this->displayError ( $e );
		}
	}
	
	public function errorAction() {
	}
	
	public function passworderrorAction() {
		
	}
	
	public function inittokenerAction() {
		$tokenHandler = new Custom_Auth_Token;
		$this->view->inittoken = htmlspecialchars($tokenHandler->getToken('init'));
	}
}
?>