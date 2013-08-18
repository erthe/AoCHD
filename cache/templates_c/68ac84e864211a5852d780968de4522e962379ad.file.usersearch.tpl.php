<?php /* Smarty version Smarty-3.1.13, created on 2013-08-18 03:33:44
         compiled from "/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/usersearch.tpl" */ ?>
<?php /*%%SmartyHeaderCode:113390605151ebe25039ccf5-26006566%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '68ac84e864211a5852d780968de4522e962379ad' => 
    array (
      0 => '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/usersearch.tpl',
      1 => 1376764053,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '113390605151ebe25039ccf5-26006566',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51ebe25039dd11_60326349',
  'variables' => 
  array (
    'search_user_id' => 0,
    'search_user_name' => 0,
    'search_email' => 0,
    'search_login' => 0,
    'search_status' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51ebe25039dd11_60326349')) {function content_51ebe25039dd11_60326349($_smarty_tpl) {?><div class="form-container">

    <form id="edit" method="post" action="userlist">
        <fieldset>
            <table class="table-center">
            
                <tr>
                    <td><label>ID： </label><input  class="text-right" type="text" name="search_user_id"  size="10" value="<?php echo $_smarty_tpl->tpl_vars['search_user_id']->value;?>
"></td>
                    <td><label>ユーザー名: </label><input type="text" name="search_user_name" size="10" value="<?php echo $_smarty_tpl->tpl_vars['search_user_name']->value;?>
"></td>
                    <td><label>Email: </label><input type="text" name="search_email" size="40" value="<?php echo $_smarty_tpl->tpl_vars['search_email']->value;?>
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