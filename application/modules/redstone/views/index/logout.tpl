<div class="result-container">
	<h1>ログアウトしました。</h1>
	次回のご利用をお待ちしております。<br />
	<a href="{$base}/redstone/index/login">ログイン画面へ戻る</a>
</div>

<script>
	var mnt = 5;
	var url = "{$base}/redstone/index/login";
	function jumpPage(url) {
		location.href = url;
	}
	setTimeout("jumpPage(url)", mnt*1000);
</script>