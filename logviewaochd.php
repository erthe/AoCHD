<!DOCTYPE html>
<html lang="ja">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<meta name="robots" content="noindex" />
<meta name="robots" content="noindex,nofollow,noarchive" />
<title>IRC Log</title>
</head>
<body>
<p>
日付別にログを参照。<br />
参照例: http://aochd.jp/logviewaochd.php?date=20140429<br />
パラメータ(?以降) に何も入れなかったら今日のログを取得しに行く。<br />
<br />
<?php
date_default_timezone_set('Asia/Tokyo');
if(!isset($_GET['date'])){
	$date = date('Ymd');
} else {
	$date = $_GET['date'];
}

$lines = file("/home/erthe/smart_irc_aoc/log/$date.txt");
foreach ($lines as $line_num => $line) {
    echo nl2br(htmlspecialchars($line));
}
?>

</p>
</body>
</html>
