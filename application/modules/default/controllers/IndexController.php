<?php
require_once 'Zend/Json.php';
require_once 'Zend/Form/Element/Hash.php';
require_once 'Zend/Session/Namespace.php';
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/common.php');

class IndexController extends Zend_Controller_Action {
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
	
	/**
	 * index
	 */
	public function indexAction() {
		$games = $this->model->getList('gamelog', '1', 'game_status', null);
		$result = TeamDevide($games);
		
		$this->view->games = $games;
		$this->view->team1 = $result[0];
		$this->view->team2 = $result[1];
		
		$notes = $this->model->getList('updatelog', '0', 'delete_flag', 'update_date DESC');
		$paginator = Zend_Paginator::factory($notes);
		
		// set maximum items to be displayed in a page
		$paginator->setItemCountPerPage(20);
		$paginator->setCurrentPageNumber($this->_getParam('page'));
		$pages = $paginator->getPages();
		$pageArray = get_object_vars($pages);
		
		$dirname = dirname( dirname( dirname( dirname( dirname(__FILE__) ) ) ) );
		$words = explode("\n", file_get_contents($dirname.'/themes/images/top/description.txt'));
		$max_num = count($words) - 1;
		$random = mt_rand(0, $max_num);
		
		$this->view->description = htmlspecialchars($words[$random]);
		$this->view->img_num = htmlspecialchars($random);
		
		$this->view->pages = $pageArray;
		$this->view->notes = $paginator->getIterator ();
		
		$this->view->title = htmlspecialchars('AoCHD', ENT_QUOTES);
	}
	
	public function todayAction(){
		$today = date("Y-m-d H:i:s");
		$yesterday = date("Y-m-d H:i:s",strtotime("-1 day"));
		
		$where = "created_on >= '$yesterday' and game_status != '2'" ;
		$sort = 'gamelog_id DESC';
		$games = $this->model->searchList('gamelog', $where, null, null, $sort);
		
		$result = TeamDevide($games);
		
		$this->view->title = "今日のゲーム";
		$this->view->games = $games;
		$this->view->team1 = $result[0];
		$this->view->team2 = $result[1];
	}
	
	public function uploadAction(){
		$params = $this->getRequest()->getParams();
		$uploader = $_SERVER["REQUEST_URI"] . '../../../../../../recs/index.php?gamelog_id='.$params['gamelog'];
		header("Location: $uploader");
	}
	
	public function aboutAction() {
		$user = $this->model->getList('user', '0', 'delete_flag', null);
		
		$this->view->items = $user;
		$this->view->title = htmlspecialchars('サイト説明', ENT_QUOTES);
	}
	
	public function firstplayerAction() {
		$this->view->title = htmlspecialchars('初心者向け情報', ENT_QUOTES);
	}

}
?>
