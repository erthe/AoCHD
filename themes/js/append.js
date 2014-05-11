$(document).ready(function(){
	
	$('#game_start').click(function(){
		if(member_check() != true) return false;
		
		var $form = $('#matching_result');
	    var data = $form.serializeArray();
	    
	    $.ajax({
			type: 'POST',
			url: 'gaming',
			data: data,
			dataType: 'html',
			timeout: 10000,  // 単位はミリ秒
		    
			// 送信前
			beforeSend: function(xhr, settings) {
				// ボタンを無効化し、二重送信を防止
				$('#game_start').attr('disabled', true);
			},
			// 応答後
			complete: function(xhr, textStatus) {
			},

			success: function (data, dataType) {
				isStart = true;
				$("#gaming").html(data);
			},

			error: function ( XMLHttpRequest, textStatus, errorThrown ) {
				this;
				alert('Error : ' + errorThrown);
		    }
		});
	    
	    return false;
	});
	
	$('#win_team1').click(function(){
		if(time_check(new Date($(this).attr('name').replace(/-/g, '/'))) != true) return false;
		end_time = getNowDateTime(new Date());
		report_check('report', 1, $('#gameid').attr('name'), $(this).attr('name'), end_time, 'maketeam', $('*[name=token_gaming]').val(), $('*[name=action_tag_gaming]').val());
	});	
	
	$('#win_team2').click(function(){
		if(time_check(new Date($(this).attr('name').replace(/-/g, '/'))) != true) return false;
		end_time = getNowDateTime(new Date());
		report_check('report', 2, $('#gameid').attr('name'), $(this).attr('name'), end_time, 'maketeam', $('*[name=token_gaming]').val(), $('*[name=action_tag_gaming]').val());
	});
	
	$('#game_cancel').click(function(){
		cancel_check('cancel', 2, $('#gameid').attr('name'), 'maketeam');
	});
	
	function cancel_check(action, team, id, option) {
		jConfirm('ゲームをキャンセルしますか?', '確認', function(r) {
	        if (r === true) {
	        	var data = new Array;
	        	data = {'game_id': id, 'option': option};
	        	submit_action('cancel', data, null);
	        	return false;
	        } else {
	            jAlert('はい。', '結果');
	        }
	        
	    });
	}
	
	$('[id$=page]').click(function() {
		if(document.URL.match(/..user/)) {
			$("#editlist").load($(this).attr('href'));
		} else {
			$("#list").load($(this).attr('href'));
		}
		return false;
	});
	
	$('[id^=sort_status]').click(function() {
		sort_function($(this));
	});
	
	$(".delete").click(function() {
        var id = $(this).parent('td').attr('id');
        delrev_check('削除', 'player', 'delete', id, 'プレイヤー');
    });
	
    $(".revert").click(function() {
        var id = $(this).parent('td').attr('id');
        delrev_check('復元', 'player', 'revert', id, 'プレイヤー');
    });

	$(".mijissou").click(function(){
		jAlert('未実装なのです', '残念');
	});
	
	$("a#player-data").click(function(){
		submit_action('player/playeredit', {'id': $(this).attr('name')}, 'gatdata');
		$('#player-edit').modal();
	});
	
	function member_check(){
		for(var j=9;j<=10;j++) {
			if ($('*[name=player_name'+j+']').val() == '') {
			    alert('チーム1, 2に少なくとも1人は入力して下さい。');
			    return false;
			}
		}
		
		for(var k=9;k<=16;k++) {
			if ($('*[name=player_name'+k+']').val() != '') {
				if ($('*[name=rate'+k+']').val() == '') {
					var number = k - 8;
				    alert('プレイヤー'+number+'が空白です。');
				    return false;
				}
			}
		}
		return true;
	}
	
	function sendrequest(sortkey, order, module){
		var $form = $('#search');
		var $sortkey = { name: 'sortkey', value: sortkey};
		var $order = { name: 'order', value: order};
	    var data = $form.serializeArray();
	    
	    data.push($sortkey);
	    data.push($order);
	    
	    if(module == 'editlist'){
	    	module = '../user/index/editlist';
	    }
	    
		submit_action(module, data, 'refresh');
	}
	
	function getNowDateTime(date){
		year = date.getFullYear();
		month = date.getMonth()+1;
		day = date.getDate();
		hour = date.getHours();
		min = date.getMinutes();
		sec = date.getSeconds();
		ret_time = year + '-' + month + '-' + day + ' ' + hour + ':' + min + ':' + sec;
		
		return ret_time;
	}
	
	function time_check(time){
		var ret = false;
		var now = Date.parse(new Date());
		check_time = time.setMinutes(time.getMinutes() + 10);
		
		if (now >= check_time){
			ret = true;
		} else {
			jAlert('試合時間が10分未満です。<br />10分経過を待つか、ゲームのキャンセルもしくは管理画面よりゲームを終了して下さい。', '警告');
			ret = false;
		}
		return ret;
	}
	
	function sort_function(parent) {
		var idx = parent.attr("id").replace("sort_status", "");
		var module = parent.closest("div").attr('id');
		
		switch (parent.attr("name")) {
			case 'unsorted':
				$('[id^=status]').attr('name', "unsorted");
				$('[id^=status]').attr('src', '../themes/images/unsorted.png');
				parent.attr('name', "down");
				$('#status'+idx).attr('src', '../themes/images/down.png');
				
				sendrequest(parent.attr('abbr'), 'DESC', module);
				break;
			
			case 'down':
				$('[id^=status]').attr('name', "unsorted");
				$('[id^=status]').attr('src', '../themes/images/unsorted.png');
				parent.attr('name', "up");
				$('#status'+idx).attr('src', '../themes/images/up.png');
				
				sendrequest(parent.attr('abbr'), 'ASC', module);
				break;
				
			case 'up':
				$('[id^=status]').attr('name', "unsorted");
				$('[id^=status]').attr('src', '../themes/images/unsorted.png');
				parent.attr('name', "down");
				$('#status'+idx).attr('src', '../themes/images/down.png');
				
				sendrequest(parent.attr('abbr'), 'DESC', module);
				break;
				
			default:
				parent.attr('name', "unsorted");
				$('#status'+idx).attr('src', '../themes/images/unsorted.png');
				break;
		}
	}
	
});