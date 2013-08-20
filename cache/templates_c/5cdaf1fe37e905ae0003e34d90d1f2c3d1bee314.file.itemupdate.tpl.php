<?php /* Smarty version Smarty-3.1.13, created on 2013-08-19 16:49:55
         compiled from "/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/itemupdate.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20756718095211ce23122b58-94943424%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5cdaf1fe37e905ae0003e34d90d1f2c3d1bee314' => 
    array (
      0 => '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/itemupdate.tpl',
      1 => 1376892843,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20756718095211ce23122b58-94943424',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'result' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5211ce23143886_87891312',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5211ce23143886_87891312')) {function content_5211ce23143886_87891312($_smarty_tpl) {?><div class="result-container">
    <h1>更新に成功しました!</h1><br />
    <p><?php echo $_smarty_tpl->tpl_vars['result']->value;?>
 件 データ更新しました</p><br />
    <a href="itemlist">アイテムリストに戻る</a>
</div>
<?php }} ?>