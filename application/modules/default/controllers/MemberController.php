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
		$this->logincheck ( 'member' );
		$this->view->member = true;
		$params = $this->getRequest ()->getParams ();
	
		if (!array_key_exists('search_player_name', $params)){
			// init
			$this->view->search_player_name = null;
			$this->view->search_rate_up = null;
			$this->view->search_rate_down = null;
		}
	
		$this->view->title = 'プレイヤー一覧(編集可能)';
		$this->view->ratesearch = dirname ( dirname ( __FILE__ ) ) . '/views/index/ratesearch.tpl';
		$this->view->playeredit = dirname (dirname(__FILE__)) . '/' . 'views/member/playerinfo.tpl';
	}
	
	public function playerdetailAction() {
		$params = $this->getRequest()->getParams();
		Detail($params, $this);
		$this->view->title = 'プレイヤー詳細情報';
	}
	
	public function gamemanageAction() {
		$this->logincheck ( 'index' );
		$this->view->member = true;
		$games = $this->model->getList('gamelog', '1', 'game_status', null);
	
		$this->view->title = 'ゲームの編集';
		$this->view->games = $games;
		$this->view->gamereport = dirname (dirname(__FILE__)) . '/' . 'views/member/gamereport.tpl';
	}
	
	public function userreportAction() {
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
	
			$team1['num_member'] = $team1_member;
			$team2['num_member'] = $team2_member;
	
		}
	
		$this->view->team1 =  Zend_Json::encode($team1);
		$this->view->team2 = Zend_Json::encode($team2);
	
		$this->view->item = Zend_Json::encode($game);
		$this->view->now = Zend_Json::encode(date('Y-m-d H:i:s'));
	}
	
	public function reportAction() {
		$params = $this->getRequest ()->getParams ();
		$this->view->result = report($params, $this);
	
	}
	
	public function usercancelAction() {
		$params = $this->getRequest ()->getParams ();
		$log = array (
				'gamelog_id' => $params ['game_id'],
				'game_status' => 2,
		);
	
		$result = $this->model->update('gamelog', $log);
		$this->view->result = $result;
	}
	
	public function editlistAction() {
		$params = $this->getRequest ()->getParams ();
		showlist($params, 'editlist', '0', $this);
	}
	
	public function playereditAction() {
		$id = $this->getRequest ()->id;
		$userinfo = $this->model->joinInfo('player', array('rate'), $id, 'delete_flag', '0');
	
		$this->view->json = Zend_Json::encode($userinfo);
	}
	
	public function playerupdateAction() {
		$adapter = dbadapter ();
		$params = dbconnect ();
	
		$db = Zend_Db::factory ( $adapter, $params );
		$params = $this->getRequest()->getParams();
	
		$loginid = get_object_vars (Zend_Auth::getInstance()->getIdentity());
	
		$target_info = $this->model->joinInfo ('player', array('rate'), $params ['player_id'], 'delete_flag', '0');
	
		if ($params ['player_name'] != $target_info ['player_name']) {
			$ndc = $this->model->NameDuplicateCheck ( 'player', 'player_name', "'" . $params ['player_name'] ."'" );
		} else {
			$ndc = true;
		}
	
		if ($ndc) {
			$db->beginTransaction();
				
			try {
	
				$player = array (
						'player_id' => $params ['player_id'],
						'player_name' => $params ['player_name'],
						'memo' => $params ['memo'],
						'delete_flag' => $params ['delete_flag'],
						'last_editor' => $loginid['user_name'],
						'updated_on' => NULL
				);
				$result = $this->model->update ( 'player', $player );
				
				if($params['rate'] >  $target_info ['rate']) {
					$max_rate = $params['rate'];
				} else {
					$max_rate = $target_info['rate'];
				}
				
				$rate = array (
						'rate_id' => $target_info ['rate_id'],
						'rate' => $params ['rate'],
						'previous_rate' => $target_info['rate'],
						'max_rate' => $max_rate,
						'last_editor' => $loginid['user_name'],
						'updated_on' => NULL
				);
	
				$result2 = $this->model->update ( 'rate', $rate );
	
				$rate_log = array(
						'edited_player_id' => $params ['player_id'],
						'previous_name' => $target_info['player_name'],
						'previous_rate' => $target_info['rate'],
						'new_rate' => $params['rate'],
						'previous_status' => $target_info['delete_flag'],
						'new_status' => $params['delete_flag'],
						'previous_memo' => $target_info['memo'],
						'new_memo' => $params['memo'],
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
		$this->view->result = $result;
	
	}
	
	public function playercreateAction() {
		
	}
	
	public function playerinsertAction() {
		$adapter = dbadapter ();
		$params = dbconnect ();
	
		$db = Zend_Db::factory ( $adapter, $params );
		$params = $this->getRequest ()->getParams ();
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
	
				$this->view->result = $result;
	
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
		
		$this->view->result = $result;
	}
	
	public function playerdeletedAction() {
		$params = $this->getRequest ()->getParams ();
	
		if (!array_key_exists('search_player_name', $params)){
			// init
			$this->view->search_player_name = null;
			$this->view->search_rate_up = null;
			$this->view->search_rate_down = null;
		}
	
		$this->view->title = '削除済みプレイヤー';
		$this->view->ratesearch = dirname ( dirname ( __FILE__ ) ) . '/views/index/ratesearch.tpl';
	}
	
	public function deletedlistAction() {
		$params = $this->getRequest()->getParams();
		showlist($params, 'deletedlist', '1', $this);
	}
	
	public function playerrevertAction() {
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
		$this->view->result = $result;
	}
	
	public function passwordupdateAction() {
		$adapter = dbadapter ();
		$params = dbconnect ();
		
		$db = Zend_Db::factory ( $adapter, $params );
		$params = $this->getRequest()->getParams();
		$loginid = get_object_vars(Zend_Auth::getInstance()->getIdentity());
	
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
			
		$this->view->result = $result;
	}
	
	public function manualAction() {
		$this->view->title = '権限者用取説';
	}
	
	public function loginAction() {
		$this->view->title = 'ログイン画面';
	}
	
	public function logoutAction() {
		$this->model->Logout();
		$this->view->title = 'ログアウトしました。';
	}
	
	public function editpasswordAction() {
		$loginid = get_object_vars(Zend_Auth::getInstance()->getIdentity());
	
		$user_id = $loginid['user_id'];
		$user_name = $loginid['user_name'];
		$this->view->user_id = $user_id;
		$this->view->user_name = $user_name;
	}
	
	protected function logincheck($mode) {
		$authStorage = Zend_Auth::getInstance ()->getStorage ();
		if ($authStorage->isEmpty ()) {
			return $this->_forward ( 'login', $mode );
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
			
			loginlog($username, $auth, $this);
			
			$this->view->title = 'ログイン';
			$this->view->result = $result;
		} catch ( Exception $e ) {
			$this->displayError ( $e );
		}
	}
	
	public function errorAction() {
	}
}
?>