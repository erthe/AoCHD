$(document).ready(function(){
    $(window).bind("load", function() {
       $(".autolink").each(function() {
           $(this).html($(this).html().replace(/((http|https|ftp);\/\/[w?=&.\/-;#~%-]+(\w\s?&.\/;#~%"=-]*>))/g, '<a href="$1">$1</a>'));
       }) ;

        $('*[id^=profile_]').click(function() {
            var id = $(this).attr('id').split('_');
            var data = {'member_id': id[1]};

            submit_action('redstone/index/showprofile', data, null);
            $('#modal-window').modal();
            return false;
        });

        $('#create-news').click(function() {
            submit_action('redstone/index/createnews', null, null);
            $('#modal-window').modal();
            return false;
        });

        $('*[id^=edit-news]').click(function() {
            var id = $(this).attr('id').split("-");
            var data = {'id': id[2]};
            submit_action('redstone/index/createnews', data, null);
            $('#modal-window').modal();
            return false
        });

        $('#create-member').click(function(){
            submit_action('redstone/index/createmember', null, null);
            $('#modal-window').modal();
            return false;
        });

        if(document.URL.match(/..member/)) {
            $("#how_edit_info").click(function () {
                var url = 'redstone/member/howeditinfo';
                submit_action(url, null, null);
                $('#modal-window').modal();
            });

            $('#search-submit').click(function() {
                if (input_check('search_name', 'メンバー名') != true) return false;

                var $form = $('#member-search');
                var data = $form.serializeArray();

                submit_action('redstone/member/search', data, 'getdata');
                return false;
            });

            $('#search-reset').click(function() {
               location.reload();
            });

            $('*[id^=edit-member]').click(function () {
                var id = $(this).attr('id').split('-');
                var data = {'id': id[2]};
                submit_action('redstone/member/changemember', data, null);
                $('#modal-window').modal();
                return false;
            });

            $('*[id^=edit-admin]').click(function () {
                var id = $(this).attr('id').split('-');
                var data = {'id': id[2]};
                submit_action('redstone/member/changeadmin', data, null);
                $('#modal-window').modal();
                return false;
            });
        }

        if(document.URL.match(/..communication/)) {
            $('#communication_new').click(function() {
                submit_action('redstone/communication/createthread', null, null);
                $('#modal-window').modal();
                return false;
            });

            $('*[id^=reply-message]').click(function() {
                var id = $(this).attr('id').split('-');
                var data = {'id': id[2], 'parent_id': id[3], 'mode': 'reply'}
                submit_action('redstone/communication/changemessage', data, null);
                $('#modal-window').modal();
                return false;
            });

            $('*[id^=change-message]').click(function() {
                var id = $(this).attr('id').split('-');
                var data = {'id': id[2], 'mode': 'change'};
                submit_action('redstone/communication/changemessage', data, null);
                $('#modal-window').modal();
                return false;
            });

            $('*[id^=delete-message]').click(function() {
                var id = $(this).attr('id').split('-');
                var data = {'id': id[2]};
                jConfirm('メッセージを削除しますか?', '確認', function(r) {
                    if (r === true) {
                        submit_action('redstone/communication/deletemessage', data, 'refresh');
                        return false;
                    } else {
                        jAlert('はい。', '結果');
                    }

                });
            });
        }

        if(document.URL.match(/..passwordlogin/)) {
            $("#password_login").click(function() {
                if(password_login_check() != true) return false;

                var $form = $("#login-password");
                var data = $form.serializeArray();
                submit_action('redstone/index/passwordauth', data, 'update');
            });

            $("#forget_password").click(function() {
                submit_action('redstone/index/forgetpassword', null, null);
                $('#modal-window').modal();
                return false;
            })
        }

        if(document.URL.match(/..firstonly/)) {
            $('#client_insert').click(function() {
                if(input_check('name', 'キャラクター名') != true) return false;

                var $form = $('#insert_client');
                var data = $form.serializeArray();
                submit_action('redstone/index/namecheck', data, 'getdata');
            });
        }
    });
});

// common
function password_login_check() {
    if (input_check('name', 'キャラクター名') != true) return false;
    if (input_check('password', 'パスワード') != true) return false;

    return true;
}