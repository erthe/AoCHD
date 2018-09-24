$(document).ready(function(){         
    $(window).bind("load", function(){
    	var odd_height;
    	var even_height;
    	$('*[id^=member_]').each(function(i){
    		var height = $(this).outerHeight();
			if (i % 2 == 0){
				even_height = height;
			} else {
				odd_height = height;
				var row;
				if (even_height > odd_height) {
					row = i;
					$('div[id=member_'+i+']').css('height', even_height);
				} else {
					row = i - 1;
					$('div[id=member_'+row+']').css('height', odd_height);
				}
			}
			
		});
    	
        $(".autolink").each(function(){
            $(this).html( $(this).html().replace(/((http|https|ftp):\/\/[\w?=&.\/-;#~%-]+(?![\w\s?&.\/;#~%"=-]*>))/g, '<a href="$1">$1</a> ') );
        });
        
        $("#new").click(function(){
        	submit_action('teaparty/index/changeentry', null, null);
    		$('#modal-window').modal('toggle', {
    			keyboard: true
    		});
    		return false;
    	});
       
        $("*[id^=edit_]").click(function(){
        	var tea_party_id = $(this).attr('id').split('_');
        	data = {'id': tea_party_id[1]};
        	submit_action('teaparty/index/changeentry', data, null);
    		$('#modal-window').modal('toggle', {
    			keyboard: true
    		});
    		return false;
    	});
        
        $("#close_party").click(function() {
        	jConfirm('お茶会を終了しますか?', '確認', function(r) {
    	        if (r === true) {
    	        	var $form = $('#party-times');
    	            var data = $form.serializeArray();
    	            
    	        	var url = 'teaparty/index/closeparty';
    	        	submit_action(url, data, 'update');
    	        	return false;
    	        } else {
    	            jAlert('キャンセルされました。', '結果');
    	        }
    	        
    	    });
        });
        
        $("#create_party").click(function() {
        	jConfirm('お茶会を新規作成しますか?', '確認', function(r) {
    	        if (r === true) {
    	        	var $form = $('#party-times');
    	            var data = $form.serializeArray();
    	            
    	        	var url = 'teaparty/index/createparty';
    	        	submit_action(url, data, 'insert');
    	        	return false;
    	        } else {
    	            jAlert('キャンセルされました。', '結果');
    	        }
    	        
    	    });
        });
        
        $("#select_party_times").click(function() {
        	if (time_check() != true) return false;
            var $form = $('#party-times');
            var data = $form.serializeArray();

            var url = 'teaparty/index/selectpartytime';
            submit_action(url, data, 'reload');
        });
        
        $("#party_edit").click(function(){
        	var $form = $('#party-times');
            var data = $form.serializeArray();

            var url = 'teaparty/index/changepartyinfo';
            submit_action(url, data, null);
            $('#modal-window').modal();
    	});
        
        $("#how_edit_info").click(function(){
        	var url = 'teaparty/index/howeditinfo';
            submit_action(url, null, null);
            $('#modal-window').modal();
    	});
        
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

function delrev_check(mode, module, action, id, object) {
	jConfirm('本当にID: '+id+'の'+object+'を'+mode+'しますか?', mode+'確認', function(r) {
        if (r === true) {
        	submit_action(module+action, 'id='+id, action);
             
        } else {
            jAlert('キャンセルされました。', '結果');
        }
        
    });
}

function toggle_contents(class_value) {
	if($('#'+class_value).attr('class') === 'hidden'){
		$('*[id='+class_value+']').removeClass("hidden").addClass("apper");
	} else {
		$('*[id='+class_value+']').removeClass("apper").addClass("hidden");
	}
}

function time_check() {
    if(input_check('tea_party_times', '何回目のお茶会か') != true) return false;
    return true;
}
