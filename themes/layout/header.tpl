<!DOCTYPE HTML>
<html lang="ja">
<head>
  <base herf="{$base}">
  <meta http-equiv="Content-Type" content="application/json" charset="utf-8">
  <link rel="stylesheet" type="text/css" href="{$base}/themes/css/admin.css" media="all" /> 
  <link href="{$base}/themes/css/bootstrap.min.css" rel="stylesheet" media="screen" />
  <link rel="stylesheet" type="text/css" href="{$base}/themes/css/alertbox.css" media="all" />

  <title>{$title}</title>
</head>

<body>
<div class="navbar navbar-default">
	<div class="navbar-header">
		<a class="navbar-brand" href="{$base}/index/index">AoCHD.jp</a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="{$base}/index/maketeam">チームの作成</a></li>
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">内部情報表示<span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li><a href="{$base}/index/playerlist">内部レート</a></li>
				<li><a href="{$base}/index/today">今日のゲーム</a></li>
			</ul>
		</li>
		<li><a href="{$base}/index/beginner">初心者向け情報</a></li>
		<li><a href="http://ux.getuploader.com/aochd_2ch/" target="_blank">アップローダー</a></li>
		<li><a href="http://aoe2pro.com" target="_blank">ランキング</a></li>
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">管理画面<span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li><a href="{$base}/member/index">プレイヤーリスト</a></li>
				{if $member == true}<li role="presentation" class="divider"></li>
				<li><a href="{$base}/member/manual">マニュアル</a></li>
				<li role="presentation" class="divider"></li>
			    <li><a data-toggle="modal" href="#" id="player_create">プレイヤー新規登録</a></li>
			    <li><a href="{$base}/member/playerdeleted">削除済みプレイヤー</a></li>
			    <li><a href="{$base}/member/gamemanage">ゲームの修正</a></li>
			    <li><a href="{$base}/member/replaymanage">リプレイの管理</a></li>
			    <li><a href="{$base}/member/monthlyrateedit">今月のレート変更</a></li>
			    <li><a href="#" id="password_edit">パスワード変更</a></li>
			    <li role="presentation" class="divider"></li>
			    <li><a href="{$base}/member/logout">ログアウト</a></li>{/if}
			</ul>
		</li>
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">鯖管理専用<span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li><li><a href="{$base}/admin/index">インデックス</a></li>
				{if $admin == true}
					<li role="presentation" class="divider"></li>
					<li><a data-toggle="modal" href="#" id="update_insert">アップデート作成</a></li>
					<li><a href="{$base}/admin/updatelist">アップデート編集</a></li>
					<li><a href="{$base}/admin/deletedupdatelist">削除済みアップデート</a></li>
					<li><a href="{$base}/admin/closedgamemanage">ゲームの編集</a></li>
					<li><a data-toggle="modal" href="#" id="user_create">ユーザー作成</a></li>
					<li><a href="{$base}/admin/userlist">ユーザー編集</a></li>
					<li><a href="{$base}/admin/deleteduserlist">削除済みユーザー</a></li>
					<li role="presentation" class="divider"></li>
				    <li><a href="{$base}/admin/playerdownload">プレイヤー一括DL</a></li>
				    <li><a href="{$base}/admin/ratedownload">レート一括DL</a></li>
				    <li><a href="{$base}/admin/gamelogdownload">ゲームログ一括DL</a></li>
				    <li><a href="{$base}/admin/rateeditlogdownload">レート編集ログ一括DL</a></li>
				    <li><a href="{$base}/admin/userdownload">ユーザー一括DL</a></li>
				    <li><a href="{$base}/admin/usereditlogdownload">ユーザー編集ログ一括DL</a></li>
				    <li><a href="{$base}/admin/updatelogdownload">アップデートログ一括DL</a></li>
				    <li><a href="{$base}/admin/loginlogdownload">ログインログ一括DL</a></li>
				    <li role="presentation" class="divider"></li>
				    <li><a href="{$base}/admin/playerupload">プレイヤー一括アップロード</a></li>
				    <li><a href="{$base}/admin/rateupload">レート一括アップロード</a></li>
				    <li><a href="{$base}/admin/gamelogupload">ゲームログ一括アップロード</a></li>
				    <li><a href="{$base}/admin/rateeditlogupload">レート編集ログ一括アップロード</a></li>
				    <li><a href="{$base}/admin/userupload">ユーザー一括アップロード</a></li>
				    <li><a href="{$base}/admin/usereditlogupload">ユーザー編集ログ一括アップロード</a></li>
				    <li><a href="{$base}/admin/updatelogupload">アップデートログ一括アップロード</a></li>
				    <li><a href="{$base}/admin/loginlogupload">ログインログ一括アップロード</a></li>
			    {/if}
			</ul>
		</li>
		<li><a href="{$base}/index/about">サイト説明</a></li>
	</ul>
</div>
{include file=$playercreate}
{include file=$changepassword}
{include file=$createupdate}
{include file=$usercreate}<div id="userinit" name="{$usercreate}"></div>