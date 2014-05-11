<?php
require_once 'Zend/Json.php';
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/common.php');
class Admin_GamelogController extends Zend_Controller_Action {
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
	public function closedgamemanageAction() {
		$lgnchk = admincheck ( 'admin', $this );
		if(!$lgnchk) {
			return $this->_forward ( 'login', 'index', 'admin' );
		}
	
		$this->view->member = htmlspecialchars(true, ENT_QUOTES);
		$this->view->admin = htmlspecialchars(true, ENT_QUOTES);
		$games = $this->model->getList('gamelog', null, null, 'gamelog_id desc');
		$paginator = Zend_Paginator::factory ( $games );
	
		// set maximum items to be displayed in a page
		$paginator->setItemCountPerPage (20);
		$paginator->setCurrentPageNumber ( $this->_getParam ( 'page' ) );
		$pages = $paginator->getPages ();
		$pageArray = get_object_vars ( $pages );
	
		$this->view->pages = $pageArray;
		$this->view->items = $paginator->getIterator ();
	
		$this->view->changegamelog = htmlspecialchars(dirname (dirname(__FILE__)) . '/' . 'views/gamelog/changegamelog.tpl', ENT_QUOTES);
		$this->view->title = htmlspecialchars('終了したゲームの編集', ENT_QUOTES);
	}
	
	public function closedgameeditAction() {
		$params = $this->getRequest ()->getParams ();
		$id = $params['gamelog_id'];
		$game = $this->model->getInfo('gamelog', $id, null);
	
		$team1 = null;
		$team2 = null;
		$team1_member = 0;
		$team2_member = 0;
		$i = 1;
		$j = 1;
		$n = 1;
	
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
					$team1['number_' . $team1_member] = $n;
					$team1_member++;
				} elseif(!is_null($value)){
					$team2['member_' . $team2_member] = htmlspecialchars($value, ENT_QUOTES);
					$team2['number_' . $team2_member] = $n;
					$team2_member++;
				}
				$j++;
				$n++;
			} elseif ($key === 'player'.$j.'_name') {
				$j++;
				$n++;
			}
	
			$team1['num_member'] = Zend_Json::encode($team1_member);
			$team2['num_member'] = Zend_Json::encode($team2_member);
	
		}
	
		$tokenHandler = new Custom_Auth_Token;
		$this->view->token = htmlspecialchars($tokenHandler->getToken('closedgameedit'), ENT_QUOTES);
		$this->view->team1 = Zend_Json::encode($team1);
		$this->view->team2 = Zend_Json::encode($team2);
	
		$this->view->item = Zend_Json::encode($game);
		$this->view->now = Zend_Json::encode(date('Y-m-d H:i:s'));
	}
	
	public function reporteditAction() {
		$lgnchk = admincheck ( 'admin', $this );
		if(!$lgnchk) {
			return $this->_forward ( 'erroradmin', 'index', 'error' );
		}
	
		$params = $this->getRequest ()->getParams ();
		$adapter = dbadapter();
		$param = dbconnect();
			
		$db = Zend_Db::factory( $adapter, $param );
		$db->beginTransaction();
	
		$gamelog_id = $params['gamelog_id'];
		$game = $this->model->getInfo ('gamelog', $gamelog_id, null);
	
		// get edit mode
		switch ($params['game_status']) {
			case '0':
				if ($game['game_status'] == 1){
					$update_flag = false;
					break;
				}
				$game_status = 1;
				$win_team = 'null';
				$lose_team = 'null';
				$update_flag = true;
				break;
	
			case '1':
				if ($game['game_status'] == 0 && $game['win_team'] == 1){
					$update_flag = false;
					break;
				}
				$game_status = 0;
				$win_team = 1;
				$lose_team = 2;
				$update_flag = true;
				break;
	
			case '2':
				if ($game['game_status'] == 0 && $game['win_team'] == 2){
					$update_flag = false;
					break;
				}
				$game_status = 0;
				$win_team = 2;
				$lose_team = 1;
				$update_flag = true;
				break;
	
			case '3':
				if ($game['game_status'] == 2){
					$update_flag = false;
					break;
				}
				$game_status = 2;
				$win_team = 'null';
				$lose_team = 'null';
				$update_flag = true;
				break;
	
			default:
				$update_flag = false;
				break;
		}
	
		$count_team1member = 0;
		$count_team2member = 0;
		$team1_sum = 0;
		$team2_sum = 0;
		$member_change_flag = false;
		$player1_team = $game['player1_team'];
		$player2_team = $game['player2_team'];
		$player3_team = $game['player3_team'];
		$player4_team = $game['player4_team'];
		$player5_team = $game['player5_team'];
		$player6_team = $game['player6_team'];
		$player7_team = $game['player7_team'];
		$player8_team = $game['player8_team'];
	
		// check team member change
		foreach($params as $key => $value) {
			if($key === 'member_'.$count_team1member.'_team1'){
				if($params['team1_member_'.$count_team1member.'_member'] != ''){
					if($value != $game['player'.$params['team1_member_'.$count_team1member.'_member'].'_team'] && $game['player'.$params['team1_member_'.$count_team1member.'_member'].'_team'] != null) {
						${'player'.$params['team1_member_'.$count_team1member.'_member'].'_team'} = $params['member_'.$count_team1member.'_team1'];
						${'team'.${'player'.$params['team1_member_'.$count_team1member.'_member'].'_team'}.'_sum'} = ${'team'.${'player'.$params['team1_member_'.$count_team1member.'_member'].'_team'}.'_sum'} + $game['player'.$params['team1_member_'.$count_team1member.'_member'].'_rate'];
						$member_change_flag = true;
	
						if(!$update_flag) {
							$game_status = $game['game_status'];
							$win_team = $game['win_team'];
							$lose_team = $game['lose_team'];
						}
	
						$update_flag = true;
					} else {
						if(!is_null($game['player'.$params['team1_member_'.$count_team1member.'_member'].'_team'])){
							${'player'.$params['team1_member_'.$count_team1member.'_member'].'_team'} = $game['player'.$params['team1_member_'.$count_team1member.'_member'].'_team'];
							$team1_sum = $team1_sum + $game['player'.$params['team1_member_'.$count_team1member.'_member'].'_rate'];
						}
					}
				}
				$count_team1member++;
			} elseif($key === 'member_'.$count_team2member.'_team2') {
				if($params['team2_member_'.$count_team2member.'_member'] != ''){
					if($value != $game['player'.$params['team2_member_'.$count_team2member.'_member'].'_team'] && $game['player'.$params['team2_member_'.$count_team2member.'_member'].'_team'] != null) {
						${'player'.$params['team2_member_'.$count_team2member.'_member'].'_team'} = $params['member_'.$count_team2member.'_team2'];
						${'team'.${'player'.$params['team2_member_'.$count_team2member.'_member'].'_team'}.'_sum'} = ${'team'.${'player'.$params['team2_member_'.$count_team2member.'_member'].'_team'}.'_sum'} + $game['player'.$params['team2_member_'.$count_team2member.'_member'].'_rate'];
						$member_change_flag = true;
	
						if(!$update_flag) {
							$game_status = $game['game_status'];
							$win_team = $game['win_team'];
							$lose_team = $game['lose_team'];
						}
	
						$update_flag = true;
					} else {
						${'player'.$params['team2_member_'.$count_team2member.'_member'].'_team'} = $game['player'.$params['team2_member_'.$count_team2member.'_member'].'_team'];
						$team2_sum = $team2_sum + $game['player'.$params['team2_member_'.$count_team2member.'_member'].'_rate'];
					}
				}
				$count_team2member++;
			}
				
		}
	
		if ($update_flag) {
			if($member_change_flag) {
				$team1_rate = $team1_sum;
				$team2_rate = $team2_sum;
			} else {
				$team1_rate = $game['team1_rate'];
				$team2_rate = $game['team2_rate'];
			}
				
			try {
				// edit gamelog
				$log = array (
						'gamelog_id' => $gamelog_id,
						'game_status' => $game_status,
						'game_end' => $params ['game_end'],
						'win_team' => $win_team,
						'lose_team' => $lose_team,
				);
	
				if($member_change_flag) {
					$log += array('team1_rate' => $team1_rate,
							'team2_rate' => $team2_rate,
							'player1_team' => $player1_team,
							'player2_team' => $player2_team,
							'player3_team' => $player3_team,
							'player4_team' => $player4_team,
							'player5_team' => $player5_team,
							'player6_team' => $player6_team,
							'player7_team' => $player7_team,
							'player8_team' => $player8_team
					);
				}
	
				$result1 = $this->model->update('gamelog', $log);
	
				// get rate info from DB
				$search_player_id = 'player_id = ';
				$orflag = false;
				$num = 0;
	
				foreach($game as $key => $value){
					if(preg_match('/^player[0-9]_id$/', $key) && !is_null($value)) {
						if ($orflag){
							$search_player_id = $search_player_id . ' or player_id = ';
						}
						$search_player_id = $search_player_id . $value;
						$orflag = true;
						$num++;
					}
	
				}
	
				// rate reset before apply new result
				//if ($game_status == 0) {
				
				$player = $this->model->joinInfos ('player', array('rate'), $search_player_id, 'delete_flag', 0, null);
				$result2 = 0;
	
				// apply new game result
				foreach($player as $array) {
					// search target's id & player index
					foreach($game as $key => $value){
						if($array['player_id'] == $value && preg_match('/^player[0-9]_id$/', $key)){
							$index_key = explode('player', $key);
							$search_key = str_replace('_id', '', $index_key[1]);
							break;
						}
					}
	
					$update = array(
							'rate_id' => $array['rate_id'],
							'rate' => $game['player'.$search_key.'_rate'],
							'win' => $game['player'.$search_key.'_win'],
							'lose' => $game['player'.$search_key.'_lose'],
							'streak' => $game['player'.$search_key.'_streak'],
							'win_streak' => $game['player'.$search_key.'_win_streak'],
							'lose_streak' => $game['player'.$search_key.'_lose_streak']
					);
	
					$result2 = $result2 + $this->model->update('rate', $update);
				}
	
				switch($game_status) {
					case 1: case 2:
						$result3 = $result2;
						break;
	
					case 0:
						$fixedgame = $this->model->getInfo ('gamelog', $gamelog_id, null);

						$set_params = array(
								'win_team' => $win_team,
								'game_id' => $gamelog_id,
								'end_time' =>$params['game_end'],
								'created_on' => $params['game_start'],
								'option' => null
						);
							$fixedresult = report($set_params, $this);
							$result3 = $result2;
						
						break;
							
					default:
						$result3 = 0;
						break;
				}
	
				$this->view->result = htmlspecialchars($result3, ENT_QUOTES);
				$db->commit();
	
			}  catch (Exception $e) {
				$db->rollBack();
				echo $e->getMessage();
			}
		} else {
			$this->view->result = htmlspecialchars(0, ENT_QUOTES);
		}
	
	}
}