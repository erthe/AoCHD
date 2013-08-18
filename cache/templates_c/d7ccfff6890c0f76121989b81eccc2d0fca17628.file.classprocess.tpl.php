<?php /* Smarty version Smarty-3.1.13, created on 2013-08-18 00:11:56
         compiled from "/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/classprocess.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1090841623520f6fb42c8903-61796630%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd7ccfff6890c0f76121989b81eccc2d0fca17628' => 
    array (
      0 => '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/classprocess.tpl',
      1 => 1376750739,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1090841623520f6fb42c8903-61796630',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_520f6fb443f246_73386005',
  'variables' => 
  array (
    'header' => 0,
    'status' => 0,
    'menu' => 0,
    'row' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_520f6fb443f246_73386005')) {function content_520f6fb443f246_73386005($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['status']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['menu']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="wrapper">
	<div class="title">
		<h1>ファイルのアップロードに成功しました</h1>
  	</div>
	<div>
		<?php echo $_smarty_tpl->tpl_vars['row']->value;?>
 件更新しました。<br />
		<a href="classlist">戻る</a>
	</div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>