{include file=$header}
{include file=$status}
{include file=$menu}

<div class="wrapper">
    {if $items|@count > 0}

        <table id="tbl" class="table-center">
            <thead>
                <tr>
                    <th class="rank text-center">ID</th>
                    <th class="rank text-center">ランク</th>
                    <th class="classname text-center">クラス名</th>
                    <th class="ability text-center">HP</th>
                    <th class="ability text-center">STR</th>
                    <th class="ability text-center">MAG</th>
                    <th class="ability text-center">SKL</th>
                    <th class="ability text-center">SPD</th>
                    <th class="ability text-center">LUK</th>
                    <th class="ability text-center">DEF</th>
                    <th class="ability text-center">MDF</th>
                    <th class="ability text-center">BOD</th>
                    <th class="grow text-center">HP率</th>
                    <th class="grow text-center">STR率</th>
                    <th class="grow text-center">MAG率</th>
                    <th class="grow text-center">SKL率</th>
                    <th class="grow text-center">SPD率</th>
                    <th class="grow text-center">LUK率</th>
                    <th class="grow text-center">DEF率</th>
                    <th class="grow text-center">MDF率</th>
                    <th class="grow text-center">BOD率</th>
                    <th class="text-center">スキル</th>
                    <th class="text-center">選択</th>
                    <th class="editable2 text-center">編集</th>
                    <th class="editable2 text-center">復元</th>
                </tr>
            </thead>
            
            <tbody>
                {$no = 1}
                {foreach item=item from=$items}
                    <tr id="trno_{$no}" class="list">
                        <td class="text-right matrix">{$item.class_id}</td>
                        <td class="text-right">{$item.class_rank}</td>
						<td class="matrix">{$item.class_name}</td>
						<td class="text-right matrix">{$item.hp_val}</td>
						<td class="text-right matrix">{$item.str_val}</td>
						<td class="text-right matrix">{$item.mag_val}</td>
						<td class="text-right matrix">{$item.skl_val}</td>
						<td class="text-right matrix">{$item.spd_val}</td>
						<td class="text-right matrix">{$item.luk_val}</td>
						<td class="text-right matrix">{$item.def_val}</td>
						<td class="text-right matrix">{$item.mdf_val}</td>
						<td class="text-right matrix">{$item.bod_val}</td>
						<td class="text-right matrix">{$item.hp_grow}%</td>
						<td class="text-right matrix">{$item.str_grow}%</td>
						<td class="text-right matrix">{$item.mag_grow}%</td>
						<td class="text-right matrix">{$item.skl_grow}%</td>
						<td class="text-right matrix">{$item.spd_grow}%</td>
						<td class="text-right matrix">{$item.luk_grow}%</td>
						<td class="text-right matrix">{$item.def_grow}%</td>
						<td class="text-right matrix">{$item.mdf_grow}%</td>
						<td class="text-right matrix">{$item.bod_grow}%</td>
						<td class="matrix">
                            {if isset($item.own_skl_id)}
                                <span class="text-right">{$item.own_skl_id}</span>
                            {else}
                                <span class="span-center">-</span>
                            {/if}
                        </td>
						<td class="matrix">
                            {if $item.playable == 0}
                                不可
                            {else}
                                可
                            {/if}
                        </td>
                        <td class="editable2 text-center"><a href="/admin/classedit/id/{$item.class_id}?width=400&height=280&modal=true" class="thickbox"><img src="../themes/images/edit.gif" alt="edit"></a></td>
                        <td id="{$item.class_id}" class="editable2 text-center"><span class="revert"><img src="../themes/images/revert.gif" alt="revert"></span></td>
                    </tr>
                    {$no = $no + 1}
                {/foreach}
            </tbody>
        </table>

    {else}
        there is no-data.
    {/if}
    
    <div class="option">
        <a href="classlist">登録済みクラス</a>
    </div>
</div> 

{include file=$footer}
