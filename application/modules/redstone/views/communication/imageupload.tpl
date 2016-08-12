<!DOCTYPE HTML>
<html lang="ja">
<head>
    <base href="http://aochd.jp">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="Content-Type" content="text/html" charset=utf-8>    <link rel="stylesheet" type="text/css" href="themes/css/redstone.css" media="all" />
    <link href="themes/css/bootstrap.min.css" rel="stylesheet" media="screen" />
    <link rel="stylesheet" type="text/css" href="themes/css/alertbox.css" media="all" />
    <link rel="stylesheet" type="text/css" href="themes/css/common.css" media="all" />
    <title>{$title}</title>
</head>

<body>
<div class="modal-content window-container">
    <div class="modal-header">
        <button type="button" class="close" name="close">&times;</button>
        <h4 class="modal-title">イメージアップロード</h4>
        画像ファイルのアップロードが行えます。
    </div>
    <div class="modal-body">
        <div class="form-container">
            <form method="post" enctype="multipart/form-data" action="redstone/communication/imageprocess">
                <div class="form-item">
                    <legend>画像ファイルを選択(GIF, JPEG, PNGのみ対応)</legend>
                    <label>ファイル</label> <input id="file-input" type="file" name="_file"><br />
                    <input type="hidden" name="token" value="{$token}">
                    <input type="hidden" name="action_tag" value="communication_image">
                </div>

                <div class="form-controller">
                    <button type="submit" id="img-upload" class="btn btn-primary">送信</button>
                </div>
            </form>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-default" name="close">閉じる</button>
    </div>
</div>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="themes/js/Library/bootstrap.min.js"></script>
<script type="text/javascript" src="themes/js/Library/alertbox.js"></script>
<script type="text/javascript" src="themes/js/Library/common.js"></script>
<script type="text/javascript" src="themes/js/redstone.js"></script>
<script type="text/javascript" src="themes/js/redstone_modal.js"></script>
<script>
    $('#img-upload').prop('disabled', true);
    $("#file-input").on('change', function(){
        $("#img-upload").prop('disabled', false);
    });

    $('*[name=close]').click(function() {
            window.open('about:blank','_self').close();
            return false;
    });
</script>
<div style="margin-bottom: 50px;"></div>
</body>
</html>