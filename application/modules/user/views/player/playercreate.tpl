<div class="modal" id="player-insert">
	<div class="modal-dialog">
		<div class="modal-content window-container">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			    <h4 class="modal-title">プレイヤー新規登録</h4>
			</div>
			
			<div class="modal-body">
				<form id="insert_player" class="form-horizontal" method="post">
			        <fieldset>
			        	<div class="form-group">
		                    <label for="player_id" class="col-sm-3 control-label">ID： </label>
		                    <div class="col-sm-9">
		                    	<input type="text" readonly class="form-control text-right" size="40" placeholder="入力不要">
	                    	</div>
		                </div>

						<div class="form-group">
		                    <label for="steam_id" class="col-sm-3 control-label">STEAM ID: </label>
		                    <div class="col-sm-9">
		                    	<input type="text" class="form-control text-right" name="steam_id" size="20">
			                </div>
		                </div>

						<div class="form-group">
		                    <label for="player_name" class="col-sm-3 control-label">プレイヤー名: </label>
		                    <div class="col-sm-9">
		                    	<input type="text" class="form-control" name="player_name" size="40" placeholder="名前を入力" autofocus />
							</div>
						</div>
						
						<div class="form-group">
		                    <label for="rate" class="col-sm-3 control-label">レート: </label>
		                    <div class="col-sm-9">
		                    	<input type="text" class="form-control text-right" name="rate" size="40" placeholder="レートを入力">
		                    </div>
		                </div>

						<div class="form-group">
		                    <label for="warn_flag" class="col-sm-3 control-label">警告: </label>
		                    <div class="col-sm-9">
		                    	<select class="form-control" name="warn_flag">
		                            <option value="0">なし</option>
		                            <option value="1">警告</option>
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
                		</div>

						<div class="form-group">
		                    <label for="memo" class="col-sm-3 control-label">メモ: </label>
		                    <div class="col-sm-9">
		                    	<textarea class="form-control" name="memo" rows="5" cols="45" wrap="soft" placeholder="メモを入力(あれば)"></textarea>
							</div>
	                    </div>
	                    
                        <div class="form-group">
                        	<div class="pull-right col-sm-2"><input type="reset" class="btn btn-warning" value="リセット"></div>
                        </div>
          				<input type="hidden" name="token">
						<input type="hidden" name="action_tag" value="init">
			        </fieldset>
			    </form>
		    </div>
      		<div class="modal-footer">
      			<button id="player_insert" type="button" class="btn btn-primary">送信</button>
      			<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
      		</div>
	    </div>
	</div>
</div>