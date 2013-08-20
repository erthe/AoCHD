<?php /* Smarty version Smarty-3.1.13, created on 2013-08-19 12:53:36
         compiled from "/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/skilledit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:588911165521194575c15a6-50476650%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b6580e768dec958825d89bfde49420dac49e5696' => 
    array (
      0 => '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/skilledit.tpl',
      1 => 1376884342,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '588911165521194575c15a6-50476650',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5211945760a5d9_02516822',
  'variables' => 
  array (
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5211945760a5d9_02516822')) {function content_5211945760a5d9_02516822($_smarty_tpl) {?><div class="window-container">

    <form id="edit" method="post" action="skillupdate">
        <fieldset>
            <table>
            
                <tr>
                    <td><label>ID： </label></td>
                    <td><input class="text-right" type="text" readonly size="40" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['skill_id'];?>
"></td>
                </tr>
                
                <tr>
                    <td><label>スキル名</label></td>
                    <td><input type="text" name="skill_name" size="40" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['skill_name'];?>
"></td>
                </tr>
                
                <tr>
                    <td><label>説明: </label></td>
                    <td><input type="text" name="description" size="40" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['description'];?>
"></td>
                </tr>
                
                <tr>
                    <td>
                    	<input type="hidden" name="original_name" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['skill_name'];?>
">
                        <input type="hidden" name="skill_id" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['skill_id'];?>
">
                        <input id="submit_update" type="submit" value="送信"><input type="reset" value="リセット"></td>
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