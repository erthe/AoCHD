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
            	<td colspan="7"><input type="button" class="btn btn-primary" value="コピー試運転中" id="test"/></td>
           	</tr>
                
            <tr>
                <td colspan="8"><input id="cpy" type="text" class="form-control" value="{$cpype}" onchange="clip.setText(this.value)" size="200"/><br /></td>
                
            </tr>
                
            <tr>
                <td colspan="8">
                	<input type="hidden" name="token" value="{$token}">
                    <input type="hidden" name="action_tag" value="matching">
                    <input id="game_start" type="submit" class="btn btn-default" value="ゲーム開始">
                </td>
            </tr>
                
        </table>

    </fieldset>
  	<span class="span-right"><a href="http://www14.big.or.jp/~amiami/happy/" target="_blank">こちらの声の素材を使用しました</a></span>
    <audio id="audio" preload="auto">
	   <source src="{$base}/themes/sounds/junbiwaiikana_01.wav" type="audio/wav">
	   <p>※ご利用のブラウザでは再生することができません。</p>
	</audio>
	
    <br /><br />
<script type="text/javascript" src="../themes/js/Library/ZeroClipboard.js"></script>
<script type="text/javascript" src="../themes/js/append.js"></script>
<script type="text/javascript">
	<!--
	var json_raw = {$json};
	var base = '{$base}';
	{literal}
	isStart = false;
	
	setInterval(function(){
		if(isStart === false) {
			document.getElementById("audio").play();
		};
	},18000);
	
	player = load_player(json_raw);
	ZeroClipboard.setMoviePath("../themes/js/Library/ZeroClipboard.swf");
    clip = new ZeroClipboard.Client();
	clip.glue("test");
	clip.setText(document.getElementById('cpy').value);
    
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
	});
	// -->
	{/literal}
</script>