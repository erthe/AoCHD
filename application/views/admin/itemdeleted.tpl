{include file=$header}
{include file=$status}
{include file=$menu}

<div class="wrapper">
    {if $items|@count > 0}

        <table id="tbl" class="table-center">
            <thead>
                <tr>
                    <th class="userid text-center">ID</th>
                    <th class="username text-centering">アイテム名</th>
                    <th class="login text-center">威力</th>
                    <th class="login text-center">命中</th>
                    <th class="login text-center">必殺</th>
                    <th class="login text-center">重さ</th>
                    <th class="login text-center">耐久</th>
                    <th class="login text-center">武器レベル</th>
                    <th class="login text-center">種別</th>
                    <th class="login text-center">価格</th>
                    <th class="login text-center">説明</th>
                    <th class="editable text-center">編集</th>
                    <th class="editable text-center">装備</th>
                    <th class="editable text-center">戻す</th>
                </tr>
            </thead>
            
            <tbody>
                {$no = 1}
                {foreach item=item from=$items}
                    <tr id="trno_{$no}" class="list">
                        <td class="userid text-right">{$item.item_id}</td>
                        <td>{$item.item_name}</td>
                        <td>{$item.power}</td>
                        <td>{$item.hit_chance}</td>
                        <td>{$item.special_chance}</td>
                        <td>{$item.weight}</td>
                        <td>{$item.durability}</td>
                        <td>{$item.weapon_level}</td>
                        <td>{$item.weapon_type}</td>
                        <td>{$item.price}</td>
                        <td>{$item.description}</td>
                        <td class="editable text-center"><a href="/admin/itemedit/id/{$item.item_id}?width=630&height=255&modal=true" class="thickbox"><img src="../themes/images/edit.gif" alt="edit"></a></td>
                        <td class="editable text-center"><img src="../themes/images/show.gif" alt="show"></td>
                        <td id="{$item.item_id}" class="editable text-center"><span class="revert"><img src="../themes/images/revert.gif" alt="revert"></span></td>
                    </tr>
                    {$no = $no + 1}
                {/foreach}
            </tbody>
        </table>

    {else}
        there is no-data.
    {/if}
    
    <div class="option">
        <a href="itemlist">アイテム一覧</a>
    </div>
</div> 

{include file=$footer}