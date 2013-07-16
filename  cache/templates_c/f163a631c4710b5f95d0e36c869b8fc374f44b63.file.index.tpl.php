<?php /* Smarty version Smarty-3.1.13, created on 2013-04-26 10:17:22
         compiled from "D:\workspaces\ArenaofGenelogy\application\views\index\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15381516bf3170429e1-47599032%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f163a631c4710b5f95d0e36c869b8fc374f44b63' => 
    array (
      0 => 'D:\\workspaces\\ArenaofGenelogy\\application\\views\\index\\index.tpl',
      1 => 1366939041,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15381516bf3170429e1-47599032',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_516bf3170d7557_84704292',
  'variables' => 
  array (
    'header' => 0,
    'name' => 0,
    'items' => 0,
    'item' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_516bf3170d7557_84704292')) {function content_516bf3170d7557_84704292($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\workspaces\\ArenaOfGenelogy\\library\\Smarty\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


こんにちは、<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
さん!!
今日は<?php echo smarty_modifier_date_format(time(),'%Y年%m月%d日');?>
です。

<?php if (count($_smarty_tpl->tpl_vars['items']->value)>0){?>
    <table>
        <thead>
            <tr>
                <th>user_id</th>
                <th>user_status_id</th>
                <th>user_name</th>
                <th>email</th>
                <th>password</th>
                <th>created_on</th>
                <th>updated_on</th>
            </tr>
        </thead>

        <tbody>
            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['user_id'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['user_status_id'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['user_name'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['email'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['password'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['created_on'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['updated_on'];?>
</td>
            <?php } ?>
        </tbody>
    </table>
<?php }else{ ?>
    there is no-data.
<?php }?>

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>