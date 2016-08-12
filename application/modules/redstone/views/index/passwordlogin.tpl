<!DOCTYPE HTML>
<html lang="ja">
<head>
    <base href="{$base}">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <link rel="stylesheet" type="text/css" href="themes/css/redstone.css" media="all" />
    <link href="themes/css/bootstrap.min.css" rel="stylesheet" media="screen" />
    <link rel="stylesheet" type="text/css" href="themes/css/alertbox.css" media="all" />
    <link rel="stylesheet" type="text/css" href="themes/css/common.css" media="all" />
    <title>{$title}</title>
</head>

<body>
    <div style="max-width: 360px; margin-left: auto; margin-right:auto">
        <dis id="intro">
            <div style="margin-top:50px; margin-bottom: 50px; text-align: center; ">
                <img src={$img} alt="パスワードログインロゴ">
            </div>
            <div id="passwordauth" class="window-container">
                <form id="login-password">
                    <fieldset>
                        <div id="passwordbanner" style="margin-bottom: 20px;">
                            ギルドメンバー専用ページにログインします。<br />
                            登録されているキャラクター名とパスワードでログインしてください。
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="name">キャラクター名</label>
                            <input class="form-control" type="input" name="name" placeholder="キャラクター名">
                        </div>
                        <div class="form-group">
                            <lavel class="sr-only" for=""password">パスワード</lavel>
                            <input class="form-control" type="password" name="password" placeholder="パスワード">
                        </div>
                        <button type="button" id="password_login" class="btn btn-default">ログイン</button>
                    </fieldset>
                </form>
                <div class="div-padding">
                    <a data-toggle="collapse" data-parant="#$accordion" href="#forget">ログインできない方</a>
                    <div id="forget" class="panel-collapse collapse">
                        <div class="panel-body">
                            <button id="forget_password" type="button" class="btn btn-warning" style="width: 150px; ">パスワードを忘れた</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {include file=$modal}
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="themes/js/Library/bootstrap.min.js"></script>
    <script type="text/javascript" src="themes/js/Library/alertbox.js"></script>
    <script type="text/javascript" src="themes/js/Library/common.js"></script>
    <script type="text/javascript" src="themes/js/redstone.js"></script>
    <div style="margin-bottom: 50px;"></div>
</body>
</html>
