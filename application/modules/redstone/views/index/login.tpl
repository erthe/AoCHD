<!DOCTYPE HTML>
<html lang="ja">
<head class="login">
	<base href="{$base}">
	<meta name="viewport" content="width=device-width, initial-scale=0.1, minimum-scale=1, maximum-scale=1, user-scalable=no">
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
	<link rel="stylesheet" type="text/css" href="/themes/css/redstone.css" media="all" />
	<link href="themes/css/bootstrap.min.css" rel="stylesheet" media="screen" />
	<link rel="stylesheet" type="text/css" href="themes/css/common.css" media="all" />
	<title>{$title}</title>
</head>
<body>
<div style="margin-left: auto; margin-right:auto; text-align:center; ">
	<img src="{$img}">
</div>
<div style="max-width: 360px; margin-left: auto; margin-right:auto;  margin-top:-100px; ">
	<div id="intro">
		<div style="padding:10px;">
			<div style="margin-top:50px; margin-bottom:50px; text-align: center;">
				<img src="themes/images/" width="268" height="78" alt="JAWHMロゴ" />
			</div>
			<div>
				<div id="jawhmbanner" style="margin-bottom:20px">メンバー専用ページにログインするためのサービスを選択してください。</div>
				<a class="button-login button jawhm" href="{$base}/redstone/index/passwordlogin">キャラ名とパスワードからログインする</a>
				<a class="button-login button google" href="{$google nofilter}">Google IDでログインする</a>
				<a class="button-login button facebook" href="{$facebook nofilter}">Facebook IDでログインする</a>
				<a class="button-login button twitter" href="{$twitter nofilter}">Twitter IDでログインする</a>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script type="text/javascript" src="themes/js/bootstrap.min.js"></script>
</body>
