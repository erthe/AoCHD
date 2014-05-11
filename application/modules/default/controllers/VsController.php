<?php
require_once 'Zend/Json.php';
require_once 'Zend/Form/Element/Hash.php';
require_once 'Zend/Session/Namespace.php';
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/common.php');

class VsController extends Zend_Controller_Action {
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
	
	public function versusAction() {
		$players = $this->model->getList('player', '0', 'delete_flag', null);
		$this->view->title = htmlspecialchars('VSプレイヤー', ENT_QUOTES);
		$this->view->json = Zend_Json::encode($players);
	}
	
	public function versusresultAction() {
		$params = $this->getRequest ()->getParams ();
		$player_info = $this->model->getInfo('player', $params['player_id1'], null);
		$rival_info = $this->model->getInfo('player', $params['player_id2'], null);
	
		$where = 'player1_id =' . $params['player_id1'];
		$where .= ' or player2_id =' . $params['player_id1'];
		$where .= ' or player3_id =' . $params['player_id1'];
		$where .= ' or player4_id =' . $params['player_id1'];
		$where .= ' or player5_id =' . $params['player_id1'];
		$where .= ' or player6_id =' . $params['player_id1'];
		$where .= ' or player7_id =' . $params['player_id1'];
		$where .= ' or player8_id =' . $params['player_id1'];
		$players = $this->model->searchlist('gamelog', $where, 0, 'game_status', 'gamelog_id desc');
	
		$idx = 0;
		$vsidx = 0;
		$win_team = null;
		$lose_team = null;
		$versus_log = null;
		$victory_list = null;
		$defeated_list = null;
		$player1_win = 0;
		$player1_lose = 0;
		$streak = 0;
		$win_streak = 0;
		$lose_streak = 0;
	
		foreach($players as $array => $list) {
			$win_member = 0;
			$lose_member = 0;
			$win_id = 0;
			$lose_id = 0;
			$win_rate = 0;
			$lose_rate = 0;
			$win_rate_id = 0;
			$lose_rate_id = 0;
			$player_team = null;
			$rival_team = null;
			$i = 1;
			$j = 1;
			$k = 1;
			$m = 1;
			$o = 1;
	
			foreach($list as $key => $value) {
	
				if($key === 'win_team'){
					$temp_win_team[$idx]['team'] = $value;
				}
	
				if($key === 'lose_team'){
					$temp_lose_team[$idx]['team'] = $value;
				}
	
				if($key === 'player'.$i.'_team' && !is_null($value)){
					if($value === $temp_win_team[$idx]['team']){
						${'player'.$i.'_team'} = $temp_win_team[$idx]['team'];
					} elseif(!is_null($value)) {
						${'player'.$i.'_team'} = $temp_lose_team[$idx]['team'];
					}
					$i++;
	
				} elseif($key === 'player'.$i.'_team'){
					$i++;
				}
	
				if($key === 'player'.$j.'_name' && !is_null($value)){
					if(${'player'.$j.'_team'} == $temp_win_team[$idx]['team']){
						$temp_win_team[$idx]['member_' . $win_member] = $value;
						$win_member++;
					} elseif(!is_null($value)){
						$temp_lose_team[$idx]['member_' . $lose_member] = $value;
						$lose_member++;
					}
					$j++;
				} elseif ($key === 'player'.$j.'_name') {
					$j++;
				}
	
				if($key === 'player'.$k.'_id' && !is_null($value)){
					if(${'player'.$k.'_team'} === $temp_win_team[$idx]['team']){
						$temp_win_team[$idx]['id_' . $win_id] = $value;
						$is_win = true;
						$win_id++;
					} elseif(!is_null($value)) {
						$temp_lose_team[$idx]['id_' . $lose_id] = $value;
						$is_win = false;
						$lose_id++;
					}
						
					if($value == $params['player_id1']){
						if($is_win){
							$player_team = $list['win_team'];
						} else {
							$player_team = $list['lose_team'];
						}
						$player_team = array('team' => $player_team, 'win_flag' => $is_win);
	
					}
						
					if($value == $params['player_id2']){
						if($is_win){
							$rival_team = $list['win_team'];
						} else {
							$rival_team = $list['lose_team'];
						}
						$rival_team = array('team' => $rival_team, 'win_flag' => $is_win);
					}
						
					$k++;
				} elseif ($key === 'player'.$k.'_id') {
					$k++;
				}
					
				if($key === 'player'.$o.'_rate_id' && !is_null($value)){
					if(${'player'.$o.'_team'} === $temp_win_team[$idx]['team']){
						$temp_win_team[$idx]['rate_id_' . $win_rate_id] = $value;
						$win_rate_id++;
					} elseif(!is_null($value)) {
						$temp_lose_team[$idx]['rate_id_' . $lose_rate_id] = $value;
						$lose_rate_id++;
					}
					$o++;
				} elseif($key === 'player'.$m.'_rate_id') {
					$o++;
				}
					
				if($key === 'player'.$m.'_rate' && !is_null($value)){
					if(${'player'.$m.'_team'} === $temp_win_team[$idx]['team']){
						$temp_win_team[$idx]['rate_' . $win_rate] = $value;
	
						$win_rate++;
					} elseif(!is_null($value)) {
						$temp_lose_team[$idx]['rate_' . $lose_rate] = $value;
						$lose_rate++;
					}
					$m++;
				} elseif($key === 'player'.$m.'_rate') {
					$m++;
				}
	
				$temp_win_team[$idx]['num_member'] = $win_member;
				$temp_lose_team[$idx]['num_member'] = $lose_member;
					
			}
				
			// check player_id2 is including or not
			if(!is_null($rival_team)){
				if(($params['mode'] === 'VS' && $player_team['team'] != $rival_team['team']) ||
				($params['mode'] === 'AND' && $player_team['team'] == $rival_team['team']) ) {
					$is_versus = true;
					if($player_team['win_flag']){
						$player1_win++;
						if($streak < 0) {
							if($streak < $lose_streak){
								$lose_streak = $streak;
							}
							$streak = 1;
						} else {
							$streak++;
						}
					} else {
						$player1_lose++;
						if($streak > 0) {
							if($streak > $win_streak){
								$win_streak = $streak;
							}
							$streak = -1;
						} else {
							$streak--;
						}
					}
					$win_team[$vsidx] = $temp_win_team[$idx];
					$lose_team[$vsidx] = $temp_lose_team[$idx];
					$versus_log[$vsidx] = $list;
					$vsidx++;
				}
			}
				
			// target player victory/ defeated list
			if ($player_team['win_flag'] == true){
				for ($lose_team_num=0; $lose_team_num < $temp_lose_team[$idx]['num_member']; $lose_team_num++){
					$victory_list[] = $temp_lose_team[$idx]['id_' . $lose_team_num];
				}
	
			} else {
				for ($win_team_num=0; $win_team_num < $temp_win_team[$idx]['num_member']; $win_team_num++){
					$defeated_list[] = $temp_win_team[$idx]['id_' . $win_team_num];
				}
			}
				
			$idx++;
		}
	
		if($player1_win == 0){
			$percent = 0;
		} elseif($player1_lose == 0){
			$percent = 100;
		} else {
			$percent = round($player1_win / ($player1_win + $player1_lose)*100, 3);
		}
	
		// set vs rivals data
		if ($streak > $win_streak) {
			$win_streak = $streak;
		} elseif ($streak < $lose_streak) {
			$lose_streak = $streak;
		}
		$lose_streak = $lose_streak * -1;
		$this->view->player_info = $player_info;
		$this->view->rival_info = $rival_info;
		$this->view->player1_win = $player1_win;
		$this->view->player1_lose = $player1_lose;
		$this->view->win_streak = $win_streak;
		$this->view->lose_streak = $lose_streak;
		$this->view->percent = $percent;
		$this->view->win_team = $win_team;
		$this->view->lose_team = $lose_team;
	
		$perpage = 5;
		if(!is_Null($versus_log)){
			$paginator = Zend_Paginator::factory($versus_log);
			$paginator->setItemCountPerPage($perpage);
			$paginator->setCurrentPageNumber($this->_getParam('page'));
				
			$this->view->versuslog = $paginator->getIterator();
			$pages = $paginator->getPages();
			$pageArray = get_object_vars($pages);
			$this->view->pages = $pageArray;
			$this->view->perpage = $perpage;
		} else {
			$this->view->versuslog = $versus_log;
		}
	
		$this->view->page_info = Zend_Json::encode($params);
	
		// set best / worst player
		$player_list = $this->model->getList('player', '0', 'delete_flag', null);
	
		if(!is_null($victory_list)){
			$temp_best= array_count_values($victory_list);
			arsort($temp_best);
				
			for ($win_sort=0; $win_sort < 5; $win_sort++){
				foreach($player_list as $list){
					if(key(array_slice($temp_best, $win_sort, 1, true)) == $list['player_id']){
						$best[$win_sort] = array(
								'player_name' => $list['player_name'],
								'player_id' => $list['player_id'],
								'rate_id' => $list['rate_id'],
								'win_number' => current(array_slice($temp_best, $win_sort, 1, true)));
	
						break;
					}
						
				}
			}
		} else {
			$best = null;
		}
	
		if(!is_Null($defeated_list)){
			$temp_worst = array_count_values($defeated_list);
			arsort($temp_worst);
				
			for ($lose_sort=0; $lose_sort < 5; $lose_sort++){
				foreach($player_list as $list){
					if(key(array_slice($temp_worst, $lose_sort, 1, true)) == $list['player_id']){
						$worst[$lose_sort] = array(
								'player_name' => $list['player_name'],
								'player_id' => $list['player_id'],
								'rate_id' => $list['rate_id'],
								'lose_number' => current(array_slice($temp_worst, $lose_sort, 1, true)));
							
						break;
					}
						
				}
			}
		} else {
			$worst = null;
		}
	
		if(!is_Null($best) || !is_Null($worst)){
			if(!is_Null($best) && !is_Null($worst)){
				$temp_total = array_merge($victory_list, $defeated_list);
			} elseif(!is_Null($best)){
				$temp_total = $victory_list;
			} else {
				$temp_total = $defeated_list;
			}
				
			$total = array_count_values($temp_total);
			arsort($total);
				
			for ($total_sort=0; $total_sort < count($best); $total_sort++){
				foreach($total as $key => $value){
					if($best[$total_sort]['player_id'] == $key){
						if($best[$total_sort]['win_number'] == 0){
							$percent = 0;
						} elseif($value == 0){
							$percent = 100;
						} else {
							$percent = round($best[$total_sort]['win_number'] / $value * 100, 3);
						}
	
						$best[$total_sort]['percent'] = $percent;
							
						break;
					}
						
				}
			}
				
			for ($total_sort=0; $total_sort < count($worst); $total_sort++){
				foreach($total as $key => $value){
					if($worst[$total_sort]['player_id'] == $key){
						if($worst[$total_sort]['lose_number'] == 0){
							$percent = 100;
						} elseif($value == 0){
							$percent = 0;
						} else {
							$percent = round($worst[$total_sort]['lose_number'] / $value * 100, 3);
						}
	
						$worst[$total_sort]['percent'] = $percent;
	
						break;
					}
	
				}
			}
		}
	
		$this->view->best = $best;
		$this->view->worst = $worst;
	}
}