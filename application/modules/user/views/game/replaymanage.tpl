{include file=$header}
<h2>リプレイの管理</h2>
{if $games|@count > 0}
    <table id="tbl" class="table-center">
        <thead>
            <tr>
            	<th>勝利チーム</th>
                <th class="playername text-center">チーム1<span id="sort_status0" class="player_name"></th>
                <th class="rate text-center">レート<span id="sort_status1" class="win"></th>
                <th class="playername text-center">チーム2<span id="sort_status2" class="rate"></th>
                <th class="rate text-center">レート<span id="sort_status3" class="win"></th>
                <th class="number text-center">試合時間</th>
                <th class="datetime text-center">試合日時</th>
                <th class="editable text-center">閲覧</th>
			    <th class="editable text-center">削除</th>
            </tr>
        </thead>
        
        <tbody>
            {$no = 0}{$n = ($pages.current)*$perpage - $perpage} {if $n<0}{$n=$players|@count - $perpage}{/if}
            {foreach item=player from=$games}
                <tr id="trno_{$no}" class="list">
                	<td class="text-center">{if isset($player.win_team)}{$player.win_team}{else}-{/if}</td>
                    <td>
                    	<span class="member-name">
                    		<a href="../index/playerdetail/player_id/{$team1[$n].id_0|escape}/rate_id/{$team1[$n].rate_id_0|escape}">
                    			{$team1[$n].member_0|escape}
                			</a>
            			</span>
                    	{section name=i start=0 loop=$team1[$n].num_member - 1}
                    		{assign var=member value=member_|cat:$smarty.section.i.iteration}
                    		{assign var=player_id value=id_|cat:$smarty.section.i.iteration}
                    		{assign var=rate_id value=rate_id_|cat:$smarty.section.i.iteration}
							<br />
                    			<a href="../index/playerdetail/player_id/{$team1[$n].$player_id|escape}/rate_id/{$team1[$n].$rate_id|escape}">
                    				{$team1[$n].$member|escape}
                				</a>
            				</span>
                        {/section}
                        <br /><hr class="total-border">
						レート合計
                    </td>
                    
                 	<td class="text-right">
                 		<span class="member-name">{$team1[$n].rate_0|escape}</span>
                    	{section name=i start=0 loop=$team1[$n].num_member - 1}
                    		{assign var=rate value=rate_|cat:$smarty.section.i.iteration}
							<br /><span class="member-name">{$team1[$n].$rate|escape}</span>
                        {/section}
                        <br /><hr class="total-border">
						{$player.team1_rate}
                    </td>
                    
                    <td class="left-space">
                    	<span class="member-name">
                    		<a href="../index/playerdetail/player_id/{$team2[$n].id_0|escape}/rate_id/{$team2[$n].rate_id_0|escape}">
                    			{$team2[$n].member_0|escape}
                			</a>
                		</span>
                    	{section name=i start=0 loop=$team2[$n].num_member - 1}
                    		{assign var=member value=member_|cat:$smarty.section.i.iteration}
                    		{assign var=player_id value=id_|cat:$smarty.section.i.iteration}
                    		{assign var=rate_id value=rate_id_|cat:$smarty.section.i.iteration}
							<br /><span class="member-name">
                    			<a href="../index/playerdetail/player_id/{$team2[$n].$player_id|escape}/rate_id/{$team2[$n].$rate_id|escape}">
                    				{$team2[$n].$member|escape}
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
                    <td class="text-center"><a href="{$base}/data/replay/{$player.replay_id}.html" target="_blank"><img src="{$base}/themes/images/show.png" alt="show"></a></td>
					<td class="text-center"><span id="{$player.gamelog_id|escape}" abbr="{$player.replay_id|escape}" class="delete"><img src="{$base}/themes/images/delete.png" alt="delete"></span></td>
                </tr>
                {$no = $no + 1}{$n = $n + 1}
            {/foreach}
        </tbody>
    </table>
    
    {* pagination links *}
	<div class="text-center">
		{$pages.firstItemNumber|escape} to {$pages.lastItemNumber|escape} of {$pages.totalItemCount|escape}<br />
		<ul class="pagination">
	        {if $pages.current != $pages.first}
	            <li><a href="replaymanage?page={$pages.first|escape}"> &lt;&lt; </a>
	        {/if}
	
	        {if isset($pages.previous)}
	            <li><a href="replaymanage?page={$pages.previous|escape}">  &lt; </a></li>
	        {/if}
	
	        {foreach item=p from=$pages.pagesInRange}
	
	            {if $pages.current == $p}
	                <li><span>{$p|escape}</span></li>
	            {else}
	                <li><a href="replaymanage?page={$p|escape}">  {$p} </a></li>
	            {/if}
	        {/foreach}
	
	        {if isset($pages.next)}
	            <li><a href="replaymanage?page={$pages.next|escape}"> &gt; </a></li>
	        {/if}
	
	        {if $pages.current != $pages.last}
	            <li><a href="replaymanage?page={$pages.last|escape}"> &gt;&gt; </a></li>
	        {/if}
	    </ul>
	</div>
	{* pagination links *}
	    
	<br />
	<br />
{else}
	今日のゲームはありません。
{/if}
</div>
{include file=$footer}
