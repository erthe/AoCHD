<?php
// 
require_once 'Zend/Json.php';
require_once (str_replace('/application/modules/default', '', dirname (dirname(__FILE__))) . '/tools/common.php');

class AdminController extends Zend_Controller_Action {
	private $model;
	
	/**
	 * 
	 */
	public function init() {
		$root_dir = dirname (dirname(__FILE__)) . '/';
		require_once $root_dir . 'models/IndexModel.php';
		$this->model = new IndexModel ();
		$ADMIN_TEMPLATE = $root_dir . '../../../themes/layout/';
		$this->view->header = $ADMIN_TEMPLATE . 'header.tpl';
		$this->view->footer = $ADMIN_TEMPLATE . 'footer.tpl';
		$this->view->list = $root_dir . '/views/index/list.tpl';
		$this->view->base = $root_dir;
		$this->view->playercreate = $root_dir . 'views/member/playercreate.tpl';
		$this->view->changepassword = $root_dir . 'views/member/changepassword.tpl';
		$this->view->createupdate = $root_dir . 'views/admin/updatecreate.tpl';
		$this->view->usercreate = $root_dir . 'views/admin/usercreate.tpl';
		header("X-Content-Type-Options: nosniff");
		$authStorage = Zend_Auth::getInstance ()->getStorage ();
		if ($authStorage->isEmpty ()) {
			$loginid = null;
		} else {
			$loginid = get_object_vars(Zend_Auth::getInstance()->getIdentity());
		}
		
		if (is_null($loginid)) {
			$this->view->member = false;
			$this->view->admin = false;
			$this->view->username = 'ようこそゲストさん';
		} else {
			if ($loginid['user_control'] === 'administrator') {
				$this->view->member = true;
				$this->view->admin = true;
			} else {
				$this->view->member = true;
				$this->view->admin = false;
			}
			$this->view->username = 'あなたは' . $loginid['user_name'] . 'としてログインしています。';
		}
	}
	
	public function indexAction() {
		$this->admincheck ( 'admin' );
		$this->view->member = true;
		$this->view->admin = true;
		$today = date("Y-m-d H:i:s");
		$yesterday = date("Y-m-d H:i:s",strtotime("-1 day"));
		
		$where = "created_on >= '$yesterday'";
		$games = $this->model->searchList('gamelog', $where, null, null, null);
		$this->view->games = $games;
		$this->view->title = '鯖管理者専用インデックス';
	}
	
	public function userlistAction() {
		$this->admincheck ( 'index' );
		$this->view->member = true;
		$this->view->admin = true;
		$user = $this->model->getList('user', '0', 'delete_flag', null);
		
		$this->view->userinfo = dirname (dirname(__FILE__)) . '/' . 'views/admin/userinfo.tpl';
		$this->view->title = 'ユーザー編集';
		$this->view->items = $user;
	}
	
	public function usereditAction() {
		$id = $this->getRequest ()->id;
		$userinfo = $this->model->getInfo ('user', $id, null);
	
		$this->view->item = Zend_Json::encode($userinfo);
	}
	
	public function userupdateAction() {
		$adapter = dbadapter ();
		$param = dbconnect ();
		
		$db = Zend_Db::factory ( $adapter, $param );
		$params = $this->getRequest()->getParams();
	
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
		$this->view->result = $result;
	
	}
	
	public function usercreateAction() {
	
	}
	
	public function userinsertAction() {
		$adapter = dbadapter ();
		$params = dbconnect ();
	
		$db = Zend_Db::factory ( $adapter, $params );
		$params = $this->getRequest ()->getParams ();
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
	
				$this->view->result = $result;
	
				$user_maxid = $this->model->getMaxID ( 'user' );
				
				$user_log = array(
						'edited_user_id' => $user_maxid,
						'new_name' => $params['user_name_insert'],
						'new_control' => $params['user_control'],
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
		$params = $this->getRequest ()->getParams ();
		$loginid = get_object_vars(Zend_Auth::getInstance()->getIdentity());
		
		$data = array (
				'user_id' => $params ['id'],
				'last_editor' => $loginid['user_name'],
				'delete_flag' => 1,
				'updated_on' => NULL
		);
	
		$result = $this->model->update ( 'user', $data );
		$this->view->result = $result;
	}
	
	public function deleteduserlistAction() {
		$this->admincheck ( 'index' );
		$params = $this->getRequest ()->getParams ();
		$user = $this->model->getList('user', '1', 'delete_flag', null);
		
		$this->view->items = $user;
		$this->view->title = '削除済みユーザー一覧';
	}
	
	public function userrevertAction() {
		$params = $this->getRequest ()->getParams ();
		$loginid = get_object_vars(Zend_Auth::getInstance()->getIdentity());
	
		$data = array (
				'user_id' => $params ['id'],
				'last_editor' =>  $loginid['user_name'],
				'delete_flag' => 0,
				'updated_on' => NULL
		);
	
		$result = $this->model->update ( 'user', $data );
		$this->view->result = $result;
	}
	
	public function playerdownloadAction() {
		$recordset = $this->model->getAllList ( 'player' );
		CsvCreate ( 'player', $recordset );
	}
	
	public function ratedownloadAction() {
		$recordset = $this->model->getAllList ( 'rate' );
		CsvCreate ( 'rate', $recordset );
	}
	
	public function gamelogdownloadAction() {
		$recordset = $this->model->getAllList ( 'gamelog' );
		CsvCreate ( 'gamelog', $recordset );
	}
	
	public function rateeditlogdownloadAction() {
		$recordset = $this->model->getAllList ( 'rate_editlog' );
		CsvCreate ( 'rateeditlog', $recordset );
	}
	
	public function updatedownloadAction() {
		$recordset = $this->model->getAllList ( 'updatelog' );
		CsvCreate ( 'update', $recordset );
	}
	
	public function userdownloadAction() {
		$recordset = $this->model->getAllList ( 'user' );
		CsvCreate ( 'user', $recordset );
	}
	
	public function usereditlogdownloadAction() {
		$recordset = $this->model->getAllList ( 'user_editlog' );
		CsvCreate ( 'usereditlog', $recordset );
	}
	
	public function updatelogdownloadAction() {
		$recordset = $this->model->getAllList ( 'updatelog' );
		CsvCreate ( 'updatelog', $recordset );
	}
	
	public function playeruploadAction() {
		$this->admincheck ( 'index' );
		$this->view->title = 'プレイヤーアップロード';
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
	
		$this->view->row = $result;
		$this->view->title = 'プレイヤーアップロード';
	}
	
	public function updatecreateAction() {
		
	}
	
	public function updateupdateAction() {
		$params = $this->getRequest ()->getParams ();
		
		$log = array (
				'update_note' => $params ['update_note'],
				'delete_flag' => 0
		);
		$result = $this->model->insert ( 'updatelog', $log );
	
		$this->view->result = $result;
	}
	
	public function closedgamemanageAction() {
		$this->admincheck ( 'index' );
		$this->view->member = true;
		$this->view->admin = true;
		$games = $this->model->getList('gamelog', null, null, 'gamelog_id desc');
		$paginator = Zend_Paginator::factory ( $games );
		
		// set maximum items to be displayed in a page
		$paginator->setItemCountPerPage (20);
		$paginator->setCurrentPageNumber ( $this->_getParam ( 'page' ) );
		$pages = $paginator->getPages ();
		$pageArray = get_object_vars ( $pages );
		
		$this->view->pages = $pageArray;
		$this->view->items = $paginator->getIterator ();
		
		$this->view->changegamelog = dirname (dirname(__FILE__)) . '/' . 'views/admin/changegamelog.tpl';
		$this->view->title = '終了したゲームの編集';
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
					$team1['member_' . $team1_member] = $value;
					$team1_member++;
				} elseif(!is_null($value)){
					$team2['member_' . $team2_member] = $value;
					$team2_member++;
				}
				$j++;
			} elseif ($key === 'player'.$j.'_name') {
				$j++;
			}
	
			$team1['num_member'] = Zend_Json::encode($team1_member);
			$team2['num_member'] = Zend_Json::encode($team2_member);
	
		}
	
		$this->view->team1 = Zend_Json::encode($team1);
		$this->view->team2 = Zend_Json::encode($team2);
		
		$this->view->item = Zend_Json::encode($game);
		$this->view->now = Zend_Json::encode(date('Y-m-d H:i:s'));
	}
	
	public function reporteditAction() {
		$params = $this->getRequest ()->getParams ();
		$adapter = dbadapter();
		$param = dbconnect();
			
		$db = Zend_Db::factory( $adapter, $param );
		$db->beginTransaction();
		
		$game = $this->model->getInfo ('gamelog', $params['game_id'], null);
		
		// get edit mode
		switch ($params['game_status']) {
			case '0':
				if ($game['game_status'] == 1){
					$update_flag = false;
					braek;
				}
				$game_status = 1;
				$win_team = 'null';
				$lose_team = 'null';
				$update_flag = true;
				break;
				
			case '1':
				if ($game['game_status'] == 0 && $game['win_team'] == 1){
					$update_flag = false;
					braek;
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
					braek;
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
		
		if ($update_flag) {
			try {
				$log = array (
						'gamelog_id' => $params ['game_id'],
						'game_status' => $game_status,
						'game_end' => $params ['end_time'],
						'win_team' => $win_team,
						'lose_team' => $lose_team
				);
				
				$result1 = $this->model->update('gamelog', $log);
				
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
				
				$player = $this->model->joinInfos ('player', array('rate'), $search_player_id, 'delete_flag', 0);
				$result2 = 0;
				
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
				
				$this->view->result = $result3;
				$db->commit();
		
			}  catch (Exception $e) {
				$db->rollBack();
				echo $e->getMessage();
			}
		} else {
			$this->view->result = 0;
		}
				
	}
	
	public function loginAction() {
		$this->view->title = 'ログイン';
	}
	
	protected function logincheck($mode) {
		$authStorage = Zend_Auth::getInstance ()->getStorage ();
		if ($authStorage->isEmpty ()) {
			//  
			return $this->_forward ( 'login', $mode );
		}
	
		return true;
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
		//  
		return $this->_forward ( 'login', $mode );
		
	}
	
	public function authAction() {
		try {
			$username = $this->getRequest ()->getParam ( 'user_name' );
			$password = $this->getRequest ()->getParam ( 'user_password' );
	
			$logininfo = $this->model->LoginAuthentication ( $username, $password );
	
			$auth = Zend_Auth::getInstance ();
			if ($auth->hasIdentity ()) {
				$result = "login was successful.<br/ >
                    ＿人人人人人人人人人＿<br/ >
                    ＞　突然のログイン　＜<br/ >
                    ￣Y^Y^Y^Y^Y^Y^Y^Y￣";
				$loginid = Zend_Auth::getInstance ()->getIdentity ();
	
				$this->view->login = true;
			} else {
				$result = "login failed";
				$this->view->login = false;
			}
	
			$this->view->title = 'ログイン';
			$this->view->result = $result;
		} catch ( Exception $e ) {
			$this->displayError ( $e );
		}
	}
	
	public function errorAction() {
	}
	
	public function erroradminAction() {
		
	}
}
?>