<?php /* Smarty version Smarty-3.1.13, created on 2013-07-22 03:40:15
         compiled from "/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/user/logout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:24074812351ec1b8bc59034-90849501%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ec3a05da1bdf2661c61c967bd2c33b9a58a59b01' => 
    array (
      0 => '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/user/logout.tpl',
      1 => 1374432009,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24074812351ec1b8bc59034-90849501',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51ec1b8bc7da54_36624518',
  'variables' => 
  array (
    'header' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51ec1b8bc7da54_36624518')) {function content_51ec1b8bc7da54_36624518($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<meta http-equiv="Refresh" content="500, ./login">

<p>ログアウトしました。</p>
<p><a href="./login">ログイン</a></p>

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>