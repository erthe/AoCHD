<?php /* Smarty version Smarty-3.1.13, created on 2013-08-14 16:15:28
         compiled from "/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/admindelete.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1019062215520b2994834fe3-76932896%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2418c702f5d4eee58bc882b8493e89bd9ced4904' => 
    array (
      0 => '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/admindelete.tpl',
      1 => 1376464052,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1019062215520b2994834fe3-76932896',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_520b2994869916_37438049',
  'variables' => 
  array (
    'result' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_520b2994869916_37438049')) {function content_520b2994869916_37438049($_smarty_tpl) {?><div class="result-container">
    <h1>削除に成功しました!</h1><br />
    <p><?php echo $_smarty_tpl->tpl_vars['result']->value;?>
 件 削除しました</p><br />
    <a href="adminlist">管理者リストに戻る</a>
</div>
<?php }} ?>