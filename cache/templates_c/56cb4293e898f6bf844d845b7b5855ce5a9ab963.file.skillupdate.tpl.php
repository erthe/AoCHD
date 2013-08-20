<?php /* Smarty version Smarty-3.1.13, created on 2013-08-19 12:54:07
         compiled from "/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/skillupdate.tpl" */ ?>
<?php /*%%SmartyHeaderCode:56720648521196c2d2ed60-98826006%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '56cb4293e898f6bf844d845b7b5855ce5a9ab963' => 
    array (
      0 => '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/skillupdate.tpl',
      1 => 1376884439,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '56720648521196c2d2ed60-98826006',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_521196c2d57930_05246642',
  'variables' => 
  array (
    'result' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_521196c2d57930_05246642')) {function content_521196c2d57930_05246642($_smarty_tpl) {?><div class="result-container">
    <h1>更新に成功しました!</h1><br />
    <p><?php echo $_smarty_tpl->tpl_vars['result']->value;?>
 件 データ更新しました</p><br />
    <a href="skilllist">スキルリストに戻る</a>
</div>
<?php }} ?>