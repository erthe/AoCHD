<?php
require_once 'Zend/Json.php';
require_once 'Zend/Form/Element/Hash.php';
require_once 'Zend/Session/Namespace.php';
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/common.php');

class TeamController extends Zend_Controller_Action {
	public $model;
	private $israte;

	/**
	 *
	 */
	public function init() {
		$root_dir = dirname(dirname(__FILE__)) . '/';
		require_once ($root_dir . 'models/IndexModel.php');
		$this->model = new IndexModel ();
		initPage($this, '/application/modules/');
		Zend_Session::start ();
		$this->israte = new Zend_session_Namespace('israte');
	}
	
	public function maketeamAction() {
		$tokenHandler = new Custom_Auth_Token;
		$this->view->token = $tokenHandler->getToken('maketeam');
		$players = $this->model->JoinList('player', array('rate'), 'delete_flag', '0', null, null, null);
		$this->view->title = htmlspecialchars('チームの作成', ENT_QUOTES);
		$this->view->json = Zend_Json::encode($players);
	
	}
	
	public function playerreloadAction() {
		$tokenHandler = new Custom_Auth_Token;
		$this->view->token = $tokenHandler->getToken('maketeam');
		$players = $this->model->JoinList('player', array('rate'), 'delete_flag', '0', null, null, null);
		$this->view->title = htmlspecialchars('チームの作成', ENT_QUOTES);
		$this->view->json = Zend_Json::encode($players);
	
	}
	
	public function matchingAction(){
		$params = $this->getRequest ()->getParams ();
		// Get token and tag from request for authentication
		$token = $params['token'];
		$tag = $params['action_tag'];
	
		// Validate token
		$tokenHandler = new Custom_Auth_Token();
		if (!$tokenHandler->validateToken($token,$tag)) {
			return $this->_forward ( 'errorgaming', 'index', 'error' );
		}
	
		$i = 0;
		$j = 0;
		$k = 0;
	
		foreach ($params as $key => $value){
			if(preg_match('/^rate[0-9]+$/', $key) && !empty($value)) {
				$rate[$i] = $value;
				$i++;
			} elseif(preg_match('/^player_name[0-9]+$/', $key) && !empty($value)) {
				$name[$j] = $value;
				$j++;
			} elseif(preg_match('/^player_id[0-9]+$/', $key) && !empty($value)) {
				$id[$k] = $value;
				$k++;
			}
				
		}
	
		$player_number = count($name);
		$list = [];
		
		for($list_num=0;$list_num<$player_number; $list_num++){
			$list[$list_num] = ['player_id' => $id[$list_num], 
								'player_name' => $name[$list_num], 
								'player_rate' => $rate[$list_num], 
								'team_number' => 2];
		}
		
		$is_underRate = false;
		$is_overRate = false;
		$is_beginner_rule = false;
		$sum_rate = 0;
		
		foreach ($list as $child) {
			if ($child['player_rate'] < 1300) {
				$is_underRate = true;
			} else if ($child['player_rate'] > 1800) {
				$is_overRate = true;
			}
			
			if ($child['player_rate'] < 1400) {
				$is_beginner_rule =true;
			}
			
			$sum_rate = $sum_rate + $value;
		}
		
		if ($is_underRate && $is_overRate) {
			$is_alert = 1;
		} else {
			$is_alert = 0;
		}
		
		if ($is_beginner_rule) {
			$is_ruled = 1;
		} else {
			$is_ruled = 0;
		}
	
		$player_half = floor($player_number / 2);

		// Brute force comparison
		$rate_diff = $this->calcurate_rate($list, 1) - $this->calcurate_rate($list, 2);
		
		$combinations = $this->combination($player_number, $player_half);
		
		$temp_list = $list;
		foreach ($combinations as $combination) {
			foreach ($combination as $value) {
				$temp_list[$value]['team_number'] = 1;
			}
			
			$team1_rate = $this->calcurate_rate($temp_list, 1);
			$team2_rate = $this->calcurate_rate($temp_list, 2);
			if (abs($rate_diff) > abs($team1_rate - $team2_rate)) {
				$list = $temp_list;
				$rate_diff = $team1_rate - $team2_rate;
			}
			
			foreach($temp_list as &$temp) {
				$temp['team_number'] = 2;
			}
			
		}
		
		$team1_rate = $this->calcurate_rate($list, 1);
		$team2_rate = $this->calcurate_rate($list, 2);
		
		for ($o=0; $o<$player_number;$o++){
			if($list[$o]['team_number'] == 1){
				$team1_list[] = array($list[$o]['player_id'], $list[$o]['player_name'], $list[$o]['player_rate'], $list[$o]['team_number']);
			} else {
				$team2_list[] = array($list[$o]['player_id'], $list[$o]['player_name'], $list[$o]['player_rate'], $list[$o]['team_number']);
			}
		}
	
		$cpype = 'チーム1: 【' . $team1_rate . '】 ';
		foreach($team1_list as $key => $value) {
			$cpype = $cpype . $value[1] . '(' . $value[2] . ') ';
		}
		$cpype = $cpype  . "チーム2: 【" . $team2_rate . '】 ';
		foreach ($team2_list as $key => $value) {
			$cpype = $cpype . $value[1] . '(' . $value[2] . ') ';
		}
	
		$tokenHandler = new Custom_Auth_Token;
		$this->view->token = $tokenHandler->getToken('matching');
	
		$players = $this->model->JoinList('player', array('rate'), 'delete_flag', '0', null, null, null);
		$this->view->json = Zend_Json::encode($players);
	
		$this->view->team1_number = htmlspecialchars(count($team1_list), ENT_QUOTES);
		$this->view->team2_number = htmlspecialchars(count($team2_list), ENT_QUOTES);
		$this->view->team1_list = $team1_list;
		$this->view->team2_list = $team2_list;
		$this->view->team1_rate = htmlspecialchars($team1_rate, ENT_QUOTES);
		$this->view->team2_rate = htmlspecialchars($team2_rate, ENT_QUOTES);
		$this->view->cpype = $cpype;
		$this->view->is_alert = $is_alert;
		$this->view->is_ruled = $is_ruled;
	
	}
	
	public function gamingAction(){
		$params = $this->getRequest ()->getParams ();
		// Get token and tag from request for authentication
		$token = $params['token'];
		$tag = $params['action_tag'];
	
		// Validate token
		$tokenHandler = new Custom_Auth_Token();
		if (!$tokenHandler->validateToken($token,$tag)) {
			return $this->_forward ( 'errorgaming', 'index', 'error' );
		}
	
		// input check
		$players = $this->model->JoinList('player', array('rate'), 'delete_flag', '0', null, null, null);
		$i = 0;
		foreach($params as $key => $value) {
			if(preg_match('/^player_name[0-9]{1,2}$/', $key)) {
				foreach($players as $player) {
					if ($value === $player['player_name']) {
						$name_flags[$i] = true;
						$names[$i] = $player['player_id'];
						break;
					} else if($value === '') {
						$name_flags[$i] = true;
						$names[$i] = null;
					} else {
						$name_flags[$i] = false;
					}
				}
				$i++;
			}
		}
	
		foreach($name_flags as $flag) {
			if(!$flag){
				$name_check = false;
				break;
			}
			$name_check = true;
		}
	
		foreach($params as $key => $value) {
			if(preg_match('/^player_id[0-9]{1,2}$/', $key)) {
				if (!in_array($value, $names) && $value != '') {
					$id_check = false;
					break;
				}
				$id_check = true;
			}
		}
	
		if (!$name_check || !$id_check) {
			logWrite ( implode(",", $params), 1 );
			return $this->_forward ( 'errorgaming', 'index', 'error' );
		}
	
		$o = 0;
		for($n=0; $n<count($names); $n++) {
			for($m=0;$m<count($players);$m++) {
	
				if ($players[$m]['player_id'] == $names[$n]) {
					$player_row[$o] = $m;
					$o++;
					break;
				}
			}
		}
	
		$j = 0;
	
		$log = array (
				'game_status' => 1,
				'player1_team' => 1,
				'player1_id' => $params['player_id9'],
				'player1_rate_id' => $players[$player_row[$j]]['rate_id'],
				'player1_name' => $params['player_name9'],
				'player1_rate' => $players[$player_row[$j]]['rate'],
				'player1_win' => $players[$player_row[$j]]['win'],
				'player1_lose' => $players[$player_row[$j]]['lose'],
				'player1_streak' => $players[$player_row[$j]]['streak'],
				'player1_win_streak' => $players[$player_row[$j]]['win_streak'],
				'player1_lose_streak' => $players[$player_row[$j]]['lose_streak'],
				'player1_maxrate' => $players[$player_row[$j]]['max_rate'],
				'player2_team' => 2,
				'player2_name' => $params['player_name10'],
				'player2_id' => $params['player_id10'],
				'player2_rate_id' => $players[$player_row[$j+1]]['rate_id'],
				'player2_rate' => $players[$player_row[$j+1]]['rate'],
				'player2_win' => $players[$player_row[$j+1]]['win'],
				'player2_lose' => $players[$player_row[$j+1]]['lose'],
				'player2_streak' => $players[$player_row[$j+1]]['streak'],
				'player2_win_streak' => $players[$player_row[$j+1]]['win_streak'],
				'player2_lose_streak' => $players[$player_row[$j+1]]['lose_streak'],
				'player2_maxrate' => $players[$player_row[$j+1]]['max_rate'],
		);
		$j = $j + 2;
	
		if($params['player_name11'] != ''){
			$log += array(
					'player3_team' => 1,
					'player3_name' => $params['player_name11'],
					'player3_id' => $params['player_id11'],
					'player3_rate_id' => $players[$player_row[$j]]['rate_id'],
					'player3_rate' => $players[$player_row[$j]]['rate'],
					'player3_win' => $players[$player_row[$j]]['win'],
					'player3_lose' => $players[$player_row[$j]]['lose'],
					'player3_streak' => $players[$player_row[$j]]['streak'],
					'player3_win_streak' => $players[$player_row[$j]]['win_streak'],
					'player3_lose_streak' => $players[$player_row[$j]]['lose_streak'],
					'player3_maxrate' => $players[$player_row[$j]]['max_rate'],
			);
			$j++;
		}
	
		if($params['player_name12'] != ''){
			$log += array(
					'player4_team' => 2,
					'player4_name' => $params['player_name12'],
					'player4_id' => $params['player_id12'],
					'player4_rate_id' => $players[$player_row[$j]]['rate_id'],
					'player4_rate' => $players[$player_row[$j]]['rate'],
					'player4_win' => $players[$player_row[$j]]['win'],
					'player4_lose' => $players[$player_row[$j]]['lose'],
					'player4_streak' => $players[$player_row[$j]]['streak'],
					'player4_win_streak' => $players[$player_row[$j]]['win_streak'],
					'player4_lose_streak' => $players[$player_row[$j]]['lose_streak'],
					'player4_maxrate' => $players[$player_row[$j]]['max_rate'],
			);
			$j++;
		}
	
		if($params['player_name13'] != ''){
			$log += array(
					'player5_team' => 1,
					'player5_name' => $params['player_name13'],
					'player5_id' => $params['player_id13'],
					'player5_rate_id' => $players[$player_row[$j]]['rate_id'],
					'player5_rate' => $players[$player_row[$j]]['rate'],
					'player5_win' => $players[$player_row[$j]]['win'],
					'player5_lose' => $players[$player_row[$j]]['lose'],
					'player5_streak' => $players[$player_row[$j]]['streak'],
					'player5_win_streak' => $players[$player_row[$j]]['win_streak'],
					'player5_lose_streak' => $players[$player_row[$j]]['lose_streak'],
					'player5_maxrate' => $players[$player_row[$j]]['max_rate'],
			);
			$j++;
		}
	
		if($params['player_name14'] != ''){
			$log += array(
					'player6_team' => 2,
					'player6_name' => $params['player_name14'],
					'player6_id' => $params['player_id14'],
					'player6_rate_id' => $players[$player_row[$j]]['rate_id'],
					'player6_rate' => $players[$player_row[$j]]['rate'],
					'player6_win' => $players[$player_row[$j]]['win'],
					'player6_lose' => $players[$player_row[$j]]['lose'],
					'player6_streak' => $players[$player_row[$j]]['streak'],
					'player6_win_streak' => $players[$player_row[$j]]['win_streak'],
					'player6_lose_streak' => $players[$player_row[$j]]['lose_streak'],
					'player6_maxrate' => $players[$player_row[$j]]['max_rate'],
			);
			$j++;
		}
	
		if($params['player_name15'] != ''){
			$log += array(
					'player7_team' => 1,
					'player7_name' => $params['player_name15'],
					'player7_id' => $params['player_id15'],
					'player7_rate_id' => $players[$player_row[$j]]['rate_id'],
					'player7_rate' => $players[$player_row[$j]]['rate'],
					'player7_win' => $players[$player_row[$j]]['win'],
					'player7_lose' => $players[$player_row[$j]]['lose'],
					'player7_streak' => $players[$player_row[$j]]['streak'],
					'player7_win_streak' => $players[$player_row[$j]]['win_streak'],
					'player7_lose_streak' => $players[$player_row[$j]]['lose_streak'],
					'player7_maxrate' => $players[$player_row[$j]]['max_rate'],
			);
			$j++;
		}
	
		if($params['player_name16'] != ''){
			$log += array(
					'player8_team' => 2,
					'player8_name' => $params['player_name16'],
					'player8_id' => $params['player_id16'],
					'player8_rate_id' => $players[$player_row[$j]]['rate_id'],
					'player8_rate' => $players[$player_row[$j]]['rate'],
					'player8_win' => $players[$player_row[$j]]['win'],
					'player8_lose' => $players[$player_row[$j]]['lose'],
					'player8_streak' => $players[$player_row[$j]]['streak'],
					'player8_win_streak' => $players[$player_row[$j]]['win_streak'],
					'player8_lose_streak' => $players[$player_row[$j]]['lose_streak'],
					'player8_maxrate' => $players[$player_row[$j]]['max_rate'],
			);
		}
	
		$team1_rate = 0;
		$team2_rate = 0;
	
		foreach($log as $key => $value) {
			if(preg_match('/^player[0-9]_team$/', $key)) {
				$current_team = $value;
			}
				
			if(preg_match('/^player[0-9]_rate$/', $key)) {
				if($current_team == 1) {
					$team1_rate= $team1_rate + $value;
				} elseif($current_team == 2) {
					$team2_rate= $team2_rate + $value;
					$current_team = null;
				}
			}
				
		}
	
		$log += array('team1_rate' => $team1_rate,
				'team2_rate' => $team2_rate);
		
		$tokenHandler = new Custom_Auth_Token;
		$this->view->token = $tokenHandler->getToken('gaming');

		if (strcmp($params['game_note'], "アラビア(レートあり)") != 0) {
			$log += array('israte' => 1);
		} else {
			$log += array('israte' => 0);
		}
		$log += array('game_note' => $params['game_note']);
	
		$result = $this->model->insert('gamelog', $log);
		$id = $this->model->getMaxID('gamelog');
		$game = $this->model->searchList('gamelog', "gamelog_id = $id", '1', 'game_status', null);
	
		$this->view->result = htmlspecialchars($result, ENT_QUOTES);
		$this->view->gameid = htmlspecialchars($id, ENT_QUOTES);
		$this->view->game = $game;
	}
	
	public function reportAction() {
		$params = $this->getRequest ()->getParams ();
		
		// Get token and tag from request for authentication
		$token = $params['token'];
		$tag = $params['action_tag'];
		
		// Validate token
		$tokenHandler = new Custom_Auth_Token();
		if (!$tokenHandler->validateToken($token,$tag)) {
			return $this->_forward ( 'errorgaming', 'index', 'error' );
		}
		
		$games = $this->model->getInfo('gamelog', $params['game_id'], null);
	
		if($params['created_on'] != $games['created_on']) {
			$params += $games;
			logWrite ( implode(",", $params), 1 );
			return $this->_forward ( 'errorgaming', 'index', 'error' );
		}

		if($games['game_status'] != 1) {
			return $this->_forward('errorreporting', 'index', 'error');
	}
	
		$this->view->result = report($params, $this);
		$this->view->previous = htmlspecialchars($params['option'], ENT_QUOTES);
	}
	
	public function cancelAction() {
		$params = $this->getRequest ()->getParams ();
		$log = array (
				'gamelog_id' => $params ['game_id'],
				'game_status' => 2,
		);


		$games = $this->model->getInfo('gamelog', $params['game_id'], null);
		if($games['game_status'] != 1) {
			return $this->_forward('errorreporting', 'index', 'error');
	}
	
	
		$result = $this->model->update('gamelog', $log);
		$this->view->previous = htmlspecialchars($params ['option'], ENT_QUOTES);
		$this->view->result = htmlspecialchars($result, ENT_QUOTES);
	}
	
	private function combination($n, $r) {
		if ($n < $r) {
			return array();
		}
		
		if (!$r) {
			return array(array());
		}
		
		if ($n == $r) {
			return array(range(0, $n-1));
		}
	  
		$return = array();
		$n2 = $n - 1;
  
		foreach ($this->combination($n2, $r) as $row) {
			$return[] = $row;
		}
		
		foreach ($this->combination($n2, $r-1) as $row) {
			$row[] = $n2;
			$return[] = $row;
		}
		
		return $return;
	}
	
	private function calcurate_rate($list, $team_num) {
		$team_rate = 0;
		
		foreach($list as $child) {
			if($child['team_number'] == $team_num) {
				$team_rate = $team_rate + $child['player_rate'];
			}
		}
		
		return $team_rate;
	}
}
