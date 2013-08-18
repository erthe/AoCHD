<?php /* Smarty version Smarty-3.1.13, created on 2013-08-18 03:35:39
         compiled from "/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/adminsearch.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2102307553520b1e148f0dc2-34124955%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a8e7ef6208033c8dc0cdb11b73469ee115001bd6' => 
    array (
      0 => '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/adminsearch.tpl',
      1 => 1376763952,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2102307553520b1e148f0dc2-34124955',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_520b1e1490f6f9_87839518',
  'variables' => 
  array (
    'search_admin_id' => 0,
    'search_admin_name' => 0,
    'search_login' => 0,
    'search_status' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_520b1e1490f6f9_87839518')) {function content_520b1e1490f6f9_87839518($_smarty_tpl) {?><div class="form-container">

    <form id="edit" method="post" action="adminlist">
        <fieldset>
            <table class="table-center">
            
                <tr>
                    <td><label>ID： </label><input  class="text-right" type="text" name="search_admin_id"  size="10" value="<?php echo $_smarty_tpl->tpl_vars['search_admin_id']->value;?>
"></td>
                    <td><label>管理者名: </label><input type="text" name="search_admin_name" size="10" value="<?php echo $_smarty_tpl->tpl_vars['search_admin_name']->value;?>
"></td>
        			<td><label>Login</label>
            			<select name="search_login">
                			<option value="2" <?php if (($_smarty_tpl->tpl_vars['search_login']->value==2)){?>selected<?php }?>>指定なし</option>
                			<option value="1" <?php if (($_smarty_tpl->tpl_vars['search_login']->value==1)){?>selected<?php }?>>ログイン中</option>
                			<option value="0" <?php if (($_smarty_tpl->tpl_vars['search_login']->value==0)){?>selected<?php }?>>ログアウト</option>
            			</select>
        			</td>
                    <td><label>状態: </label>
            			<select name="search_status">
                			<option value="2" <?php if (($_smarty_tpl->tpl_vars['search_status']->value==2)){?>selected<?php }?>>指定なし</option>	
                			<option value="1" <?php if (($_smarty_tpl->tpl_vars['search_status']->value==1)){?>selected<?php }?>>登録</option>
                			<option value="0" <?php if (($_smarty_tpl->tpl_vars['search_status']->value==0)){?>selected<?php }?>>退会</option>
                        </select>
                    </td>
                    <td>
            <input id="search_submit" type="submit" value="検索">
            <input id="search_reset" type="reset" value="リセット"></td>
                </tr>
            </table>
        </fieldset>
    </form>

</div>
<?php }} ?>