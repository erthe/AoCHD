<?php
require_once 'Zend/Json.php';
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/tools.php');
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/common.php');
class User_AnalyzeController extends Zend_Controller_Action {
	public $model;

	public function init() {
		$root_dir = dirname(dirname(dirname(__FILE__))) . '/';
		require_once ($root_dir . 'default/models/IndexModel.php');
		$this->model = new IndexModel ();
		initPage($this, '/application/modules/');
	}

	public function indexAction() {
		if(!logincheck ( 'user', $this )){
			$this->_forward('login');
		}
		$this->view->user = htmlspecialchars(true, ENT_QUOTES);
	
		$this->view->title = htmlspecialchars('プレイヤー分析トップ', ENT_QUOTES);
	}
	
	public function activelistAction() {
	    $before_3month = date ( 'Y-m-d H:i:s', strtotime ( '- 3 months' ) );
	    $adapter = dbadapter ();
	    $params = dbconnect ();
	    $db = Zend_Db::factory ( $adapter, $params );
        
		$select = new Zend_Db_Select ( $db );
		$select = $db->select ();
		$select->from ( 'gamelog', "*" );
	    $select->where ( "created_on >= ?", $before_3month );
		$select->group(array('player1_name', 'player2_name', 'player3_name', 'player4_name',
		                      'player5_name', 'player6_name', 'player7_name', 'player8_name'
		));
		
		$lists = $db->fetchAll ( $select );
		$playerList = array();
		foreach($lists as $list) {
		    for ($i=1; $i<9; $i++) {
		        $player = 'player'.$i.'_name';
    		    if (!in_array($list[$player], $playerList)) {
    		        $playerList[] = $list[$player];
    		    }
		    }
		}
		$this->view->title = htmlspecialchars('最近3ヶ月アクティブプレイヤー', ENT_QUOTES);
		$this->view->items = $playerList;
	}
	
	public function monthlygameAction() {
	    $month_first = date ( 'Y-m-01', time());
	    $adapter = dbadapter ();
	    $params = dbconnect ();
	    $db = Zend_Db::factory ( $adapter, $params );
	    
	    $select = new Zend_Db_Select ( $db );
	    $select = $db->select ();
	    $select->from ( 'gamelog', "*" );
	    $select->where ( "created_on >= ?", $month_first );
	    
	    $lists = $db->fetchAll ( $select );

		$current_date = new DateTime(date('Y-m-01'));
		$month_date = new DateTime(date('Y-m-02'));
		$lastDate = new DateTime(date('Y-m-t'));
		$date_list = array();
		$game_count = 0;
		$total_game = 0;
		foreach($lists as $list) {
			$this_date = new DateTime($list['created_on']);
			if ( $this_date->format('Y-m-d') === $current_date->format('Y-m-d') ) {
				$game_count++;
			} elseif($this_date->format('Y-m-d')  >= $month_date->modify('+1 days')->format('Y-m-d')) {
				$date_list[] = array('date' => $current_date->format('Y-m-d'), 'count' => $game_count);
				$current_date->modify('+1 days');
				$date_list[] = array('date' => $current_date->format('Y-m-d'), 'count' => 0);
				$month_date = $current_date;
				$month_date->modify('+2 days');
				$current_date = $this_date;
				$game_count = 0;
			} else {
				$date_list[] = array('date' => $current_date->format('Y-m-d'), 'count' => $game_count);
				$current_date = $this_date;
				$total_game += $game_count;
				$game_count = 1;
			}
		}
		$date_list[] = array('date' => $current_date->format('Y-m-d'), 'count' => $game_count);

		if ($current_date->format('Y-m-d') != $lastDate->format('Y-m-d')) {
			$diffDate = $lastDate->format('d') - $current_date->format('d');
			for ($i=0; $i<$diffDate; $i++) {
				$date_list[] = array('date' => $current_date->modify('+1 days')->format('Y-m-d'), 'count' => 0);
			}
		}

		$date_list[] = array('date' => '合計', 'count' => $total_game);
	    
		$this->view->title = htmlspecialchars('今月の日別ゲーム数', ENT_QUOTES);
		$this->view->items = $date_list;
	}

	public function searchhistoryAction() {
		$tokenHandler = new Custom_Auth_Token;
		$this->view->token = $tokenHandler->getToken('yyyymm');
		$this->view->title = htmlspecialchars('過去の日別ゲーム数', ENT_QUOTES);
	}

	public function showhistoryAction() {
		$params = $this->getRequest()->getParams();
		$token = $params['token'];
		$tag = $params['action_tag'];

		// Validate token
		$tokenHandler = new Custom_Auth_Token();
		if (!$tokenHandler->validateToken($token,$tag)) {
			return $this->_forward ( 'passworderror', 'index', 'error' );
		}

		$month_first = date ( $params['yyyymm'].'-01', time());
		$year = substr($params['yyyymm'], 0, 4);
		$month = substr($params['yyyymm'], 5, 2);

		$date = new DateTime();
		$date->setDate($year, $month, 1);
		$month_last = $date->format('Y-m-t 23:59:59');

		$adapter = dbadapter ();
		$param = dbconnect ();
		$db = Zend_Db::factory ( $adapter, $param );

		$select = new Zend_Db_Select ( $db );
		$select = $db->select ();
		$select->from ( 'gamelog', "*" );
		$select->where ( "created_on >= ?", $month_first );
		$select->where ( "created_on <= ?", $month_last );
		$lists = $db->fetchAll ( $select );

		$current_date = new DateTime(date($params['yyyymm'].'-01'));
		$month_date = new DateTime(date($params['yyyymm'].'-02'));
		$lastDate = new DateTime(date($params['yyyymm'].'-t'));
		$date_list = array();
		$game_count = 0;
		$total_game = 0;
		foreach($lists as $list) {
			$this_date = new DateTime($list['created_on']);
			if ( $this_date->format('Y-m-d') === $current_date->format('Y-m-d') ) {
				$game_count++;
			} elseif($this_date->format('Y-m-d')  >= $month_date->modify('+1 days')->format('Y-m-d')) {
				$date_list[] = array('date' => $current_date->format('Y-m-d'), 'count' => $game_count);
				$current_date->modify('+1 days');
				$date_list[] = array('date' => $current_date->format('Y-m-d'), 'count' => 0);
				$month_date = $current_date;
				$month_date->modify('+2 days');
				$current_date = $this_date;
				$game_count = 0;
			} else {
				$date_list[] = array('date' => $current_date->format('Y-m-d'), 'count' => $game_count);
				$current_date = $this_date;
				$total_game += $game_count;
				$game_count = 1;
			}
		}
		$date_list[] = array('date' => $current_date->format('Y-m-d'), 'count' => $game_count);

		if ($current_date->format('Y-m-d') != $lastDate->format('Y-m-d')) {
			$diffDate = $lastDate->format('d') - $current_date->format('d');
			for ($i=0; $i<$diffDate; $i++) {
				$date_list[] = array('date' => $current_date->modify('+1 days')->format('Y-m-d'), 'count' => 0);
			}
		}

		$date_list[] = array('date' => '合計', 'count' => $total_game);

		$this->view->items = $date_list;
	}

	public function playersearchAction() {	
	    $players = $this->model->getList('player', '0', 'delete_flag', null);
	    $this->view->title = htmlspecialchars('VSプレイヤー', ENT_QUOTES);
	    $this->view->json = Zend_Json::encode($players);
		$this->view->title = htmlspecialchars('今月の特定のプレイヤーのゲーム数検索', ENT_QUOTES);
	}
	
	
	public function playergamecountAction() {
	    $params = $this->getRequest ()->getParams ();
	    $player = $params['player_id1'];
	    var_dump($player);
	    
		$month_first = date ( 'Y-m-01', time());
	    $adapter = dbadapter ();
	    $params = dbconnect ();
	    $db = Zend_Db::factory ( $adapter, $params );
        
		$select = new Zend_Db_Select ( $db );
		$select = $db->select ();
		$select->from ( 'gamelog', "*" );
	    $select->where ( "created_on >= ?", $month_first );
	    $select->where ( "player1_id = ?", $player );
	    $select->orWhere ( "created_on >= ?", $month_first );
	    $select->Where( "player2_id = ?", $player);
	    $select->orWhere ( "created_on >= ?", $month_first );
	    $select->Where( "player3_id = ?", $player);
	    $select->orWhere ( "created_on >= ?", $month_first );
	    $select->where( "player4_id = ?", $player);
	    $select->orWhere ( "created_on >= ?", $month_first );
	    $select->where( "player5_id = ?", $player);
	    $select->orWhere ( "created_on >= ?", $month_first );
	    $select->where( "player6_id = ?", $player);
	    $select->orWhere ( "created_on >= ?", $month_first );
	    $select->where( "player7_id = ?", $player);
	    $select->orWhere ( "created_on >= ?", $month_first );
	    $select->Where( "player8_id = ?", $player);
	    
		$lists = $db->fetchAll ( $select );
		$gamecount = 0;
		foreach($lists as $list) {
		    for ($i=1; $i<9; $i++) {
		        $player_id = 'player'.$i.'_id';
		        if ($list[$player_id] == $player) {
		            $gamecount++;
		        }
		    }
		}

		$this->view->gamecount = $gamecount;
	}
	
	public function inittokenerAction() {
		$tokenHandler = new Custom_Auth_Token;
		$this->view->inittoken = htmlspecialchars($tokenHandler->getToken('init'));
	}
}