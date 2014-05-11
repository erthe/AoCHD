<h2>対戦結果</h2>
<table id="tbl" class="table-center">
    <thead>
        <tr>
            <th class="number text-center">勝利</th>
            <th class="number text-center">敗北</th>
            <th class="number text-center">連勝</th>
            <th class="number text-center">連敗</th>
            <th class="number text-center">勝率</th>
        </tr>
    </thead>
    
    <tbody>
        <tr>
            <td class="text-right">{$player1_win|escape}</td>
            <td class="text-right">{$player1_lose|escape}</td>
            <td class="text-right">{$win_streak|escape}</td>
            <td class="text-right">{$lose_streak|escape}</td>
            <td class="text-right">{$percent|escape}%</td>
        </tr>
    </tbody>
</table>

<h2>対戦履歴</h2>
{if $versuslog|@count > 0}
    <table id="tbl" class="table-center">
        <thead>
            <tr>
                <th class="playername text-center">勝利チーム</th>
                <th class="rate text-center">レート</th>
                <th class="playername text-center">敗北チーム</th>
                <th class="rate text-center">レート</th>
                <th class="number text-center">試合時間</th>
                <th class="datetime text-center">試合日時</th>
                <th>リプレイ解析</th>
            </tr>
        </thead>
            
        <tbody>
            {$no = 1}{$n = ($pages.current)*$perpage - $perpage} {if $n<0}{$n=$versuslog|@count - $perpage}{/if}
            {foreach item=player from=$versuslog}
                <tr id="trno_{$no}" class="list">
                    <td>
                    	<span class="member-name">{if $player_info.player_name === $win_team[$n].member_0 || $rival_info.player_name === $win_team[$n].member_0}<strong>{/if}
                    		<a href="{$base}/player/playerdetail/player_id/{$win_team[$n].id_0|escape}/rate_id/{$win_team[$n].rate_id_0|escape}">
                    			{$win_team[$n].member_0|escape}
                			</a>{if $player_info.player_name === $win_team[$n].member_0 || $rival_info.player_name === $win_team[$n].member_0}</strong>{/if}
            			</span>
                    	{section name=i start=0 loop=$win_team[$n].num_member - 1}
                    		{assign var=member value=member_|cat:$smarty.section.i.iteration}
                    		{assign var=player_id value=id_|cat:$smarty.section.i.iteration}
                    		{assign var=rate_id value=rate_id_|cat:$smarty.section.i.iteration}
							<br />{if $player_info.player_name === $win_team[$n].$member || $rival_info.player_name === $win_team[$n].$member}<strong>{/if}
                    			<a href="{$base}/player/playerdetail/player_id/{$win_team[$n].$player_id|escape}/rate_id/{$win_team[$n].$rate_id|escape}">
                    				{$win_team[$n].$member|escape}
                				</a>{if $player_info.player_name === $win_team[$n].$member || $rival_info.player_name === $win_team[$n].$member}</strong>{/if}
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
                    	<span class="member-name">{if $player_info.player_name === $lose_team[$n].member_0 || $rival_info.player_name === $lose_team[$n].member_0}<strong>{/if}
                    		<a href="{$base}/player/playerdetail/player_id/{$lose_team[$n].id_0|escape}/rate_id/{$lose_team[$n].rate_id_0|escape}">
                    			{$lose_team[$n].member_0|escape}
                			</a>{if $player_info.player_name === $lose_team[$n].member_0 || $rival_info.player_name === $lose_team[$n].member_0}</strong>{/if}
                		</span>
                    	{section name=i start=0 loop=$lose_team[$n].num_member - 1}
                    		{assign var=member value=member_|cat:$smarty.section.i.iteration}
                    		{assign var=player_id value=id_|cat:$smarty.section.i.iteration}
                    		{assign var=rate_id value=rate_id_|cat:$smarty.section.i.iteration}
							<br /><span class="member-name">{if  $player_info.player_name === $lose_team[$n].$member ||  $rival_info.player_name === $lose_team[$n].$member}<strong>{/if}
                    			<a href="{$base}/player/playerdetail/player_id/{$lose_team[$n].$player_id|escape}/rate_id/{$lose_team[$n].$rate_id|escape}">
                    				{$lose_team[$n].$member|escape}
                				</a>{if $player_info.player_name === $lose_team[$n].$member || $rival_info.player_name === $lose_team[$n].$member}</strong>{/if}
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
        {$pages.firstItemNumber|escape} to {$pages.lastItemNumber|escape} of {$pages.totalItemCount|escape}<br />
		<ul class="pagination">
            {if $pages.current != $pages.first}
                <li><a href="#" name="first"> &lt;&lt; </a></li>
            {/if}

            {if isset($pages.previous)}
                <li><a href="#" name="previous"> &lt; </a></li>
            {/if}

            {foreach item=p from=$pages.pagesInRange}
                {if $pages.current == $p}
                    <li><span>{$p|escape}</span></li>
                {else}
                    <li><a href="#" name="page_{$p}"> {$p} </a></li>
                {/if}
            {/foreach}

            {if isset($pages.next)}
                <li><a href="#" name="next"> &gt; </a></li>
            {/if}

            {if $pages.current != $pages.last}
                <li><a href="#" name="last"> &gt;&gt; </a></li>
            {/if}
		</ul>
	</div>
    {* pagination links *}
{else}
	{$no = 0}
    there is no-data.
{/if}
<br />
<h2>勝ってる人負ける人BEST5</h2>
{if $best|@count > 0 || $worst|@count > 0}
    <table id="tbl" class="table-center">
	    <thead>
	        <tr>
	            <th class="playername text-center">勝ってる人</th>
	            <th class="rate text-center">勝利数</th>
	            <th class="number text-center">勝率</th>
	            <th class="playername text-center">負けてる人</th>
	            <th class="rate text-center">敗北数</th>
	            <th class="number text-center">相手の勝率</th>
	        </tr>
	    </thead>
	    
	    <tbody>
            {if $best|@count > $worst|@count}{$trnum = $best|@count - 1}{else}{$trnum = $worst|@count - 1}{/if}
            	{for $n=0 to $trnum}
                	<tr id="trno_{$no}" class="list">
                		{if $best|@count > $n}
	                    	<td><a href="{$base}/player/playerdetail/player_id/{$best[$n].player_id|escape}/rate_id/{$best[$n].rate_id|escape}">{$best[$n].player_name}</a></td>
	                        <td class="text-right">{$best[$n].win_number}</td>
	                        <td class="text-right">{$best[$n].percent}%</td>
	                        {if $worst|@count <= $n}
	                    		<td></td>
	                    		<td></td>
	                    		<td></td>
	                    	{/if}
	                    {/if}
	                    
	                    {if $worst|@count > $n}
	                    	{if $best|@count <= $n}
	                    		<td></td>
	                    		<td></td>
	                    		<td></td>
	                    	{/if}
	                        <td class="left-space"><a href="{$base}/player/playerdetail/player_id/{$worst[$n].player_id|escape}/rate_id/{$worst[$n].rate_id|escape}">{$worst[$n].player_name}</a></td>
	                        <td class="text-right">{$worst[$n].lose_number}</td>
	                        <td class="text-right">{$worst[$n].percent}%</td>
	                    {/if}
                        
                    </tr>
                    {$no = $no + 1}
                {/for}
            </tbody>
        </table>
{else}
    there is no-data.
{/if}

<script type="text/javascript">
	<!--
	var page_info = {$page_info};
	var first = {$pages.first|escape};
	{if isset($pages.previous)}
		var previous = {$pages.previous|escape};
	{else}
		var previous = null;
	{/if}
	
	{if isset($pages.next)}
		var next = {$pages.next|escape};
	{else}
		var next = null;
	{/if}
	
	var last = {$pages.last|escape};
	{literal}
	
	$('*[name=first]').click(function(){
		page_info['page'] = first;
		submit_action('versusresult', page_info, 'rewrite');
	});
	
	$('*[name=previous]').click(function(){
		page_info['page'] = previous;
		submit_action('versusresult', page_info, 'rewrite');
	});
	
	$('*[name^=page]').click(function(){
		var page_num =  $(this).attr('name').replace('page_', '');
		page_info['page'] = page_num;
		submit_action('versusresult', page_info, 'rewrite');
	});
	
	$('*[name=next]').click(function(){
		page_info['page'] = next;
		submit_action('versusresult', page_info, 'rewrite');
	});
	
	$('*[name=last]').click(function(){
		page_info['page'] = last;
		submit_action('versusresult', page_info, 'rewrite');
	});
	
	// -->
	{/literal}
</script>
