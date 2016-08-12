<div class="modal-content">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	    <h4 class="modal-title">パスワード初期化完了</h4>
	</div>
	
	<div class="modal-body">
    	<h1>登録内容の更新に成功しました。</h1><br />
		ご登録頂いた内容を保存しました。 <br />
		{if isset($pwd)}該当メンバーの初期パスワードは{$pwd}です。<br />
			画面を閉じる前に教えてあげてくださいね。{/if}
	</div>
	
	<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal" onClick="jumpPage()">ページ更新</button>
	</div>
</div>

<script>
<!--
	function jumpPage() {
		var url = 'redstone/member/index/';
		location.href = url;
	}
//-->
</script>