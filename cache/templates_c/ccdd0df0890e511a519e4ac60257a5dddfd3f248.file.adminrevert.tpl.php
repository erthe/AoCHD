<?php /* Smarty version Smarty-3.1.13, created on 2013-08-19 13:02:41
         compiled from "/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/adminrevert.tpl" */ ?>
<?php /*%%SmartyHeaderCode:576445971520b31fb4ddfb3-46167082%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ccdd0df0890e511a519e4ac60257a5dddfd3f248' => 
    array (
      0 => '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/adminrevert.tpl',
      1 => 1376883203,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '576445971520b31fb4ddfb3-46167082',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_520b31fb508630_60547560',
  'variables' => 
  array (
    'result' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_520b31fb508630_60547560')) {function content_520b31fb508630_60547560($_smarty_tpl) {?><div class="result-container">
    <h1>更新に成功しました!</h1><br />
    <p><?php echo $_smarty_tpl->tpl_vars['result']->value;?>
 件 データを復元しました.</p><br />
    <a href="userlist">スキルリストに戻る</a>
</div>
<?php }} ?>