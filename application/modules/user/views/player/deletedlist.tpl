<div id="deletedlist">
	{if $items|@count > 0}
	
	        <table id="tbl" class="table-center">
	            <thead>
	                <tr>
	                    <th id="sort_status0" abbr="player_name" name="{$sortkey0}" class="playername text-center" name="deletedlist">プレイヤー名<img class="icon" src="{$order0}"></th>  
	                    <th id="sort_status1" abbr="rate" name="{$sortkey1}" class="rate text-center">レート<img class="icon" src="{$order1}"></th>
	                    <th id="sort_status2" abbr="total" name="{$sortkey2}" class="number text-center">ゲーム数<img id="status2" class="icon" src="{$order2}"></th>
	                    <th id="sort_status2" abbr="win" name="{$sortkey2}" class="number text-center">勝利<img class="icon" src="{$order2}"></th>
	                    <th id="sort_status3" abbr="lose" name="{$sortkey3}" class="number text-center">敗北<img class="icon" src="{$order3}"></th>
	                    <th id="sort_status4" abbr="percent" name="{$sortkey4}" class="number text-center">勝率<img class="icon" src="{$order4}"></th>
	                    <th class="reason text-center">削除理由</th>
	                    {*<th class="editable text-center">編集</th>*}
	                    <th class="editable text-center">閲覧</th>
	                    <th class="editable text-center">復元</th>
	                </tr>
	            </thead>
	            
	            <tbody>
	                {$no = 1}
	                {foreach item=item from=$items}
	                    <tr id="trno_{$no}" class="list">
	                        <td>{$item.player_name}</td>
	                        <td class="text-right">{$item.rate|escape}</td>
	                        <td class="text-right">{$item.total|escape}</td>
	                        <td class="text-right">{$item.win|escape}</td>
	                        <td class="text-right">{$item.lose|escape}</td>
	                        <td class="text-right">{if isset($item.percent)}{$item.percent|escape}{else}0.000{/if}%</td>
	                        <td>{$item.memo|escape}</td>
	                        {*<td class="editable text-center"><a href="playeredit/id/{$item.player_id|escape}?width=500&height=280&modal=true" class="thickbox"><img src="{$base}/themes/images/edit.png" alt="edit"></a></td>*}
	                        <td class="editable text-center"><a href="{$base}/user/index/playerdetail/player_id/{$item.player_id|escape}/rate_id/{$item.rate_id|escape}"><img src="{$base}/themes/images/show.png" alt="show"></a></td>
	                        <td id="{$item.player_id|escape}" class="editable text-center"><span class="revert"><img src="{$base}/themes/images/revert.png" alt="revert"></span></td>
	                        
	                    </tr>
	                    {$no = $no + 1}
	                {/foreach}
	            </tbody>
	        </table>
	
	        {* pagination links *}
	        {if $searchname != ''}{$search_player = '/'|cat:$searchname}{else}{$search_player = '/'|cat:'null'}{/if}
	        {if $searchrate_up != ''}{$search_rate_up = '/'|cat:$searchrate_up}{else}{$search_rate_up='/'|cat:'null'}{/if}
	        {if $searchrate_down != ''}{$search_rate_down = '/'|cat:$searchrate_down}{else}{$search_rate_down='/'|cat:'null'}{/if}
	        {if isset($sortkey)}{$sort = '/'|cat:$sortkey}{else}{$sort='/'|cat:'null'}{/if}
	        {if isset($orderkey)}{$order = '/'|cat:$orderkey|cat:'/'}{else}{$order='/'|cat:'null'|cat:'/'}{/if}
	        <table class="table-center">
	        <tr>
	            <td>
	                {$pages.firstItemNumber|escape} to {$pages.lastItemNumber|escape} of {$pages.totalItemCount|escape} |
	
	                {if $pages.current != $pages.first}
	                   <li><a id="firstpage" href="{$pagename}?page={$pages.first|escape}{$search_player}{$search_rate_up}{$search_rate_down}{$sort}{$order}"> &lt;&lt; </a></li>
	                {/if}
	
	                {if isset($pages.previous)}
	                    <a id="previouspage" href="{$pagename}?page={$pages.previous|escape}{$search_player}{$search_rate_up}{$search_rate_down}{$sort}{$order}">  &lt; </a>
	                {/if}
	
	                {foreach item=p from=$pages.pagesInRange}
	                    {if $pages.current == $p}
	                        {$p|escape}
	                    {else}
	                        <a id="{$p|escape}page" href="{$pagename}?page={$p|escape}{$search_player}{$search_rate_up}{$search_rate_down}{$sort}{$order}">  {$p|escape} </a>
	                    {/if}
	                {/foreach}
	
	                {if isset($pages.next)}
	                    <a id="nextpage" href="{$pagename}?page={$pages.next|escape}{$search_player}{$search_rate_up}{$search_rate_down}{$sort}{$order}"> &gt; </a>
	                {/if}
	
	                {if $pages.current != $pages.last}
	                    <a id="lastpage" href="{$pagename}?page={$pages.last|escape}{$search_player}{$search_rate_up}{$search_rate_down}{$sort}{$order}"> &gt;&gt; </a>
	                {/if}
	            </td>
	        </tr>
	    </table>
	
	    {* pagination links *}
	
	{else}
	    there is no-data.
	{/if}
</div>

<script type="text/javascript" src="{$base}/themes/js/append.js"></script>