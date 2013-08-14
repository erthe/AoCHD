<?php /* Smarty version Smarty-3.1.13, created on 2013-07-30 11:41:16
         compiled from "/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:40446565451ebfd830f1374-93185411%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8489de0c95efc70c3a1db83d320df76efb36cb1d' => 
    array (
      0 => '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/index.tpl',
      1 => 1375151663,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '40446565451ebfd830f1374-93185411',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51ebfd8312b500_63741150',
  'variables' => 
  array (
    'header' => 0,
    'status' => 0,
    'menu' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51ebfd8312b500_63741150')) {function content_51ebfd8312b500_63741150($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['status']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['menu']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


ログインテスト。

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>