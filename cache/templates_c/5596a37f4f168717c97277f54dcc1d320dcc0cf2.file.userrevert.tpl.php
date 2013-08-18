<?php /* Smarty version Smarty-3.1.13, created on 2013-08-16 12:57:17
         compiled from "/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/userrevert.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11060064351ec52a9133804-46394613%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5596a37f4f168717c97277f54dcc1d320dcc0cf2' => 
    array (
      0 => '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/userrevert.tpl',
      1 => 1376464295,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11060064351ec52a9133804-46394613',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51ec52a91bfb28_70272709',
  'variables' => 
  array (
    'result' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51ec52a91bfb28_70272709')) {function content_51ec52a91bfb28_70272709($_smarty_tpl) {?><div class="result-container">
    <h1>更新に成功しました!</h1><br />
    <p><?php echo $_smarty_tpl->tpl_vars['result']->value;?>
 件 データを復元しました.</p><br />
    <a href="userlist">ユーザーリストに戻る</a>
</div>
<?php }} ?>