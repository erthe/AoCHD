<h1>レート変更履歴</h1>
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
	                {section name=i loop=$edit_log|@count step=-1}
	                    <tr id="trno_{$no}" class="list">
	                        <td class="text-right">{$edit_log[i].edited_on}</td>
							<td class="text-right">{$edit_log[i].previous_rate}</td>
							<td class="text-right">{$edit_log[i].new_rate}</td>
							<td>{$edit_log[i].user_name}</td>
	                    </tr>
	                    {$no = $no + 1}{$n = $n + 1}
	                {/section}
	            </tbody>
	        </table>
	
	        {* pagination links *}
	        <table class="table-center">
	        <tr>
	            <td>
	                {$pages2.firstItemNumber} to {$pages2.lastItemNumber} of {$pages2.totalItemCount} |
	
	                {if $pages2.current != $pages2.first}
	                    <a href="?page2={$pages2.first}"> &lt;&lt; </a>
	                {/if}
	
	                {if isset($pages2.previous)}
	                    <a href="?page2={$pages2.previous}">  &lt; </a>
	                {/if}
	
	                {foreach item=p from=$pages2.pagesInRange}
	
	                    {if $pages2.current == $p}
	                        {$p}
	                    {else}
	                        <a href="?page2={$p}">  {$p} </a>
	                    {/if}
	                {/foreach}
	
	                {if isset($pages2.next)}
	                    <a href="?page2={$pages2.next}"> &gt; </a>
	                {/if}
	
	                {if $pages2.current != $pages2.last}
	                    <a href="?page2={$pages2.last}"> &gt;&gt; </a>
	                {/if}
	            </td>
	        </tr>
	    </table>

	    {* pagination links *}
	
	{else}
	    there is no-data.
	{/if}
</div>

