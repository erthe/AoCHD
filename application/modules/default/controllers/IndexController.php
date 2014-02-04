<?php
require_once 'Zend/Json.php';
require_once 'Zend/Form/Element/Hash.php';
require_once 'Zend/Session/Namespace.php';
require_once (str_replace('/application/modules/default', '', dirname (dirname(__FILE__))) . '/tools/common.php');

class IndexController extends Zend_Controller_Action {
	public $model;
	
	/**
	 * 
	 */
	public function init() {
		header("X-Content-Type-Options: nosniff");
		$root_dir = dirname (dirname(__FILE__)) . '/';
		require_once $root_dir . 'models/IndexModel.php';
		$this->model = new IndexModel ();
		$ADMIN_TEMPLATE = $root_dir . '../../../themes/layout/';
		$this->view->header = htmlspecialchars($ADMIN_TEMPLATE . 'header.tpl', ENT_QUOTES);
		$this->view->footer = htmlspecialchars($ADMIN_TEMPLATE . 'footer.tpl', ENT_QUOTES);
		$this->view->list = htmlspecialchars($root_dir . '/views/index/list.tpl', ENT_QUOTES);
		$this->view->base = htmlspecialchars($root_dir, ENT_QUOTES);
		$this->view->playercreate = htmlspecialchars($root_dir . 'views/member/playercreate.tpl', ENT_QUOTES);
		$this->view->changepassword = htmlspecialchars($root_dir . 'views/member/changepassword.tpl', ENT_QUOTES);
		$this->view->createupdate = htmlspecialchars($root_dir . 'views/admin/updatecreate.tpl', ENT_QUOTES);
		$this->view->usercreate = htmlspecialchars($root_dir . 'views/admin/usercreate.tpl', ENT_QUOTES);
		
		$authStorage = Zend_Auth::getInstance ()->getStorage ();
		if ($authStorage->isEmpty ()) {
			$loginid = null;
		} else {
			$loginid = get_object_vars(Zend_Auth::getInstance()->getIdentity());
		}
		
		if (is_null($loginid)) {
			$this->view->member = htmlspecialchars(false, ENT_QUOTES);
			$this->view->admin = htmlspecialchars(false, ENT_QUOTES);
			$this->view->username = htmlspecialchars('ようこそゲストさん', ENT_QUOTES);
		} else {
			if ($loginid['user_control'] === 'administrator') {
				$this->view->member = htmlspecialchars(true, ENT_QUOTES);
				$this->view->admin = htmlspecialchars(true, ENT_QUOTES);
				
			} else {
				$this->view->member = htmlspecialchars(true, ENT_QUOTES);
				$this->view->admin = htmlspecialchars(false, ENT_QUOTES);
			}
			$this->view->username = htmlspecialchars('あなたは' . $loginid['user_name'] . 'としてログインしています。', ENT_QUOTES);
		}
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
		
		$this->view->pages = $pageArray;
		$this->view->notes = $paginator->getIterator ();
		
		$this->view->title = htmlspecialchars('AoCHD', ENT_QUOTES);
	}
	
	public function maketeamAction() {
		$tokenHandler = new Custom_Auth_Token;
		$this->view->token = $tokenHandler->getToken('maketeam');
		$players = $this->model->JoinList('player', array('rate'), 'delete_flag', '0');
		$this->view->title = htmlspecialchars('チームの作成', ENT_QUOTES);
		$this->view->json = Zend_Json::encode($players);
		
	}
	
	public function playerreloadAction() {
		$tokenHandler = new Custom_Auth_Token;
		$this->view->token = $tokenHandler->getToken('maketeam');
		$players = $this->model->JoinList('player', array('rate'), 'delete_flag', '0');
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
			return $this->_forward ( 'errorgaming' );
		}
		
		$i = 0;
		$j = 0;
		$k = 0;
		
		while($value = current($params)){
			if(strcmp(substr(key($params), 0, 4), 'rate')  == 0) {
				$rate[$i] = $value;
				$i++;
			}
			
			if(strcasecmp(substr(key($params), 0, 11), 'player_name')  == 0) {
				$name[$j] = $value;
				$j++;
			}
			
			if(strcasecmp(substr(key($params), 0, 9), 'player_id')  == 0) {
				$id[$k] = $value;
				$k++;
			}
			
			next($params);
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
		
		$players = $this->model->JoinList('player', array('rate'), 'delete_flag', '0');
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
			return $this->_forward ( 'errorgaming' );
		}
		
		// input check
		$players = $this->model->JoinList('player', array('rate'), 'delete_flag', '0');
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
			return $this->_forward ( 'errorgaming' );
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
		
		$result = $this->model->insert('gamelog', $log);
		$id = $this->model->getMaxID('gamelog');
		$game = $this->model->searchList('gamelog', "gamelog_id = $id", '1', 'game_status', null);
		
		$this->view->result = htmlspecialchars($result, ENT_QUOTES);
		$this->view->gameid = htmlspecialchars($id, ENT_QUOTES);
		$this->view->game = $game;
	}
	
	public function reportAction() {
		$params = $this->getRequest ()->getParams ();
		$games = $this->model->getInfo('gamelog', $params['game_id'], null);
		
		if($params['created_on'] != $games['created_on']) {
			$params += $games;
			logWrite ( implode(",", $params), 1 );
			return $this->_forward ( 'errorgaming' );
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
	
	public function playerlistAction() {
		$params = $this->getRequest ()->getParams ();
		
		if (!array_key_exists('search_player_name', $params)){
			// init
			$this->view->search_player_name = null;
			$this->view->search_rate_up = null;
			$this->view->search_rate_down = null;
		}
		
		$this->view->title = htmlspecialchars('プレイヤー一覧', ENT_QUOTES);
		$this->view->ratesearch = htmlspecialchars(dirname ( dirname ( __FILE__ ) ) . '/views/index/ratesearch.tpl', ENT_QUOTES);
	}
	
	public function listAction(){
		$params = $this->getRequest ()->getParams ();
		showlist($params, 'list', '0', $this);
	}
	
	public function playerdetailAction() {
		$params = $this->getRequest()->getParams();
		Detail($params, $this);
		$this->view->title = htmlspecialchars('プレイヤー詳細情報', ENT_QUOTES);
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
	

	public function errorgamingAction() {
	}
}
?>
