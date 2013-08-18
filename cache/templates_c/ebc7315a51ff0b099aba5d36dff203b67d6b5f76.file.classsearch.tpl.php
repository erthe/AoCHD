<?php /* Smarty version Smarty-3.1.13, created on 2013-08-18 02:59:11
         compiled from "/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/classsearch.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1732827939520fa31ce030d5-38681776%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ebc7315a51ff0b099aba5d36dff203b67d6b5f76' => 
    array (
      0 => '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/classsearch.tpl',
      1 => 1376762349,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1732827939520fa31ce030d5-38681776',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_520fa31ce07ee2_52967808',
  'variables' => 
  array (
    'search_class_id' => 0,
    'search_class_rank' => 0,
    'search_class_name' => 0,
    'search_playable' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_520fa31ce07ee2_52967808')) {function content_520fa31ce07ee2_52967808($_smarty_tpl) {?><div class="form-container">

    <form id="edit" method="post" action="classlist">
        <fieldset>
            <table class="table-center">
            
                <tr>
                    <td><label>ID： </label><input  class="text-right" type="text" name="search_class_id"  size="10" value="<?php echo $_smarty_tpl->tpl_vars['search_class_id']->value;?>
"></td>
                    <td><label>クラスランク: </label><input type="text" name="search_class_rank" size="10" value="<?php echo $_smarty_tpl->tpl_vars['search_class_rank']->value;?>
"></td>
                    <td><label>クラス名: </label><input type="text" name="search_class_name" size="10" value="<?php echo $_smarty_tpl->tpl_vars['search_class_name']->value;?>
"></td>
        			<td><label>選択</label>
            			<select name="search_playable">
		                	<option value="2" <?php if (($_smarty_tpl->tpl_vars['search_playable']->value==2)){?>selected<?php }?>>指定なし</option>
		                	<option value="1" <?php if (($_smarty_tpl->tpl_vars['search_playable']->value==1)){?>selected<?php }?>>可</option>
		                	<option value="0" <?php if (($_smarty_tpl->tpl_vars['search_playable']->value==0)){?>selected<?php }?>>不可</option>
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