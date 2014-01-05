<div id="list">
	{if $items|@count > 0}
	
	        <table id="tbl" class="table-center">
	            <thead>
	                <tr>
	                    <th class="playername text-center">プレイヤー名<span id="sort_status0" class="player_name" name="{$sortkey0}"><img id="status0" src="{$order0}"></span></th>  
	                    <th class="rate text-center">レート<span id="sort_status1" class="rate" name="{$sortkey1}"><img id="status1" src="{$order1}"></span></th>
	                    <th class="number text-center">勝利<span id="sort_status2" class="win" name="{$sortkey2}"><img id="status2" src="{$order2}"></span></th>
	                    <th class="number text-center">敗北<span id="sort_status3" class="lose" name="{$sortkey3}"><img id="status3" src="{$order3}"></span></th>
	                    <th class="number text-center">勝率<span id="sort_status4" class="percent" name="{$sortkey4}"><img id="status4" src="{$order4}"></span></th>
	                    <th class="editable text-center">閲覧</th>
	                </tr>
	            </thead>
	            
	            <tbody>
	                {$no = 1}
	                {foreach item=item from=$items}
	                    <tr id="trno_{$no}" class="list">
	                        <td>{$item.player_name}</td>
	                        <td class="text-right">{$item.rate}</td>
	                        <td class="text-right">{$item.win}</td>
	                        <td class="text-right">{$item.lose}</td>
	                        <td class="text-right">{if isset($item.percent)}{$item.percent}{else}0.000{/if}%</td>
	                        <td class="editable text-center"><a href="playerdetail/player_id/{$item.player_id}/rate_id/{$item.rate_id}"><img src="../themes/images/show.gif" alt="show"></a></td>
	                    </tr>
	                    {$no = $no + 1}
	                {/foreach}
	            </tbody>
	        </table>
	
	        {* pagination links *}
	        {if $searchname != ''}{$search_player = '/'|cat:$searchname}{else}{$search_player = '/'|cat:'null'}{/if}
	        {if $searchrate != ''}{$search_rate = '/'|cat:$searchrate}{else}{$search_rate='/'|cat:'null'}{/if}
	        {if isset($sortkey)}{$sort = '/'|cat:$sortkey}{else}{$sort='/'|cat:'null'}{/if}
	        {if isset($orderkey)}{$order = '/'|cat:$orderkey|cat:'/'}{else}{$order='/'|cat:'null'|cat:'/'}{/if}
	        <table class="table-center">
	        <tr>
	            <td>
	                {$pages.firstItemNumber} to {$pages.lastItemNumber} of {$pages.totalItemCount} |
	
	                {if $pages.current != $pages.first}
	                    <a id="firstpage" href="{$pagename}?page={$pages.first}{$search_player}{$search_rate}{$sort}{$order}"> &lt;&lt; </a>
	                {/if}
	
	                {if isset($pages.previous)}
	                    <a id="previouspage" href="{$pagename}?page={$pages.previous}{$search_player}{$search_rate}{$sort}{$order}">  &lt; </a>
	                {/if}
	
	                {foreach item=p from=$pages.pagesInRange}
	                    {if $pages.current == $p}
	                        {$p}
	                    {else}
	                        <a id="{$p}page" href="{$pagename}?page={$p}{$search_player}{$search_rate}{$sort}{$order}">  {$p} </a>
	                    {/if}
	                {/foreach}
	
	                {if isset($pages.next)}
	                    <a id="nextpage" href="{$pagename}?page={$pages.next}{$search_player}{$search_rate}{$sort}{$order}"> &gt; </a>
	                {/if}
	
	                {if $pages.current != $pages.last}
	                    <a id="lastpage" href="{$pagename}?page={$pages.last}{$search_player}{$search_rate}{$sort}{$order}"> &gt;&gt; </a>
	                {/if}
	            </td>
	        </tr>
	    </table>
	
	    {* pagination links *}
	
	{else}
	    there is no-data.
	{/if}
</div>

<script type="text/javascript" src="../themes/js/append.js"></script>
