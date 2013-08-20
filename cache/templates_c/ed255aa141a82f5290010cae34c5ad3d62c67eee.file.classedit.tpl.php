<?php /* Smarty version Smarty-3.1.13, created on 2013-08-19 12:01:38
         compiled from "/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/classedit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:936123028520d6fb5f21c47-11213216%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ed255aa141a82f5290010cae34c5ad3d62c67eee' => 
    array (
      0 => '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/classedit.tpl',
      1 => 1376881291,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '936123028520d6fb5f21c47-11213216',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_520d6fb60c5d40_64431643',
  'variables' => 
  array (
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_520d6fb60c5d40_64431643')) {function content_520d6fb60c5d40_64431643($_smarty_tpl) {?><div class="window-container">

    <form id="edit" method="post" action="classupdate">
        <fieldset>
            <table class="table-center">
            
                <tr>
                    <td><label>ID： </label></td>
                    <td><input class="text-right" type="text" readonly size="5" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['class_id'];?>
"></td>
                    <td><label>ランク: </label></td>
                    <td colspan=2><input class="text-right" type="text" name="class_rank" size="5" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['class_rank'];?>
"></td>
                    
                </tr>
               
               <tr>
                    <td><label>クラス名: </label></td>
                    <td colspan="5"><input type="text" name="class_name" size="20" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['class_name'];?>
"></td>
                </tr>
                
                <tr>
                    <td><label>HP: </label></td>
                    <td><input class="text-right" type="text" name="hp_val" size="5" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['hp_val'];?>
"></td>
                    <td><label>HP率: </label></td>
                    <td colspan="2"><input class="text-right" type="text" name="hp_grow" size="5" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['hp_grow'];?>
%"></td>
                </tr>

                <tr>
                    <td><label>STR: </label></td>
                    <td><input class="text-right" type="text" name="str_val" size="5" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['str_val'];?>
"></td>
                   	<td><label>STR率: </label></td>
                    <td colspan="2"><input class="text-right" type="text" name="str_grow" size="5" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['str_grow'];?>
%"></td>
                </tr>

                <tr>
                    <td><label>MAG: </label></td>
                    <td><input class="text-right" type="text" name="mag_val" size="5" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['mag_val'];?>
"></td>
                    <td><label>MAG率: </label></td>
                    <td colspan="2"><input class="text-right" type="text" name="mag_grow" size="5" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['mag_grow'];?>
%"></td>
                </tr>

                <tr>
                    <td><label>SKL: </label></td>
                    <td><input class="text-right" type="text" name="skl_val" size="5" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['skl_val'];?>
"></td>
                    <td><label>SKL率: </label></td>
                    <td colspan="2"><input class="text-right" type="text" name="skl_grow" size="5" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['skl_grow'];?>
%"></td>
                </tr>

                <tr>
                    <td><label>SPD: </label></td>
                    <td><input class="text-right" type="text" name="spd_val" size="5" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['spd_val'];?>
"></td>
                    <td><label>SPD率: </label></td>
                    <td colspan="2"><input class="text-right" type="text" name="spd_grow" size="5" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['spd_grow'];?>
%"></td>
                </tr>

                <tr>
                    <td><label>LUK: </label></td>
                    <td><input class="text-right" type="text" name="luk_val" size="5" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['luk_val'];?>
"></td>
                    <td><label>LUK率: </label></td>
                    <td colspan="2"><input class="text-right" type="text" name="luk_grow" size="5" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['luk_grow'];?>
%"></td>
                </tr>

                <tr>
                    <td><label>DEF: </label></td>
                    <td><input class="text-right" type="text" name="def_val" size="5" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['def_val'];?>
"></td>
                    <td><label>DEF率: </label></td>
                    <td><input class="text-right" type="text" name="def_grow" size="5" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['def_grow'];?>
%"></td>
                    <td><label>重装: </label></td>
                    <td><select name="armor_flag">
                            <option value="1" <?php if ($_smarty_tpl->tpl_vars['item']->value['armor_flag']==1){?>selected<?php }?>>有</option>
                            <option value="0" <?php if ($_smarty_tpl->tpl_vars['item']->value['armor_flag']==0){?>selected<?php }?>>無</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td><label>MDF: </label></td>
                    <td><input class="text-right" type="text" name="mdf_val" size="5" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['mdf_val'];?>
"></td>
                    <td><label>MDF率: </label></td>
                    <td><input class="text-right" type="text" name="mdf_grow" size="5" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['mdf_grow'];?>
%"></td>
                    <td><label>騎乗: </label></td>
                    <td><select name="knight_flag">
                            <option value="1" <?php if ($_smarty_tpl->tpl_vars['item']->value['knight_flag']==1){?>selected<?php }?>>有</option>
                            <option value="0" <?php if ($_smarty_tpl->tpl_vars['item']->value['knight_flag']==0){?>selected<?php }?>>無</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td><label>BOD: </label></td>
                    <td><input class="text-right" type="text" name="bod_val" size="5" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['bod_val'];?>
"></td>
                    <td><label>BOD率: </label></td>
                    <td><input class="text-right" type="text" name="bod_grow" size="5" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['bod_grow'];?>
%"></td>
                    <td><label>飛行: </label></td>
                    <td><select name="flying_flag">
                            <option value="1" <?php if ($_smarty_tpl->tpl_vars['item']->value['flying_flag']==1){?>selected<?php }?>>有</option>
                            <option value="0" <?php if ($_smarty_tpl->tpl_vars['item']->value['flying_flag']==0){?>selected<?php }?>>無</option>
                        </select>
                    </td>
                </tr>

                <tr>
                	<td><label>スキル: </label></td>
                    <td><select name="own_skl_id">
                    		<option value="NULL" <?php if ($_smarty_tpl->tpl_vars['item']->value['own_skl_id']==null){?>selected<?php }?>>なし</option>
                            <option value="1" <?php if ($_smarty_tpl->tpl_vars['item']->value['own_skl_id']==1){?>selected<?php }?>>祈り</option>
                            <option value="2" <?php if ($_smarty_tpl->tpl_vars['item']->value['own_skl_id']==2){?>selected<?php }?>>盗む</option>
                            <option value="3" <?php if ($_smarty_tpl->tpl_vars['item']->value['own_skl_id']==3){?>selected<?php }?>>集中</option>
							<option value="4" <?php if ($_smarty_tpl->tpl_vars['item']->value['own_skl_id']==4){?>selected<?php }?>>強奪</option>
							<option value="5" <?php if ($_smarty_tpl->tpl_vars['item']->value['own_skl_id']==5){?>selected<?php }?>>急所狙い</option>
							<option value="6" <?php if ($_smarty_tpl->tpl_vars['item']->value['own_skl_id']==6){?>selected<?php }?>>先読み</option>
							<option value="7" <?php if ($_smarty_tpl->tpl_vars['item']->value['own_skl_id']==7){?>selected<?php }?>>修練</option>
							<option value="8" <?php if ($_smarty_tpl->tpl_vars['item']->value['own_skl_id']==8){?>selected<?php }?>>直感</option>
							<option value="9" <?php if ($_smarty_tpl->tpl_vars['item']->value['own_skl_id']==9){?>selected<?php }?>>闘争心</option>
							<option value="10" <?php if ($_smarty_tpl->tpl_vars['item']->value['own_skl_id']==10){?>selected<?php }?>>呪い</option>
							<option value="11" <?php if ($_smarty_tpl->tpl_vars['item']->value['own_skl_id']==11){?>selected<?php }?>>癒やしの心</option>
							<option value="12" <?php if ($_smarty_tpl->tpl_vars['item']->value['own_skl_id']==12){?>selected<?php }?>>集団戦	</option>
							<option value="13" <?php if ($_smarty_tpl->tpl_vars['item']->value['own_skl_id']==13){?>selected<?php }?>>熱血</option>
							<option value="14" <?php if ($_smarty_tpl->tpl_vars['item']->value['own_skl_id']==14){?>selected<?php }?>>乗馬術	</option>
							<option value="15" <?php if ($_smarty_tpl->tpl_vars['item']->value['own_skl_id']==15){?>selected<?php }?>>迅速</option>
							<option value="16" <?php if ($_smarty_tpl->tpl_vars['item']->value['own_skl_id']==16){?>selected<?php }?>>小盾</option>
							<option value="17" <?php if ($_smarty_tpl->tpl_vars['item']->value['own_skl_id']==17){?>selected<?php }?>>俊足</option>
							<option value="18" <?php if ($_smarty_tpl->tpl_vars['item']->value['own_skl_id']==18){?>selected<?php }?>>尖兵</option>
							<option value="19" <?php if ($_smarty_tpl->tpl_vars['item']->value['own_skl_id']==19){?>selected<?php }?>>強襲</option>
							<option value="20" <?php if ($_smarty_tpl->tpl_vars['item']->value['own_skl_id']==20){?>selected<?php }?>>大盾</option>
							<option value="21" <?php if ($_smarty_tpl->tpl_vars['item']->value['own_skl_id']==21){?>selected<?php }?>>波状攻撃</option>
							<option value="22" <?php if ($_smarty_tpl->tpl_vars['item']->value['own_skl_id']==22){?>selected<?php }?>>吸精</option>
							<option value="23" <?php if ($_smarty_tpl->tpl_vars['item']->value['own_skl_id']==23){?>selected<?php }?>>幸運の女神</option>
							<option value="24" <?php if ($_smarty_tpl->tpl_vars['item']->value['own_skl_id']==24){?>selected<?php }?>>月光</option>
							<option value="25" <?php if ($_smarty_tpl->tpl_vars['item']->value['own_skl_id']==25){?>selected<?php }?>>一撃必殺</option>
							<option value="26" <?php if ($_smarty_tpl->tpl_vars['item']->value['own_skl_id']==26){?>selected<?php }?>>流星</option>
							<option value="27" <?php if ($_smarty_tpl->tpl_vars['item']->value['own_skl_id']==27){?>selected<?php }?>>高貴なる血</option>
							<option value="28" <?php if ($_smarty_tpl->tpl_vars['item']->value['own_skl_id']==28){?>selected<?php }?>>連続</option>
							<option value="29" <?php if ($_smarty_tpl->tpl_vars['item']->value['own_skl_id']==29){?>selected<?php }?>>太陽</option>
							<option value="30" <?php if ($_smarty_tpl->tpl_vars['item']->value['own_skl_id']==30){?>selected<?php }?>>上級乗馬術</option>
							<option value="31" <?php if ($_smarty_tpl->tpl_vars['item']->value['own_skl_id']==31){?>selected<?php }?>>精鋭軍団</option>
							<option value="32" <?php if ($_smarty_tpl->tpl_vars['item']->value['own_skl_id']==22){?>selected<?php }?>>鉄壁</option>
							<option value="33" <?php if ($_smarty_tpl->tpl_vars['item']->value['own_skl_id']==33){?>selected<?php }?>>怒り</option>
							<option value="34" <?php if ($_smarty_tpl->tpl_vars['item']->value['own_skl_id']==34){?>selected<?php }?>>飛翔</option>
							<option value="35" <?php if ($_smarty_tpl->tpl_vars['item']->value['own_skl_id']==35){?>selected<?php }?>>孤高の英雄</option>
							<option value="36" <?php if ($_smarty_tpl->tpl_vars['item']->value['own_skl_id']==36){?>selected<?php }?>>踊り</option>
							<option value="37" <?php if ($_smarty_tpl->tpl_vars['item']->value['own_skl_id']==37){?>selected<?php }?>>クリティカル</option>
                        </select>
                    </td>
                    <td><label>選択: </label></td>
                    <td><select name="playable">
                            <option value="1" <?php if ($_smarty_tpl->tpl_vars['item']->value['playable']==1){?>selected<?php }?>>可</option>
                            <option value="0" <?php if ($_smarty_tpl->tpl_vars['item']->value['playable']==0){?>selected<?php }?>>不可</option>
                        </select>
                    </td>
                    <td><label>転職</label></td>
                    <td><select name="classchange_id">
                            <option value="NULL" <?php if ($_smarty_tpl->tpl_vars['item']->value['own_skl_id']==null){?>selected<?php }?>>なし</option>
                            <option value="55" <?php if ($_smarty_tpl->tpl_vars['item']->value['classchange_id']==55){?>selected<?php }?>>★ハイプリースト</option>
							<option value="56" <?php if ($_smarty_tpl->tpl_vars['item']->value['classchange_id']==56){?>selected<?php }?>>★シーフファイター</option>
							<option value="57" <?php if ($_smarty_tpl->tpl_vars['item']->value['classchange_id']==57){?>selected<?php }?>>★マージナイト</option>
							<option value="58" <?php if ($_smarty_tpl->tpl_vars['item']->value['classchange_id']==58){?>selected<?php }?>>★ウォーリアー</option>
							<option value="59" <?php if ($_smarty_tpl->tpl_vars['item']->value['classchange_id']==59){?>selected<?php }?>>★マムルーク</option>
							<option value="60" <?php if ($_smarty_tpl->tpl_vars['item']->value['classchange_id']==60){?>selected<?php }?>>★セイジ</option>
							<option value="61" <?php if ($_smarty_tpl->tpl_vars['item']->value['classchange_id']==61){?>selected<?php }?>>★ジェネラル</option>
							<option value="62" <?php if ($_smarty_tpl->tpl_vars['item']->value['classchange_id']==62){?>selected<?php }?>>★ボウマスター</option>
							<option value="63" <?php if ($_smarty_tpl->tpl_vars['item']->value['classchange_id']==63){?>selected<?php }?>>★バーサーカー</option>
							<option value="64" <?php if ($_smarty_tpl->tpl_vars['item']->value['classchange_id']==64){?>selected<?php }?>>★ダークビショップ</option>
							<option value="65" <?php if ($_smarty_tpl->tpl_vars['item']->value['classchange_id']==65){?>selected<?php }?>>★ヴァルキリー</option>
							<option value="66" <?php if ($_smarty_tpl->tpl_vars['item']->value['classchange_id']==66){?>selected<?php }?>>★スナイパー</option>
							<option value="67" <?php if ($_smarty_tpl->tpl_vars['item']->value['classchange_id']==67){?>selected<?php }?>>★マーシナリー</option>
							<option value="68" <?php if ($_smarty_tpl->tpl_vars['item']->value['classchange_id']==68){?>selected<?php }?>>★グレートナイト</option>
							<option value="69" <?php if ($_smarty_tpl->tpl_vars['item']->value['classchange_id']==69){?>selected<?php }?>>★ソードマスター</option>
							<option value="70" <?php if ($_smarty_tpl->tpl_vars['item']->value['classchange_id']==70){?>selected<?php }?>>★デュークナイト</option>
							<option value="71" <?php if ($_smarty_tpl->tpl_vars['item']->value['classchange_id']==71){?>selected<?php }?>>★フォレストナイト</option>
							<option value="72" <?php if ($_smarty_tpl->tpl_vars['item']->value['classchange_id']==72){?>selected<?php }?>>★パラディン</option>
							<option value="73" <?php if ($_smarty_tpl->tpl_vars['item']->value['classchange_id']==73){?>selected<?php }?>>★ボウナイト</option>
							<option value="74" <?php if ($_smarty_tpl->tpl_vars['item']->value['classchange_id']==74){?>selected<?php }?>>★バロン</option>
							<option value="75" <?php if ($_smarty_tpl->tpl_vars['item']->value['classchange_id']==75){?>selected<?php }?>>★ファルコンナイト</option>
							<option value="76" <?php if ($_smarty_tpl->tpl_vars['item']->value['classchange_id']==76){?>selected<?php }?>>★ドラゴンマスター</option>
                	</select></td>
                </tr>
                
                <tr>
                    <td colspan="4">
                    	<input type="hidden" name="original_name" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['class_name'];?>
">
                        <input type="hidden" name="class_id" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['class_id'];?>
">
                        <input id="submit_update" type="submit" value="送信"><input type="reset" value="リセット"></td>
                </tr>
                
                <tr>
                	<td colspan="4">
                		<input type="button" id="closetb" value="閉じる">
                	</td>
                </tr>
            </table>
        </fieldset>
    </form>

</div>
<script "text/javascript" src="../themes/js/thickboxuseadmin.js"></script><?php }} ?>