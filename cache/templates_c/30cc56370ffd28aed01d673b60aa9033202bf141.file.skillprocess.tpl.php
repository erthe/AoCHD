<?php /* Smarty version Smarty-3.1.13, created on 2013-08-19 13:20:41
         compiled from "/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/skillprocess.tpl" */ ?>
<?php /*%%SmartyHeaderCode:98436316852119d19679661-13169193%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '30cc56370ffd28aed01d673b60aa9033202bf141' => 
    array (
      0 => '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/skillprocess.tpl',
      1 => 1376750739,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '98436316852119d19679661-13169193',
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
  'unifunc' => 'content_52119d19759b26_42814360',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52119d19759b26_42814360')) {function content_52119d19759b26_42814360($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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