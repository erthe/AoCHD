<?php /* Smarty version Smarty-3.1.13, created on 2013-07-22 03:19:22
         compiled from "/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/user/auth.tpl" */ ?>
<?php /*%%SmartyHeaderCode:60301420351ebfd363cdcb7-77137449%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8a8d3d82f34083b78f975474d5208c41c0df0e94' => 
    array (
      0 => '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/user/auth.tpl',
      1 => 1374430756,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '60301420351ebfd363cdcb7-77137449',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51ebfd363eced6_70178996',
  'variables' => 
  array (
    'header' => 0,
    'login' => 0,
    'result' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51ebfd363eced6_70178996')) {function content_51ebfd363eced6_70178996($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php if ($_smarty_tpl->tpl_vars['login']->value==true){?>
    <meta http-equiv="refresh" content="5; URL=index">
<?php }else{ ?>
    <meta http-equiv="refresh" content="500; URL=login">
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