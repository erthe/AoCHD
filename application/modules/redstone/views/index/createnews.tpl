<div class="modal-content">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title">ニュース作成</h4>
		</div>
			
		<div class="modal-body">
		    <form id="edit-update" method="post">
		        <fieldset>
					<div class="form-group">
						<label for="title" class="col-sm-3 control-label">トピック</label>
						<div class="col-sm-9">
							<input class="form-control" type="text" name="title" maxlength="255 " value="{$news.title}"  autofocus/>
						</div>
					</div>

					<div class="form-group">
						<label for="memo" class="col-sm-3 control-label">内容</label>
						<div class="col-sm-9">
							<textarea class="form-control" name="article" rows="5" cols="45" wrap="soft" id="content">{$news.article}</textarea>
						</div>
					</div>

					<div class="form-group">
						<div class="pull-right col-sm-2"><input type="reset" class="btn btn-warning" value="リセット"></div>
					</div>
					<input type="hidden" name="token" value="{$token}">
	                <input type="hidden" name="action_tag" value="guild_news">
		        </fieldset>
		    </form>
		  </div>
		    
		  <div class="modal-footer">
      			<button id="update_update" type="button" class="btn btn-primary">送信</button>
      			<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
      		  </div>
  	</div>
</div>
<script src="themes/js/redstone_modal.js"></script>