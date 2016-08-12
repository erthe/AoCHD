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
                <td><input type="text" name="player_name9" autocomplete="off" value="{$team1_list[0][1]|escape}" id="text_9" size="17" style="display: block;" class="form-control input-sm" placeholder="変更可能" />
                <div id="suggest_9" class="suggestion" name="suggest9" style="display:none;"></div></td>
                <td><label>rate: </label></td>
                <td><input class="form-control input-sm text-right" type="text" readonly name="rate9" value="{$team1_list[0][2]|escape}" size="5" placeholder="自動" />
                <input type="hidden" name="player_id9" value="{$team1_list[0][0|escape]}" /></td>
            	<td><label>name： </label></td>
                <td><input type="text" name="player_name10" id="text_10" value="{$team2_list[0][1]|escape}" autocomplete="off" size="17" style="display: block" class="form-control input-sm" placeholder="変更可能" />
                <div id="suggest_10" class="suggestion" name="suggest10" style="display:none;"></div></td>
                <td><label>rate: </label></td>
                <td><input class="form-control input-sm text-right" type="text" readonly name="rate10"  size="5" value="{$team2_list[0][2]|escape}" placeholder="自動" />
                <input type="hidden" name="player_id10" value="{$team2_list[0][0]|escape}" /></td>
            </tr>
                
            <tr>
                <td><label>name： </label></td>
                <td><input type="text" name="player_name11" autocomplete="off" value="{if $team1_number>=2}{$team1_list[1][1]|escape}{/if}" id="text_11" size="17" style="display: block;" class="form-control input-sm" placeholder="変更可能" />
                <div id="suggest_11" class="suggestion" name="suggest11" style="display:none;"></div></td>
                <td><label>rate: </label></td>
                <td><input class="form-control input-sm text-right" type="text" readonly name="rate11" size="5" value="{if $team1_number>=2}{$team1_list[1][2]|escape}{/if}" placeholder="自動" />
                <input type="hidden" name="player_id11" value="{if $team1_number>=2}{$team1_list[1][0]|escape}{/if}" /></td>
            	<td><label>name： </label></td>
                <td><input type="text" name="player_name12" id="text_12" value="{if $team2_number>=2}{$team2_list[1][1]|escape}{/if}" autocomplete="off" size="17" style="display: block" class="form-control input-sm" placeholder="変更可能" />
                <div id="suggest_12" class="suggestion" name="suggest12" style="display:none;"></div></td>
            	<td><label>rate: </label></td>
                <td><input class="form-control input-sm text-right" type="text" readonly name="rate12" size="5" value="{if $team2_number>=2}{$team2_list[1][2]|escape}{/if}" placeholder="自動" />
                <input type="hidden" name="player_id12" value="{if $team2_number>=2}{$team2_list[1][0]|escape}{/if}" /></td>
            </tr>
                
            <tr>
                <td><label>name： </label></td>
                <td><input type="text" name="player_name13" autocomplete="off" value="{if $team1_number>=3}{$team1_list[2][1]|escape}{/if}" id="text_13" size="17" style="display: block;" class="form-control input-sm" placeholder="変更可能" />
                <div id="suggest_13" class="suggestion" name="suggest13" style="display:none;"></div></td>
                <td><label>rate: </label></td>
                <td><input class="form-control input-sm text-right" type="text" readonly name="rate13" size="5" value="{if $team1_number>=3}{$team1_list[2][2|escape]}{/if}" placeholder="自動" />
                <input type="hidden" name="player_id13" value="{if $team1_number>=3}{$team1_list[2][0]|escape}{/if}" /></td>
             	<td><label>name： </label></td>
                <td><input  type="text" name="player_name14" id="text_14" value="{if $team2_number>=3}{$team2_list[2][1]|escape}{/if}" autocomplete="off" size="17" style="display: block" class="form-control input-sm" placeholder="変更可能" />
                <div id="suggest_14" class="suggestion" name="suggest14" style="display:none;"></div></td>
                <td><label>rate: </label></td>
                <td><input class="form-control input-sm text-right" type="text" readonly name="rate14" size="5" value="{if $team2_number>=3}{$team2_list[2][2]|escape}{/if}" placeholder="自動" />
                <input type="hidden" name="player_id14" value="{if $team2_number>=3}{$team2_list[2][0]|escape}{/if}" /></td>
            </tr>
                
            <tr>
                <td><label>name： </label></td>
                <td><input type="text" name="player_name15" autocomplete="off" value="{if $team1_number>=4}{$team1_list[3][1]|escape}{/if}" id="text_15" size="17" style="display: block;" class="form-control input-sm" placeholder="変更可能" />
                <div id="suggest_15" class="suggestion" name="suggest15" style="display:none;"></div></td>
                <td><label>rate: </label></td>
                <td><input class="form-control input-sm text-right" type="text" readonly name="rate15" size="5" value="{if $team1_number>=4}{$team1_list[3][2]|escape}{/if}" placeholder="自動" />
                <input type="hidden" name="player_id15" value="{if $team1_number>=4}{$team1_list[3][0]|escape}{/if}" /></td>
             	<td><label>name： </label></td>
                <td><input type="text" name="player_name16" id="text_16" value="{if $team2_number>=4}{$team2_list[3][1]|escape}{/if}" autocomplete="off" size="17" style="display: block" class="form-control input-sm" placeholder="変更可能" />
                <div id="suggest_16" class="suggestion" name="suggest16" style="display:none;"></div></td>
                <td><label>rate: </label></td>
                <td><input class="form-control input-sm text-right" type="text" readonly name="rate16" size="5" value="{if $team2_number>=4}{$team2_list[3][2]|escape}{/if}" placeholder="自動" />
                <input type="hidden" name="player_id16" value="{if $team2_number>=4}{$team2_list[3][0]|escape}{/if}" /></td>
            </tr>
                
            <tr>
            	<td colspan="8">レート合計</td>
            </tr>
                
            <tr>
                <td colspan="4"><input class="form-control input-sm text-right" type="text" readonly name="team1_sum" size="25" value="{$team1_rate}"></td>
                <td colspan="4"><input class="form-control input-sm text-right" type="text" readonly name="team2_sum" size="25" value="{$team2_rate}"></td>
            </tr>
                
            <tr>
            	<td>貼り付け用</td>
            	<td colspan="7"><button type="button" class="btn btn-primary" data-clipboard-target="#copy">コピー</button></td>
           	</tr>
                
            <tr>
                <td colspan="8"><input id="copy" type="text" class="form-control" value="{$cpype}" /><br /></td>
                
            </tr>

            <tr>
                <td colspan="8">
                    <input type="checkbox" name="is_norate" value="1">ノーレートゲームにする
                </td>
            </tr>
                
            <tr>
                <td colspan="8">
                	{if $is_alert == 1}
                		<span class="text-red">注意: レート1300未満のプレイヤーと1800以上のプレイヤーが同じゲームにいます。</span><br /><br />
                		ゲームにいるプレイヤーと相談相談の上続行して問題ない場合はこのままゲーム開始を<br />
                		レートを付けたくない場合はノーレートゲームをお願いします。<br />
                		<input type="radio" name="confirm_rate" value="1">確認済み
                		<input type="radio" name="confirm_rate" value="2">いいえ<br />
                	{/if}
                	<input type="hidden" name="token" value="{$token}">
                    <input type="hidden" name="action_tag" value="matching">
                    <input id="game_start" type="submit" class="btn btn-default" value="ゲーム開始">
                </td>
            </tr>
                
        </table>

    </fieldset>
</form>

<audio id="audio" preload="auto">
   <source src="{$base}/themes/sounds/gamestart.wav" type="audio/wav">
   <p>※ご利用のブラウザでは再生することができません。</p>
</audio>

<br /><br />
<script src="../themes/js/Library/clipboard.min.js"></script>
<script type="text/javascript" src="../themes/js/append.js"></script>
<script type="text/javascript">
	<!--
	var json_raw = {$json};
	var base = '{$base}';
	alert_team = {$is_alert};
    new Clipboard('.btn');
	{literal}

	player = load_player(json_raw);

	$('.suggestion').each(function(idx, obj){
    	idx++;
    	var text_idx = 'text_' + idx;
		var suggest_idx = 'suggest_' + idx;
			
		$(function(){new Suggest.Local(text_idx, suggest_idx, player_name, {dispMax: 10, highlight: true});});
	});
	
	$('*[id^=suggest]').click(function() {
		var row = $(this).attr("name").replace("suggest", "");
		set_rate(row, player_data);
		sum_rate();
	});
	
	$('[id^=text]').blur(function(){
		var row = $(this).attr("name").replace("player_name", "");
		set_rate(row, player_data);
		sum_rate(player_data);
        var team = 'チーム1： 【'+$('*[name=team1_sum]').val()+'】 '+$('#text_9').val()+'('+$('*[name=rate9]').val()+') ';
        if ($('#text_11').val() != '') {
            team = team + $('#text_11').val() + '(' + $('*[name=rate11]').val() + ') '
        }
        if ($('#text_13').val() != '') {
            team = team + $('#text_13').val() + '(' + $('*[name=rate13]').val() + ') ';
        }
        if ($('#text_15').val() != '') {
            team = team + $('#text_15').val() + '(' + $('*[name=rate15]').val() + ')';
        }

        team = team+'チーム2: 【'+$('*[name=team2_sum]').val()+'】 '+$('#text_10').val()+'('+$('*[name=rate10]').val()+') ';

        if ($('#text_12').val() != '') {
            team = team+$('#text_12').val() + '(' + $('*[name=rate12]').val() + ') '
        }

        if($('#text_14').val() != '') {
            team = team+$('#text_14').val() + '(' + $('*[name=rate14]').val() + ') '
        }

        if ($('#text_16').val() != '') {
            team = team+$('#text_16').val()+'('+$('*[name=rate16]').val()+') ';
        }
        $('#copy').val(team);
	});
	// -->
	{/literal}
</script>