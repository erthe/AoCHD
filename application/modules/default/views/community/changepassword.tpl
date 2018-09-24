<div class="modal-content">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="modal-title">パスワード変更</h4>
	</div>

	<div class="modal-body">
		<form id="stream-password" method="post">
			<fieldset>
				<div class="form-group">
					<label for="change_password2" class="col-sm-4 control-label">パスワード</label>
					<div class="col-sm-8">
						<input class="form-control" type="password" name="change_password2" autofocus />
					</div>
				</div>

				<div class="form-group">
					<label for="retype2" class="col-sm-4 control-label">パスワード再入力</label>
					<div class="col-sm-8">
						<input class="form-control" type="password" name="retype2">
					</div>
				</div>

				<div class="form-group">
					<div class="pull-right col-sm-2"><input type="reset"  class="btn btn-warning" value="リセット"></div>
				</div>
				<input type="hidden" name="token" value="{$token}">
				<input type="hidden" name="action_tag" value="changepassword">
			</fieldset>
		</form>
	</div>

	<div class="modal-footer">
		<button id="password_stream" type="button" class="btn btn-primary">送信</button>
		<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
	</div>
</div>
<div id="data-container"></div>
<script src="{$base}/themes/js/append.js"></script>
