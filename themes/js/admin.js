$(document).ready(function(){
                  
    $(window).bind("load", function(){
        // initial function(common method)
        var len = $("#tbl tbody").children().length;
        
        for (var i=1; i<len+1; i++) {
            eval("var trno_" + i +" = false;");
        }
        
        $(".autolink").each(function(){
            $(this).html( $(this).html().replace(/((http|https|ftp):\/\/[\w?=&.\/-;#~%-]+(?![\w\s?&.\/;#~%"=-]*>))/g, '<a href="$1">$1</a> ') );
        });
        
        $("#player_create").click(function(){
    		$('*[name=player_id]').val('');
    		$('*[name=player_name]').val('');
    		$('*[name=rate]').val('');
    		$('*[name=delete_flag]').val('0');
    		$('*[name=memo]').val('');
    		
    		var url = $(location).attr('href');
    		if(url.indexOf('playerdetail') == -1 && url.indexOf('index') == -1) {
        		submit_action('../../user/index/inittokener', null, 'getdata');
		} else if(url.indexOf('playerdetail') == -1 && url.indexOf('index') != -1) {
			submit_action('../user/index/inittokener', null, 'getdata');
		} else if(url.indexOf('playerdetail') != -1 && url.indexOf('index') != -1) {
			submit_action('../../../../../../user/index/inittokener', null, 'getdata');
        	} else {
        		submit_action('../../../../../user/index/inittokener', null, 'getdata');
        	}
    		
    		$('#player-insert').modal();
    	});
       
        $("#password_edit").click(function(){
        	var url = $(location).attr('href');
        	if(url.indexOf('playerdetail') == -1 && url.indexOf('index') == -1) {
        		submit_action('../../user/setting/editpassword', null, 'getdata');
		} else if(url.indexOf('playerdetail') == -1 && url.indexOf('index') != -1) {
			submit_action('../user/setting/editpassword', null, 'getdata');
		} else if(url.indexOf('playerdetail') != -1 && url.indexOf('index') != -1) {
			submit_action('../../../../../../user/setting/editpassword', null, 'getdata');
        	} else {
        		submit_action('../../../../../user/setting/editpassword', null, 'getdata');
        	}
    		$('#password-edit').modal();
    	});
        
        $("#comment_edit").click(function(){
        	var url = $(location).attr('href');
        	if(url.indexOf('playerdetail') == -1 && url.indexOf('index') == -1) {
        		submit_action('../../user/setting/editcomment', null, 'getdata');
		} else if(url.indexOf('playerdetail') == -1 && url.indexOf('index') != -1) {
			submit_action('../user/setting/editcomment', null, 'getdata');
		} else if(url.indexOf('playerdetail') != -1 && url.indexOf('index') != -1) {
			submit_action('../../../../../../user/setting/editcomment', null, 'getdata');
        	} else {
        		submit_action('../../../../../user/setting/editcomment', null, 'getdata');
        	}
    		$('#comment-edit').modal();
    	});
        
        $("#update_insert").click(function(){
        	var url = $(location).attr('href');
        	if(url.indexOf('playerdetail') == -1 && url.indexOf('index') == -1) {
        		submit_action('../../admin/index/inittokenerupdate', null, 'getdata');
			} else if(url.indexOf('playerdetail') == -1 && url.indexOf('index') != -1) {
				submit_action('../admin/index/inittokenerupdate', null, 'getdata');
			} else if(url.indexOf('playerdetail') != -1 && url.indexOf('index') != -1) {
				submit_action('../../../../../admin/index/inittokenerupdate', null, 'getdata');
				} else {
					submit_action('../../../../admin/index/inittokenerupdate', null, 'getdata');
				}
    		$('#update-insert').modal();
    	});
        
        $("#user_create").click(function(){
        	var url = $(location).attr('href');
    		if(url.indexOf('playerdetail') == -1) {
        		submit_action('../../admin/index/inittokeneradmin', null, 'getdata');
		} else if(url.indexOf('playerdetail') == -1 && url.indexOf('index/index') != -1) {
			submit_action('../admin/index/inittokeneradmin', null, 'getdata');
		} else if(url.indexOf('playerdetail') != -1 && url.indexOf('index') != -1) {
			submit_action('../../../../admin/index/inittokeneradmin', null, 'getdata');
        	} else {
        		submit_action('../../../admin/index/inittokeneradmin', null, 'getdata');
        	}
    		
        	$('#user-insert').modal();
    	});
        
        $("a#admin_report").click(function(){
    		submit_action('closedgameedit', {'gamelog_id': $(this).attr('name')}, 'getdata');
    		$('#admin-report').modal();
    	});
        
        $("a#user_edit").click(function(){
    		submit_action('useredit', {'id': $(this).attr('name')}, 'getdata');
    		$('#user-edit').modal();
    	});
               
        $(".list").click(function(){
            var tr_no = $(this).attr("id").split("_")[1];
            
            if (eval("trno_" + tr_no) == false) {
                $(this).css("background-color","#A0C8FF");
                eval("trno_" + tr_no + " = true;");
                         
            } else {
                eval("trno_" + tr_no + " = false;");
                $(this).css('background-color', '');
                
            }
        });

		$('#stream-registor').on('click', function() {
			var url = 'changeinfo';
			if(url.indexOf('playerdetail') == -1) {
				submit_action('../community/'+url, null, null);
			} else if(url.indexOf('playerdetail') == -1 && url.indexOf('index/index') != -1) {
				submit_action('../community/'+url, null, null);
			} else if(url.indexOf('playerdetail') != -1 && url.indexOf('index') != -1) {
				submit_action('../../../../community'+url, null, null);
			} else {
				submit_action('../../community/'+url, null, null);
			}
			$('#modal-window').modal();
		});

		$("#user_create").click(function(){
			var url = $(location).attr('href');


			$('#user-insert').modal();
		});
        
        if(document.URL.match(/..maketeam/)) {

        	var isstartvoice = false;
        	$('#matching_submit').click(function(){
        		var member = $('#game_member').val();
        		if(member_check(member) != true) return false;
        		if(name_check(member) != true) return false;
        		if(rate_check(member) != true) return false;
        		
        		var $form = $('#member_entry');
        	    var data = $form.serializeArray();
        	    
        	    submit_action('matching', data, 'rewrite');
        	    //jAlert('ゲームが始まる前にゲーム開始ボタンを押してくださいね。', '確認');
        	    
        	    isStart = false;
        		
        	    if(isstartvoice  === false){
	    			setInterval(function(){
	    				if(isStart === false) {
	    					document.getElementById("audio").play();
	    				};
	    			},60000);
	    			
        	    }
        	    isstartvoice = true;
        	    return false;
        	});
        	
        }
        
        if(document.URL.match(/..player/)) {
        	 if(document.URL.match(/..index/) && !document.URL.match('../playerdetail')) {
	        	$(function() {
	        		$('*[name=search_player_name]').val('');
	        		$('*[name=search_rate_up]').val('');
	        		$('*[name=search_rate_down]').val('');
	        		$('*[name=search_game_number]').val('');
	        		search_submit('list');
	        	});
	        	$("#search_reset").click(function() {
	        		$('*[name=search_player_name]').val('');
	        		$('*[name=search_rate_up]').val('');
	        		$('*[name=search_rate_down]').val('');
	        		$('*[name=search_game_number]').val('');
	                window.location = "index";
	            });
	        	
	        	$("#search_submit").click(function() {
	        		//if(escape_check('search_player_name', 'プレイヤー名') != true) return false;
	        		if ($('*[name=search_rate_up]').val() != ''){
	        			if(numeric_check('search_rate_up', '最低レート') != true) return false;
	        		}
	        		if ($('*[name=search_rate_down]').val() != ''){
	        			if(numeric_check('search_rate_down', '最高レート') != true) return false;
	        		}
	        		if ($('*[name=search_game_number]').val() != ''){
	        			if(numeric_check('search_game_number', '最低ゲーム数') != true) return false;
	        		}
	                search_submit('list');
	                return false;
	            });
        	}
        }
        
        if(document.URL.match(/..playerdetail/)) {
        	$("#update_comment").click(function() {
        		//event.preventDefault();
        		if(playername_check('writer_name', playerlist, 'お名前') != true) return false;
        		if(input_check('comment', 'コメント内容') != true) return false;
        		
        		var $form = $('#insert_comment');
        	    var data = $form.serializeArray();
        	    data[data.length] = {'name':'player_id', 'value': player_id};
        	    var url = null;
        	    if(document.URL.match(/..user/)) {
        	    	url = '../../../../../index/commentupdate';
        	    } else {
        	    	url = '../../../../../player/commentupdate';
        	    }
        		submit_action(url, data, 'insert');
                return false;
            });
        	
        	$(".delete").click(function() {
                var id = $(this).parent('td').attr('id');
                delrev_check('削除', '../../../../../../user/player/comment', 'delete', id, 'コメント');
            });
        	        	
        }
        
        if(document.URL.match(/..about/)) {
        	$("#about").click(function() {
        		toggle_contents("about_div");
            });
        	
        	$("#macros").click(function() {
        		toggle_contents("macros_div");
            });

			$("#streamregistor").click(function() {
				toggle_contents("streamregistor_div");
			});
        	
        	$("#playerunknown").click(function() {
        		toggle_contents("playerunknown_div");
            });
        	
        	$("#advertisement").click(function() {
        		toggle_contents("advertisement_div");
            });

        	$("#broadcast").click(function() {
        		toggle_contents("broadcast_div");
            });
        }
        
        if(document.URL.match(/..user/)) {
        	if(document.URL.match(/..index/) && !document.URL.match(/..playerdetail/)) {
	        	$(function() {
	        		$('*[name=search_player_name]').val('');
	        		$('*[name=search_rate_up]').val('');
	        		$('*[name=search_rate_down]').val('');
	        		$('*[name=search_game_number]').val('');
	        		search_submit('index/editlist');
	        	});
	        	$("#search_reset").click(function() {
	        		$('*[name=search_player_name]').val('');
	        		$('*[name=search_rate_up]').val('');
	        		$('*[name=search_rate_down]').val('');
	        		$('*[name=search_game_number]').val('');
	                window.location = "index";
	            });
	        	
	        	$("#search_submit").click(function() {
	        		//if(escape_check('search_player_name', 'プレイヤー名') != true) return false;
	        		if ($('*[name=search_rate_up]').val() != ''){
	        			if(numeric_check('search_rate_up', '最低レート') != true) return false;
	        		}
	        		if ($('*[name=search_rate_down]').val() != ''){
	        			if(numeric_check('search_rate_down', '最高レート') != true) return false;
	        		}
	        		if ($('*[name=search_game_number]').val() != ''){
	        			if(numeric_check('search_game_number', '最低ゲーム数') != true) return false;
	        		}
	                search_submit('index/editlist');
	                return false;
	            });

        	}
        	
        	if(document.URL.match(/..gamemanage/)) {
	        	$("a#report").click(function(){
	        		submit_action('userreport', {'gamelog_id': $(this).attr('name')}, 'getdata');
	        		$('#game-report').modal();
	        	});
        	}
        }
        
        if(document.URL.match(/..playerdeleted/)) {
        	$(function() {
        		$('*[name=search_player_name]').val('');
        		$('*[name=search_rate_up]').val('');
        		$('*[name=search_rate_down]').val('');
        		$('*[name=search_game_number]').val('');
        		search_submit('deletedlist');
        	});
        	$("#search_reset").click(function() {
        		$('*[name=search_player_name]').val('');
        		$('*[name=search_rate_up]').val('');
        		$('*[name=search_rate_down]').val('');
        		$('*[name=search_game_number]').val('');
                window.location = "playerdeleted";
            });
        	
        	$("#search_submit").click(function() {
	        if(escape_check('search_player_name', 'プレイヤー名') != true) return false;
	        if ($('*[name=search_rate_up]').val() != ''){
	        	if(numeric_check('search_rate_up', '最低レート') != true) return false;
	        }
	        if ($('*[name=search_rate_down]').val() != ''){
	        	if(numeric_check('search_rate_down', '最高レート') != true) return false;
	        }
	        if ($('*[name=search_game_number]').val() != ''){
	        	if(numeric_check('search_game_number', '最低ゲーム数') != true) return false;
	        }
                search_submit('deletedlist');
                return false;
            });	
        }
        
        if(document.URL.match(/..commentlist/)) {
            $(".delete").click(function() {
                var id = $(this).parent('td').attr('id');
                delrev_check('削除', 'comment', 'delete', id, 'コメント');
            });
        }
        
        if(document.URL.match(/..commentdeleted/)) {
            $(".revert").click(function() {
                var id = $(this).parent('td').attr('id');
                delrev_check('復元', 'comment', 'revert', id, 'コメント');
            });
        }
        
        if(document.URL.match(/..userdeleted/)) {
        	$(function() {
        		search_submit('deletedlist');
        	});
        	
            $(".revert").click(function() {
                var id = $(this).parent('td').attr('id');
                delrev_check('復元', 'user', 'revert', id, 'ユーザー');
            });
        }
        
        if(document.URL.match(/..gamemanage/)) {
        	$('[id^=user_cancel]').click(function(){
        		id = $(this).attr('name');
        		usercancel_check('usercancel', id, 'gamemanage');
        	});
        	
        	function usercancel_check(action, id, option) {
        		jConfirm('ゲームをキャンセルしますか?', '確認', function(r) {
        	        if (r === true) {
        	        	var data = new Array;
        	        	data = {'game_id': id, 'option': option};
        	        	submit_action('usercancel', data, 'refresh');
        	        	return false;
        	        } else {
        	            jAlert('はい。', '結果');
        	        }
        	        
        	    });
        	}
        }
        
        if(document.URL.match(/..replaymanage/)) {
        	$(".delete").click(function() {
        		var gamelog_id = $(this).attr('id');
        		var replay_id = $(this).attr('abbr');
        		jConfirm('リプレイを削除しますか?', '確認', function(r) {
        	        if (r === true) {
        	        	var data = new Array;
        	        	data = {'gamelog_id': gamelog_id, 'replay_id': replay_id};
        	        	submit_action('replaydelete', data, 'delete');
        	        	return false;
        	        } else {
        	            jAlert('はい。', '結果');
        	        }
        	        
        	    });
        	});
        }

		if(document.URL.match(/..analyze/)) {
			$("#yyyymm-submit").on('click', function () {
				if (yearmonth() != true) return false;

				var $form = $('#submit-yyyymm');
				var data = $form.serializeArray();
				submit_action('showhistory', data, 'rewrite');
				return false;
			});
		}
        
        if(document.URL.match(/..login/)) {
            $(".submit").click(function() {
                if ($("#login_username").val() === "") {
                    alert("ログインユーザー名が空白です。");
                    return false; 
                }
                
                if(login_escape_check('login_username') != true) {
                	return false;
                }
                   
                if ($("#login_password").val() === "") {
                    alert("ログインパスワードが空白です。");
                    return false;
                }
            });
                   
            $(".submit").keypress(function(e) {
                if (e.which == 13) {
                    if ($("#login_username").val() === "") {
                        alert("ログインユーザー名が空白です。");
                        return false;
                    }
                    
                    if(login_escape_check('login_username') != true) {
                    	return false;
                    }
                                      
                    if ($("#login_password").val() === "") {
                        alert("ログインパスワードが空白です。");
                        return false;
                    }
                }
            });
        }
         
        if(document.URL.match(/..userlist/)) {
            $("#search_reset").click(function() {
                window.location = "userlist";
            });
            
            $(".delete").click(function() {
                var id = $(this).parent('td').attr('id');
                delrev_check('削除', 'user', 'delete', id, 'ユーザー');
            });
        }
             
        if(document.URL.match(/..deleteduserlist/)) {
            $(".revert").click(function() {
                var id = $(this).parent('td').attr('id');
                delrev_check('復元', 'user', 'revert', id, 'ユーザー');
            });
        }
        
        if(document.URL.match(/..playerupload/)) {
	        $("#file-input").change(function(){
	        	inputCheck();
	        });
        }
        
        if(document.URL.match(/..updatelist/)) {
        	 $("a#update_edit").click(function(){
         		submit_action('updateedit', {'id': $(this).attr('name')}, 'getdata');
         		$('#update-edit').modal();
         	});
        	 
        	 $(".delete").click(function() {
                 var id = $(this).parent('td').attr('id');
                 delrev_check('削除', 'update', 'delete', id, 'アップデート');
             });
        }
        
        if(document.URL.match(/..deletedupdatelist/)) {
            $(".revert").click(function() {
                var id = $(this).parent('td').attr('id');
                delrev_check('復元', 'update', 'revert', id, 'アップデート');
            });
        }

		if(document.URL.match(/..community/)) {
			$('#search-submit').click(function() {
				if (input_check('search_name', '配信者名') != true) return false;

				var $form = $('#member-search');
				var data = $form.serializeArray();

				submit_action('search', data, 'rewrite');
				return false;
			});

			$('#search-reset').click(function() {
				location.reload();
			});

			$("*[id^=stream_edit]").on('click', function() {
				var id = $(this).attr('id').split('_');
				var data = {'id': id[2]};
				submit_action('password', {'id': data, 'mode': 'edit'}, null);
				$('#modal-window').modal();
				return false;
			});

			$("*[id^=stream_delete]").on('click', function() {
				var id = $(this).attr('id').split('_');
				var data = {'id': id[2]};
				submit_action('deleteconfirm', {'id': data, 'mode': 'delete'}, null);
				$('#modal-window').modal();
				return false;
			});

			$("*[id^=stream_password]").on('click', function() {
				var id = $(this).attr('id').split('_');
				var data = {'id': id[2]};
				submit_action('password', {'id': data, 'mode': 'password'}, null);
				$('#modal-window').modal();
				return false;
			});

			$("*[id^=init_password]").on('click', function() {
				var id = $(this).attr('id').split('_');
				data = {'id': id[2]};
				jConfirm('パスワードを初期化しますか?', '確認', function(r) {
					if (r === true) {
						submit_action('initpassword', data, null);
						$('#modal-window').modal();
						return false;
					} else {
						jAlert('はい。', '結果');
					}

				});
				return false;
			});
		}
    });

	$("#player_update").click(function (event) {
		event.preventDefault();

		if (player_check_edit() != true) return false;

		var $form = $('#edit-player');
		var data = $form.serializeArray();

		var url = '../user/player/playerupdate';

		submit_action(url, data, 'update');

	});

	// modal function
	$("#md5").click(function () {
		$("*[name=user_password]").val(MD5(($("*[name=user_password]").val())));
	});
	$("#player_insert").click(function (event) {
		event.preventDefault();

		if (player_check() != true) return false;

		var $form = $('#insert_player');
		var data = $form.serializeArray();

		if (document.URL.match(/..playerdetail/) && document.URL.match(/..index/)) {
			url = '../../../../../../user/player/playerinsert';
		} else if (document.URL.match(/..playerdetail/)) {
			url = '../../../../../user/player/playerinsert';

		} else if (document.URL.match(/..index/)) {
			url = '../user/player/playerinsert';
		} else {
			url = '../../user/player/playerinsert';
		}
		submit_action(url, data, 'insert');

	});

	$("#password_update").click(function (event) {
		event.preventDefault();

		if (password_check() != true) return false;

		var $form = $('#edit-password');
		var data = $form.serializeArray();

		if (document.URL.match(/..playerdetail/) && document.URL.match(/..index/)) {
			url = '../../../../../../user/setting/passwordupdate';
		} else if (document.URL.match(/..playerdetail/)) {
			url = '../../../../../user/setting/passwordupdate';
		} else {
			url = '../user/setting/passwordupdate';
		}

		submit_action(url, data, 'update');

	});

	$("#comment_update").click(function (event) {
		event.preventDefault();

		var $form = $('#edit-comment');
		var data = $form.serializeArray();

		if (document.URL.match(/..playerdetail/) && document.URL.match(/..index/)) {
			url = '../../../../../../user/setting/commentupdate';
		} else if (document.URL.match(/..playerdetail/)) {
			url = '../../../../../user/setting/commentupdate';
		} else if (document.URL.match(/..index/)) {
			url = '../user/setting/commentupdate';
		} else {
			url = '../../user/setting/commentupdate';
		}

		submit_action(url, data, 'update');

	});

	$("#user_insert").click(function (event) {
		event.preventDefault();

		if (user_check_insert() != true) return false;

		var $form = $('#insert_user');
		var data = $form.serializeArray();

		if (document.URL.match(/..playerdetail/)) {
			url = '../../../../../admin/user/userinsert';
		} else {
			url = '../admin/user/userinsert';
		}
		submit_action(url, data, 'insert');

	});

	$("#user_update").click(function (event) {
		event.preventDefault();

		if (user_check() != true) return false;
		if (hash_check($('*[name=user_password]').val()) != true) return false;

		var $form = $('#edit-user');
		var data = $form.serializeArray();

		if (document.URL.match(/..playerdetail/)) {
			url = '../../../../../admin/user/userupdate';
		} else {
			url = 'userupdate';
		}

		submit_action(url, data, 'update');

	});

	$("#update_update").click(function (event) {
		event.preventDefault();

		if (updatelog_check() != true) return false;
		var $form = $('#edit-update');
		var data = $form.serializeArray();

		if (document.URL.match(/..playerdetail/) && document.URL.match(/..index/)) {
			url = '../../../../../../admin/update/updateupdate';
		} else if (document.URL.match(/..playerdetail/)) {
			url = '../../../../../admin/update/updateupdate';
		} else if (document.URL.match(/..index/)) {
			url = '../admin/update/updateupdate';
		} else {
			url = '../../admin/update/updateupdate';
		}

		submit_action(url, data, 'update');

	});

	$("#update_change").click(function (event) {
		event.preventDefault();

		if (updatechange_check() != true) return false;
		var $form = $('#edit-updateedit');
		var data = $form.serializeArray();

		var url = '../../admin/update/updatechange';

		submit_action(url, data, 'update');

	});

	$('#stream-update').on('click', function () {
		if (stream_check() != true) return false;

		var $form = $('#update-stream');
		var data = $form.serializeArray();

		var url = 'editinfo';
		if (url.indexOf('playerdetail') == -1) {
			submit_action('../community/' + url, data, null);
		} else if (url.indexOf('playerdetail') == -1 && url.indexOf('index/index') != -1) {
			submit_action('../community/' + url, data, null);
		} else if (url.indexOf('playerdetail') != -1 && url.indexOf('index') != -1) {
			submit_action('../../../../community' + url, data, null);
		} else {
			submit_action('../../community/' + url, data, null);
		}
		$('#modal-window').modal();
	});

	$('#delete_confirm').on('click', function () {
		var $form = $('#confirm-delete');
		var data = $form.serializeArray();

		var url = 'deleteinfo';
		submit_action(url, data, null);
		$('#modal-window').modal();
	});

	$('#userreport_submit').click(function () {
		if (date_check('game_start', 'ゲーム開始時間') != true) return false;
		if (time_check('game_start', 'ゲーム開始時間') != true) return false;
		if (date_check('game_end', 'ゲーム終了時間') != true) return false;
		if (time_check('game_end', 'ゲーム終了時間') != true) return false;
		report_check('report', $('[name=win_team]').val(), $('[name=gamelog_id]').val(), $('[name=game_start]').val(), $('[name=game_end]').val(), 'gamemanage', $('*[name=token]').val(), $('[name=action_tag_gamemanage]').val());
	});

	$('#closegame_submit').click(function () {
		if (date_check('game_start', 'ゲーム開始時間') != true) return false;
		if (time_check('game_start', 'ゲーム開始時間') != true) return false;
		if ($('*[name=game_end]').val() != '') {
			if (date_check('game_end', 'ゲーム終了時間') != true) return false;
			if (time_check('game_end', 'ゲーム終了時間') != true) return false;
		}
		var $form = $('#edit-game-admin');
		var data = $form.serializeArray();
		reportgame_checkadmin('reportedit', $('[name=game_status]').val(), $('[name=gamelog_id]').val(), data);
	});

//common function

	function player_check() {
		if (input_check('player_name', 'プレイヤー名') != true) return false;
		//if (escape_check('player_name', 'プレイヤー名') != true) return false;
		if (input_check('rate', 'レート') != true) return false;
		if (numeric_check('rate', 'レート') != true) return false;
		if (delete_check('warn_flag_edit', 'memo_edit', '警告') != true) return false;
		if (delete_check('delete_flag_edit', 'memo_edit', '削除') != true) return false;
		return true;
	}

	function player_check_edit() {
		if (input_check('player_name_edit', 'プレイヤー名') != true) return false;
		//if (escape_check('player_name_edit', 'プレイヤー名') != true) return false;
		if (input_check('rate_edit', 'レート') != true) return false;
		if (numeric_check('rate_edit', 'レート') != true) return false;
		if (delete_check('warn_flag_edit', 'memo_edit', '警告') != true) return false;
		if (delete_check('delete_flag_edit', 'memo_edit', '削除') != true) return false;
		return true;
	}

	function password_check() {
		if (input_check('change_password', 'パスワード') != true) return false;
		if (length_check('change_password', 'パスワード') != true) return false;
		if (input_check('retype', 'パスワード再入力') != true) return false;
		if (equal_check('change_password', 'retype', 'パスワード') != true) return false;
		return true;
	}

	function user_check() {
		if (input_check('user_name', 'ユーザー名') != true) return false;
		if (input_check('user_password', 'パスワード') != true) return false;
		if (length_check('user_password', 'パスワード', 5) != true) return false;
		return true;
	}

	function user_check_insert() {
		if (input_check('user_name_insert', 'ユーザー名') != true) return false;
		if (input_check('user_password_insert', 'パスワード') != true) return false;
		if (length_check('user_password_insert', 'パスワード', 5) != true) return false;
		return true;
	}

	function updatelog_check() {
		if (textarea_check('memo', '内容') != true) return false;
		return true;
	}

	function updatechange_check() {
		if (textarea_check('memo', '内容') != true) return false;
		return true;
	}

//close thickbox
	$("#closetb").click(function () {
		tb_remove();
	});

	function length_check(name, input, len) {
		if ($('*[name=' + name + ']').val().length < len) {
			alert(input + 'は' + len + '文字以上にしてください。');
			return false;
		}
		return true;
	}

	function equal_check(name1, name2, input) {
		if ($('*[name=' + name1 + ']').val() != $('*[name=' + name2 + ']').val()) {
			alert(input + 'が一致しません。');
			return false;
		}
		return true;
	}

	function date_check(datetime, message) {
		date = $('[name=' + datetime + ']').val().split(' ')[0];
		if (date != null) {
			if (dateValidate(date) != true) {
				alert(message + 'が日付ではありません。');
				return false;
			} else {
				return true;
			}
		}
	}

	function time_check(datetime, message) {
		time = $('[name=' + datetime + ']').val().split(' ')[1];

		if (time === undefined) {
			alert('フォーマットが違います。');
			return false;
		}

		if (timeValidate(time) != true) {
			alert(message + 'が時間ではありません。');
			return false;
		} else {
			return true;
		}
	}

	function hash_check(str) {
		if (str.length == 32) {
			return true;
		} else {
			alert('パスワードがハッシュ化されていません。');
			return false;
		}
	}

	function delete_check(flag, memo, mode) {
		if ($('[name=' + flag + ']').children(':selected').val() == 1) {
			if (textarea_check(memo, mode + '理由') != true) return false;
			return true;
		} else {
			return true;
		}
	}

	function reportgame_check(action, team, id, start_time, end_time, option) {
		var message;
		switch (team) {
			case '0':
				message = 'ゲーム中';
				break;
			case '1':
				message = 'チーム1勝利';
				break;
			case '2':
				message = 'チーム2勝利';
				break;
			case '3':
				message = 'キャンセル';
				break;
			default :
				message = '';
				break;
		}
		jConfirm(message + 'を報告します。', '確認', function (r) {
			if (r === true) {
				var data = new Array;
				data = {
					'game_id': id,
					'game_status': team,
					'created_on': start_time,
					'end_time': end_time,
					'option': option
				};

				submit_action('reportedit', data, null);
				return false;
			} else {
				jAlert('はい。', '結果');
			}

		});
	}

	function reportgame_checkadmin(action, team, id, data) {
		var message;
		switch (team) {
			case '0':
				message = 'ゲーム中';
				break;
			case '1':
				message = 'チーム1勝利';
				break;
			case '2':
				message = 'チーム2勝利';
				break;
			case '3':
				message = 'キャンセル';
				break;
			default :
				message = '';
				break;
		}
		jConfirm(message + 'を報告します。', '確認', function (r) {
			if (r === true) {
				submit_action(action, data, null);
				return false;
			} else {
				jAlert('はい。', '結果');
			}

		});
	}
});
// common

function close_window() {
	setTimeout(function(){
		tb_remove();
		location.reload();
		return false;
	}, 500000);
}

function delrev_check(mode, module, action, id, object) {
	jConfirm('本当にID: '+id+'の'+object+'を'+mode+'しますか?', mode+'確認', function(r) {
        if (r === true) {
        	submit_action(module+action, 'id='+id, action);
             
        } else {
            jAlert('キャンセルされました。', '結果');
        }
        
    });
}

function member_check(member){
	if(member == 2) if(text_exist('player_name3', 'プレイヤーネーム3') != true) return false;
	if(member == 3) if(text_exist('player_name4', 'プレイヤーネーム4') != true) return false;
	if(member == 4) if(text_exist('player_name5', 'プレイヤーネーム5') != true) return false;
	if(member == 5) if(text_exist('player_name6', 'プレイヤーネーム6') != true) return false;
	if(member == 6) if(text_exist('player_name7', 'プレイヤーネーム7') != true) return false;
	if(member == 7) if(text_exist('player_name8', 'プレイヤーネーム8') != true) return false;
	return true;
}

function name_check(member) {
	if(input_check('player_name1', 'プレイヤー1') != true) return false;
	if(input_check('player_name2', 'プレイヤー2') != true) return false;
	if(member >= 3 ) if(input_check('player_name3', 'プレイヤー3') != true) return false;
	if(member >= 4 ) if(input_check('player_name4', 'プレイヤー4') != true) return false;
	if(member >= 5 ) if(input_check('player_name5', 'プレイヤー5') != true) return false;
	if(member >= 6 ) if(input_check('player_name6', 'プレイヤー6') != true) return false;
	if(member >= 7 ) if(input_check('player_name7', 'プレイヤー7') != true) return false;
	if(member >= 8 ) if(input_check('player_name8', 'プレイヤー8') != true) return false;
	return true;
}

function rate_check(member) {
	if(input_check('rate1', 'プレイヤー1') != true) return false;
	if(input_check('rate2', 'プレイヤー2') != true) return false;
	if(member >= 3 ) if(input_check('rate3', 'プレイヤー3') != true) return false;
	if(member >= 4 ) if(input_check('rate4', 'プレイヤー4') != true) return false;
	if(member >= 5 ) if(input_check('rate5', 'プレイヤー5') != true) return false;
	if(member >= 6 ) if(input_check('rate6', 'プレイヤー6') != true) return false;
	if(member >= 7 ) if(input_check('rate7', 'プレイヤー7') != true) return false;
	if(member >= 8 ) if(input_check('rate8', 'プレイヤー8') != true) return false;
	return true;
}

function login_escape_check(name) {
	for(var i = 0; i < $('#'+name).val().length; i++) {
		var len = escape($('#'+name).val().charAt(i)).length;
		if(len >= 4) {
			alert('日本語入力は禁止です。');
			return false;
		}
	}
	return true;
}

function yearmonth() {
	if(input_check('yyyymm', '日付') != true) return false;
	if(!$('[name=yyyymm]').val().match(/^\d{4}-\d{2}$/)){
		alert('日付のフォーマットはYYYY-MMの形式で指定してください。')
		return false;
	}

	return true;
}

function search_submit(tpl) {
	var $form = $('#search');
	var data = $form.serializeArray();
	
	submit_action(tpl, data, 'refresh');
}

function toggle_contents(class_value) {
	if($('#'+class_value).attr('class') === 'hidden'){
		$('*[id='+class_value+']').removeClass("hidden").addClass("apper");
	} else {
		$('*[id='+class_value+']').removeClass("apper").addClass("hidden");
	}
}
