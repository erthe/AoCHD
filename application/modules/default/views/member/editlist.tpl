<div id="editlist">
	<link rel="stylesheet" type="text/css" href="../themes/css/thickbox.css" type="text/css" />
	{if $items|@count > 0}
	
	        <table id="tbl" class="table-center">
	            <thead>
	                <tr>
	                    <th class="playername text-center"><span id="sort_status0" class="player_name"  name="{$sortkey0}">プレイヤー名<img class="icon" src="{$order0}"></span></th>  
	                    <th class="rate text-center"><span class="rate" id="sort_status1" name="{$sortkey1}">レート<img class="icon" src="{$order1}"></span></th>
	                    <th class="number text-center"><span class="win" id="sort_status2" name="{$sortkey2}">勝利<img  class="icon" src="{$order2}"></span></th>
	                    <th class="number text-center"><span class="lose" id="sort_status3" name="{$sortkey3}">敗北<img class="icon" src="{$order3}"></span></th>
	                    <th class="number text-center"><span class="percent" id="sort_status4" name="{$sortkey4}">勝率<img class="icon" src="{$order4}"></span></th>
	                    <th class="editable text-center">編集</th>
	                    <th class="editable text-center">閲覧</th>
	                    <th class="editable text-center">削除</th>
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
	                        <td class="editable text-center"><a href="#" id="player-data" name="{$item.player_id}"><img src="../themes/images/edit.png" alt="edit"></a></td>
	                        <td class="editable text-center"><a href="playerdetail/player_id/{$item.player_id}/rate_id/{$item.rate_id}"><img src="../themes/images/show.png" alt="show"></a></td>
	                        <td id="{$item.player_id}" class="editable text-center"><span class="delete"><img src="../themes/images/delete.png" alt="delete"></span></td>
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
	        <div class="text-center">
                {$pages.firstItemNumber} to {$pages.lastItemNumber} of {$pages.totalItemCount}<br />
				<ul class="pagination">		
	                {if $pages.current != $pages.first}
	                    <li><a id="firstpage" href="{$pagename}?page={$pages.first}{$search_player}{$search_rate}{$sort}{$order}"> &lt;&lt; </a></li>
	                {/if}
	
	                {if isset($pages.previous)}
	                    <li><a id="previouspage" href="{$pagename}?page={$pages.previous}{$search_player}{$search_rate}{$sort}{$order}">  &lt; </a></li>
	                {/if}
	
	                {foreach item=p from=$pages.pagesInRange}
	                    {if $pages.current == $p}
	                        <li><span>{$p}</span></li>
	                    {else}
	                        <li><a id="{$p}page" href="{$pagename}?page={$p}{$search_player}{$search_rate}{$sort}{$order}">  {$p} </a></li>
	                    {/if}
	                {/foreach}
	
	                {if isset($pages.next)}
	                    <li><a id="nextpage" href="{$pagename}?page={$pages.next}{$search_player}{$search_rate}{$sort}{$order}"> &gt; </a></li>
	                {/if}
	
	                {if $pages.current != $pages.last}
	                    <li><a id="lastpage" href="{$pagename}?page={$pages.last}{$search_player}{$search_rate}{$sort}{$order}"> &gt;&gt; </a></li>
	                {/if}
	           </ul>
           </div>
			<br /><br /><br />
	    {* pagination links *}
	
	{else}
	    there is no-data.
	{/if}
	
</div>

<script type="text/javascript" src="../themes/js/Library/thickbox.js"></script>
<script type="text/javascript" src="../themes/js/append.js"></script>