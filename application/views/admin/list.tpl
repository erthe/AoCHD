{include file=$header}

{if $items|@count > 0}
    <table>
        <thead>
            <tr>
                <th>user_id</th>
                <th>user_status_id</th>
                <th>user_name</th>
                <th>email</th>
                <th>password</th>
                <th>created_on</th>
                <th>updated_on</th>
            </tr>
        </thead>

        <tbody>
            {foreach item=item from=$items}
                <tr>
                    <td>{$item.user_id}</td>
                    <td>{$item.user_status_id}</td>
                    <td>{$item.user_name}</td>
                    <td>{$item.email}</td>
                    <td>{$item.password}</td>
                    <td>{$item.created_on}</td>
                    <td>{$item.updated_on}</td>
                </tr>
            {/foreach}
        </tbody>
    </table>
    
{else}
    there is no-data.
{/if}

{include file=$footer}