<?php
require_once 'Zend/Json.php';
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/common.php');
class Admin_IndexController extends Zend_Controller_Action {
	public $model;

	public function init() {
		$root_dir = dirname(dirname(dirname(__FILE__))) . '/';
		require_once ($root_dir . 'default/models/IndexModel.php');
		$this->model = new IndexModel ();
		initPage($this, '/application/modules/');
	}

	public function indexAction() {
		if(!admincheck ( 'admin', $this )){
			$this->_forward('login', 'index', 'admin');
		}
		$this->view->user = htmlspecialchars(true, ENT_QUOTES);
		$this->view->admin = htmlspecialchars(true, ENT_QUOTES);
		$today = date("Y-m-d H:i:s");
		$yesterday = date("Y-m-d H:i:s",strtotime("-1 day"));
		
		$where = "created_on >= '$yesterday'";
		$games = $this->model->searchList('gamelog', $where, null, null, null);
		$this->view->games = $games;
		$this->view->title = htmlspecialchars('鯖管理者専用インデックス', ENT_QUOTES);
	}
	public function loginAction() {
		$this->view->title = htmlspecialchars('ログイン', ENT_QUOTES);
	}
	
	public function authAction() {
		$result = Auth($this);
		$this->view->title = htmlspecialchars('ログイン', ENT_QUOTES);
		$this->view->result = htmlspecialchars($result, ENT_QUOTES);
	}
	
	public function inittokenerupdateAction() {
		$tokenHandler = new Custom_Auth_Token;
		$this->view->inittokenupdate = htmlspecialchars($tokenHandler->getToken('init'));
	}
	
	public function inittokeneradminAction() {
		$tokenHandler = new Custom_Auth_Token;
		$this->view->inittokenuseradmin = htmlspecialchars($tokenHandler->getToken('init'));
	}
}