<?php
require_once 'Zend/Json.php';
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/common.php');
class User_GameController extends Zend_Controller_Action {
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

	public function gamemanageAction() {
		logincheck ( 'user', $this );
		$this->view->user = htmlspecialchars(true, ENT_QUOTES);
		$games = $this->model->getList('gamelog', '1', 'game_status', null);
	
		$this->view->title = 'ゲームの編集';
		$this->view->games = $games;
		$this->view->gamereport = htmlspecialchars(dirname (dirname(__FILE__)) . '/' . 'views/game/gamereport.tpl', ENT_QUOTES);
	}
	
	public function userreportAction() {
		$lgnchk = logincheck ( 'user', $this );
		if(!$lgnchk) {
			return false;
		}
		$params = $this->getRequest ()->getParams ();
	
		$id = $params['gamelog_id'];
		$game = $this->model->getInfo('gamelog', $id, null);
	
		$team1 = null;
		$team2 = null;
		$team1_member = 0;
		$team2_member = 0;
		$i = 1;
		$j = 1;
	
		foreach($game as $key => $value) {
			if($key === 'player'.$i.'_team' && !is_null($value)){
				if($value == 1){
					${'player'.$i.'_team'} = 1;
				} elseif(!is_null($value)) {
					${'player'.$i.'_team'} = 2;
				}
				$i++;
					
			} elseif($key === 'player'.$i.'_team'){
				$i++;
			}
	
			if($key === 'player'.$j.'_name' && !is_null($value)){
				if(${'player'.$j.'_team'} == 1){
					$team1['member_' . $team1_member] = htmlspecialchars($value, ENT_QUOTES);
					$team1_member++;
				} elseif(!is_null($value)){
					$team2['member_' . $team2_member] = htmlspecialchars($value, ENT_QUOTES);
					$team2_member++;
				}
				$j++;
			} elseif ($key === 'player'.$j.'_name') {
				$j++;
			}
	
			$team1['num_member'] = $team1_member;
			$team2['num_member'] = $team2_member;
	
		}
	
		$tokenHandler = new Custom_Auth_Token;
		$this->view->token = Zend_Json::encode($tokenHandler->getToken('userreport'));
		$this->view->team1 =  Zend_Json::encode($team1);
		$this->view->team2 = Zend_Json::encode($team2);
	
		$this->view->item = Zend_Json::encode($game);
		$this->view->now = Zend_Json::encode(date('Y-m-d H:i:s'));
	}
	
	public function reportAction() {
		logincheck ( 'user', $this );
		$params = $this->getRequest ()->getParams ();
	
		// Get token and tag from request for authentication
		$token = $params['token'];
		$tag = $params['action_tag'];
	
		// Validate token
		$tokenHandler = new Custom_Auth_Token();
		if (!$tokenHandler->validateToken($token,$tag)) {
			return $this->_forward ( 'passworderror', 'error', 'error' );
		}
		$this->view->result = htmlspecialchars(report($params, $this), ENT_QUOTES);
	
	}
	
	public function usercancelAction() {
		$params = $this->getRequest ()->getParams ();
		$log = array (
				'gamelog_id' => $params ['game_id'],
				'game_status' => 2,
		);
	
		$result = $this->model->update('gamelog', $log);
		$this->view->result = htmlspecialchars($result, ENT_QUOTES);
	}
	
	public function replaymanageAction(){
		$where = 'replay_id is not null';
		$sort = 'gamelog_id DESC';
		$games = $this->model->searchList('gamelog', $where, null, null, $sort);
	
		$result = TeamDevide($games);
	
		$paginator = Zend_Paginator::factory($games);
	
		// set maximum items to be displayed in a page
		$perpage = 5;
		$paginator->setItemCountPerPage($perpage);
		$paginator->setCurrentPageNumber($this->_getParam('page'));
		$pages = $paginator->getPages();
		$pageArray = get_object_vars($pages);
	
		$this->view->pages = $pageArray;
		$this->view->perpage = $perpage;
		$this->view->title = "リプレイの管理";
		$this->view->games = $paginator->getIterator();
		$this->view->team1 = $result[0];
		$this->view->team2 = $result[1];
	}
	
	public function replaydeleteAction() {
		$params = $this->getRequest()->getParams();
	
		$data = array (
				'gamelog_id' => $params ['gamelog_id'],
				'replay_id' => null
		);
		$result = $this->model->update ( 'gamelog', $data );
		$data_dir = str_replace('/application/modules/default', '', dirname (dirname(__FILE__))) . '/data/replay/';
		unlink($data_dir.$params['replay_id'].'.html');
	}
}