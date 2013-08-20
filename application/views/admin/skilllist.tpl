{include file=$header}
{include file=$status}
{include file=$menu}

<div class="wrapper">
    {if $items|@count > 0}
        
        <table id="tbl" class="table-center">
            <thead>
                <tr>
                    <th class="userid text-center">ID</th>
                    <th class="username text-centering">スキル名</th>
                    <th class="text-center">説明</th>
                    <th class="editable text-center">編集</th>
                    <th class="editable text-center">削除</th>
                </tr>
            </thead>
            
            <tbody>
                {$no = 1}
                {foreach item=item from=$items}
                    <tr id="trno_{$no}" class="list">
                        <td class="userid text-right">{$item.skill_id}</td>
                        <td>{$item.skill_name}</td>
						<td>{$item.description}</td>
                        <td class="editable text-center"><a href="/admin/skilledit/id/{$item.skill_id}?width=500&height=255&modal=true" class="thickbox"><img src="../themes/images/edit.gif" alt="edit"></a></td>
                        <td id="{$item.skill_id}" class="editable text-center"><span class="delete"><img src="../themes/images/delete.gif" alt="delete"></span></td>
                    </tr>
                    {$no = $no + 1}
                {/foreach}
            </tbody>
        </table>

        {* pagination links *}
        <table class="table-center">
        <tr>
            <td>
                {$pages.firstItemNumber} to {$pages.lastItemNumber} of {$pages.totalItemCount} |

                {if $pages.current != $pages.first}
                    <a href="skilllist?page={$pages.first}"> &lt;&lt; </a>
                {/if}

                {if isset($pages.previous)}
                    <a href="skilllist?page={$pages.previous}">  &lt; </a>
                {/if}

                {foreach item=p from=$pages.pagesInRange}

                    {if $pages.current == $p}
                        {$p}
                    {else}
                        <a href="skilllist?page={$p}">  {$p} </a>
                    {/if}
                {/foreach}

                {if isset($pages.next)}
                    <a href="skilllist?page={$pages.next}"> &gt; </a>
                {/if}

                {if $pages.current != $pages.last}
                    <a href="skilllist?page={$pages.last}"> &gt;&gt; </a>
                {/if}
            </td>
        </tr>
    </table>

    {* pagination links *}

    {else}
        there is no-data.
    {/if}
    
    <div class="option">
        <a href="skillcreate?width=500&height=255&modal=true" class="thickbox">スキル新規登録</a>
        <a href="skilldeleted">削除済みスキル</a>
        <a href="skillupload">CSVアップロード</a>
        <a href="skilldownload">CSVダウンロード</a>
    </div>
</div> 

{include file=$footer}
