<h2>対戦履歴</h2>
<div id="list">
	{if $players|@count > 0}
	
	        <table id="tbl" class="table-center">
	            <thead>
	                <tr>
	                    <th class="playername text-center">勝利チーム<span id="sort_status0" class="player_name"></th>
	                    <th class="number text-center">レート<span id="sort_status1" class="win"></th>  
	                    <th class="rate text-center">敗北チーム<span id="sort_status2" class="rate"></th>
	                    <th class="number text-center">レート<span id="sort_status3" class="win"></th>
	                    <th class="number text-center">試合時間</th>
	                    <th class="datetime text-center">試合日時</th>
	                </tr>
	            </thead>
	            
	            <tbody>
	                {$no = 1}{$n = ($pages1.current)*$perpage - $perpage} {if $n<0}{$n=$players|@count - $perpage}{/if}
	                {foreach item=player from=$players}
	                    <tr id="trno_{$no}" class="list">
	                        <td>
	                        	{$win_team[$n].member_0}
	                        	{section name=i start=0 loop=$win_team[$n].num_member - 1}
	                        		{assign var=member value=member_|cat:$smarty.section.i.iteration}
									<br />{$win_team[$n].$member}
		                        {/section}
	                        </td>
	                        
	                     	<td class="text-right">
	                     		{$win_team[$n].rate_0}
	                        	{section name=i start=0 loop=$win_team[$n].num_member - 1}
	                        		{assign var=rate value=rate_|cat:$smarty.section.i.iteration}
									<br />{$win_team[$n].$rate}
		                        {/section}
	                        </td>
	                        
	                        <td>
	                        	{$lose_team[$n].member_0}
	                        	{section name=i start=0 loop=$lose_team[$n].num_member - 1}
	                        		{assign var=member value=member_|cat:$smarty.section.i.iteration}
									<br />{$lose_team[$n].$member}
		                        {/section}
	                        </td>
	                        
	                        <td class="text-right">
	                        	{$lose_team[$n].rate_0}
	                        	{section name=i start=0 loop=$lose_team[$n].num_member - 1}
	                        		{assign var=rate value=rate_|cat:$smarty.section.i.iteration}
									<br />{$lose_team[$n].$rate}
		                        {/section}
	                        </td>
	                        
	                        <td class="text-right">
	                        	{$time = $player.game_end|strtotime - $player.created_on|strtotime - 9 * 60 * 60}{$time|date_format:"%H:%M:%S"}</td>
	                        <td class="text-right">{$player.created_on}</td>
	                    </tr>
	                    {$no = $no + 1}{$n = $n + 1}
	                {/foreach}
	            </tbody>
	        </table>
	
	        {* pagination links *}
	        <div class="text-center">
		        {$pages1.firstItemNumber} to {$pages1.lastItemNumber} of {$pages1.totalItemCount}<br />
				<ul class="pagination">
		            {if $pages1.current != $pages1.first}
		                <li><a href="?page1={$pages1.first}"> &lt;&lt; </a></li>
		            {/if}
		
		            {if isset($pages1.previous)}
		                <li><a href="?page1={$pages1.previous}">  &lt; </a></li>
		            {/if}
		
		            {foreach item=p from=$pages1.pagesInRange}
		
		                {if $pages1.current == $p}
		                    <li><span>{$p}</span></li>
		                {else}
		                    <li><a href="?page1={$p}">  {$p} </a></li>
		                {/if}
		            {/foreach}
		
		            {if isset($pages1.next)}
		                <li><a href="?page1={$pages1.next}"> &gt; </a></li>
		            {/if}
		
		            {if $pages1.current != $pages1.last}
		                <li><a href="?page1={$pages1.last}"> &gt;&gt; </a></li>
		            {/if}
			</ul>
	    {* pagination links *}
	
	{else}
	    there is no-data.
	{/if}
</div>

