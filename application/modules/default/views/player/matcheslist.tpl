<h2>対戦履歴</h2>
<div id="matchlist">
	{if $players|@count > 0}
        <table id="tbl" class="table-center">
            <thead>
                <tr>
                    <th class="playername text-center">勝利チーム<span id="sort_status0" class="player_name"></th>
                    <th class="rate text-center">レート<span id="sort_status1" class="win"></th>
                    <th class="playername text-center">敗北チーム<span id="sort_status2" class="rate"></th>
                    <th class="rate text-center">レート<span id="sort_status3" class="win"></th>
                    <th class="number text-center">試合時間</th>
                    <th class="datetime text-center">試合日時</th>
                    <th>リプレイ解析</th>
                </tr>
            </thead>
	            
            <tbody>
                {$no = 1}{$n = ($pages1.current)*$perpage - $perpage} {if $n<0}{$n=$players|@count - $perpage}{/if}
                {foreach item=player from=$players}
                    <tr id="trno_{$no}" class="list">
                        <td>
                        	<span class="member-name">{if $player_info.player_name === $win_team[$n].member_0}<strong>{/if}
                        		<a href="../../../../playerdetail/player_id/{$win_team[$n].id_0|escape}/rate_id/{$win_team[$n].rate_id_0|escape}">
                        			{$win_team[$n].member_0|escape}
                    			</a>{if $player_info.player_name === $win_team[$n].member_0}</strong>{/if}
                			</span>
                        	{section name=i start=0 loop=$win_team[$n].num_member - 1}
                        		{assign var=member value=member_|cat:$smarty.section.i.iteration}
                        		{assign var=player_id value=id_|cat:$smarty.section.i.iteration}
                        		{assign var=rate_id value=rate_id_|cat:$smarty.section.i.iteration}
								<br />{if $player_info.player_name === $win_team[$n].$member}<strong>{/if}
                        			<a href="../../../../playerdetail/player_id/{$win_team[$n].$player_id|escape}/rate_id/{$win_team[$n].$rate_id|escape}">
                        				{$win_team[$n].$member|escape}
                    				</a>{if $player_info.player_name === $win_team[$n].$member}</strong>{/if}
                				</span>
	                        {/section}
	                        <br /><hr class="total-border">
							レート合計
                        </td>
                        
                     	<td class="text-right">
                     		<span class="member-name">{$win_team[$n].rate_0|escape}</span>
                        	{section name=i start=0 loop=$win_team[$n].num_member - 1}
                        		{assign var=rate value=rate_|cat:$smarty.section.i.iteration}
								<br /><span class="member-name">{$win_team[$n].$rate|escape}</span>
	                        {/section}
	                        <br /><hr class="total-border">
							{if $player.win_team == 1}{$player.team1_rate}{else}{$player.team2_rate}{/if}
                        </td>
                        
                        <td class="left-space">
                        	<span class="member-name">{if $player_info.player_name === $lose_team[$n].member_0}<strong>{/if}
                        		<a href="../../../../playerdetail/player_id/{$lose_team[$n].id_0|escape}/rate_id/{$lose_team[$n].rate_id_0|escape}">
                        			{$lose_team[$n].member_0|escape}
                    			</a>{if $player_info.player_name === $lose_team[$n].member_0}</strong>{/if}
                    		</span>
                        	{section name=i start=0 loop=$lose_team[$n].num_member - 1}
                        		{assign var=member value=member_|cat:$smarty.section.i.iteration}
                        		{assign var=player_id value=id_|cat:$smarty.section.i.iteration}
                        		{assign var=rate_id value=rate_id_|cat:$smarty.section.i.iteration}
								<br /><span class="member-name">{if $player_info.player_name === $lose_team[$n].$member}<strong>{/if}
                        			<a href="../../../../playerdetail/player_id/{$lose_team[$n].$player_id|escape}/rate_id/{$lose_team[$n].$rate_id|escape}">
                        				{$lose_team[$n].$member|escape}
                    				</a>{if $player_info.player_name === $lose_team[$n].$member}</strong>{/if}
                				</span>
	                        {/section}
	                        <br /><hr class="total-border">
							レート合計
                        </td>
                        
                        <td class="text-right">
                        	<span class="member-name">{$lose_team[$n].rate_0}</span>
                        	{section name=i start=0 loop=$lose_team[$n].num_member - 1}
                        		{assign var=rate value=rate_|cat:$smarty.section.i.iteration}
								<br /><span class="member-name">{$lose_team[$n].$rate|escape}</span>
	                        {/section}
	                        <br /><hr class="total-border">
							{if $player.win_team == 1}{$player.team2_rate}{else}{$player.team1_rate}{/if}
                        </td>
                        
                        <td class="text-right">{$time = $player.game_end|strtotime|escape - $player.created_on|strtotime|escape - 9 * 60 * 60}{$time|date_format:"%H:%M:%S"}</td>
                        <td class="text-right">{$player.created_on}</td>
                        <td class="text-center">{if isset($player.replay_id)}<a href="../../../../../data/replay/{$player.replay_id}.html" target="_blank"><img src="../../../../../themes/images/show.png" alt="show"></a>{else}<a href="../../../../../index/upload/gamelog/{$player.gamelog_id}" target="_blank"><img src="../../../../../themes/images/upload.png" alt="upload"></a>{/if}</td>
                    </tr>
                    {$no = $no + 1}{$n = $n + 1}
                {/foreach}
            </tbody>
        </table>
	
        {* pagination links *}
        <div class="text-center">
	        {$pages1.firstItemNumber|escape} to {$pages1.lastItemNumber|escape} of {$pages1.totalItemCount|escape}<br />
			<ul class="pagination">
	            {if $pages1.current != $pages1.first}
	                <li><a href="?page1={$pages1.first|escape}"> &lt;&lt; </a></li>
	            {/if}
	
	            {if isset($pages1.previous)}
	                <li><a href="?page1={$pages1.previous|escape}">  &lt; </a></li>
	            {/if}
	
	            {foreach item=p from=$pages1.pagesInRange}
	                {if $pages1.current == $p}
	                    <li><span>{$p|escape}</span></li>
	                {else}
	                    <li><a href="?page1={$p|escape}">  {$p} </a></li>
	                {/if}
	            {/foreach}
	
	            {if isset($pages1.next)}
	                <li><a href="?page1={$pages1.next|escape}"> &gt; </a></li>
	            {/if}
	
	            {if $pages1.current != $pages1.last}
	                <li><a href="?page1={$pages1.last|escape}"> &gt;&gt; </a></li>
	            {/if}
			</ul>
		</div>
	    {* pagination links *}
	{else}
	    there is no-data.
	{/if}
</div>
