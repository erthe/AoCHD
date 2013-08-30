<?php /* Smarty version Smarty-3.1.13, created on 2013-08-21 23:51:10
         compiled from "/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/skillcreate.tpl" */ ?>
<?php /*%%SmartyHeaderCode:87613122521192711643c1-62521932%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8d91a57f9b38fb6be36dad4430191fd7f564f34b' => 
    array (
      0 => '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/skillcreate.tpl',
      1 => 1377007785,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '87613122521192711643c1-62521932',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_521192711858f4_37833750',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_521192711858f4_37833750')) {function content_521192711858f4_37833750($_smarty_tpl) {?><div class="window-container">

    <form id="edit-skill" method="post" action="skillinsert">
        <fieldset>
            <table>
            
                <tr>
                    <td><label>ID： </label></td>
                    <td><input type="text" readonly size="40"></td>
                </tr>
                
                <tr>
                    <td><label>スキル名: </label></td>
                    <td><input type="text" name="skill_name" size="40"></td>
                </tr>
                
                <tr>
                    <td><label>説明</label></td>
                    <td><input type="text" name="description" size="40" > </td>
                </tr>
                
                <tr>
                    <td>
                        <input id="skill_insert" type="submit" value="送信"><input type="reset" value="リセット"></td>
                </tr>
                
                <tr>
                	<td colspan="2">
                		<input type="button" id="closetb" value="閉じる">
                	</td>
                </tr>
            </table>
        </fieldset>
    </form>

</div>
<script "text/javascript" src="../themes/js/library/md5.js"></script>
<script "text/javascript" src="../themes/js/thickboxuseadmin.js"></script><?php }} ?>