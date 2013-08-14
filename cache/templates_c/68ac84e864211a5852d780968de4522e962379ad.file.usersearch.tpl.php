<?php /* Smarty version Smarty-3.1.13, created on 2013-08-14 14:27:22
         compiled from "/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/usersearch.tpl" */ ?>
<?php /*%%SmartyHeaderCode:113390605151ebe25039ccf5-26006566%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '68ac84e864211a5852d780968de4522e962379ad' => 
    array (
      0 => '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/usersearch.tpl',
      1 => 1376458039,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '113390605151ebe25039ccf5-26006566',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51ebe25039dd11_60326349',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51ebe25039dd11_60326349')) {function content_51ebe25039dd11_60326349($_smarty_tpl) {?><div class="form-container">

    <form id="edit" method="post" action="userlist">
        <fieldset>
            <table class="table-center">
            
                <tr>
                    <td><label>ID： </label><input  class="text-right" type="text" name="search_user_id"  size="10"></td>
                    <td><label>ユーザー名: </label><input type="text" name="search_user_name" size="10"></td>
                    <td><label>Email: </label><input type="text" name="search_email" size="40"></td>
        <td><label>Login</label>
            <select name="search_login">
                <option value="2">指定なし</option>
                <option value="1">ログイン中</option>
                <option value="0">ログアウト</option>
            </select>
        </td>
                    <td><label>状態: </label>
            <select name="search_status">
                <option value="2">指定なし</option>	
                <option value="1">登録</option>
                <option value="0">退会</option>
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