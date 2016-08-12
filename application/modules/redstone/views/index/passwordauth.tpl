<div class="result-container">
    <h3>ログインに成功しました。</h3>
    5秒後にインデックスページに移動します。
    <a href="{$base}/redstone/index/index">インデックスページに移動</a>
</div>

<script>
    loadingView(false);
    var mnt = 5;
    var url = '{$base}/redstone/index/index;'
    function jumpPage(url) {
        location.href = url;
    }
    setTimeout("jumpPage(url)", mnt*1000);
</script>