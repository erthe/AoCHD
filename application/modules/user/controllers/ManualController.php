<?php
require_once 'Zend/Json.php';
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/common.php');
class User_ManualController extends Zend_Controller_Action {
	public $model;

	/**
	 *
	 */
	public function init() {
		$root_dir = dirname(dirname(dirname(__FILE__))) . '/';
		require_once ($root_dir . 'default/models/IndexModel.php');
		$this->model = new IndexModel ();
		initPage($this, '/application/modules/');
	}

	/**
	 * index
	 */
	public function manualAction() {
		$this->view->title = htmlspecialchars('権限者用取説', ENT_QUOTES);
	}
	
	public function boomAction() {
		$this->view->title = htmlspecialchars('ブーム基準', ENT_QUOTES);
	}
	
	public function rushAction() {
		$this->view->title = htmlspecialchars('ラッシュ基準', ENT_QUOTES);
	}
	
	public function turtleAction() {
		$this->view->title = htmlspecialchars('タートル基準', ENT_QUOTES);
	}
	
	public function cheeseAction() {
		$this->view->title = htmlspecialchars('チーズ基準', ENT_QUOTES);
	}
	
}