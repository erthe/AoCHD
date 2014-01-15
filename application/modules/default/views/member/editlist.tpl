<link rel="stylesheet" type="text/css" href="../themes/css/thickbox.css" type="text/css" />
{if $items|@count > 0}

        <table id="tbl" class="table-center">
            <thead>
                <tr>
                    <th id="sort_status0" abbr="player_name" name="{$sortkey0}" class="playername text-center">プレイヤー名<img class="icon" src="{$order0}"></th>  
                    <th id="sort_status1" abbr="rate" name="{$sortkey1}" class="rate text-center">レート<img class="icon" src="{$order1}"></th>
                    <th id="sort_status2" abbr="win" name="{$sortkey2}" class="number text-center">勝利<img  class="icon" src="{$order2}"></th>
                    <th id="sort_status3" abbr="lose" name="{$sortkey3}" class="number text-center">敗北<img class="icon" src="{$order3}"></th>
                    <th id="sort_status4" abbr="percent" name="{$sortkey4}" class="number text-center">勝率<img class="icon" src="{$order4}"></th>
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
        {if $searchrate_up != ''}{$search_rate_up = '/'|cat:$searchrate_up}{else}{$search_rate_up='/'|cat:'null'}{/if}
        {if $searchrate_down != ''}{$search_rate_down = '/'|cat:$searchrate_down}{else}{$search_rate_down='/'|cat:'null'}{/if}
        {if isset($sortkey)}{$sort = '/'|cat:$sortkey}{else}{$sort='/'|cat:'null'}{/if}
        {if isset($orderkey)}{$order = '/'|cat:$orderkey|cat:'/'}{else}{$order='/'|cat:'null'|cat:'/'}{/if}
        <div class="text-center">
            {$pages.firstItemNumber} to {$pages.lastItemNumber} of {$pages.totalItemCount}<br />
			<ul class="pagination">		
                {if $pages.current != $pages.first}
                    <li><a id="firstpage" href="{$pagename}?page={$pages.first}{$search_player}{$search_rate_up}{$search_rate_down}{$sort}{$order}"> &lt;&lt; </a></li>
                {/if}

                {if isset($pages.previous)}
                    <li><a id="previouspage" href="{$pagename}?page={$pages.previous}{$search_player}{$search_rate_up}{$search_rate_down}{$sort}{$order}">  &lt; </a></li>
                {/if}

                {foreach item=p from=$pages.pagesInRange}
                    {if $pages.current == $p}
                        <li><span>{$p}</span></li>
                    {else}
                        <li><a id="{$p}page" href="{$pagename}?page={$p}{$search_player}{$search_rate_up}{$search_rate_down}{$sort}{$order}">  {$p} </a></li>
                    {/if}
                {/foreach}

                {if isset($pages.next)}
                    <li><a id="nextpage" href="{$pagename}?page={$pages.next}{$search_player}{$search_rate_up}{$search_rate_down}{$sort}{$order}"> &gt; </a></li>
                {/if}

                {if $pages.current != $pages.last}
                    <li><a id="lastpage" href="{$pagename}?page={$pages.last}{$search_player}{$search_rate_up}{$search_rate_down}{$sort}{$order}"> &gt;&gt; </a></li>
                {/if}
           </ul>
       </div>
		<br /><br /><br />
    {* pagination links *}

{else}
    there is no-data.
{/if}

<script type="text/javascript" src="../themes/js/append.js"></script>