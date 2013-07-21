$(document).ready(function(){
                  
    $(window).bind("load", function(){

        if(document.URL.match(/..login/)) {
            $(".submit").click(function() {
                
                // login username null check
                if ($("#login_username").val() === "") {
                    alert("ログインユーザー名が空白です。");
                    return false; 
                }
                   
                // login password null check
                if ($("#login_password").val() === "") {
                    alert("ログインパスワードが空白です。");
                    return false;
                }
            });
                   
            $(".submit").keypress(function(e) {
                if (e.which == 13) {
                    // login username null check
                    if ($("#login_username").val() === "") {
                        alert("ログインユーザー名が空白です。");
                        return false;
                    }
                                      
                    // login password null check
                    if ($("#login_password").val() === "") {
                        alert("ログインパスワードが空白です。");
                        return false;
                    }
                }
            });
        }
         
        if(document.URL.match(/..userlist/)) {
            // init
            // get table's tr number
            var len = $("#tbl tbody").children().length;
            
            for (var i=1; i<len+1; i++) {
                eval("var trno_" + i +" = false;");
            }
                   
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
                   
            // search reset
            
            $("#search_reset").click(function() {
                window.location = "userlist";
            });
            
            
            // delete
            $(".delete").click(function() {
                // get user's id
                var id = $(this).parent('td').attr('id');
                
                jConfirm("本当にID: "+id+"のユーザーを削除しますか?", '削除確認', function(r) {
                    if (r === true) {
                         var data = {user_id:id};
                         
                         // delete action
                         $.ajax({
                            type: 'POST',
                            url: 'userdelete',
                            data: 'id='+id,
                            dataType: 'html',
                            timeout: 10000,  // 単位はミリ秒
                                
                            // 送信前
                            beforeSend: function(xhr, settings) {
                                // ボタンを無効化し、二重送信を防止
                                $(".delete").attr('disabled', true);
                            },
                            // 応答後
                            complete: function(xhr, textStatus) {
                                // ボタンを有効化し、再送信を許可
                                $(".delete").attr('disabled', false);
                            },
                                
                            success: function (data, dataType) {
                                jAlert('削除されました。', '結果');
                                location.reload();
                            },
                                
                            error: function ( XMLHttpRequest, textStatus, errorThrown ) {
                                this;
                                alert('Error : ' + errorThrown);
                                return false;
                            }
                        });
                         
                    } else {
                        jAlert('キャンセルされました。', '結果');
                    }
                    
                });
            return false;
            });
        }
             
        if(document.URL.match(/..userdeleted/)) {
            // delete
            $(".revert").click(function() {
                // get user's id
                var id = $(this).parent('td').attr('id');
                                      
                jConfirm("本当にID: "+id+"のユーザーを復元しますか?", '復元確認', function(r) {
                    if (r === true) {
                        var data = {user_id:id};
                                               
                        // revert action
                        $.ajax({
                            type: 'POST',
                            url: 'userrevert',
                            data: 'id='+id,
                            dataType: 'html',
                            timeout: 10000,  // 単位はミリ秒
                                                      
                            // 送信前
                            beforeSend: function(xhr, settings) {
                                // ボタンを無効化し、二重送信を防止
                                $(".delete").attr('disabled', true);
                            },
                            // 応答後
                            complete: function(xhr, textStatus) {
                            // ボタンを有効化し、再送信を許可
                               $(".delete").attr('disabled', false);
                            },
                                                      
                            success: function (data, dataType) {
                                jAlert('復元されました。', '結果');
                                location.reload();
                            },
                               
                            error: function ( XMLHttpRequest, textStatus, errorThrown ) {
                                this;
                                alert('Error : ' + errorThrown);
                                return false;
                            }
                        });
                                               
                    } else {
                         jAlert('キャンセルされました。', '結果');
                    }
                                               
                });
                               
            });
        }
    });
});
