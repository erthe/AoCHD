<?php /* Smarty version Smarty-3.1.13, created on 2013-08-19 13:04:09
         compiled from "/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/skillrevert.tpl" */ ?>
<?php /*%%SmartyHeaderCode:75698012652119939975737-07301082%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e2163a37c192a8352b642891571a66c9b394046f' => 
    array (
      0 => '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/skillrevert.tpl',
      1 => 1376883188,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '75698012652119939975737-07301082',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'result' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_521199399e75c6_81182704',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_521199399e75c6_81182704')) {function content_521199399e75c6_81182704($_smarty_tpl) {?><div class="result-container">
    <h1>更新に成功しました!</h1><br />
    <p><?php echo $_smarty_tpl->tpl_vars['result']->value;?>
 件 データを復元しました.</p><br />
    <a href="userlist">スキルリストに戻る</a>
</div>
<?php }} ?>