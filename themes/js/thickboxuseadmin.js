// admin function
// conversion md5
$("#md5").click(function() {
	$("*[name=user_password]").val(MD5(($("*[name=user_password]").val())));
});

$("#player_update").click(function(event) {
    event.preventDefault();
    
    if (player_check_edit() != true) return false;
    
    var $form = $('#edit-player');
    var data = $form.serializeArray();

    var url = '../user/player/playerupdate';
    
    submit_action(url, data, 'update');
    
});
    
$("#player_insert").click(function(event) {
    event.preventDefault();
    
    if(player_check() != true) return false;
                          
    var $form = $('#insert_player');
    var data = $form.serializeArray();
                                 
    if(document.URL.match(/..playerdetail/) && document.URL.match(/..index/)) {
    	url = '../../../../../../user/player/playerinsert';
    } else if(document.URL.match(/..playerdetail/))  {
	url = '../../../../../user/player/playerinsert';

        } else if(document.URL.match(/..index/)) {
	url = '../user/player/playerinsert';
        } else {
    	url = '../../user/player/playerinsert';    }
    submit_action(url, data, 'insert');
                                 
});

$("#password_update").click(function(event) {
    event.preventDefault();
    
    if (password_check() != true) return false;
    
    var $form = $('#edit-password');
    var data = $form.serializeArray();
    
    if(document.URL.match(/..playerdetail/) && document.URL.match(/..index/)) {
    	url = '../../../../../../user/setting/passwordupdate';
        } else if(document.URL.match(/..playerdetail/))  {
	url = '../../../../../user/setting/passwordupdate';
    } else {
    	url = '../user/setting/passwordupdate';
    }
    
    submit_action(url, data, 'update');
    
});

$("#comment_update").click(function(event) {
    event.preventDefault();
    
    var $form = $('#edit-comment');
    var data = $form.serializeArray();
    
    if(document.URL.match(/..playerdetail/) && document.URL.match(/..index/)) {
    	url = '../../../../../../user/setting/commentupdate';
        } else if(document.URL.match(/..playerdetail/))  {
	url = '../../../../../user/setting/commentupdate';
    } else if(document.URL.match(/..index/)) {
	url = '../user/setting/commentupdate';
        } else {
    	url = '../../user/setting/commentupdate';
    }
    
    submit_action(url, data, 'update');
    
});

$("#user_insert").click(function(event) {
    event.preventDefault();
    
    if(user_check_insert() != true) return false;
                          
    var $form = $('#insert_user');
    var data = $form.serializeArray();
                                 
    if(document.URL.match(/..playerdetail/)) {
    	url = '../../../../../admin/user/userinsert';
    } else {
    	url = '../admin/user/userinsert';
    }
    submit_action(url, data, 'insert');
                                 
});

$("#user_update").click(function(event) {
    event.preventDefault();
    
    if (user_check() != true) return false;
    if (hash_check($('*[name=user_password]').val()) != true) return false;
    
    var $form = $('#edit-user');
    var data = $form.serializeArray();
    
    if(document.URL.match(/..playerdetail/)) {
    	url = '../../../../../admin/user/userupdate';
    } else {
    	url = 'userupdate';
    }
    
    submit_action(url, data, 'update');
    
});

$("#update_update").click(function(event) {
    event.preventDefault();
    
    if (updatelog_check() != true) return false;
    var data = {'update_note': $('#content').val(), 'token': $('*[name=token]').val(), 'action_tag': $('*[name=action_tag_update]').val()};
    
    if(document.URL.match(/..playerdetail/) && document.URL.match(/..index/)) {
    	url = '../../../../../../admin/update/updateupdate';
    } else if(document.URL.match(/..playerdetail/))  {
	url = '../../../../../admin/update/updateupdate';
    } else if(document.URL.match(/..index/)) {
	url = '../admin/update/updateupdate';
    } else {
    	url = '../../admin/update/updateupdate';
    }
    
    submit_action(url, data, 'update');
    
});

$("#update_change").click(function(event) {
    event.preventDefault();
    
    if (updatechange_check() != true) return false;
    var $form = $('#edit-updateedit');
    var data = $form.serializeArray();
    
    var url = '../../admin/update/updatechange';
    
    submit_action(url, data, 'update');
    
});

$('#userreport_submit').click(function(){
	if(date_check('game_start', 'ゲーム開始時間') !=true) return false;
	if(time_check('game_start', 'ゲーム開始時間') !=true) return false;
	if(date_check('game_end', 'ゲーム終了時間') !=true) return false;
	if(time_check('game_end', 'ゲーム終了時間') !=true) return false;
	report_check('report', $('[name=win_team]').val(),  $('[name=gamelog_id]').val(), $('[name=game_start]').val(), $('[name=game_end]').val(), 'gamemanage', $('*[name=token]').val(), $('[name=action_tag_gamemanage]').val());
});

$('#closegame_submit').click(function(){
	if(date_check('game_start', 'ゲーム開始時間') !=true) return false;
	if(time_check('game_start', 'ゲーム開始時間') !=true) return false;
	if($('*[name=game_end]').val() != '') {
		if(date_check('game_end', 'ゲーム終了時間') !=true) return false;
		if(time_check('game_end', 'ゲーム終了時間') !=true) return false;
	}
	var $form = $('#edit-game-admin');
	var data = $form.serializeArray();
	reportgame_checkadmin('reportedit', $('[name=game_status]').val(),  $('[name=gamelog_id]').val(), data);
});

//common function

function player_check() {
    if(input_check('player_name', 'プレイヤー名') != true) return false;
    if(escape_check('player_name', 'プレイヤー名') != true) return false;
    if(input_check('rate', 'レート') != true) return false;
    if(numeric_check('rate', 'レート') != true) return false;
    if(escape_check('player_name') != true) return false;
    if(delete_check('delete_flag_edit', 'memo_edit') != true) return false;
    return true;
}

function player_check_edit() {
    if(input_check('player_name_edit', 'プレイヤー名') != true) return false;
    if(escape_check('player_name_edit', 'プレイヤー名') != true) return false;
    if(input_check('rate_edit', 'レート') != true) return false;
    if(numeric_check('rate_edit', 'レート') != true) return false;
    if(delete_check('delete_flag_edit', 'memo_edit') != true) return false;
    return true;
}

function password_check() {
    if(input_check('change_password', 'パスワード') != true) return false;
    if(length_check('change_password', 'パスワード') != true) return false;
    if(input_check('retype', 'パスワード再入力') != true) return false;
    if(equal_check('change_password', 'retype', 'パスワード') != true) return false;
    return true;
}

function user_check() {
    if(input_check('user_name', 'ユーザー名') != true) return false;
    if(input_check('user_password', 'パスワード') != true) return false;
    if(length_check('user_password', 'パスワード', 5) != true) return false;
    return true;
}

function user_check_insert() {
    if(input_check('user_name_insert', 'ユーザー名') != true) return false;
    if(input_check('user_password_insert', 'パスワード') != true) return false;
    if(length_check('user_password_insert', 'パスワード', 5) != true) return false;
    return true;
}

function updatelog_check() {
    if(textarea_check('content', '内容') != true) return false;
    return true;
}

function updatechange_check() {
    if(textarea_check('update_note', '内容') != true) return false;
    return true;
}
    
//close thickbox
$("#closetb").click(function() {
	tb_remove();
});

function length_check(name, input, len) {
	if ($('*[name='+name+']').val().length < len) {
	    alert(input+'は'+len+'文字以上にしてください。');
	    return false;
	}
	return true;
}

function equal_check(name1, name2, input) {
	if ($('*[name='+name1+']').val() != $('*[name='+name2+']').val()) {
	    alert(input+'が一致しません。');
	    return false;
	}
	return true;
}

function date_check(datetime, message){
	date = $('[name='+datetime+']').val().split(' ')[0];
	if (date != null) {
		if(dateValidate(date) != true){ 
			alert(message+'が日付ではありません。');
			return false;
		} else {
			return true;
		}
	}
}

function time_check(datetime, message){
	time = $('[name='+datetime+']').val().split(' ')[1];
	
	if(time === undefined){
		alert('フォーマットが違います。');
		return false;
	}
	
	if(timeValidate(time) != true){ 
		alert(message+'が時間ではありません。');
		return false;
	} else {
		return true;
	}
}

function hash_check(str) {
	if(str.length == 32){
		return true;
	} else {
		alert('パスワードがハッシュ化されていません。');
		return false;
	}
}

function delete_check(flag, memo) {
	if($('[name='+flag+']').children(':selected').val() == 1) {
		if(textarea_check(memo, '削除理由') != true) return false;
		return true;
	} else {
		return true;
	}
}

function reportgame_check(action, team, id, start_time, end_time, option) {
	var message;
	switch (team) {
	  case '0': message = 'ゲーム中'; break;
	  case '1': message = 'チーム1勝利'; break;
	  case '2': message = 'チーム2勝利'; break;
	  case '3': message = 'キャンセル'; break;
	  default : message = ''; break;
	}
	jConfirm(message+'を報告します。', '確認', function(r) {
        if (r === true) {
        	var data = new Array;
        	data = {'game_id': id, 'game_status': team, 'created_on': start_time, 'end_time': end_time, 'option': option};
        	
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
	  case '0': message = 'ゲーム中'; break;
	  case '1': message = 'チーム1勝利'; break;
	  case '2': message = 'チーム2勝利'; break;
	  case '3': message = 'キャンセル'; break;
	  default : message = ''; break;
	}
	jConfirm(message+'を報告します。', '確認', function(r) {
        if (r === true) {
        	submit_action(action, data, null);
        	return false;
        } else {
            jAlert('はい。', '結果');
        }
        
    });
}