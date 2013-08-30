{include file=$header}
{include file=$status}
{include file=$menu}

{include file=$inventorysearch}
<div class="wrapper">
    {if $items|@count > 0}
        
        <table id="tbl" class="table-center">
            <thead>
                <tr>
                    <th class="userid text-center">ID</th>
                    <th class="itemname text-centering">アイテム名</th>
                    <th class="login text-center">威力</th>
                    <th class="login text-center">命中</th>
                    <th class="login text-center">必殺</th>
                    <th class="login text-center">重さ</th>
                    <th class="login text-center">耐久</th>
                    <th class="weapon-level text-center">武器レベル</th>
                    <th class="login text-center">種別</th>
                    <th class="money text-center">価格</th>
                    <th class="text-center">所有者ID</th>
                    <th class="text-center">所有者名</th>
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
                        <td class="text-right">{$item.power}</td>
                        <td class="text-right">{$item.hit_chance}</td>
                        <td class="text-right">{$item.special_chance}</td>
                        <td class="text-right">{$item.weight}</td>
                        <td class=text-right>
                        	{if $item.durability == null}
                                -
                            {else}
                                {$item.current_durability}/{$item.durability}
                            {/if}
                        </td>
                        <td class="text-right">{$item.weapon_level}</td>
                        <td>
                        	{if $item.weapon_type == 1}
                        		剣
                        	{elseif $item.weapon_type == 2}
                        		槍
                        	{elseif $item.weapon_type == 3}
                        		斧
                        	{elseif $item.weapon_type == 4}
                        		弓
                        	{elseif $item.weapon_type == 5}
                        		炎
                        	{elseif $item.weapon_type == 6}
                        		雷
                        	{elseif $item.weapon_type == 7}
                        		風
                        	{elseif $item.weapon_type == 8}
                        		闇
                        	{elseif $item.weapon_type == 9}
                        		光
                        	{else}
                        		無
                        	{/if}
                        	</td>
                        <td class="text-right">
                        	{if $item.price == null}
                                -
                            {else}
                                {$item.price}
                            {/if}
                        </td>
                        <td class="text-right">{$item.user_data_id}</td>
                        <td>{$item.user_name}</td>
                        <td class="editable text-center"><a href="/admin/itemedit/id/{$item.item_id}?width=630&height=255&modal=true" class="thickbox"><img src="../themes/images/edit.gif" alt="edit"></a></td>
                        <td class="editable text-center"><a href="/admin/equipclass/id/{$item.item_id}?width=750&height=400&modal=true" class="thickbox"><img src="../themes/images/show.gif" alt="show"></a></td>
                        <td id="{$item.item_id}" class="editable text-center"><span class="delete"><img src="../themes/images/delete.gif" alt="delete"></span></td>
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
                    <a href="itemlist?page={$pages.first}"> &lt;&lt; </a>
                {/if}

                {if isset($pages.previous)}
                    <a href="itemlist?page={$pages.previous}">  &lt; </a>
                {/if}

                {foreach item=p from=$pages.pagesInRange}

                    {if $pages.current == $p}
                        {$p}
                    {else}
                        <a href="itemlist?page={$p}">  {$p} </a>
                    {/if}
                {/foreach}

                {if isset($pages.next)}
                    <a href="itemlist?page={$pages.next}"> &gt; </a>
                {/if}

                {if $pages.current != $pages.last}
                    <a href="itemlist?page={$pages.last}"> &gt;&gt; </a>
                {/if}
            </td>
        </tr>
    </table>

    {* pagination links *}

    {else}
        there is no-data.
    {/if}
    
    <div class="option">
        <a href="itemcreate?width=630&height=255&modal=true" class="thickbox">アイテム新規登録</a>
        <a href="itemdeleted">削除済みアイテム</a>
        <a href="itemupload">CSVアップロード</a>
        <a href="itemdownload">CSVダウンロード</a><br />
        <a href="equipupload">装備リストアップロード</a>
        <a href="equipdownload">装備リストダウンロード</a>
    </div>
</div> 

{include file=$footer}
