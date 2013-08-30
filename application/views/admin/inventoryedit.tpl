<div class="window-container">

    <form id="edit-item" method="post" action="itemupdate">
        <fieldset>
            <table>
            
                <tr>
                    <td><label>ID： </label></td>
                    <td colspan="6"><input class="text-right" type="text" size="40" value="{$item.item_id}"></td>
                </tr>
                
                <tr>
                    <td><label>アイテム名: </label></td>
                    <td colspan="6"><input type="text" name="item_name" size="20" value="{$item.item_name}"></td>
                </tr>
                
                <tr>
                    <td><label>威力: </label></td>
                    <td><input class="text-right" type="text" name="power" size="5" value="{$item.power}"> </td>
                    <td><label>命中: </label></td>
                    <td><input class="text-right" type="text" name="hit_chance" size="5" value="{$item.hit_chance}"> </td>
                    <td><label>必殺: </label></td>
                    <td><input class="text-right" type="text" name="special_chance" size="5" value="{$item.special_chance}"> </td>
                    <td><label>重さ: </label></td>
                    <td><input class="text-right" type="text" name="weight" size="5" value="{$item.weight}"> </td>
                    <td><label>耐久: </label></td>
                    <td><input class="text-right" type="text" name="durability" size="5" value="{$item.durability}"> </td>
                </tr>
                
                <tr>
                    <td><label>武器レベル: </label></td>
                    <td><input class="text-right" type="text" name="weapon_level" size="5" value="{$item.weapon_level}"> </td>
                    <td><label>種別: </label></td>
					<td><select name="weapon_type">
							<option value="0" {if $item.weapon_type == 0}selected{/if}>無</option>
                            <option value="1" {if $item.weapon_type == 1}selected{/if}>剣</option>
                            <option value="2" {if $item.weapon_type == 2}selected{/if}>槍</option>
                            <option value="3" {if $item.weapon_type == 3}selected{/if}>斧</option>
                            <option value="4" {if $item.weapon_type == 4}selected{/if}>弓</option>
                            <option value="5" {if $item.weapon_type == 5}selected{/if}>炎</option>
                            <option value="6" {if $item.weapon_type == 6}selected{/if}>雷</option>
                            <option value="7" {if $item.weapon_type == 7}selected{/if}>風</option>
                            <option value="8" {if $item.weapon_type == 8}selected{/if}>闇</option>
                            <option value="9" {if $item.weapon_type == 9}selected{/if}>光</option>
                        </select>
                    </td>
                    <td><label>価格: </label></td>
                    <td><input class="text-right" type="text" name="price" size="10" value="{$item.price}"> </td>
                </tr>
                
                 <tr>
                    <td><label>攻撃速度: </label></td>
                    <td><input class="text-right" type="text" name="attack_speed" size="5" value="{$item.attack_speed}"> </td>
                    <td><label>HP上昇: </label></td>
                    <td><input class="text-right" type="text" name="hp_plus" size="5" value="{$item.hp_plus}"> </td>
                    <td><label>STR上昇: </label></td>
                    <td><input class="text-right" type="text" name="str_plus" size="5" value="{$item.str_plus}"> </td>
                    <td><label>MAG上昇: </label></td>
                    <td><input class="text-right" type="text" name="mag_plus" size="5" value="{$item.mag_plus}"> </td>
                    <td><label>SKL上昇: </label></td>
                    <td><input class="text-right" type="text" name="skl_plus" size="5" value="{$item.skl_plus}"> </td>
                </tr>
                
                <tr>
                    <td><label>SPD上昇: </label></td>
                    <td><input class="text-right" type="text" name="spd_plus" size="5" value="{$item.spd_plus}"> </td>
                    <td><label>LUK上昇: </label></td>
                    <td><input class="text-right" type="text" name="luk_plus" size="5" value="{$item.luk_plus}"> </td>
                    <td><label>DEF上昇: </label></td>
                    <td><input class="text-right" type="text" name="def_plus" size="5" value="{$item.def_plus}"> </td>
                    <td><label>MDF上昇: </label></td>
                    <td><input class="text-right" type="text" name="mdf_plus" size="5" value="{$item.mdf_plus}"> </td>
                    <td><label>BOD上昇: </label></td>
                    <td><input class="text-right" type="text" name="bod_plus" size="5" value="{$item.bod_plus}"> </td>

                </tr>
                
                <tr>
                    <td><label>魔法攻撃: </label></td>
                    <td><select name="magic_attack">
							<option value="0" {if $item.magic_attack == 0}selected{/if}>無</option>
                            <option value="1" {if $item.magic_attack == 1}selected{/if}>有</option>
                        </select>
                    </td>
                    <td><label>二回攻撃: </label></td>
                    <td><select name="double_attack">
							<option value="0" {if $item.double_attack == 0}selected{/if}>無</option>
                            <option value="1" {if $item.double_attack == 1}selected{/if}>有</option>
                        </select>
                    </td>
               		<td><label>経験値2倍: </label></td>
                    <td><select name="double_exp">
							<option value="0" {if $item.double_exp == 0}selected{/if}>無</option>
                            <option value="1" {if $item.double_exp == 1}selected{/if}>有</option>
                        </select>
                    </td> 
               		<td><label>HP吸収: </label></td>
                    <td><select name="absorb_attack">
							<option value="0" {if $item.absorb_attack == 0}selected{/if}>無</option>
                            <option value="1" {if $item.absorb_attack == 1}selected{/if}>有</option>
                        </select>
                    </td> 
                    <td><label>自分攻撃: </label></td>
                    <td><select name="self_damage">
							<option value="0" {if $item.self_damage == 0}selected{/if}>無</option>
                            <option value="1" {if $item.self_damage == 1}selected{/if}>有</option>
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <td><label>重装特攻: </label></td>
                    <td><select name="armor_efficacy">
							<option value="0" {if $item.armor_efficacy == 0}selected{/if}>無</option>
                            <option value="1" {if $item.armor_efficacy == 1}selected{/if}>有</option>
                        </select>
                    </td>
                    <td><label>騎乗特攻: </label></td>
                    <td><select name="knight_efficacy">
							<option value="0" {if $item.knight_efficacy == 0}selected{/if}>無</option>
                            <option value="1" {if $item.knight_efficacy == 1}selected{/if}>有</option>
                        </select>
                    </td>
                    <td><label>飛行特攻: </label></td>
                    <td><select name="flying_efficacy">
							<option value="0" {if $item.flying_efficacy == 0}selected{/if}>無</option>
                            <option value="1" {if $item.flying_efficacy == 1}selected{/if}>有</option>
                        </select>
                    </td>
                </tr>
                
                <tr>
                	<td><label>説明: </label></td>
                    <td colspan="6"><input type="text" name="description" size="40" value="{$item.description}"></td>
                </tr>
                
                <tr>
                    <td>
                    	<input type="hidden" name="original_name" value="{$item.item_name}">
                        <input type="hidden" name="original_id" value="{$item.item_id}">
                        <input id="item_update" type="submit" value="送信"><input type="reset" value="リセット"></td>
                </tr>
                                
                <tr>
                	<td colspan="2">
                		<input type="button" id="closetb" value="閉じる">
                	</td>
                </tr>
            </table>
        </fieldset>
    </form>

</div>
<script "text/javascript" src="../themes/js/thickboxuseadmin.js"></script>