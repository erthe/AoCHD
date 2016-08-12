<?php
require_once (dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/library/Custom/Auth/TwitterOAuth.php');
require_once (dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/tools/common.php');
require_once (dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/library/Custom/mpdf/mpdf.php');

class Teaparty_IndexController extends Zend_Controller_Action {
	private $model;
	private $consumer_key;
	private $consumer_secret;
	private $Tcallback_url;
	private $base;
	private $table;
	private $status;
	private $user;
	private $party_times;
	private $tea_times;
	
	/**
	 */
	public function init() {
		Zend_Session::start ();
		
		$this->base = 'http://' . $_SERVER ['HTTP_HOST'];
		$root_dir = dirname ( dirname ( __FILE__ ) ) . '/';
		require_once ($root_dir . 'models/IndexModel.php');
		$this->model = new IndexModel ();
		$withoutList = array (
				'login',
				'auth',
				'errorentry',
				'makepdf' 
		);
		$this->user = 'Twitter_User';
		without_loginchk ( $this, $withoutList, $this->base, $this->user );
		$this->table = 'tea_party';
		$this->status = 'tea_party_status';
		$status = 1;
		
		$this->tea_times = new Zend_Session_Namespace ( 'tea_times' );
		if (isset ( $this->tea_times->party_time )) {
		    $this->party_times = $this->tea_times->party_time;
		} else {
		    $this->party_times = $this->model->currentPartyTimes($this->status, $status)['tea_party_times'];
		    if (is_null($this->party_times)) {
		        $this->party_times = $this->model->maxPartyTimes($this->status, 'tea_party_times');
		    }
		    $this->tea_times->party_time = $this->party_times;
		}
		
		$this->view->base = $this->base;
		$this->view->modal = dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/themes/layout/modal.tpl';
		
		// oauth settings
		$this->consumer_key = htmlspecialchars ( 'BB3sAbknkyQKjCGMhWZ7bJJ2G' );
		$this->consumer_secret = htmlspecialchars ( 'leHgF4jkee0dtfabgRJrvg6PAhzHvvPl1c9ebnJRzZRbDFjrw8' );
		$this->Tcallback_url = htmlspecialchars ( $this->base . '/teaparty/index/auth' );
	}
	
	/**
	 * index
	 */
	public function indexAction() {
		$this->view->party_times = $this->party_times;
		$participants = $this->model->getParticipants ( $this->table, $this->party_times );
		$member = new Zend_Session_Namespace ( $this->user );
		$info = $this->model->getStatus($this->status, $this->party_times);
		
		if ($member->screen_name === 'Erlkonig') {
			$admin = 1;
		} else {
			$admin = 0;
		}
		
		$max_party = $this->model->maxPartyTimes($this->status, 'tea_party_times');
		
		$tokenHandler = new Custom_Auth_Token;
		$this->view->token = $tokenHandler->getToken('party_times');
		$this->view->participants = $participants;
		$this->view->info = $info;
		$this->view->max_party = $max_party;
		$this->view->admin = htmlspecialchars ( $admin );
		$this->view->name = htmlspecialchars ( $member->screen_name );
		$this->view->title = htmlspecialchars ( 'お茶会参加者一覧' );
	}
	
	
	public function createpartyAction() {
	    $params = $this->getRequest ()->getParams ();
	    $column = 'tea_party_times';
	    $status = 1;
	    
	    $token = $params ['token'];
	    $tag = $params ['action_tag'];
	    // Validate token
		$tokenHandler = new Custom_Auth_Token ();
		if (! $tokenHandler->validateToken ( $token, $tag )) {
			return $this->_forward ( 'passworderror', 'index', 'error' );
		}
	    
	    $check = $this->model->openPartyTimes($this->status, $status);
	    if (count($check) >= 1) {
	        return $this->_forward ( 'overopen', 'index', 'error' );
	    }
	    
	    $max_times = $this->model->maxPartyTimes($this->status, $column) + 1;
	    $insert = $this->model->partyTimesInsert($this->status, $status, $max_times);
	}
	
	public function closepartyAction() {
	    $params = $this->getRequest ()->getParams ();
	    $column = 'status';
	    $status = 0;
	    
        $token = $params ['token'];
	    $tag = $params ['action_tag'];
	   // Validate token
		$tokenHandler = new Custom_Auth_Token ();
		if (! $tokenHandler->validateToken ( $token, $tag )) {
			return $this->_forward ( 'passworderror', 'index', 'error' );
		}
	    
	    $insert = $this->model->partyTimesUpdate($this->status, $status, $params['tea_party_times']);
	}
	
	public function changepartyinfoAction() {
	    $params = $this->getRequest ()->getParams ();
	    $info = $this->model->getStatus($this->status, $params['tea_party_times']);
	    
	    $tokenHandler = new Custom_Auth_Token ();
	    $this->view->token = htmlspecialchars ( $tokenHandler->getToken ( 'party_info' ) );
	    $this->view->info = $info;
	    $this->view->times = $params['tea_party_times'];
	}
	
	public function editpartyinfoAction() {
	    $params = $this->getRequest ()->getParams ();
	
	    // Get token and tag from request for authentication
	    $token = $params ['token'];
	    $tag = $params ['action_tag'];
	
	    // Validate token
	    $tokenHandler = new Custom_Auth_Token ();
	    if (! $tokenHandler->validateToken ( $token, $tag )) {
	        return $this->_forward ( 'passworderror', 'index', 'error' );
	    }
	
        $update = $this->model->partyInfoUpdate ( $this->status, $params );
	}
	
	public function selectpartytimeAction() {
	    $params = $this->getRequest ()->getParams ();
		$this->tea_times->party_time = $params['tea_party_times'];
	}
	
	public function howeditinfoAction() {
	    
	}
	
	public function loginAction() {
		// twitter configuration
		$connection = new TwitterOAuth ( $this->consumer_key, $this->consumer_secret );
		$request_token = $connection->getRequestToken ( $this->Tcallback_url );
		
		// save to session (use after authenticate)
		$twitter = new Zend_Session_Namespace ( 'Twitter_Auth' );
		$twitter->request_token = $token = $request_token ['oauth_token'];
		$twitter->request_token_secret = $request_token ['oauth_token_secret'];
		
		$url = $connection->getAuthorizeURL ( $token );
		
		$this->view->twitter = $url;
		$this->view->title = htmlspecialchars ( 'ログイン画面' );
	}
	
	public function changeentryAction() {
		$params = $this->getRequest ()->getParams ();
		$edit_target = new Zend_Session_Namespace ( 'edit_user' );
		if (array_key_exists ( 'id', $params )) {
			$edit_target->tea_party_id = $params ['id'];
			$mem_info = $this->model->getInfo ( $this->table, $params ['id'] );
			$edit_target->screen_name = $mem_info ['screen_name'];
			$edit_target->edit = 1;
		} else {
			$mem_info = null;
			$edit_target->edit = 0;
		}
		
		$member = new Zend_Session_Namespace ( $this->user );
		
		if ($member->screen_name === 'Erlkonig') {
			$admin = 1;
		} else {
			$admin = 0;
		}
		
		$tokenHandler = new Custom_Auth_Token ();
		$this->view->token = htmlspecialchars ( $tokenHandler->getToken ( 'tea_party' ) );
		$this->view->member = $mem_info;
		$this->view->admin = htmlspecialchars ( $admin );
	}
	public function editentryAction() {
		$params = $this->getRequest ()->getParams ();
		
		// Get token and tag from request for authentication
		$token = $params ['token'];
		$tag = $params ['action_tag'];
		
		// Validate token
		$tokenHandler = new Custom_Auth_Token ();
		if (! $tokenHandler->validateToken ( $token, $tag )) {
			return $this->_forward ( 'passworderror', 'index', 'error' );
		}
		
		$member = new Zend_Session_Namespace ( $this->user );
		if ($member->screen_name === 'Erlkonig') {
			$admin = 1;
		} else {
			$admin = 0;
		}
		$edit_target = new Zend_Session_Namespace ( 'edit_user' );
		
		if ($edit_target->edit == 1) {
			$params ['tea_party_id'] = $edit_target->tea_party_id;
			$update = $this->model->participantsUpdate ( $this->table, $params, $admin );
		} else {
			$insert = $this->model->participantsInsert ( $this->table, $params, $this->party_times);
		}
	}
	
	public function saveimageAction() {
		// make pdf for keeping
		$write_path = $uploadPath = dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/data/pdf/';
		$pdf_name = 'participants.pdf';
		$png_name = 'participants.png';
		$html = file_get_contents ( $this->base . '/teaparty/index/makepdf' );
		$mpdf = new mPDF ( 'ja', 'A4' );
		$mpdf->WriteHTML ( $html );
		$mpdf->Output ( $write_path . $pdf_name, 'F' );
		
		// check smartphone or PC
		$smp = $this->smpcheck ();
		if ($smp) {
			// convert pdf to png
			$im = new imagick();
			$im->readImage ( $write_path . $pdf_name );
			//$im->setResolution(300,300);
			$im->setImageFormat('png');
			$im->writeImage ( $write_path . $png_name );
			$im->clear();
			$im->destroy();
			
			// output imageする
			$img = 'data:image/png;base64,' . base64_encode(file_get_contents($write_path . $png_name)); 
			$this->view->img = $img;
			$this->view->smp = 1;
			
			// delete these files
			unlink ( $write_path . '/' . $pdf_name );
			unlink ( $write_path . '/' . $png_name );
		} else {
			header ( "Content-Type: application/pdf" );
			readfile($write_path . $pdf_name);
			// delete these files
			unlink ( $write_path . '/' . $pdf_name );
			unlink ( $write_path . '/' . $png_name );
			$this->view->smp = 0;
		}
	}
	public function makepdfAction() {
		$times = $this->tea_times->party_time;
		$participants = $this->model->getParticipants ( $this->table, $times );
		$member = new Zend_Session_Namespace ( $this->user );
		
		$this->view->participants = $participants;
		$this->view->title = htmlspecialchars ( 'お茶会参加者一覧' );
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
	public function errorentryAction() {
		$this->view->base = htmlspecialchars ( $this->base );
		$this->view->title = htmlspecialchars ( 'ログインエラー' );
	}
	public function logoutAction() {
		Zend_Session::destroy ();
		$this->view->base = htmlspecialchars ( $this->base );
		$this->view->title = htmlspecialchars ( 'ログアウト' );
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
