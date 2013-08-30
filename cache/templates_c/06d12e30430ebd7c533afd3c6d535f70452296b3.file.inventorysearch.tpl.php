<?php /* Smarty version Smarty-3.1.13, created on 2013-08-24 02:50:03
         compiled from "/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/inventorysearch.tpl" */ ?>
<?php /*%%SmartyHeaderCode:47144835152179a996f8008-48516624%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '06d12e30430ebd7c533afd3c6d535f70452296b3' => 
    array (
      0 => '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/inventorysearch.tpl',
      1 => 1377280200,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '47144835152179a996f8008-48516624',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_52179a99d4e275_51019895',
  'variables' => 
  array (
    'search_item_id' => 0,
    'search_item_name' => 0,
    'search_weapon_type' => 0,
    'search_user_data_id' => 0,
    'search_user_name' => 0,
    'search_email' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52179a99d4e275_51019895')) {function content_52179a99d4e275_51019895($_smarty_tpl) {?><div class="form-container">

    <form id="edit" method="post" action="inventorylist">
        <fieldset>
        	<table class="table-center">
            
                <tr>
                    <td><label>ID： </label><input  class="text-right" type="text" name="search_item_id"  size="5" value="<?php echo $_smarty_tpl->tpl_vars['search_item_id']->value;?>
"></td>
                    <td><label>アイテム名: </label><input type="text" name="search_item_name" size="15" value="<?php echo $_smarty_tpl->tpl_vars['search_item_name']->value;?>
"></td>
        			<td><label>種別</label>
            			<select name="search_weapon_type">
		                	<option value="99" <?php if (($_smarty_tpl->tpl_vars['search_weapon_type']->value==99)){?>selected<?php }?>>指定なし</option>
		                	<option value="1" <?php if (($_smarty_tpl->tpl_vars['search_weapon_type']->value==1)){?>selected<?php }?>>剣</option>
		                	<option value="2" <?php if (($_smarty_tpl->tpl_vars['search_weapon_type']->value==2)){?>selected<?php }?>>槍</option>
		                	<option value="3" <?php if (($_smarty_tpl->tpl_vars['search_weapon_type']->value==3)){?>selected<?php }?>>斧</option>
		                	<option value="4" <?php if (($_smarty_tpl->tpl_vars['search_weapon_type']->value==4)){?>selected<?php }?>>弓</option>
		                	<option value="5" <?php if (($_smarty_tpl->tpl_vars['search_weapon_type']->value==5)){?>selected<?php }?>>炎</option>
		                	<option value="6" <?php if (($_smarty_tpl->tpl_vars['search_weapon_type']->value==6)){?>selected<?php }?>>雷</option>
		                	<option value="7" <?php if (($_smarty_tpl->tpl_vars['search_weapon_type']->value==7)){?>selected<?php }?>>風</option>
		                	<option value="8" <?php if (($_smarty_tpl->tpl_vars['search_weapon_type']->value==8)){?>selected<?php }?>>闇</option>
		                	<option value="9" <?php if (($_smarty_tpl->tpl_vars['search_weapon_type']->value==9)){?>selected<?php }?>>光</option>
		                	<option value="0" <?php if (($_smarty_tpl->tpl_vars['search_weapon_type']->value==0)){?>selected<?php }?>>無</option>
            			</select>
        			</td>
        			<td><lavel>所有者ID</label><input class="text-right" type="text" name="search_user_data_id" size="5" value="<?php echo $_smarty_tpl->tpl_vars['search_user_data_id']->value;?>
"></td>
        			<td><label>所有者名: </label><input type="text" name="search_user_name" size="10" value="<?php echo $_smarty_tpl->tpl_vars['search_user_name']->value;?>
"></td>
        			<td><label>Email: </label><input type="text" name="search_email" size="30" value="<?php echo $_smarty_tpl->tpl_vars['search_email']->value;?>
"></td>
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
<?php }} ?>