<div class="modal" id="player-edit">
	<div class="modal-dialog">
		<div class="modal-content window-container">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			    <h4 class="modal-title">プレイヤー情報編集</h4>
			</div>
			
			<div class="modal-body">
			    <form id="edit-player" class="form-horizontal" method="post">
			        <fieldset>
			            <div class="form-group">
		                    <label for="player_id_edit" class="col-sm-3 control-label">ID： </label>
		                    <div class="col-sm-9">
		                    	<input class="form-control text-right" type="text" name="player_id_edit" readonly size="20">
							</div>
						</div>
						
						<div class="form-group">
		                    <label for="steam_id_edit" class="col-sm-3 control-label">STEAM ID: </label>
		                    <div class="col-sm-9">
		                    	<input type="text" class="form-control text-right" name="steam_id_edit" size="20">
			                </div>
		                </div>
						
						<div class="form-group">
		                    <label for="player_name_edit" class="col-sm-3 control-label">プレイヤー名: </label>
		                    <div class="col-sm-9">
		                    	<input type="text" class="form-control" name="player_name_edit" size="20">
			                </div>
		                </div>
		                
		                <div class="form-group">
		                	<label for="rate_edit" class="col-sm-3 control-label">レート: </label>
		                    <div class="col-sm-3">
		                    	<input type="text" name="rate_edit" class="form-control text-right" size="20">
	                    	</div>
							
		                	<label for="previous_rate" class="col-sm-3 control-label">以前のレート: </label>
		                	<div class="col-sm-3">
		                    	<input type="text" name="previous_rate" class="form-control text-right" readonly size="20">
							</div>
		                </div>
		                
		                <div class="form-group">
		                    <label for="win" class="col-sm-3 control-label">勝利: </label>
		                    <div class="col-sm-3">
		                    	<input type="text" name="win" class="form-control text-right"  readonly size="20"">
		                    </div>
		                    <label for="lose" class="col-sm-3 control-label">敗北: </label>
		                    <div class="col-sm-3">
		                    	<input type="text" name="lose" class="form-control text-right" readonly size="20">
							</div>
						</div>
						
						<div class="form-group">
		                    <label for="warn_flag_edit" class="col-sm-3 control-label">警告: </label>
		                    <div class="col-sm-9">
		                    	<select class="form-control" name="warn_flag_edit">
		                            <option value="0">なし</option>
		                            <option value="1">警告</option>
		                        </select>
							</div>
		                </div>	
						
						<div class="form-group">
		                    <label for="delete_flag_edit" class="col-sm-3 control-label">状態: </label>
		                    <div class="col-sm-9">
		                    	<select class="form-control" name="delete_flag_edit">
		                            <option value="0">登録</option>
		                            <option value="1">削除</option>
		                        </select>
							</div>
		                </div>
		                
		                <div class="form-group">
		                    <label for="memo" class="col-sm-3 control-label">メモ: </label>
		                    <div class="col-sm-9">
		                    	<textarea id='memo_edit' class="form-control" name="memo_edit" rows="5" cols="45" wrap="soft"></textarea>
							</div>
						</div>
						
						<div class="form-group">
                        	<div class="pull-right col-sm-2"><input type="button" id="reset" class="btn btn-warning" value="リセット"></div>
                        </div>
                        <input type="hidden" name="token">
						<input type="hidden" name="action_tag" value="playeredit">
			        </fieldset>
			    </form>
		    </div>
		    
		    <div class="modal-footer">
      			<button id="player_update" type="button" class="btn btn-primary">送信</button>
      			<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
      		</div>
	    </div>
    </div>
</div>
<div id="data-container"></div>