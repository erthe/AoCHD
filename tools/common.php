<?php
function report($params, $parent) {
	$adapter = dbadapter ();
	$param = dbconnect ();
	
	$db = Zend_Db::factory ( $adapter, $param );
	$db->beginTransaction ();
	
	try {
		if ($params ['win_team'] === '1') {
			$lose_team = 2;
		} else {
			$lose_team = 1;
		}
		
		$log = array (
				'gamelog_id' => $params ['game_id'],
				'game_status' => 0,
				'game_end' => $params ['end_time'],
				'win_team' => $params ['win_team'],
				'lose_team' => $lose_team 
		);
		
		if (array_key_exists ( 'created_on', $params )) {
			$log += array (
					'created_on' => $params ['created_on'] 
			);
		}
		
		$result1 = $parent->model->update ( 'gamelog', $log );
		$game = $parent->model->getInfo ( 'gamelog', $params ['game_id'], null );
		$search_player_id = 'player_id = ';
		$orflag = false;
		$num = 0;
		
		foreach ( $game as $key => $value ) {
			if (preg_match ( '/^player[0-9]_id$/', $key ) && ! is_null ( $value )) {
				if ($orflag) {
					$search_player_id = $search_player_id . ' or player_id = ';
				}
				$search_player_id = $search_player_id . $value;
				$orflag = true;
				$num ++;
			}
		}
		
		$player = $parent->model->joinInfos ( 'player', array (
				'rate' 
		), $search_player_id, 'delete_flag', 0, null );
		
		foreach ( $player as $array ) {
			// search target's id & player index
			foreach ( $game as $key => $value ) {
				if ($array ['player_id'] == $value && preg_match ( '/^player[0-9]_id$/', $key )) {
					$index_key = explode ( 'player', $key );
					$search_key = str_replace ( '_id', '', $index_key [1] );
					break;
				}
			}
			
			// search target's team
			
			$update = RateSet ( $array, $game, $num );
			$result2 = $parent->model->update ( 'rate', $update );
		}
		if (array_key_exists ( 'option', $params )) {
			$parent->view->previous = htmlspecialchars ( $params ['option'], ENT_QUOTES );
		}
		
		$db->commit ();
		return $result1;
	} catch ( Exception $e ) {
		$db->rollBack ();
		echo $e->getMessage ();
	}
}
function Detail($params, $parent) {
	$command = "round(win / (win + lose)*100, 3) AS percent";
	$player_id = $params ['player_id'];
	
	$player_info = $parent->model->getInfo ( 'player', $player_id, null );
	$rate_id = $player_info ['rate_id'];
	
	$rate = $parent->model->getInfo ( 'rate', $rate_id, $command );
	$where = 'player1_id =' . $params ['player_id'];
	$where .= ' or player2_id =' . $params ['player_id'];
	$where .= ' or player3_id =' . $params ['player_id'];
	$where .= ' or player4_id =' . $params ['player_id'];
	$where .= ' or player5_id =' . $params ['player_id'];
	$where .= ' or player6_id =' . $params ['player_id'];
	$where .= ' or player7_id =' . $params ['player_id'];
	$where .= ' or player8_id =' . $params ['player_id'];
	$players = $parent->model->searchlist ( 'gamelog', $where, 0, 'game_status', 'gamelog_id desc' );
	
	$idx = 0;
	$win_team = null;
	$lose_team = null;
	$target_rate = array ();
	$today = new Zend_Date ();
	$target_rate [] = array (
			'created_on' => $today->get ( Zend_Date::W3C ),
			'rate' => intval ( $rate ['rate'] ) 
	);
	
	foreach ( $players as $array => $list ) {
		$win_member = 0;
		$lose_member = 0;
		$win_id = 0;
		$lose_id = 0;
		$win_rate = 0;
		$lose_rate = 0;
		$win_rate_id = 0;
		$lose_rate_id = 0;
		$i = 1;
		$j = 1;
		$k = 1;
		$m = 1;
		$o = 1;
		
		foreach ( $list as $key => $value ) {
			
			if ($key === 'win_team') {
				$win_team [$idx] ['team'] = $value;
			}
			
			if ($key === 'lose_team') {
				$lose_team [$idx] ['team'] = $value;
			}
			
			if ($key === 'player' . $i . '_team' && ! is_null ( $value )) {
				if ($value === $win_team [$idx] ['team']) {
					${'player' . $i . '_team'} = $win_team [$idx] ['team'];
				} elseif (! is_null ( $value )) {
					${'player' . $i . '_team'} = $lose_team [$idx] ['team'];
				}
				$i ++;
			} elseif ($key === 'player' . $i . '_team') {
				$i ++;
			}
			
			if ($key === 'player' . $j . '_name' && ! is_null ( $value )) {
				if (${'player' . $j . '_team'} == $win_team [$idx] ['team']) {
					$win_team [$idx] ['member_' . $win_member] = $value;
					$win_member ++;
				} elseif (! is_null ( $value )) {
					$lose_team [$idx] ['member_' . $lose_member] = $value;
					$lose_member ++;
				}
				$j ++;
			} elseif ($key === 'player' . $j . '_name') {
				$j ++;
			}
			
			if ($key === 'player' . $k . '_id' && ! is_null ( $value )) {
				if (${'player' . $k . '_team'} === $win_team [$idx] ['team']) {
					$win_team [$idx] ['id_' . $win_id] = $value;
					$win_id ++;
				} elseif (! is_null ( $value )) {
					$lose_team [$idx] ['id_' . $lose_id] = $value;
					$lose_id ++;
				}
				
				// for graph data
				if ($value == $params ['player_id']) {
					// set data only before 3 month from today
					$before_3month = date ( 'Y-m-d H:i:s', strtotime ( '- 3 months' ) );
					$date = date ( $list ['created_on'] );
					
					if (strtotime ( $date ) > strtotime ( $before_3month )) {
						$target_rate [] = array (
								'created_on' => $list ['created_on'],
								'rate' => intval ( $list ['player' . $k . '_rate'] ) 
						);
					}
				}
				$k ++;
			} elseif ($key === 'player' . $k . '_id') {
				$k ++;
			}
			
			if ($key === 'player' . $o . '_rate_id' && ! is_null ( $value )) {
				if (${'player' . $o . '_team'} === $win_team [$idx] ['team']) {
					$win_team [$idx] ['rate_id_' . $win_rate_id] = $value;
					$win_rate_id ++;
				} elseif (! is_null ( $value )) {
					$lose_team [$idx] ['rate_id_' . $lose_rate_id] = $value;
					$lose_rate_id ++;
				}
				$o ++;
			} elseif ($key === 'player' . $m . '_rate_id') {
				$o ++;
			}
			
			if ($key === 'player' . $m . '_rate' && ! is_null ( $value )) {
				if (${'player' . $m . '_team'} === $win_team [$idx] ['team']) {
					$win_team [$idx] ['rate_' . $win_rate] = $value;
					
					$win_rate ++;
				} elseif (! is_null ( $value )) {
					$lose_team [$idx] ['rate_' . $lose_rate] = $value;
					$lose_rate ++;
				}
				$m ++;
			} elseif ($key === 'player' . $m . '_rate') {
				$m ++;
			}
			
			$win_team [$idx] ['num_member'] = $win_member;
			$lose_team [$idx] ['num_member'] = $lose_member;
		}
		$idx ++;
	}
	
	$where2 = 'edited_player_id =' . $params ['player_id'] . ' and previous_rate != new_rate';
	$edit_log = $parent->model->joinInfos ( 'rate_editlog', array (
			'user' 
	), $where2, 0, 'status', 'rate_editlog_id DESC' );
	
	$parent->view->title = htmlspecialchars ( '', ENT_QUOTES );
	$parent->view->rate_tpl = htmlspecialchars ( dirname ( dirname ( __FILE__ ) ) . '/application/modules/default/views/player/ratedetail.tpl', ENT_QUOTES );
	$parent->view->match_tpl = htmlspecialchars ( dirname ( dirname ( __FILE__ ) ) . '/application/modules/default/views/player/matcheslist.tpl', ENT_QUOTES );
	$parent->view->rateedit_tpl = htmlspecialchars ( dirname ( dirname ( __FILE__ ) ) . '/application/modules/default/views/player/rateedit_log.tpl', ENT_QUOTES );
	$parent->view->playernote_tpl = htmlspecialchars ( dirname ( dirname ( __FILE__ ) ) . '/application/modules/default/views/player/player_note.tpl', ENT_QUOTES );
	$parent->view->ratetransition_tpl = htmlspecialchars ( dirname ( dirname ( __FILE__ ) ) . '/application/modules/default/views/player/ratetransition.tpl', ENT_QUOTES );
	$parent->view->to_rategraph_tpl = htmlspecialchars ( dirname ( dirname ( __FILE__ ) ) . '/application/modules/default/views/player/to_rategraph.tpl', ENT_QUOTES );
	$parent->view->player_info = $player_info;
	$parent->view->rate = $rate;
	
	if (array_key_exists ( 'page1', $params )) {
		$page1number = $params ['page1'];
	} else {
		$page1number = 1;
	}
	
	if (array_key_exists ( 'page2', $params )) {
		$page2number = $params ['page2'];
	} else {
		$page2number = 1;
	}
	
	if (array_key_exists ( 'page3', $params )) {
		$page3number = $params ['page3'];
	} else {
		$page3number = 1;
	}
	
	$perpage = 5;
	$paginator1 = Zend_Paginator::factory ( $players );
	$paginator1->setItemCountPerPage ( $perpage );
	$paginator1->setCurrentPageNumber ( $page1number );
	
	$parent->view->players = $paginator1->getIterator ();
	$pages1 = $paginator1->getPages ();
	$pageArray = get_object_vars ( $pages1 );
	$parent->view->pages1 = $pageArray;
	$parent->view->perpage = $perpage;
	
	$paginator2 = Zend_Paginator::factory ( $edit_log );
	$paginator2->setItemCountPerPage ( $perpage );
	$paginator2->setCurrentPageNumber ( $page2number );
	$pages2 = $paginator2->getPages ();
	$pageArray2 = get_object_vars ( $pages2 );
	$parent->view->pages2 = $pageArray2;
	
	$parent->view->edit_log = $paginator2->getIterator ();
	
	$parent->view->win_team = $win_team;
	$parent->view->lose_team = $lose_team;
	$parent->view->player_transition = json_encode ( $target_rate );
	
	// player note
	$player_note = $parent->model->searchlist ( 'player_note', "player_id = $player_id", 0, 'delete_flag', null );
	$paginator3 = Zend_Paginator::factory ( $player_note );
	$paginator3->setItemCountPerPage ( $perpage );
	$paginator3->setCurrentPageNumber ( $page3number );
	$pages3 = $paginator3->getPages ();
	$pageArray3 = get_object_vars ( $pages3 );
	$parent->view->pages3 = $pageArray3;
	
	$parent->view->player_note = $paginator3->getIterator ();
	if (array_key_exists ( 'page1', $params )) {
		$tab_status = 'result';
	} elseif (array_key_exists ( 'page2', $params )) {
		$tab_status = 'editlog';
	} else {
		$tab_status = null;
	}
	
	$parent->view->tab_status = $tab_status;
	
	$tokenHandler = new Custom_Auth_Token ();
	$token = $tokenHandler->getToken ( 'playercomment' );
	$parent->view->token = $token;
	$playerlist = $parent->model->JoinList ( 'player', array (
			'rate' 
	), 'delete_flag', '0', null, null, null );
	$parent->view->playerlist = Zend_Json::encode ( $playerlist );
	$parent->view->playerid = Zend_Json::encode ( $player_id );
}
function RateSet($array, $game, $num) {
	if ($game ['win_team'] == 1) {
		$winners_rate = $game ['team1_rate'];
		$losers_rate = $game ['team2_rate'];
	} else {
		$winners_rate = $game ['team2_rate'];
		$losers_rate = $game ['team1_rate'];
	}

	$varidation = 16 + ($losers_rate - $winners_rate) * 2 / $num * (16 / 400);
	
	if ($varidation > 31) {
		$varidation = 31;
	} elseif ($varidation < 1) {
		$varidation = 1;
	}

	if ($game['israte'] == 1) {
		$varidation = 0;
	}
	
	// search target's id & player index
	foreach ( $game as $key => $value ) {
		if ($array ['player_id'] == $value && preg_match ( '/^player[0-9]_id$/', $key )) {
			$index_key = explode ( 'player', $key );
			$search_key = str_replace ( '_id', '', $index_key [1] );
			break;
		}
	}
	
	// search target's team
	foreach ( $game as $key => $value ) {
		if ('player' . $search_key . "_team" === $key) {
			$target_team = $value;
			break;
		}
	}
	
	if ($game ['win_team'] === $target_team) {
		$target_winlose = true;
	} else {
		$target_winlose = false;
	}
	
	if ($target_winlose) {
		$after_rate = $array ['rate'] + $varidation;
		$win = $array ['win'] + 1;
		$lose = $array ['lose'];
		
		if ($array ['streak'] > 0) {
			$streak = $array ['streak'] + 1;
		} else {
			$streak = 1;
		}
		
		if ($array ['win_streak'] > $streak) {
			$win_streak = $array ['win_streak'];
			$lose_streak = $array ['lose_streak'];
		} else {
			$win_streak = $streak;
			$lose_streak = $array ['lose_streak'];
		}
		
		if ($after_rate < 1300 && $game['israte'] == 0) {
			$after_rate += 1;
		}
		
		if ($after_rate > $array ['max_rate']) {
			$max_rate = $after_rate;
		} else {
			$max_rate = $array ['max_rate'];
		}
	} else {
		$after_rate = $array ['rate'] - $varidation;
		$lose = $array ['lose'] + 1;
		$win = $array ['win'];
		
		if ($array ['streak'] < 0) {
			$streak = $array ['streak'] - 1;
		} else {
			$streak = - 1;
		}
		
		if ($array ['lose_streak'] < (- 1 * $streak)) {
			$win_streak = $array ['win_streak'];
			$lose_streak = - 1 * $streak;
		} else {
			$win_streak = $array ['win_streak'];
			$lose_streak = $array ['lose_streak'];
		}
		
		if ($after_rate < 1300 && $game['israte'] == 0) {
			$after_rate += 1;
		}
		
		$max_rate = $array ['max_rate'];
	}
	
	$update = array (
			'rate_id' => $array ['rate_id'],
			'rate' => $after_rate,
			'win' => $win,
			'lose' => $lose,
			'streak' => $streak,
			'win_streak' => $win_streak,
			'lose_streak' => $lose_streak,
			'max_rate' => $max_rate 
	);
	
	return $update;
}
function showlist($params, $pagename, $flag, $parent) {
	// $model;
	$root_dir = dirname ( dirname ( __FILE__ ) ) . '/';
	require_once $root_dir . 'application/modules/default/models/IndexModel.php';
	$parent->model = new IndexModel ();
	
	$base = htmlspecialchars ( 'http://' . $_SERVER ["HTTP_HOST"], ENT_QUOTES );
	
	$down = "down";
	$up = "up";
	$unsorted = "unsorted";
	$down_img = $base . "/themes/images/down.png";
	$up_img = $base . "/themes/images/up.png";
	$unsorted_img = $base . "/themes/images/unsorted.png";
	$command = "round(win / (win + lose)*100, 3) as percent, win + lose as total";
	
	// init
	$parent->view->sortkey0 = htmlspecialchars ( $unsorted, ENT_QUOTES );
	$parent->view->order0 = htmlspecialchars ( $unsorted_img, ENT_QUOTES );
	$parent->view->sortkey1 = htmlspecialchars ( $unsorted, ENT_QUOTES );
	$parent->view->order1 = htmlspecialchars ( $unsorted_img, ENT_QUOTES );
	$parent->view->sortkey2 = htmlspecialchars ( $unsorted, ENT_QUOTES );
	$parent->view->order2 = htmlspecialchars ( $unsorted_img, ENT_QUOTES );
	$parent->view->sortkey3 = htmlspecialchars ( $unsorted, ENT_QUOTES );
	$parent->view->order3 = htmlspecialchars ( $unsorted_img, ENT_QUOTES );
	$parent->view->sortkey4 = htmlspecialchars ( $unsorted, ENT_QUOTES );
	$parent->view->order4 = htmlspecialchars ( $unsorted_img, ENT_QUOTES );
	$parent->view->sortkey5 = htmlspecialchars ( $unsorted, ENT_QUOTES );
	$parent->view->order5 = htmlspecialchars ( $unsorted_img, ENT_QUOTES );
	
	// paginatorView OR
	if (array_key_exists ( 'page', $params )) {
		$nextpage = explode ( "/", $params ['page'] );
		
		if ($nextpage [1] === 'null') {
			if (array_key_exists ( 'search_player_name', $params )) {
				$search_player_name = $params ['search_player_name'];
			} else {
				$search_player_name = null;
			}
		} else {
			$search_player_name = $nextpage [1];
		}
		
		if ($nextpage [2] === 'null') {
			if (array_key_exists ( 'search_rate_up', $params )) {
				$search_rate_up = $db->quote ( $params ['search_rate_up'] );
			} else {
				$search_rate_up = null;
			}
		} else {
			$search_rate_up = $nextpage [2];
		}
		
		if ($nextpage [3] === 'null') {
			if (array_key_exists ( 'search_rate_down', $params )) {
				$search_rate_down = $db->quote ( $params ['search_rate_down'] );
			} else {
				$search_rate_down = null;
			}
		} else {
			$search_rate_down = $nextpage [3];
		}
		
		if ($nextpage [4] === 'null') {
			if (array_key_exists ( 'search_game_number', $params )) {
				$search_game_number = $db->quote ( $params ['search_game_number'] );
			} else {
				$search_game_number = null;
			}
		} else {
			$search_game_number = $nextpage [4];
		}
		
		if ($nextpage [5] === 'null') {
			if (array_key_exists ( 'sortkey', $params )) {
				$sort_key = $params ['sortkey'];
			} else {
				$sort_key = null;
			}
		} else {
			$sort_key = $nextpage [5];
		}
		
		if ($nextpage [6] === 'null') {
			if (array_key_exists ( 'order', $params )) {
				$order_key = $params ['order'];
			} else {
				$order_key = null;
			}
		} else {
			$order_key = $nextpage [6];
		}
	} else if (isset ( $params ['search_player_name'] )) {
		$search_player_name = $params ['search_player_name'];
		$search_rate_up = $params ['search_rate_up'];
		$search_rate_down = $params ['search_rate_down'];
		$search_game_number = $params ['search_game_number'];
		
		if (array_key_exists ( 'sortkey', $params )) {
			$sort_key = $params ['sortkey'];
		} else {
			$sort_key = null;
		}
		if (array_key_exists ( 'order', $params )) {
			$order_key = $params ['order'];
		} else {
			$order_key = null;
		}
	} else {
		$search_player_name = null;
		$search_rate_up = null;
		$search_rate_down = null;
		$search_game_number = null;
		$sort_key = null;
		$order_key = null;
	}
	
	// create order param
	if (is_null ( $sort_key ) == true) {
		$sortkey = null;
	} else {
		$sortkey = $sort_key . ' ' . $order_key;
		$parent->view->sortkey = htmlspecialchars ( $sort_key, ENT_QUOTES );
		$parent->view->orderkey = htmlspecialchars ( $order_key, ENT_QUOTES );
		
		switch ($sort_key) {
			case 'player_name' :
				if ($order_key == 'ASC') {
					$parent->view->sortkey0 = htmlspecialchars ( $up, ENT_QUOTES );
					$parent->view->order0 = htmlspecialchars ( $up_img, ENT_QUOTES );
				} else {
					$parent->view->sortkey0 = htmlspecialchars ( $down, ENT_QUOTES );
					$parent->view->order0 = htmlspecialchars ( $down_img, ENT_QUOTES );
				}
				break;
			
			case 'rate' :
				if ($order_key === 'ASC') {
					$parent->view->sortkey1 = htmlspecialchars ( $up, ENT_QUOTES );
					$parent->view->order1 = htmlspecialchars ( $up_img, ENT_QUOTES );
				} else {
					$parent->view->sortkey1 = htmlspecialchars ( $down, ENT_QUOTES );
					$parent->view->order1 = htmlspecialchars ( $down_img, ENT_QUOTES );
				}
				break;
			
			case 'total' :
				if ($order_key === 'ASC') {
					$parent->view->sortkey2 = htmlspecialchars ( $up, ENT_QUOTES );
					$parent->view->order2 = htmlspecialchars ( $up_img, ENT_QUOTES );
				} else {
					$parent->view->sortkey2 = htmlspecialchars ( $down, ENT_QUOTES );
					$parent->view->order2 = htmlspecialchars ( $down_img, ENT_QUOTES );
				}
				break;
			
			case 'win' :
				if ($order_key === 'ASC') {
					$parent->view->sortkey3 = htmlspecialchars ( $up, ENT_QUOTES );
					$parent->view->order3 = htmlspecialchars ( $up_img, ENT_QUOTES );
				} else {
					$parent->view->sortkey3 = htmlspecialchars ( $down, ENT_QUOTES );
					$parent->view->order3 = htmlspecialchars ( $down_img, ENT_QUOTES );
				}
				break;
			
			case 'lose' :
				if ($order_key === 'ASC') {
					$parent->view->sortkey4 = htmlspecialchars ( $up, ENT_QUOTES );
					$parent->view->order4 = htmlspecialchars ( $up_img, ENT_QUOTES );
				} else {
					$parent->view->sortkey4 = htmlspecialchars ( $down, ENT_QUOTES );
					$parent->view->order4 = htmlspecialchars ( $down_img, ENT_QUOTES );
				}
				break;
			
			case 'percent' :
				if ($order_key === 'ASC') {
					$parent->view->sortkey5 = htmlspecialchars ( $up, ENT_QUOTES );
					$parent->view->order5 = htmlspecialchars ( $up_img, ENT_QUOTES );
				} else {
					$parent->view->sortkey5 = htmlspecialchars ( $down, ENT_QUOTES );
					$parent->view->order5 = htmlspecialchars ( $down_img, ENT_QUOTES );
				}
				break;
			
			default :
				break;
		}
	}
	
	$andflag = false;
	$where = '';
	
	if (! empty ( $search_player_name )) {
		$where = $where . "player_name LIKE '%" . str_replace ( "'", "\'", str_replace ( "\\", "\\\\", $search_player_name ) ) . "%'";
		$andflag = true;
		
		$parent->view->search_player_name = htmlspecialchars ( $search_player_name, ENT_QUOTES );
	}
	
	if (! empty ( $search_rate_up )) {
		if ($andflag) {
			$where = $where . " AND ";
		}
		
		$where = $where . "rate >= '" . $search_rate_up . "%'";
		$andflag = true;
		
		$parent->view->search_rate_up = htmlspecialchars ( $search_rate_up, ENT_QUOTES );
	}
	
	if (! empty ( $search_rate_down )) {
		if ($andflag) {
			$where = $where . " AND ";
		}
		
		$where = $where . "rate <= '" . $search_rate_down . "%'";
		$andflag = true;
		
		$parent->view->search_rate_down = htmlspecialchars ( $search_rate_down, ENT_QUOTES );
	}
	
	if (! empty ( $search_game_number )) {
		if ($andflag) {
			$where = $where . " AND ";
		}
		
		$where = $where . "(win + lose) >= '" . $search_game_number . "%'";
		$andflag = true;
		
		$parent->view->search_game_number = htmlspecialchars ( $search_game_number, ENT_QUOTES );
	}
	
	if (empty ( $where )) {
		$items = $parent->model->getSearchSortJoin ( 'player', array (
				'rate' 
		), null, 'delete_flag', $flag, $sortkey, $command );
	} else {
		$items = $parent->model->getSearchSortJoin ( 'player', array (
				'rate' 
		), $where, 'delete_flag', $flag, $sortkey, $command );
	}
	
	if (isset ( $nextpage [0] )) {
		$pagenumber = $nextpage [0];
	} else {
		$pagenumber = 0;
	}
	$paginator = Zend_Paginator::factory ( $items );
	
	// set maximum items to be displayed in a page
	$paginator->setItemCountPerPage ( 20 );
	$paginator->setCurrentPageNumber ( $pagenumber );
	$pages = $paginator->getPages ();
	$pageArray = get_object_vars ( $pages );
	
	$parent->view->pages = $pageArray;
	$parent->view->items = $paginator->getIterator ();
	$parent->view->pagename = htmlspecialchars ( $pagename, ENT_QUOTES );
	$parent->view->searchname = htmlspecialchars ( $search_player_name, ENT_QUOTES );
	$parent->view->searchrate_up = htmlspecialchars ( $search_rate_up, ENT_QUOTES );
	$parent->view->searchrate_down = htmlspecialchars ( $search_rate_down, ENT_QUOTES );
	$parent->view->searchgame_number = htmlspecialchars ( $search_game_number, ENT_QUOTES );
}
function loginlog($username, $auth, $parent) {
	$adapter = dbadapter ();
	$params = dbconnect ();
	
	$db = Zend_Db::factory ( $adapter, $params );
	$user = $parent->model->getList ( 'user', '0', 'delete_flag', null );
	
	foreach ( $user as $record ) {
		if ($username === $record ['user_name']) {
			$user_id = $record ['user_id'];
			$login_failed_number = $record ['login_failed_number'];
			break;
		}
	}
	$db->beginTransaction ();
	try {
		if ($auth->hasIdentity ()) {
			$login_status = 'success';
			$memo = null;
			
			$data = array (
					'user_id' => $user_id,
					'updated_on' => NULL,
					'login_failed_number' => 0 
			);
			$result1 = $parent->model->update ( 'user', $data );
		} else {
			$login_status = 'failed';
		}
		
		$connect_ipaddress = $_SERVER ["REMOTE_ADDR"];
		
		if (! isset ( $user_id )) {
			$memo = 'input user does not found';
		} elseif ($login_status === 'failed') {
			$login_failed = $login_failed_number + 1;
			if ($login_failed >= 5) {
				$data = array (
						'user_id' => $user_id,
						'delete_flag' => 1,
						'updated_on' => NULL,
						'login_failed_number' => $login_failed 
				);
				
				$result1 = $parent->model->update ( 'user', $data );
				$memo = 'user account locked';
			} else {
				
				$data = array (
						'user_id' => $user_id,
						'updated_on' => NULL,
						'login_failed_number' => $login_failed 
				);
				
				$result1 = $parent->model->update ( 'user', $data );
				$memo = 'invaild password';
			}
		}
		
		$loginlog = array (
				'target_user' => $username,
				'login_status' => $login_status,
				'connect_ipaddress' => $connect_ipaddress,
				'memo' => $memo 
		);
		$result2 = $parent->model->insert ( 'loginlog', $loginlog );
		
		$db->commit ();
	} catch ( Exception $e ) {
		$db->rollBack ();
		echo $e->getMessage ();
	}
}
function TeamDevide($games) {
	$team1 = null;
	$team2 = null;
	$k = 0;
	
	foreach ( $games as $array ) {
		$team1_member = 0;
		$team2_member = 0;
		$team1_id = 0;
		$team2_id = 0;
		$team1_rate_id = 0;
		$team2_rate_id = 0;
		$team1_rate = 0;
		$team2_rate = 0;
		$i = 1;
		$j = 1;
		$m = 1;
		$n = 1;
		$o = 1;
		
		foreach ( $array as $key => $value ) {
			if ($key === 'player' . $i . '_team' && ! is_null ( $value )) {
				if ($value == 1) {
					${'player' . $i . '_team'} = 1;
				} elseif (! is_null ( $value )) {
					${'player' . $i . '_team'} = 2;
				}
				$i ++;
			} elseif ($key === 'player' . $i . '_team') {
				$i ++;
			}
			
			if ($key === 'player' . $n . '_id' && ! is_null ( $value )) {
				if (${'player' . $n . '_team'} == 1) {
					$team1 [$k] ['id_' . $team1_id] = htmlspecialchars ( $value, ENT_QUOTES );
					$team1_id ++;
				} elseif (! is_null ( $value )) {
					$team2 [$k] ['id_' . $team2_id] = htmlspecialchars ( $value, ENT_QUOTES );
					$team2_id ++;
				}
				$n ++;
			} elseif ($key === 'player' . $k . '_id') {
				$n ++;
			}
			
			if ($key === 'player' . $j . '_name' && ! is_null ( $value )) {
				if (${'player' . $j . '_team'} == 1) {
					$team1 [$k] ['member_' . $team1_member] = htmlspecialchars ( $value, ENT_QUOTES );
					$team1_member ++;
				} elseif (! is_null ( $value )) {
					$team2 [$k] ['member_' . $team2_member] = htmlspecialchars ( $value, ENT_QUOTES );
					$team2_member ++;
				}
				$j ++;
			} elseif ($key === 'player' . $j . '_name') {
				$j ++;
			}
			
			if ($key === 'player' . $o . '_rate_id' && ! is_null ( $value )) {
				if (${'player' . $o . '_team'} == 1) {
					$team1 [$k] ['rate_id_' . $team1_rate_id] = htmlspecialchars ( $value, ENT_QUOTES );
					$team1_rate_id ++;
				} elseif (! is_null ( $value )) {
					$team2 [$k] ['rate_id_' . $team2_rate_id] = htmlspecialchars ( $value, ENT_QUOTES );
					$team2_rate_id ++;
				}
				$o ++;
			} elseif ($key === 'player' . $m . '_rate_id') {
				$o ++;
			}
			
			if ($key === 'player' . $m . '_rate' && ! is_null ( $value )) {
				if (${'player' . $m . '_team'} == 1) {
					$team1 [$k] ['rate_' . $team1_rate] = htmlspecialchars ( $value, ENT_QUOTES );
					
					$team1_rate ++;
				} elseif (! is_null ( $value )) {
					$team2 [$k] ['rate_' . $team2_rate] = htmlspecialchars ( $value, ENT_QUOTES );
					$team2_rate ++;
				}
				$m ++;
			} elseif ($key === 'player' . $m . '_rate') {
				$m ++;
			}
			
			$team1 [$k] ['num_member'] = $team1_member;
			$team2 [$k] ['num_member'] = $team2_member;
		}
		
		$k ++;
	}
	
	return array (
			$team1,
			$team2 
	);
}
function initPage($parent, $module) {
	header ( "X-Content-Type-Options: nosniff" );
	$root_dir = dirname ( dirname ( __FILE__ ) );
	$ADMIN_TEMPLATE = $root_dir . '/themes/layout/';
	$parent->view->header = htmlspecialchars ( $ADMIN_TEMPLATE . 'header.tpl', ENT_QUOTES );
	$parent->view->footer = htmlspecialchars ( $ADMIN_TEMPLATE . 'footer.tpl', ENT_QUOTES );
	$parent->view->list = htmlspecialchars ( $root_dir . $module . '/views/index/list.tpl', ENT_QUOTES );
	$parent->view->base = htmlspecialchars ( 'http://' . $_SERVER ["HTTP_HOST"], ENT_QUOTES );
	$parent->view->playercreate = htmlspecialchars ( $root_dir . $module . 'user/views/player/playercreate.tpl', ENT_QUOTES );
	$parent->view->changepassword = htmlspecialchars ( $root_dir . $module . 'user/views/setting/changepassword.tpl', ENT_QUOTES );
	$parent->view->changecomment = htmlspecialchars ( $root_dir . $module . 'user/views/setting/changeusercomment.tpl', ENT_QUOTES );
	$parent->view->createupdate = htmlspecialchars ( $root_dir . $module . 'admin/views/update/updatecreate.tpl', ENT_QUOTES );
	$parent->view->usercreate = htmlspecialchars ( $root_dir . $module . 'admin/views/user/usercreate.tpl', ENT_QUOTES );
	
	$authStorage = Zend_Auth::getInstance ()->getStorage ();
	if ($authStorage->isEmpty ()) {
		$loginid = null;
	} else {
		$loginid = get_object_vars ( Zend_Auth::getInstance ()->getIdentity () );
	}
	
	if (is_null ( $loginid )) {
		$parent->view->user = htmlspecialchars ( false, ENT_QUOTES );
		$parent->view->controller = htmlspecialchars ( false, ENT_QUOTES );
		$parent->view->admin = htmlspecialchars ( false, ENT_QUOTES );
		$parent->view->username = htmlspecialchars ( 'ようこそゲストさん', ENT_QUOTES );
	} else {
		if ($loginid ['user_control'] === 'administrator') {
			$parent->view->user = htmlspecialchars ( true, ENT_QUOTES );
			$parent->view->controller = htmlspecialchars ( false, ENT_QUOTES );
			$parent->view->admin = htmlspecialchars ( true, ENT_QUOTES );
		} else if ($loginid ['user_control'] === 'controller') {
			$parent->view->user = htmlspecialchars ( true, ENT_QUOTES );
			$parent->view->controller = htmlspecialchars ( true, ENT_QUOTES );
			$parent->view->admin = htmlspecialchars ( false, ENT_QUOTES );
		} else {
			$parent->view->user = htmlspecialchars ( true, ENT_QUOTES );
			$parent->view->controller = htmlspecialchars ( false, ENT_QUOTES );
			$parent->view->admin = htmlspecialchars ( false, ENT_QUOTES );
		}
		$parent->view->username = htmlspecialchars ( 'あなたは' . $loginid ['user_name'] . 'としてログインしています。', ENT_QUOTES );
	}
}
function logincheck($mode, $parent) {
	$authStorage = Zend_Auth::getInstance ()->getStorage ();
	if ($authStorage->isEmpty ()) {
		return false;
	}
	
	return true;
}
function admincheck($mode, $parent) {
	$authStorage = Zend_Auth::getInstance ()->getStorage ();
	if (! $authStorage->isEmpty ()) {
		$loginid = get_object_vars ( Zend_Auth::getInstance ()->getIdentity () );
		if ($loginid ['user_control'] != 'administrator') {
			return false;
		}
		return true;
	}
	
	return false;
}
function admincontrollercheck($mode, $parent) {
	$authStorage = Zend_Auth::getInstance ()->getStorage ();
	if (! $authStorage->isEmpty ()) {
		$loginid = get_object_vars ( Zend_Auth::getInstance ()->getIdentity () );
		if ($loginid ['user_control'] != 'administrator' && $loginid ['user_control'] != 'controller') {
			return false;
		}
		return true;
	}
	
	return false;
}
function Auth($parent) {
	try {
		$username = $parent->getRequest ()->getParam ( 'user_name' );
		$password = $parent->getRequest ()->getParam ( 'user_password' );
		
		$logininfo = $parent->model->LoginAuthentication ( $username, $password );
		
		$auth = Zend_Auth::getInstance ();
		if ($auth->hasIdentity ()) {
			$result = "login was successful.";
			$loginid = Zend_Auth::getInstance ()->getIdentity ();
			
			$parent->view->login = htmlspecialchars ( true, ENT_QUOTES );
		} else {
			$result = "login failed";
			$parent->view->login = htmlspecialchars ( false, ENT_QUOTES );
		}
		
		loginlog ( $username, $auth, $parent );
	} catch ( Exception $e ) {
		$result = displayError ( $e );
	}
	return $result;
}

function without_loginchk($parent, &$actionList, &$base, $session_name) {
	$req = $parent->getRequest ();
	$action = $req->getActionName ();
	if (! in_array ( $action, $actionList )) {
		if (! Zend_Session::namespaceIsset ( $session_name )) {
			header ( "Location: $base/teaparty/index/login" );
	}
	}
}

function without_redstone($parent, $actionList, $base, $session_name) {
	$req = $parent->getRequest();
	$action = $req->getActionName();
	if (! in_array($action, $actionList)) {
		if(!Zend_Session::namespaceIsset($session_name)) {
			header("Location: $base/redstone/index/login");
		}
	}
}

function action_log($action, $content, $member_id) {
	require_once 'BaseModel.php';
	$bm = new BaseModel();

	$data = array('member_id' => $member_id,
					'action_content' => $content,
					'action_datetime' => date('c'),
					'created_on' => date('c'),
					'action_from' => $action,
					'connection_ip' => $_SERVER['REMOTE_ADDR']
	);

	$bm->insert('redstone_activity_log', $data);
}

function getRandomString($nLengthRequired = 8) {
	$sCharList = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789';
	mt_srand();
	$sRes = '';
	for($i=0; $i<$nLengthRequired; $i++) {
		$sRes .= $sCharList{mt_rand(0, strlen($sCharList) - 1)};
	}

	return $sRes;
}