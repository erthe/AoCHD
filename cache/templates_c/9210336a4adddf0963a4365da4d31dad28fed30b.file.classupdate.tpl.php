<?php /* Smarty version Smarty-3.1.13, created on 2013-08-16 15:51:35
         compiled from "/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/classupdate.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2093892781520dcb67402f97-18542596%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9210336a4adddf0963a4365da4d31dad28fed30b' => 
    array (
      0 => '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/classupdate.tpl',
      1 => 1376635809,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2093892781520dcb67402f97-18542596',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_520dcb6743b2b3_86225495',
  'variables' => 
  array (
    'result' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_520dcb6743b2b3_86225495')) {function content_520dcb6743b2b3_86225495($_smarty_tpl) {?><div class="result-container">
    <h1>更新に成功しました!</h1><br />
    <p><?php echo $_smarty_tpl->tpl_vars['result']->value;?>
 件 データ更新しました</p><br />
    <a href="classlist">管理者リストに戻る</a>
</div>
<?php }} ?>