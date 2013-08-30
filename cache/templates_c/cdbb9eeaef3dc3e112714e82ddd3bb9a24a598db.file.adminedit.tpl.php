<?php /* Smarty version Smarty-3.1.13, created on 2013-08-20 22:12:20
         compiled from "/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/adminedit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1131359872520b2b9275ee86-04395277%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cdbb9eeaef3dc3e112714e82ddd3bb9a24a598db' => 
    array (
      0 => '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/adminedit.tpl',
      1 => 1377001966,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1131359872520b2b9275ee86-04395277',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_520b2b927c4f97_94078854',
  'variables' => 
  array (
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_520b2b927c4f97_94078854')) {function content_520b2b927c4f97_94078854($_smarty_tpl) {?><div class="window-container">

    <form id="edit-admin" method="post" action="adminupdate">
        <fieldset>
            <table>
            
                <tr>
                    <td><label>ID： </label></td>
                    <td><input class="text-right" type="text" readonly size="40" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['admin_id'];?>
"></td>
                </tr>
                
                <tr>
                    <td><label>管理者名: </label></td>
                    <td><input type="text" name="admin_name" size="40" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['admin_name'];?>
"></td>
                </tr>
                
                <tr>
                    <td><label>パスワード: </label></td>
                    <td><input type="password" name="password" size="40" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['password'];?>
"> <input type="button" id="md5" value="ハッシュ値変換"></td>
                </tr>

                <tr>
                    <td><label>状態: </label></td>
                    <td><select name="status">
                            <option value=1 <?php if ($_smarty_tpl->tpl_vars['item']->value['status']==1){?> selected<?php }?>
                            >登録</option>
                            <option value="0" <?php if ($_smarty_tpl->tpl_vars['item']->value['status']==0){?> selected<?php }?>>退会</option>
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <td>
                    	<input type="hidden" name="original_name" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['admin_name'];?>
">
                        <input type="hidden" name="admin_id" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['admin_id'];?>
">
                        <input id="admin_update" type="submit" value="送信"><input type="reset" value="リセット"></td>
                </tr>
                                
                <tr>
                	<td colspan="2">
                		<input type="button" id="closetb" value="閉じる">
                		パスワード変更時はハッシュ値変換ボタンを押してください。
                	</td>
                </tr>
            </table>
        </fieldset>
    </form>

</div>
<script "text/javascript" src="../themes/js/library/md5.js"></script>
<script "text/javascript" src="../themes/js/thickboxuseadmin.js"></script><?php }} ?>