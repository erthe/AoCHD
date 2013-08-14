{include file=$header}
{include file=$status}
{include file=$menu}

<div class="wrapper">
    {if $items|@count > 0}

        <table id="tbl" class="table-center">
            <thead>
                <tr>
                    <th class="userid text-center">ID</th>
                    <th class="username text-centering">管理者名</th>
                    <th class="login text-center">login</th>
                    <th class="status text-center">状態</th>
                    <th class="datetime text-center">作成日</th>
                    <th class="datetime text-center">更新日</th>
                    <th class="editable text-center">編集</th>
                    <th class="editable text-center">閲覧</th>
                    <th class="editable text-center">戻す</th>
                </tr>
            </thead>
            
            <tbody>
                {$no = 1}
                {foreach item=item from=$items}
                    <tr id="trno_{$no}" class="list">
                        <td class="userid text-right">{$item.admin_id}</td>
                        <td>{$item.admin_name}</td>
                        <td class="text-center">
                            {if $item.login_status == 1}
                                <img src="../themes/images/login.gif" alt="login">
                            {else}
                                <img src="../themes/images/logoff.gif" alt="logoff">
                            {/if}
                        </td>
                        <td>
                            {if $item.status == 1}
                                登録
                            {else}
                                退会
                            {/if}
                        </td>
                        <td class="text-right">{$item.created_on}</td>
                        <td class="text-right">{$item.updated_on}</td>
                        <td class="editable text-center"><a href="/admin/adminedit/id/{$item.admin_id}?width=500&height=255&modal=true" class="thickbox"><img src="../themes/images/edit.gif" alt="edit"></a></td>
                        <td class="editable text-center"><img src="../themes/images/show.gif" alt="show"></td>
                        <td id="{$item.admin_id}" class="editable text-center"><span class="revert"><img src="../themes/images/revert.gif" alt="revert"></span></td>
                    </tr>
                    {$no = $no + 1}
                {/foreach}
            </tbody>
        </table>

    {else}
        there is no-data.
    {/if}
    
    <div class="option">
        <a href="adminlist">管理者一覧</a>
    </div>
</div> 

{include file=$footer}