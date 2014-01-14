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
		                    <label for="player_id" class="col-sm-3 control-label">ID： </label>
		                    <div class="col-sm-9">
		                    	<input class="form-control text-right" type="text" name="player_id" readonly size="20">
							</div>
						</div>
							
						<div class="form-group">
		                    <label for="player_name" class="col-sm-3 control-label">プレイヤー名: </label>
		                    <div class="col-sm-9">
		                    	<input type="text" class="form-control" name="player_name" size="20">
			                </div>
		                </div>
		                
		                <div class="form-group">
		                	<label for="rate" class="col-sm-3 control-label">レート: </label>
		                    <div class="col-sm-3">
		                    	<input type="text" name="rate" class="form-control text-right" size="20">
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
		                    <label for="delete_flag" class="col-sm-3 control-label">状態: </label>
		                    <div class="col-sm-9">
		                    	<select class="form-control" name="delete_flag">
		                            <option value="0">登録</option>
		                            <option value="1">削除</option>
		                        </select>
							</div>
		                </div>
		                
		                <div class="form-group">
		                    <label for="memo" class="col-sm-3 control-label">メモ: </label>
		                    <div class="col-sm-9">
		                    	<textarea class="form-control" name="memo" rows="5" cols="45" wrap="soft"></textarea>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-3"></div>
					    	<div class="col-sm-9">
					    		<p class="help-block">プレイヤー名には「'」を使用しないで下さい。<br />
								「'」の代用として「_」を使用してください。</p>
							</div>
						</div>
						
						<div class="form-group">
                        	<div class="pull-right col-sm-2"><input type="button" id="reset" class="btn btn-warning" value="リセット"></div>
                        </div>
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