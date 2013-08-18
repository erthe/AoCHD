// admin function
if(document.URL.match(/..userlist/)) {
    // conversion md5
    $("#md5").click(function() {
        $("*[name=password]").val(MD5(($("*[name=password]").val())));
    });
    
    $("#submit_update").click(function(event) {
        event.preventDefault();
        
        if ($("*[name=user_name]").val() === "") {
            alert("ユーザー名が空白です。");
            return false;
        }
    
        if ($("*[name=email]").val() === "") {
            alert("Emailが空白です。");
            return false;
        }
        
        if ($("*[name=password]").val() === "") {
            alert("パスワードが空白です。");
            return false;
        }
                              
        var data = {
                'user_id': $("*[name=user_id]").val(),
                'user_name': $("*[name=user_name]").val(),
                'email': $("*[name=email]").val(),
                'password': $("*[name=password]").val(),
                'status': $("*[name=status]").val(),
                'memo': $("*[name=memo]").val(),
                'original_name': $("*[name=original_name]").val(),
                    };
                              
        submit_action('userupdate', data, 'update');
        
    });
    
    $("#search_reset").click(function() {
        $("*[name=user_name]").val('');
        $("*[name=email]").val('');
        $("*[name=password]").val('');
        $("*[name=status]").val(1);
        $("*[name=memo]").val('');
    });
    
    $("#submit_insert").click(function(event) {
        event.preventDefault();
                                     
        if ($("*[name=user_name]").val() === "") {
            alert("ユーザー名が空白です。");
            return false;
        }
                                     
        if ($("*[name=email]").val() === "") {
            alert("Emailが空白です。");
            return false;
        }
                                     
        if ($("*[name=password]").val() === "") {
            alert("パスワードが空白です。");
            return false;
        }
                              
        var data = {
                'user_id': $("*[name=user_id]").val(),
                'user_name': $("*[name=user_name]").val(),
                'email': $("*[name=email]").val(),
                'password': $("*[name=password]").val(),
                'status': $("*[name=status]").val(),
                'memo': $("*[name=memo]").val(),
                              };
                                     
        submit_action('userinsert', data, 'insert');
                                     
    });
}

if(document.URL.match(/..adminlist/)) {
    $("#submit_update").click(function(event) {
        event.preventDefault();
        
        if ($("*[name=admin_name]").val() === "") {
            alert("管理者名が空白です。");
            return false;
        }
    
        if ($("*[name=password]").val() === "") {
            alert("パスワードが空白です。");
            return false;
        }
                              
        var data = {
                'admin_id': $("*[name=admin_id]").val(),
                'admin_name': $("*[name=admin_name]").val(),
                'password': $("*[name=password]").val(),
                'status': $("*[name=status]").val(),
                'original_name': $("*[name=original_name]").val(),
                    };
                              
        submit_action('adminupdate', data, 'update');
        
    });
    
    $("#search_reset").click(function() {
        $("*[name=admin_name]").val('');
        $("*[name=password]").val('');
        $("*[name=status]").val(1);
        $("*[name=memo]").val('');
    });
    
    $("#submit_insert").click(function(event) {
        event.preventDefault();
                                     
        if ($("*[name=admin_name]").val() === "") {
            alert("管理者名が空白です。");
            return false;
        }
                                     
        if ($("*[name=password]").val() === "") {
            alert("パスワードが空白です。");
            return false;
        }
                              
        var data = {
                'admin_id': $("*[name=admin_id]").val(),
                'admin_name': $("*[name=admin_name]").val(),
                'password': $("*[name=password]").val(),
                'status': $("*[name=status]").val(),
                   };
                                     
        submit_action('admininsert', data, 'insert');
                                     
    });
}

if(document.URL.match(/..admindeleted/)) {
    $("#submit_update").click(function(event) {
        event.preventDefault();
        
        if ($("*[name=admin_name]").val() === "") {
            alert("管理者名が空白です。");
            return false;
        }
    
        if ($("*[name=password]").val() === "") {
            alert("パスワードが空白です。");
            return false;
        }
                              
        var data = {
                'admin_id': $("*[name=admin_id]").val(),
                'admin_name': $("*[name=admin_name]").val(),
                'password': $("*[name=password]").val(),
                'status': $("*[name=status]").val(),
                'original_name': $("*[name=original_name]").val(),
                    };
                              
        submit_action('adminupdate', data, 'update');
        
    });
}

if(document.URL.match(/..classlist/)) {
	// Add or Remove % value
	$("*[name$=grow]").blur(function() {
		$(this).val($(this).val() + '%');
	});
	
	$("*[name$=grow]").focus(function() {
		$(this).val($(this).val().replace(/%/g,''));
	});
	
    $("#submit_update").click(function(event) {
        event.preventDefault();
        
        if ($("*[name=class_rank]").val() === "") {
            alert("ランクが空白です。");
            return false;
        }
        
        if ($.isNumeric($("*[name=class_rank]").val()) === false) {
            alert("ランクが数値ではありません。");
            return false;
        }
    
        if ($("*[name=class_name]").val() === "") {
            alert("クラス名が空白です。");
            return false;
        }
        
        if ($("*[name=hp_val]").val() === "") {
            alert("HPが空白です。");
            return false;
        }
        
        if ($.isNumeric($("*[name=hp_val]").val()) === false) {
            alert("HPが数値ではありません。");
            return false;
        }
        
        if ($("*[name=str_val]").val() === "") {
            alert("STRが空白です。");
            return false;
        }
        
        if ($.isNumeric($("*[name=str_val]").val()) === false) {
            alert("STRが数値ではありません。");
            return false;
        }
        
        if ($("*[name=mag_val]").val() === "") {
            alert("MAGが空白です。");
            return false;
        }
        
        if ($.isNumeric($("*[name=mag_val]").val()) === false) {
            alert("MAGが数値ではありません。");
            return false;
        }
        
        if ($("*[name=skl_val]").val() === "") {
            alert("SKLが空白です。");
            return false;
        }
        
        if ($.isNumeric($("*[name=skl_val]").val()) === false) {
            alert("SKLが数値ではありません。");
            return false;
        }
        
        if ($("*[name=spd_val]").val() === "") {
            alert("SPDが空白です。");
            return false;
        }
        
        if ($("*[name=luk_val]").val() === "") {
            alert("LUKが空白です。");
            return false;
        }
        
        if ($.isNumeric($("*[name=luk_val]").val()) === false) {
            alert("LUKが数値ではありません。");
            return false;
        }
        
        if ($("*[name=def_val]").val() === "") {
            alert("DEFが空白です。");
            return false;
        }
        
        if ($.isNumeric($("*[name=def_val]").val()) === false) {
            alert("DEFが数値ではありません。");
            return false;
        }
        
        if ($("*[name=mdf_val]").val() === "") {
            alert("MDFが空白です。");
            return false;
        }
        
        if ($.isNumeric($("*[name=mdf_val]").val()) === false) {
            alert("MDFが数値ではありません。");
            return false;
        }
        
        if ($("*[name=bod_val]").val() === "") {
            alert("BODが空白です。");
            return false;
        }
        
        if ($.isNumeric($("*[name=bod_val]").val()) === false) {
            alert("BODが数値ではありません。");
            return false;
        }
        
        if ($("*[name=hp_grow]").val().replace(/%/g,'') === "") {
            alert("HP率が空白です。");
            return false;
        }
        
        if ($.isNumeric($("*[name=hp_grow]").val().replace(/%/g,'')) === false) {
            alert("HP率が数値ではありません。");
            return false;
        }
        
        if ($("*[name=str_grow]").val() === "") {
            alert("STR率が空白です。");
            return false;
        }
        
        if ($.isNumeric($("*[name=str_grow]").val().replace(/%/g,'')) === false) {
            alert("STR率が数値ではありません。");
            return false;
        }
        
        if ($("*[name=mag_grow]").val() === "") {
            alert("MAG率が空白です。");
            return false;
        }
        
        if ($.isNumeric($("*[name=mag_grow]").val().replace(/%/g,'')) === false) {
            alert("MAG率が数値ではありません。");
            return false;
        }
        
        if ($("*[name=skl_grow]").val() === "") {
            alert("SKL率が空白です。");
            return false;
        }
        
        if ($.isNumeric($("*[name=skl_grow]").val().replace(/%/g,'')) === false) {
            alert("SKL率が数値ではありません。");
            return false;
        }
        
        if ($("*[name=spd_grow]").val() === "") {
            alert("SPD率が空白です。");
            return false;
        }
        
        if ($.isNumeric($("*[name=spd_grow]").val().replace(/%/g,'')) === false) {
            alert("SPD率が数値ではありません。");
            return false;
        }
        
        if ($("*[name=luk_grow]").val() === "") {
            alert("LUK率が空白です。");
            return false;
        }
        
        if ($.isNumeric($("*[name=luk_grow]").val().replace(/%/g,'')) === false) {
            alert("LUK率が数値ではありません。");
            return false;
        }
        
        if ($("*[name=def_grow]").val() === "") {
            alert("DEF率が空白です。");
            return false;
        }
        
        if ($.isNumeric($("*[name=def_grow]").val().replace(/%/g,'')) === false) {
            alert("DEF率が数値ではありません。");
            return false;
        }
        
        if ($("*[name=mdf_grow]").val() === "") {
            alert("MDF率が空白です。");
            return false;
        }
        
        if ($.isNumeric($("*[name=mdf_grow]").val().replace(/%/g,'')) === false) {
            alert("MDF率が数値ではありません。");
            return false;
        }
        
        if ($("*[name=bod_grow]").val() === "") {
            alert("BOD率が空白です。");
            return false;
        }
        
        if ($.isNumeric($("*[name=bod_grow]").val().replace(/%/g,'')) === false) {
            alert("BOD率が数値ではありません。");
            return false;
        }
        
        var data = {
                'class_id': $("*[name=class_id]").val(),
                'class_rank': $("*[name=class_rank]").val(),
                'class_name': $("*[name=class_name]").val(),
                'hp_val': $("*[name=hp_val]").val(),
                'str_val': $("*[name=str_val]").val(),
                'mag_val': $("*[name=mag_val]").val(),
                'skl_val': $("*[name=skl_val]").val(),
                'spd_val': $("*[name=spd_val]").val(),
                'luk_val': $("*[name=luk_val]").val(),
                'def_val': $("*[name=def_val]").val(),
                'mdf_val': $("*[name=mdf_val]").val(),
                'bod_val': $("*[name=bod_val]").val(),
                'hp_grow': $("*[name=hp_grow]").val().replace(/%/g,''),
                'str_grow': $("*[name=str_grow]").val().replace(/%/g,''),
                'mag_grow': $("*[name=mag_grow]").val().replace(/%/g,''),
                'skl_grow': $("*[name=skl_grow]").val().replace(/%/g,''),
                'spd_grow': $("*[name=spd_grow]").val().replace(/%/g,''),
                'luk_grow': $("*[name=luk_grow]").val().replace(/%/g,''),
                'def_grow': $("*[name=def_grow]").val().replace(/%/g,''),
                'mdf_grow': $("*[name=mdf_grow]").val().replace(/%/g,''),
                'bod_grow': $("*[name=bod_grow]").val().replace(/%/g,''),
                'own_skl_id': $("*[name=own_skl_id]").val(),
                'playable': $("*[name=playable]").val(),
                'classchange_id': $("[name=classchange_id]").val(),
                'original_name': $("*[name=original_name]").val(),
                    };
         
        submit_action('classupdate', data, 'update');
        
    });
    
    $("#submit_insert").click(function(event) {
        event.preventDefault();
        
        if ($("*[name=class_rank]").val() === "") {
            alert("ランクが空白です。");
            return false;
        }
        
        if ($.isNumeric($("*[name=class_rank]").val()) === false) {
            alert("ランクが数値ではありません。");
            return false;
        }
    
        if ($("*[name=class_name]").val() === "") {
            alert("クラス名が空白です。");
            return false;
        }
        
        if ($("*[name=hp_val]").val() === "") {
            alert("HPが空白です。");
            return false;
        }
        
        if ($.isNumeric($("*[name=hp_val]").val().replace(/%/g,'')) === false) {
            alert("HPが数値ではありません。");
            return false;
        }
        
        if ($("*[name=str_val]").val() === "") {
            alert("STRが空白です。");
            return false;
        }
        
        if ($.isNumeric($("*[name=str_val]").val().replace(/%/g,'')) === false) {
            alert("STRが数値ではありません。");
            return false;
        }
        
        if ($("*[name=mag_val]").val() === "") {
            alert("MAGが空白です。");
            return false;
        }
        
        if ($.isNumeric($("*[name=mag_val]").val().replace(/%/g,'')) === false) {
            alert("MAGが数値ではありません。");
            return false;
        }
        
        if ($("*[name=skl_val]").val() === "") {
            alert("SKLが空白です。");
            return false;
        }
        
        if ($.isNumeric($("*[name=skl_val]").val().replace(/%/g,'')) === false) {
            alert("SKLが数値ではありません。");
            return false;
        }
        
        if ($("*[name=spd_val]").val() === "") {
            alert("SPDが空白です。");
            return false;
        }
        
        if ($.isNumeric($("*[name=spd_val]").val().replace(/%/g,'')) === false) {
            alert("SPDが数値ではありません。");
            return false;
        }
        
        if ($("*[name=luk_val]").val() === "") {
            alert("LUKが空白です。");
            return false;
        }
        
        if ($.isNumeric($("*[name=luk_val]").val().replace(/%/g,'')) === false) {
            alert("LUKが数値ではありません。");
            return false;
        }
        
        if ($.isNumeric($("*[name=luk_val]").val().replace(/%/g,'')) === false) {
            alert("LUKが数値ではありません。");
            return false;
        }
        
        if ($("*[name=def_val]").val() === "") {
            alert("DEFが空白です。");
            return false;
        }
        
        if ($.isNumeric($("*[name=def_val]").val().replace(/%/g,'')) === false) {
            alert("DEFが数値ではありません。");
            return false;
        }
        
        if ($("*[name=mdf_val]").val() === "") {
            alert("MDFが空白です。");
            return false;
        }
        
        if ($.isNumeric($("*[name=mdf_val]").val().replace(/%/g,'')) === false) {
            alert("MDFが数値ではありません。");
            return false;
        }
        
        if ($("*[name=bod_val]").val() === "") {
            alert("BODが空白です。");
            return false;
        }
        
        if ($.isNumeric($("*[name=bod_val]").val().replace(/%/g,'')) === false) {
            alert("BODが数値ではありません。");
            return false;
        }
        
        if ($("*[name=hp_grow]").val().replace(/%/g,'') === "") {
            alert("HP率が空白です。");
            return false;
        }
        
        if ($.isNumeric($("*[name=hp_grow]").val().replace(/%/g,'')) === false) {
            alert("HP率が数値ではありません。");
            return false;
        }
        
        if ($("*[name=str_grow]").val().replace(/%/g,'') === "") {
            alert("STR率が空白です。");
            return false;
        }
        
        if ($.isNumeric($("*[name=str_grow]").val().replace(/%/g,'')) === false) {
            alert("STR率が数値ではありません。");
            return false;
        }
        
        if ($("*[name=mag_grow]").val().replace(/%/g,'') === "") {
            alert("MAG率が空白です。");
            return false;
        }
        
        if ($.isNumeric($("*[name=mag_grow]").val().replace(/%/g,'')) === false) {
            alert("MAG率が数値ではありません。");
            return false;
        }
        
        if ($("*[name=skl_grow]").val().replace(/%/g,'') === "") {
            alert("SKL率が空白です。");
            return false;
        }
        
        if ($.isNumeric($("*[name=skl_grow]").val().replace(/%/g,'')) === false) {
            alert("SKL率が数値ではありません。");
            return false;
        }
        
        if ($("*[name=spd_grow]").val().replace(/%/g,'') === "") {
            alert("SPD率が空白です。");
            return false;
        }
        
        if ($.isNumeric($("*[name=spd_grow]").val().replace(/%/g,'')) === false) {
            alert("SPD率が数値ではありません。");
            return false;
        }
        
        if ($("*[name=luk_grow]").val().replace(/%/g,'') === "") {
            alert("LUK率が空白です。");
            return false;
        }
        
        if ($.isNumeric($("*[name=luk_grow]").val().replace(/%/g,'')) === false) {
            alert("LUK率が数値ではありません。");
            return false;
        }
        
        if ($("*[name=def_grow]").val().replace(/%/g,'') === "") {
            alert("DEF率が空白です。");
            return false;
        }
        
        if ($.isNumeric($("*[name=def_grow]").val().replace(/%/g,'')) === false) {
            alert("DEF率が数値ではありません。");
            return false;
        }
        
        if ($("*[name=mdf_grow]").val().replace(/%/g,'') === "") {
            alert("MDF率が空白です。");
            return false;
        }
        
        if ($.isNumeric($("*[name=mdf_grow]").val().replace(/%/g,'')) === false) {
            alert("MDF率が数値ではありません。");
            return false;
        }
        
        if ($("*[name=bod_grow]").val().replace(/%/g,'') === "") {
            alert("BOD率が空白です。");
            return false;
        }
        
        if ($.isNumeric($("*[name=bod_grow]").val().replace(/%/g,'')) === false) {
            alert("BOD率が数値ではありません。");
            return false;
        }
        
        var data = {
                'class_id': $("*[name=class_id]").val(),
                'class_rank': $("*[name=class_rank]").val(),
                'class_name': $("*[name=class_name]").val(),
                'hp_val': $("*[name=hp_val]").val(),
                'str_val': $("*[name=str_val]").val(),
                'mag_val': $("*[name=mag_val]").val(),
                'skl_val': $("*[name=skl_val]").val(),
                'spd_val': $("*[name=spd_val]").val(),
                'luk_val': $("*[name=luk_val]").val(),
                'def_val': $("*[name=def_val]").val(),
                'mdf_val': $("*[name=mdf_val]").val(),
                'bod_val': $("*[name=bod_val]").val(),
                'hp_grow': $("*[name=hp_grow]").val().replace(/%/g,''),
                'str_grow': $("*[name=str_grow]").val().replace(/%/g,''),
                'mag_grow': $("*[name=mag_grow]").val().replace(/%/g,''),
                'skl_grow': $("*[name=skl_grow]").val().replace(/%/g,''),
                'spd_grow': $("*[name=spd_grow]").val().replace(/%/g,''),
                'luk_grow': $("*[name=luk_grow]").val().replace(/%/g,''),
                'def_grow': $("*[name=def_grow]").val().replace(/%/g,''),
                'mdf_grow': $("*[name=mdf_grow]").val().replace(/%/g,''),
                'bod_grow': $("*[name=bod_grow]").val().replace(/%/g,''),
                'own_skl_id': $("*[name=own_skl_id]").val(),
                'playable': $("*[name=playable]").val(),
                'classchange_id': $("[name=classchange_id]").val(),
                'original_name': $("*[name=original_name]").val(),
                    };
         
        submit_action('classinsert', data, 'insert');
        
    });
}

if(document.URL.match(/..classdeleted/)) {
	// Add or Remove % value
	$("*[name$=grow]").blur(function() {
		$(this).val($(this).val() + '%');
	});
	
	$("*[name$=grow]").focus(function() {
		$(this).val($(this).val().replace(/%/g,''));
	});
	
    $("#submit_update").click(function(event) {
        event.preventDefault();
        
        if ($("*[name=class_rank]").val() === "") {
            alert("ランクが空白です。");
            return false;
        }
        
        if ($.isNumeric($("*[name=class_rank]").val()) === false) {
            alert("ランクが数値ではありません。");
            return false;
        }
    
        if ($("*[name=class_name]").val() === "") {
            alert("クラス名が空白です。");
            return false;
        }
        
        if ($("*[name=hp_val]").val() === "") {
            alert("HPが空白です。");
            return false;
        }
        
        if ($.isNumeric($("*[name=hp_val]").val()) === false) {
            alert("HPが数値ではありません。");
            return false;
        }
        
        if ($("*[name=str_val]").val() === "") {
            alert("STRが空白です。");
            return false;
        }
        
        if ($.isNumeric($("*[name=str_val]").val()) === false) {
            alert("STRが数値ではありません。");
            return false;
        }
        
        if ($("*[name=mag_val]").val() === "") {
            alert("MAGが空白です。");
            return false;
        }
        
        if ($.isNumeric($("*[name=mag_val]").val()) === false) {
            alert("MAGが数値ではありません。");
            return false;
        }
        
        if ($("*[name=skl_val]").val() === "") {
            alert("SKLが空白です。");
            return false;
        }
        
        if ($.isNumeric($("*[name=skl_val]").val()) === false) {
            alert("SKLが数値ではありません。");
            return false;
        }
        
        if ($("*[name=spd_val]").val() === "") {
            alert("SPDが空白です。");
            return false;
        }
        
        if ($("*[name=luk_val]").val() === "") {
            alert("LUKが空白です。");
            return false;
        }
        
        if ($.isNumeric($("*[name=luk_val]").val()) === false) {
            alert("LUKが数値ではありません。");
            return false;
        }
        
        if ($("*[name=def_val]").val() === "") {
            alert("DEFが空白です。");
            return false;
        }
        
        if ($.isNumeric($("*[name=def_val]").val()) === false) {
            alert("DEFが数値ではありません。");
            return false;
        }
        
        if ($("*[name=mdf_val]").val() === "") {
            alert("MDFが空白です。");
            return false;
        }
        
        if ($.isNumeric($("*[name=mdf_val]").val()) === false) {
            alert("MDFが数値ではありません。");
            return false;
        }
        
        if ($("*[name=bod_val]").val() === "") {
            alert("BODが空白です。");
            return false;
        }
        
        if ($.isNumeric($("*[name=bod_val]").val()) === false) {
            alert("BODが数値ではありません。");
            return false;
        }
        
        if ($("*[name=hp_grow]").val().replace(/%/g,'') === "") {
            alert("HP率が空白です。");
            return false;
        }
        
        if ($.isNumeric($("*[name=hp_grow]").val().replace(/%/g,'')) === false) {
            alert("HP率が数値ではありません。");
            return false;
        }
        
        if ($("*[name=str_grow]").val() === "") {
            alert("STR率が空白です。");
            return false;
        }
        
        if ($.isNumeric($("*[name=str_grow]").val().replace(/%/g,'')) === false) {
            alert("STR率が数値ではありません。");
            return false;
        }
        
        if ($("*[name=mag_grow]").val() === "") {
            alert("MAG率が空白です。");
            return false;
        }
        
        if ($.isNumeric($("*[name=mag_grow]").val().replace(/%/g,'')) === false) {
            alert("MAG率が数値ではありません。");
            return false;
        }
        
        if ($("*[name=skl_grow]").val() === "") {
            alert("SKL率が空白です。");
            return false;
        }
        
        if ($.isNumeric($("*[name=skl_grow]").val().replace(/%/g,'')) === false) {
            alert("SKL率が数値ではありません。");
            return false;
        }
        
        if ($("*[name=spd_grow]").val() === "") {
            alert("SPD率が空白です。");
            return false;
        }
        
        if ($.isNumeric($("*[name=spd_grow]").val().replace(/%/g,'')) === false) {
            alert("SPD率が数値ではありません。");
            return false;
        }
        
        if ($("*[name=luk_grow]").val() === "") {
            alert("LUK率が空白です。");
            return false;
        }
        
        if ($.isNumeric($("*[name=luk_grow]").val().replace(/%/g,'')) === false) {
            alert("LUK率が数値ではありません。");
            return false;
        }
        
        if ($("*[name=def_grow]").val() === "") {
            alert("DEF率が空白です。");
            return false;
        }
        
        if ($.isNumeric($("*[name=def_grow]").val().replace(/%/g,'')) === false) {
            alert("DEF率が数値ではありません。");
            return false;
        }
        
        if ($("*[name=mdf_grow]").val() === "") {
            alert("MDF率が空白です。");
            return false;
        }
        
        if ($.isNumeric($("*[name=mdf_grow]").val().replace(/%/g,'')) === false) {
            alert("MDF率が数値ではありません。");
            return false;
        }
        
        if ($("*[name=bod_grow]").val() === "") {
            alert("BOD率が空白です。");
            return false;
        }
        
        if ($.isNumeric($("*[name=bod_grow]").val().replace(/%/g,'')) === false) {
            alert("BOD率が数値ではありません。");
            return false;
        }
        
        var data = {
                'class_id': $("*[name=class_id]").val(),
                'class_rank': $("*[name=class_rank]").val(),
                'class_name': $("*[name=class_name]").val(),
                'hp_val': $("*[name=hp_val]").val(),
                'str_val': $("*[name=str_val]").val(),
                'mag_val': $("*[name=mag_val]").val(),
                'skl_val': $("*[name=skl_val]").val(),
                'spd_val': $("*[name=spd_val]").val(),
                'luk_val': $("*[name=luk_val]").val(),
                'def_val': $("*[name=def_val]").val(),
                'mdf_val': $("*[name=mdf_val]").val(),
                'bod_val': $("*[name=bod_val]").val(),
                'hp_grow': $("*[name=hp_grow]").val().replace(/%/g,''),
                'str_grow': $("*[name=str_grow]").val().replace(/%/g,''),
                'mag_grow': $("*[name=mag_grow]").val().replace(/%/g,''),
                'skl_grow': $("*[name=skl_grow]").val().replace(/%/g,''),
                'spd_grow': $("*[name=spd_grow]").val().replace(/%/g,''),
                'luk_grow': $("*[name=luk_grow]").val().replace(/%/g,''),
                'def_grow': $("*[name=def_grow]").val().replace(/%/g,''),
                'mdf_grow': $("*[name=mdf_grow]").val().replace(/%/g,''),
                'bod_grow': $("*[name=bod_grow]").val().replace(/%/g,''),
                'own_skl_id': $("*[name=own_skl_id]").val(),
                'playable': $("*[name=playable]").val(),
                'classchange_id': $("[name=classchange_id]").val(),
                'original_name': $("*[name=original_name]").val(),
                    };
         
        submit_action('classupdate', data, 'update');
        
    });
}

//common function
//close thickbox
$("#closetb").click(function() {
	tb_remove();
});
