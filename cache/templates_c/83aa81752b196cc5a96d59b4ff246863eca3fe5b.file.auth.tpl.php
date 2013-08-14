<?php /* Smarty version Smarty-3.1.13, created on 2013-07-30 11:41:12
         compiled from "/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/auth.tpl" */ ?>
<?php /*%%SmartyHeaderCode:52857532051ebfd7fc99004-67303314%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '83aa81752b196cc5a96d59b4ff246863eca3fe5b' => 
    array (
      0 => '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/auth.tpl',
      1 => 1375151663,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '52857532051ebfd7fc99004-67303314',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51ebfd7fcf5c95_75580498',
  'variables' => 
  array (
    'header' => 0,
    'login' => 0,
    'result' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51ebfd7fcf5c95_75580498')) {function content_51ebfd7fcf5c95_75580498($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php if ($_smarty_tpl->tpl_vars['login']->value==true){?>
    <meta http-equiv="refresh" content="5; URL=index">
<?php }else{ ?>
    <meta http-equiv="refresh" content="5; URL=login">
<?php }?>

<h1><?php echo $_smarty_tpl->tpl_vars['result']->value;?>
</h1><br />

<?php if ($_smarty_tpl->tpl_vars['login']->value==true){?>
    <a href="index">インデックス</a><br />
    <a href="logout">ログアウトする</a><br />
<?php }else{ ?>
    <a href="login">ログイン画面へ</a>
<?php }?>


<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>