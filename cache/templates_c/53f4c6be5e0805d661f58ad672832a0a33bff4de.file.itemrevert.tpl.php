<?php /* Smarty version Smarty-3.1.13, created on 2013-08-19 17:07:12
         compiled from "/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/itemrevert.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1883186175211d230f1e172-52098550%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '53f4c6be5e0805d661f58ad672832a0a33bff4de' => 
    array (
      0 => '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/itemrevert.tpl',
      1 => 1376892818,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1883186175211d230f1e172-52098550',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'result' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5211d23103f989_39717566',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5211d23103f989_39717566')) {function content_5211d23103f989_39717566($_smarty_tpl) {?><div class="result-container">
    <h1>更新に成功しました!</h1><br />
    <p><?php echo $_smarty_tpl->tpl_vars['result']->value;?>
 件 データを復元しました.</p><br />
    <a href="itemlist">アイテムリストに戻る</a>
</div>
<?php }} ?>