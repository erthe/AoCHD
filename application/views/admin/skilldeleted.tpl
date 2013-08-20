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
                    <th class="login text-center">説明</th>
                    <th class="datetime text-center">作成日</th>
                    <th class="datetime text-center">更新日</th>
                    <th class="editable text-center">編集</th>
                    <th class="editable text-center">戻す</th>
                </tr>
            </thead>
            
            <tbody>
                {$no = 1}
                {foreach item=item from=$items}
                    <tr id="trno_{$no}" class="list">
                        <td class="userid text-right">{$item.skill_id}</td>
                        <td>{$item.skill_name}</td>
                        <td>{$item.description}</td>
                        <td class="text-right">{$item.created_on}</td>
                        <td class="text-right">{$item.updated_on}</td>
                        <td class="editable text-center"><a href="/admin/skilledit/id/{$item.skill_id}?width=500&height=255&modal=true" class="thickbox"><img src="../themes/images/edit.gif" alt="edit"></a></td>
                        <td id="{$item.skill_id}" class="editable text-center"><span class="revert"><img src="../themes/images/revert.gif" alt="revert"></span></td>
                    </tr>
                    {$no = $no + 1}
                {/foreach}
            </tbody>
        </table>

    {else}
        there is no-data.
    {/if}
    
    <div class="option">
        <a href="skilllist">スキル一覧</a>
    </div>
</div> 

{include file=$footer}