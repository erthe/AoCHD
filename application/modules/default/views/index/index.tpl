{include file=$header}

<h1>部屋一覧</h1>

{if $games|@count > 0}
    <table>
        <thead>
            <tr>
            	<th class="datetime text-center" rowspan="2">作成時間</th>
                <th class="player text-center">チーム1 プレイヤー1</th>
                <th class="player text-center">プレイヤー2</th>
                <th class="player text-center">プレイヤー3</th>
                <th class="player text-center">プレイヤー4</th>
            </tr>
            <tr>
                <th class="player text-center">チーム2 プレイヤー1</th>
                <th class="player text-center">プレイヤー2</th>
                <th class="player text-center">プレイヤー3</th>
                <th class="player text-center">プレイヤー4</th>
            </tr>
        </thead>
        
        <tbody>
        	{$n = 0}
            {foreach item=item from=$games}
                <tr>
                    <td>{$item.created_on|escape}</td>
                    <td>{$team1[$n].member_0|truncate:16}</td>
                	{section name=i start=0 loop=$team1[$n].num_member-1}
                		{assign var=member value=member_|cat:$smarty.section.i.iteration}
						<td>{$team1[$n].$member|truncate:16}</td>
	                {/section}
                </tr>

				<tr>
                    <td>{$item.created_on|escape}</td>
                    <td>{$team2[$n].member_0|truncate:16}</td>
                	{section name=j start=0 loop=$team2[$n].num_member-1}
                		{assign var=member value=member_|cat:$smarty.section.j.iteration}
						<td>{$team2[$n].$member|truncate:16}</td>
	                {/section}
                </tr>
            	{$n = $n + 1}
            {/foreach}
        </tbody>
    </table>
    
{else}
	 現在、ゲームはありません。<br />
	{$description} <br />
	<img src="{$base}/themes/images/top/trashwall{$img_num}.png" alt="{$description}"><br /><br />
{/if}

{if $notes|@count > 0}
    <table>
        <thead>
            <tr>
            	<th class="date text-center">更新日</th>
                <th class="text-center">更新内容</th>
            </tr>
        </thead>

        <tbody>
            {foreach item=item from=$notes}
                <tr>
                    <td>{$item.update_date|date_format:"%Y/%m/%d"|escape}</td>
                    <td><span class="autolink">{$item.update_note|escape}</span></td>
                </tr>
            {/foreach}
        </tbody>
    </table>
    
    {* pagination links *}
    <div class="text-center">
		{$pages.firstItemNumber|escape} to {$pages.lastItemNumber|escape} of {$pages.totalItemCount|escape}<br />
		<ul class="pagination">
            {if $pages.current != $pages.first}
                <li><a href="index?page={$pages.first|escape}"> &lt;&lt; </a>
            {/if}

            {if isset($pages.previous)}
                <li><a href="index?page={$pages.previous|escape}">  &lt; </a></li>
            {/if}

            {foreach item=p from=$pages.pagesInRange}

                {if $pages.current == $p}
                    <li><span>{$p|escape}</span></li>
                {else}
                    <li><a href="index?page={$p|escape}">  {$p} </a></li>
                {/if}
            {/foreach}

            {if isset($pages.next)}
                <li><a href="index?page={$pages.next|escape}"> &gt; </a></li>
            {/if}

            {if $pages.current != $pages.last}
                <li><a href="index?page={$pages.last|escape}"> &gt;&gt; </a></li>
            {/if}
        </ul>
    </div>
    <br /><br />
	{* pagination links *}
    
{else}
	未更新
{/if}

{include file=$footer}