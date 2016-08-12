<?php
require_once 'Zend/Json.php';
require_once 'Zend/Form/Element/Hash.php';
require_once 'Zend/Session/Namespace.php';
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/common.php');
class BeginnerController extends Zend_Controller_Action {
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
		$this->view->title = htmlspecialchars('初心者向け情報', ENT_QUOTES);
	}
	
	public function ircsettingsAction() {
		$this->view->title = htmlspecialchars('IRC接続方法', ENT_QUOTES);
	}
	
	public function yaruoindexAction() {
		$this->view->title = htmlspecialchars('AoCHD版やる夫まとめ', ENT_QUOTES);
	}
	
	public function yaruobeginnerindexAction() {
		$this->view->title = htmlspecialchars('【AoC】やる夫が征服王を目指すようです【HD】', ENT_QUOTES);
	}
	
	public function yaruobeginner1Action() {
		$this->view->title = htmlspecialchars('やる夫がAoCHDにデビューしたようです', ENT_QUOTES);
	}
	
	public function yaruobeginner2Action() {
		$this->view->title = htmlspecialchars('やる夫がJP部屋にデビューしたようです', ENT_QUOTES);
	}
	
	public function yaruobeginner3Action() {
		$this->view->title = htmlspecialchars('やる夫が内政練習を始めたようです', ENT_QUOTES);
	}
	
	public function beginnerprofchar1Action() {
		$this->view->title = htmlspecialchars('閑話休題 登場人物紹介', ENT_QUOTES);
	}
	
	public function yaruobeginner4Action() {
		$this->view->title = htmlspecialchars('やる夫が23弓の練習を始めたようです', ENT_QUOTES);
	}

	public function yaruobeginner5Action() {
		$this->view->title = htmlspecialchars('やる夫が30騎士練習を始めたようです', ENT_QUOTES);
	}

	public function yaruobeginner6Action() {
		$this->view->title = htmlspecialchars('やる夫がテンプレを対人で試すようです', ENT_QUOTES);
	}
	
	public function howtomaketeamAction() {
	    $this->view->title = htmlspecialchars('カリスマ☆ホスト　虎の巻　－for AOCHD.jp－', ENT_QUOTES);
	}

	public function tssettingsAction() {
		$this->view->title = htmlspecialchars('TS導入方法', ENT_QUOTES);
	}

	public function hdupAction() {
		$this->view->title = htmlspecialchars('HDUP導入方法', ENT_QUOTES);
	}

	public function hdcompAction() {
		
	}
}