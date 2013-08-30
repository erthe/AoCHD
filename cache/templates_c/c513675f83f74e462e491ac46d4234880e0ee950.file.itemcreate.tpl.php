<?php /* Smarty version Smarty-3.1.13, created on 2013-08-22 20:50:08
         compiled from "/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/itemcreate.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2419248895211b80d036ac7-09352392%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c513675f83f74e462e491ac46d4234880e0ee950' => 
    array (
      0 => '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/itemcreate.tpl',
      1 => 1377172204,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2419248895211b80d036ac7-09352392',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5211b80d07e674_65644850',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5211b80d07e674_65644850')) {function content_5211b80d07e674_65644850($_smarty_tpl) {?><div class="window-container">

    <form id="edit-item" method="post" action="iteminsert">
        <fieldset>
            <table>
            
                <tr>
                    <td><label>ID： </label></td>
                    <td colspan="6"><input class="text-right" name="item_id" type="text" size="5"></td>
                </tr>
                
                <tr>
                    <td><label>アイテム名: </label></td>
                    <td colspan="6"><input type="text" name="item_name" size="20"></td>
                </tr>
                
                <tr>
                    <td><label>威力: </label></td>
                    <td><input class="text-right" type="text" name="power" size="5"> </td>
                    <td><label>命中: </label></td>
                    <td><input class="text-right" type="text" name="hit_chance" size="5"> </td>
                    <td><label>必殺: </label></td>
                    <td><input class="text-right" type="text" name="special_chance" size="5"> </td>
                    <td><label>重さ: </label></td>
                    <td><input class="text-right" type="text" name="weight" size="5"> </td>
                    <td><label>耐久: </label></td>
                    <td><input class="text-right" type="text" name="durability" size="5"> </td>
                </tr>
                
                <tr>
                    <td><label>武器レベル: </label></td>
                    <td><input class="text-right" type="text" name="weapon_level" size="5"> </td>
                    <td><label>種別: </label></td>
					<td><select name="weapon_type">
							<option value="0">無</option>
                            <option value="1">剣</option>
                            <option value="2">槍</option>
                            <option value="3">斧</option>
                            <option value="4">弓</option>
                            <option value="5">炎</option>
                            <option value="6">雷</option>
                            <option value="7">風</option>
                            <option value="8">闇</option>
                            <option value="9">光</option>
                        </select>
                    </td>
                    <td><label>価格: </label></td>
                    <td><input class="text-right" type="text" name="price" size="10"> </td>
                </tr>
                
                <tr>
                    <td><label>攻撃速度: </label></td>
                    <td><input class="text-right" type="text" name="attack_speed" size="5"> </td>
                    <td><label>HP上昇: </label></td>
                    <td><input class="text-right" type="text" name="hp_plus" size="5"> </td>
                    <td><label>STR上昇: </label></td>
                    <td><input class="text-right" type="text" name="str_plus" size="5"> </td>
                    <td><label>MAG上昇: </label></td>
                    <td><input class="text-right" type="text" name="mag_plus" size="5"> </td>
                    <td><label>SKL上昇: </label></td>
                    <td><input class="text-right" type="text" name="skl_plus" size="5"> </td>
                </tr>
                
                <tr>
                    <td><label>SPD上昇: </label></td>
                    <td><input class="text-right" type="text" name="spd_plus" size="5"> </td>
                    <td><label>LUK上昇: </label></td>
                    <td><input class="text-right" type="text" name="luk_plus" size="5"> </td>
                    <td><label>DEF上昇: </label></td>
                    <td><input class="text-right" type="text" name="def_plus" size="5"> </td>
                    <td><label>MDF上昇: </label></td>
                    <td><input class="text-right" type="text" name="mdf_plus" size="5"> </td>
                    <td><label>BOD上昇: </label></td>
                    <td><input class="text-right" type="text" name="bod_plus" size="5"> </td>

                </tr>
                
                <tr>
                    <td><label>魔法攻撃: </label></td>
                    <td><select name="magic_attack">
							<option value="0">無</option>
                            <option value="1">有</option>
                        </select>
                    </td>
                    <td><label>二回攻撃: </label></td>
                    <td><select name="double_attack">
							<option value="0">無</option>
                            <option value="1">有</option>
                        </select>
                    </td>
               		<td><label>経験値2倍: </label></td>
                    <td><select name="double_exp">
							<option value="0">無</option>
                            <option value="1">有</option>
                        </select>
                    </td> 
               		<td><label>HP吸収: </label></td>
                    <td><select name="absorb_attack">
							<option value="0">無</option>
                            <option value="1">有</option>
                        </select>
                    </td> 
                    <td><label>自分攻撃: </label></td>
                    <td><select name="self_damage">
							<option value="0">無</option>
                            <option value="1">有</option>
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <td><label>重装特攻: </label></td>
                    <td><select name="armor_efficacy">
							<option value="0">無</option>
                            <option value="1">有</option>
                        </select>
                    </td>
                    <td><label>騎乗特攻: </label></td>
                    <td><select name="knight_efficacy">
							<option value="0">無</option>
                            <option value="1">有</option>
                        </select>
                    </td>
                    <td><label>飛行特攻: </label></td>
                    <td><select name="flying_efficacy">
							<option value="0">無</option>
                            <option value="1">有</option>
                        </select>
                    </td>
                </tr>
                
                <tr>
                	<td><label>説明: </label></td>
                    <td colspan="6"><input type="text" name="description" size="40"></td>
                </tr>
                    
                <tr>
                    <td>
                        <input id="item_insert" type="submit" value="送信"><input type="reset" value="リセット"></td>
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
<script "text/javascript" src="../themes/js/library/md5.js"></script>
<script "text/javascript" src="../themes/js/thickboxuseadmin.js"></script><?php }} ?>