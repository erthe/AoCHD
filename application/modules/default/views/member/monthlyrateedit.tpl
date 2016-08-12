{include file=$header}

{if $items|@count > 0}
    <table id="tbl" class="table-center">
        <thead>
            <tr>
                <th class="playername text-center">プレイヤー名</th>  
                <th class="rate text-center">変更前</th>
                <th class="rate text-center">変更後</th>
                <th class="text-center">変更者</th>
                <th class="datetime text-center">日時</th>
            </tr>
        </thead>
        
        <tbody>
            {$no = 1}
            {foreach item=item from=$items}
                <tr id="trno_{$no}" class="list">
                	<td>{$item.player_name|escape}</td>
                    <td class="text-right">{$item.previous_rate|escape}</td>
                    <td class="text-right">{$item.new_rate|escape}</td>
                    <td class="left-space">{$item.user_name|escape}</td>
                    <td class="text-right">{$item.edited_on|escape}</td>
                </tr>
                {$no = $no + 1}
            {/foreach}
        </tbody>
    </table>
{else}
    there is no-data.
{/if}
<br /><br /><br /><br />
{include file=$footer}
