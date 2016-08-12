{if $items|@count > 0}
    <table id="tbl" class="table-center">
        <thead>
            <tr>
                <th class="playername text-center">プレイヤー名</th> 
            </tr>
        </thead>
        
        <tbody>
            {$no = 1}
            {foreach item=item from=$items}
                <tr id="trno_{$no}" class="list">
                    <td>{$item|escape}</td>
                </tr>
                {$no = $no + 1}
            {/foreach}
        </tbody>
    </table>
{else}
    there is no-data.
{/if}
<a href="{$base}/user/analyze/index">戻る</a>

<script type="text/javascript" src="../themes/js/append.js"></script>