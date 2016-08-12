<?php
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
		require_once($root_dir . 'models/MemberModel.php');
		$this->model = new Redstone_MemberModel ();
		$withoutList = array ();
		$this->member = new  Zend_session_namespace('member');
		without_redstone ( $this, $withoutList, $this->base, 'member');

		$this->table = 'member';
		$this->imagePath = dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/data/images/redstone/character/';

		$this->view->base = $this->base;
		$this->view->modal = dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/themes/layout/modal.tpl';
		$this->view->header = dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/themes/layout/redstoneheader.tpl';
		$this->view->footer = dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/themes/layout/redstonefooter.tpl';
	}

	/**
	 * index
	 */
	public function indexAction() {
		$member = new Zend_Session_Namespace ('member');
		$guild_members = $this->model->getMember($this->table);

		$paginator = Zend_Paginator::factory($guild_members);
		$paginator->setItemCountPerPage(10);
		$paginator->setCurrentPageNumber($this->_getParam('page'));
		$pages = $paginator->getPages();
		$pageArray = get_object_vars($pages);

		$img = new Imagick($this->imagePath.'noimage.png');
		$img->thumbnailImage(100, 0);

		$imageName = 'data:image/png;base64,'.base64_encode($img);

		$tokenHandler = new Custom_Auth_Token;
		$this->view->token = $tokenHandler->getToken('guild_member');
		$this->view->pages = $pageArray;
		$this->view->members = $paginator->getIterator();
		$this->view->member = htmlspecialchars(count($guild_members));
		$this->view->username = $member->name;
		$this->view->auth = $member->auth;
		$this->view->noimage = $imageName;
		$this->view->title = htmlspecialchars ( 'ギルドメンバー一覧' );
	}

	public function howeditinfoAction() {
		$width = 500;
		$height = 200;

		$imgPath = $this->base . '/themes/images/redstone/how_edit_info.png';
		$image = new Imagick($imgPath);

		$width_org = $image->getImageWidth();
		$height_org = $image->getImageHeight();

		$ratio = $width_org / $height_org;
		if ($width / $height > $ratio) {
			$width = $height * $ratio;
		} else {
			$height = $width / $ratio;
		}

		$image->scaleImage($width, $height);

		$imageName = 'data:image/png;base64,'.base64_encode($image);
		$image->destroy();

		$this->view->img = $imageName;
	}

	public function searchAction() {
		$member = new Zend_Session_Namespace ('member');
		$params = $this->getRequest()->getParams();

		if ($params)
		$searchMembers = $this->model->searchMember('member', $params['search_name']);

		$img = new Imagick($this->imagePath.'noimage.png');
		$img->thumbnailImage(100, 0);

		$imageName = 'data:image/png;base64,'.base64_encode($img);

		$this->view->members = $searchMembers;
		$this->view->noimage = $imageName;
		$this->view->username = $member->name;
		$this->view->auth = $member->auth;
	}

	public function changememberAction() {
		$params = $this->getRequest ()->getParams ();
		$mem_info = $this->model->getCurrentMember('member' , $params ['id'] );

		if (!is_null($mem_info['image'])) {
			$extension = substr(strrchr($mem_info['image'], '.'), 1);
			$img = 'data:image/'.$extension.';base64,'.base64_encode(file_get_contents($this->imagePath.$mem_info['image']));
		} else {
			$img = null;
		}

		$this->member->id = $params['id'];

		$tokenHandler = new Custom_Auth_Token ();
		$this->view->token = htmlspecialchars ( $tokenHandler->getToken ( 'edit_member' ) );
		$this->view->member = $mem_info;
		$this->view->img = $img;
	}

	public function editmemberAction() {
		$params = $this->getRequest ()->getParams ();
		
		// Get token and tag from request for authentication
		$token = $params ['token'];
		$tag = $params ['action_tag'];
		
		// Validate token
		$tokenHandler = new Custom_Auth_Token ();
		if (! $tokenHandler->validateToken ( $token, $tag )) {
			return $this->_forward ( 'modalerrorcsrf', 'index', 'error' );
		}

		if (empty($params['name']) || empty($params['title']) || empty($params['self_introduction'])) {
			return _forward('inputerror', 'inddex', 'error');
		}

		$this->model->updateMember($this->table, $params, $this->member->name, $this->member->id);
	}

	public function changeadminAction() {
		$params = $this->getRequest ()->getParams ();
		$mem_info = $this->model->getCurrentMember('member' , $params ['id'] );

		if (!is_null($mem_info['image'])) {
			$extension = substr(strrchr($mem_info['image'], '.'), 1);
			$img = 'data:image/'.$extension.';base64,'.base64_encode(file_get_contents($this->imagePath.$mem_info['image']));
		} else {
			$img = null;
		}

		$this->member->id = $params['id'];

		$tokenHandler = new Custom_Auth_Token ();
		$this->view->token = htmlspecialchars ( $tokenHandler->getToken ( 'guild_admin' ) );
		$this->view->member = $mem_info;
		$this->view->img = $img;
	}

	 function editadminAction() {
		$params = $this->getRequest ()->getParams ();

		// Get token and tag from request for authentication
		$token = $params ['token'];
		$tag = $params ['action_tag'];

		// Validate token
		$tokenHandler = new Custom_Auth_Token ();
		if (! $tokenHandler->validateToken ( $token, $tag )) {
			return $this->_forward ( 'modalerrorcsrf', 'index', 'error' );
		}

		if (empty($params['name']) || empty($params['title']) || empty($params['self_introduction'])) {
			return _forward('inputerror', 'index', 'error');
		}

		 $this->model->updateAdmin($this->table, $params, $this->member->name, $this->member->id);
	}

	public function imageuploadAction() {
		$tokenHandler = new Custom_Auth_Token ();
		$this->view->token = htmlspecialchars ( $tokenHandler->getToken ( 'image_upload' ) );
		$this->view->title = htmlspecialchars('画像アップロード');
	}

	public function imageuploadadminAction() {
		$tokenHandler = new Custom_Auth_Token ();
		$this->view->token = htmlspecialchars ( $tokenHandler->getToken ( 'image_admin_upload' ) );
		$this->view->title = htmlspecialchars('画像アップロード');
	}

	public function imageprocessAction() {
		$params = $this->getRequest ()->getParams ();

		// Get token and tag from request for authentication
		$token = $params ['token'];
		$tag = $params ['action_tag'];

		// Validate token
		$tokenHandler = new Custom_Auth_Token ();
		if (! $tokenHandler->validateToken ( $token, $tag )) {
			return $this->_forward ( 'errorcsrf', 'index', 'error' );
		}

		try {
			if (!isset($_FILES['_file']['error']) || !is_int($_FILES['_file']['error'])) {
				return $this->_forward('inputerror', 'index', 'error');
			}

			switch ($_FILES['_file']['error']) {
				case UPLOAD_ERR_OK: // OK
					break;
				case UPLOAD_ERR_NO_FILE:   // ファイル未選択
					throw new RuntimeException('ファイルが選択されていません');
				case UPLOAD_ERR_INI_SIZE:  // php.ini定義の最大サイズ超過
				case UPLOAD_ERR_FORM_SIZE: // フォーム定義の最大サイズ超過
					throw new RuntimeException('ファイルサイズが大きすぎます');
				default:
					throw new RuntimeException('その他のエラーが発生しました');
			}

			$finfo = new finfo(FILEINFO_MIME_TYPE);
			if (!$ext = array_search(
				$finfo->file($_FILES['_file']['tmp_name']),
				array(
					'gif' => 'image/gif',
					'jpg' => 'image/jpeg',
					'png' => 'image/png',
				),
				true
			)
			) {
				throw new RuntimeException('ファイル形式が不正です');
			}

			$file_name = sha1_file($_FILES['_file']['tmp_name']) . '.' . $ext;
			if (!move_uploaded_file(
				$_FILES['_file']['tmp_name'],
				$path = $this->imagePath . $file_name)
			) {
				throw new RuntimeException('ファイル保存時にエラーが発生しました');
			}

			// ファイルのパーミッションを確実に0644に設定する
			chmod($path, 0644);
			$this->model->imageUpload($this->table, $file_name, $this->member->name, $this->member->id);
		} catch (RuntimeException $e) {
			echo $e->getMessage();
		}
	}

	public function changepasswordAction() {
		$params = $this->getRequest ()->getParams ();

		// Get token and tag from request for authentication
		$token = $params ['token'];
		$tag = $params ['action_tag'];

		// Validate token
		$tokenHandler = new Custom_Auth_Token ();
		if (! $tokenHandler->validateToken ( $token, $tag )) {
			return $this->_forward ( 'modalerrorcsrf', 'index', 'error' );
		}

		if (empty($params['name']) || empty($params['title']) || empty($params['self_introduction'])) {
			return _forward('inputerror', 'inddex', 'error');
		}

		$this->member->uploader = $params['name'];

		$this->model->updateMember($this->table, $params, $this->member->name, $this->member->id);

		$tokenHandler = new Custom_Auth_Token ();
		$this->view->token = htmlspecialchars ( $tokenHandler->getToken ( 'password' ) );
	}

	public function editpasswordAction() {
		$params = $this->getRequest ()->getParams ();

		// Get token and tag from request for authentication
		$token = $params ['token'];
		$tag = $params ['action_tag'];

		// Validate token
		$tokenHandler = new Custom_Auth_Token ();
		if (! $tokenHandler->validateToken ( $token, $tag )) {
			return $this->_forward ( 'modalerrorcsrf', 'index', 'error' );
		}

		if (empty($params['password']) || empty($params['retype'])) {
			return _forward('inputerror', 'inddex', 'error');
		}

		$this->model->updatePassword($this->table, $params, $this->member->name, $this->member->id);
	}

	public function deleteimageAction() {
		$params = $this->getRequest ()->getParams ();

		// Get token and tag from request for authentication
		$token = $params ['token'];
		$tag = $params ['action_tag'];

		// Validate token
		$tokenHandler = new Custom_Auth_Token ();
		if (! $tokenHandler->validateToken ( $token, $tag )) {
			return $this->_forward ( 'modalerrorcsrf', 'index', 'error' );
		}

		if (empty($params['name']) || empty($params['title']) || empty($params['self_introduction'])) {
			return _forward('inputerror', 'inddex', 'error');
		}

		$this->model->deleteImage($this->table, $params, $this->member->name, $this->member->id);
	}

	public function deletememberAction() {
		$params = $this->getRequest()->getParams();

		$token = $params['token'];
		$tag = $params['action_tag'];

		$tokenHandler = new Custom_Auth_Token();
		if (! $tokenHandler->validateToken($token, $tag)) {
			return $this->_forward('modalerrorcsrf', 'index', 'error');
		}

		$this->model->deleteMember($this->table, $this->member->id, $this->member->name);
	}

	public function initpasswordAction() {
		$params = $this->getRequest()->getParams();

		$token = $params['token'];
		$tag = $params['action_tag'];

		$tokenHandler = new Custom_Auth_Token();
		if (! $tokenHandler->validateToken($token, $tag)) {
			return $this->_forward('modalerrorcsrf', 'index', 'error');
		}

		$pwd = getRandomString(5);

		$this->model->initPassword($this->table, $pwd, $this->member->id, $this->member->name);
		$this->view->pwd = $pwd;
	}
}
?>
