{include file=$header}

{if $items|@count > 0}

        <table id="tbl" class="table-center">
            <thead>
                <tr>
                	<th class="text-center">ID</th>
                    <th class="datetime text-center">日時</th>
                    <th class="text-center">内容</th>
                    <th class="editable text-center">復元</th>
                </tr>
            </thead>
            
            <tbody>
                {$no = 1}
                {foreach item=item from=$items}
                    <tr id="trno_{$no}" class="list">
                    	<td class="text-right">{$item.updatelog_id|escape}</td>
                    	<td class="text-right">{$item.update_date|escape}</td>
                        <td>{$item.update_note|escape|truncate:50}</td>
                        <td id="{$item.updatelog_id|escape}" class="editable text-center"><span class="revert"><img src="{$base}/themes/images/revert.png" alt="revert"></span></td>
                    </tr>
                    {$no = $no + 1}
                {/foreach}
            </tbody>
        </table>

{else}
    there is no-data.
{/if}

{include file=$footer}
