<?php
require_once(dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/library/Custom/Auth/TwitterOAuth.php');
require_once(dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/tools/common.php');

class Redstone_MemberController extends Zend_Controller_Action {
	private $model;
	private $base;
	private $table;
	private $member;
	private $imagePath;

	/**
	 */
	public function init() {
		Zend_Session::start ();
		
		$this->base = 'http://' . $_SERVER ['HTTP_HOST'];
		$root_dir = dirname ( dirname ( __FILE__ ) ) . '/';
		require_once($root_dir . 'models/IndexModel.php');
		$this->model = new IndexModel ();
//		$withoutList = array (
//				'login',
//				'auth',
//				'errorentry',
//				'makepdf'
//		);

		$this->table = 'member';
		$this->imagePath = $this->base . '/themes/images/redstone/';

		$this->view->base = $this->base;
		$this->view->modal = dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/themes/layout/modal.tpl';
	}

	/**
	 * index
	 */
	public function indexAction() {
		$member = new Zend_Session_Namespace ('member');
		$guild_members = $this->model->getMember($this->table);

		$tokenHandler = new Custom_Auth_Token;
		$this->view->token = $tokenHandler->getToken('guild_member');
		$this->view->members = $guild_members;
		$this->view->admin = htmlspecialchars ($member->auth);
		$this->view->name = htmlspecialchars ($member->name);
		$this->view->title = htmlspecialchars ( 'ギルドメンバー一覧' );
	}

	public function createinfoAction(){
		$tokenHandler = new Custom_Auth_Token ();
		$this->view->token = htmlspecialchars($tokenHandler->getToken('edit_member'));
	}

	public function changeinfoAction() {
		$params = $this->getRequest ()->getParams ();
		$mem_info = $this->model->getInfo ( $this->table, $params ['id'] );

		$tokenHandler = new Custom_Auth_Token ();
		$this->view->token = htmlspecialchars ( $tokenHandler->getToken ( 'edit_member' ) );
		$this->view->member = $mem_info;
	}
	public function editinfoAction() {
		$params = $this->getRequest ()->getParams ();
		
		// Get token and tag from request for authentication
		$token = $params ['token'];
		$tag = $params ['action_tag'];
		
		// Validate token
		$tokenHandler = new Custom_Auth_Token ();
		if (! $tokenHandler->validateToken ( $token, $tag )) {
			return $this->_forward ( 'passworderror', 'index', 'error' );
		}
		
		$member = new Zend_Session_Namespace ('member');
		if ($member->auth >= 100) {
			$admin = true;
		} else {
			$admin = false;
		}

		if ($params['update'] == 1) {
			$update = $this->model->memberUpdate($this->table, $params, $admin);
		} else {
			$insert = $this->model->memberInsert($this->table, $params, $admin);
		}
	}
	
	public function imageuploadAction() {
		$params = $this->getRequest ()->getParams ();
		$member = $this->model->memberSelect($this->table, $params['member_id']);
		if (!$member) {
			$img = new Imagick($this->uploadImage.'RedStone.jpg');
			$extension = 'jpg';
			$image = 0;

		} else {
			$img = new Imagick($this->uploadImage.$member['image']);
			$extension = substr(strrchr($member["image"], '.'), 1);
			$image = 1;
		}

		$imageName = 'data:image/'.$extension.';base64,'.base64_encode(file_get_contents($img));
		$img->thumbnailImage(100, 0);

		$tempName = new Zend_Session_Namespace('member_image');
		$tempName->id = $member['id'];
		$tempName->name = $member['name'];

		$tokenHandler = new Custom_Auth_Token ();
		$this->view->token = htmlspecialchars ( $tokenHandler->getToken ( 'image_member' ) );
		$this->view->imagenName = $imageName;
		$this->view->image = $image;
	}

	public function imageprocessAction() {
		$params = $this->getRequest ()->getParams ();

		// Get token and tag from request for authentication
		$token = $params ['token'];
		$tag = $params ['action_tag'];

		// Validate token
		$tokenHandler = new Custom_Auth_Token ();
		if (! $tokenHandler->validateToken ( $token, $tag )) {
			return $this->_forward ( 'passworderror', 'index', 'error' );
		}

		$member = new Zend_Session_Namespace ('member');
		if ($member->auth >= 100) {
			$admin = true;
		} else {
			$admin = false;
		}

		$adapter = new Zend_File_Transfer_Adapter_Http ();
		$adapter->setDestination ($this->uploadImage);

		if (! $adapter->receive ()) {
			$messages = $adapter->getMessages ();
			echo implode ( "\n", $messages );
		}

		$tempName = new Zend_Session_Namespace('member_image');
		$file = $adapter->getFileName (null, false);
		$extention = substr(strrchr($file, '.'), 1);
		$file_name = $tempName['name'] . $extention;
		rename($this->uploadPath . '/' . $file, $this->uploadPath . '/' . $file_name);
		$this->model->imageUpload($this->table, $tempName['id']);
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
