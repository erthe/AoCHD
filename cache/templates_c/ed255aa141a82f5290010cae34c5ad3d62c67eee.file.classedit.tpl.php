<?php /* Smarty version Smarty-3.1.13, created on 2013-08-18 00:50:59
         compiled from "/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/classedit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:936123028520d6fb5f21c47-11213216%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ed255aa141a82f5290010cae34c5ad3d62c67eee' => 
    array (
      0 => '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/classedit.tpl',
      1 => 1376754655,
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
                    <td colspan="2"><input class="text-right" type="text" name="def_grow" size="5" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['def_grow'];?>
%"></td>
                </tr>

                <tr>
                    <td><label>MDF: </label></td>
                    <td><input class="text-right" type="text" name="mdf_val" size="5" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['mdf_val'];?>
"></td>
                    <td><label>MDF率: </label></td>
                    <td colspan="2"><input class="text-right" type="text" name="mdf_grow" size="5" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['mdf_grow'];?>
%"></td>
                </tr>

                <tr>
                    <td><label>BOD: </label></td>
                    <td><input class="text-right" type="text" name="bod_val" size="5" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['bod_val'];?>
"></td>
                    <td><label>BOD率: </label></td>
                    <td colspan="2"><input class="text-right" type="text" name="bod_grow" size="5" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['bod_grow'];?>
%"></td>
                </tr>

                <tr>
                	<td><label>スキル: </label></td>
                    <td><select name="own_skl_id">
                    		<option value="NULL" <?php if ($_smarty_tpl->tpl_vars['item']->value['own_skl_id']==null){?>selected<?php }?>>なし</option>
                            <option value="1" <?php if ($_smarty_tpl->tpl_vars['item']->value['own_skl_id']==1){?>selected<?php }?>>可</option>
                            <option value="2" <?php if ($_smarty_tpl->tpl_vars['item']->value['own_skl_id']==2){?>selected<?php }?>>不可</option>
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