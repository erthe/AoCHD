<?php /* Smarty version Smarty-3.1.13, created on 2013-08-19 12:42:56
         compiled from "/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/skillinsert.tpl" */ ?>
<?php /*%%SmartyHeaderCode:839495842521193de4ec1b9-52762605%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8bd2538cb1ed00af43e86f1556ee230b35af437f' => 
    array (
      0 => '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/skillinsert.tpl',
      1 => 1376883697,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '839495842521193de4ec1b9-52762605',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_521193de544001_95284040',
  'variables' => 
  array (
    'result' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_521193de544001_95284040')) {function content_521193de544001_95284040($_smarty_tpl) {?><div class="result-container">
    <h1>挿入に成功しました!</h1><br />
    <p><?php echo $_smarty_tpl->tpl_vars['result']->value;?>
 件 データを挿入しました</p><br />
    <a href="skilllist">スキルリストに戻る</a>
</div>
<?php }} ?>