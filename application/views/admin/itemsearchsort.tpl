<div class="form-container">

    <form id="edit" method="post" action="itemlist">
        <fieldset>
        	<table class="table-center">
            
                <tr>
                    <td><label>ID： </label><input  class="text-right" type="text" name="search_item_id"  size="10" value="{$search_item_id}"></td>
                    <td><label>アイテム名: </label><input type="text" name="search_item_name" size="10" value="{$search_item_name}"></td>
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
                </tr>
            </table>
            
            <table class="table-center">
            
                <tr>
        			<td><label>第一キー</label>
            			<select name="first_key">
                			<option value="item_id" {if ($firstkey === 'item_id')}selected{/if}>ID</option>
							<option value="item_name" {if ($firstkey === 'item_name')}selected{/if}>アイテム名</option>
							<option value="power" {if ($firstkey === 'power')}selected{/if}>威力</option>
							<option value="hit_chance" {if ($firstkey === 'hit_chance')}selected{/if}>命中</option>
							<option value="special_chance" {if ($firstkey === 'special_chance')}selected{/if}>必殺</option>
							<option value="weight" {if ($firstkey === 'weight')}selected{/if}>重さ</option>
							<option value="durability" {if ($firstkey === 'durability')}selected{/if}>耐久</option>
							<option value="weapon_level" {if ($firstkey === 'weapon_level')}selected{/if}>武器レベル</option>
							<option value="weapon_type" {if ($firstkey === 'weapon_type')}selected{/if}>種別</option>
							<option value="price" {if ($firstkey === 'price')}selected{/if}>価格</option>
							<option value="description" {if ($firstkey === 'description')}selected{/if}>説明</option>
            			</select>
            		</td>
            		
            		<td><label></label>
            			<select name="first_key_order">
            				<option value="asc" {if ($firstkeyorder === 'asc')}selected{/if}>昇順</option>
            				<option value="desc" {if ($firstkeyorder === 'desc')}selected{/if}>降順</option>
            			</select>
            		</td>
            		
            		<td><label>第ニキー</label>
            			<select name="second_key">
            				<option value="Null">なし</option>
                			<option value="item_id" {if ($secondkey === 'item_id')}selected{/if}>ID</option>
							<option value="item_name" {if ($secondkey === 'item_name')}selected{/if}>アイテム名</option>
							<option value="power" {if ($secondkey === 'power')}selected{/if}>威力</option>
							<option value="hit_chance" {if ($secondkey === 'hit_chance')}selected{/if}>命中</option>
							<option value="special_chance" {if ($secondkey === 'special_chance')}selected{/if}>必殺</option>
							<option value="weight" {if ($secondkey === 'weight')}selected{/if}>重さ</option>
							<option value="durability" {if ($secondkey === 'durability')}selected{/if}>耐久</option>
							<option value="weapon_level" {if ($secondkey === 'weapon_level')}selected{/if}>武器レベル</option>
							<option value="weapon_type" {if ($secondkey === 'weapon_type')}selected{/if}>種別</option>
							<option value="price" {if ($secondkey === 'price')}selected{/if}>価格</option>
							<option value="description" {if ($secondkey === 'description')}selected{/if}>説明</option>
            			</select>
            		</td>
            		
            		<td><label></label>
            			<select name="second_key_order">
            				<option value="asc" {if ($secondkeyorder === 'asc')}selected{/if}>昇順</option>
            				<option value="desc" {if ($secondkeyorder === 'desc')}selected{/if}>降順</option>
            			</select>
            		</td>
            			
            		<td><label>第三キー</label>
            			<select name="third_key">
            				<option value="Null">なし</option>
                			<option value="item_id" {if ($thirdkey === 'item_id')}selected{/if}>ID</option>
							<option value="item_name" {if ($thirdkey === 'item_name')}selected{/if}>アイテム名</option>
							<option value="power" {if ($thirdkey === 'power')}selected{/if}>威力</option>
							<option value="hit_chance" {if ($thirdkey === 'hit_chance')}selected{/if}>命中</option>
							<option value="special_chance" {if ($thirdkey === 'special_chance')}selected{/if}>必殺</option>
							<option value="weight" {if ($thirdkey === 'weight')}selected{/if}>重さ</option>
							<option value="durability" {if ($thirdkey === 'durability')}selected{/if}>耐久</option>
							<option value="weapon_level" {if ($thirdkey === 'weapon_level')}selected{/if}>武器レベル</option>
							<option value="weapon_type" {if ($thirdkey === 'weapon_type')}selected{/if}>種別</option>
							<option value="price" {if ($thirdkey === 'price')}selected{/if}>価格</option>
							<option value="description" {if ($thirdkey === 'description')}selected{/if}>説明</option>
            			</select>
            		</td>
            		
            		<td><label></label>
            			<select name="third_key_order">
          					<option value="asc" {if ($thirdkeyorder === 'asc')}selected{/if}>昇順</option>
            				<option value="desc" {if ($thirdkeyorder === 'desc')}selected{/if}>降順</option>
            			</select>
            		</td>
            		
            		<td><label>第四キー</label>
            			<select name="fourth_key">
            				<option value="Null">なし</option>
                			<option value="item_id" {if ($fourthkey === 'item_id')}selected{/if}>ID</option>
							<option value="item_name" {if ($fourthkey === 'item_name')}selected{/if}>アイテム名</option>
							<option value="power" {if ($fourthkey === 'power')}selected{/if}>威力</option>
							<option value="hit_chance" {if ($fourthkey === 'hit_chance')}selected{/if}>命中</option>
							<option value="special_chance" {if ($fourthkey === 'special_chance')}selected{/if}>必殺</option>
							<option value="weight" {if ($fourthkey === 'weight')}selected{/if}>重さ</option>
							<option value="durability" {if ($fourthkey === 'durability')}selected{/if}>耐久</option>
							<option value="weapon_level" {if ($fourthkey === 'weapon_level')}selected{/if}>武器レベル</option>
							<option value="weapon_type" {if ($fourthkey === 'weapon_type')}selected{/if}>種別</option>
							<option value="price" {if ($fourthkey === 'price')}selected{/if}>価格</option>
							<option value="description" {if ($fourthkey === 'description')}selected{/if}>説明</option>
            			</select>
            		</td>
            		
            		<td><label></label>
            			<select name="fourth_key_order">
          					<option value="asc" {if ($fourthkeyorder === 'asc')}selected{/if}>昇順</option>
            				<option value="desc" {if ($fourthkeyorder === 'desc')}selected{/if}>降順</option>
            			</select>
            		</td>
            		
            		<td><label>第五キー</label>
            			<select name="fifth_key">
            				<option value="Null">なし</option>
                			<option value="item_id" {if ($fifthkey === 'item_id')}selected{/if}>ID</option>
							<option value="item_name" {if ($fifthkey === 'item_name')}selected{/if}>アイテム名</option>
							<option value="power" {if ($fifthkey === 'power')}selected{/if}>威力</option>
							<option value="hit_chance" {if ($fifthkey === 'hit_chance')}selected{/if}>命中</option>
							<option value="special_chance" {if ($fifthkey === 'special_chance')}selected{/if}>必殺</option>
							<option value="weight" {if ($fifthkey === 'weight')}selected{/if}>重さ</option>
							<option value="durability" {if ($fifthkey === 'durability')}selected{/if}>耐久</option>
							<option value="weapon_level" {if ($fifthkey === 'weapon_level')}selected{/if}>武器レベル</option>
							<option value="weapon_type" {if ($fifthkey === 'weapon_type')}selected{/if}>種別</option>
							<option value="price" {if ($fifthkey === 'price')}selected{/if}>価格</option>
							<option value="description" {if ($fifthkey === 'description')}selected{/if}>説明</option>
            			</select>
            		</td>
            		
            		<td><label></label>
            			<select name="fifth_key_order">
          					<option value="asc" {if ($fifthkeyorder === 'asc')}selected{/if}>昇順</option>
            				<option value="desc" {if ($fifthkeyorder === 'desc')}selected{/if}>降順</option>
            			</select>
            		</td>
            		
                </tr>
            
            </table>
            
            <table class="table-right itemtable">
            	<tr>
                	<td class="span-right">
            			<input id="sort_submit" type="submit" value="送信">
            		</td>
            		<td>
            			<input id="search_reset" type="reset" value="入力削除">
            		</td>
            		<td>
            			<input id="sort_reset" type="reset" value="リセット">
            		</td>
                </tr>
            </table>
        </fieldset>
    </form>

</div>
