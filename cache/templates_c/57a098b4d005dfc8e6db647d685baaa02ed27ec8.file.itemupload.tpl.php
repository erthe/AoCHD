<?php /* Smarty version Smarty-3.1.13, created on 2013-08-19 19:14:26
         compiled from "/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/itemupload.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17264038665211f002e34fc4-66427570%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '57a098b4d005dfc8e6db647d685baaa02ed27ec8' => 
    array (
      0 => '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/itemupload.tpl',
      1 => 1376892893,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17264038665211f002e34fc4-66427570',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'header' => 0,
    'status' => 0,
    'menu' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5211f003088f66_46617559',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5211f003088f66_46617559')) {function content_5211f003088f66_46617559($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['status']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['menu']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="wrapper">
	<div class="title">
		<h1>アイテムアップロード</h1> 
	</div>
	
	<div class="form-container">
  		<form method="post"  action="itemprocess" enctype="multipart/form-data">
			<div class="form-item">
				<label>ファイル</label>
				<input type="file" name="_file"><br />
                        CSVファイルのネーミングは以下のように指定してください<br />
                        item20130831.csv<br />
                        <span class="text-red">※注意!! CSVアップロードを行うと既存の全てのデータが初期化されます。</span>
			</div>

			<div class="form-controller">
				<input type="submit" name="_submit" value="送信">
			</div>
  		</form>
	</div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>