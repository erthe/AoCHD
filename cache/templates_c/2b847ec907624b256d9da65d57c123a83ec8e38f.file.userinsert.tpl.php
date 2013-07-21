<?php /* Smarty version Smarty-3.1.13, created on 2013-07-21 22:42:19
         compiled from "/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/userinsert.tpl" */ ?>
<?php /*%%SmartyHeaderCode:149386556151ebe53b4a1193-68785490%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2b847ec907624b256d9da65d57c123a83ec8e38f' => 
    array (
      0 => '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/userinsert.tpl',
      1 => 1374341807,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '149386556151ebe53b4a1193-68785490',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'result' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51ebe53b4c3d37_95242499',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51ebe53b4c3d37_95242499')) {function content_51ebe53b4c3d37_95242499($_smarty_tpl) {?><div class="result-container">
    <h1>Update was successful!</h1><br />
    <p><?php echo $_smarty_tpl->tpl_vars['result']->value;?>
 data updated.</p><br />
    <a href="userlist">ユーザーリストに戻る</a>
</div>
<?php }} ?>