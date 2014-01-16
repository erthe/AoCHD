{include file=$header}

<h1>部屋一覧</h1>

{if $games|@count > 0}
    <table>
        <thead>
            <tr>
            	<th>作成時間</th>
                <th>プレイヤー1</th>
                <th>プレイヤー2</th>
                <th>プレイヤー3</th>
                <th>プレイヤー4</th>
                <th>プレイヤー5</th>
                <th>プレイヤー6</th>
                <th>プレイヤー7</th>
                <th>プレイヤー8</th>
            </tr>
        </thead>

        <tbody>
            {foreach item=item from=$games}
                <tr>
                    <td>{$item.created_on}</td>
                    <td>{$item.player1_name}</td>
                    <td>{$item.player2_name}</td>
                    <td>{$item.player3_name}</td>
                    <td>{$item.player4_name}</td>
                    <td>{$item.player5_name}</td>
                    <td>{$item.player6_name}</td>
                    <td>{$item.player7_name}</td>
                    <td>{$item.player8_name}</td>
                </tr>
            {/foreach}
        </tbody>
    </table>
    
{else}
    現在、ゲームはありません。
{/if}

{if $notes|@count > 0}
    <table>
        <thead>
            <tr>
            	<th class="text-center">更新日</th>
                <th class="text-center">更新内容</th>
            </tr>
        </thead>

        <tbody>
            {foreach item=item from=$notes}
                <tr>
                    <td>{$item.update_date|date_format:"%Y/%m/%d"}</td>
                    <td>{$item.update_note}</td>
                </tr>
            {/foreach}
        </tbody>
    </table>
    
    {* pagination links *}
    <div class="text-center">
		{$pages.firstItemNumber} to {$pages.lastItemNumber} of {$pages.totalItemCount}<br />
		<ul class="pagination">
            {if $pages.current != $pages.first}
                <li><a href="index?page={$pages.first}"> &lt;&lt; </a>
            {/if}

            {if isset($pages.previous)}
                <li><a href="index?page={$pages.previous}">  &lt; </a></li>
            {/if}

            {foreach item=p from=$pages.pagesInRange}

                {if $pages.current == $p}
                    <li><span>{$p}</span></li>
                {else}
                    <li><a href="index?page={$p}">  {$p} </a></li>
                {/if}
            {/foreach}

            {if isset($pages.next)}
                <li><a href="index?page={$pages.next}"> &gt; </a></li>
            {/if}

            {if $pages.current != $pages.last}
                <li><a href="index?page={$pages.last}"> &gt;&gt; </a></li>
            {/if}
        </ul>
    </div>
	{* pagination links *}
    
{else}
    未更新
{/if}

{include file=$footer}