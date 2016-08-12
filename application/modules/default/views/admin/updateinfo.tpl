<div class="modal" id="update-edit">
	<div class="modal-dialog">
		<div class="modal-content window-container">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			    <h4 class="modal-title">アップデート情報編集</h4>
			</div>
			
			<div class="modal-body">
			    <form id="edit-updateedit" method="post">
			        <fieldset>
						<div class="form-group">
		                    <label for="updatelog_id" class="col-sm-3 control-label">ID： </label>
		                    <div class="col-sm-9">
		                    	<input class="form-control text-right" type="text" name="updatelog_id" readonly size="20">
							</div>
						</div>
						
						<div class="form-group">
		                    <label for="memo" class="col-sm-3 control-label">内容</label>
		                    <div class="col-sm-9">
		                    	<textarea class="form-control" name="update_note" rows="5" cols="45" wrap="soft" id="update_note"></textarea>
							</div>
						</div>

						<div class="form-group">
		                    <label for="delete_flag_update" class="col-sm-3 control-label">状態: </label>
		                    <div class="col-sm-9">
		                    	<select class="form-control" name="delete_flag_update">
		                            <option value="0">登録</option>
		                            <option value="1">削除</option>
		                        </select>
	                        </div>
	                        
						</div>

						<div class="form-group">
	                        <div class="pull-right col-sm-2"><input type="button" id="reset" class="btn btn-warning" value="リセット"></div>
						</div>
						<input type="hidden" name="token_update">
						<input type="hidden" name="action_tag_updateedit" value="updateedit">
			        </fieldset>
			    </form>
			</div>
			
		    <div class="modal-footer">
	  			<button id="update_change" type="button" class="btn btn-primary">送信</button>
	  			<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
  			</div>
  		</div>
    </div>
</div>

