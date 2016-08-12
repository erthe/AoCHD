<div class="result-container">
    <h1>メンバー情報が更新されました。</h1>
    <p>ご協力ありがとうございます。5秒後にトップページに飛びます。</p>
    <a href="redstone/index/index">トップページ</a>
</div>

<script>
    var mnt = 5;
    url = "redstone/index/index";
    function jumpPage(url) {
        location.href = url;
    }
    setTimeout("jumpPage(url)", mnt*1000);
</script>