{include file=$header}

{if $items|@count > 0}

        <table id="tbl" class="table-center">
            <thead>
                <tr>
                	<th>ID</th>
                    <th class="playername text-center">ユーザー名</th>  
                    <th class="rate text-center">権限</th>
                    <th class="editable text-center">編集</th>
                    <th class="editable text-center">復元</th>
                </tr>
            </thead>
            
            <tbody>
                {$no = 1}
                {foreach item=item from=$items}
                    <tr id="trno_{$no}" class="list">
                    	<td class="text-right">{$item.user_id}</td>
                        <td>{$item.user_name}</td>
                        <td>{$item.user_control}</td>
                        <td class="editable text-center"><a href="useredit/id/{$item.user_id}?width=500&height=280&modal=true" class="thickbox"><img src="../themes/images/edit.gif" alt="edit"></a></td>
                        <td id="{$item.user_id}" class="editable text-center"><span class="revert"><img src="../themes/images/revert.gif" alt="revert"></span></td>
                    </tr>
                    {$no = $no + 1}
                {/foreach}
            </tbody>
        </table>

{else}
    there is no-data.
{/if}
<div class="option">
	<a href="userlist">ユーザー編集画面へ</a>
</div>
{include file=$footer}
