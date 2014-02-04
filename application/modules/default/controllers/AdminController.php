<?php
// 
require_once 'Zend/Json.php';
require_once (str_replace('/application/modules/default', '', dirname (dirname(__FILE__))) . '/tools/common.php');

class AdminController extends Zend_Controller_Action {
	public $model;
	
	/**
	 * 
	 */
	public function init() {
		$root_dir = dirname (dirname(__FILE__)) . '/';
		require_once htmlspecialchars($root_dir . 'models/IndexModel.php', ENT_QUOTES);
		$this->model = new IndexModel ();
		$ADMIN_TEMPLATE = htmlspecialchars($root_dir . '../../../themes/layout/', ENT_QUOTES);
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
		$this->admincheck ( 'admin' );
		$this->view->member = htmlspecialchars(true, ENT_QUOTES);
		$this->view->admin = htmlspecialchars(true, ENT_QUOTES);
		$today = date("Y-m-d H:i:s");
		$yesterday = date("Y-m-d H:i:s",strtotime("-1 day"));
		
		$where = "created_on >= '$yesterday'";
		$games = $this->model->searchList('gamelog', $where, null, null, null);
		$this->view->games = $games;
		$this->view->title = htmlspecialchars('鯖管理者専用インデックス', ENT_QUOTES);
	}
	
	public function userlistAction() {
		$this->admincheck ( 'admin' );
		$this->view->member = htmlspecialchars(true, ENT_QUOTES);
		$this->view->admin = htmlspecialchars(true, ENT_QUOTES);
		$user = $this->model->getList('user', '0', 'delete_flag', null);
		
		$this->view->userinfo = htmlspecialchars(dirname (dirname(__FILE__)) . '/' . 'views/admin/userinfo.tpl', ENT_QUOTES);
		$this->view->title = htmlspecialchars('ユーザー編集', ENT_QUOTES);
		$this->view->items = $user;
	}
	
	public function usereditAction() {
		$id = $this->getRequest ()->id;
		$userinfo = $this->model->getInfo ('user', $id, null);
	
		$tokenHandler = new Custom_Auth_Token;
		$this->view->token = htmlspecialchars($tokenHandler->getToken('useredit'), ENT_QUOTES);
		$this->view->item = Zend_Json::encode($userinfo);
	}
	
	public function userupdateAction() {
		$lgnchk = $this->admincheck ( 'admin' );
		if(!$lgnchk) {
			return false;
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
			return $this->_forward ( 'erroradmin' );
		}
	
		$loginid = get_object_vars (Zend_Auth::getInstance()->getIdentity());
		
		$target_info = $this->model->getInfo ('user', $params['user_id'], null);
		
		if ($params ['user_name'] != $target_info ['user_name']) {
			$ndc = $this->model->NameDuplicateCheck ( 'user', 'user_name', "'" . $params ['user_name'] ."'" );
		} else {
			$ndc = true;
		}
		
		if ($ndc) {
			$db->beginTransaction();
				
			try {
				$user = array (
						'user_id' => $params ['user_id'],
						'user_name' => $params ['user_name'],
						'user_password' => $params ['user_password'],
						'user_control' => $params ['user_control'],
						'delete_flag' => $params ['delete_flag'],
						'last_editor' => $loginid['user_name'],
						'updated_on' => NULL
				);
				$result = $this->model->update ( 'user', $user );
				
				$user_maxid = $this->model->getMaxID ( 'user' );
				
				$user_log = array(
						'edited_user_id' => $user_maxid,
						'previous_name' => $target_info['user_name'],
						'new_name' => $params['user_name'],
						'previous_control' => $target_info['user_control'],
						'new_control' => $params['user_control'],
						'memo' => 'edited user information by administrator',
						'user_id' => $loginid['user_id']
				);
	
				$result2 = $this->model->insert ( 'user_editlog', $user_log );
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
	
	public function usercreateAction() {
		$tokenHandler = new Custom_Auth_Token;
		$this->view->token = $tokenHandler->getToken('usercreate');
	}
	
	public function userinsertAction() {
		$lgnchk = $this->admincheck ( 'admin' );
		if(!$lgnchk) {
			return false;
		}
		
		$adapter = dbadapter ();
		$param = dbconnect ();
		
		$db = Zend_Db::factory ( $adapter, $param );
		$params = $this->getRequest ()->getParams ();
		
		// Get token and tag from request for authentication
		$token = $params['token'];
		$tag = $params['action_tag_user'];
		
		// Validate token
		$tokenHandler = new Custom_Auth_Token();
		if (!$tokenHandler->validateToken($token,$tag)) {
			return $this->_forward ( 'erroradmin' );
		}
		
		$loginid = get_object_vars(Zend_Auth::getInstance()->getIdentity());
	
		$ndc = $this->model->NameDuplicateCheck ( 'user', 'user_name', "'" . $params ['user_name_insert'] . "'" );
		if ($ndc) {
	
			$db->beginTransaction();
			try {
				$password = md5($params ['user_password_insert']);
				$user = array (
						'user_name' => $params ['user_name_insert'],
						'user_password' => $password,
						'user_control' => $params ['user_control'],
						'delete_flag' => $params ['delete_flag'],
						'last_editor' => $loginid['user_name'],
						'created_on' => date('c')
				);
				$result = $this->model->insert ( 'user', $user );
	
				$this->view->result = htmlspecialchars($result, ENT_QUOTES);
	
				$user_maxid = $this->model->getMaxID ( 'user' );
				
				$user_log = array(
						'edited_user_id' => $user_maxid,
						'new_name' => $params['user_name_insert'],
						'new_control' => $params['user_control'],
						'memo' => 'new user created',
						'user_id' => $loginid['user_id']
				);
				
				$result2 = $this->model->insert ( 'user_editlog', $user_log );
				$db->commit();
	
			}  catch (Exception $e) {
				$db->rollBack();
				echo $e->getMessage();
			}
				
		} else {
			return $this->_forward ( 'error' );
		}
	}
	
	public function userdeleteAction() {
		$adapter = dbadapter ();
		$params = dbconnect ();
		
		$db = Zend_Db::factory ( $adapter, $params );
		$params = $this->getRequest ()->getParams ();
		$loginid = get_object_vars(Zend_Auth::getInstance()->getIdentity());
		
		$db->beginTransaction();
		
		try {
			$data = array (
					'user_id' => $params ['id'],
					'last_editor' => $loginid['user_name'],
					'delete_flag' => 1,
					'updated_on' => NULL
			);
		
			$result = $this->model->update ( 'user', $data );
			
			$user_log = array(
					'edited_user_id' => $params ['id'],
					'new_name' => $loginid ['user_name'],
					'memo' => 'user deleted by administorator',
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
	
	public function deleteduserlistAction() {
		$this->admincheck ( 'admin' );
		$params = $this->getRequest ()->getParams ();
		$user = $this->model->getList('user', '1', 'delete_flag', null);
		
		$this->view->items = $user;
		$this->view->title = htmlspecialchars('削除済みユーザー一覧', ENT_QUOTES);
	}
	
	public function userrevertAction() {
		$adapter = dbadapter ();
		$params = dbconnect ();
		
		$db = Zend_Db::factory ( $adapter, $params );
		$params = $this->getRequest ()->getParams ();
		$loginid = get_object_vars(Zend_Auth::getInstance()->getIdentity());
	
		$db->beginTransaction();
		
		try {
			$data = array (
					'user_id' => $params ['id'],
					'last_editor' =>  $loginid['user_name'],
					'delete_flag' => 0,
					'updated_on' => NULL
			);
		
			$result = $this->model->update ( 'user', $data );
			
			$user_log = array(
					'edited_user_id' => $params ['id'],
					'memo' => 'reverted by administrator',
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
	
	public function playerdownloadAction() {
		$lgnchk = $this->admincheck ( 'admin' );
		if(!$lgnchk) {
			return false;
		}
		
		$recordset = $this->model->getAllList ( 'player' );
		CsvCreate ( 'player', $recordset );
	}
	
	public function ratedownloadAction() {
		$lgnchk = $this->admincheck ( 'admin' );
		if(!$lgnchk) {
			return false;
		}
		
		$recordset = $this->model->getAllList ( 'rate' );
		CsvCreate ( 'rate', $recordset );
	}
	
	public function gamelogdownloadAction() {
		$lgnchk = $this->admincheck ( 'admin' );
		if(!$lgnchk) {
			return false;
		}
		
		$recordset = $this->model->getAllList ( 'gamelog' );
		CsvCreate ( 'gamelog', $recordset );
	}
	
	public function rateeditlogdownloadAction() {
		$lgnchk = $this->admincheck ( 'admin' );
		if(!$lgnchk) {
			return false;
		}
		
		$recordset = $this->model->getAllList ( 'rate_editlog' );
		CsvCreate ( 'rateeditlog', $recordset );
	}
	
	public function updatedownloadAction() {
		$lgnchk = $this->admincheck ( 'admin' );
		if(!$lgnchk) {
			return false;
		}
		
		$recordset = $this->model->getAllList ( 'updatelog' );
		CsvCreate ( 'update', $recordset );
	}
	
	public function userdownloadAction() {
		$lgnchk = $this->admincheck ( 'admin' );
		if(!$lgnchk) {
			return false;
		}
		
		$recordset = $this->model->getAllList ( 'user' );
		CsvCreate ( 'user', $recordset );
	}
	
	public function usereditlogdownloadAction() {
		$lgnchk = $this->admincheck ( 'admin' );
		if(!$lgnchk) {
			return false;
		}
		
		$recordset = $this->model->getAllList ( 'user_editlog' );
		CsvCreate ( 'usereditlog', $recordset );
	}
	
	public function updatelogdownloadAction() {
		$lgnchk = $this->admincheck ( 'admin' );
		if(!$lgnchk) {
			return false;
		}
		
		$recordset = $this->model->getAllList ( 'updatelog' );
		CsvCreate ( 'updatelog', $recordset );
	}
	
	public function loginlogdownloadAction() {
		$lgnchk = $this->admincheck ( 'admin' );
		if(!$lgnchk) {
			return false;
		}
		
		$recordset = $this->model->getAllList ( 'loginlog' );
		CsvCreate ( 'loginlog', $recordset );
	}
	
	/*
	public function playeruploadAction() {
		$this->admincheck ( 'index' );
		$this->view->title = htmlspecialchars('プレイヤーアップロード', ENT_QUOTES);
	}
	public function playerprocessAction() {
		$uploadPath = str_replace ( "application/modules/default", "data", dirname ( dirname ( __FILE__ ) ) ) . '/csv/';
	
		$adapter = new Zend_File_Transfer_Adapter_Http ();
		$adapter->setDestination ( $uploadPath );
	
		if (! $adapter->receive ()) {
			$messages = $adapter->getMessages ();
			echo implode ( "\n", $messages );
		}
	
		$file = $adapter->getFileName ();
	
		$loadData = "LOAD DATA local INFILE '$file' ";
		$loadData .= "INTO TABLE player FIELDS TERMINATED BY ',' ENCLOSED BY '\"' IGNORE 1 LINES ";
	
		$loadData .= "(`rate_id`,`player_name`,`memo`,`delete_flag`)";
		
		$result = $this->model->load ( 'player', $loadData );
	
		$this->view->row = htmlspecialchars($result, ENT_QUOTES);
		$this->view->title = htmlspecialchars('プレイヤーアップロード', ENT_QUOTES);
	}
	*/
	
	public function updatecreateAction() {
		
	}
	
	public function updateupdateAction() {
		$lgnchk = $this->admincheck ( 'admin' );
		if(!$lgnchk) {
			return false;
		}
		
		$params = $this->getRequest ()->getParams ();
		
		// Get token and tag from request for authentication
		$token = $params['token'];
		$tag = $params['action_tag'];
		
		// Validate token
		$tokenHandler = new Custom_Auth_Token();
		if (!$tokenHandler->validateToken($token,$tag)) {
			return $this->_forward ( 'erroradmin' );
		}
		
		$log = array (
				'update_note' => $params ['update_note'],
				'delete_flag' => 0
		);
		$result = $this->model->insert ( 'updatelog', $log );
	
		$this->view->result = htmlspecialchars($result, ENT_QUOTES);
	}
	
	public function updatelistAction() {
		$this->admincheck ( 'admin' );
		$update = $this->model->getList('updatelog', '0', 'delete_flag', null);
	
		$this->view->updateinfo = htmlspecialchars(dirname (dirname(__FILE__)) . '/' . 'views/admin/updateinfo.tpl', ENT_QUOTES);
		$this->view->title = htmlspecialchars('アップデート編集', ENT_QUOTES);
		$this->view->items = $update;
	}
	
	public function updateeditAction() {
		$id = $this->getRequest ()->id;
		$updateinfo = $this->model->getInfo ('updatelog', $id, null);
	
		$tokenHandler = new Custom_Auth_Token;
		$this->view->token = htmlspecialchars($tokenHandler->getToken('updateedit'), ENT_QUOTES);
		$this->view->item = Zend_Json::encode($updateinfo);
	}
	
	public function updatechangeAction() {
		$lgnchk = $this->admincheck ( 'admin' );
		if(!$lgnchk) {
			return false;
		}
	
		$params = $this->getRequest()->getParams();
	
		// Get token and tag from request for authentication
		$token = $params['token_update'];
		$tag = $params['action_tag_updateedit'];
	
		// Validate token
		$tokenHandler = new Custom_Auth_Token();
		if (!$tokenHandler->validateToken($token,$tag)) {
			return $this->_forward ( 'erroradmin' );
		}
		
		$log = array (
				'updatelog_id' => $params ['updatelog_id'],
				'update_note' => $params ['update_note'],
				'delete_flag' => $params ['delete_flag_update']
		);
		$result = $this->model->update ( 'updatelog', $log );
	
		$this->view->result = htmlspecialchars($result, ENT_QUOTES);
	}
	
	public function deletedupdatelistAction() {
		$this->admincheck ( 'admin' );
		$params = $this->getRequest ()->getParams ();
		$user = $this->model->getList('updatelog', '1', 'delete_flag', null);
	
		$this->view->items = $user;
		$this->view->title = htmlspecialchars('削除済みアップデート一覧', ENT_QUOTES);
	}
	
	public function updaterevertAction() {
		$adapter = dbadapter ();
		$params = dbconnect ();
	
		$db = Zend_Db::factory ( $adapter, $params );
		$params = $this->getRequest ()->getParams ();
		$loginid = get_object_vars(Zend_Auth::getInstance()->getIdentity());
	
		$db->beginTransaction();
	
		try {
			$data = array (
					'updatelog_id' => $params ['id'],
					'delete_flag' => 0
			);
	
			$result = $this->model->update ( 'updatelog', $data );
			
			$db->commit();
		}  catch (Exception $e) {
			$db->rollBack();
			echo $e->getMessage();
		}
			
		$this->view->result = htmlspecialchars($result, ENT_QUOTES);
	}
	
	public function closedgamemanageAction() {
		$lgnchk = $this->admincheck ( 'admin' );
		
		$this->view->member = htmlspecialchars(true, ENT_QUOTES);
		$this->view->admin = htmlspecialchars(true, ENT_QUOTES);
		$games = $this->model->getList('gamelog', null, null, 'gamelog_id desc');
		$paginator = Zend_Paginator::factory ( $games );
		
		// set maximum items to be displayed in a page
		$paginator->setItemCountPerPage (20);
		$paginator->setCurrentPageNumber ( $this->_getParam ( 'page' ) );
		$pages = $paginator->getPages ();
		$pageArray = get_object_vars ( $pages );
		
		$this->view->pages = $pageArray;
		$this->view->items = $paginator->getIterator ();
		
		$this->view->changegamelog = htmlspecialchars(dirname (dirname(__FILE__)) . '/' . 'views/admin/changegamelog.tpl', ENT_QUOTES);
		$this->view->title = htmlspecialchars('終了したゲームの編集', ENT_QUOTES);
	}
	
	public function closedgameeditAction() {
		$params = $this->getRequest ()->getParams ();
		$id = $params['gamelog_id'];
		$game = $this->model->getInfo('gamelog', $id, null);
	
		$team1 = null;
		$team2 = null;
		$team1_member = 0;
		$team2_member = 0;
		$i = 1;
		$j = 1;
		$n = 1;
	
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
					$team1['number_' . $team1_member] = $n; 
					$team1_member++;
				} elseif(!is_null($value)){
					$team2['member_' . $team2_member] = htmlspecialchars($value, ENT_QUOTES);
					$team2['number_' . $team2_member] = $n;
					$team2_member++;
				}
				$j++;
				$n++;
			} elseif ($key === 'player'.$j.'_name') {
				$j++;
				$n++;
			}
	
			$team1['num_member'] = Zend_Json::encode($team1_member);
			$team2['num_member'] = Zend_Json::encode($team2_member);
	
		}
	
		$tokenHandler = new Custom_Auth_Token;
		$this->view->token = htmlspecialchars($tokenHandler->getToken('closedgameedit'), ENT_QUOTES);
		$this->view->team1 = Zend_Json::encode($team1);
		$this->view->team2 = Zend_Json::encode($team2);
		
		$this->view->item = Zend_Json::encode($game);
		$this->view->now = Zend_Json::encode(date('Y-m-d H:i:s'));
	}
	
	public function reporteditAction() {
		$lgnchk = $this->admincheck ( 'admin' );
		if(!$lgnchk) {
			return false;
		}
		
		$params = $this->getRequest ()->getParams ();
		$adapter = dbadapter();
		$param = dbconnect();
			
		$db = Zend_Db::factory( $adapter, $param );
		$db->beginTransaction();
		
		$gamelog_id = $params['gamelog_id'];
		$game = $this->model->getInfo ('gamelog', $gamelog_id, null);
		
		// get edit mode
		switch ($params['game_status']) {
			case '0':
				if ($game['game_status'] == 1){
					$update_flag = false;
					break;
				}
				$game_status = 1;
				$win_team = 'null';
				$lose_team = 'null';
				$update_flag = true;
				break;
				
			case '1':
				if ($game['game_status'] == 0 && $game['win_team'] == 1){
					$update_flag = false;
					break;
				}
				$game_status = 0;
				$win_team = 1;
				$lose_team = 2;
				$update_flag = true;
				break;
				
			case '2':
				if ($game['game_status'] == 0 && $game['win_team'] == 2){
					$update_flag = false;
					break;
				}
				$game_status = 0;
				$win_team = 2;
				$lose_team = 1;
				$update_flag = true;
				break;
				
			case '3':
				if ($game['game_status'] == 2){
					$update_flag = false;
					break;
				}
				$game_status = 2;
				$win_team = 'null';
				$lose_team = 'null';
				$update_flag = true;
				break;
				
			default:
				$update_flag = false;
				break;
		}
		
		$count_team1member = 0;
		$count_team2member = 0;
		$team1_sum = 0;
		$team2_sum = 0;
		$member_change_flag = false;
		$player1_team = $game['player1_team'];
		$player2_team = $game['player2_team'];
		$player3_team = $game['player3_team'];
		$player4_team = $game['player4_team'];
		$player5_team = $game['player5_team'];
		$player6_team = $game['player6_team'];
		$player7_team = $game['player7_team'];
		$player8_team = $game['player8_team'];
		
		// check team member change
		foreach($params as $key => $value) {
			if($key === 'member_'.$count_team1member.'_team1'){
				if($params['team1_member_'.$count_team1member.'_member'] != ''){
					if($value != $game['player'.$params['team1_member_'.$count_team1member.'_member'].'_team'] && $game['player'.$params['team1_member_'.$count_team1member.'_member'].'_team'] != null) {
						${'player'.$params['team1_member_'.$count_team1member.'_member'].'_team'} = $params['member_'.$count_team1member.'_team1'];
						${'team'.${'player'.$params['team1_member_'.$count_team1member.'_member'].'_team'}.'_sum'} = ${'team'.${'player'.$params['team1_member_'.$count_team1member.'_member'].'_team'}.'_sum'} + $game['player'.$params['team1_member_'.$count_team1member.'_member'].'_rate'];
						$member_change_flag = true;
						
						if(!$update_flag) {
							$game_status = $game['game_status'];
							$win_team = $game['win_team'];
							$lose_team = $game['lose_team'];
						}
						
						$update_flag = true;
					} else {
						if(!is_null($game['player'.$params['team1_member_'.$count_team1member.'_member'].'_team'])){
							${'player'.$params['team1_member_'.$count_team1member.'_member'].'_team'} = $game['player'.$params['team1_member_'.$count_team1member.'_member'].'_team'];
							$team1_sum = $team1_sum + $game['player'.$params['team1_member_'.$count_team1member.'_member'].'_rate'];
						}
					}
				}
				$count_team1member++;
			} elseif($key === 'member_'.$count_team2member.'_team2') {
				if($params['team2_member_'.$count_team2member.'_member'] != ''){
					if($value != $game['player'.$params['team2_member_'.$count_team2member.'_member'].'_team'] && $game['player'.$params['team2_member_'.$count_team2member.'_member'].'_team'] != null) {
						${'player'.$params['team2_member_'.$count_team2member.'_member'].'_team'} = $params['member_'.$count_team2member.'_team2'];
						${'team'.${'player'.$params['team2_member_'.$count_team2member.'_member'].'_team'}.'_sum'} = ${'team'.${'player'.$params['team2_member_'.$count_team2member.'_member'].'_team'}.'_sum'} + $game['player'.$params['team2_member_'.$count_team2member.'_member'].'_rate'];
						$member_change_flag = true;
						
						if(!$update_flag) {
							$game_status = $game['game_status'];
							$win_team = $game['win_team'];
							$lose_team = $game['lose_team'];
						}
						
						$update_flag = true;
					} else {
						${'player'.$params['team2_member_'.$count_team2member.'_member'].'_team'} = $game['player'.$params['team2_member_'.$count_team2member.'_member'].'_team'];
						$team2_sum = $team2_sum + $game['player'.$params['team2_member_'.$count_team2member.'_member'].'_rate'];
					}
				}
				$count_team2member++;
			}
			
		}
		
		if ($update_flag) {
			if($member_change_flag) {
				$team1_rate = $team1_sum;
				$team2_rate = $team2_sum;
			} else {
				$team1_rate = $game['team1_rate'];
				$team2_rate = $game['team2_rate'];
			}
			
			var_dump($team1_rate);
			var_dump($team2_rate);
			try {
				// edit gamelog
				$log = array (
						'gamelog_id' => $gamelog_id,
						'game_status' => $game_status,
						'game_end' => $params ['game_end'],
						'win_team' => $win_team,
						'lose_team' => $lose_team,
				);
				
				if($member_change_flag) {
					$log += array('team1_rate' => $team1_rate,
						'team2_rate' => $team2_rate,
						'player1_team' => $player1_team,
						'player2_team' => $player2_team,
						'player3_team' => $player3_team,
						'player4_team' => $player4_team,
						'player5_team' => $player5_team,
						'player6_team' => $player6_team,
						'player7_team' => $player7_team,
						'player8_team' => $player8_team
					);
				}
				
				$result1 = $this->model->update('gamelog', $log);
				
				// get rate info from DB
				$search_player_id = 'player_id = ';
				$orflag = false;
				$num = 0;
				
				foreach($game as $key => $value){
					if(preg_match('/^player[0-9]_id$/', $key) && !is_null($value)) {
						if ($orflag){
							$search_player_id = $search_player_id . ' or player_id = ';
						}
						$search_player_id = $search_player_id . $value;
						$orflag = true;
						$num++;
					}
						
				}
				
				$player = $this->model->joinInfos ('player', array('rate'), $search_player_id, 'delete_flag', 0, null);
				$result2 = 0;
				
				// apply new game result
				foreach($player as $array) {
					// search target's id & player index
					foreach($game as $key => $value){
						if($array['player_id'] == $value && preg_match('/^player[0-9]_id$/', $key)){
							$index_key = explode('player', $key);
							$search_key = str_replace('_id', '', $index_key[1]);
							break;
						}
					}
				
					$update = array(
							'rate_id' => $array['rate_id'],
							'rate' => $game['player'.$search_key.'_rate'],
							'win' => $game['player'.$search_key.'_win'],
							'lose' => $game['player'.$search_key.'_lose'],
							'streak' => $game['player'.$search_key.'_streak'],
							'win_streak' => $game['player'.$search_key.'_win_streak'],
							'lose_streak' => $game['player'.$search_key.'_lose_streak']
					);
						
					$result2 = $result2 + $this->model->update('rate', $update);
				}
				
				switch($game_status) {
					case 1: case 2:
						$result3 = $result2;
						break;
						
					case 0:
						$result3 = 0;
						foreach($player as $array) {
							$update = RateSet($array, $game, $num);
							$result3 = $result3 + $this->model->update('rate', $update);
						}
						break;
					
					default:
						$result3 = 0;
						break;
				}
				
				$this->view->result = htmlspecialchars($result3, ENT_QUOTES);
				$db->commit();
		
			}  catch (Exception $e) {
				$db->rollBack();
				echo $e->getMessage();
			}
		} else {
			$this->view->result = htmlspecialchars(0, ENT_QUOTES);
		}
				
	}
	
	public function loginAction() {
		$this->view->title = htmlspecialchars('ログイン', ENT_QUOTES);
	}
	
	protected function admincheck($mode) {
		$authStorage = Zend_Auth::getInstance ()->getStorage ();
		if (!$authStorage->isEmpty ()) {
			$loginid = get_object_vars (Zend_Auth::getInstance()->getIdentity());
			if ($loginid['user_control'] != 'administrator' ) {
				return $this->_forward ( 'erroradmin', $mode );
			}
			return true;

		}
		
		return $this->_forward ( 'login', $mode );
		
	}
	
	public function authAction() {
		try {
			$username = $this->getRequest ()->getParam ( 'user_name' );
			$password = $this->getRequest ()->getParam ( 'user_password' );
	
			$logininfo = $this->model->LoginAuthentication ( $username, $password );
	
			$auth = Zend_Auth::getInstance ();
			if ($auth->hasIdentity ()) {
				$result = 'login was successful.';
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
	
	public function erroradminAction() {
		
	}
	
	public function errorscrfAction() {
	
	}
	
	public function inittokenerupdateAction() {
		$tokenHandler = new Custom_Auth_Token;
		$this->view->inittokenupdate = htmlspecialchars($tokenHandler->getToken('init'));
	}
	
	public function inittokeneruserAction() {
		$tokenHandler = new Custom_Auth_Token;
		$this->view->inittokenuseruser = htmlspecialchars($tokenHandler->getToken('init'));
	}
}
?>