<?php /* Smarty version Smarty-3.1.13, created on 2013-07-20 03:37:12
         compiled from "/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:123796177851e8ff71901a65-68917234%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9dee960704b14fee48b0ac23da0d07ae9a5f3528' => 
    array (
      0 => '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/edit.tpl',
      1 => 1374258976,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '123796177851e8ff71901a65-68917234',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51e8ff7194feb5_79428128',
  'variables' => 
  array (
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51e8ff7194feb5_79428128')) {function content_51e8ff7194feb5_79428128($_smarty_tpl) {?><div class="form-container">

    <form id="edit" method="post" action="edituser">
        <fieldset>
            <table>
            
                <tr>
                    <td><label>User ID： </label></td>
                    <td><input type="text" readonly size="40" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['user_id'];?>
"</td>
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
                            <option value="1">登録</option>
                            <option value="0">退会</option>
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <td><label>Memo: </label></td>
                    <td><textarea name="memo" rows="2" cols="40" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['memo'];?>
"></textarea></td>
                </tr>

                <tr>
                    <td><input type="submit" value="送信"><input type="reset" value="リセット"></td>
                </tr>
            </table>
        </fieldset>
    </form>

    <button id="closetb">閉じる</button>

</div>
<script "text/javascript" src="../themes/js/library/md5.js"></script>
<script "text/javascript" src="../themes/js/thickboxuse.js"></script><?php }} ?>