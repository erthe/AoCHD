{include file=$header}
{include file=$status}
{include file=$menu}

<div class="wrapper">
    {if $items|@count > 0}
        {include file=$usersearch}

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
                    <th class="editable text-center">delete</th>
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
                        <td id="{$item.user_id}" class="editable text-center"><span class="delete"><img src="../themes/images/delete.gif" alt="delete"></span></td>
                    </tr>
                    {$no = $no + 1}
                {/foreach}
            </tbody>
        </table>

        {* pagination links *}
        <table class="table-center">
        <tr>
            <td>
                {$pages.firstItemNumber} to {$pages.lastItemNumber} of {$pages.totalItemCount} |

                {if $pages.current != $pages.first}
                    <a href="userlist?page={$pages.first}"> &lt;&lt; </a>
                {/if}

                {if isset($pages.previous)}
                    <a href="userlist?page={$pages.previous}">  &lt; </a>
                {/if}

                {foreach item=p from=$pages.pagesInRange}

                    {if $pages.current == $p}
                        {$p}
                    {else}
                        <a href="userlist?page={$p}">  {$p} </a>
                    {/if}
                {/foreach}

                {if isset($pages.next)}
                    <a href="userlist?page={$pages.next}"> &gt; </a>
                {/if}

                {if $pages.current != $pages.last}
                    <a href="userlist?page={$pages.last}"> &gt;&gt; </a>
                {/if}
            </td>
        </tr>
    </table>

    {* pagination links *}

    {else}
        there is no-data.
    {/if}
    
    <div class="option">
        <a href="usercreate?width=500&height=255&modal=true" class="thickbox">Create User</a>
        <a href="userdeleted">Deleted User</a>
    </div>
</div> 

{include file=$footer}