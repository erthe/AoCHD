<?php
require_once 'Zend/Json.php';
require_once 'Zend/Form/Element/Hash.php';
require_once 'Zend/Session/Namespace.php';
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/common.php');
class CommunityController extends Zend_Controller_Action {
	public $model;
	private $function;

	/**
	 *
	 */
	public function init() {
		$root_dir = dirname(dirname(__FILE__)) . '/';
		require_once ($root_dir . 'models/CommunityModel.php');
		$this->model = new CommunityModel ();
		initPage($this, '/application/modules/');
		$this->function = new Zend_session_Namespace('function');
	}
	
	public function indexAction() {
		$livers = $this->model->getLiver('aoc_stream');
		$paginator = Zend_Paginator::factory($livers);
		$paginator->setItemCountPerPage(30);
		$paginator->setCurrentPageNumber($this->_getParam('page'));
		$pages = $paginator->getPages();
		$pageArray = get_object_vars($pages);

		$this->view->pages = $pageArray;
		$this->view->livers = $paginator->getIterator();
		$this->view->title = htmlspecialchars('配信者一覧', ENT_QUOTES);
	}

	public function searchAction() {
		$params = $this->getRequest()->getParams();

		if ($params) {
			$searchMembers = $this->model->searchLiver('aoc_stream', $params['search_name']);
		}

		$this->view->livers = $searchMembers;
	}
	
	public function registorAction() {
		$this->view->title = htmlspecialchars('配信者情報登録', ENT_QUOTES);
	}
	
	public function passwordAction() {
		$params = $this->getRequest ()->getParams ();
		$this->function->stream_id = $params['id'];
		$this->function->mode = $params['mode'] ;

		$tokenHandler = new Custom_Auth_Token;
		$this->view->token = $tokenHandler->getToken('password');
	}
	
	public function passwordauthAction() {
		$params = $this->getRequest()->getParams();
		// Get token and tag from request for authentication
		$token = $params ['token'];
		$tag = $params ['action_tag'];

		// Validate token
		$tokenHandler = new Custom_Auth_Token ();
		if (! $tokenHandler->validateToken ( $token, $tag )) {
			return $this->_forward ( 'errorcsrf', 'index', 'error' );
		}

		$isAuth = $this->model->passwordAuth('aoc_stream', $params);
		if (!$isAuth) {
			return $this->_forward('inputerror', 'index', 'error');
		}

		switch ($this->function->mode) {
			case 'edit':
				$this->view->mode = 'changeinfo';
				break;

			case 'delete':
				$this->view->mode = 'deleteconfirm';
				break;

			case 'password':
				$this->view->mode = 'changepassword';
				break;

			default:
				return $this->_forward('inputerror', 'index', 'error');
		}
	}
	
	public function changeinfoAction() {
		$params = $this->getRequest()->getParams();
		if (!empty($this->function->stream_id)) {
			$info = $this->model->getStreamInfo('aoc_stream', $this->function->stream_id);
		} else {
			$info = null;
		}

		$tokenHandler = new Custom_Auth_Token;
		$this->view->token = $tokenHandler->getToken('changeinfo');
		$this->view->info = $info;
	}
	
	public function editinfoAction() {
		$params = $this->getRequest()->getParams();
		// Get token and tag from request for authentication
		$token = $params ['token'];
		$tag = $params ['action_tag'];

		// Validate token
		$tokenHandler = new Custom_Auth_Token ();
		if (! $tokenHandler->validateToken ( $token, $tag )) {
			return $this->_forward ( 'errorscrf', 'index', 'error' );
		}

		if (empty($params['name']) || empty($params['stream_id'])) {
			return _forward('inputerror', 'inddex', 'error');
		}

		if(empty($this->function->stream_id)) {
			$pwd = getRandomString(5);
			$this->model->streamInsert('aoc_stream', $params, $pwd);
			$this->view->password = $pwd;
		} else {
			$this->model->streamUpdate('aoc_stream', $this->function->stream_id, $params);
			$this->view->password = null;
			$this->function->stream_id = null;
		}

	}
	
	public function deleteconfirmAction() {
		$params = $this->getRequest()->getParams();
		$tokenHandler = new Custom_Auth_Token;
		$this->view->token = $tokenHandler->getToken('deleteconfirm');
		$this->view->id = $params['id']['id'];
	}
	
	public function deleteinfoAction() {
		$params = $this->getRequest()->getParams();
		// Get token and tag from request for authentication
		$token = $params ['token'];
		$tag = $params ['action_tag'];

		// Validate token
		$tokenHandler = new Custom_Auth_Token ();
		if (! $tokenHandler->validateToken ( $token, $tag )) {
			return $this->_forward ( 'errorcsrf', 'index', 'error' );
		}

		$this->model->streamDelete('aoc_stream', $params['id']);
	}

	public function changepasswordAction() {
		$tokenHandler = new Custom_Auth_Token;
		$this->view->token = $tokenHandler->getToken('changepassword');
}

	public function editpasswordAction() {
		$params = $this->getRequest()->getParams();
		// Get token and tag from request for authentication
		$token = $params ['token'];
		$tag = $params ['action_tag'];

		// Validate token
		$tokenHandler = new Custom_Auth_Token ();
		if (! $tokenHandler->validateToken ( $token, $tag )) {
			return $this->_forward ( 'errorscrf', 'index', 'error' );
		}

		$this->model->passwordUpdate('aoc_stream', $this->function->stream_id, $params);
		$this->function->stream_id = null;
	}

	public function initpasswordAction() {
		$params = $this->getRequest()->getParams();

		$pwd = getRandomString(5);

		$this->model->initPassword('aoc_stream', $pwd, $params['id']);
		$this->view->pwd = $pwd;
	}

	public function livelistAction() {
		$caveLivers = $this->model->getLivers('aoc_stream', 'CaveTube');
		$twitchLivers = $this->model->getLivers('aoc_stream', 'Twitch');
		$mixerLivers = $this->model->getLivers('aoc_stream', 'Mixer');
		$youtubeLivers = $this->model->getLivers('aoc_stream', 'YouTube');

		$this->view->cavetubers = json_encode($caveLivers);
		$this->view->twitchers = json_encode($twitchLivers);
		$this->view->mixers = json_encode($mixerLivers);
		$this->view->youtubers = json_encode($youtubeLivers);
		$this->view->title = 'ライブ配信者一覧';

	}
}
