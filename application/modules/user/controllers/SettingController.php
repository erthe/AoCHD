<?php
require_once 'Zend/Json.php';
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/common.php');
class User_SettingController extends Zend_Controller_Action {
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
			return $this->_forward ( 'passworderror', 'index', 'error' );
		}
	
		$loginid = get_object_vars(Zend_Auth::getInstance()->getIdentity());
		if ($params['user_id_password'] != $loginid['user_id']
		|| $params['user_name_password'] != $loginid['user_name']) {
			return $this->_forward ( 'passworderror', 'index', 'error' );
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
	
	public function commentupdateAction() {
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
	
		$loginid = get_object_vars(Zend_Auth::getInstance()->getIdentity());
		if ($params['user_id_password'] != $loginid['user_id']
		|| $params['user_name_password'] != $loginid['user_name']) {
			return $this->_forward ( 'passworderror', 'index', 'error' );
		}
		$db->beginTransaction();
	
		try {
			$user = array (
					'user_id' => $loginid ['user_id'],
					'user_name' => $loginid ['user_name'],
					'user_comment' => $params['change_user_comment'],
					'last_editor' => $loginid['user_name'],
					'updated_on' => NULL
			);
	
			$result = $this->model->update ('user', $user);
	
			$user_log = array(
					'edited_user_id' => $loginid ['user_id'],
					'new_name' => $loginid ['user_name'],
					'memo' => 'edited comment by user',
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
	
	public function editpasswordAction() {
		$loginid = get_object_vars(Zend_Auth::getInstance()->getIdentity());
	
		$user_id = $loginid['user_id'];
		$user_name = $loginid['user_name'];
	
		$tokenHandler = new Custom_Auth_Token;
		$this->view->token = htmlspecialchars($tokenHandler->getToken('editpassword'), ENT_QUOTES);
	
		$this->view->user_id = htmlspecialchars($user_id, ENT_QUOTES);
		$this->view->user_name = htmlspecialchars($user_name, ENT_QUOTES);
	}
	
	public function editcommentAction() {
		$loginid = get_object_vars(Zend_Auth::getInstance()->getIdentity());
	
		$user_id = $loginid['user_id'];
		$user_name = $loginid['user_name'];
		$user = $this->model->getInfo('user', $user_id, null);
		$user_comment = $user['user_comment'];
	
		$tokenHandler = new Custom_Auth_Token;
		$this->view->token = htmlspecialchars($tokenHandler->getToken('editcomment'), ENT_QUOTES);
	
		$this->view->user_id = htmlspecialchars($user_id, ENT_QUOTES);
		$this->view->user_name = htmlspecialchars($user_name, ENT_QUOTES);
		$this->view->user_comment = htmlspecialchars($user_comment, ENT_QUOTES);
	}
}