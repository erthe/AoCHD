<?php
require_once(dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/library/Custom/Auth/TwitterOAuth.php');
require_once(dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/tools/common.php');

class Redstone_CommunicationController extends Zend_Controller_Action {
	private $model;
	private $base;
	private $parent;
	private $children;
	private $image;
	private $member;
	private $communication;
	private $imagePath;

	/**
	 */
	public function init() {
		Zend_Session::start ();
		
		$this->base = 'http://' . $_SERVER ['HTTP_HOST'];
		$root_dir = dirname ( dirname ( __FILE__ ) ) . '/';
		require_once($root_dir . 'models/CommunicationModel.php');
		$this->model = new Redstone_CommunicationModel ();
		$this->member = new  Zend_session_namespace('member');
		$this->communication = new Zend_session_Namespace('communication');
		$this->parent = 'communication_parent';
		$this->children = 'communication_children';
		$this->image = 'communication_image';
		$this->imagePath = dirname ( dirname ( dirname ( dirname( dirname (  __FILE__  ) ) ) ) ) . '/data/images/redstone/communication/';

		$this->view->base = $this->base;
		$this->view->modal = dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/themes/layout/modal.tpl';
		$this->view->header = dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/themes/layout/redstoneheader.tpl';
		$this->view->footer = dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/themes/layout/redstonefooter.tpl';
	}

	/**
	 * index
	 */
	public function indexAction() {
		$img = new Imagick(dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/data/images/redstone/character/'.'noimage.png');
		$img->thumbnailImage(100, 0);

		$imageName = 'data:image/png;base64,'.base64_encode($img);

		$communications = $this->model->getCommunication($this->parent, $this->children, $this->image);

		$this->view->noimage = $imageName;
		$this->view->communications = $communications;
		$this->view->admin = htmlspecialchars ($this->member->auth);
		$this->view->name = htmlspecialchars ($this->member->name);
		$this->view->member_id = htmlspecialchars($this->member->member_id);
		$this->view->title = htmlspecialchars ( '交流掲示板' );
	}

	public function createthreadAction(){
		$this->communication->image_number = 0;
		$tokenHandler = new Custom_Auth_Token ();
		$this->view->token = htmlspecialchars($tokenHandler->getToken('create_thread'));
	}

	public function completecreatethreadAction() {
		$params = $this->getRequest ()->getParams ();

		// Get token and tag from request for authentication
		$token = $params ['token'];
		$tag = $params ['action_tag'];

		// Validate token
		$tokenHandler = new Custom_Auth_Token ();
		if (! $tokenHandler->validateToken ( $token, $tag )) {
			return $this->_forward ( 'passworderror', 'index', 'error' );
		}

		$params['child_res_from'] = null;
		$this->model->createThread('communication_parent', $params, $this->member);
		$maxid = $this->model->getMaxID('communication_parent', 'communication_id');
		$this->model->insertMessage('communication_children', $params, $this->member, $maxid, $this->communication->image_number, 1);
	}

	public function changemessageAction() {
		$params = $this->getRequest ()->getParams ();

		switch($params['mode']) {
			case 'reply':
				$item = null;
				$this->communication->replyfrom = $params['id'];
				$this->communication->imagefrom = null;
				$this->communication->mode = 'reply';
				$this->communication->parent = $params['parent_id'];
				break;
			case 'change':
				$item = $this->model->getMessage ( 'communication_children', $params ['id'] );
				$this->communication->replyfrom = $params['id'];
				$this->communication->imagefrom = $params['id]'];
				$this->communication->mode = 'change';
				$this->communication->parent = null;
				break;
			default:
				$item = null;
				$this->communication->replyfrom = null;
				$this->communication->imagefrom = null;
				$this->communication->mode = null;
				$this->communication->parent = null;
		}

		$tokenHandler = new Custom_Auth_Token ();
		$this->view->token = htmlspecialchars ( $tokenHandler->getToken ( 'change_message' ) );
		$this->view->item = $item;
	}
	public function editmessageAction() {
		$params = $this->getRequest ()->getParams ();
		
		// Get token and tag from request for authentication
		$token = $params ['token'];
		$tag = $params ['action_tag'];
		
		// Validate token
		$tokenHandler = new Custom_Auth_Token ();
		if (! $tokenHandler->validateToken ( $token, $tag )) {
			return $this->_forward ( 'passworderror', 'index', 'error' );
		}

		switch($this->communication->mode) {
			case 'reply':
				$params['reply_from'] = $this->communication->replyfrom;
				if ($this->communication->isupload == 1) {
					$image_number = 1;
					$this->communication->isupload = null;
				} else {
					$image_number = 0;
				}
				$this->model->insertMessage($this->children, $params, $this->member, $this->communication->parent, $image_number, 0);
				$this->model->addChildNumber($this->parent, $this->communication->parent);
				break;
			case 'change':
				$this->model->updateMessage($this->children, $params, $this->communication->replyfrom);
				break;
			default:
				return $this->_forward('inputerror', 'index', 'error');
		}

		$this->view->title = 'メッセージ投稿】完了';
	}

	public function deletemessageAction() {
		$params = $this->getRequest ()->getParams ();

		$this->model->deleteMessage($this->children, $params, $this->member->member_id);
	}
	
	public function imageuploadAction() {
		$tokenHandler = new Custom_Auth_Token ();
		$this->view->token = htmlspecialchars ( $tokenHandler->getToken ( 'communication_image' ) );
		$this->view->title = '画像アップロード';
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
			if ($this->communication->imagefrom != 0) {
				$imageFrom = $this->communication->imagefrom;
			} else {
				$tmpImage = $this->model->getMaxChild($this->children);
				$imageFrom = $tmpImage + 1;
			}

			$this->model->imageUpload($this->image, $imageFrom, $file_name, $this->member->member_id);

			$width = 90;
			// 元画像のファイルサイズを取得
			list($image_w, $image_h) = getimagesize($path);

			//元画像の比率を計算し、高さを設定
			$proportion = $image_w / $image_h;
			$height = $width / $proportion;

			//高さが幅より大きい場合は、高さを幅に合わせ、横幅を縮小
			if($proportion < 1){
				$height = $width;
				$width = $width * $proportion;
			}

			$thumb_image = imagecreatetruecolor($width, $height);

			// サムネイル画像の出力
			if ($ext === 'png') {
				$image = imagecreatefrompng($path);
				imagecopyresampled($thumb_image, $image, 0, 0, 0, 0,
					$width, $height,
					$image_w, $image_h);

				imagepng($thumb_image, $this->imagePath . 'thumbnail/' . $file_name);
			} elseif ($ext === 'jpg' || $ext === 'jpeg') {
				$image = imagecreatefromjpeg($path);
				imagecopyresampled($thumb_image, $image, 0, 0, 0, 0,
					$width, $height,
					$image_w, $image_h);

				imagejpeg($thumb_image, $this->imagePath . 'thumbnail/' . $file_name);
			} else {
				$image = imagecreatefromgif($path);
				imagecopyresampled($thumb_image, $image, 0, 0, 0, 0,
					$width, $height,
					$image_w, $image_h);

				imagegif($thumb_image, $this->imagePath . 'thumbnail/' . $file_name);
			}
			imagedestroy($image);
			$this->communication->image_number = $this->communication->image_number + 1;

			$maxNumber = $this->model->getImageMaxNumber($this->image);
			$this->model->setImage($this->children, $maxNumber+1, $this->member->member_id);
			$this->communication->isupload = 1;
		} catch (RuntimeException $e) {
			echo $e->getMessage();
		}
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
