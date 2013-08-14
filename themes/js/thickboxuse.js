// use to thickbox

// common function
// close thickbox
$("#closetb").click(function() {
    tb_remove();
});

// admin function
// edit function

if(document.URL.match(/..userlist/)) {
    // conversion md5
    $("#md5").click(function() {
        $("*[name=password]").val(MD5(($("*[name=password]").val())));
    });
    
    $("#submit_update").click(function(event) {
        // cancel transmit by html
        event.preventDefault();
        
        // submit check
        // user name null check
        if ($("*[name=user_name]").val() === "") {
            alert("ユーザー名が空白です。");
            return false;
        }
    
        // user name null check
        if ($("*[name=email]").val() === "") {
            alert("Emailが空白です。");
            return false;
        }
        
        // password null check
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
                              
        // submit action
        $.ajax({
            type: 'POST',
            url: 'userupdate',
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
               
               $(".form-container").html(data);
            },
            error: function ( XMLHttpRequest, textStatus, errorThrown ) {
                    this;
                    alert('Error : ' + errorThrown);
                }
            }
        );
        
        setTimeout(function(){
            tb_remove();
            location.reload();
        }, 5000);
        
    });
    
    // search reset
    $("#search_reset").click(function() {
        $("*[name=user_name]").val('');
        $("*[name=email]").val('');
        $("*[name=password]").val('');
        $("*[name=status]").val(1);
        $("*[name=memo]").val('');
    });
    
    $("#submit_insert").click(function(event) {
        // cancel transmit by html
        event.preventDefault();
                                     
        // submit check
        // user name null check
        if ($("*[name=user_name]").val() === "") {
            alert("ユーザー名が空白です。");
            return false;
        }
                                     
        // user name null check
        if ($("*[name=email]").val() === "") {
            alert("Emailが空白です。");
            return false;
        }
                                     
        // password null check
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
                                     
        // submit action
        $.ajax({
            type: 'POST',
            url: 'userinsert',
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
                $(".form-container").html(data);
            },
               
            error: function ( XMLHttpRequest, textStatus, errorThrown ) {
                this;
                alert('Error : ' + errorThrown);
            }
        });
                              
        setTimeout(function(){
            tb_remove();
            location.reload();
        }, 5000);
                                     
    });
}

if(document.URL.match(/..adminlist/)) {
    // conversion md5
    $("#md5").click(function() {
        $("*[name=password]").val(MD5(($("*[name=password]").val())));
    });
    
    $("#submit_update").click(function(event) {
        // cancel transmit by html
        event.preventDefault();
        
        // submit check
        // user name null check
        if ($("*[name=admin_name]").val() === "") {
            alert("管理者名が空白です。");
            return false;
        }
    
        // password null check
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
                              
        // submit action
        $.ajax({
            type: 'POST',
            url: 'adminupdate',
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
               
               $(".form-container").html(data);
            },
            error: function ( XMLHttpRequest, textStatus, errorThrown ) {
                    this;
                    alert('Error : ' + errorThrown);
                }
            }
        );
        
        setTimeout(function(){
            tb_remove();
            location.reload();
        }, 5000);
        
    });
    
    // search reset
    $("#search_reset").click(function() {
        $("*[name=admin_name]").val('');
        $("*[name=password]").val('');
        $("*[name=status]").val(1);
        $("*[name=memo]").val('');
    });
    
    $("#submit_insert").click(function(event) {
        // cancel transmit by html
        event.preventDefault();
                                     
        // submit check
        // user name null check
        if ($("*[name=admin_name]").val() === "") {
            alert("管理者名が空白です。");
            return false;
        }
                                     
        // password null check
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
                                     
        // submit action
        $.ajax({
            type: 'POST',
            url: 'admininsert',
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
                $(".form-container").html(data);
            },
               
            error: function ( XMLHttpRequest, textStatus, errorThrown ) {
                this;
                alert('Error : ' + errorThrown);
            }
        });
                              
        setTimeout(function(){
            tb_remove();
            location.reload();
        }, 5000);
                                     
    });
}

if(document.URL.match(/..admindeleted/)) {
    // conversion md5
    $("#md5").click(function() {
        $("*[name=password]").val(MD5(($("*[name=password]").val())));
    });
    
    $("#submit_update").click(function(event) {
        // cancel transmit by html
        event.preventDefault();
        
        // submit check
        // user name null check
        if ($("*[name=admin_name]").val() === "") {
            alert("管理者名が空白です。");
            return false;
        }
    
        // password null check
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
                              
        // submit action
        $.ajax({
            type: 'POST',
            url: 'adminupdate',
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
               
               $(".form-container").html(data);
            },
            error: function ( XMLHttpRequest, textStatus, errorThrown ) {
                    this;
                    alert('Error : ' + errorThrown);
                }
            }
        );
        
        setTimeout(function(){
            tb_remove();
            location.reload();
        }, 5000);
        
    });
}
