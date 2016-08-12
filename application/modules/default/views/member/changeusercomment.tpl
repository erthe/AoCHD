<div class="modal" id="comment-edit">
	<div class="modal-dialog">
		<div class="modal-content window-container">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			    <h4 class="modal-title">自己紹介文変更</h4>
			</div>
			
			<div class="modal-body">
			    <form id="edit-comment" method="post">
			        <fieldset>
						<div class="form-group">
		                    <label for="user_id" class="col-sm-4 control-label">ID</label>
		                    <div class="col-sm-8">
		                    	<input class="form-control text-right" name="user_id_password" type="text" readonly size="20" />
	                    	</div>
						</div>
						
						<div class="form-group">
		                    <label for="user_name" class="col-sm-4 control-label">ユーザー名</label>
		                    <div class="col-sm-8">
		                    	<input class="form-control" name="user_name_password" type="text" readonly size="20" />
							</div>
						</div>
						
						<div class="form-group">
		                    <label for="password" class="col-sm-4 control-label">自己紹介文(一行)</label>
		                    <div class="col-sm-8">
		                    	<input class="form-control" type="text" name="change_user_comment" size="20" autofocus >
							</div>
						</div>
						
						<div class="form-group">
	                        <div class="pull-right col-sm-2"><input type="button" id="reset-changeusercomment" class="btn btn-warning" value="リセット"></div>
	                    </div>
	                    <input type="hidden" name="token" value="">
						<input type="hidden" name="action_tag" value="editcomment">
			        </fieldset>
			    </form>
		    </div>
		    
		    <div class="modal-footer">
	  			<button id="comment_update" type="button" class="btn btn-primary">送信</button>
	  			<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
	  		</div>
  		</div>
	</div>
</div>
<div id="data-container"></div>