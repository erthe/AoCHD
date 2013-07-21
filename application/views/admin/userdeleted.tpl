{include file=$header}
{include file=$status}
{include file=$menu}

<div class="wrapper">
    {if $items|@count > 0}

        <table id="tbl">
            <thead>
                <tr>
                    <th class="userid text-center">id</th>
                    <th class="username text-centering">user_name</th>
                    <th class="email text-center">email</th>
                    <th class="login text-center">login</th>
                    <th class="status text-center">status</th>
                    <th class="memo text-center">memo</th>
                    <th class="datetime text-center">created_on</th>
                    <th class="datetime text-center">updated_on</th>
                    <th class="editable text-center">edit</th>
                    <th class="editable text-center">show</th>
                    <th class="editable text-center">revert</th>
                </tr>
            </thead>
            
            <tbody>
                {$no = 1}
                {foreach item=item from=$items}
                    <tr id="trno_{$no}" class="list">
                        <td class="userid text-right">{$item.user_id}</td>
                        <td>{$item.user_name}</td>
                        <td>{$item.email}</td>
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
                        <td>{$item.memo|truncate:16}</td>
                        <td class="text-right">{$item.created_on}</td>
                        <td class="text-right">{$item.updated_on}</td>
                        <td class="editable text-center"><a href="/admin/useredit/id/{$item.user_id}?width=500&height=255&modal=true" class="thickbox"><img src="../themes/images/edit.gif" alt="edit"></a></td>
                        <td class="editable text-center"><img src="../themes/images/show.gif" alt="show"></td>
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
        <a href="userlist">User List</a>
    </div>
</div> 

{include file=$footer}