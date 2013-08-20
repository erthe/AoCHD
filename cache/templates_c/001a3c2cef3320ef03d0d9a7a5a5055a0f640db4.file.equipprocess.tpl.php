<?php /* Smarty version Smarty-3.1.13, created on 2013-08-20 17:15:05
         compiled from "/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/equipprocess.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15389853752132589b733f4-44600665%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '001a3c2cef3320ef03d0d9a7a5a5055a0f640db4' => 
    array (
      0 => '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/equipprocess.tpl',
      1 => 1376892793,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15389853752132589b733f4-44600665',
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
  'unifunc' => 'content_52132589bd71a1_05108854',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52132589bd71a1_05108854')) {function content_52132589bd71a1_05108854($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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