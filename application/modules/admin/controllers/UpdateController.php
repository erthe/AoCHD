<?php
require_once 'Zend/Json.php';
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/common.php');
class Admin_UpdateController extends Zend_Controller_Action {
	public $model;

	public function init() {
		$root_dir = dirname(dirname(dirname(__FILE__))) . '/';
		require_once ($root_dir . 'default/models/IndexModel.php');
		$this->model = new IndexModel ();
		initPage($this, '/application/modules/');
	}
	public function updatecreateAction() {
	
	}
	
	public function updateupdateAction() {
		$lgnchk = admincheck ( 'admin', $this );
		if(!$lgnchk) {
			return $this->_forward ( 'erroradmin', 'index', 'error' );
		}
	
		$params = $this->getRequest ()->getParams ();
	
		// Get token and tag from request for authentication
		$token = $params['token'];
		$tag = $params['action_tag'];
	
		// Validate token
		$tokenHandler = new Custom_Auth_Token();
		if (!$tokenHandler->validateToken($token,$tag)) {
			return $this->_forward ( 'erroradmin', 'index', 'error' );
		}
	
		$log = array (
				'update_note' => $params ['update_note'],
				'delete_flag' => 0
		);
		$result = $this->model->insert ( 'updatelog', $log );
	
		$this->view->result = htmlspecialchars($result, ENT_QUOTES);
	}
	
	public function updatelistAction() {
		$lgnchk = admincheck ( 'admin', $this );
		if(!$lgnchk) {
			return $this->_forward ( 'login', 'index', 'admin' );
		}
		$update = $this->model->getList('updatelog', '0', 'delete_flag', null);
	
		$this->view->updateinfo = htmlspecialchars(dirname (dirname(__FILE__)) . '/' . 'views/update/updateinfo.tpl', ENT_QUOTES);
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
		$lgnchk = admincheck ( 'admin', $this );
		if(!$lgnchk) {
			return $this->_forward ( 'erroradmin', 'index', 'error' );
		}
	
		$params = $this->getRequest()->getParams();
	
		// Get token and tag from request for authentication
		$token = $params['token_update'];
		$tag = $params['action_tag_updateedit'];
	
		// Validate token
		$tokenHandler = new Custom_Auth_Token();
		if (!$tokenHandler->validateToken($token,$tag)) {
			return $this->_forward ( 'erroradmin', 'index', 'error' );
		}
	
		$log = array (
				'updatelog_id' => $params ['updatelog_id'],
				'update_note' => $params ['update_note'],
				'delete_flag' => $params ['delete_flag_update']
		);
		$result = $this->model->update ( 'updatelog', $log );
	
		$this->view->result = htmlspecialchars($result, ENT_QUOTES);
	}
	
	public function updatedeleteAction() {
		$adapter = dbadapter ();
		$params = dbconnect ();
	
		$db = Zend_Db::factory ( $adapter, $params );
		$params = $this->getRequest ()->getParams ();
		$loginid = get_object_vars(Zend_Auth::getInstance()->getIdentity());
	
		$db->beginTransaction();
	
		try {
			$data = array (
					'updatelog_id' => $params ['id'],
					'delete_flag' => 1
			);
	
			$result = $this->model->update ( 'updatelog', $data );
	
			$db->commit();
		}  catch (Exception $e) {
			$db->rollBack();
			echo $e->getMessage();
		}
			
		$this->view->result = htmlspecialchars($result, ENT_QUOTES);
	}
	
	public function deletedupdatelistAction() {
		$lgnchk = admincheck ( 'admin', $this );
		if(!$lgnchk) {
			return $this->_forward ( 'login', 'index', 'admin' );
		}
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
}
	