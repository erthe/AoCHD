<?php /* Smarty version Smarty-3.1.13, created on 2013-08-16 17:17:30
         compiled from "/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/classinsert.tpl" */ ?>
<?php /*%%SmartyHeaderCode:389207359520de01a690994-47465047%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2a01d1d8e7e7102cbca3dbe5b22d39e89f01edc3' => 
    array (
      0 => '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/classinsert.tpl',
      1 => 1376637313,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '389207359520de01a690994-47465047',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'result' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_520de01a6cf0f6_29733422',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_520de01a6cf0f6_29733422')) {function content_520de01a6cf0f6_29733422($_smarty_tpl) {?><div class="result-container">
    <h1>挿入に成功しました!</h1><br />
    <p><?php echo $_smarty_tpl->tpl_vars['result']->value;?>
 件 データを挿入しました</p><br />
    <a href="classlist">クラスリストに戻る</a>
</div>
<?php }} ?>