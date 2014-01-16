<h2>レート変更履歴</h2>
<div id="list">
	{if $edit_log|@count > 0}
	
	        <table id="tbl" class="table-center">
	            <thead>
	                <tr>
	                    <th class="playername text-center">変更日時<span id="sort_status0" class="created_on"></th>
	                    <th class="number text-center">旧レート<span id="sort_status1" class="previous_rate"></th>  
	                    <th class="rate text-center">新レート<span id="sort_status2" class="new_rate"></th>
	                    <th class="number text-center">変更者<span id="sort_status3" class="editor_id"></th>
	                </tr>
	            </thead>
	            
	            <tbody>
	                {$no = 1}{$n = 0}
	                {foreach item=item from=$edit_log}
	                    <tr id="trno_{$no}" class="list">
	                        <td class="text-right">{$item.edited_on}</td>
							<td class="text-right">{$item.previous_rate}</td>
							<td class="text-right">{$item.new_rate}</td>
							<td>{$item.user_name}</td>
	                    </tr>
	                    {$no = $no + 1}
	                {/foreach}
	            </tbody>
	        </table>
	
	        {* pagination links *}
	        <div class="text-center">
	            {$pages2.firstItemNumber} to {$pages2.lastItemNumber} of {$pages2.totalItemCount}<br />
				<ul class="pagination">
	                {if $pages2.current != $pages2.first}
	                    <li><a href="?page2={$pages2.first}"> &lt;&lt; </a></li>
	                {/if}
	
	                {if isset($pages2.previous)}
	                    <li><a href="?page2={$pages2.previous}">  &lt; </a></li>
	                {/if}
	
	                {foreach item=p from=$pages2.pagesInRange}
	
	                    {if $pages2.current == $p}
	                        <li><span>{$p}</span></li>
	                    {else}
	                        <li><a href="?page2={$p}">  {$p} </a></li>
	                    {/if}
	                {/foreach}
	
	                {if isset($pages2.next)}
	                    <li><a href="?page2={$pages2.next}"> &gt; </a></li>
	                {/if}
	
	                {if $pages2.current != $pages2.last}
	                    <li><a href="?page2={$pages2.last}"> &gt;&gt; </a></li>
	                {/if}
	            </ul>
			</div>
			<br /><br /><br />
	    {* pagination links *}
	
	{else}
	    there is no-data.
	{/if}
</div>

