{include file=$header}

<div class="window-container">

    <form id="member_entry" name="player_form" method="post" action="matching">
        <fieldset>
            <table class="table-center">
            	<tr>
            		<td colspan="16"><label>プレイヤー数： </label>
		                <select id="game_member" name="member">
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8" selected>8</option>
						</select>
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
                    <td><input type="text" name="player_name1" autocomplete="off" id="text_1" size="17" style="display: block;" />
                    <div id="suggest_1" class="suggestion" name="suggest1" style="display:none;"></div></td>
                    <td><label>rate: </label></td>
                    <td><input class="text-right" type="text" readonly name="rate1" size="5">
                    <input type="hidden" name="player_id1"></td>
                	<td><label>name： </label></td>
                    <td><input type="text" name="player_name2" id="text_2" autocomplete="off" size="17" style="display: block" />
                    <div id="suggest_2" class="suggestion" name="suggest2" style="display:none;"></div></td>
                    <td><label>rate: </label></td>
                    <td><input class="text-right" type="text" readonly name="rate2" size="5">
                    <input type="hidden" name="player_id2"></td>
                    <td><label>name： </label></td>
                    <td><input type="text" name="player_name3" id="text_3" autocomplete="off" size="17" style="display: block" />
                    <div id="suggest_3" class="suggestion" name="suggest3" style="display:none;"></div></td>
                    <td><label>rate: </label></td>
                    <td><input class="text-right" type="text" readonly name="rate3" size="5">
                    <input type="hidden" name="player_id3"></td>
                	<td><label>name： </label></td>
                    <td><input type="text" name="player_name4" id="text_4" autocomplete="off" size="17" style="display: block" />
					<div id="suggest_4" class="suggestion" name="suggest4" style="display:none;"></div></td>
                    <td><label>rate: </label></td>
                    <td><input class="text-right" type="text" readonly name="rate4" size="5">
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
                    <td><input type="text" name="player_name5" id="text_5" autocomplete="off" size="17" style="display: block" />
                    <div id="suggest_5" class="suggestion" name="suggest5" style="display:none;"></div></td>
                    <td><label>rate: </label></td>
                    <td><input class="text-right" type="text" readonly name="rate5" size="5">
                    <input type="hidden" name="player_id5"></td>
                	<td><label>name： </label></td>
                    <td><input type="text" name="player_name6" id="text_6" autocomplete="off" size="17" style="display: block" />
					<div id="suggest_6" class="suggestion" name="suggest6" style="display:none;"></div></td>
                    <td><label>rate: </label></td>
                    <td><input class="text-right" type="text" readonly name="rate6" size="5">
                    <input type="hidden" name="player_id6"></td>
                    <td><label>name： </label></td>
                    <td><input type="text" name="player_name7" id="text_7" autocomplete="off" size="17" style="display: block" />
					<div id="suggest_7" class="suggestion" name="suggest7" style="display:none;"></div></td>
                    <td><label>rate: </label></td>
                    <td><input class="text-right" type="text" readonly name="rate7" size="5">
                    <input type="hidden" name="player_id7"></td>
                	<td><label> name： </label></td>
                    <td><input type="text" name="player_name8" id="text_8" autocomplete="off" size="17" style="display: block" />
                    <div id="suggest_8" class="suggestion" name="suggest8" style="display:none;"></div></td>
                    <td><label>rate: </label></td>
                    <td><input class="text-right" type="text" readonly name="rate8" size="5">
                    <input type="hidden" name="player_id8"></td>
                </tr>
                
                <tr>
                    <td colspan="16">
                        <input id="matching_submit" type="submit" value="チーム分け開始"><input type="reset" value="リセット">
                    </td>
                </tr>
                
            </table>
        	
            {$row = 0}
            {foreach item=item from=$players}
            	<input type="hidden" name="playerdata_name_{$row}" value="{$item.player_name}">
            	<input type="hidden" name="playerdata_id_{$row}" value="{$item.player_id}">
            	<input type="hidden" name="playerdata_rate_{$row}" value="{$item.rate}">
            	{$row = $row+1}
            {/foreach}
            <input type="hidden" id="nop" name="nop" value="{$row}">
        </fieldset>
    </form>
   	プレイヤー名に「'」が含まれている場合は「_」に変換しています。<br /><br />
	<div id="matching"></div>
	<div id="gaming"></div>
</div>


	</body>
	
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="../themes/js/Library/thickbox.js"></script>
    <script type="text/javascript" src="../themes/js/Library/alertbox.js"></script>
    <script type="text/javascript" src="../themes/js/Library/common.js"></script>
    <script type="text/javascript" src="../themes/js/admin.js"></script>
    <script type="text/javascript" src="../themes/js/Library/suggest.js"></script>
	<script type="text/javascript">
		<!--
		var json_raw = {$json};
		{literal}
		
		// 要素数を取得
		var elementNum = 0;
		for (i in json_raw){
			elementNum++;
		}
		
		var row = elementNum;
        var player_name = new Array(row);
        var player_data = new Array();
        
        for (var i=0; i<row; i++){
          	var PlayerName = "playerdata_name_" + i;
          	var PlayerRate = "playerdata_rate_" + i;
          	var PlayerID = "playerdata_id_" + i;
           	player_name[i] = json_raw[i]['player_name'];
           	player_data[i] = [json_raw[i]['player_name'],
           					json_raw[i]['rate'],
           					json_raw[i]['player_id']];
        }
        
		$('.suggestion').each(function(idx, obj){
        	idx++;
        	var text_idx = 'text_' + idx;
    		var suggest_idx = 'suggest_' + idx;
    			
    		$(function(){new Suggest.Local(text_idx, suggest_idx, player_name, {dispMax: 10, highlight: true});});
    	});
    	
    	$('*[id^=suggest]').click(function() {
    		var row = $(this).attr("name").replace("suggest", "");
    		set_rate(row);
    	});
    	
    	$('[id^=text]').change(function(){
    		var row = $(this).attr("name").replace("player_name", "");
    		set_rate(row);
    	});
    	
    	function set_rate(row){
    		$.each(player_data, function(idx, obj){
    			if($('*[name=player_name'+row+']').val() === player_data[idx][0]){
    				$('*[name=rate'+row+']').val(player_data[idx][1]);
    				$('*[name=player_id'+row+']').val(player_data[idx][2]);
    				return false;
    			} else {
    				$('*[name=rate'+row+']').val("");
    				$('*[name=player_id'+row+']').val("");
    			}
    		});	
    	} 
		// -->
		{/literal}
	</script>
</html>