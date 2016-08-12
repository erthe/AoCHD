<?php
require_once (dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/library/Custom/Auth/TwitterOAuth.php');
require_once (dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/tools/common.php');

class Redstone_IndexController extends Zend_Controller_Action {
	private $model;
	private $Fclient_id;
	private $Fclient_secret;
	private $Fcallback_url;
	private $Gapp_id;
	private $Gcallback_url;
	private $Tconsumer_key;
	private $Tconsumer_secret;
	private $Tcallback_url;
	private $base;
	private $member;
	private $imagePath;

	/**
	 */
	public function init() {
		Zend_Session::start ();
		
		$this->base = 'http://' . $_SERVER ['HTTP_HOST'];
		$root_dir = dirname ( dirname ( __FILE__ ) ) . '/';
		require_once ($root_dir . 'models/IndexModel.php');
		$this->model = new RedStone_IndexModel ();

		$this->imagePath = $this->base . '/themes/images/redstone/';

		$withoutList = array (
				'login',
				'auth',
				'passwordlogin',
				'passwordauth',
				'facebookauth',
				'googleauth',
				'twitterauth',
				'forgetpassword',
				'firstonly',
				'namecheck',
				'memberregistration'
		);

		$memeber = new  Zend_session_namespace('member');
		without_redstone ( $this, $withoutList, $this->base, 'member');

		$this->view->base = $this->base;
		$this->imagePath = dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/data/images/redstone/character/';
		$this->view->modal = dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/themes/layout/modal.tpl';
		$this->view->header = dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/themes/layout/redstoneheader.tpl';
		$this->view->footer = dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/themes/layout/redstonefooter.tpl';
	
		// oauth settings
		$this->Gapp_secret = '1FSv3HlJekD8mizmJfd6yEas';
		$this->Gcallback_url = $this->base . '/redstone/index/googleauth';
		$this->Gapp_id = '173362414496-3h4sqt3die26msqpmdl1p7jec61imn5j.apps.googleusercontent.com';
		$this->Fclient_id = '418611241682562';
		$this->Fclient_secret = '7453fd74a29746a00c470fe44caf5fd1';
		$this->Fcallback_url = $this->base.'/redstone/index/facebookauth';
		$this->Tconsumer_key = 'QdQ0O1z3vmpWpBFoVYuP4CyGG';
		$this->Tconsumer_secret = '6RfQRqonCVwCZyRFK4fhL2JEgDA9Q7IK1qiWuMpUzKgDBdKYUB' ;
		$this->Tcallback_url = $this->base . '/redstone/index/twitterauth' ;
	}
	
	/**
	 * index
	 */
	public function indexAction() {
		$notes = $this->model->getNews('news');
		$paginator = Zend_Paginator::factory($notes);

		$paginator->setItemCountPerPage(20);
		$paginator->setCurrentPageNumber($this->_getParam('page'));
		$pages = $paginator->getPages();
		$pageArray = get_object_vars($pages);

		$this->view->pages = $pageArray;
		$this->view->notes = $paginator->getIterator ();

		$newMember = $this->model->getNewMenber('member');
		$this->view->member = $newMember;

		$changer = $this->model->getChanger('member');
		$this->view->changer = $changer;

		$member = new Zend_Session_namespace('member');
		$this->view->auth = $member->auth;
		$this->view->title = htmlspecialchars ('Red Stone夜鯖ギルド妖精帝國');
	}

	public function showprofileAction() {
		$params = $this->getRequest()->getParams();

		$item = $this->model->getCurrentMember('member', $params['member_id']);
		$this->view->item = $item;

		$img = new Imagick($this->imagePath.'noimage.png');
		$img->thumbnailImage(100, 0);

		$imageName = 'data:image/png;base64,'.base64_encode($img);
		$this->view->noimage = $imageName;
	}

	public function createnewsAction() {
		$params = $this->getRequest ()->getParams ();
		$edit_target = new Zend_Session_Namespace ( 'news' );
		if (array_key_exists ('id', $params )) {
			$edit_target->news_id = $params ['id'];
			$news_info = $this->model->getCurrentNews ( 'news', $params ['id'] );
			$edit_target->edit = 1;
		} else {
			$edit_target->news_id = null;
			$news_info = null;
			$edit_target->edit = 0;
		}
		
		$tokenHandler = new Custom_Auth_Token ();
		$this->view->token = htmlspecialchars ( $tokenHandler->getToken ( 'guild_news'));
		$this->view->news = $news_info;
	}

	public function editnewsAction() {
		$params = $this->getRequest()->getParams();
		$token = $params['token'];
		$tag = $params['action_tag'];
		$tokenHandler = new Custom_Auth_Token();
		if (!$tokenHandler->validateToken($token, $tag)) {
			return $this->_forward('modalerrorcsrf', 'index', 'error');
		}

		if (empty($params['title']) || empty($params['article'])) {
			return _forward('inputerror', 'index', 'error');
		}

		$edit_target = new Zend_Session_Namespace ( 'news' );
		if ($edit_target->edit == 0) {
			$this->model->insertNews('news', $params);
		} else {
			$this->model->updateNews('news', $params);
		}

		$member = new Zend_Session_Namespace('member');
		$req = $this->getRequest();
		$actionName = $req->getActionName();
		action_log($actionName, 'ギルドニュースを更新しました。', $member->name);
	}

	public function creatememberAction() {
		$params = $this->getRequest ()->getParams ();
		$edit_target = new Zend_Session_Namespace ( 'edit_user' );
		if (array_key_exists ( 'member_id', $params )) {
			$edit_target->member_id = $params ['id'];
			$mem_info = $this->model->getInfo ( 'member', $params ['member_id'] );
			$edit_target->edit = 1;
		} else {
			$mem_info = null;
			$edit_target->edit = 0;
		}
		
		$tokenHandler = new Custom_Auth_Token ();
		$this->view->token = htmlspecialchars ( $tokenHandler->getToken ( 'guild_member'));
		$this->view->member = $mem_info;
	}

	public function editmemberAction() {
		$params = $this->getRequest()->getParams();
		$token = $params['token'];
		$tag = $params['action_tag'];
		$tokenHandler = new Custom_Auth_Token();
		if(!$tokenHandler->validateToken($token, $tag)) {
			return $this->_forward('modalerrorcsrf', 'index', 'error');
		}

		if (empty($params['name']) || empty($params['title']) || empty($params['self_introduction'])) {
			return _forward('inputerror', 'inddex', 'error');
		}

		$gmem = new Zend_Session_Namespace('edit_user');
		if ($gmem->edit == 0) {
			$pwd = getRandomString(5);
			$this->model->insertMember('member', $params, $pwd);
		} else {
			$pwd = null;
			$this->model->updateMember('member', $params);
		}

		$member = new Zend_Session_Namespace('member');
		$req = $this->getRequest();
		$actionName = $req->getActionName();
		action_log($actionName, 'ギルドメンバー一覧を更新しました。', $member->name);
		$this->view->pwd = $pwd;
	}
	
	public function loginAction() {
		//google configurastion
		$GbaseUrl = 'https://accounts.google.com/o/oauth2/auth?';
		$scope = array(
			'https://www.googleapis.com/auth/userinfo.profile',
			'https://www.googleapis.com/auth/userinfo.email'
		);
		$Gauthurl = $GbaseUrl . 'scope=' . urlencode(implode(" ", $scope)) . '&redirect_uri=' . $this->Gcallback_url .
		'&response_type=code&client_id=' . $this->Gapp_id;

		// Facebook configuration
		$Fauth_url = 'https://facebook.com/dialog/oauth?client_id=' . $this->Fclient_id . '&redirect_uri=' . $this->Fcallback_url;

		// twitter configuration
		$connection = new TwitterOAuth ( $this->Tconsumer_key, $this->Tconsumer_secret );
		$request_token = $connection->getRequestToken ( $this->Tcallback_url );

		// save to session (use after authenticate)
		$twitter = new Zend_Session_Namespace ( 'Twitter_Auth' );
		$twitter->request_token = $token = $request_token ['oauth_token'];
		$twitter->request_token_secret = $request_token ['oauth_token_secret'];

		$Turl = $connection->getAuthorizeURL ( $token );

		$this->view->google = $Gauthurl;
		$this->view->facebook = $Fauth_url;
		$this->view->twitter = $Turl;

		$imageName = 'data:image/jpg;base64,'.base64_encode(file_get_contents($this->imagePath.'redstone.jpg'));
		$this->view->img = $imageName;
		$this->view->title = htmlspecialchars ( 'ログイン画面' );
	}

	public function passwordloginAction() {
		$imageName = 'data:image/gif;base64,'.base64_encode(file_get_contents($this->imagePath.'bana-redfan_150_50.gif'));
		$this->view->img = $imageName;
		$this->view->title = 'パスワードログイン';
	}

	public function forgetpasswordAction() {

	}

	public function passwordauthAction() {
		$params = $this->getRequest()->getParams();
		$login_info = array();
		$result = $this->model->loginAuthentication('member', $params['name'], $params['password']);

		if(!$result) {
			// login failed process
			$req = $this->getRequest();
			$actionName = $req->getActionName();
			$member_info = $this->model->getMemberID('member', $params['name']);

			if ($member_info['member_id'] != '') {
				$member_info = $this->model->getCurrentMember('member', $member_info['member_id']);
				$login_info['member_id'] = $member_info['member_id'];
				$login_info['name'] = $member_info['name'];
				action_log($actionName, $params['name'].'さんがパスワードでのログインに失敗しました。', $member_info['name']);
			}

			return $this->_forward('loginfailed', 'index', 'error');
		}

		// login succeed process
		$member_info = $this->model->getMemberID('member', $params['name']);
		$req = $this->getRequest();
		$actionName = $req->getActionName();
		$this->loginCommon($member_info, $actionName, 'password');
	}

	public function googleauthAction() {
		$params = $this->getRequest()->getParams();
		if (!isset($params['code'])){
			exit('ログインして下さい。');
		}

		// is authorized?
		$base_url = 'https://accounts.google.com/o/oauth2/token';

		$Gparams = array(
			'code' => $params['code'],
			'client_id' => $this->Gapp_id,
			'client_secret' => $this->Gapp_secret,
			'redirect_uri' => $this->Gcallback_url,
			'grant_type' => 'authorization_code'
		);


		$ci = curl_init();
		curl_setopt($ci, CURLOPT_USERAGENT, 'GoogleAuth');
		curl_setopt($ci, CURLOPT_CONNECTTIMEOUT, 30);
		curl_setopt($ci, CURLOPT_TIMEOUT, 30);
		curl_setopt($ci, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ci, CURLOPT_HTTPHEADER, array('Expect:'));
		curl_setopt($ci, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ci, CURLOPT_HEADER, FALSE);
		curl_setopt($ci, CURLOPT_POST, TRUE);
		curl_setopt($ci, CURLOPT_POSTFIELDS, $Gparams);
		curl_setopt($ci, CURLOPT_URL, $base_url);
		$responsej = curl_exec($ci);
		curl_close($ci);
		$response = Zend_Json::decode($responsej);

		if (array_key_exists('error', $response)) {
			return $this->_forward('loginfailed', 'index', 'error');
		}

		$access_token = $response['access_token'];
		$user_info = Zend_Json::decode(file_get_contents('https://www.googleapis.com/oauth2/v1/userinfo?access_token='.$access_token));
		$login_info = $this->model->getLoginMember('member', $user_info['id'], 'google');

		if(is_null($login_info)) {
			return header('Location: firstonly?sns_id='.$user_info['id'].'&login_type=google');
		}

		$member_id = $this->model->getMemberID('member', $user_info['id']);
		$this->model->memberUpdate('member', 'google', $user_info['id'], $member_id['member_id']);
		$req = $this->getRequest();
		$actionName = $req->getActionName();
		$this->loginCommon($login_info, $actionName, 'Google');

		return $this->_helper->redirector('index');
	}

	public function facebookauthAction() {
		$params  = $this->getRequest()->getParams();

		if (!isset($params['code'])) {
			exit('ログインして下さい。');
		}

		$token_url = 'https://graph.facebook.com/oauth/access_token?client_id='.$this->Fclient_id.'&redirect_uri='.$this->Fcallback_url.
					'&client_secret='.$this->Fclient_secret.'&code='.$params['code'];
		$access_token = file_get_contents($token_url);
		$user_json = file_get_contents('https://graph.facebook.com/me?'.$access_token);
		$user_info = Zend_Json::decode($user_json);
		$login_info = $this->model->getLoginMember('member', $user_info['id'], 'facebook');

		if(is_null($login_info['member_id'])) {
			return header('Location: firstonly?sns_id='.$user_info['id'].'&login_type=facebook');
		}

		$member_id = $this->model->getMemberID('member', $user_info['id']);
		$this->model->memberUpdate('member', 'facebook',  $user_info['id'], $member_id['member_id']);
		$req = $this->getRequest();
		$actionName = $req->getActionName();
		$this->loginCommon($login_info, $actionName, 'Facebook');
		return $this->_helper->redirector('index');
	}

	public function twitterauthAction() {
		$params = $this->getRequest ()->getParams ();

		// is authrized?
		if (!isset ( $params ['oauth_verifier'] )) {
			exit (htmlspecialchars('ログインしてください。'));
		}

		$twitter = new Zend_Session_Namespace ( 'Twitter_Auth' );
		$auth = new TwitterOAuth ( $this->Tconsumer_key, $this->Tconsumer_secret, $twitter->request_token, $twitter->request_token_secret );
		$access_token = $auth->getAccessToken ( $params ['oauth_verifier'] );
		$login_info = $this->model->getLoginMember('member', $access_token['user_id'],  'twitter');

		if(is_null($login_info)) {
			return header('Location: firstonly?sns_id='.$access_token['user_id'].'&login_type=twitter');
		} else {
			$member_id = $this->model->getMemberID('member', $login_info['name']);
			$this->model->memberUpdate('member', 'twitter',  $access_token['user_id'], $member_id['member_id']);
			$req = $this->getRequest();
			$actionName = $req->getActionName();
			$this->loginCommon($login_info, $actionName, 'Twitter');

			return $this->_helper->redirector('index');
		}
	}

	public function firstonlyAction() {
		$params = $this->getRequest()->getParams();

		$tokenHandler = new Custom_Auth_Token;
		$this->view->token = $tokenHandler->getToken('firstonly');

		$user = new Zend_Session_Namespace('register');
		$user->client = $params['login_type'];
		$user->sns_id = $params['sns_id'];
		$user->login_type = $params['login_type'];
		$this->view->title = 'メンバー情報登録';
	}

	public function namecheckAction() {
		$params = $this->getRequest()->getParams();

		$token = $params['token'];
		$tag = $params['action_tag'];

		$tokenHandler = new Custom_Auth_Token();
		if (!$tokenHandler->validateToken($token, $tag)) {
			return $this->forward('errorcsrf', 'index', 'index');
		}

		$client = $this->model->getMemberID('member', $params['name']);
		if($client) {
			$result = 1;
		} else {
			$result = 0;
		}

		$this->view->member_id = $client['member_id'];
		$this->view->name = $client['name'];
		$this->view->result = $result;
	}

	public function memberregistrationAction(){
		$params = $this->getRequest()->getParams();
		$user = new Zend_Session_Namespace(('register'));

		$member_id = $this->model->getMemberID('member', $params['name']);
		$this->model->memberUpdate('member', $user->login_type, $user->sns_id, $member_id['member_id']);
		$req = $this->getRequest();
		$actionName = $req->getActionName();
		action_log($actionName, $params['name'].'さんのログイン情報を登録しました。', $member_id['member_id']);
	}

	public function logoutAction() {
		$_SESSION = array();
	}

	private function loginCommon($login_info, $actionName, $sns) {
		$member = new Zend_Session_namespace('member');
		$member->member_id = $login_info['member_id'];
		$member->name = $login_info['name'];
		$member->ip = $_SERVER['REMOTE_ADDR'];
		$member->auth = $login_info['auth'];

		action_log($actionName, $member->name.'さんが'.$sns.'アカウントでログインしました。', $login_info['member_id']);
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
