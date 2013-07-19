<?php /* Smarty version Smarty-3.1.13, created on 2013-07-20 04:42:48
         compiled from "/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/userupdate.tpl" */ ?>
<?php /*%%SmartyHeaderCode:172974138451e98aa771d2a7-44053822%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '85970220ebf2162734a4d1c36e07a06fd029e4cc' => 
    array (
      0 => '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/userupdate.tpl',
      1 => 1374262964,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '172974138451e98aa771d2a7-44053822',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51e98aa771e2c0_30276519',
  'variables' => 
  array (
    'header' => 0,
    'result' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51e98aa771e2c0_30276519')) {function content_51e98aa771e2c0_30276519($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<meta http-equiv="refresh" content="5; URL=userlist">

<h1>Update was successful!</h1><br />
<p><?php echo $_smarty_tpl->tpl_vars['result']->value;?>
 data updated.</p><br />
<a href="userlist">ユーザーリストに戻る</a>

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>