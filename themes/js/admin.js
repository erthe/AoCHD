$(document).ready(function(){
                  
    $(window).bind("load", function(){
        // initial function(common method)
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
             
        if(document.URL.match(/..userdeleted/)) {
            $(".revert").click(function() {
                var id = $(this).parent('td').attr('id');
                delrev_check('復元', 'user', 'revert', id);
            });
        }
        
        if(document.URL.match(/..adminlist/)) {
            $("#search_reset").click(function() {
                window.location = "skilllist";
            });
            
            $(".delete").click(function() {
                var id = $(this).parent('td').attr('id');
                delrev_check('削除', 'admin', 'delete', id);
            });
        }
             
        if(document.URL.match(/..admindeleted/)) {
            $(".revert").click(function() {
                var id = $(this).parent('td').attr('id');
                delrev_check('復元', 'admin', 'revert', id);
            });
        }
        
        if(document.URL.match(/..classlist/)) {
        	$(function() {
        		//trごとのtdに番号を振ったclass(item1～)を指定
        		$("tr[id^=trno]").each(function () {
        			$(this).children().not('th').each(function (i) {
        				i = i+1;
        				$(this).addClass("item" + i);
        			});
        		});
        		//関数colorを作成
        		$.fn.color = function() {
        			return this.each(function() {
        				$(this).css('background-color', '#AFCFFF');
        			});
        		};
        		//行の背景色変更
        		$("tr[id^=trno]").mouseout(function() {
        			$(this).children().css('background-color', '');
        		});

        		//列の背景色変更
        		$("td.matrix").each(function() {
        			var selector = '.'+ $(this).attr('class');
        			$(this).hover(function(){
        				$(selector).color();
        				$(this).siblings().color();
        				//選択中のtdの背景色変更
        				$(this).css('background-color', '#A0C0F0');
        			},function(){
        				$(selector).css('background-color', '');
        				$(this).parent().css('background-color', '');
        			});
        		});
        	});

            $("#sort_reset").click(function() {
            	window.location = "classlist";
            });
            
            $("#sort_submit").click(function() {
                if ($("*[name=third_key]").val() != "Null") {
                    if ($("*[name=second_key]").val() === "Null") {
                    	alert("第二キーが指定されていません。");
                    	return false; 
                    }
                }
                
                if ($("*[name=fourth_key]").val() != "Null") {
                    if ($("*[name=third_key]").val() === "Null") {
                    	alert("第三キーが指定されていません。");
                    	return false; 
                    }
                }
                
                if ($("*[name=fifth_key]").val() != "Null") {
                    if ($("*[name=fourth_key]").val() === "Null") {
                    	alert("第四キーが指定されていません。");
                    	return false; 
                    }
                }
            });
            
            $(".delete").click(function() {
                var id = $(this).parent('td').attr('id');
                delrev_check('削除', 'class', 'delete', id);
            });
            
        }
        
        if(document.URL.match(/..classdeleted/)) {
            $(".revert").click(function() {
                var id = $(this).parent('td').attr('id');
                delrev_check('復元', 'class', 'revert', id);
            });
        }
        
        if(document.URL.match(/..skilllist/)) {
            $("#search_reset").click(function() {
                window.location = "skilllist";
            });
            
            $(".delete").click(function() {
                var id = $(this).parent('td').attr('id');
                delrev_check('削除', 'skill', 'delete', id);
            });
        }
             
        if(document.URL.match(/..skilldeleted/)) {
            $(".revert").click(function() {
                var id = $(this).parent('td').attr('id');
                delrev_check('復元', 'skill', 'revert', id);
            });
        }
        
        if(document.URL.match(/..itemlist/)) {
        	$("#input_reset").click(function() {
        		$("*[name=search_item_id]").val('');
        		$("*[name=search_item_name]").val('');
        		$("*[name=search_weapon_type]").val('99');
        		$("*[name=first_key]").val('item_id');
        		$("*[name=first_key_order]").val('asc');
        		$("*[name=second_key]").val('Null');
        		$("*[name=second_key_order]").val('asc');
        		$("*[name=third_key]").val('Null');
        		$("*[name=third_key_order]").val('asc');
        		$("*[name=fourth_key]").val('Null');
        		$("*[name=fourth_key_order]").val('asc');
        		$("*[name=fifth_key]").val('Null');
        		$("*[name=fifth_key_order]").val('asc');
            });
        	
        	$("#sort_reset").click(function() {
            	window.location = "itemlist";
            });
            
            $("#sort_submit").click(function() {
                if ($("*[name=third_key]").val() != "Null") {
                    if ($("*[name=second_key]").val() === "Null") {
                    	alert("第二キーが指定されていません。");
                    	return false; 
                    }
                }
                
                if ($("*[name=fourth_key]").val() != "Null") {
                    if ($("*[name=third_key]").val() === "Null") {
                    	alert("第三キーが指定されていません。");
                    	return false; 
                    }
                }
                
                if ($("*[name=fifth_key]").val() != "Null") {
                    if ($("*[name=fourth_key]").val() === "Null") {
                    	alert("第四キーが指定されていません。");
                    	return false; 
                    }
                }
            });
            
            $(".delete").click(function() {
                var id = $(this).parent('td').attr('id');
                delrev_check('削除', 'item', 'delete', id);
            });
        }
             
        if(document.URL.match(/..itemdeleted/)) {
            $(".revert").click(function() {
                var id = $(this).parent('td').attr('id');
                delrev_check('復元', 'item', 'revert', id);
            });
        }
    });
});

// common
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
                
            default:
            	$(".window-container").html(data);
            	close_window();
            	break;
			}
		},
		error: function ( XMLHttpRequest, textStatus, errorThrown ) {
			this;
			alert('Error : ' + errorThrown);
         	}
     	}
	);
}

function close_window() {
	setTimeout(function(){
		tb_remove();
		location.reload();
		return false;
	}, 5000);
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