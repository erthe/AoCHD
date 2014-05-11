<?php
require_once 'Zend/Json.php';
require_once 'Zend/Form/Element/Hash.php';
require_once 'Zend/Session/Namespace.php';
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/common.php');

class PlayerController extends Zend_Controller_Action {
	public $model;

	/**
	 *
	 */
	public function init() {
		$root_dir = dirname(dirname(__FILE__)) . '/';
		require_once ($root_dir . 'models/IndexModel.php');
		$this->model = new IndexModel ();
		initPage($this, '/application/modules/');
	}
	
	public function indexAction() {
		$params = $this->getRequest ()->getParams ();
	
		if (!array_key_exists('search_player_name', $params)){
			// init
			$this->view->search_player_name = null;
			$this->view->search_rate_up = null;
			$this->view->search_rate_down = null;
			$this->view->search_game_number = null;
		}
	
		$this->view->title = htmlspecialchars('プレイヤー一覧', ENT_QUOTES);
		$this->view->ratesearch = htmlspecialchars(dirname ( dirname ( __FILE__ ) ) . '/views/player/ratesearch.tpl', ENT_QUOTES);
	}
	
	public function listAction(){
		$params = $this->getRequest ()->getParams ();
		showlist($params, 'list', '0', $this);
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
	
				return $this->_forward ( 'postlimit' );
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
	
	public function postlimitAction() {
	}
}