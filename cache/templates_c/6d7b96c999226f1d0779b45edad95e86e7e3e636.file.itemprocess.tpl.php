<?php /* Smarty version Smarty-3.1.13, created on 2013-08-19 19:17:11
         compiled from "/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/itemprocess.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1469640515211f0a7478da4-93340393%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6d7b96c999226f1d0779b45edad95e86e7e3e636' => 
    array (
      0 => '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/itemprocess.tpl',
      1 => 1376892793,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1469640515211f0a7478da4-93340393',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'header' => 0,
    'status' => 0,
    'menu' => 0,
    'row' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5211f0a752e195_62642765',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5211f0a752e195_62642765')) {function content_5211f0a752e195_62642765($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['status']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['menu']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="wrapper">
	<div class="title">
		<h1>ファイルのアップロードに成功しました</h1>
  	</div>
	<div>
		<?php echo $_smarty_tpl->tpl_vars['row']->value;?>
 件更新しました。<br />
		<a href="itemlist">戻る</a>
	</div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>