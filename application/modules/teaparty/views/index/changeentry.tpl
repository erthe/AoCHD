<div class="modal-content">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	    <h4 class="modal-title">参加者情報編集</h4>
	</div>
	
	<div class="modal-body">
	    <form id="edit-member" class="form-horizontal" method="post">
	        <fieldset>
				<div class="form-group">
                    <label for="entry_name" class="col-sm-3 control-label">呼ばれ方: </label>
                    <div class="col-sm-9">
                    	<input type="text" class="form-control" name="entry_name" size="20" value="{$member.entry_name|escape}">
	                </div>
                </div>
				
				{if $admin == 1}
					<div class="form-group">
	                    <label for="twitter_id" class="col-sm-3 control-label">TwitterID: </label>
	                    <div class="col-sm-9">
	                    	<input type="text" class="form-control" name="twitter_id" size="20" value="{$member.twitter_id|escape}">
		                </div>
	                </div>
                {/if}
				
				<div class="form-group">
                    <label for="screen_name" class="col-sm-3 control-label">スクリーンネーム: </label>
                    <div class="col-sm-9">
                    	<input type="text" class="form-control" name="screen_name" size="20" value="{$member.screen_name|escape}">
	                </div>
                </div>
                
                <div class="form-group">
                    <label for="show_flag" class="col-sm-3 control-label">スクリーンネーム表示: </label>
                    <div class="col-sm-9">
                    	<select class="form-control" name="show_flag">
                            <option value="0" {if $member.show_flag == 0} selected{/if}>表示しない</option>
                            <option value="1" {if $member.show_flag == 1} selected{/if}>表示する</option>
                        </select>
					</div>
                </div>
                
                <div class="form-group">
                	<label for="interest" class="col-sm-3 control-label">興味: </label>
                    <div class="col-sm-9">
                    	<input type="text" name="interest" class="form-control" size="20" value="{$member.interest|escape}">
                	</div>
				</div>
				
                <div class="form-group">
                    <label for="self_introduction" class="col-sm-3 control-label">自己紹介: </label>
                    <div class="col-sm-9">
                    	<textarea id='memo' class="form-control" name="self_introduction" rows="5" cols="45" wrap="soft">{$member.self_introduction|escape}</textarea>
					</div>
				</div>
				
				<div class="form-group">
                	<div class="pull-right col-sm-2"><input type="button" id="reset" class="btn btn-warning" value="リセット"></div>
                </div>
                <input type="hidden" name="token" value="{$token}">
				<input type="hidden" name="action_tag" value="tea_party">
	        </fieldset>
	    </form>
    </div>
    
    <div class="modal-footer">
		<button id="member_update" type="button" class="btn btn-primary">送信</button>
		<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
	</div>
</div>
<script type="text/javascript" src="themes/js/tea_party_modal.js"></script>