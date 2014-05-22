<?php
require_once 'Zend/Json.php';
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/common.php');
class Admin_MaintenanceController extends Zend_Controller_Action {
	public $model;

	public function init() {
		$root_dir = dirname(dirname(dirname(__FILE__))) . '/';
		require_once ($root_dir . 'default/models/IndexModel.php');
		$this->model = new IndexModel ();
		initPage($this, '/application/modules/');
	}
	
	public function playerdownloadAction() {
		$lgnchk = admincheck ( 'admin', $this );
		if(!$lgnchk) {
			return $this->_forward ( 'erroradmin', 'index', 'error' );
		}
	
		$recordset = $this->model->getAllList ( 'player' );
		CsvCreate ( 'player', $recordset );
	}
	
	public function ratedownloadAction() {
		$lgnchk = admincheck ( 'admin', $this );
		if(!$lgnchk) {
			return $this->_forward ( 'erroradmin', 'index', 'error' );
		}
	
		$recordset = $this->model->getAllList ( 'rate' );
		CsvCreate ( 'rate', $recordset );
	}
	
	public function gamelogdownloadAction() {
		$lgnchk = admincheck ( 'admin', $this );
		if(!$lgnchk) {
			return $this->_forward ( 'erroradmin', 'index', 'error' );
		}
	
		$recordset = $this->model->getAllList ( 'gamelog' );
		CsvCreate ( 'gamelog', $recordset );
	}
	
	public function rateeditlogdownloadAction() {
		$lgnchk = admincheck ( 'admin', $this );
		if(!$lgnchk) {
			return $this->_forward ( 'erroradmin', 'index', 'error' );
		}
	
		$recordset = $this->model->getAllList ( 'rate_editlog' );
		CsvCreate ( 'rateeditlog', $recordset );
	}
	
	public function updatedownloadAction() {
		$lgnchk = admincheck ( 'admin', $this );
		if(!$lgnchk) {
			return $this->_forward ( 'erroradmin', 'index', 'error' );
		}
	
		$recordset = $this->model->getAllList ( 'updatelog' );
		CsvCreate ( 'update', $recordset );
	}
	
	public function userdownloadAction() {
		$lgnchk = admincheck ( 'admin', $this );
		if(!$lgnchk) {
			return $this->_forward ( 'erroradmin', 'index', 'error' );
		}
	
		$recordset = $this->model->getAllList ( 'user' );
		CsvCreate ( 'user', $recordset );
	}
	
	public function usereditlogdownloadAction() {
		$lgnchk = admincheck ( 'admin', $this );
		if(!$lgnchk) {
			return $this->_forward ( 'erroradmin', 'index', 'error' );
		}
	
		$recordset = $this->model->getAllList ( 'user_editlog' );
		CsvCreate ( 'usereditlog', $recordset );
	}
	
	public function updatelogdownloadAction() {
		$lgnchk = admincheck ( 'admin', $this );
		if(!$lgnchk) {
			return $this->_forward ( 'erroradmin', 'index', 'error' );
		}
	
		$recordset = $this->model->getAllList ( 'updatelog' );
		CsvCreate ( 'updatelog', $recordset );
	}
	
	public function loginlogdownloadAction() {
		$lgnchk = admincheck ( 'admin', $this );
		if(!$lgnchk) {
			return $this->_forward ( 'erroradmin', 'index', 'error' );
		}
	
		$recordset = $this->model->getAllList ( 'loginlog' );
		CsvCreate ( 'loginlog', $recordset );
	}
	
	public function playernotedownloadAction() {
		$lgnchk = admincheck ( 'admin', $this );
		if(!$lgnchk) {
			return $this->_forward ( 'erroradmin', 'index', 'error' );
		}
	
		$recordset = $this->model->getAllList ( 'player_note' );
		CsvCreate ( 'player_note', $recordset );
	}
	
	public function playeruploadAction() {
		$lgnchk = admincheck ( 'admin', $this );
		if(!$lgnchk) {
			return $this->_forward ( 'login', 'index', 'admin' );
		}
		$this->view->title = htmlspecialchars('プレイヤーアップロード', ENT_QUOTES);
	}
	public function playerprocessAction() {
		$uploadPath = dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/data/csv';
	
		$adapter = new Zend_File_Transfer_Adapter_Http ();
		$adapter->setDestination ( $uploadPath );
	
		if (! $adapter->receive ()) {
			$messages = $adapter->getMessages ();
			echo implode ( "\n", $messages );
		}
	
		$file = $adapter->getFileName ();
	
		$loadData = "LOAD DATA local INFILE '$file' ";
		$loadData .= "INTO TABLE player FIELDS TERMINATED BY ',' ENCLOSED BY '\"' IGNORE 1 LINES ";
	
		$loadData .= "(`player_id`,`rate_id`,`steam_id`,`player_name`,`memo`,`warn_flag`,`delete_flag`,`last_editor`,`created_on`,`updated_on`)";
	
		$result = $this->model->load ( 'player', $loadData );
	
		$this->view->row = htmlspecialchars($result, ENT_QUOTES);
		$this->view->title = htmlspecialchars('プレイヤーアップロード', ENT_QUOTES);
	}
	
	public function rateuploadAction() {
		$lgnchk = admincheck ( 'admin', $this );
		if(!$lgnchk) {
			return $this->_forward ( 'login', 'index', 'admin' );
		}
		$this->view->title = htmlspecialchars('レートアップロード', ENT_QUOTES);
	}
	public function rateprocessAction() {
		$uploadPath = dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/data/csv';
	
		$adapter = new Zend_File_Transfer_Adapter_Http ();
		$adapter->setDestination ( $uploadPath );
	
		if (! $adapter->receive ()) {
			$messages = $adapter->getMessages ();
			echo implode ( "\n", $messages );
		}
	
		$file = $adapter->getFileName ();
	
		$loadData = "LOAD DATA local INFILE '$file' ";
		$loadData .= "INTO TABLE rate FIELDS TERMINATED BY ',' ENCLOSED BY '\"' IGNORE 1 LINES ";
	
		$loadData .= "(`rate_id`,`rate`,`previous_rate`,`win`,`lose`,`streak`,`win_streak`,`lose_streak`,`max_rate`, `last_editor`,`edit_date`, `created_on`, `updated_on`)";
	
		$result = $this->model->load ( 'rate', $loadData );
	
		$this->view->row = htmlspecialchars($result, ENT_QUOTES);
		$this->view->title = htmlspecialchars('レートアップロード', ENT_QUOTES);
	}
	
	public function gameloguploadAction() {
		$lgnchk = admincheck ( 'admin', $this );
		if(!$lgnchk) {
			return $this->_forward ( 'login', 'index', 'admin' );
		}
		$this->view->title = htmlspecialchars('ゲームログアップロード', ENT_QUOTES);
	}
	public function gamelogprocessAction() {
		$uploadPath = dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/data/csv';
	
		$adapter = new Zend_File_Transfer_Adapter_Http ();
		$adapter->setDestination ( $uploadPath );
	
		if (! $adapter->receive ()) {
			$messages = $adapter->getMessages ();
			echo implode ( "\n", $messages );
		}
	
		$file = $adapter->getFileName ();
	
		$loadData = "LOAD DATA local INFILE '$file' ";
		$loadData .= "INTO TABLE gamelog FIELDS TERMINATED BY ',' ENCLOSED BY '\"' IGNORE 1 LINES ";
	
		$loadData .= "(`gamelog_id`,`created_on`,`game_end`,`game_status`,`Win_team`,`lose_team`,`team1_rate`,`team2_rate`,
						`player1_team`, `player2_team`,`player3_team`, `player4_team`, `player5_team`, `player6_team`, `player7_team`, `player8_team`,
						`player1_id`, `player2_id`,`player3_id`, `player4_id`, `player5_id`, `player6_id`, `player7_id`, `player8_id`,
						`player1_rate_id`, `player2_rate_id`,`player3_rate_id`, `player4_rate_id`, `player5_rate_id`, `player6_rate_id`, `player7_rate_id`, `player8_rate_id`,
						`player1_name`, `player2_name`,`player3_name`, `player4_name`, `player5_name`, `player6_name`, `player7_name`, `player8_name`,
						`player1_rate`, `player2_rate`,`player3_rate`, `player4_rate`, `player5_rate`, `player6_rate`, `player7_rate`, `player8_rate`,
						`player1_win`, `player1_lose`, `player1_streak`, `player1_win_streak`, `player1_lose_streak`, `player2_win`, `player2_lose`, `player2_streak`, `player2_win_streak`,`player2_lose_streak`,
						`player3_win`, `player3_lose`, `player3_streak`, `player3_win_streak`, `player3_lose_streak`, `player4_win`, `player4_lose`, `player4_streak`, `player4_win_streak`, `player4_lose_streak`,
						`player5_win`, `player5_lose`, `player5_streak`, `player5_win_streak`, `player5_lose_streak`, `player6_win`, `player6_lose`, `player6_streak`, `player6_win_streak`, `player6_lose_streak`,
						`player7_win`, `player7_lose`, `player7_streak`, `player7_win_streak`, `player7_lose_streak`, `player8_lose`, `player8_win`, `player8_streak`, `player8_win_streak`,`player8_lose_streak`,
						`player1_maxrate`, `player2_maxrate`,`player3_maxrate`, `player4_maxrate`, `player5_maxrate`, `player6_maxrate`, `player7_maxrate`, `player8_maxrate`, `replay_id`)";
	
		$result = $this->model->load ( 'gamelog', $loadData );
	
		$this->view->row = htmlspecialchars($result, ENT_QUOTES);
		$this->view->title = htmlspecialchars('レートアップロード', ENT_QUOTES);
	}
	
	public function loginloguploadAction() {
		$lgnchk = admincheck ( 'admin', $this );
		if(!$lgnchk) {
			return $this->_forward ( 'login', 'index', 'admin' );
		}
		$this->view->title = htmlspecialchars('ログインログアップロード', ENT_QUOTES);
	}
	public function loginlogprocessAction() {
		$uploadPath = dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/data/csv';
	
		$adapter = new Zend_File_Transfer_Adapter_Http ();
		$adapter->setDestination ( $uploadPath );
	
		if (! $adapter->receive ()) {
			$messages = $adapter->getMessages ();
			echo implode ( "\n", $messages );
		}
	
		$file = $adapter->getFileName ();
	
		$loadData = "LOAD DATA local INFILE '$file' ";
		$loadData .= "INTO TABLE loginlog FIELDS TERMINATED BY ',' ENCLOSED BY '\"' IGNORE 1 LINES ";
	
		$loadData .= "(`loginlog_id`,`target_user`,`login_status`,`connect_ipaddress`,`memo`,`login_date`)";
	
		$result = $this->model->load ( 'loginlog', $loadData );
	
		$this->view->row = htmlspecialchars($result, ENT_QUOTES);
		$this->view->title = htmlspecialchars('ログインログアップロード', ENT_QUOTES);
	}
	
	public function updateloguploadAction() {
		$lgnchk = admincheck ( 'admin', $this );
		if(!$lgnchk) {
			return $this->_forward ( 'login', 'index', 'admin' );
		}
		$this->view->title = htmlspecialchars('アップデートログアップロード', ENT_QUOTES);
	}
	public function updatelogprocessAction() {
		$uploadPath = dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/data/csv';
	
		$adapter = new Zend_File_Transfer_Adapter_Http ();
		$adapter->setDestination ( $uploadPath );
	
		if (! $adapter->receive ()) {
			$messages = $adapter->getMessages ();
			echo implode ( "\n", $messages );
		}
	
		$file = $adapter->getFileName ();
	
		$loadData = "LOAD DATA local INFILE '$file' ";
		$loadData .= "INTO TABLE updatelog FIELDS TERMINATED BY ',' ENCLOSED BY '\"' IGNORE 1 LINES ";
	
		$loadData .= "(`updatelog_id`,`update_date`,`update_note`,`delete_flag`)";
	
		$result = $this->model->load ( 'updatelog', $loadData );
	
		$this->view->row = htmlspecialchars($result, ENT_QUOTES);
		$this->view->title = htmlspecialchars('アップデートログアップロード', ENT_QUOTES);
	}
	
	public function rateeditloguploadAction() {
		$lgnchk = admincheck ( 'admin', $this );
		if(!$lgnchk) {
			return $this->_forward ( 'login', 'index', 'admin' );
		}
		$this->view->title = htmlspecialchars('レート編集ログアップロード', ENT_QUOTES);
	}
	public function rateeditlogprocessAction() {
		$uploadPath = dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/data/csv';
	
		$adapter = new Zend_File_Transfer_Adapter_Http ();
		$adapter->setDestination ( $uploadPath );
	
		if (! $adapter->receive ()) {
			$messages = $adapter->getMessages ();
			echo implode ( "\n", $messages );
		}
	
		$file = $adapter->getFileName ();
	
		$loadData = "LOAD DATA local INFILE '$file' ";
		$loadData .= "INTO TABLE rate_editlog FIELDS TERMINATED BY ',' ENCLOSED BY '\"' IGNORE 1 LINES ";
	
		$loadData .= "(`rate_editlog_id`, `edited_player_id`, `edited_rate_id`, `previous_name`, `previous_rate`, `new_rate`,
						`user_id`, `previous_status`, `new_status`, `previous_memo`, `new_memo`, `edited_on`)";
	
		$result = $this->model->load ( 'rate_editlog', $loadData );
	
		$this->view->row = htmlspecialchars($result, ENT_QUOTES);
		$this->view->title = htmlspecialchars('レート編集ログアップロード', ENT_QUOTES);
	}
	
	public function useruploadAction() {
		$lgnchk = admincheck ( 'admin', $this );
		if(!$lgnchk) {
			return $this->_forward ( 'login', 'index', 'admin' );
		}
		$this->view->title = htmlspecialchars('ユーザーアップロード', ENT_QUOTES);
	}
	public function userprocessAction() {
		$uploadPath = dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/data/csv';
	
		$adapter = new Zend_File_Transfer_Adapter_Http ();
		$adapter->setDestination ( $uploadPath );
	
		if (! $adapter->receive ()) {
			$messages = $adapter->getMessages ();
			echo implode ( "\n", $messages );
		}
	
		$file = $adapter->getFileName ();
	
		$loadData = "LOAD DATA local INFILE '$file' ";
		$loadData .= "INTO TABLE user FIELDS TERMINATED BY ',' ENCLOSED BY '\"' IGNORE 1 LINES ";
	
		$loadData .= "(`user_id`,`user_name`,`user_password`,`user_control`,`last_editor`,`delete_flag`,`created_on`,`updated_on`,`login_failed_number`)";
	
		$result = $this->model->load ( 'user', $loadData );
	
		$this->view->row = htmlspecialchars($result, ENT_QUOTES);
		$this->view->title = htmlspecialchars('ユーザーアップロード', ENT_QUOTES);
	}
	
	public function usereditloguploadAction() {
		$lgnchk = admincheck ( 'admin', $this );
		if(!$lgnchk) {
			return $this->_forward ( 'login', 'index', 'admin' );
		}
		$this->view->title = htmlspecialchars('ユーザー編集ログアップロード', ENT_QUOTES);
	}
	public function usereditlogprocessAction() {
		$uploadPath = dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/data/csv';
	
		$adapter = new Zend_File_Transfer_Adapter_Http ();
		$adapter->setDestination ( $uploadPath );
	
		if (! $adapter->receive ()) {
			$messages = $adapter->getMessages ();
			echo implode ( "\n", $messages );
		}
	
		$file = $adapter->getFileName ();
	
		$loadData = "LOAD DATA local INFILE '$file' ";
		$loadData .= "INTO TABLE user_editlog FIELDS TERMINATED BY ',' ENCLOSED BY '\"' IGNORE 1 LINES ";
	
		$loadData .= "(`user_edited_id`,`edited_user_id`,`previous_name`,`new_name`,`previous_control`,`new_control`,`memo`,`user_id`,`created_on`)";
	
		$result = $this->model->load ( 'user_editlog', $loadData );
	
		$this->view->row = htmlspecialchars($result, ENT_QUOTES);
		$this->view->title = htmlspecialchars('ユーザー編集ログアップロード', ENT_QUOTES);
	}
	
	public function playernoteuploadAction() {
		$lgnchk = admincheck ( 'admin', $this );
		if(!$lgnchk) {
			return $this->_forward ( 'login', 'index', 'admin' );
		}
		$this->view->title = htmlspecialchars('プレイヤーコメントアップロード', ENT_QUOTES);
	}
	public function playernoteprocessAction() {
		$uploadPath = dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/data/csv';
	
		$adapter = new Zend_File_Transfer_Adapter_Http ();
		$adapter->setDestination ( $uploadPath );
	
		if (! $adapter->receive ()) {
			$messages = $adapter->getMessages ();
			echo implode ( "\n", $messages );
		}
	
		$file = $adapter->getFileName ();
	
		$loadData = "LOAD DATA local INFILE '$file' ";
		$loadData .= "INTO TABLE player_note FIELDS TERMINATED BY ',' ENCLOSED BY '\"' IGNORE 1 LINES ";
	
		$loadData .= "(`player_note_id`,`player_id`,`writer_name`,`comment`,`writers_ip`,`edit_user_id`,`delete_flag`,`created_on`,`updated_on`)";
	
		$result = $this->model->load ( 'player_note', $loadData );
	
		$this->view->row = htmlspecialchars($result, ENT_QUOTES);
		$this->view->title = htmlspecialchars('プレイヤーコメントアップロード', ENT_QUOTES);
	}
}