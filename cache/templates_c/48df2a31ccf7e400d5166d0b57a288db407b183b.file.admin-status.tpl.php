<?php /* Smarty version Smarty-3.1.13, created on 2013-07-20 05:12:29
         compiled from "/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/themes/layout/admin-status.tpl" */ ?>
<?php /*%%SmartyHeaderCode:143356836951e99d35b47b73-29136941%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '48df2a31ccf7e400d5166d0b57a288db407b183b' => 
    array (
      0 => '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/themes/layout/admin-status.tpl',
      1 => 1374264736,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '143356836951e99d35b47b73-29136941',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51e99d35bc00d4_15046624',
  'variables' => 
  array (
    'admin' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51e99d35bc00d4_15046624')) {function content_51e99d35bc00d4_15046624($_smarty_tpl) {?><p class="loginstatus">
    you login as <?php echo $_smarty_tpl->tpl_vars['admin']->value;?>
. <a href="logout">logout</a>
</p><?php }} ?>