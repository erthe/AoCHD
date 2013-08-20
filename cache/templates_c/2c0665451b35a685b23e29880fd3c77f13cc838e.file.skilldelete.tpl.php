<?php /* Smarty version Smarty-3.1.13, created on 2013-08-19 13:01:13
         compiled from "/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/skilldelete.tpl" */ ?>
<?php /*%%SmartyHeaderCode:200023184052119889724535-06796115%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2c0665451b35a685b23e29880fd3c77f13cc838e' => 
    array (
      0 => '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/skilldelete.tpl',
      1 => 1376882898,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '200023184052119889724535-06796115',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'result' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_52119889791c83_96283177',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52119889791c83_96283177')) {function content_52119889791c83_96283177($_smarty_tpl) {?><div class="result-container">
    <h1>削除に成功しました!</h1><br />
    <p><?php echo $_smarty_tpl->tpl_vars['result']->value;?>
 件 削除しました</p><br />
    <a href="adminlist">スキルリストに戻る</a>
</div>
<?php }} ?>