<?php /* Smarty version Smarty-3.1.13, created on 2013-08-15 12:03:02
         compiled from "/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/admininsert.tpl" */ ?>
<?php /*%%SmartyHeaderCode:530702319520b268d30f4f2-80100090%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '488d93add952a126492715094f5d57997115db2f' => 
    array (
      0 => '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/admininsert.tpl',
      1 => 1376464146,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '530702319520b268d30f4f2-80100090',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_520b268d34c7f3_15705572',
  'variables' => 
  array (
    'result' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_520b268d34c7f3_15705572')) {function content_520b268d34c7f3_15705572($_smarty_tpl) {?><div class="result-container">
    <h1>挿入に成功しました!</h1><br />
    <p><?php echo $_smarty_tpl->tpl_vars['result']->value;?>
 件 データを挿入しました</p><br />
    <a href="adminlist">管理者リストに戻る</a>
</div>
<?php }} ?>