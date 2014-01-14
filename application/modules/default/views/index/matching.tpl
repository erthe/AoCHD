<form id="matching_result" name="player_form" method="post">
    <fieldset>
    	<legend>マッチング結果</legend>
        <table>
            
          	<tr>
            	<td colspan="4">チーム1</td>
            	<td colspan="4">チーム2</td>
            </tr>
            	
            <tr>
                <td><label>name： </label></td>
                <td><input type="text" name="player_name9" autocomplete="off" value="{$team1_list[0][1]}" id="text_9" size="17" style="display: block;" class="form-control input-sm" placeholder="変更可能" />
                <div id="suggest_9" class="suggestion" name="suggest9" style="display:none;"></div></td>
                <td><label>rate: </label></td>
                <td><input class="form-control input-sm text-right" type="text" readonly name="rate9" value="{$team1_list[0][2]}" size="5" placeholder="自動" />
                <input type="hidden" name="player_id9" value="{$team1_list[0][0]}" /></td>
            	<td><label>name： </label></td>
                <td><input type="text" name="player_name10" id="text_10" value="{$team2_list[0][1]}" autocomplete="off" size="17" style="display: block" class="form-control input-sm" placeholder="変更可能" />
                <div id="suggest_10" class="suggestion" name="suggest10" style="display:none;"></div></td>
                <td><label>rate: </label></td>
                <td><input class="form-control input-sm text-right" type="text" readonly name="rate10"  size="5" value="{$team2_list[0][2]}" placeholder="自動" />
                <input type="hidden" name="player_id10" value="{$team2_list[0][0]}" /></td>
            </tr>
                
            <tr>
                <td><label>name： </label></td>
                <td><input type="text" name="player_name11" autocomplete="off" value="{if $team1_number>=2}{$team1_list[1][1]}{/if}" id="text_11" size="17" style="display: block;" class="form-control input-sm" placeholder="変更可能" />
                <div id="suggest_11" class="suggestion" name="suggest11" style="display:none;"></div></td>
                <td><label>rate: </label></td>
                <td><input class="form-control input-sm text-right" type="text" readonly name="rate11" size="5" value="{if $team1_number>=2}{$team1_list[1][2]}{/if}" placeholder="自動" />
                <input type="hidden" name="player_id11" value="{if $team1_number>=2}{$team1_list[1][0]}{/if}" /></td>
            	<td><label>name： </label></td>
                <td><input type="text" name="player_name12" id="text_12" value="{if $team2_number>=2}{$team2_list[1][1]}{/if}" autocomplete="off" size="17" style="display: block" class="form-control input-sm" placeholder="変更可能" />
                <div id="suggest_12" class="suggestion" name="suggest12" style="display:none;"></div></td>
            	<td><label>rate: </label></td>
                <td><input class="form-control input-sm text-right" type="text" readonly name="rate12" size="5" value="{if $team2_number>=2}{$team2_list[1][2]}{/if}" placeholder="自動" />
                <input type="hidden" name="player_id12" value="{if $team2_number>=2}{$team2_list[1][0]}{/if}" /></td>
            </tr>
                
            <tr>
                <td><label>name： </label></td>
                <td><input type="text" name="player_name13" autocomplete="off" value="{if $team1_number>=3}{$team1_list[2][1]}{/if}" id="text_13" size="17" style="display: block;" class="form-control input-sm" placeholder="変更可能" />
                <div id="suggest_13" class="suggestion" name="suggest13" style="display:none;"></div></td>
                <td><label>rate: </label></td>
                <td><input class="form-control input-sm text-right" type="text" readonly name="rate13" size="5" value="{if $team1_number>=3}{$team1_list[2][2]}{/if}" placeholder="自動" />
                <input type="hidden" name="player_id13" value="{if $team1_number>=3}{$team1_list[2][0]}{/if}" /></td>
             	<td><label>name： </label></td>
                <td><input  type="text" name="player_name14" id="text_14" value="{if $team2_number>=3}{$team2_list[2][1]}{/if}" autocomplete="off" size="17" style="display: block" class="form-control input-sm" placeholder="変更可能" />
                <div id="suggest_14" class="suggestion" name="suggest14" style="display:none;"></div></td>
                <td><label>rate: </label></td>
                <td><input class="form-control input-sm text-right" type="text" readonly name="rate14" size="5" value="{if $team2_number>=3}{$team2_list[2][2]}{/if}" placeholder="自動" />
                <input type="hidden" name="player_id14" value="{if $team2_number>=3}{$team2_list[2][0]}{/if}" /></td>
            </tr>
                
            <tr>
                <td><label>name： </label></td>
                <td><input type="text" name="player_name15" autocomplete="off" value="{if $team1_number>=4}{$team1_list[3][1]}{/if}" id="text_15" size="17" style="display: block;" class="form-control input-sm" placeholder="変更可能" />
                <div id="suggest_15" class="suggestion" name="suggest15" style="display:none;"></div></td>
                <td><label>rate: </label></td>
                <td><input class="form-control input-sm text-right" type="text" readonly name="rate15" size="5" value="{if $team1_number>=4}{$team1_list[3][2]}{/if}" placeholder="自動" />
                <input type="hidden" name="player_id15" value="{if $team1_number>=4}{$team1_list[3][0]}{/if}" /></td>
             	<td><label>name： </label></td>
                <td><input type="text" name="player_name16" id="text_16" value="{if $team2_number>=4}{$team2_list[3][1]}{/if}" autocomplete="off" size="17" style="display: block" class="form-control input-sm" placeholder="変更可能" />
                <div id="suggest_16" class="suggestion" name="suggest16" style="display:none;"></div></td>
                <td><label>rate: </label></td>
                <td><input class="form-control input-sm text-right" type="text" readonly name="rate16" size="5" value="{if $team2_number>=4}{$team2_list[3][2]}{/if}" placeholder="自動" />
                <input type="hidden" name="player_id16" value="{if $team2_number>=4}{$team2_list[3][0]}{/if}" /></td>
            </tr>
                
            <tr>
            	<td colspan="8">レート合計</td>
            </tr>
                
            <tr>
                <td colspan="4"><input class="text-right" type="text" readonly name="team1_sum" size="25" value="{$team1_rate}"></td>
                <td colspan="4"><input class="text-right" type="text" readonly name="team2_sum" size="25" value="{$team2_rate}"></td>
            </tr>
                
            <tr>
            	<td colspan="8">貼り付け用</td>
           	</tr>
                
            <tr>
                <td colspan="8"><input type="text" readonly name="copype" size="80" value="{$cpype}"></td>
            </tr>
                
            <tr>
                <td colspan="8">
                    <input id="game_start" type="submit" class="btn btn-default" value="ゲーム開始">
                </td>
            </tr>
                
        </table>

    </fieldset>
</form>

<script type="text/javascript" src="../themes/js/append.js"></script>
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