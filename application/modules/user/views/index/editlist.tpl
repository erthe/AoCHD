<link rel="stylesheet" type="text/css" href="{$base}/themes/css/thickbox.css" type="text/css" />
{if $items|@count > 0}

        <table id="tbl" class="table-center">
            <thead>
                <tr>
                    <th id="sort_status0" abbr="player_name" name="{$sortkey0}" class="playername text-center">プレイヤー名<img class="icon" src="{$order0}"></th>  
                    <th id="sort_status1" abbr="rate" name="{$sortkey1}" class="rate text-center">レート<img class="icon" src="{$order1}"></th>
                    <th id="sort_status2" abbr="total" name="{$sortkey2}" class="number text-center">ゲーム数<img id="status2" class="icon" src="{$order2}"></th>
                    <th id="sort_status3" abbr="win" name="{$sortkey3}" class="number text-center">勝利<img  class="icon" src="{$order3}"></th>
                    <th id="sort_status4" abbr="lose" name="{$sortkey4}" class="number text-center">敗北<img class="icon" src="{$order4}"></th>
                    <th id="sort_status5" abbr="percent" name="{$sortkey5}" class="number text-center">勝率<img class="icon" src="{$order5}"></th>
                    <th class="editable text-center">編集</th>
                    <th class="editable text-center">閲覧</th>
                    {*<th class="editable text-center">削除</th>*}
                </tr>
            </thead>
            
            <tbody>
                {$no = 1}
                {foreach item=item from=$items}
                    <tr id="trno_{$no}" class="list">
                        <td>{$item.player_name|escape}</td>
                        <td class="text-right">{$item.rate|escape}</td>
                        <td class="text-right">{$item.total|escape}</td>
                        <td class="text-right">{$item.win|escape}</td>
                        <td class="text-right">{$item.lose|escape}</td>
                        <td class="text-right">{if isset($item.percent)}{$item.percent|escape}{else}0.000{/if}%</td>
                        <td class="editable text-center"><a href="#" id="player-data" name="{$item.player_id|escape}"><img src="{$base}/themes/images/edit.png" alt="edit"></a></td>
                        <td class="editable text-center"><a href="index/playerdetail/player_id/{$item.player_id|escape}/rate_id/{$item.rate_id|escape}"><img src="{$base}/themes/images/show.png" alt="show"></a></td>
                        {*<td id="{$item.player_id|escape}" class="editable text-center"><span class="delete"><img src="../themes/images/delete.png" alt="delete"></span></td>*}
                    </tr>
                    {$no = $no + 1}
                {/foreach}
            </tbody>
        </table>

        {* pagination links *}
        {if $searchname != ''}{$search_player = '/'|cat:$searchname}{else}{$search_player = '/'|cat:'null'}{/if}
        {if $searchrate_up != ''}{$search_rate_up = '/'|cat:$searchrate_up}{else}{$search_rate_up='/'|cat:'null'}{/if}
        {if $searchrate_down != ''}{$search_rate_down = '/'|cat:$searchrate_down}{else}{$search_rate_down='/'|cat:'null'}{/if}
        {if $searchgame_number != ''}{$search_game_number = '/'|cat:$searchgame_number}{else}{$searchgame_number='/'|cat:'null'}{/if}
        {if isset($sortkey)}{$sort = '/'|cat:$sortkey}{else}{$sort='/'|cat:'null'}{/if}
        {if isset($orderkey)}{$order = '/'|cat:$orderkey|cat:'/'}{else}{$order='/'|cat:'null'|cat:'/'}{/if}
        <div class="text-center">
            {$pages.firstItemNumber|escape} to {$pages.lastItemNumber|escape} of {$pages.totalItemCount|escape}<br />
			<ul class="pagination">		
                {if $pages.current != $pages.first}
                    <li><a id="firstpage" href="{$base}/user/index/{$pagename}?page={$pages.first|escape}{$search_player}{$search_rate_up}{$search_rate_down}{$searchgame_number}{$sort}{$order}"> &lt;&lt; </a></li>
                {/if}

                {if isset($pages.previous)}
                    <li><a id="previouspage" href="{$base}/user/index/{$pagename}?page={$pages.previous|escape}{$search_player}{$search_rate_up}{$search_rate_down}{$searchgame_number}{$sort}{$order}">  &lt; </a></li>
                {/if}

                {foreach item=p from=$pages.pagesInRange}
                    {if $pages.current == $p}
                        <li><span>{$p|escape}</span></li>
                    {else}
                        <li><a id="{$p}page" href="{$base}/user/index/{$pagename}?page={$p|escape}{$search_player}{$search_rate_up}{$search_rate_down}{$searchgame_number}{$sort}{$order}">  {$p} </a></li>
                    {/if}
                {/foreach}

                {if isset($pages.next)}
                    <li><a id="nextpage" href="{$base}/user/index/{$pagename}?page={$pages.next|escape}{$search_player}{$search_rate_up}{$search_rate_down}{$searchgame_number}{$sort}{$order}"> &gt; </a></li>
                {/if}

                {if $pages.current != $pages.last}
                    <li><a id="lastpage" href="{$base}/user/index/{$pagename}?page={$pages.last|escape}{$search_player}{$search_rate_up}{$search_rate_down}{$searchgame_number}{$sort}{$order}"> &gt;&gt; </a></li>
                {/if}
           </ul>
       </div>
		<br /><br /><br />
    {* pagination links *}

{else}
    there is no-data.
{/if}

<script type="text/javascript" src="{$base}/themes/js/append.js"></script>