<?php
require_once 'Zend/Json.php';
require_once 'Zend/Form/Element/Hash.php';
require_once 'Zend/Session/Namespace.php';
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/common.php');

class PlayerController extends Zend_Controller_Action {
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
		$params = $this->getRequest ()->getParams ();
	
		if (!array_key_exists('search_player_name', $params)){
			// init
			$this->view->search_player_name = null;
			$this->view->search_rate_up = null;
			$this->view->search_rate_down = null;
			$this->view->search_game_number = null;
		}
	
		$this->view->title = htmlspecialchars('プレイヤー一覧', ENT_QUOTES);
		$this->view->ratesearch = htmlspecialchars(dirname ( dirname ( __FILE__ ) ) . '/views/player/ratesearch.tpl', ENT_QUOTES);
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
	
	public function commentupdateAction() {
		$params = $this->getRequest ()->getParams ();
	
		// Get token and tag from request for authentication
		$token = $params['token'];
		$tag = $params['action_tag'];
	
		$player_data = $this->model->getInfo('player', $params['player_id'], null);
		$this->view->rate_id = $player_data['rate_id'];
	
		// Validate token
		$tokenHandler = new Custom_Auth_Token();
		if (!$tokenHandler->validateToken($token,$tag)) {
			return $this->_forward ( 'errorcomment', 'index', 'error' );
		}
	
		$before_1min = date( 'Y-m-d H:i:s', strtotime( '- 1 minutes' ) );
		$ipaddress = $_SERVER["REMOTE_ADDR"];
		$writer_recent_post = $this->model->searchList('player_note', "writers_ip = '$ipaddress'", 'delete_flag', 0, 'player_note_id desc');
		if (count($writer_recent_post) > 0) {
			$recent_post = $writer_recent_post[0]['created_on'];
		} else {
			$recent_post = null;
		}
	
		if (!is_null($recent_post)) {
			if(strtotime($recent_post) > strtotime($before_1min)) {
				return $this->_forward ( 'postlimit' );
			}
				
		}
	
		$log = array (
				'player_id' => $params ['player_id'],
				'writer_name' => $params ['writer_name'],
				'comment' => $params ['comment'],
				'writers_ip' => $ipaddress,
				'delete_flag' => 0,
				'created_on' => null
		);
		$result = $this->model->insert ( 'player_note', $log );
	
		$this->view->result = htmlspecialchars($result, ENT_QUOTES);
	}
	
	public function postlimitAction() {
	}

	public function rategraphAction() {
		$params = $this->getRequest()->getParams();
		$command = "round(win / (win + lose)*100, 3) AS percent";
		$player_id = $params['player_id'];
		if (array_key_exists('start_date', $params) && !empty($params['start_date'])) {
			$start_date = new Zend_Date($params['start_date']);
		} else {
			$start_date = new Zend_Date('1970-01-01');
		}
		
		if (array_key_exists('end_date', $params) && !empty($params['end_date'])) {
			$end_date = new Zend_Date($params['end_date']);;
		} else {
			$end_date = new Zend_Date();
		}
		
		$player_info = $this->model->getInfo('player', $player_id, null);
		$rate_id = $player_info['rate_id'];
		
		$rate = $this->model->getInfo('rate', $rate_id, $command);
		$where = '(player1_id =' . $params['player_id'];
		$where .= ' or player2_id =' . $params['player_id'];
		$where .= ' or player3_id =' . $params['player_id'];
		$where .= ' or player4_id =' . $params['player_id'];
		$where .= ' or player5_id =' . $params['player_id'];
		$where .= ' or player6_id =' . $params['player_id'];
		$where .= ' or player7_id =' . $params['player_id'];
		$where .= ' or player8_id =' . $params['player_id'];
		$where .= ') and created_on between "' . $start_date . '" and "' . $end_date . '"';
		$players = $this->model->searchlist('gamelog', $where, 0, 'game_status', 'gamelog_id desc');
		$target_rate = [];
		foreach($players as $array => $list) {
			$i = 1;
			foreach($list as $key => $value) {
				if ($key === 'player' . $i . '_id' && !is_null($value)) {
					if ($value == $player_id) {
						array_push($target_rate, [
								'created_on' => $list['created_on'],
								'rate' => intval($list['player' . $i . '_rate']) 
						]);
					}
					
					$i++;
				} elseif ($key === 'player' . $i . '_id') {
					$i++;
				}
			}
		}
		
		if (empty($target_rate)) {
			$today = new Zend_Date();
			$target_rate[] = [
					'created_on' => $today->get(Zend_Date::W3C),
					'rate' => intval($rate ['rate'])
			];
		}
		
		$this->view->title = htmlspecialchars('レート遷移図情報', ENT_QUOTES);
		$this->view->player_name = htmlspecialchars($player_info['player_name'], ENT_QUOTES);
		$this->view->player_id = htmlspecialchars($player_id, ENT_QUOTES);
		$this->view->rate_data = json_encode($target_rate);
	}
}