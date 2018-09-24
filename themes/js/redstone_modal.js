// redstone function
$("#update_update").click(function () {
    if (news_check() != true) return false;
    var $form = $('#edit-update');
    var data = $form.serializeArray();

    var url = 'redstone/index/editnews';
    submit_action(url, data, null);
});

$("#member_update").click(function () {
    if (member_check() != true) return false;
    var $form = $('#edit-member');
    var data = $form.serializeArray();

    var url = 'redstone/index/editmember';
    submit_action(url, data, null);
});

$('#member_edit').click(function () {
    if (member_check() != true) return false;
    var $form = $('#member-edit');
    var data = $form.serializeArray();

    var url = 'redstone/member/editmember';
    submit_action(url, data, null);
});

$('#insert-img').on('click', function (evt) {
    var url = 'redstone/member/imageupload';
    winOpen(url, 600, 360);
    return false;
});

$('#insert-admin-img').click(function () {
    var url = 'redstone/member/imageadminupload';
    winOpen(url, 600, 360);
    return false;
});

$('#insert-thread-img').on('click', function (evt) {
    var url = 'redstone/communication/imageupload';
    winOpen(url, 600, 360);
    return false;
});

$('#insert-message-img').on('click', function (evt) {
    var url = 'redstone/communication/imageupload';
    winOpen(url, 600, 360);
    return false;
});

$("#thread-create").click(function () {
    if (thread_check() != true) return false;
    var $form = $('#create-thread');
    var data = $form.serializeArray();

    var url = 'redstone/communication/completecreatethread';
    submit_action(url, data, null);
});

$("#message-edit").click(function () {
    if (message_check() != true) return false;
    var $form = $('#edit-message');
    var data = $form.serializeArray();

    var url = 'redstone/communication/editmessage';
    submit_action(url, data, null);
});

$('#change-password').click(function () {
    if (member_check() != true) return false;
    var $form = $('#member-edit');
    var data = $form.serializeArray();

    var url = 'redstone/member/changepassword';
    submit_action(url, data, null);
});

$('#edit_password').click(function () {
    if (password_check() != true) return false;

    var $form = $('#password-edit');
    var data = $form.serializeArray();
    submit_action('redstone/member/editpassword', data, null);
});

$('#delete-img').click(function () {
    jConfirm('本当に画像を削除しますか?', '確認', function (r) {
        if (r === true) {
            if (member_check() != true) return false;
            var $form = $('#member-edit');
            var data = $form.serializeArray();

            submit_action('redstone/member/deleteimage', data, 'delete');
        } else {
            jAlert('はい。', '結果');
        }
    });
});

$('#admin_edit').click(function () {
    if (member_check() != true) return false;
    var $form = $('#admin-edit');
    var data = $form.serializeArray();

    var url = 'redstone/member/editadmin';
    submit_action(url, data, null);
});

$('#member_delete').click(function() {
    jConfirm('本当にメンバーを削除しますか?', '確認', function (r) {
        if (r === true) {
            if (member_check() != true) return false;
            var $form = $('#admin-edit');
            var data = $form.serializeArray();

            submit_action('redstone/member/deletemember', data, 'delete');
        } else {
            jAlert('はい。', '結果');
        }
    });
});

$('#init-password').click(function() {
    jConfirm('本当にパスワードを初期化しますか?', '確認', function (r) {
        if (r === true) {
            if (member_check() != true) return false;
            var $form = $('#admin-edit');
            var data = $form.serializeArray();

            submit_action('redstone/member/initpassword', data, null);
        } else {
            jAlert('はい。', '結果');
        }
    });
});

//common function
function news_check() {
    if (input_check('title', 'トピック') != true) return false;
    if (textarea_check('article', '内容') != true) return false;
    return true;
}

function member_check() {
    if (input_check('name', 'キャラクター名') != true) return false;
    if (input_check('title', '名称(自称)') != true) return false;
    if (textarea_check('self_introduction', '自己紹介') != true) return false;

    return true;
}

function thread_check() {
    if (input_check('title', 'タイトル') != true) return false;
    if (textarea_check('message', 'メッセージ') != true) return false;

    return true;
}

function message_check() {
    if (textarea_check('message', 'メッセージ') != true) return false;

    return true;
}

function date_check(datetime, message) {
    date = $('[name=' + datetime + ']').val().split(' ')[0];
    if (date != null) {
        if (dateValidate(date) != true) {
            alert(message + 'が日付ではありません。');
            return false;
        } else {
            return true;
        }
    }
}

function time_check(datetime, message) {
    time = $('[name=' + datetime + ']').val().split(' ')[1];

    if (time === undefined) {
        alert('フォーマットが違います。');
        return false;
    }

    if (timeValidate(time) != true) {
        alert(message + 'が時間ではありません。');
        return false;
    } else {
        return true;
    }
}

function upload_check() {
    var fileCheck = $('#file-input').val().length;
    if (fileCheck == 0) {
        jAlert('ファイルが選択されていません。', '注意');
        return false;
    }

    return true;
}

function password_check() {
    if (input_check('password', 'パスワード') != true) return false;
    if (input_check('retype', 'パスワード再入力') != true) return false;
    if (equal_check('password', 'retype', 'パスワード') != true) return false;

    return true;
}