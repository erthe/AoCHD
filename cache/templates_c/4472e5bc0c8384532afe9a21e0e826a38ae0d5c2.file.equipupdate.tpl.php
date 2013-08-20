<?php /* Smarty version Smarty-3.1.13, created on 2013-08-20 15:13:02
         compiled from "/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/equipupdate.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1013261677521308ee5a6579-60965640%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4472e5bc0c8384532afe9a21e0e826a38ae0d5c2' => 
    array (
      0 => '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/equipupdate.tpl',
      1 => 1376979042,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1013261677521308ee5a6579-60965640',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'result' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_521308ee5d9271_51321704',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_521308ee5d9271_51321704')) {function content_521308ee5d9271_51321704($_smarty_tpl) {?><div class="result-container">
    <h1>更新に成功しました!</h1><br />
    <p><?php echo $_smarty_tpl->tpl_vars['result']->value;?>
 件 データ更新しました</p><br />
    <a href="itemlist">アイテムリストに戻る</a>
</div>
<?php }} ?>