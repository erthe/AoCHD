<div class="modal-content">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="modal-title">配信情報登録完了</h4>
	</div>

	<div class="modal-body">
		<h1>登録内容の更新に成功しました。</h1><br />
		ご登録頂いた内容を保存しました。 <br />
		{if isset($password)} あなたの配信管理用のパスワードは {$password} です。{/if}<br />
		ページを閉じる前に控えておいてください。
	</div>

	<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal" onClick="jumpPage()">ページ更新</button>
	</div>
</div>

<script>
	<!--
	function jumpPage() {
		var url = 'index';
		location.href = url;
	}
	//-->
</script>