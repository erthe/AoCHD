{include file=$header}
{include file=$status}
{include file=$menu}

{if $items|@count > 0}
    <table>
        <thead>
            <tr>
                <th>user_id</th>
                <th>user_name</th>
                <th>email</th>
                <th>created_on</th>
                <th>updated_on</th>
       <th class="editable">edit</th>
       <th class="editable">show</th>
       <th class="editable">delete</th>
            </tr>
        </thead>

        <tbody>
            {foreach item=item from=$items}
                <tr class="list">
                    <td>{$item.user_id}</td>
                    <td>{$item.user_name}</td>
                    <td>{$item.email}</td>
                    <td>{$item.created_on}</td>
                    <td>{$item.updated_on}</td>
        <td class="editable"><a href="/admin/useredit/id/{$item.user_id}?width=500&height=300&modal=true" class="thickbox"><img src="../themes/images/edit.gif" alt="edit"></a></td>
        <td class="editable"><img src="../themes/images/show.gif" alt="show"></td>
        <td class="editable"><img src="../themes/images/delete.gif" alt="delete"></td>
                </tr>
            {/foreach}
        </tbody>
    </table>
    
{else}
    there is no-data.
{/if}

{include file=$footer}