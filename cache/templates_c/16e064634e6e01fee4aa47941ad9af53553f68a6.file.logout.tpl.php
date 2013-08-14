<?php /* Smarty version Smarty-3.1.13, created on 2013-08-14 15:50:22
         compiled from "/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/logout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:30065700151ebfd26e2ebb3-27574194%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '16e064634e6e01fee4aa47941ad9af53553f68a6' => 
    array (
      0 => '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/logout.tpl',
      1 => 1375151663,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30065700151ebfd26e2ebb3-27574194',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51ebfd26eb1912_54885387',
  'variables' => 
  array (
    'header' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51ebfd26eb1912_54885387')) {function content_51ebfd26eb1912_54885387($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<meta http-equiv="Refresh" content="5, ./login">

<p>ログアウトしました。</p>
<p><a href="./login">ログイン</a></p>

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>