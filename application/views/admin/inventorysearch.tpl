<div class="form-container">

    <form id="edit" method="post" action="inventorylist">
        <fieldset>
        	<table class="table-center">
            
                <tr>
                    <td><label>ID： </label><input  class="text-right" type="text" name="search_item_id"  size="5" value="{$search_item_id}"></td>
                    <td><label>アイテム名: </label><input type="text" name="search_item_name" size="15" value="{$search_item_name}"></td>
        			<td><label>種別</label>
            			<select name="search_weapon_type">
		                	<option value="99" {if ($search_weapon_type == 99)}selected{/if}>指定なし</option>
		                	<option value="1" {if ($search_weapon_type == 1)}selected{/if}>剣</option>
		                	<option value="2" {if ($search_weapon_type == 2)}selected{/if}>槍</option>
		                	<option value="3" {if ($search_weapon_type == 3)}selected{/if}>斧</option>
		                	<option value="4" {if ($search_weapon_type == 4)}selected{/if}>弓</option>
		                	<option value="5" {if ($search_weapon_type == 5)}selected{/if}>炎</option>
		                	<option value="6" {if ($search_weapon_type == 6)}selected{/if}>雷</option>
		                	<option value="7" {if ($search_weapon_type == 7)}selected{/if}>風</option>
		                	<option value="8" {if ($search_weapon_type == 8)}selected{/if}>闇</option>
		                	<option value="9" {if ($search_weapon_type == 9)}selected{/if}>光</option>
		                	<option value="0" {if ($search_weapon_type == 0)}selected{/if}>無</option>
            			</select>
        			</td>
        			<td><lavel>所有者ID</label><input class="text-right" type="text" name="search_user_data_id" size="5" value="{$search_user_data_id}"></td>
        			<td><label>所有者名: </label><input type="text" name="search_user_name" size="10" value="{$search_user_name}"></td>
        			<td><label>Email: </label><input type="text" name="search_email" size="30" value="{$search_email}"></td>
                   	<td class="span-right">
            			<input id="sort_submit" type="submit" value="送信">
            		</td>
            		<td>
            			<input id="sort_reset" type="reset" value="リセット">
            		</td>
                </tr>
            </table>
        </fieldset>
    </form>

</div>
