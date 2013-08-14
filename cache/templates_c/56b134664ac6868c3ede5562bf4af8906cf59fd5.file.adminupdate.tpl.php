<?php /* Smarty version Smarty-3.1.13, created on 2013-08-14 16:26:28
         compiled from "/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/adminupdate.tpl" */ ?>
<?php /*%%SmartyHeaderCode:896208062520b2e00733f38-82901152%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '56b134664ac6868c3ede5562bf4af8906cf59fd5' => 
    array (
      0 => '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/adminupdate.tpl',
      1 => 1376465173,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '896208062520b2e00733f38-82901152',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_520b2e00764614_52455294',
  'variables' => 
  array (
    'result' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_520b2e00764614_52455294')) {function content_520b2e00764614_52455294($_smarty_tpl) {?><div class="result-container">
    <h1>更新に成功しました!</h1><br />
    <p><?php echo $_smarty_tpl->tpl_vars['result']->value;?>
 件 データ更新しました</p><br />
    <a href="adminlist">管理者リストに戻る</a>
</div>
<?php }} ?>