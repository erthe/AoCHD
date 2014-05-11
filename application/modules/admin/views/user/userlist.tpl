{include file=$header}
{include file=$userinfo}

{if $items|@count > 0}

        <table id="tbl" class="table-center">
            <thead>
                <tr>
                	<th>ID</th>
                    <th class="playername text-center">ユーザー名</th>  
                    <th class="rate text-center">権限</th>
                    <th class="editable text-center">編集</th>
                    <th class="editable text-center">削除</th>
                </tr>
            </thead>
            
            <tbody>
                {$no = 1}
                {foreach item=item from=$items}
                    <tr id="trno_{$no}" class="list">
                    	<td class="text-right">{$item.user_id|escape}</td>
                        <td>{$item.user_name|escape}</td>
                        <td>{$item.user_control|escape}</td>
                        <td class="editable text-center"><a href="#" id="user_edit" name="{$item.user_id|escape}"><img src="{$base}/themes/images/edit.png" alt="edit"></a></td>
                        <td id="{$item.user_id|escape}" class="editable text-center"><span class="delete"><img src="{$base}/themes/images/delete.png" alt="delete"></span></td>
                    </tr>
                    {$no = $no + 1}
                {/foreach}
            </tbody>
        </table>

{else}
    there is no-data.
{/if}

{include file=$footer}
