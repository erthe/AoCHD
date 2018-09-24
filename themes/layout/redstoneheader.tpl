<!DOCTYPE HTML>
<html lang="ja">
<head>
    <base href="{$base}">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    {if isset($jsonp)}<meta http-equiv="Content_type" content="application/javascript" charset=utf-8>{else}<meta http-equiv="Content-Type" content="text/html" charset=utf-8>{/if}
    <link rel="stylesheet" type="text/css" href="themes/css/redstone.css" media="all" />
    <link href="themes/css/bootstrap.min.css" rel="stylesheet" media="screen" />
    <link rel="stylesheet" type="text/css" href="themes/css/alertbox.css" media="all" />
    <link rel="stylesheet" type="text/css" href="themes/css/common.css" media="all" />
    <title>{$title}</title>
</head>

<body>
<div class="navbar navbar-default navbar-fixed-top">
    <div class="navbar-header">
        <a class="navbar-brand" href="{$base}/redstone/">妖精帝國</a>
        <button type="button" class="navbar-toggle" data-toggle="collapse"
                data-target=".collapse-target">
            <span class="sr-only">Toggle navigation</span> <span
                    class="icon-bar"></span> <span class="icon-bar"></span> <span
                    class="icon-bar"></span>
        </button>

    </div>

    <div class="collapse navbar-collapse collapse-target">
        <ul class="nav navbar-nav">
            <li><a href="redstone/member/index">ギルドメンバー</a></li>
            <li><a href="redstone/trade/index">取引掲示板</a></li>
            <li><a href="redstone/communication/index">交流掲示板</a></li>
            <li><a href="redstone/index/logout">ログアウト</a></li>
        </ul>
    </div>
</div>
<div style="margin-bottom: 100px;"></div>