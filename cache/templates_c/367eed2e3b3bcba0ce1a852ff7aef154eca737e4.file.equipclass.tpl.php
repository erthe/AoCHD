<?php /* Smarty version Smarty-3.1.13, created on 2013-08-22 19:44:30
         compiled from "/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/equipclass.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15694540235212eab6964913-36737804%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '367eed2e3b3bcba0ce1a852ff7aef154eca737e4' => 
    array (
      0 => '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/equipclass.tpl',
      1 => 1377168266,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15694540235212eab6964913-36737804',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5212eab69994b6_96334568',
  'variables' => 
  array (
    'item' => 0,
    'no' => 0,
    'classes' => 0,
    'class_id' => 0,
    'class' => 0,
    'tdno' => 0,
    'classid' => 0,
    'trno' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5212eab69994b6_96334568')) {function content_5212eab69994b6_96334568($_smarty_tpl) {?><div class="window-container">

	<?php echo $_smarty_tpl->tpl_vars['item']->value['item_name'];?>
 装備クラス一覧	
    <form id="edit-equip" method="post" action="equipupdate">
        <fieldset>
            <table class="table-center">
                
                <?php $_smarty_tpl->tpl_vars['trno'] = new Smarty_variable(0, null, 0);?>
                <?php $_smarty_tpl->tpl_vars['tdno'] = new Smarty_variable(1, null, 0);?>
                <?php $_smarty_tpl->tpl_vars['no'] = new Smarty_variable(0, null, 0);?>
                <?php $_smarty_tpl->tpl_vars['class_id'] = new Smarty_variable(1, null, 0);?>
                
                <tr id="trno_<?php echo $_smarty_tpl->tpl_vars['no']->value;?>
" class="list">
                <?php  $_smarty_tpl->tpl_vars['class'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['class']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['classes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['class']->key => $_smarty_tpl->tpl_vars['class']->value){
$_smarty_tpl->tpl_vars['class']->_loop = true;
?>
                	<?php $_smarty_tpl->tpl_vars['classid'] = new Smarty_variable(('classid_').($_smarty_tpl->tpl_vars['class_id']->value), null, 0);?>
	                <td><label><?php echo $_smarty_tpl->tpl_vars['class']->value['class_name'];?>
: </label></td>
	                <td><select name="classid_<?php echo $_smarty_tpl->tpl_vars['tdno']->value;?>
">
							<option value="0" <?php if ($_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['classid']->value]=='0'){?>selected<?php }?>>☓</option>
                       		<option value="1" <?php if ($_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['classid']->value]=='1'){?>selected<?php }?>>○</option>
                       	</select>
					</td>
	                <?php $_smarty_tpl->tpl_vars['tdno'] = new Smarty_variable($_smarty_tpl->tpl_vars['tdno']->value+1, null, 0);?>
	                <?php $_smarty_tpl->tpl_vars['trno'] = new Smarty_variable($_smarty_tpl->tpl_vars['trno']->value+1, null, 0);?>
	                <?php $_smarty_tpl->tpl_vars['no'] = new Smarty_variable($_smarty_tpl->tpl_vars['no']->value+1, null, 0);?>
	                <?php if ($_smarty_tpl->tpl_vars['trno']->value>=5){?></tr><tr id="trno_<?php echo $_smarty_tpl->tpl_vars['no']->value;?>
" class="list"><?php $_smarty_tpl->tpl_vars['trno'] = new Smarty_variable(0, null, 0);?><?php }?>
	                <?php $_smarty_tpl->tpl_vars['class_id'] = new Smarty_variable($_smarty_tpl->tpl_vars['class_id']->value+1, null, 0);?> 
				<?php } ?>
				</tr>
                
                <tr>
                    <td>
                        <input type="hidden" name="equip_class_id" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['equip_class_id'];?>
">
                        <input id="equip_update" type="submit" value="送信"><input type="reset" value="リセット"></td>
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
<script "text/javascript" src="../themes/js/thickboxuseadmin.js"></script><?php }} ?>