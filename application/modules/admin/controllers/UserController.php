<?php
require_once 'Zend/Json.php';
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/common.php');
class Admin_UserController extends Zend_Controller_Action {
	public $model;

	public function init() {
		$root_dir = dirname(dirname(dirname(__FILE__))) . '/';
		require_once ($root_dir . 'default/models/IndexModel.php');
		$this->model = new IndexModel ();
		initPage($this, '/application/modules/');
	}
	
	public function userlistAction() {
		if(!admincheck ( 'admin', $this )){
			$this->_forward('login', 'index');
		}
		$this->view->member = htmlspecialchars(true, ENT_QUOTES);
		$this->view->admin = htmlspecialchars(true, ENT_QUOTES);
		$user = $this->model->getList('user', '0', 'delete_flag', null);
	
		$this->view->userinfo = htmlspecialchars(dirname (dirname(__FILE__)) . '/' . 'views/user/userinfo.tpl', ENT_QUOTES);
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
		$lgnchk = admincheck ( 'admin', $this );
		if(!$lgnchk) {
			return $this->_forward ( 'erroradmin', 'index', 'error' );
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
		if (!$tokenHandler->validateToken($token, $tag)) {
			return $this->_forward ( 'erroradmin', 'index', 'error' );
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
			return $this->_forward ( 'error', 'index', 'error' );
		}
		$this->view->result = htmlspecialchars($result, ENT_QUOTES);
	
	}
	
	public function usercreateAction() {
		$tokenHandler = new Custom_Auth_Token;
		$this->view->token = htmlspecialchars($tokenHandler->getToken('usercreate'), ENT_QUOTES);
	}
	
	public function userinsertAction() {
		$lgnchk = admincheck ( 'admin', $this );
		if(!$lgnchk) {
			return $this->_forward ( 'erroradmin', 'index', 'error' );
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
		if (!$tokenHandler->validateToken($token, $tag)) {
			return $this->_forward ( 'erroradmin', 'index', 'error' );
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
			return $this->_forward ( 'error', 'index', 'error' );
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
		if(!admincheck ( 'admin', $this )){
			$this->_forward('login', 'index');
		}
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
	
}