// tea party function
$("#member_update").click(function(event) {
    if (member_check() != true) return false;
    var $form = $('#edit-member');
    var data = $form.serializeArray();

    var url = 'teaparty/index/editentry';
    submit_action(url, data, null);
    
});

$("#party_update").click(function(event) {
    if (party_check() != true) return false;
    var $form = $('#edit-party');
    var data = $form.serializeArray();

    var url = 'teaparty/index/editpartyinfo';
    submit_action(url, data, null);
    
});

//common function
function member_check() {
    if(input_check('entry_name', '呼ばれ方') != true) return false;
    if(input_check('screen_name', 'スクリーンネーム') != true) return false;
    if(escape_check('screen_name', 'スクリーンネーム') != true) return false;
    if(input_check('interest', '興味') != true) return false;
    if(textarea_check('self_introduction', '自己紹介') != true) return false;
    return true;
}

function party_check() {
	if ($('*[name=start_datetime]').val() != '') {
		if(date_check('start_datetime', 'ゲーム開始時間') !=true) return false;
		if(time_check('start_datetime', 'ゲーム開始時間') !=true) return false;
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
