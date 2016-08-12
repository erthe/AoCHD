<?php
require_once (dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/library/Custom/Auth/TwitterOAuth.php');
require_once (dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/tools/common.php');

class Redstone_IndexController extends Zend_Controller_Action {
	private $model;
	private $consumer_key;
	private $consumer_secret;
	private $Tcallback_url;
	private $base;
	private $table;
	private $status;
	private $member;
	private $imagePath;

	/**
	 */
	public function init() {
		Zend_Session::start ();
		
		$this->base = 'http://' . $_SERVER ['HTTP_HOST'];
		$root_dir = dirname ( dirname ( __FILE__ ) ) . '/';
		require_once ($root_dir . 'models/IndexModel.php');
		$this->model = new IndexModel ();

		$this->imagePath = $this->base . '/themes/images/redstone/';

//		$withoutList = array (
//				'login',
//				'auth',
//				'errorentry',
//				'makepdf'
//		);
//		$this->user = 'Twitter_User';
//		without_loginchk ( $this, $withoutList, $this->base, $this->user );
//		$this->table = 'redstone';
//		$this->status = 'redstone_STATUS';
//		$status = 1;
//
//		$this->tea_times = new Zend_Session_Namespace ( 'tea_times' );
//		if (isset ( $this->tea_times->party_time )) {
//		    $this->party_times = $this->tea_times->party_time;
//		} else {
//		    $this->party_times = $this->model->currentPartyTimes($this->status, $status)['tea_party_times'];
//		    if (is_null($this->party_times)) {
//		        $this->party_times = $this->model->maxPartyTimes($this->status, 'tea_party_times');
//		    }
//		    $this->tea_times->party_time = $this->party_times;
//		}
//
		$this->view->base = $this->base;
		$this->view->modal = dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/themes/layout/modal.tpl';
//
//		// oauth settings
//		$this->consumer_key = htmlspecialchars ( 'BB3sAbknkyQKjCGMhWZ7bJJ2G' );
//		$this->consumer_secret = htmlspecialchars ( 'leHgF4jkee0dtfabgRJrvg6PAhzHvvPl1c9ebnJRzZRbDFjrw8' );
//		$this->Tcallback_url = htmlspecialchars ( $this->base . '/teaparty/index/auth' );
	}
	
	/**
	 * index
	 */
	public function indexAction() {
//		$this->view->party_times = $this->party_times;
//		$participants = $this->model->getParticipants ( $this->table, $this->party_times );
//		$member = new Zend_Session_Namespace ( $this->user );
//		$info = $this->model->getStatus($this->status, $this->party_times);
		
//		if ($member->screen_name === 'Erlkonig') {
//			$admin = 1;
//		} else {
//			$admin = 0;
//		}
//
//		$max_party = $this->model->maxPartyTimes($this->status, 'tea_party_times');
//
//		$tokenHandler = new Custom_Auth_Token;
//		$this->view->token = $tokenHandler->getToken('party_times');
//		$this->view->participants = $participants;
//		$this->view->info = $info;
//		$this->view->max_party = $max_party;
//		$this->view->admin = htmlspecialchars ( $admin );
//		$this->view->name = htmlspecialchars ( $member->screen_name );

		$notes = $this->model->getNews('news');
		$paginator = Zend_Paginator::factory($notes);

		$paginator->setItemCountPerPage(20);
		$paginator->setCurrentPageNumber($this->_getParam('page'));
		$pages = $paginator->getPages();
		$pageArray = get_object_vars($pages);

		$this->view->pages = $pageArray;
		$this->view->notes = $paginator->getIterator ();

		$admin = 100;
		$this->view->admin = $admin;
		$this->view->title = htmlspecialchars ('Red Stone夜鯖ギルド妖精帝國');
	}
	
	public function loginAction() {
//		// twitter configuration
//		$connection = new TwitterOAuth ( $this->consumer_key, $this->consumer_secret );
//		$request_token = $connection->getRequestToken ( $this->Tcallback_url );
//
//		// save to session (use after authenticate)
//		$twitter = new Zend_Session_Namespace ( 'Twitter_Auth' );
//		$twitter->request_token = $token = $request_token ['oauth_token'];
//		$twitter->request_token_secret = $request_token ['oauth_token_secret'];
//
//		$url = $connection->getAuthorizeURL ( $token );
//
//		$this->view->twitter = $url;$this->member = array{
		$member = new Zend_Session_Namespace('member');
		$member->name = 'Erthe';
		$member->class = 'プリンセス';
		$member->auth = 100;

		$imageName = 'data:image/jpg;base64,'.base64_encode(file_get_contents($this->uploadImage.'redstone.jpg'));

		$this->view->title = htmlspecialchars ( 'ログイン画面' );
	}
	
	public function authAction() {
		$params = $this->getRequest ()->getParams ();
		
		// is authrized?
		if (isset ( $params ['oauth_verifier'] )) {
			$twitter = new Zend_Session_Namespace ( 'Twitter_Auth' );
			$auth = new TwitterOAuth ( $this->consumer_key, $this->consumer_secret, $twitter->request_token, $twitter->request_token_secret );
			$access_token = $auth->getAccessToken ( $params ['oauth_verifier'] );
			
			$login_id = $access_token ['user_id'];
			$req = $this->getRequest ();
			$actionName = $req->getActionName ();
			$this->loginCommon ( $access_token, $actionName, 'Twitter' );
			
			return $this->_helper->redirector ( 'index' );
		} else {
			exit ( htmlspecialchars ( 'ログインしてください。' ) );
		}
	}

	private function loginCommon(&$login_info, &$actionName, $sns) {
		$twitter_id = $this->model->getTwitterID ( $this->table, $login_info );
		if (is_null ( $twitter_id )) {
			return $this->_helper->redirector ( 'errorentry' );
		}
		
		$member = new Zend_Session_Namespace ( $this->user );
		$member->user_id = $login_info ['user_id'];
		$member->screen_name = $login_info ['screen_name'];
	}
	
	private function smpcheck() {
		$ua = $_SERVER ['HTTP_USER_AGENT'];
		if ((strpos ( $ua, 'iPhone' ) != false) || ((strpos ( $ua, 'Android' ) != false) && (strpos ( $ua, 'Mobile' ) != false)) || (strpos ( $ua, 'Windows Phone' ) != false) || (strpos ( $ua, 'BlackBerry' ) != false)) {
			return true;
		} else {
			return false;
		}
	}
}
?>
