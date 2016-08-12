{include file=$header}
<div class="wrapper">
{if $comments|@count > 0}
    <table id="tbl" class="table-center">
    <thead>
        <tr>
        	<th class="playername text-center">対象プレイヤー名</th>
        	<th class="playername text-center">コメンター</th>
        	<th class="text-center">コメント内容</th>  
        	<th class="datetime text-center">投稿日時</th>
        	<th class="editable text-center">削除</th>
        </tr>
    </thead>
    
    <tbody>
        {$no = 1}
        {foreach item=item from=$comments}
            <tr id="trno_{$no}" class="list">
            	<td>{$item.player_name|escape}</td>
                <td>{$item.writer_name|escape}</td>
				<td>{$item.comment|escape}</td>
				<td class="text-right">{$item.posted_date|escape}</td>
				<td id="{$item.player_note_id|escape}" class="editable text-center"><span class="delete"><img src="{$base}/themes/images/delete.png" alt="delete"></span></td}
            </tr>
            {$no = $no + 1}
        {/foreach}
    </tbody>
</table>
    
    {* pagination links *}
    <div class="text-center">
		{$pages.firstItemNumber|escape} to {$pages.lastItemNumber|escape} of {$pages.totalItemCount|escape}<br />
		<ul class="pagination">
            {if $pages.current != $pages.first}
                <li><a href="commentlist?page={$pages.first|escape}"> &lt;&lt; </a>
            {/if}

            {if isset($pages.previous)}
                <li><a href="commentlist?page={$pages.previous|escape}">  &lt; </a></li>
            {/if}

            {foreach item=p from=$pages.pagesInRange}

                {if $pages.current == $p}
                    <li><span>{$p|escape}</span></li>
                {else}
                    <li><a href="commentlist?page={$p|escape}">  {$p} </a></li>
                {/if}
            {/foreach}

            {if isset($pages.next)}
                <li><a href="index?page={$pages.next|escape}"> &gt; </a></li>
            {/if}

            {if $pages.current != $pages.last}
                <li><a href="commentlist?page={$pages.last|escape}"> &gt;&gt; </a></li>
            {/if}
        </ul>
    </div>
    <br /><br />
	{* pagination links *}
    
{else}
	コメント情報なし
{/if}
    
</div> 

{include file=$footer}