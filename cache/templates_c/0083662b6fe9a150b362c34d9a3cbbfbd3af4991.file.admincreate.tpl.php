<?php /* Smarty version Smarty-3.1.13, created on 2013-08-14 15:54:21
         compiled from "/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/admincreate.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1893753669520b259feba4e8-39849737%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0083662b6fe9a150b362c34d9a3cbbfbd3af4991' => 
    array (
      0 => '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/admincreate.tpl',
      1 => 1376462781,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1893753669520b259feba4e8-39849737',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_520b259fee8590_94749324',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_520b259fee8590_94749324')) {function content_520b259fee8590_94749324($_smarty_tpl) {?><div class="form-container">

    <form id="edit" method="post" action="admininsert">
        <fieldset>
            <table>
            
                <tr>
                    <td><label>ID： </label></td>
                    <td><input type="text" readonly size="40"></td>
                </tr>
                
                <tr>
                    <td><label>管理者名: </label></td>
                    <td><input type="text" name="admin_name" size="40"></td>
                </tr>
                
                <tr>
                    <td><label>パスワード: </label></td>
                    <td><input type="password" name="password" size="40" > </td>
                </tr>

                <tr>
                    <td><label>状態: </label></td>
                    <td><select name="status">
                            <option value="1">登録</option>
                            <option value="0">退会</option>
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <input id="submit_insert" type="submit" value="送信"><input type="reset" value="リセット"></td>
                </tr>
            </table>
        </fieldset>
    </form>

    <button id="closetb">閉じる</button>

</div>
<script "text/javascript" src="../themes/js/library/md5.js"></script>
<script "text/javascript" src="../themes/js/thickboxuse.js"></script><?php }} ?>