<!DOCTYLE HTML>
<html lang="ja">
<head>
    <base href="{$base}/">
    <meta http-equiv="content-Type" content="text/html" charset="utf-8">
    <link href="themes/css/bootstrap.min.css" type="text/css" rel="stylesheet" media="screen" />
    <link href="themes/css/redstone.css" type="text/css" rel="stylesheet" media="all" />
    <link href="themes/css/common.css" type="text/css" rel="stylesheet" mediae="all" />
    <title>{$title}</title>
</head>
<body>
<div class="window-container">
    <h4 class="modal-title">ギルドメンバー情報更新</h4>
    <div>キャラクター名を入力してください。</div>
    <form id="insert_client" class="inline">
        <fieldset>
            <div class="form-group">
                <label class="sr-only" for="name">キャラクター名</label>
                <input type="text" class="form-control" name="name" style="width: 300px; " placeholder="キャラクター名">
                <input type="text" name="dummy" style="display:none;">
                <input type="hidden" name="token" value="{$token}">
                <input type="hidden" name="action_tag" value="firstonly">
                <button type="button" id="client_insert" class="btn btn-primary">送信</button>
            </div>

        </fieldset>
    </form>
    <div id="data-container"></div>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script type="text/javascript" src="themes/js/Library/bootstrap.min.js"></script>
<script type="text/javascript" src="themes/js/Library/alertbox.js"></script>
<script type="text/javascript" src="themes/js/Library/common.js"></script>
<script type="text/javascript" src="themes/js/redstone.js"></script>
</body>
</html>