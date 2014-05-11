<?php
require_once 'Zend/Json.php';
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/common.php');
class User_IndexController extends Zend_Controller_Action {
	public $model;

	public function init() {
		$root_dir = dirname(dirname(dirname(__FILE__))) . '/';
		require_once ($root_dir . 'default/models/IndexModel.php');
		$this->model = new IndexModel ();
		initPage($this, '/application/modules/');
	}

	public function indexAction() {
		if(!logincheck ( 'user', $this )){
			$this->_forward('login');
		}
		$this->view->user = htmlspecialchars(true, ENT_QUOTES);
		$params = $this->getRequest ()->getParams ();
	
		if (!array_key_exists('search_player_name', $params)){
			// init
			$this->view->search_player_name = htmlspecialchars(null, ENT_QUOTES);
			$this->view->search_rate_up = htmlspecialchars(null, ENT_QUOTES);
			$this->view->search_rate_down = htmlspecialchars(null, ENT_QUOTES);
			$this->view->search_game_number = htmlspecialchars(null, ENT_QUOTES);
		}
	
		$this->view->title = htmlspecialchars('プレイヤー一覧(編集可能)', ENT_QUOTES);
		$this->view->ratesearch = htmlspecialchars(dirname (dirname ( dirname ( __FILE__ ) ) ). '/' . 'default/views/player/ratesearch.tpl', ENT_QUOTES);
		$this->view->playeredit = htmlspecialchars(dirname (dirname ( dirname (__FILE__) ) ) . '/' . 'user/views/player/playerinfo.tpl', ENT_QUOTES);
	}
	
	public function editlistAction() {
		$params = $this->getRequest ()->getParams ();
		showlist($params, 'editlist', '0', $this);
	}
	
	public function playerdetailAction() {
		$params = $this->getRequest()->getParams();
		Detail($params, $this);
		$this->view->title = htmlspecialchars('プレイヤー詳細情報', ENT_QUOTES);
	}
	
	public function commentupdateAction() {
		$params = $this->getRequest ()->getParams ();
	
		// Get token and tag from request for authentication
		$token = $params['token'];
		$tag = $params['action_tag'];
		
		$player_data = $this->model->getInfo('player', $params['player_id'], null);
		$this->view->rate_id = $player_data['rate_id'];
	
		// Validate token
		$tokenHandler = new Custom_Auth_Token();
		if (!$tokenHandler->validateToken($token,$tag)) {
			return $this->_forward ( 'errorcomment', 'index', 'error' );
		}
	
		$now = new Zend_Date();
		$now->sub(1, Zend_Date::MINUTE);
		$ipaddress = $_SERVER["REMOTE_ADDR"];
		$writer_recent_post = $this->model->searchList('player_note', "writers_ip = '$ipaddress'", 'delete_flag', 0, 'player_note_id desc');
		if (count($writer_recent_post) > 0) {
			$recent_post = new Zend_Date($writer_recent_post[0]['created_on']);
		} else {
			$recent_post = null;
		}
	
		if (!is_null($recent_post)) {
			if($recent_post->isLater($now)){
				return $this->_forward ( 'postlimit', 'player', 'index' );
			}
	
		}
	
		$log = array (
				'player_id' => $params ['player_id'],
				'writer_name' => $params ['writer_name'],
				'comment' => $params ['comment'],
				'writers_ip' => $ipaddress,
				'delete_flag' => 0,
				'created_on' => null
		);
		$result = $this->model->insert ( 'player_note', $log );
	
		$this->view->result = htmlspecialchars($result, ENT_QUOTES);
	}
	
	
	public function loginAction() {
		$this->view->title = htmlspecialchars('ログイン画面', ENT_QUOTES);
	}
	
	public function authAction() {
		$result = Auth($this);
		$this->view->title = htmlspecialchars('ログイン', ENT_QUOTES);
		$this->view->result = htmlspecialchars($result, ENT_QUOTES);
	}
	
	public function logoutAction() {
		$this->model->Logout();
		$this->view->title = htmlspecialchars('ログアウトしました。', ENT_QUOTES);
	}
	
	public function inittokenerAction() {
		$tokenHandler = new Custom_Auth_Token;
		$this->view->inittoken = htmlspecialchars($tokenHandler->getToken('init'));
	}
}