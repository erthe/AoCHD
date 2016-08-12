<div class="modal-content">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	    <h4 class="modal-title">お茶会情報編集</h4>
	</div>
	
	<div class="modal-body">
	    <form id="edit-party" class="form-horizontal" method="post">
	        <fieldset>
				<div class="form-group">
                    <label for="tea_party_times" class="col-sm-3 control-label">回数: </label>
                    <div class="col-sm-9">
                    	<input type="text" class="form-control" name="tea_party_times" size="20" value="{$times|escape}" readonly />
	                </div>
                </div>
				
				<div class="form-group">
                    <label for="start_datetime" class="col-sm-3 control-label">開始日時: </label>
                    <div class="col-sm-9">
                    	<input type="text" class="form-control" name="start_datetime" size="20" value="{$info.start_datetime|escape}">
	                </div>
                </div>
				
				<div class="form-group">
                    <label for="place" class="col-sm-3 control-label">場所: </label>
                    <div class="col-sm-9">
                    	<input type="text" class="form-control" name="place" size="20" value="{$info.place|escape}">
	                </div>
                </div>
                
                <div class="form-group">
                    <label for="description" class="col-sm-3 control-label">説明: </label>
                    <div class="col-sm-9">
                    	<input type="text" class="form-control" name="description" size="20" value="{$info.description|escape}">
					</div>
                </div>
				
				<div class="form-group">
                	<div class="pull-right col-sm-2"><input type="button" id="reset" class="btn btn-warning" value="リセット"></div>
                </div>
                <input type="hidden" name="token" value="{$token}">
				<input type="hidden" name="action_tag" value="party_info">
	        </fieldset>
	    </form>
    </div>
    
    <div class="modal-footer">
		<button id="party_update" type="button" class="btn btn-primary">送信</button>
		<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
	</div>
</div>
<script "text/javascript" src="{$base}/themes/js/Library/jquery.dateValidate.js"></script>
<script "text/javascript" src="{$base}/themes/js/Library/jquery.timeValidate.js"></script>
<script type="text/javascript" src="themes/js/tea_party_modal.js"></script>