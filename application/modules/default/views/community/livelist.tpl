<!DOCTYPE HTML>
<html lang="ja">
	<head>
		<base herf="{$base}">
		<meta http-equiv="Content-Type" content="application/json" charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" type="text/css" href="{$base}/themes/css/admin.css" media="all" />
		<!--[if lte IE 8]><script src="{$base}/themes/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="{$base}/themes/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="{$base}/themes/css/ie8.css" /><![endif]-->
		<link href="{$base}/themes/css/bootstrap.min.css" rel="stylesheet">
		<title>配信情報</title>
	</head>
	<body class="homepage">
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
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">コミュニティ<span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="{$base}/community/index">配信者一覧</a></li>
					<li><a id="stream-registor">配信登録</a></li>
					<li><a href="{$base}/community/livelist">ライブ配信一覧</a></li>
				</ul>
			</li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">初心者向け情報<span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="{$base}/beginner/index">初心者向け情報</a></li>
					<li><a href="{$base}/beginner/howtomaketeam">ゲームの立て方解説</a></li>
					<li><a href="{$base}/beginner/yaruoindex">やる夫まとめ</a></li>
					<li><a href="{$base}/beginner/ircsettings">IRC接続方法</a></li>
					<li><a href="{$base}/beginner/tssettings">TS設定方法</a></li>
				</ul>
			</li>
			<li><a href="http://ux.getuploader.com/aochd_2ch/" target="_blank">アップローダー</a></li>
    		<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">管理画面<span class="caret"></span></a>
				<ul class="dropdown-menu">
				<li><a href="{$base}/user/index">プレイヤーリスト</a></li>
				{if $user == true}
					<li role="presentation" class="divider"></li>
					<li><a href="{$base}/user/manual/manual">マニュアル</a></li>
					<li role="presentation" class="divider"></li>
					<li><a data-toggle="modal" href="#" id="player_create">プレイヤー新規登録</a></li>
					<li><a href="{$base}/user/player/playerdeleted">削除済みプレイヤー</a></li>
					<li><a href="{$base}/user/player/commentlist">コメントリスト</a></li>
					<li><a href="{$base}/user/player/commentdeleted">削除済みコメント</a></li>
					<li><a href="{$base}/user/game/gamemanage">ゲームの修正</a></li>
					<li><a href="{$base}/user/game/replaymanage">リプレイの管理</a></li>
					<li><a href="{$base}/user/player/monthlyrateedit">今月のレート変更</a></li>
					<li><a href="{$base}/user/analyze/index">分析情報</a></li>
					<li><a href="#" id="password_edit">パスワード変更</a></li>
					<li><a href="#" id="comment_edit">自己紹介変更</a></li>
					<li role="presentation" class="divider"></li>
					<li><a href="{$base}/user/index/logout">ログアウト</a></li>
				{/if}
				<li><li><a href="{$base}/admin/index">鯖管理者用インデックス</a></li>
				{if $controller == true}
					<li><a href="{$base}/admin/gamelog/closedgamemanage">ゲームの編集</a></li>
				{/if}
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
					<li><a href="{$base}/admin/maintenance/playernoteupload">プレイヤーコメント一括アップロード</a></li>
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

<div id="page-wrapper">
    <!-- Header -->
    <div id="header-wrapper">
        <div id="header" class="container">
            <div id="status"><header><h2><strong>AOC 配信情報</strong></h2></header></div>
        </div>
    </div>
    <div id="features-wrapper">
        <section class="container" id="streamList"></section>
        <div class="container" id="nameList"><b><a href="javascript:toggleNameList();">全配信者一覧</a></b></div>
    </div>
</div>

<!-- Scripts -->
<script src="{$base}/themes/js/jquery.min.js"></script>
<script src="{$base}/themes/js/Library/bootstrap.min.js"></script>
<script src="{$base}/themes/js/jquery.dropotron.min.js"></script>
<script src="{$base}/themes/js/skel.min.js"></script>
<script src="{$base}/themes/js/skel-viewport.min.js"></script>
<script src="{$base}/themes/js/util.js"></script>
<!--[if lte IE 8]><script src="{$base}/themes/js/ie/respond.min.js"></script><![endif]-->
<script src="{$base}/themes/js/main.js"></script>

{include file=$playercreate}
{include file=$changepassword}
{include file=$changecomment}
{include file=$createupdate}
{include file=$usercreate}<div id="userinit" name="{$usercreate}"></div>

<script>
    var caveList = {$cavetubers};
    var twitchList = {$twitchers};
	var mixerList = {$mixers};
	var youtubeList = {$youtubers};
    var noPhoto = '{$base}/themes/images/nophoto.jpg';
    {literal}
    var isChecking = 0;
    var interval = 30;
    var load = 1;
    var contentElement = null;
    var logElement = null;
    var statusElement = null;
    var nameListElement = null;
    var twitchUri = "";
    var xhr1 = null;
    var xhr2 = null;
	var xhrmixers = [];
	var xhryoutubes = [];

    Array.prototype.indexOf = function (search) {
        for (var i = 0; i < this.length; ++i) {
            if (this[i] == search)
                return i;
        }
        return -1;
    }
    Array.prototype.indexOfStream = function (search) {
        for (var i = 0; i < this.length; ++i) {
            if (this[i].stream_id == search)
                return i;
        }
        return -1;
    }

    function displayResults(isUpdate) {
        if (isChecking) {
            return;
        }

        var onlineList = "";
        var count = 0;
        load = 0;

        for (var i = 0; i < caveList.length; ++i) {
            if (caveList[i].active) {
                onlineList += '<div class="4u 12u(mobile)"><section><header><h3><a href="javascript:cOpenStream(' + i + ');">' + caveList[i].name + '</a></h3></header><a class="image stream" href="javascript:cOpenStream(' + i + ');"><img alt="" src="' + caveList[i].thumb + '"></a><p>' + caveList[i].views + '人が視聴中</p><p>' + caveList[i].title + '</p></section></div>';
                ++count;
            }
        }

        for (var i = 0; i < twitchList.length; ++i) {
            if (twitchList[i].active) {
                onlineList += '<div class="4u 12u(mobile)"><section><header><h3><a href="javascript:tOpenStream(' + i + ');">' + twitchList[i].name + '</a></h3></header><a class="image stream" href="javascript:tOpenStream(' + i + ');"><img alt="" src="' + twitchList[i].thumb + '"></a><p>' + twitchList[i].views + '人が視聴中</p><p>' + twitchList[i].title + '</p></section></div>';
                ++count;
            }
        }
		
		for (var i = 0; i < mixerList.length; ++i) {
            if (mixerList[i].active) {
                onlineList += '<div class="4u 12u(mobile)"><section><header><h3><a href="javascript:mOpenStream(' + i + ');">' + mixerList[i].name + '</a></h3></header><a class="image stream" href="javascript:mOpenStream(' + i + ');"><img alt="" src="' + mixerList[i].thumb + '"></a><p>' + mixerList[i].views + '人が視聴中</p><p>' + mixerList[i].title + '</p></section></div>';
                ++count;
            }
        }
		
		for (var i = 0; i < youtubeList.length; ++i) {
            if (youtubeList[i].active) {
                onlineList += '<div class="4u 12u(mobile)"><section><header><h3><a href="javascript:yOpenStream(' + i + ');">' + youtubeList[i].name + '</a></h3></header><a class="image stream" href="javascript:yOpenStream(' + i + ');"><img alt="" src="' + youtubeList[i].thumb + '"></a><p>' + youtubeList[i].title + '</p></section></div>';
                ++count;
            }
        }

        if (!count) {
            contentElement.innerHTML = '<div class="container">登録されたチャンネルの配信はありません。</div>';
        } else {
            contentElement.innerHTML = '<div class="row">' + onlineList + '</div>';
        }

        statusElement.innerHTML = '<header><h2><strong>AOC 配信情報</strong></h2></header>最終更新日時: ' + new Date().toLocaleString() + '<p><a class="btn btn-primary btn-lg" href="javascript:startUpdate(true);">手動更新</p>';
    }

    function updateCavelist(text) {
        var streamResult = text.match(/\<entry\>([\r\n]|.)*?\<\/entry\>/g);
        if (streamResult && !isChecking) {
            isChecking = true;
            for (var i = 0; i < caveList.length; ++i) {
                caveList[i].active = false;
            }

            for (var i = 0; i < streamResult.length; ++i) {
                var result = streamResult[i].match(/\<author\>([\r\n]\s|.)*?\<name\>([\r\n]|.)*?\<!\[CDATA\[(.*?)\]\]\>/);
                if (result && result.length == 4) {
                    var index = caveList.indexOfStream(result[3].toString());
                    if (index == -1) {
                        continue;
                    }

                    var name = result[3].toString();
                    result = streamResult[i].match(/\<ct:thumbnail_path\>\<!\[CDATA\[(.*?)\]\]\>\<\/ct:thumbnail_path\>/);
                    var thumb = result[1].toString();
                    if (thumb == 'http:/img/no_thumbnail_image.png') {
                        thumb = noPhoto;
                    }

                    result = streamResult[i].match(/\<title\>([\r\n]|.)*?\<!\[CDATA\[(.*?)\]\]\>/);
                    var title = result[2].toString();
                    result = streamResult[i].match(/\<ct:listener\>(.*?)\<\/ct:listener\>/);
                    var views = result[1].toString();

                    caveList[index].thumb = thumb;
                    caveList[index].title = title;
                    caveList[index].views = views;
                    caveList[index].active = true;
                }
            }
            isChecking = false;
        }
    }

    function updateTwitch(text) {
        eval('var response = ' + text);
        if (response && !isChecking) {
            isChecking = true;

            var streamResult = response.streams;
            for (var i = 0; i < streamResult.length; ++i) {
                var index = twitchList.indexOfStream(streamResult[i].channel.display_name);
                if (index == -1) {
                    continue;
                }

                twitchList[index].thumb = streamResult[i].preview.template.replace("{width}x{height}", "368x247");
                twitchList[index].title = streamResult[i].channel.status;
                twitchList[index].views = streamResult[i].viewers;
                twitchList[index].active = true;
            }
            isChecking = false;
        }
    }
	
	function updateMixer(array) {
		for (var i = 0, count = 0; i < mixerList.length; ++i) {
			if (array[i].readyState == 4 && array[i].status == 200 && !isChecking) {
				result = JSON.parse(array[i].responseText);
				isChecking = true;

				if (result.online == true) {
					var thumb = result.avatarUrl;
                    if (thumb == null) {
                        thumb = noPhoto;
                    }
					mixerList[i].thumb = thumb;
					mixerList[i].title = result.name;
					mixerList[i].views = result.viewersCurrent;
					mixerList[i].active = true;
				}
				
				isChecking = false;
			}
        }
    }
	
	function updateYoutube(items) {
		for (var i = 0, count = 0; i < youtubeList.length; ++i) {
			if (items[i].readyState == 4 && items[i].status == 200 && !isChecking) {
				result = JSON.parse(items[i].responseText);
				isChecking = true;
				
				if (result.items.length != 0) {
					if (result.items[0].snippet.liveBroadcastContent === "live") {
						youtubeList[i].thumb = result.items[0].snippet.thumbnails.medium.url;
						youtubeList[i].title = result.items[0].snippet.title;
						youtubeList[i].active = true;
					}
					
				}
			}
			isChecking = false;
        }
    }

    function startUpdate(isUpdate) {
        xhr1 = new XMLHttpRequest();
        xhr2 = new XMLHttpRequest();
		
        xhr1.onreadystatechange = checkUpdate();
        xhr1.open("GET", "http://aochd.jp/codata.php", true);
        xhr1.send();

        xhr2.onreadystatechange = checkUpdate();
        xhr2.open("GET", twitchUri, true);
        xhr2.setRequestHeader('Client-ID', 'jzkbprff40iqj646a697cyrvl0zt2m6');
        xhr2.send();
		
		for (var i = 0, count = 0; i < mixerList.length; ++i) {
			var xhr = new XMLHttpRequest();
			xhr.open("GET", 'https://mixer.com/api/v1/channels/' + mixerList[i].stream_id, true);
			xhr.send();
			xhrmixers[i] = xhr;
		}
		for (var i = 0, count = 0; i < youtubeList.length; ++i) {
			var xhr = new XMLHttpRequest();
			xhr.open("GET", 'https://www.googleapis.com/youtube/v3/search?part=snippet&channelId=' + youtubeList[i].stream_id + '&eventType=live&key=AIzaSyAJvAwRMILzY1TgJfoUtg-FstJ4NAGrP8s&type=video&eventType=live', true);
			xhr.send();
			xhryoutubes[i] = xhr;
		}
    }

    function checkUpdate() {
        if (xhr1 && xhr1.readyState == 4 && xhr1.status == 200 && xhr2 && xhr2.readyState == 4 && xhr2.status == 200) {
            updateCavelist(xhr1.responseText);
            updateTwitch(xhr2.responseText);
			updateMixer(xhrmixers);
			updateYoutube(xhryoutubes);
            displayResults(true);
            xhr1 = xhr2 = null;
			xhrmixers = [];
			xhryoutubes = [];
        } else {
            setTimeout(checkUpdate, 1000);
        }
    }

    function cOpenStream(id) {
        window.open('https://www.cavelis.net/live/' + caveList[id].stream_id);
    }

    function tOpenStream(id) {
        window.open('https://twitch.tv/' + twitchList[id].stream_id);
    }
	
	function mOpenStream(id) {
        window.open('https://mixer.com/' + mixerList[id].stream_id);
    }
	
	function yOpenStream(id) {
        window.open('https://www.youtube.com/channel/' + youtubeList[id].stream_id);
    }

    function toggleNameList() {
        var names = '<b><a href="javascript:toggleNameList();">全配信者一覧</a></b>';
        if (nameListElement.innerText.length == 6) {
            names += '<div class="nameHeader"><b>CaveTube</b></div><div class="nameBlock">';
            for (var i = 0, count = 0; i < caveList.length; ++i) {
                if (caveList[i].strean_id == 0) {
                    names += '<span><a href="https://www.cavelis.net/live/' + caveList[i].stream_id + '">' + caveList[i].name + '</a></span>';
                }
            }

            names += '</div><div class="nameHeader"><b>Twitch</b></div><div class="nameBlock">';
            for (var i = 0, count = 0; i < twitchList.length; ++i) {
                if (twitchList[i].stream_id == 1) {
                    names += '<span><a href="http://www.twitch.tv/' + twitchList[i].stream_id + '">' + twitchList[i].name + '</a></span>';
                }
            }
			
			names += '</div><div class="nameHeader"><b>Mixer</b></div><div class="nameBlock">';
            for (var i = 0, count = 0; i < mixerList.length; ++i) {
                if (mixerList[i].stream_id == 1) {
                    names += '<span><a href="https://mixer.com/' + mixerList[i].stream_id + '">' + mixerList[i].name + '</a></span>';
                }
            }
			
			names += '</div><div class="nameHeader"><b>YouTube</b></div><div class="nameBlock">';
            for (var i = 0, count = 0; i < youtubeList.length; ++i) {
                if (youtubeList[i].stream_id == 1) {
                    names += '<span><a href="https://www.youtube.com/channel/' + youtubeList[i].stream_id + '">' + youtubeList[i].name + '</a></span>';
                }
            }

            names += '</div>';
        }

        nameListElement.innerHTML = names;
    }

    function onLoad() {
        contentElement = document.getElementById('streamList');
        logElement = document.getElementById('log');
        statusElement = document.getElementById('status');
        nameListElement = document.getElementById('nameList');

        for (var i = 0, count = 0; i < twitchList.length; ++i) {
            twitchUri += ((++count == 1) ? 'https://api.twitch.tv/kraken/streams?channel=' : ',') + twitchList[i].stream_id;
        }

        isChecking = false;
        load = 1;

        startUpdate(true);
        setInterval(function () { startUpdate(true); }, interval * 1000);
    }

    window.addEventListener('DOMContentLoaded', function() {
        onLoad();
    }, false);
    {/literal}
</script>
<div class="modal" id="modal-window">
    <div class="modal-dialog" id="window-container">
    </div>
</div>
<div>
    <div class="navbar-header">
        <a class="navbar-brand" href="#">{$title}</a>
    </div>

    <p class="navbar-text pull-right">{$username}</p>
</div>
<script>
    document.body.scrollTop = document.documentElement.scrollTop = 0;
    {literal}
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-51138356-1', 'aochd.jp');
    ga('send', 'pageview');

    {/literal}
</script>
</html>
</body>
