$(document).ready(function(){
                  
    $(window).bind("load", function(){
        // initial function(common method)
        var len = $("#tbl tbody").children().length;
        
        for (var i=1; i<len+1; i++) {
            eval("var trno_" + i +" = false;");
        }
        
        $("#player_create").click(function(){
    		$('*[name=player_id]').val('');
    		$('*[name=player_name]').val('');
    		$('*[name=rate]').val('');
    		$('*[name=delete_flag]').val('0');
    		$('*[name=memo]').val('');
    		$('#player-insert').modal();
    	});
       
        $("#password_edit").click(function(){
        	var url = $(location).attr('href');
        	if(url.indexOf('playerdetail') == -1) {
        		submit_action('../member/editpassword', null, 'gatdata');
        	} else {
        		submit_action('../../../../../member/editpassword', null, 'gatdata');
        	}
    		$('#password-edit').modal();
    	});
        
        $("#user_create").click(function(){
        	$('#user-insert').modal();
    	});
        
        $("a#admin_report").click(function(){
    		submit_action('closedgameedit', {'gamelog_id': $(this).attr('name')}, 'gatdata');
    		$('#admin-report').modal();
    	});
        
        $("a#user_edit").click(function(){
    		submit_action('useredit', {'id': $(this).attr('name')}, 'gatdata');
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
        
        if(document.URL.match(/..maketeam/)) {
        	$('#matching_submit').click(function(){
        		var member = $('#game_member').val();
        		if(name_check(member) != true) return false;
        		if(rate_check(member) != true) return false;
        		
        		var $form = $('#member_entry');
        	    var data = $form.serializeArray();
        	    
        	    submit_action('matching', data, 'rewrite');
        	    jAlert('ゲームが始まる前にゲーム開始ボタンを押してくださいね。', '確認');
        	    return false;
        	});
        	
        }
        
        if(document.URL.match(/..playerlist/)) {
        	$(function() {
        		search_submit('list');
        	});
        	$("#search_reset").click(function() {
                window.location = "playerlist";
            });
        	
        	$("#search_submit").click(function() {
        		if(escape_check('search_player_name') != true) return false;
        		if ($('*[name=search_rate_up]').val() != ''){
        			if(numeric_check('search_rate_up', 'レート(以上)') != true) return false;
        		}
        		if ($('*[name=search_rate_down]').val() != ''){
        			if(numeric_check('search_rate_down', 'レート(以下)') != true) return false;
        		}
                search_submit('list');
                return false;
            });
        	        	
        }
        
        if(document.URL.match(/..member/)) {
        	if(document.URL.match(/..index/)) {
	        	$(function() {
	        		search_submit('editlist');
	        	});
	        	$("#search_reset").click(function() {
	                window.location = "index";
	            });
	        	
	        	$("#search_submit").click(function() {
	        		if(escape_check('search_player_name') != true) return false;
	        		if ($('*[name=search_rate_up]').val() != ''){
	        			if(numeric_check('search_rate_up', 'レート(以上)') != true) return false;
	        		}
	        		if ($('*[name=search_rate_down]').val() != ''){
	        			if(numeric_check('search_rate_down', 'レート(以下)') != true) return false;
	        		}
	                search_submit('editlist');
	                return false;
	            });	
        	}
        	
        	if(document.URL.match(/..gamemanage/)) {
	        	$("a#report").click(function(){
	        		submit_action('userreport', {'gamelog_id': $(this).attr('name')}, 'gatdata');
	        		$('#game-report').modal();
	        	});
        	}
        }
        
        if(document.URL.match(/..playerdeleted/)) {
        	$(function() {
        		search_submit('deletedlist');
        	});
        	$("#search_reset").click(function() {
                window.location = "playerdeleted";
            });
        	
        	$("#sort_submit").click(function() {
                search_submit('deletedlist');
                return false;
            });	
        	
            $(".revert").click(function() {
                var id = $(this).parent('td').attr('id');
                delrev_check('復元', 'user', 'revert', id);
            });
        }
        
        if(document.URL.match(/..userdeleted/)) {
        	$(function() {
        		search_submit('deletedlist');
        	});
        	
            $(".revert").click(function() {
                var id = $(this).parent('td').attr('id');
                delrev_check('復元', 'user', 'revert', id);
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
        
        if(document.URL.match(/..login/)) {
            $(".submit").click(function() {
                if ($("#login_username").val() === "") {
                    alert("ログインユーザー名が空白です。");
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
                delrev_check('削除', 'user', 'delete', id);
            });
        }
             
        if(document.URL.match(/..deleteduserlist/)) {
            $(".revert").click(function() {
                var id = $(this).parent('td').attr('id');
                delrev_check('復元', 'user', 'revert', id);
            });
        }
        
        if(document.URL.match(/..playerupload/)) {
	        $("#file-input").change(function(){
	        	inputCheck();
	        });
        }
    });
});
// common

function close_window() {
	setTimeout(function(){
		tb_remove();
		location.reload();
		return false;
	}, 500000);
}

function delrev_check(mode, module, action, id) {
	jConfirm('本当にID: '+id+'のユーザーを'+mode+'しますか?', mode+'確認', function(r) {
        if (r === true) {
        	submit_action(module+action, 'id='+id, action);
             
        } else {
            jAlert('キャンセルされました。', '結果');
        }
        
    });
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

function search_submit(tpl) {
	var $form = $('#search');
	var data = $form.serializeArray();
	
	submit_action(tpl, data, 'refresh');
}