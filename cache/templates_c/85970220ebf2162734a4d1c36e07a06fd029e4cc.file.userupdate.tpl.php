<?php /* Smarty version Smarty-3.1.13, created on 2013-07-22 03:09:39
         compiled from "/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/userupdate.tpl" */ ?>
<?php /*%%SmartyHeaderCode:189223458851ec23e31876b0-13154162%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '85970220ebf2162734a4d1c36e07a06fd029e4cc' => 
    array (
      0 => '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/userupdate.tpl',
      1 => 1374309963,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '189223458851ec23e31876b0-13154162',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'result' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51ec23e31a9371_20610419',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51ec23e31a9371_20610419')) {function content_51ec23e31a9371_20610419($_smarty_tpl) {?><div class="result-container">
    <h1>Update was successful!</h1><br />
    <p><?php echo $_smarty_tpl->tpl_vars['result']->value;?>
 data updated.</p><br />
    <a href="userlist">ユーザーリストに戻る</a>
</div>
<?php }} ?>