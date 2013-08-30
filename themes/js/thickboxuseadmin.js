// admin function
// conversion md5
$("#md5").click(function() {
	$("*[name=password]").val(MD5(($("*[name=password]").val())));
});

$("#user_update").click(function(event) {
    event.preventDefault();
    
    if (user_check() != true) return false;
    
    var $form = $('#edit-user');
    var data = $form.serializeArray();
    
    submit_action('userupdate', data, 'update');
    
});
    
$("#user_insert").click(function(event) {
    event.preventDefault();
    
    if(user_check() != true) return false;
                          
    var $form = $('#edit-user');
    var data = $form.serializeArray();
                                 
    submit_action('userinsert', data, 'insert');
                                 
});

$("#admin_update").click(function(event) {
    event.preventDefault();
    
    if(admin_check() != true) return false;
                          
    var $form = $('#edit-admin');
    var data = $form.serializeArray();
                          
    submit_action('adminupdate', data, 'update');
        
});
    
$("#admin_insert").click(function(event) {
    event.preventDefault();
    
    if(admin_check() != true) return false;
                          
    var $form = $('#edit-admin');
    var data = $form.serializeArray();
                                 
    submit_action('admininsert', data, 'insert');
                                 
});

if(document.URL.match(/..classlist/)) {
	// Add or Remove % value
	$("*[name$=grow]").blur(function() {
		$(this).val($(this).val() + '%');
	});
	
	$("*[name$=grow]").focus(function() {
		$(this).val($(this).val().replace(/%/g,''));
	});
}
	
$("#class_update").click(function(event) {
    event.preventDefault();
   
    if(class_check() != true) return false;
    
    var $form = $('#edit-class');
    var data = $form.serializeArray();
     
    submit_action('classupdate', data, 'update');
        
});
    
$("#class_insert").click(function(event) {
    event.preventDefault();
    
    if(class_check() != true) return false;
    
    var $form = $('#edit-class');
    var data = $form.serializeArray();
     
    submit_action('classinsert', data, 'insert');
    
});

$("#skill_update").click(function(event) {
    event.preventDefault();
    
    if(class_check() != true) return false;
                          
    var $form = $('#edit-skill');
    var data = $form.serializeArray();
                          
    submit_action('skillupdate', data, 'update');
    
});

$("#skill_insert").click(function(event) {
    event.preventDefault();
    
    if(skill_check() != true) return false;
    
    var $form = $('#edit-skill');
    var data = $form.serializeArray();
                                 
    submit_action('skillinsert', data, 'insert');
                                 
});

$("#equip_update").click(function(event) {
    event.preventDefault();
    
    var $form = $('#edit-equip');
    var data = $form.serializeArray();
    
    submit_action('equipupdate', data, 'update');
});

$("#item_update").click(function(event) {
    event.preventDefault();
    
    if(item_check() != true) return false;
    
    var $form = $('#edit-item');
    var data = $form.serializeArray();
                          
    submit_action('itemupdate', data, 'update');
    
});


$("#item_insert").click(function(event) {
    event.preventDefault();
     
    if(item_check() != true) return false;
    
    var $form = $('#edit-item');
    var data = $form.serializeArray();
                                 
    submit_action('iteminsert', data, 'insert');
                                 
});

//common function

function user_check() {
    if(input_check('email', 'Email') != true) return false;
    if(input_check('password', 'パスワード') != true) return false;
    return true;
}

function admin_check() {
	if(input_check('admin_name', '管理者名') != true) return false;
    if(input_check('password', 'パスワード') != true) return false;
    return true;
}

function class_check() {
    if(input_check('class_rank', 'ランク') != true) return false;
    if(numeric_check('class_rank', 'ランク') != true) return false;
    if(input_check('class_name', 'クラス名') != true) return false;
    if(input_check('hp_val', 'HP') != true) return false;
    if(numeric_check('hp_val', 'HP') != true) return false;
    if(input_check('str_val', 'STR') != true) return false;
    if(numeric_check('str_val', 'STR') != true) return false;
    if(input_check('mag_val', 'MAG') != true) return false;
    if(numeric_check('mag_val', 'MAG') != true) return false;
    if(input_check('skl_val', 'SKL') != true) return false;
    if(numeric_check('skl_val', 'SKL') != true) return false;
    if(input_check('sdp_val', 'SPD') != true) return false;
    if(numeric_check('spd_val', 'SPD') != true) return false;
    if(input_check('luk_val', 'LUK') != true) return false;
    if(numeric_check('luk_val', 'LUK') != true) return false;
    if(input_check('def_val', 'DEF') != true) return false;
    if(numeric_check('def_val', 'DEF') != true) return false;
    if(input_check('mdf_val', 'MDF') != true) return false;
    if(numeric_check('mdf_val', 'MDF') != true) return false;
    if(input_check('bod_val', 'BOD') != true) return false;
    if(numeric_check('bod_val', 'BOD') != true) return false;
    if(input_check('hp_grow', 'HP率') != true) return false;
    if(numeric_check('hp_grow', 'HP率') != true) return false;
    if(input_check('str_grow', 'STR率') != true) return false;
    if(numeric_check('str_grow', 'STR率') != true) return false;
    if(input_check('mag_grow', 'MAG率') != true) return false;
    if(numeric_check('mag_grow', 'MAG率') != true) return false;
    if(input_check('skl_grow', 'SKL率') != true) return false;
    if(numeric_check('skl_grow', 'SKL率') != true) return false;
    if(input_check('sdp_grow', 'SPD率') != true) return false;
    if(numeric_check('spd_grow', 'SPD率') != true) return false;
    if(input_check('luk_grow', 'LUK率') != true) return false;
    if(numeric_check('luk_grow', 'LUK率') != true) return false;
    if(input_check('def_grow', 'DEF率') != true) return false;
    if(numeric_check('def_grow', 'DEF率') != true) return false;
    if(input_check('mdf_grow', 'MDF率') != true) return false;
    if(numeric_check('mdf_grow', 'MDF率') != true) return false;
    if(input_check('bod_grow', 'BOD率') != true) return false;
    if(numeric_check('bod_grow', 'BOD率') != true) return false;
    return true;
}

function skill_check() {
	if(input_check('skill_name', 'スキル名') != true) return false;
	if(input_check('description', '説明') != true) return false;
    return true;
}

function item_check() {
	if(input_check('item_name', 'アイテム名') != true) return false;
	if(input_check('power', '威力') != true) return false;
	if(numeric_check('power', '威力') != true) return false;
	if(input_check('hit_chance', '命中') != true) return false;
	if(numeric_check('hit_chance', '命中') != true) return false;
	if(input_check('special_chance', '必殺') != true) return false;
	if(numeric_check('special_chance', '必殺') != true) return false;
	if(input_check('weight', '重さ') != true) return false;
	if(numeric_check('weight', '重さ') != true) return false;
	if(input_check('durability', '耐久') != true) return false;
	if(numeric_check('durability', '耐久') != true) return false;
	if(input_check('weapon_level', '武器レベル') != true) return false;
	if(numeric_check('weapon_level', '武器レベル') != true) return false;
	if(input_check('price', '価格') != true) return false;
	if(numeric_check('price', '価格') != true) return false;
	if(input_check('attack_speed', '攻撃速度') != true) return false;
	if(numeric_check('attack_speed', '攻撃速度') != true) return false;
	if(input_check('hp_plus', 'HP上昇') != true) return false;
	if(numeric_check('hp_plus', 'HP上昇') != true) return false;
	if(input_check('str_plus', 'STR上昇') != true) return false;
	if(numeric_check('str_plus', 'STR上昇') != true) return false;
	if(input_check('mag_plus', 'MAG上昇') != true) return false;
	if(numeric_check('mag_plus', 'MAG上昇') != true) return false;
	if(input_check('skl_plus', 'SKL上昇') != true) return false;
	if(numeric_check('skl_plus', 'SKL上昇') != true) return false;
	if(input_check('spd_plus', 'SPD上昇') != true) return false;
	if(numeric_check('spd_plus', 'SPD上昇') != true) return false;
	if(input_check('luk_plus', 'LUK上昇') != true) return false;
	if(numeric_check('luk_plus', 'LUK上昇') != true) return false;
	if(input_check('def_plus', 'DEF上昇') != true) return false;
	if(numeric_check('def_plus', 'DEF上昇') != true) return false;
	if(input_check('mdf_plus', 'MDF上昇') != true) return false;
	if(numeric_check('mdf_plus', 'MDF上昇') != true) return false;
	if(input_check('bod_plus', 'BOD上昇') != true) return false;
	if(numeric_check('bod_plus', 'BOD上昇') != true) return false;
	if(input_check('description', '説明') != true) return false;
    return true;
}

//close thickbox
$("#closetb").click(function() {
	tb_remove();
});

function input_check(name, input) {
	if ($('*[name='+name+']').val() === '') {
	    alert(input+'が空白です。');
	    return false;
	} else {
		return true;
	}
};

function numeric_check(name, input) {
	if ($.isNumeric($('*[name='+name+']').val().replace(/%/g, '')) === false) {
	    alert(input+'が数値ではありません。');
	    return false;
	}
	return true;
}