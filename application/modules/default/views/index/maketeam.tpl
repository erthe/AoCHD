{include file=$header}

<div class="window-container">
不明点があればまずサイト説明を見てくださいね。
    <form id="member_entry" name="player_form" method="post">
        <fieldset>
        	<legend>プレイヤー名入力フォーム</legend>
            <table class="table-center">
            	<tr>
            		<td colspan="16">
            			<div class="form-group">
            				<label for="member" class="col-sm-2 control-label">プレイヤー数： </label>
			                <div class="col-sm-1">
				                <select id="game_member" class="form-control" name="member">
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8" selected>8</option>
								</select>
							</div>
							
							<div class="col-sm-3">
								<button id="player_reload" type="button" class="btn btn-info">プレイヤー情報更新</button>
							</div>
						</div>
					</td>
				<tr>
				
            	<tr>
            		<td colspan="4">プレイヤー1</td>
            		<td colspan="4">プレイヤー2</td>
            		<td colspan="4">プレイヤー3</td>
            		<td colspan="4">プレイヤー4</td>
            	</tr>

                <tr>
                    <td><label>name： </label></td>
                    <td><input type="text" name="player_name1" autocomplete="off" id="text_1" size="17" style="display: block;" placeholder="名前を入力" class="form-control input-sm" autofocus />
                    <div id="suggest_1" class="suggestion" name="suggest1" style="display:none;"></div></td>
                    <td><label>rate: </label></td>
                    <td><input class="form-control input-sm text-right" type="text" readonly name="rate1" size="5" placeholder="自動" />
                    <input type="hidden" name="player_id1"></td>
                	<td><label>name： </label></td>
                    <td><input type="text" name="player_name2" id="text_2" autocomplete="off" size="17" style="display: block" placeholder="名前を入力" class="form-control input-sm" />
                    <div id="suggest_2" class="suggestion" name="suggest2" style="display:none;"></div></td>
                    <td><label>rate: </label></td>
                    <td><input class="form-control input-sm text-right" type="text" readonly name="rate2" size="5" placeholder="自動" />
                    <input type="hidden" name="player_id2"></td>
                    <td><label>name： </label></td>
                    <td><input type="text" name="player_name3" id="text_3" autocomplete="off" size="17" style="display: block" placeholder="名前を入力" class="form-control input-sm" />
                    <div id="suggest_3" class="suggestion" name="suggest3" style="display:none;"></div></td>
                    <td><label>rate: </label></td>
                    <td><input class="form-control input-sm text-right" type="text" readonly name="rate3" size="5" placeholder="自動" />
                    <input type="hidden" name="player_id3"></td>
                	<td><label>name： </label></td>
                    <td><input type="text" name="player_name4" id="text_4" autocomplete="off" size="17" style="display: block" placeholder="名前を入力" class="form-control input-sm" />
					<div id="suggest_4" class="suggestion" name="suggest4" style="display:none;"></div></td>
                    <td><label>rate: </label></td>
                    <td><input class="form-control input-sm text-right" type="text" readonly name="rate4" size="5" placeholder="自動" />
                    <input type="hidden" name="player_id4"></td>
                </tr>
                
                <tr>
            		<td colspan="4">プレイヤー5</td>
            		<td colspan="4">プレイヤー6</td>
            		<td colspan="4">プレイヤー7</td>
            		<td colspan="4">プレイヤー8</td>
            	</tr>
            	
                <tr>
                    <td><label>name： </label></td>
                    <td><input type="text" name="player_name5" id="text_5" autocomplete="off" size="17" style="display: block" placeholder="名前を入力" class="form-control input-sm" />
                    <div id="suggest_5" class="suggestion" name="suggest5" style="display:none;"></div></td>
                    <td><label>rate: </label></td>
                    <td><input class="form-control input-sm text-right" type="text" readonly name="rate5" size="5" placeholder="自動" />
                    <input type="hidden" name="player_id5"></td>
                	<td><label>name： </label></td>
                    <td><input type="text" name="player_name6" id="text_6" autocomplete="off" size="17" style="display: block" placeholder="名前を入力" class="form-control input-sm" />
					<div id="suggest_6" class="suggestion" name="suggest6" style="display:none;"></div></td>
                    <td><label>rate: </label></td>
                    <td><input class="form-control input-sm text-right" type="text" readonly name="rate6" size="5" placeholder="自動" />
                    <input type="hidden" name="player_id6"></td>
                    <td><label>name： </label></td>
                    <td><input type="text" name="player_name7" id="text_7" autocomplete="off" size="17" style="display: block" placeholder="名前を入力" class="form-control input-sm" />
					<div id="suggest_7" class="suggestion" name="suggest7" style="display:none;"></div></td>
                    <td><label>rate: </label></td>
                    <td><input class="form-control input-sm text-right" type="text" readonly name="rate7" size="5" placeholder="自動" />
                    <input type="hidden" name="player_id7"></td>
                	<td><label> name： </label></td>
                    <td><input type="text" name="player_name8" id="text_8" autocomplete="off" size="17" style="display: block" placeholder="名前を入力" class="form-control input-sm" />
                    <div id="suggest_8" class="suggestion" name="suggest8" style="display:none;"></div></td>
                    <td><label>rate: </label></td>
                    <td><input class="form-control input-sm text-right" type="text" readonly name="rate8" size="5" placeholder="自動" />
                    <input type="hidden" name="player_id8"></td>
                </tr>
                
                <tr>
                    <td colspan="16">
                    	<input type="hidden" name="token" value="{$token}">
                    	<input type="hidden" name="action_tag" value="maketeam">
                        <input id="matching_submit" type="button" class="btn btn-default" value="チーム分け開始"><input type="reset" class="btn btn-default" value="リセット">
                    </td>
                </tr>
                
            </table>
        </fieldset>
    </form>
   	<p class="help-block"><span class="text-red">1400未満の初心者さんは大事な資源です。なるべくＴＲや資源パック、猪パクりなどの戦術は控えましょう。</span></p>
	<div id="matching"></div>
	<div id="gaming"></div>
	<div id="data-container"></div>
</div>

		<div class="navbar navbar-default navbar-fixed-bottom">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">{$title}</a>
			</div>
			
			<p class="navbar-text pull-right">{$username}</p>
		</div>
	</body>
	
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="../themes/js/Library/bootstrap.min.js"></script>
    <script type="text/javascript" src="../themes/js/Library/alertbox.js"></script>
    <script type="text/javascript" src="../themes/js/Library/common.js"></script>
    <script type="text/javascript" src="../themes/js/admin.js"></script>
    <script type="text/javascript" src="../themes/js/Library/suggest.js"></script>
    <script type="text/javascript" src="../themes/js/thickboxuseadmin.js"></script>
	<script type="text/javascript">
		<!--
		var json_raw = {$json};
		{literal}
		
		player = load_player(json_raw);
		player_name = player[0];
		player_data = player[1];
        
		$('.suggestion').each(function(idx, obj){
        	idx++;
        	var text_idx = 'text_' + idx;
    		var suggest_idx = 'suggest_' + idx;
    			
    		$(function(){new Suggest.Local(text_idx, suggest_idx, player_name, {dispMax: 10, highlight: true});});
    	});
    	
    	$('*[id^=suggest]').click(function() {
    		var row = $(this).attr("name").replace("suggest", "");
    		set_rate(row, player_data);
    	});
    	
    	$('[id^=text]').blur(function(){
    		var row = $(this).attr("name").replace("player_name", "");
			set_rate(row, player_data); 
    	});
    	
    	$("#player_reload").click(function(){
    		submit_action('playerreload', null, 'gatdata');
    	});

		// -->
		{/literal}
	</script>
</html>