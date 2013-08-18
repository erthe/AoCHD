<?php /* Smarty version Smarty-3.1.13, created on 2013-08-16 12:47:12
         compiled from "/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/userdelete.tpl" */ ?>
<?php /*%%SmartyHeaderCode:203768955951ec1020b21209-53777286%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2dd44bcb66adbf584717de8afe30d22b9720c3a0' => 
    array (
      0 => '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/userdelete.tpl',
      1 => 1376464194,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '203768955951ec1020b21209-53777286',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51ec1020b4a5b9_73894949',
  'variables' => 
  array (
    'result' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51ec1020b4a5b9_73894949')) {function content_51ec1020b4a5b9_73894949($_smarty_tpl) {?><div class="result-container">
    <h1>削除に成功しました!</h1><br />
    <p><?php echo $_smarty_tpl->tpl_vars['result']->value;?>
 件 削除しました.</p><br />
    <a href="userlist">ユーザーリストに戻る</a>
</div>
<?php }} ?>