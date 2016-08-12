<!DOCTYPE HTML>
<html lang="ja">
<head>
  <base href="{$base}">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
  <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
  <link rel="stylesheet" type="text/css" href="themes/css/tea_party.css" media="all" /> 
  <link href="themes/css/bootstrap.min.css" rel="stylesheet" media="screen" />
  <link rel="stylesheet" type="text/css" href="themes/css/alertbox.css" media="all" />
  <link rel="stylesheet" type="text/css" href="themes/css/common.css" media="all" /> 
  <title>{$title}</title>
</head>

<div class="page-header">
	<h1>お茶会情報<small>一杯の紅茶の為なら世界など滅びてもいい</small></h1>
</div>
{if $info.status == 0}<div class="text-red">この回は終了しました。ご参加ありがとうございました。</div>{/if}
<div class="jumbotron">
    <h2>第{$party_times}回お茶会参加者一覧</h2>
    開催日: {if isset($info.start_datetime) && $info.start_datetime != "0000-00-00 00:00:00"}{$info.start_datetime|date_format:"%Y年%m月%d日 %H時%M分"}〜(自由解散){else}現在調整中です{/if}<br />
    集合場所: {if isset($info.place) && $info.place != ""}{$info.place}{else}現在調整中です。{/if}<br />
    {$info.description}
</div>

{if $participants|@count > 0}
	<a id="how_edit_info" class="left-space">自分の情報の編集方法</a><br />
    <span class="left-space">参加者は{$participants|@count} 人です。</span><br />
    <div class="col-xs-12">
    {$i = 0}
    	{foreach item=item from=$participants}
			<div id="member_{$i}" class="panel panel-info panel-header-padding-kill col-xs-12 col-md-6">
				<div class="panel-heading panel-header-position">
					<span class="col-xs-10">呼ばれ方: <span class="text-itaric text-bold">{$item.entry_name|escape}</span></span>		
					<span class="col-xs-2 text-right">
						{if $name == $item.screen_name|escape}<img src="themes/images/edit.png" alt="edit" id="edit_{$item.tea_party_id|escape}" />{/if}
						{if $admin == 1}<img src="themes/images/attention.gif" alt="admin_edit" id="edit_{$item.tea_party_id|escape}" />{/if}
					</span>
				</div>
				<ul class="list-group">
					<li class="list-group-item col-xs-12">
						<span class="col-xs-4">スクリーンネーム</span>
						<span class="col-xs-8">{if $item.show_flag == 1}{$item.screen_name|escape}{else}非公開{/if}</span>
					</li>
					<li class="list-group-item col-xs-12">
						<span class="col-xs-4">興味</span>
						<span class="col-xs-8">{$item.interest|escape}</span>
					</li>
					<li class="list-group-item col-xs-12">
						<span class="col-xs-4">自己紹介</span>
						<span class="col-xs-8">{$item.self_introduction|escape}</span>
					</li>
				</ul>
			</div>
			{if $i % 2 == 1}
				<div class="col-xs-12"></div>
			{/if}
			{$i = $i + 1}
    	{/foreach}
    </div>
{else}
    現在、お茶会参加者は居ません。
{/if}

<div class="col-xs-12"></div>
<div class="panel panel-info panel-header-padding-kill col-xs-12">
    <div class="panel-heading panel-header-position">
        <h4 class="panel-title">ローカルに保存</h4>
    </div>
    <ul class="list-group col-xs-12">
    	<li class="list-group-item">
    		<a href="teaparty/index/saveimage" target="_blank">ローカルに保存</a><br />
    		PCの場合はPDF、スマートフォンの場合は画像として表示されるので、必要な場合は各自保存をお願いします。
    	</li>
   	</ul>
</div>
<div class="panel panel-info panel-header-padding-kill col-xs-12">
    <div class="panel-heading panel-header-position">
        <h4 class="panel-title">メニュー</h4>
    </div>
    <ul class="list-group col-xs-12">
    	{if $admin == 1}
    		<li class="list-group-item">
    			<a id="new"><img src="themes/images/information.png" alt="新規登録">新規登録する</a>
    		</li>
    		
    		{if $info.status != 0}
	    		<li class="list-group-item">
	    			<a id="close_party"><img src="themes/images/information.png" alt="お茶会終了">お茶会を終了する</a>
	    		</li>
	   		{/if}
    		
    		<li class="list-group-item">
    			<a id="create_party"><img src="themes/images/edit.png" alt="お茶会新規登録">お茶会を追加する</a>
    		</li>
    		
    		<li class="list-group-item">
    			<a id="party_edit"><img src="themes/images/edit.png" alt="お茶会情報編集">お茶会情報を編集する</a>
    		</li>
    		
    		<li class="list-group-item">
    			<div class="window-container"></div>
    		</li>
    	{/if}
    	
    	<li>  
			<form id="party-times" class="form-inline">
				<div class="form-group>
    				<label for="tea_party_times">回数移動</label>
    				<input class="form-group text-right" type="number" name="tea_party_times" min="1" max="{$max_party}" value="{$party_times}">
	    			<input type="hidden" name="token" value="{$token}">
					<input type="hidden" name="action_tag" value="party_times">
    				<button id="select_party_times" type="button" class="form-group btn btn-primary">送信</button>
    				<input type="reset" class="form-group btn btn-warning" value="リセット">
    			</div>

			</form>
		</li>
    	
		<li class="list-group-item">
			<a href="teaparty/index/logout">ログアウトする</a>
    	</li>
   	</ul>
</div>
	
</div>
{include file=$modal}
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script type="text/javascript" src="themes/js/Library/bootstrap.min.js"></script>
<script type="text/javascript" src="themes/js/Library/alertbox.js"></script>
<script type="text/javascript" src="themes/js/Library/common.js"></script>
<script type="text/javascript" src="themes/js/tea_party.js"></script>
</body>
</html>