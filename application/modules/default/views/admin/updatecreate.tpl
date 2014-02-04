<div class="modal" id="update-insert">
	<div class="modal-dialog">
		<div class="modal-content window-container">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			    <h4 class="modal-title">アップデートログ作成</h4>
			</div>
			
			<div class="modal-body">
			    <form id="edit-update" method="post">
			        <fieldset>
						<div class="form-group">
		                    <label for="memo" class="col-sm-3 control-label">内容</label>
		                    <div class="col-sm-9">
		                    	<textarea class="form-control" name="memo" rows="5" cols="45" wrap="soft" id="content"></textarea>
							</div>
						</div>
						
						<div class="form-group">
                    		<div class="pull-right col-sm-2"><input type="reset" class="btn btn-warning" value="リセット"></div>
                    	</div>
                    	<input type="hidden" name="token"> 
						<input type="hidden" name="action_tag_update" value="init">
			        </fieldset>
			    </form>
		    </div>
		    
		    <div class="modal-footer">
      			<button id="update_update" type="button" class="btn btn-primary">送信</button>
      			<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
      		</div>
  		</div>
	</div>
</div>