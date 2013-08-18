<div class="form-container">

    <form id="edit" method="post" action="classlist">
        <fieldset>
        	<table class="table-center">
            
                <tr>
                    <td><label>ID： </label><input  class="text-right" type="text" name="search_class_id"  size="10" value="{$search_class_id}"></td>
                    <td><label>クラスランク: </label><input type="text" name="search_class_rank" size="10" value="{$search_class_rank}"></td>
                    <td><label>クラス名: </label><input type="text" name="search_class_name" size="10" value="{$search_class_name}"></td>
        			<td><label>選択</label>
            			<select name="search_playable">
		                	<option value="2" {if ($search_playable == 2)}selected{/if}>指定なし</option>
		                	<option value="1" {if ($search_playable == 1)}selected{/if}>可</option>
		                	<option value="0" {if ($search_playable == 0)}selected{/if}>不可</option>
            			</select>
        			</td>
                    <td>
            			<input id="search_reset" type="reset" value="入力削除">
            		</td>
                </tr>
            </table>
            
            <table class="table-center">
            
                <tr>
        			<td><label>第一キー</label>
            			<select name="first_key">
                			<option value="class_id" {if ($firstkey === 'class_id')}selected{/if}>ID</option>
							<option value="class_rank" {if ($firstkey === 'class_rank')}selected{/if}>ランク</option>
							<option value="class_name" {if ($firstkey === 'class_name')}selected{/if}>クラス名</option>
							<option value="hp_val" {if ($firstkey === 'hp_val')}selected{/if}>HP</option>
							<option value="str_val" {if ($firstkey === 'str_val')}selected{/if}>STR</option>
							<option value="mag_val" {if ($firstkey === 'mag_val')}selected{/if}>MAG</option>
							<option value="skl_val" {if ($firstkey === 'skl_val')}selected{/if}>SKL</option>
							<option value="spd_val" {if ($firstkey === 'spd_val')}selected{/if}>SPD</option>
							<option value="luk_val" {if ($firstkey === 'luk_val')}selected{/if}>LUK</option>
							<option value="def_val" {if ($firstkey === 'def_val')}selected{/if}>DEF</option>
							<option value="mdf_val" {if ($firstkey === 'mdf_val')}selected{/if}>MDF</option>
							<option value="bod_val" {if ($firstkey === 'bod_val')}selected{/if}>BOD</option>
							<option value="hp_grow" {if ($firstkey === 'hp_grow')}selected{/if}>HP率</option>
							<option value="str_grow" {if ($firstkey === 'str_grow')}selected{/if}>STR率</option>
							<option value="mag_grow" {if ($firstkey === 'mag_grow')}selected{/if}>MAG率</option>
							<option value="skl_grow" {if ($firstkey === 'skl_grow')}selected{/if}>SKL率</option>
							<option value="spd_grow" {if ($firstkey === 'spd_grow')}selected{/if}>SPD率</option>
							<option value="luk_grow" {if ($firstkey === 'luk_grow')}selected{/if}>LUK率</option>
							<option value="def_grow" {if ($firstkey === 'def_grow')}selected{/if}>DEF率</option>
							<option value="mdf_grow" {if ($firstkey === 'mdf_grow')}selected{/if}>MDF率</option>
							<option value="bod_grow" {if ($firstkey === 'bod_grow')}selected{/if}>BOD率</option>
							<option value="own_skl_id" {if ($firstkey === 'own_skl_id')}selected{/if}>スキル	</option>
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
                			<option value="class_id" {if ($secondkey === 'class_id')}selected{/if}>ID</option>
							<option value="class_rank" {if ($secondkey === 'class_rank')}selected{/if}>ランク</option>
							<option value="class_name" {if ($secondkey === 'class_name')}selected{/if}>クラス名</option>
							<option value="hp_val" {if ($secondkey === 'hp_val')}selected{/if}>HP</option>
							<option value="str_val" {if ($secondkey === 'str_val')}selected{/if}>STR</option>
							<option value="mag_val" {if ($secondkey === 'mag_val')}selected{/if}>MAG</option>
							<option value="skl_val" {if ($secondkey === 'skl_val')}selected{/if}>SKL</option>
							<option value="spd_val" {if ($secondkey === 'spd_val')}selected{/if}>SPD</option>
							<option value="luk_val" {if ($secondkey === 'luk_val')}selected{/if}>LUK</option>
							<option value="def_val" {if ($secondkey === 'def_val')}selected{/if}>DEF</option>
							<option value="mdf_val" {if ($secondkey === 'mdf_val')}selected{/if}>MDF</option>
							<option value="bod_val" {if ($secondkey === 'bod_val')}selected{/if}>BOD</option>
							<option value="hp_grow" {if ($secondkey === 'hp_grow')}selected{/if}>HP率</option>
							<option value="str_grow" {if ($secondkey === 'str_grow')}selected{/if}>STR率</option>
							<option value="mag_grow" {if ($secondkey === 'mag_grow')}selected{/if}>MAG率</option>
							<option value="skl_grow" {if ($secondkey === 'skl_grow')}selected{/if}>SKL率</option>
							<option value="spd_grow" {if ($secondkey === 'spd_grow')}selected{/if}>SPD率</option>
							<option value="luk_grow" {if ($secondkey === 'luk_grow')}selected{/if}>LUK率</option>
							<option value="def_grow" {if ($secondkey === 'def_grow')}selected{/if}>DEF率</option>
							<option value="mdf_grow" {if ($secondkey === 'mdf_grow')}selected{/if}>MDF率</option>
							<option value="bod_grow" {if ($secondkey === 'bod_grow')}selected{/if}>BOD率</option>
							<option value="own_skl_id" {if ($secondkey === 'own_skl_id')}selected{/if}>スキル	</option>
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
                			<option value="class_id" {if ($thirdkey === 'class_id')}selected{/if}>ID</option>
							<option value="class_rank" {if ($thirdkey === 'class_rank')}selected{/if}>ランク</option>
							<option value="class_name" {if ($thirdkey === 'class_name')}selected{/if}>クラス名</option>
							<option value="hp_val" {if ($thirdkey === 'hp_val')}selected{/if}>HP</option>
							<option value="str_val" {if ($thirdkey === 'str_val')}selected{/if}>STR</option>
							<option value="mag_val" {if ($thirdkey === 'mag_val')}selected{/if}>MAG</option>
							<option value="skl_val" {if ($thirdkey === 'skl_val')}selected{/if}>SKL</option>
							<option value="spd_val" {if ($thirdkey === 'spd_val')}selected{/if}>SPD</option>
							<option value="luk_val" {if ($thirdkey === 'luk_val')}selected{/if}>LUK</option>
							<option value="def_val" {if ($thirdkey === 'def_val')}selected{/if}>DEF</option>
							<option value="mdf_val" {if ($thirdkey === 'mdf_val')}selected{/if}>MDF</option>
							<option value="bod_val" {if ($thirdkey === 'bod_val')}selected{/if}>BOD</option>
							<option value="hp_grow" {if ($thirdkey === 'hp_grow')}selected{/if}>HP率</option>
							<option value="str_grow" {if ($thirdkey === 'str_grow')}selected{/if}>STR率</option>
							<option value="mag_grow" {if ($thirdkey === 'mag_grow')}selected{/if}>MAG率</option>
							<option value="skl_grow" {if ($thirdkey === 'skl_grow')}selected{/if}>SKL率</option>
							<option value="spd_grow" {if ($thirdkey === 'spd_grow')}selected{/if}>SPD率</option>
							<option value="luk_grow" {if ($thirdkey === 'luk_grow')}selected{/if}>LUK率</option>
							<option value="def_grow" {if ($thirdkey === 'def_grow')}selected{/if}>DEF率</option>
							<option value="mdf_grow" {if ($thirdkey === 'mdf_grow')}selected{/if}>MDF率</option>
							<option value="bod_grow" {if ($thirdkey === 'bod_grow')}selected{/if}>BOD率</option>
							<option value="own_skl_id" {if ($thirdkey === 'own_skl_id')}selected{/if}>スキル	</option>
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
                			<option value="class_id" {if ($fourthkey === 'class_id')}selected{/if}>ID</option>
							<option value="class_rank" {if ($fourthkey === 'class_rank')}selected{/if}>ランク</option>
							<option value="class_name" {if ($fourthkey === 'class_name')}selected{/if}>クラス名</option>
							<option value="hp_val" {if ($fourthkey === 'hp_val')}selected{/if}>HP</option>
							<option value="str_val" {if ($fourthkey === 'str_val')}selected{/if}>STR</option>
							<option value="mag_val" {if ($fourthkey === 'mag_val')}selected{/if}>MAG</option>
							<option value="skl_val" {if ($fourthkey === 'skl_val')}selected{/if}>SKL</option>
							<option value="spd_val" {if ($fourthkey === 'spd_val')}selected{/if}>SPD</option>
							<option value="luk_val" {if ($fourthkey === 'luk_val')}selected{/if}>LUK</option>
							<option value="def_val" {if ($fourthkey === 'def_val')}selected{/if}>DEF</option>
							<option value="mdf_val" {if ($fourthkey === 'mdf_val')}selected{/if}>MDF</option>
							<option value="bod_val" {if ($fourthkey === 'bod_val')}selected{/if}>BOD</option>
							<option value="hp_grow" {if ($fourthkey === 'hp_grow')}selected{/if}>HP率</option>
							<option value="str_grow" {if ($fourthkey === 'str_grow')}selected{/if}>STR率</option>
							<option value="mag_grow" {if ($fourthkey === 'mag_grow')}selected{/if}>MAG率</option>
							<option value="skl_grow" {if ($fourthkey === 'skl_grow')}selected{/if}>SKL率</option>
							<option value="spd_grow" {if ($fourthkey === 'spd_grow')}selected{/if}>SPD率</option>
							<option value="luk_grow" {if ($fourthkey === 'luk_grow')}selected{/if}>LUK率</option>
							<option value="def_grow" {if ($fourthkey === 'def_grow')}selected{/if}>DEF率</option>
							<option value="mdf_grow" {if ($fourthkey === 'mdf_grow')}selected{/if}>MDF率</option>
							<option value="bod_grow" {if ($fourthkey === 'bod_grow')}selected{/if}>BOD率</option>
							<option value="own_skl_id" {if ($fourthkey === 'own_skl_id')}selected{/if}>スキル	</option>
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
                			<option value="class_id" {if ($fifthkey === 'class_id')}selected{/if}>ID</option>
							<option value="class_rank" {if ($fifthkey === 'class_rank')}selected{/if}>ランク</option>
							<option value="class_name" {if ($fifthkey === 'class_name')}selected{/if}>クラス名</option>
							<option value="hp_val" {if ($fifthkey === 'hp_val')}selected{/if}>HP</option>
							<option value="str_val" {if ($fifthkey === 'str_val')}selected{/if}>STR</option>
							<option value="mag_val" {if ($fifthkey === 'mag_val')}selected{/if}>MAG</option>
							<option value="skl_val" {if ($fifthkey === 'skl_val')}selected{/if}>SKL</option>
							<option value="spd_val" {if ($fifthkey === 'spd_val')}selected{/if}>SPD</option>
							<option value="luk_val" {if ($fifthkey === 'luk_val')}selected{/if}>LUK</option>
							<option value="def_val" {if ($fifthkey === 'def_val')}selected{/if}>DEF</option>
							<option value="mdf_val" {if ($fifthkey === 'mdf_val')}selected{/if}>MDF</option>
							<option value="bod_val" {if ($fifthkey === 'bod_val')}selected{/if}>BOD</option>
							<option value="hp_grow" {if ($fifthkey === 'hp_grow')}selected{/if}>HP率</option>
							<option value="str_grow" {if ($fifthkey === 'str_grow')}selected{/if}>STR率</option>
							<option value="mag_grow" {if ($fifthkey === 'mag_grow')}selected{/if}>MAG率</option>
							<option value="skl_grow" {if ($fifthkey === 'skl_grow')}selected{/if}>SKL率</option>
							<option value="spd_grow" {if ($fifthkey === 'spd_grow')}selected{/if}>SPD	率</option>
							<option value="luk_grow" {if ($fifthkey === 'luk_grow')}selected{/if}>LUK率</option>
							<option value="def_grow" {if ($fifthkey === 'def_grow')}selected{/if}>DEF率</option>
							<option value="mdf_grow" {if ($fifthkey === 'mdf_grow')}selected{/if}>MDF率</option>
							<option value="bod_grow" {if ($fifthkey === 'bod_grow')}selected{/if}>BOD率</option>
							<option value="own_skl_id" {if ($fifthkey === 'own_skl_id')}selected{/if}>スキル	</option>
            			</select>
            		</td>
            		
            		<td><label></label>
            			<select name="fifth_key_order">
          					<option value="asc" {if ($fifthkeyorder === 'asc')}selected{/if}>昇順</option>
            				<option value="desc" {if ($fifthkeyorder === 'desc')}selected{/if}>降順</option>
            			</select>
            		</td>
            		
            		<td>
            			<input id="sort_submit" type="submit" value="送信">
            			<input id="sort_reset" type="reset" value="リセット">
            		</td>
                </tr>
            </table>
        </fieldset>
    </form>

</div>
