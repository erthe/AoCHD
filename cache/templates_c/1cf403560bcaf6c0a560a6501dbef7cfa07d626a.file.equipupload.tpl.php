<?php /* Smarty version Smarty-3.1.13, created on 2013-08-22 20:08:31
         compiled from "/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/equipupload.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1772011271521325243b1696-44840528%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1cf403560bcaf6c0a560a6501dbef7cfa07d626a' => 
    array (
      0 => '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/equipupload.tpl',
      1 => 1377163699,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1772011271521325243b1696-44840528',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5213252444a798_15016636',
  'variables' => 
  array (
    'header' => 0,
    'status' => 0,
    'menu' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5213252444a798_15016636')) {function content_5213252444a798_15016636($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['status']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['menu']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="wrapper">
	<div class="title">
		<h1>装備クラスアップロード</h1> 
	</div>
	
	<div class="form-container">
  		<form method="post"  action="equipprocess" enctype="multipart/form-data">
			<div class="form-item">
				<label>ファイル</label>
				<input id="file-input" type="file" name="_file"><br />
                        CSVファイルのネーミングは以下のように指定してください<br />
                        equip20130831.csv<br />
                        <span class="text-red">※注意!! CSVアップロードを行うと既存の全てのデータが初期化されます。</span>
			</div>

			<div class="form-controller">
				<input id="fileCheck" type="submit" name="_submit" value="送信">
			</div>
  		</form>
	</div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>