{include file=$header}

{if $items|@count > 0}

        <table id="tbl" class="table-center">
            <thead>
                <tr>
                	<th>ID</th>
                    <th class="playername text-center">ユーザー名</th>  
                    <th class="rate text-center">権限</th>
                    <th class="editable text-center">復元</th>
                </tr>
            </thead>
            
            <tbody>
                {$no = 1}
                {foreach item=item from=$items}
                    <tr id="trno_{$no}" class="list">
                    	<td class="text-right">{$item.user_id|escape}</td>
                        <td>{$item.user_name|escape}</td>
                        <td>{$item.user_control|escape}</td>
                        <td id="{$item.user_id|escape}" class="editable text-center"><span class="revert"><img src="{$base}/themes/images/revert.png" alt="revert"></span></td>
                    </tr>
                    {$no = $no + 1}
                {/foreach}
            </tbody>
        </table>

{else}
    there is no-data.
{/if}

{include file=$footer}
