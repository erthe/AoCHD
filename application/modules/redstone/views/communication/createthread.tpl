<div class="modal-content">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	    <h4 class="modal-title">新規スレッド作成</h4>
	</div>
	
	<div class="modal-body">
	    <form id="create-thread" class="form-horizontal" method="post">
	        <fieldset>
				<div class="form-group">
                    <label for="title" class="col-sm-3 control-label">タイトル</label>
                    <div class="col-sm-9">
                    	<input type="text" class="form-control" name="title" maxrength="255"  autofocus/>
	                </div>
                </div>
                
                <div class="form-group">
                    <label for="message" class="col-sm-3 control-label">メッセージ </label>
                    <div class="col-sm-9">
                    	<textarea id='memo' class="form-control" name="message" rows="5" cols="45" wrap="soft"></textarea>
					</div>
				</div>

				<div class="form-group">
					<div class="col-xs-12">
						<button type="button" id="insert-thread-img" class="btn btn-default">画像アップロード</button>
					</div>
				</div>
				
				<div class="form-group">
                	<div class="pull-right col-sm-2"><input type="reset" class="btn btn-warning" value="リセット"></div>
                </div>
                <input type="hidden" name="token" value="{$token}">
				<input type="hidden" name="action_tag" value="create_thread">
	        </fieldset>
	    </form>
    </div>
    
    <div class="modal-footer">
		<button id="thread-create" type="button" class="btn btn-primary">送信</button>
		<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
	</div>
</div>
<script type="text/javascript" src="themes/js/redstone_modal.js"></script>