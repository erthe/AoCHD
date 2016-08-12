<?php
$dirname = dirname(__FILE__);
require_once ("$dirname/SmartIRC.php");
require_once ("$dirname/SmartIRC/dbconnection.php");

define('PLUGIN_MYBOT_ENCODING', "UTF-8");
defined('PLUGIN_URL_TITLE_MAX') or define('PLUGIN_URL_TITLE_MAX', 255); // リンクタイトルの最大長
define("LOG_PATH", "$dirname/log/"); //ログの保存先
define("USER_ALLOW_CONF", "$dirname/allow.conf");
define("USER_OWNER_CONF", "$dirname/owner.conf");
define("USER_ADMIN_CONF", "$dirname/admin.conf");
define("CHANNEL_ADMIN_CONF", "$dirname/adminch.conf");
define("CHANNEL_LIST_CONF", "$dirname/channelList.conf");
define("TIMER_CHECK_CH", "#AoCHD");
define("JOIN_ALLOW_CHECK", "#AoCHDコミュ準備会");
define("CIV_TXT", "$dirname/civ.txt");
define("CIV_AK_TXT", "$dirname/africa.txt");
define("TRASH_WORD_TXT", "$dirname/trash.txt");
define("SAKKO_WORD_TXT", "$dirname/sakko.txt");
define("ROAD_WORD_TXT", "$dirname/road.txt");
define("SOT_WORD_TXT", "$dirname/sot.txt");

$channels_list = null;
date_default_timezone_set('Asia/Tokyo');

class MyBot {
	//var $system_revision = '$Revision: 283 $';
	//var $system_date = '$Date: 2012-05-31 23:44:20 +0900 (木, 31 5月 2012) $';
	

	function MyBot(){
		 global $channels_list;
		 $channels_list = $this->channel_list(CHANNEL_LIST_CONF);
	}

	function timer(&$irc){
		global $channels_list;
		foreach($channels_list as $list){
			$channel = &$irc->getChannel($list);

			if($list === TIMER_CHECK_CH){
				$db = new DbConnection();
				$sql = "SELECT advertisement_id, difficulty, current_number_entry, max_number_entry, entered_time, advertised_time, adv_start_time, game_note FROM advertisement";
				$params = null;
				$result = $db->execution($sql, $params);

				if(!$result){
					return true;
				}

				foreach($result as $row){
					$entered_time = strtotime($row['entered_time']);
					$advertised_time =  strtotime($row['advertised_time']);

					if($entered_time > $advertised_time){
						switch($row['difficulty']){
							case '1':
								$difficulty = '初心部屋';
								break;
							case '2':
								$difficulty = '初級部屋';
								break;
							case '3':
								$difficulty = '普通部屋';
								break;
							case '4':
								$difficulty = 'シナリオ';
								break;
							default :
								$difficulty = 'その他';
								break;
						}
						$adv_start_time = strtotime($row['adv_start_time']);
						$start_time = date('H:i:s', $adv_start_time);
						$num_pos = intval($row['max_number_entry']) - intval($row['current_number_entry']);
						$now = time();
						$time_adv = gmdate('H:i:s', $now - $adv_start_time);
						$irc->message(SMARTIRC_TYPE_NOTICE, $list, '['.$start_time.'] '.$difficulty.' '.$row['game_note'].'@'.$num_pos.' 募集時間 : '.$time_adv);
						
						$update_sql = "UPDATE advertisement SET advertised_time = :advertised_time WHERE advertisement_id = :advertisement_id";
						$update_params = array(array('column' => 'advertised_time', 'field' => date('Y-m-d H:i:s', $now), 'type' => 'str'),
									array('column' => 'advertisement_id', 'field' => $row['advertisement_id'], 'type' => 'int'));
						$result2 = $db->execution($update_sql, $update_params);
					}
				}
			}
		}
	}

	// なると付与
	// ニックネームが自分だったら処理をしない
	// HOSTを参照してローカルのユーザーだったらオペレーション権限を付与
	// それ以外の場合は「ごきげんよう」と挨拶する
	function naruto(&$irc, &$data){
		if ($data->nick == $irc->_nick) return;

		if ($this->user_allow($data->nick)){
			$irc->op($data->channel,$data->nick);
		} elseif($this->admin_allow($data->nick)){
			$irc->ao($data->channel,$data->nick);
		} elseif($this->owner_allow($data->nick)){
			$irc->qo($data->channel,$data->nick);
		}

		if ($data->nick === 'akito_tti') {
			$irc->message(SMARTIRC_TYPE_NOTICE, $data->channel, 'あきとっちめ');
		} elseif($data->nick === 'sakko') {
			$this->sakko($irc, $data);
		} elseif(strpos($data->nick, 'trash') !== false) {
			$this->trash($irc, $data);
		} elseif($data->nick === 'road') {
			$this->road($irc, $data);
		} elseif($data->nick === 'sot') {
			$this->sot($irc, $data);
		}
	}

	function auth_ch(&$irc, &$data){
		if ($data->nick == $irc->_nick) return;
		if($data->channel === JOIN_ALLOW_CHECK){
			if (!$this->allow_list($data->nick)){
				$irc->kick($data->channel,$data->nick, 'あなたはこのチャンネルへの入室が許可されていません。');
			}
		}
	}

	function naruto_said(&$irc, &$data){
		$has_op = $this->op_list($irc, $data->channel);

		if(empty($has_op)){
			$irc->message(SMARTIRC_TYPE_NOTICE, $data->channel, $data->nick.'誰もオペレーター権限持ってません。');
			return false;
		}

		if ($this->user_allow($data->nick)){
			$irc->op($data->channel,$data->nick);
		} elseif($this->admin_allow($data->nick)){
			$irc->ao($data->channel,$data->nick);
		} elseif($this->owner_allow($data->nick)){
			$irc->qo($data->channel,$data->nick);
		} else {
			$irc->message(SMARTIRC_TYPE_NOTICE, $data->channel, $data->nick.'あなたへのオペレーター権限は配れません。');
			return false;
		}

	}

	/// urlからタイトル取得
  	function url(&$irc, &$data){
		$url = trim($data->message);
		$title = false;

		if(version_compare(PHP_VERSION, '5.0', '>=')){
			$option = array(
				'http' => array(
					'timeout' => 5,
					'method' => 'GET',
					'header' => 'Referer: ' . $url . "\r\n"
					. 'User-Agent: ' . 'Mozilla/5.0 (Windows; U; Windows NT 5.1; ja; rv:1.9.2) Gecko/20100115 Firefox/3.6 (.NET CLR 3.5.30729)' . "\r\n"
					. 'Connection: close' . "\r\n"
				)
			);
			$context = stream_context_create($option);
			$urldata = @file_get_contents($url, 0, $context);
		}else{
			$urldata = @file_get_contents($url);
		}

		if($urldata === false) return $title; // 取得失敗
		if(preg_match('#[^\'\"]<title[^\>]*>(.*?)</title>[^\'\"]#is', $urldata, $matches) ){
			$encoding = mb_detect_encoding($urldata);

			$title = $matches[1];
			if(preg_match("/&#[xX]*[0-9a-zA-Z]{2,8};/", $title)){ // 数値参照形式 -> 文字列
				$title = $this->nument2chr($title, $encoding);
			}

			$title = mb_convert_encoding($title, PLUGIN_MYBOT_ENCODING, $encoding);// 内部文字コードに変換
			$title = html_entity_decode($title, ENT_QUOTES, PLUGIN_MYBOT_ENCODING);
			$title = $this->mb_trim($title);
			$title = mb_strimwidth($title, 0, PLUGIN_URL_TITLE_MAX, "...", PLUGIN_MYBOT_ENCODING); // 長すぎる場合はカット
		}

		if($title) {
			$irc->message(SMARTIRC_TYPE_NOTICE, $data->channel, $title);
		}
	}

	  function player_info(&$irc, &$data){
		$get_message = trim($data->message);
		$player = str_replace('hdjp ', '', $get_message);

		if(!$player){
			$irc->message(SMARTIRC_TYPE_NOTICE, $data->channel, 'プレイヤー名が取得出来ません。');
			return false;
		}

		$db = new DbConnection();
		$sql = "SELECT p.player_name AS player_name, r.rate AS rate, r.win AS win, r.lose AS lose, r.streak AS streak, r.win_streak AS max_win, r.lose_streak AS max_lose, round(win / (win + lose)*100, 3) AS percent FROM player AS p INNER JOIN rate AS r ON p.rate_id = r.rate_id WHERE p.player_name LIKE :player_name ESCAPE '!' AND p.delete_flag = :delete_flag";
		$params = array(array('column' => 'player_name', 'field' => preg_replace('/(?=[!_%])/', '!', $player) . '%', 'type' => 'str'), array('column' => 'delete_flag', 'field'=> 0, 'type' => 'int'));
		$result = $db->execution($sql, $params);
		if(!$result){
			$irc->message(SMARTIRC_TYPE_NOTICE, $data->channel, 'プレイヤー名が存在しません。');
			return false;
		}
		foreach($result as $row){
			$irc->message(SMARTIRC_TYPE_NOTICE, $data->channel, $row['player_name'].' レート: '.$row['rate'].' 戦績: '.$row['win'].'勝'.$row['lose'].'敗(勝率: '.$row['percent'].'%) 最連: '.$row['max_win'].'-'.$row['max_lose'].' 連勝/連敗: '.$row['streak']);
		}
		
	  }

	  function game_info(&$irc, &$data){
		$db = new DbConnection();
		$sql1 = "SELECT advertisement_id, difficulty, current_number_entry, max_number_entry, entered_time, advertised_time, adv_start_time, game_note FROM advertisement";
		$params1 = null;
		$result1 = $db->execution($sql1, $params1);
		
		$count = 0;
		if(isset($result1)){
			foreach($result1 as $row){
				$entered_time = strtotime($row['entered_time']);
				$advertised_time =  strtotime($row['advertised_time']);

				switch($row['difficulty']){
					case '1':
						$difficulty = '初心部屋';
						break;
					case '2':
						$difficulty = '初級部屋';
						break;
					case '3':
						$difficulty = '普通部屋';
						break;
					case '4':
						$difficulty = 'シナリオ';
						break;
					default :
						$difficulty = 'その他';
						break;
				}

				$adv_start_time = strtotime($row['adv_start_time']);
				$start_time = date('H:i:s', $adv_start_time);
				$num_pos = intval($row['max_number_entry']) - intval($row['current_number_entry']);
				$now = time();
				$time_adv = gmdate('H:i:s', $now - $adv_start_time);
				$irc->message(SMARTIRC_TYPE_NOTICE, $data->channel, '['.$start_time.'] '.$difficulty.' '.$row['game_note'].'@'.$num_pos.' 募集時間 : '.$time_adv);
				$count++;
			}
		}

		$sql2 = "SELECT created_on, player1_name, player2_name, player3_name, player4_name, player5_name, player6_name, player7_name, player8_name FROM gamelog WHERE game_status = :game_status";
		$params2= array(array('column' => 'game_status', 'field' => 1, 'type' => 'int'));
		$result2= $db->execution($sql2, $params2);

		if(!$result2&&$count<1){
			$irc->message(SMARTIRC_TYPE_NOTICE, $data->channel, '現在ゲーム情報はありません。');
			return false;
		}

		foreach($result2 as $row){
			$entry_player = $row['player1_name'].', '.$row['player2_name'];
			if(!is_null($row['player3_name'])){
				$entry_player = $entry_player . ', ' . $row['player3_name'];
			}
			if(!is_null($row['player4_name'])){
				$entry_player = $entry_player . ', ' . $row['player4_name'];
			}
			if(!is_null($row['player5_name'])){
				$entry_player = $entry_player . ', ' . $row['player5_name'];
			}
			if(!is_null($row['player6_name'])){
				$entry_player = $entry_player . ', ' . $row['player6_name'];
			}
			if(!is_null($row['player7_name'])){
				$entry_player = $entry_player . ', ' . $row['player7_name'];
			}
			if(!is_null($row['player8_name'])){
				$entry_player = $entry_player . ', ' . $row['player8_name'];
			}

		    $irc->message(SMARTIRC_TYPE_NOTICE, $data->channel, '開始時間: '.$row['created_on'].' 参加者: '.$entry_player);
		}

	  }

	function stream(&$irc, &$data) {
		// niconico
		ini_set('user_agent', 'AoCHD.jp');
		$endpoint = 'http://api.search.nicovideo.jp/api/v2/live/contents/search?q=AoC%20or%20AoE2%20or%20AOE2%20or%20AoEⅡ&targets=title&filters[liveStatus][0]=onair&fields=contentId,title,liveStatus,viewCounter&_sort=-viewCounter';
		$url = 'http://live.nicovideo.jp/watch/';

		$api_data = file_get_contents($endpoint);
		$json = get_object_vars(json_decode($api_data));
		$result = array();

		foreach($json as $array) {
			foreach($array as $std) {
				if(!is_null($std->contentId)) {
					$result[] = array('title' => $std->title,
							'viewer' => $std->viewCounter,
							'url' => $url . $std->contentId
						);
				}
			}
		}

		if (empty($result)) {
			$irc->message(SMARTIRC_TYPE_NOTICE, $data->channel, '現在ニコ生配信はありません。');
		} else {
			foreach($result as $nico) {
				$string = $nico['title'] . ' ' . $nico['url'] . ' 視聴者： ' . $nico['viewer'] . '人 ';
				$irc->message(SMARTIRC_TYPE_NOTICE, $data->channel, $string);
			}

		}

		// cave tube
		$db = new DbConnection();
		$sql = "SELECT name, stream_id FROM aoc_stream WHERE live_type = :live_type AND delete_flag = :delete_flag";
 		$params = array(
			array('column' => 'live_type', 'field' => 'CaveTube', 'type' => 'str'),
			array('column' => 'delete_flag', 'field' => 0, 'type' => 'int')
		);
		$CaveLivers = $db->execution($sql, $params);

		$content = file_get_contents('http://rss.cavelis.net/index_live.xml');
		$xml_parser=xml_parser_create();
		xml_parse_into_struct($xml_parser, $content, $vals);
		xml_parser_free($xml_parser);

		$cave_livers = array();
		$isSet = false;

		for($i=0; $i < count($vals); $i++){
			if ($vals[$i]['tag'] === 'TITLE') {
				$tmpTitle = $vals[$i]['value'];
			}

			if ($vals[$i]['tag'] === 'NAME') {
				foreach($CaveLivers as $liver) {
					if ($liver['stream_id'] === $vals[$i]['value']) {
						$tmpUrl = 'https://www.cavelis.net/live/' . $vals[$i]['value'];
						$isSet = true;
						break;
					}
				}

				$tmpName = $vals[$i]['value'];

			}

			if ($vals[$i]['tag'] === 'CT:LISTENER') {
				$tmpViewer = $vals[$i]['value'];

				if ($isSet) {
					$cave_livers[] = array(
						'name' => $tmpName,
						'url' => $tmpUrl,
						'viewer' => $tmpViewer,
						'title' => $tmpTitle
					);
					$isSet = false;
				}
			}
		}

		$string = '';
		if (empty($cave_livers)) {
			$string = '現在配信はありません。';
			$irc->message(SMARTIRC_TYPE_NOTICE, $data->channel, $string);
		} else {
			foreach($cave_livers as $livers) {
				$string = $livers['name'] . ' ' . $livers['url'] . ' 視聴者: ' . $livers['viewer'] . '人 ' . $livers['title'];
				$irc->message(SMARTIRC_TYPE_NOTICE, $data->channel, $string);
			}
		}
		
		$file = '/home/erthe/smart_irc_aoc/broadcast_list.txt';
		$fp = fopen($file, "r");
		$jaoc = fgets($fp);
		fclose($fp);
		$jaoc = mb_convert_encoding($jaoc, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
		$aochd = json_decode($jaoc, true);
		$arrNum = count($aochd['account']);
		$streamUrl = 'http://aochd.jp/broadcast/live/';

		if (!is_null($aochd)) {
		    if (!is_array($aochd['account'])) {
		        $is_single = true;
		    } else {
		        $is_single = false;
		    }
		}

		if ($is_single) {
			$aochd_result[] = [
				'title' => $aochd['title'],
				'name' => $aochd['name'],
				'url' => $streamUrl . $aochd['url']
    			];
		} else {
			for($i=0; $i<$arrNum; $i++) {
        			$aochd_result[] = [
	    				'title' => $aochd['title'][$i],
					'name' => $aochd['name'][$i],
					'url' => $streamUrl . $aochd['url'][$i]
        			];
			}
		}

		if (empty($aochd_result)) {
			$irc->message(SMARTIRC_TYPE_NOTICE, $data->channel, '現在AoCHD配信はありません。');

		} else {
			foreach($aochd_result as $aoc) {
				$string = $aoc['name'] . ' ' . $aoc['title'] . ' ' . $aoc['url'];
				$irc->message(SMARTIRC_TYPE_NOTICE, $data->channel, $string);
			}
		}
	}

	function auth_info(&$irc, &$data){
		$auth_member = $this->auth_search($irc, $data);
		$irc->message(SMARTIRC_TYPE_NOTICE, $data->channel, $auth_member);
	}

	function call_auth(&$irc, &$data){
		$auth_member = $this->auth_search($irc, $data);
		if ($auth_member) {
			$irc->message(SMARTIRC_TYPE_CHANNEL, $data->channel, $auth_member);
		}
	}

	function vs_player(&$irc, &$data){
		$get_message = trim($data->message);
		$vsplayers = explode(' ',str_replace('hdata ', '', $get_message));
		$player_name = $vsplayers[0];
		$rival_name = $vsplayers[2];
		$mode = $vsplayers[1];

		$db = new DbConnection();
		$player_sql = "SELECT player_id, player_name FROM player WHERE player_name LIKE :player_name ESCAPE '!'";
		$player_params = array(array('column' => 'player_name', 'field' => preg_replace('/(?=[!_%])/', '!', $player_name) . '%', 'type' => 'str'));
		$player_id_search = $db->execution($player_sql, $player_params);
		$player_id = $player_id_search[0]['player_id'];

		$rival_sql = "SELECT player_id, player_name FROM player WHERE player_name LIKE :player_name ESCAPE '!'";
		$rival_params = array(array('column' => 'player_name', 'field' => preg_replace('/(?=[!_%])/', '!', $rival_name) . '%', 'type' => 'str'));
		$rival_id_search = $db->execution($rival_sql, $rival_params);
		$rival_id = $rival_id_search[0]['player_id'];

		$sql = "SELECT * FROM gamelog WHERE (player1_id = :player1_id OR player2_id = :player2_id OR player3_id = :player3_id OR player4_id = :player4_id OR player5_id = :player5_id OR player6_id = :player6_id OR player7_id = :player7_id OR player8_id = :player8_id) AND game_status = 0 ORDER BY gamelog_id DESC";
		$params = array(array('column' => 'player1_id', 'field' => $player_id, 'type' => 'int'),
				array('column' => 'player2_id', 'field' => $player_id, 'type' => 'int'),
				array('column' => 'player3_id', 'field' => $player_id, 'type' => 'int'),
				array('column' => 'player4_id', 'field' => $player_id, 'type' => 'int'),
				array('column' => 'player5_id', 'field' => $player_id, 'type' => 'int'),
				array('column' => 'player6_id', 'field' => $player_id, 'type' => 'int'),
				array('column' => 'player7_id', 'field' => $player_id, 'type' => 'int'),
				array('column' => 'player8_id', 'field' => $player_id, 'type' => 'int'),

			);
		$result = $db->execution($sql, $params);
		$idx = 0;
		$vsidx = 0;
		$player1_win = 0;
		$player1_lose = 0;
		$streak = 0;
		$win_streak = 0;
		$lose_streak = 0;
		
		foreach($result as $rows){


			$win_id = 0;
			$lose_id = 0;
			$player_team = null;
			$rival_team = null;
			$i = 1;
			$k = 1;
	
			foreach($rows as $key => $value) {
		
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
					
					if($value == $player_id){
						if($is_win){
							$player_team = $rows['win_team'];
						} else {
							$player_team = $rows['lose_team'];
						}
						$player_team = array('team' => $player_team, 'win_flag' => $is_win);
						
					}
					
					if($value == $rival_id){
						if($is_win){
							$rival_team = $rows['win_team'];
						} else {
							$rival_team = $rows['lose_team'];
						}
						$rival_team = array('team' => $rival_team, 'win_flag' => $is_win);
					}
					
					$k++;
				} elseif ($key === 'player'.$k.'_id') {
					$k++;
				}
			
			}
			
			// check player_id2 is including or not
			if(!is_null($rival_team)){
				if(($mode === 'vs' && $player_team['team'] != $rival_team['team']) ||
					($mode === 'and' && $player_team['team'] == $rival_team['team']) ) {
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
					$vsidx++;
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

		if($mode === 'vs' || $mode === 'VS'){
			$diplomacy = ' vs ';
		} else {
			$diplomacy = ' and ';
		}

		$lose_streak = $lose_streak * -1;
		$irc->message(SMARTIRC_TYPE_NOTICE, $data->channel, $player1_win.'勝'.$player1_lose.'敗(勝率: '.$percent.'%), 連勝-連敗(最高): '.$win_streak.'-'.$lose_streak.', '.$player_id_search[0]['player_name'].$diplomacy.$rival_id_search[0]['player_name']);
	}

	function civ (&$irc, &$data){
		$words = explode("\n", file_get_contents(CIV_TXT));
		$max_num = count($words) - 1;
		$random = mt_rand(0, $max_num);

		$irc->message(SMARTIRC_TYPE_NOTICE, $data->channel, $words[$random].'だよ、振り直しはなしだよ。');
	}

	function civak (&$irc, &$data){
		$words = explode("\n", file_get_contents(CIV_AK_TXT));
		$max_num = count($words) - 1;
		$random = mt_rand(0, $max_num);

		$irc->message(SMARTIRC_TYPE_NOTICE, $data->channel, $words[$random].'だよ、絶対。');
	}

	function trash (&$irc, &$data){
		$words = explode("\n", file_get_contents(TRASH_WORD_TXT));
		$max_num = count($words) - 1;
		$random = mt_rand(0, $max_num);

		$irc->message(SMARTIRC_TYPE_NOTICE, $data->channel, $words[$random]);
	}

	function sakko (&$irc, &$data){
		$words = explode("\n", file_get_contents(SAKKO_WORD_TXT));
		$max_num = count($words) - 1;
		$random = mt_rand(0, $max_num);

		$irc->message(SMARTIRC_TYPE_NOTICE, $data->channel, $words[$random]);
	}

	function road (&$irc, &$data){
		$words = explode("\n", file_get_contents(ROAD_WORD_TXT));
		$max_num = count($words) - 1;
		$random = mt_rand(0, $max_num);

		$irc->message(SMARTIRC_TYPE_NOTICE, $data->channel, $words[$random]);
	}

	function sot (&$irc, &$data){
		$words = explode("\n", file_get_contents(SOT_WORD_TXT));
		$max_num = count($words) - 1;
		$random = mt_rand(0, $max_num);

		$irc->message(SMARTIRC_TYPE_NOTICE, $data->channel, $words[$random]);
	}

	function quit (&$irc, &$data){
		if(preg_match("/^Erlkonig[?X][0-9_]{0,}$/", $data->nick)){
			$irc->quit('さようなら');
			$irc->disconnect();
		}
	}

	function getlog(&$irc, &$data){
		$filename = date('Ymd') . '.txt';

		$message = '';
		switch($data->type){
			case SMARTIRC_TYPE_JOIN:
				$message = sprintf("%s:%s - %s(%s): has joined channel\n"
				, date('H:i:s')
				, $data->channel
				, $data->nick
				, $data->from
				);
				break;

			case SMARTIRC_TYPE_QUIT:
				break;

			case SMARTIRC_TYPE_PART:
				$message = sprintf("%s:%s - %s: has left IRC \"\"%s\"\"\n"
				, date('H:i:s')
				, $data->channel
				, $data->nick
				, $data->message
				);
				break;
			default:
				$message = sprintf("%s:%s - %s: %s\n"
				, date('H:i:s')
				, $data->channel
				, $data->nick
				, $data->message
				);
				break;
		}
		file_put_contents(LOG_PATH.$filename, $message, FILE_APPEND);
	}

	function encode($str){
		return mb_convert_encoding($str, IRC_ENCODING, PLUGIN_MYBOT_ENCODING);
	}

	function decode($str){
		return mb_convert_encoding($str, PLUGIN_MYBOT_ENCODING, IRC_ENCODING);
	}

	/// ヘルプ
	function help(&$irc, &$data){
		$str =<<<EOD
naruto: なると配布, auth: 管理者一覧, callauth: 権限者を呼ぶ(キーワード反応版) 
> http://～: HTMLタイトル自動表示, hdjp ～: プレイヤーのJPレート表示, game: 現在のゲーム中の部屋の情報表示
> hdata ～ vs(and) ～: HPのVSプレイヤーと同じ機能, help: このbotの使い方 stream: 配信中の一覧を表示
> civ: オリジナルゲームの文明ピック(ランダム), civak: 拡張パックの文明ピック(ランダム)
EOD;
		$str = $str;
		$strs = explode("\n", $str);
		foreach($strs as $key => $val){
			$irc->message(SMARTIRC_TYPE_NOTICE, $data->channel, $val);
		}
	}

	// マルチバイトtrim
	function mb_trim($str){
		$whitespace = '[\s\0\x0b\p{Zs}\p{Zl}\p{Zp}]';
		$pattern = array(
		sprintf('/(^%s+|%s+$)/u', $whitespace, $whitespace), // 前後の空白
		"/[\r\n]+/", // 改行
		"/[\s]+/", // 空白の連続
		);
		$replacement = array(
		'',
		'',
		' ',
		);
		$ret = preg_replace($pattern, $replacement, $str);
		return $ret;
	}

	// オペレータ列挙
	function op_list($irc, $data){
		$list = [];
		//$channel = $irc->channel[$data->channel]; // だと文字化けするためかうまく取得できない。getChannel()を使う
		$channel = $irc->getChannel($data);

		foreach ($channel->ops as $key => $value) {
			$list[] = $key;
		}

		if(empty($list)) return false;

		$irc->message(SMARTIRC_TYPE_NOTICE, $data->channel, $list);
		return $list;
	}

	// 数値文字参照を文字に変換(&#x0000;)
	function nument2chr($string, $encode_to='utf-8') {
		// 文字コードチェック、mb_detect_order()が関係する
		$encoding = strtolower(mb_detect_encoding($string));
		if (!preg_match("/^utf/", $encoding) and $encoding != 'ascii') {
			return '';
		}

		// 16 進数の文字参照(らしき表記)が含まれているか
		$excluded_hex = $string;
		if(preg_match("/&#[xX][0-9a-zA-Z]{2,8};/", $string)) {
			// 16 進数表現は 10 進数に変換
			$excluded_hex = preg_replace("/&#[xX]([0-9a-zA-Z]{2,8});/e", "'&#'.hexdec('$1').';'", $string);
		}
		return mb_decode_numericentity($excluded_hex, array(0x0, 0x10000, 0, 0xfffff), $encode_to);
	}
	function user_allow($s){
		$user_list = explode("\n", file_get_contents(USER_ALLOW_CONF));
		foreach($user_list as $user){
			if ($user && (preg_match("/^".preg_quote($user)."[0-9_]{0,}$/",$s))){
				return TRUE;
		}
		}

		return FALSE;
	}

	function owner_allow($s){
		$user_list = explode("\n", file_get_contents(USER_OWNER_CONF));
		foreach($user_list as $user){
			if ($user && preg_quote($user) === preg_quote($s)){
				return TRUE;
			}
		}

		return FALSE;
	}

	function admin_allow($s){
		$user_list = explode("\n", file_get_contents(USER_ADMIN_CONF));
		foreach($user_list as $user){
			if ($user && preg_quote($user) === preg_quote($s)){
				return TRUE;
			}
		}

		return FALSE;
	}

	function allow_list($s){
		$user_list = explode("\n", file_get_contents(CHANNEL_ADMIN_CONF));
		foreach($user_list as $user){
			$escape_user =  preg_quote($user);
			if ($user && $escape_user === preg_quote($s)){
				return TRUE;
			}
		}

		return FALSE;
	}

	function channel_list($s){
		$channels = explode("\n", file_get_contents(CHANNEL_LIST_CONF));

		foreach($channels as $channel){
			$channel_list[] = $channel;

		}

		return $channel_list;
	}

	function auth_search(&$irc, &$data){
		$db = new DbConnection();
		$sql = "SELECT user_name FROM user WHERE delete_flag = :delete_flag";
		$params = array(array('column' => 'delete_flag', 'field' => 0, 'type' => 'int'));
		$result = $db->execution($sql, $params);

		if(!$result){
			$irc->message(SMARTIRC_TYPE_NOTICE, $data->channel, '権限者なし。');
			return false;
		}

		$auth_member = null;
		foreach($result as $row){
		    $auth_member = $auth_member . $row['user_name'] ." ";
		}

		return $auth_member;
	}
}
