<?php
require_once 'Zend/Json.php';
require_once 'Zend/Form/Element/Hash.php';
require_once 'Zend/Session/Namespace.php';
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/common.php');

class TeamController extends Zend_Controller_Action {
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
	
	public function advertiseAction() {
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
		foreach($params as $key => $value){
			if(preg_match('/^player_id[0-9]+$/', $key) && !empty($value)) {
				$id[$i] = $value;
				$i++;
			}
	
			next($params);
		}
	
		$player_number = count($id);
	
		$advertise_maxid = $this->model->getMaxID ( 'advertisement' ) + 1;
		// get ip address from host player
		$connect_ipaddress = $_SERVER["REMOTE_ADDR"];
	
		$data = array (
				'advertisement_id' => $advertise_maxid,
				'difficulty' => $params ['difficulty'],
				'current_number_entry' => $player_number,
				'max_number_entry' => $params ['member'],
				'host_ip' => $connect_ipaddress,

				'game_note' => $params ['game_note']
		);
	
		// check host already advertising?
		$where = "host_ip = '$connect_ipaddress'";
		$hostinfo = $this->model->SearchInfo('advertisement', $where, null, null);
	
		if($hostinfo){
			$data += array('advertisement_id' => $hostinfo['advertisement_id']);
			$data += array('entered_time' => NULL);
			$result = $this->model->update ( 'advertisement', $data );
		} else {
			$data += array('adv_start_time' => NULL);
			$result = $this->model->insert ( 'advertisement', $data );
		}
	
		$tokenHandler = new Custom_Auth_Token;
		$this->view->token = $tokenHandler->getToken('maketeam');
		$this->view->title = htmlspecialchars('チームの作成', ENT_QUOTES);
	
	}
	
	public function pageoutAction() {
		$connect_ipaddress = $_SERVER["REMOTE_ADDR"];
		$where = "host_ip = '$connect_ipaddress'";
		$hostinfo = $this->model->SearchInfo('advertisement', $where, null, null);
	
		if($hostinfo){
			$data = array('advertisement_id' => $hostinfo['advertisement_id']);
			$result = $this->model->delete ( 'advertisement', $data );
		}
	}
	
	public function matchingAction(){
		$params = $this->getRequest ()->getParams ();
	
		$connect_ipaddress = $_SERVER["REMOTE_ADDR"];
		$where = "host_ip = '$connect_ipaddress'";
		$hostinfo = $this->model->SearchInfo('advertisement', $where, null, null);
	
		if($hostinfo){
			$data = array('advertisement_id' => $hostinfo['advertisement_id']);
			$result = $this->model->delete ( 'advertisement', $data );
		}
	
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
	
		foreach($params as $key => $value){
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
		$list = array($id, $name, $rate, array_fill(0, $player_number, 0));
	
		$sum_rate = 0;
		foreach($list[2] as $key => $value) {
			$sum_rate = $sum_rate + $value;
		}
	
		$target_value = $sum_rate / 2;
	
		$team1_rate = 0;
		$team2_rate = 0;
		$team1_flag = false;
		$team2_flag = false;
		$flag_end = false;
	
		while ($flag_end == false) {
			if($team1_rate <= $team2_rate && $team1_flag == false){
				$target_diff = $target_value - $team1_rate;
				$current_pick = 0;
				for($k=0; $k<$player_number;$k++){
						
					if($list[3][$k] == 0){
						$temp_rate = $list[2][$k];
					} else {
						$temp_rate = 0;
					}
						
					if(abs($temp_rate - $target_value) <  abs($current_pick - $target_value)){
						$current_pick = $temp_rate;
						$selected_row = $k;
	
					}
				}
	
				$team1_rate = $team1_rate + $current_pick;
				$list[3][$selected_row] = 1;
	
			} else if($team2_flag == false) {
				$target_diff = $target_value - $team2_rate;
	
				$current_pick = 0;
				for($k=0; $k<$player_number;$k++){
					if($list[3][$k] == 0) {
						$temp_rate = $list[2][$k];
					} else {
						$temp_rate = 0;
					}
					if(abs($temp_rate - $target_value) <  abs($current_pick - $target_value)){
						$current_pick = $temp_rate;
						$selected_row = $k;
					}
				}
	
				$team2_rate = $team2_rate + $current_pick;
				$list[3][$selected_row] = 2;
			}
				
			$flag_end = true;
			for($n=0; $n<$player_number;$n++){
				if($list[3][$n] == 0) {
					$flag_end = false;
					break;
				}
			}
				
		}
	
		for($m=0; $m<$player_number;$m++){
			if($list[3][$m] == 1){
				$team1_list[] = array($list[0][$m], $list[1][$m], $list[2][$m], $list[3][$m]);
			} else {
				$team2_list[] = array($list[0][$m], $list[1][$m], $list[2][$m], $list[3][$m]);
			}
		}
	
		$cpype = 'チーム1: 【' . $team1_rate . '】 ';
		foreach($team1_list as $key => $value) {
			$cpype = $cpype . $value[1] . '(' . $value[2] . ') ';
		}
		$cpype = $cpype  . "チーム2: 【" . $team2_rate . '】 ';
		foreach($team2_list as $key => $value) {
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
	
		$this->view->result = report($params, $this);
		$this->view->previous = htmlspecialchars($params['option'], ENT_QUOTES);
	}
	
	public function cancelAction() {
		$params = $this->getRequest ()->getParams ();
		$log = array (
				'gamelog_id' => $params ['game_id'],
				'game_status' => 2,
		);
	
		$result = $this->model->update('gamelog', $log);
		$this->view->previous = htmlspecialchars($params ['option'], ENT_QUOTES);
		$this->view->result = htmlspecialchars($result, ENT_QUOTES);
	}
}