<?php /* Smarty version Smarty-3.1.13, created on 2013-07-20 05:47:24
         compiled from "/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/auth.tpl" */ ?>
<?php /*%%SmartyHeaderCode:40841411451e02e1cd315e3-12964481%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '83aa81752b196cc5a96d59b4ff246863eca3fe5b' => 
    array (
      0 => '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/auth.tpl',
      1 => 1374266838,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '40841411451e02e1cd315e3-12964481',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51e02e1cdae771_04664190',
  'variables' => 
  array (
    'header' => 0,
    'login' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51e02e1cdae771_04664190')) {function content_51e02e1cdae771_04664190($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php if ($_smarty_tpl->tpl_vars['login']->value==true){?>
    <meta http-equiv="refresh" content="5; URL=index">
<?php }else{ ?>
    <meta http-equiv="refresh" content="5; URL=login">
<?php }?>

<h1>login was successful.</h1><br />

<a href="index">インデックス</a><br />
<a href="logout">ログアウトする</a><br />

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>