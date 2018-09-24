<div class="modal-content">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="modal-title">配信情報編集</h4>
	</div>

	<div class="modal-body">
		<form id="update-stream" class="form-horizontal" method="post">
			<fieldset>

				<div class="form-group">
					<label for="name" class="col-sm-3 control-label">IRC名: </label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="name" value="{$info.name}" autofocus/>
					</div>
				</div>

				<div class="form-group">
					<label for="stream_id" class="col-sm-3 control-label">配信者名: </label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="stream_id" value="{$info.stream_id}" />
					</div>
				</div>

				<div class="form-group">
					<label for="live_type" class="col-sm-3 control-label">ライブサイト: </label>
					<div class="col-sm-9">
						<select class="form-control" name="live_type">
							<option value="CaveTube" {if $info.live_type === 'CaveTube'}selected{/if}>CaveTube</option>
							<option value="Twitch" {if $info.live_type === 'Twitch'}selected{/if}>Twitch</option>
							<option value="Mixer" {if $info.live_type === 'Mixer'}selected{/if}>Mixer</option>
							<option value="YouTube" {if $info.live_type === 'YouTube'}selected{/if}>YouTube</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<div class="pull-right col-sm-2"><input type="reset"  class="btn btn-warning" value="リセット"></div>
				</div>
				<input type="hidden" name="token" value="{$token}">
				<input type="hidden" name="action_tag" value="changeinfo">
			</fieldset>
		</form>
	</div>

	<div class="modal-footer">
		<button id="stream-update" type="button" class="btn btn-primary">送信</button>
		<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
	</div>
</div>
<div id="data-container"></div>
<script>
	$('#stream-update').on('click', function () {
		if (stream_check() != true) return false;

		var $form = $('#update-stream');
		var data = $form.serializeArray();

		var url = 'editinfo';
		if (url.indexOf('playerdetail') == -1) {
			submit_action('../community/' + url, data, null);
		} else if (url.indexOf('playerdetail') == -1 && url.indexOf('index/index') != -1) {
			submit_action('../community/' + url, data, null);
		} else if (url.indexOf('playerdetail') != -1 && url.indexOf('index') != -1) {
			submit_action('../../../../community' + url, data, null);
		} else {
			submit_action('../../community/' + url, data, null);
		}
		$('#modal-window').modal();
	});

	function stream_check() {
		if (input_check('name', '配信者名') != true) return false;
		if (input_check('stream_id', '配信アドレス') != true) return false;
		if (input_check('title', '配信タイトル') != true) return false;
		return true;
	}

	$('#password_stream').on('click', function () {
		if (password_check3() != true) return false;

		var $form = $('#stream-password');
		var data = $form.serializeArray();

		var url = 'editinfo';
		if (url.indexOf('playerdetail') == -1) {
			submit_action('../community/' + url, data, null);
		} else if (url.indexOf('playerdetail') == -1 && url.indexOf('index/index') != -1) {
			submit_action('../community/' + url, data, null);
		} else if (url.indexOf('playerdetail') != -1 && url.indexOf('index') != -1) {
			submit_action('../../../../community' + url, data, null);
		} else {
			submit_action('../../community/' + url, data, null);
		}
		$('#modal-window').modal();
	});

	function password_check3() {
		if (input_check('change_password2', 'パスワード') != true) return false;
		if (length_check('change_password2', 'パスワード') != true) return false;
		if (input_check('retype2', 'パスワード再入力') != true) return false;
		if (equal_check('change_password2', 'retype2', 'パスワード') != true) return false;
		return true;
	}

</script>
