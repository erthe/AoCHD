<div class="modal" id="user-edit">
	<div class="modal-dialog">
		<div class="modal-content window-container">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			    <h4 class="modal-title">ユーザー情報編集</h4>
			</div>
			
			<div class="modal-body">
			    <form id="edit-user" method="post">
			        <fieldset>
						<div class="form-group">
		                    <label for="user_id" class="col-sm-3 control-label">ID： </label>
		                    <div class="col-sm-9">
		                    	<input class="form-control text-right" type="text" name="user_id" readonly size="20"">
							</div>
						</div>
						
						<div class="form-group">
		                    <label for="user_name" class="col-sm-3 control-label">ユーザー名: </label>
		                    <div class="col-sm-9">
		                    	<input type="text" class="form-control" name="user_name" size="20">
							</div>
						</div>
						
						<div class="form-group">
		                	<label for="user_name" class="col-sm-3 control-label">パスワード: </label>
		                    <div class="col-sm-9">
		                    	<input type="password" class="form-control" name="user_password" size="20"><input type="button" class="btn btn-info" id="md5" value="ハッシュ値変換">
							</div>
						</div>
						
						<div class="form-group">
		                    <label for="user_control" class="col-sm-3 control-label">権限: </label>
		                    <div class="col-sm-9">
		                    	<select class="form-control" name="user_control">
		                            <option value="host">ホスト</option>
		                            <option value="other">その他</option>
		                            <option value="administrator">管理者</option>
		                        </select>
	                        </div>
                        </div>

						<div class="form-group">
		                    <label for="delete_flag" class="col-sm-3 control-label">状態: </label>
		                    <div class="col-sm-9">
		                    	<select class="form-control" name="delete_flag">
		                            <option value="0">登録</option>
		                            <option value="1">削除</option>
		                        </select>
	                        </div>
	                        
	                        <div class="form-group">
							<div class="col-sm-3"></div>
					    	<div class="col-sm-9">
					    		<p class="help-block">プレイヤー名には「'」を使用しないで下さい。<br />
								「'」の代用として「_」を使用してください。<br />
								<span class="text-red">パスワードを変更したら必ずハッシュ値変換ボタンを押して下さい。</span></p>
							</div>
						</div>

						<div class="form-group">
	                        <div class="pull-right col-sm-2"><input type="button" id="reset" class="btn btn-warning" value="リセット"></div>
						</div>
						<input type="hidden" name="token">
						<input type="hidden" name="action_tag" value="useredit">
			        </fieldset>
			    </form>
			</div>
			
		    <div class="modal-footer">
	  			<button id="user_update" type="button" class="btn btn-primary">送信</button>
	  			<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
  			</div>
  		</div>
    </div>
</div>

