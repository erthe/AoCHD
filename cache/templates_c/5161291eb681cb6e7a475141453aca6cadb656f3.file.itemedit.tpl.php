<?php /* Smarty version Smarty-3.1.13, created on 2013-08-24 21:32:30
         compiled from "/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/itemedit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20778663315211c96e2ee008-37135181%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5161291eb681cb6e7a475141453aca6cadb656f3' => 
    array (
      0 => '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/itemedit.tpl',
      1 => 1377171940,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20778663315211c96e2ee008-37135181',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5211c96e543a53_29601926',
  'variables' => 
  array (
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5211c96e543a53_29601926')) {function content_5211c96e543a53_29601926($_smarty_tpl) {?><div class="window-container">

    <form id="edit-item" method="post" action="itemupdate">
        <fieldset>
            <table>
            
                <tr>
                    <td><label>ID： </label></td>
                    <td colspan="6"><input class="text-right" type="text" size="40" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['item_id'];?>
"></td>
                </tr>
                
                <tr>
                    <td><label>アイテム名: </label></td>
                    <td colspan="6"><input type="text" name="item_name" size="20" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['item_name'];?>
"></td>
                </tr>
                
                <tr>
                    <td><label>威力: </label></td>
                    <td><input class="text-right" type="text" name="power" size="5" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['power'];?>
"> </td>
                    <td><label>命中: </label></td>
                    <td><input class="text-right" type="text" name="hit_chance" size="5" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['hit_chance'];?>
"> </td>
                    <td><label>必殺: </label></td>
                    <td><input class="text-right" type="text" name="special_chance" size="5" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['special_chance'];?>
"> </td>
                    <td><label>重さ: </label></td>
                    <td><input class="text-right" type="text" name="weight" size="5" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['weight'];?>
"> </td>
                    <td><label>耐久: </label></td>
                    <td><input class="text-right" type="text" name="durability" size="5" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['durability'];?>
"> </td>
                </tr>
                
                <tr>
                    <td><label>武器レベル: </label></td>
                    <td><input class="text-right" type="text" name="weapon_level" size="5" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['weapon_level'];?>
"> </td>
                    <td><label>種別: </label></td>
					<td><select name="weapon_type">
							<option value="0" <?php if ($_smarty_tpl->tpl_vars['item']->value['weapon_type']==0){?>selected<?php }?>>無</option>
                            <option value="1" <?php if ($_smarty_tpl->tpl_vars['item']->value['weapon_type']==1){?>selected<?php }?>>剣</option>
                            <option value="2" <?php if ($_smarty_tpl->tpl_vars['item']->value['weapon_type']==2){?>selected<?php }?>>槍</option>
                            <option value="3" <?php if ($_smarty_tpl->tpl_vars['item']->value['weapon_type']==3){?>selected<?php }?>>斧</option>
                            <option value="4" <?php if ($_smarty_tpl->tpl_vars['item']->value['weapon_type']==4){?>selected<?php }?>>弓</option>
                            <option value="5" <?php if ($_smarty_tpl->tpl_vars['item']->value['weapon_type']==5){?>selected<?php }?>>炎</option>
                            <option value="6" <?php if ($_smarty_tpl->tpl_vars['item']->value['weapon_type']==6){?>selected<?php }?>>雷</option>
                            <option value="7" <?php if ($_smarty_tpl->tpl_vars['item']->value['weapon_type']==7){?>selected<?php }?>>風</option>
                            <option value="8" <?php if ($_smarty_tpl->tpl_vars['item']->value['weapon_type']==8){?>selected<?php }?>>闇</option>
                            <option value="9" <?php if ($_smarty_tpl->tpl_vars['item']->value['weapon_type']==9){?>selected<?php }?>>光</option>
                        </select>
                    </td>
                    <td><label>価格: </label></td>
                    <td><input class="text-right" type="text" name="price" size="10" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
"> </td>
                </tr>
                
                 <tr>
                    <td><label>攻撃速度: </label></td>
                    <td><input class="text-right" type="text" name="attack_speed" size="5" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['attack_speed'];?>
"> </td>
                    <td><label>HP上昇: </label></td>
                    <td><input class="text-right" type="text" name="hp_plus" size="5" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['hp_plus'];?>
"> </td>
                    <td><label>STR上昇: </label></td>
                    <td><input class="text-right" type="text" name="str_plus" size="5" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['str_plus'];?>
"> </td>
                    <td><label>MAG上昇: </label></td>
                    <td><input class="text-right" type="text" name="mag_plus" size="5" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['mag_plus'];?>
"> </td>
                    <td><label>SKL上昇: </label></td>
                    <td><input class="text-right" type="text" name="skl_plus" size="5" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['skl_plus'];?>
"> </td>
                </tr>
                
                <tr>
                    <td><label>SPD上昇: </label></td>
                    <td><input class="text-right" type="text" name="spd_plus" size="5" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['spd_plus'];?>
"> </td>
                    <td><label>LUK上昇: </label></td>
                    <td><input class="text-right" type="text" name="luk_plus" size="5" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['luk_plus'];?>
"> </td>
                    <td><label>DEF上昇: </label></td>
                    <td><input class="text-right" type="text" name="def_plus" size="5" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['def_plus'];?>
"> </td>
                    <td><label>MDF上昇: </label></td>
                    <td><input class="text-right" type="text" name="mdf_plus" size="5" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['mdf_plus'];?>
"> </td>
                    <td><label>BOD上昇: </label></td>
                    <td><input class="text-right" type="text" name="bod_plus" size="5" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['bod_plus'];?>
"> </td>

                </tr>
                
                <tr>
                    <td><label>魔法攻撃: </label></td>
                    <td><select name="magic_attack">
							<option value="0" <?php if ($_smarty_tpl->tpl_vars['item']->value['magic_attack']==0){?>selected<?php }?>>無</option>
                            <option value="1" <?php if ($_smarty_tpl->tpl_vars['item']->value['magic_attack']==1){?>selected<?php }?>>有</option>
                        </select>
                    </td>
                    <td><label>二回攻撃: </label></td>
                    <td><select name="double_attack">
							<option value="0" <?php if ($_smarty_tpl->tpl_vars['item']->value['double_attack']==0){?>selected<?php }?>>無</option>
                            <option value="1" <?php if ($_smarty_tpl->tpl_vars['item']->value['double_attack']==1){?>selected<?php }?>>有</option>
                        </select>
                    </td>
               		<td><label>経験値2倍: </label></td>
                    <td><select name="double_exp">
							<option value="0" <?php if ($_smarty_tpl->tpl_vars['item']->value['double_exp']==0){?>selected<?php }?>>無</option>
                            <option value="1" <?php if ($_smarty_tpl->tpl_vars['item']->value['double_exp']==1){?>selected<?php }?>>有</option>
                        </select>
                    </td> 
               		<td><label>HP吸収: </label></td>
                    <td><select name="absorb_attack">
							<option value="0" <?php if ($_smarty_tpl->tpl_vars['item']->value['absorb_attack']==0){?>selected<?php }?>>無</option>
                            <option value="1" <?php if ($_smarty_tpl->tpl_vars['item']->value['absorb_attack']==1){?>selected<?php }?>>有</option>
                        </select>
                    </td> 
                    <td><label>自分攻撃: </label></td>
                    <td><select name="self_damage">
							<option value="0" <?php if ($_smarty_tpl->tpl_vars['item']->value['self_damage']==0){?>selected<?php }?>>無</option>
                            <option value="1" <?php if ($_smarty_tpl->tpl_vars['item']->value['self_damage']==1){?>selected<?php }?>>有</option>
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <td><label>重装特攻: </label></td>
                    <td><select name="armor_efficacy">
							<option value="0" <?php if ($_smarty_tpl->tpl_vars['item']->value['armor_efficacy']==0){?>selected<?php }?>>無</option>
                            <option value="1" <?php if ($_smarty_tpl->tpl_vars['item']->value['armor_efficacy']==1){?>selected<?php }?>>有</option>
                        </select>
                    </td>
                    <td><label>騎乗特攻: </label></td>
                    <td><select name="knight_efficacy">
							<option value="0" <?php if ($_smarty_tpl->tpl_vars['item']->value['knight_efficacy']==0){?>selected<?php }?>>無</option>
                            <option value="1" <?php if ($_smarty_tpl->tpl_vars['item']->value['knight_efficacy']==1){?>selected<?php }?>>有</option>
                        </select>
                    </td>
                    <td><label>飛行特攻: </label></td>
                    <td><select name="flying_efficacy">
							<option value="0" <?php if ($_smarty_tpl->tpl_vars['item']->value['flying_efficacy']==0){?>selected<?php }?>>無</option>
                            <option value="1" <?php if ($_smarty_tpl->tpl_vars['item']->value['flying_efficacy']==1){?>selected<?php }?>>有</option>
                        </select>
                    </td>
                </tr>
                
                <tr>
                	<td><label>説明: </label></td>
                    <td colspan="6"><input type="text" name="description" size="40" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['description'];?>
"></td>
                </tr>
                
                <tr>
                    <td>
                    	<input type="hidden" name="original_name" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['item_name'];?>
">
                        <input type="hidden" name="original_id" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['item_id'];?>
">
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
<script "text/javascript" src="../themes/js/thickboxuseadmin.js"></script><?php }} ?>