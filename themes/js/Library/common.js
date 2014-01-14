function input_check(name, input) {
	if ($('*[name='+name+']').val() === '') {
	    alert(input+'が空白です。');
	    return false;
	} else {
		return true;
	}
}

function textarea_check(name, input) {
	if ($('#'+name).val().length == 0) {
	    alert(input+'が空白です。');
	    return false;
	} else {
		return true;
	}
}

function numeric_check(name, input) {
	if ($.isNumeric($('*[name='+name+']').val().replace(/%/g, '')) === false) {
	    alert(input+'が数値ではありません。');
	    return false;
	}
	return true;
}

function escape_check(name) {
	if ($('*[name='+name+']').val().indexOf("'") != -1) {
	    alert('使用禁止文字が含まれています。');
	    return false;
	} else {
		return true;
	}
}

function report_check(action, team, id, start_time, end_time, option) {
	jConfirm('チーム'+team+'の勝利を報告します。', '確認', function(r) {
        if (r === true) {
        	var data = new Array;
        	data = {'game_id': id, 'win_team': team, 'created_on': start_time, 'end_time': end_time, 'option': option};
        	
        	submit_action('report', data, null);
        	return false;
        } else {
            jAlert('はい。', '結果');
        }
        
    });
}

function inputCheck(){
	fileCheck = $("#file-input").val().length;
	
	//値が無ければボタンを非表示
	if(fileCheck == 0){
		$("#fileCheck").attr("disabled","disabled");
	}else{
		$("#fileCheck").attr("disabled",false);
	}
}
	
function submit_action(url, data, mode) {
	$.ajax({
		type: 'POST',
		url: url,
		data: data,
		dataType: 'html',
		timeout: 10000,  // 単位はミリ秒
	    
		// 送信前
		beforeSend: function(xhr, settings) {
			// ボタンを無効化し、二重送信を防止
			$("*[type=submit]").attr('disabled', true);
		},
		// 応答後
		complete: function(xhr, textStatus) {
			// ボタンを有効化し、再送信を許可
			$("*[type=submit]").attr('disabled', false);
		},

		success: function (data, dataType) {
		// separated from caller's argument
		switch (mode) {
			case 'delete':
				jAlert('削除されました。', '結果');
		        location.reload();
		        break;
		               
			case 'revert':
				jAlert('復元されました。', '結果');
		        location.reload();
		        break;
		        
			case 'rewrite':
				$("#"+url).html(data);
				break;
			
			case 'refresh':
				$("#"+url).html(data);
				break;
		            
			case 'gatdata':
				$("#data-container").html(data);
				break;
				
		    default:
		    	$(".window-container").html(data);
		       	break;
			}
		},
		error: function ( XMLHttpRequest, textStatus, errorThrown ) {
			this;
			alert('Error : ' + errorThrown);
	    }
	});
};
