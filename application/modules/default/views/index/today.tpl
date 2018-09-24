{include file=$header}
<h2>対戦履歴</h2>
<div id="list">
	{if $games|@count > 0}
        <table id="tbl" class="table table-bordered">
            <thead>
                <tr>
                	<th class="text-center">勝利</th>
					<th class="text-center">マップ種類</th>
                    <th class="playername text-center">チーム1<span id="sort_status0" class="player_name"></th>
                    <th class="rate text-center">レート<span id="sort_status1" class="win"></th>
                    <th class="playername text-center">チーム2<span id="sort_status2" class="rate"></th>
                    <th class="rate text-center">レート<span id="sort_status3" class="win"></th>
                    <th class="number text-center">試合時間</th>
                    <th class="datetime text-center">試合日時</th>
					<th>リプレイ</th>
                </tr>
            </thead>
            
            <tbody>
                {$no = 0}
                {foreach item=player from=$games}
                    <tr id="trno_{$no}" class="list">
                    	<td class="text-center">{if isset($player.win_team)}{$player.win_team}{else}-{/if}</td>
						<td class="text-center">{$player.game_note}</td>
                        <td>
                        	<span class="member-name">
                        		<a href="../player/playerdetail/player_id/{$team1[$no].id_0|escape}/rate_id/{$team1[$no].rate_id_0|escape}">
                        			{$team1[$no].member_0|escape}
                    			</a>
                			</span>
                        	{section name=i start=0 loop=$team1[$no].num_member - 1}
                        		{assign var=member value=member_|cat:$smarty.section.i.iteration}
                        		{assign var=player_id value=id_|cat:$smarty.section.i.iteration}
                        		{assign var=rate_id value=rate_id_|cat:$smarty.section.i.iteration}
								<br />
                        			<a href="../player/playerdetail/player_id/{$team1[$no].$player_id|escape}/rate_id/{$team1[$no].$rate_id|escape}">
                        				{$team1[$no].$member|escape}
                    				</a>
                				</span>
	                        {/section}
	                        <br /><hr class="total-border">
							レート合計
                        </td>
                        
                     	<td class="text-right">
                     		<span class="member-name">{$team1[$no].rate_0|escape}</span>
                        	{section name=i start=0 loop=$team1[$no].num_member - 1}
                        		{assign var=rate value=rate_|cat:$smarty.section.i.iteration}
								<br /><span class="member-name">{$team1[$no].$rate|escape}</span>
	                        {/section}
	                        <br /><hr class="total-border">
							{$player.team1_rate}
                        </td>
                        
                        <td class="left-space">
                        	<span class="member-name">
                        		<a href="../player/playerdetail/player_id/{$team2[$no].id_0|escape}/rate_id/{$team2[$no].rate_id_0|escape}">
                        			{$team2[$no].member_0|escape}
                    			</a>
                    		</span>
                        	{section name=i start=0 loop=$team2[$no].num_member - 1}
                        		{assign var=member value=member_|cat:$smarty.section.i.iteration}
                        		{assign var=player_id value=id_|cat:$smarty.section.i.iteration}
                        		{assign var=rate_id value=rate_id_|cat:$smarty.section.i.iteration}
								<br /><span class="member-name">
                        			<a href="../player/playerdetail/player_id/{$team2[$no].$player_id|escape}/rate_id/{$team2[$no].$rate_id|escape}">
                        				{$team2[$no].$member|escape}
                    				</a>
                				</span>
	                        {/section}
	                        <br /><hr class="total-border">
							レート合計
                        </td>
                        
                        <td class="text-right">
                        	<span class="member-name">{$team2[$no].rate_0}</span>
                        	{section name=i start=0 loop=$team2[$no].num_member - 1}
                        		{assign var=rate value=rate_|cat:$smarty.section.i.iteration}
								<br /><span class="member-name">{$team2[$no].$rate|escape}</span>
	                        {/section}
	                        <br /><hr class="total-border">
							{$player.team2_rate}
                        </td>
                        
                        <td {if isset($player.win_team)}class="text-right"{/if}>
                        	{if isset($player.win_team)}{$time = $player.game_end|strtotime|escape - $player.created_on|strtotime|escape - 9 * 60 * 60}{$time|date_format:"%H:%M:%S"}{else}試合中{/if}</td>
                        <td class="text-right">{$player.created_on}</td>
			<td class="text-center">{if isset($player.replay_id)}<a href="../data/replay/{$player.replay_id}.html" target="_blank"><img src="../themes/images/show.png" alt="show"></a>{else}<a href="../index/upload/gamelog/{$player.gamelog_id}" target="_blank"><img src="../themes/images/upload.png" alt="upload"></a>{/if}</td>
                    </tr>
                    {$no = $no + 1}
                {/foreach}
            </tbody>
        </table>
	<br />
	<br />
	{else}
		今日のゲームはありません。
	{/if}
</div><br /><br />
{include file=$footer}
