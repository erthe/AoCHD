<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">配信情報削除確認</h4>
    </div>

    <div class="modal-body">
        <h1>本当に配信情報を削除しますか?</h1><br />
        <form id="confirm-delete">
            <fieldset>
                <input type="hidden" name="token" value="{$token}">
                <input type="hidden" name="action_tag" value="deleteconfirm">
            </fieldset>
        </form>

    </div>

    <div class="modal-footer">
        <button id="delete_confirm" type="button" class="btn btn-primary">送信</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
    </div>
</div>

<script>
	$('#delete_confirm').on('click', function () {
		var $form = $('#confirm-delete');
		var data = $form.serializeArray();

		var url = 'deleteinfo';
		submit_action(url, data, null);
		$('#modal-window').modal();
	});
</script>