<?php /* Smarty version Smarty-3.1.13, created on 2013-07-22 03:55:17
         compiled from "/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/useredit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:23678132251ebfedb9cf029-05454921%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e4461ad5d837bc8f2f94a53953357898bd0ac934' => 
    array (
      0 => '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/useredit.tpl',
      1 => 1374432913,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23678132251ebfedb9cf029-05454921',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51ebfedba32f32_40522464',
  'variables' => 
  array (
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51ebfedba32f32_40522464')) {function content_51ebfedba32f32_40522464($_smarty_tpl) {?><div class="form-container">

    <form id="edit" method="post" action="userupdate">
        <fieldset>
            <table>
            
                <tr>
                    <td><label>User ID： </label></td>
                    <td><input class="text-right" type="text" readonly size="40" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['user_id'];?>
"></td>
                </tr>
                
                <tr>
                    <td><label>User Name: </label></td>
                    <td><input type="text" name="user_name" size="40" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['user_name'];?>
"></td>
                </tr>
                
                <tr>
                    <td><label>Email: </label></td>
                    <td><input type="email" name="email" size="40" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['email'];?>
"></td>
                </tr>
                
                <tr>
                    <td><label>Password: </label></td>
                    <td><input type="password" name="password" size="40" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['password'];?>
"> <input type="button" id="md5" value="ハッシュ値変換"></td>
                </tr>

                <tr>
                    <td><label>Status: </label></td>
                    <td><select name="status">
                            <option value=1 <?php if ($_smarty_tpl->tpl_vars['item']->value['status']==1){?> selected<?php }?>
                            >登録</option>
                            <option value="0" <?php if ($_smarty_tpl->tpl_vars['item']->value['status']==0){?> selected<?php }?>>退会</option>
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <td><label>Memo: </label></td>
                    <td><textarea name="memo" rows="5" cols="45" wrap="soft"><?php echo $_smarty_tpl->tpl_vars['item']->value['memo'];?>
</textarea></td>
                </tr>

                <tr>
                    <td>
                        <input type="hidden" name="user_id" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['user_id'];?>
">
                        <input id="submit_update" type="submit" value="送信"><input type="reset" value="リセット"></td>
                </tr>
            </table>
        </fieldset>
    </form>

    <button id="closetb">閉じる</button>
    パスワード変更時はハッシュ値変換ボタンを押してください。

</div>
<script "text/javascript" src="../themes/js/library/md5.js"></script>
<script "text/javascript" src="../themes/js/thickboxuse.js"></script><?php }} ?>