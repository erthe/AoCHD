<?php /* Smarty version Smarty-3.1.13, created on 2013-08-19 16:16:30
         compiled from "/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/iteminsert.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10305557325211c64e8997b2-20299977%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '24f4189f524f989915a8541b75c485b3afddc21d' => 
    array (
      0 => '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/iteminsert.tpl',
      1 => 1376892576,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10305557325211c64e8997b2-20299977',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'result' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5211c64e8f72f8_04070064',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5211c64e8f72f8_04070064')) {function content_5211c64e8f72f8_04070064($_smarty_tpl) {?><div class="result-container">
    <h1>挿入に成功しました!</h1><br />
    <p><?php echo $_smarty_tpl->tpl_vars['result']->value;?>
 件 データを挿入しました</p><br />
    <a href="itemlist">アイテムリストに戻る</a>
</div>
<?php }} ?>