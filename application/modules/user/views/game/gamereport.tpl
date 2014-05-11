<div class="modal" id="game-report">
	<div class="modal-dialog">
		<div class="modal-content window-container">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			    <h4 class="modal-title">ゲーム報告(代理)</h4>
			</div>
			
			<div class="modal-body">
			    <form id="edit-game" method="post">
			        <fieldset>
			        	<div class="form-group">
		                    <label for="gamelog_id" class="col-sm-3 control-label">ゲームID： </label>
		                    <div class="col-sm-9">
		                    	<input class="form-control text-right" type="text" readonly name="gamelog_id" size="20">
							</div>
	                    </div>
			                    
	                    <div class="row span-center">
	                    	<div class="col-md-6">
	                    	チーム1<br />
                    		<div id="team1"></div>
                    		</div>
						
	                    	<div class="col-md-6">
	                    	チーム2<br />
	                    		<div id="team2"></div>
	                    	</div>
	                    </div>

						<div class="form-group">
		                    <label for="game_start" class="col-sm-3 control-label">ゲーム開始時間: </label>
		                    <div class="col-sm-9">
		                    	<input type="text" class="form-control text-right" name="game_start" size="20">
							</div>
						</div>
						
						<div class="form-group">
		                    <label for="gama-end" class="col-sm-3 control-label">ゲーム終了時間: </label>
		                    <div class="col-sm-9">
		                    	<input type="text" class="form-control text-right" name="game_end" size="20">
							</div>
						
						<div class="form-group">
		                    <label for="win_team" class="col-sm-3 control-label">勝利チーム: </label>
		                    <div class="col-sm-9">
		                    	<select class="form-control" name="win_team">
		                            <option value="1">チーム1</option>
		                            <option value="2">チーム2</option>
		                        </select>
		                    </div>
	                    </div>
						
						<div class="form-group">
                    	<div class="pull-right col-sm-2"><input type="button" id="reset_gamelog" class="btn btn-warning" value="リセット"></div>
                        </div>
                        <input type="hidden" name="token" value="{$token}">
						<input type="hidden" name="action_tag_gamemanage" value="userreport">
			        </fieldset>
			    </form>
			</div>
			
			<div class="modal-footer">
				
      			<button id="userreport_submit" type="button" class="btn btn-primary">送信</button>
      			<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
      		</div>
  		</div>
	</div>
</div>
<div id="data-container"></div>

<script "text/javascript" src="{$base}/themes/js/Library/jquery.dateValidate.js"></script>
<script "text/javascript" src="{$base}/themes/js/Library/jquery.timeValidate.js"></script>