<!DOCTYPE HTML>
<html lang="ja">
<head>
  <base herf="{$base}">
  <meta http-equiv="Content-Type" content="application/json" charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../themes/css/admin.css" media="all" /> 
  <link href="../themes/css/bootstrap.min.css" rel="stylesheet" media="screen" />
  <link rel="stylesheet" type="text/css" href="../themes/css/alertbox.css" media="all" />

  <title>{$title}</title>
</head>

<body>
<div class="navbar navbar-default">
	<div class="navbar-header">
		<a class="navbar-brand" href="../index/index">AoCHD日本コミュニティ</a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="../index/maketeam">チームの作成</a></li>
		<li><a href="../index/playerlist">内部レート表示</a></li>
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">管理画面<span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li><a href="../member/index">プレイヤーリスト</a></li>
				{if $member == true}<li role="presentation" class="divider"></li>
				<li><a href="../member/manual">マニュアル</a></li>
				<li role="presentation" class="divider"></li>
			    <li><a data-toggle="modal" href="#" id="player_create">プレイヤー新規登録</a></li>
			    <li><a href="../member/playerdeleted">削除済みプレイヤー</a></li>
			    <li><a href="../member/gamemanage">ゲームの修正</a></li>
			    <li><a href="#" id="password_edit">パスワード変更</a></li>
			    <li role="presentation" class="divider"></li>
			    <li><a href="../member/logout">ログアウト</a></li>{/if}
			</ul>
		</li>
		<li><a href="http://ux.getuploader.com/aochd_2ch/" target="_blank">アップローダー</a></li>
		<li><a href="http://aoe2pro.com" target="_blank">ランキング</a></li>
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">鯖管理専用<span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li><li><a href="../admin/index">インデックス</a></li>
				{if $admin == true}
					<li role="presentation" class="divider"></li>
					<li><a data-toggle="modal" href="#update-insert">アップデート作成</a></li>
					<li><a href="../admin/closedgamemanage">ゲームの編集</a></li>
					<li><a data-toggle="modal" href="#" id="user_create">ユーザー作成</a></li>
					<li><a href="../admin/userlist">ユーザー編集</a></li>
					<li><a href="../admin/deleteduserlist">削除済みユーザー</a></li>
					<li role="presentation" class="divider"></li>
				    <li><a href="../admin/playerdownload">プレイヤー一括DL</a></li>
				    <li><a href="../admin/ratedownload">レート一括DL</a></li>
				    <li><a href="../admin/gamelogdownload">ゲームログ一括DL</a></li>
				    <li><a href="../admin/rateeditlogdownload">レート編集ログ一括DL</a></li>
				    <li><a href="../admin/userdownload">ユーザー一括DL</a></li>
				    <li><a href="../admin/usereditlogdownload">ユーザー編集ログ一括DL</a></li>
				    <li><a href="../admin/updatelogdownload">アップデートログ一括DL</a></li>
			    {/if}
			</ul>
		</li>
		<li><a href="../index/about">サイト説明</a></li>
	</ul>
</div>
{include file=$playercreate}
{include file=$changepassword}
{include file=$createupdate}
{include file=$usercreate}<div id="userinit" name="{$usercreate}"></div>