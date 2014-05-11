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
		<li><a href="{$base}/team/maketeam">チームの作成</a></li>
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">内部情報表示<span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li><a href="{$base}/player/index">内部レート</a></li>
				<li><a href="{$base}/index/today">今日のゲーム</a></li>
				<li><a href="{$base}/vs/versus">VSプレイヤー</a></li>
			</ul>
		</li>
		<li><a href="{$base}/beginner/index">初心者向け情報</a></li>
		<li><a href="http://ux.getuploader.com/aochd_2ch/" target="_blank">アップローダー</a></li>
		<li><a href="http://aoe2pro.com" target="_blank">ランキング</a></li>
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">管理画面<span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li><a href="{$base}/user/index">プレイヤーリスト</a></li>
				{if $user == true}<li role="presentation" class="divider"></li>
				<li><a href="{$base}/user/manual/manual">マニュアル</a></li>
				<li role="presentation" class="divider"></li>
			    <li><a data-toggle="modal" href="#" id="player_create">プレイヤー新規登録</a></li>
			    <li><a href="{$base}/user/player/playerdeleted">削除済みプレイヤー</a></li>
			    <li><a href="{$base}/user/player/commentlist">コメントリスト</a></li>
			    <li><a href="{$base}/user/player/commentdeleted">削除済みコメント</a></li>
			    <li><a href="{$base}/user/game/gamemanage">ゲームの修正</a></li>
			    <li><a href="{$base}/user/game/replaymanage">リプレイの管理</a></li>
			    <li><a href="{$base}/user/player/monthlyrateedit">今月のレート変更</a></li>
			    <li><a href="#" id="password_edit">パスワード変更</a></li>
			    <li><a href="#" id="comment_edit">自己紹介変更</a></li>
			    <li role="presentation" class="divider"></li>
			    <li><a href="{$base}/user/index/logout">ログアウト</a></li>{/if}
			</ul>
		</li>
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">鯖管理専用<span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li><li><a href="{$base}/admin/index">インデックス</a></li>
				{if $admin == true}
					<li role="presentation" class="divider"></li>
					<li><a data-toggle="modal" href="#" id="update_insert">アップデート作成</a></li>
					<li><a href="{$base}/admin/update/updatelist">アップデート編集</a></li>
					<li><a href="{$base}/admin/update/deletedupdatelist">削除済みアップデート</a></li>
					<li><a href="{$base}/admin/gamelog/closedgamemanage">ゲームの編集</a></li>
					<li><a data-toggle="modal" href="#" id="user_create">ユーザー作成</a></li>
					<li><a href="{$base}/admin/user/userlist">ユーザー編集</a></li>
					<li><a href="{$base}/admin/user/deleteduserlist">削除済みユーザー</a></li>
					<li role="presentation" class="divider"></li>
				    <li><a href="{$base}/admin/maintenance/playerdownload">プレイヤー一括DL</a></li>
				    <li><a href="{$base}/admin/maintenance/ratedownload">レート一括DL</a></li>
				    <li><a href="{$base}/admin/maintenance/gamelogdownload">ゲームログ一括DL</a></li>
				    <li><a href="{$base}/admin/maintenance/rateeditlogdownload">レート編集ログ一括DL</a></li>
				    <li><a href="{$base}/admin/maintenance/userdownload">ユーザー一括DL</a></li>
				    <li><a href="{$base}/admin/maintenance/usereditlogdownload">ユーザー編集ログ一括DL</a></li>
				    <li><a href="{$base}/admin/maintenance/updatelogdownload">アップデートログ一括DL</a></li>
				    <li><a href="{$base}/admin/maintenance/loginlogdownload">ログインログ一括DL</a></li>
				    <li><a href="{$base}/admin/maintenance/playernotedownload">プレイヤーコメント一括DL</a></li>
				    <li role="presentation" class="divider"></li>
				    <li><a href="{$base}/admin/maintenance/playerupload">プレイヤー一括アップロード</a></li>
				    <li><a href="{$base}/admin/maintenance/rateupload">レート一括アップロード</a></li>
				    <li><a href="{$base}/admin/maintenance/gamelogupload">ゲームログ一括アップロード</a></li>
				    <li><a href="{$base}/admin/maintenance/rateeditlogupload">レート編集ログ一括アップロード</a></li>
				    <li><a href="{$base}/admin/maintenance/userupload">ユーザー一括アップロード</a></li>
				    <li><a href="{$base}/admin/maintenance/usereditlogupload">ユーザー編集ログ一括アップロード</a></li>
				    <li><a href="{$base}/admin/maintenance/updatelogupload">アップデートログ一括アップロード</a></li>
				    <li><a href="{$base}/admin/maintenance/loginlogupload">ログインログ一括アップロード</a></li>
				    <li><a href="{$base}/admin/maintenance/playernotupload">プレイヤーコメント一括アップロード</a></li>
			    {/if}
			</ul>
		</li>
		<li><a href="{$base}/index/about">サイト説明</a></li>
	</ul>
</div>
{include file=$playercreate}
{include file=$changepassword}
{include file=$changecomment}
{include file=$createupdate}
{include file=$usercreate}<div id="userinit" name="{$usercreate}"></div>