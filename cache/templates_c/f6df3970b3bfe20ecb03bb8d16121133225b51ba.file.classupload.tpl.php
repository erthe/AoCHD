<?php /* Smarty version Smarty-3.1.13, created on 2013-08-22 18:28:40
         compiled from "/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/classupload.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1386486160520f6fc488fa35-50272051%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f6df3970b3bfe20ecb03bb8d16121133225b51ba' => 
    array (
      0 => '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/classupload.tpl',
      1 => 1377163705,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1386486160520f6fc488fa35-50272051',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_520f6fc495fef4_80049459',
  'variables' => 
  array (
    'header' => 0,
    'status' => 0,
    'menu' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_520f6fc495fef4_80049459')) {function content_520f6fc495fef4_80049459($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['status']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['menu']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="wrapper">
	<div class="title">
		<h1>クラスアップロード</h1> 
	</div>
	
	<div class="form-container">
  		<form method="post"  action="classprocess" enctype="multipart/form-data">
			<div class="form-item">
				<label>ファイル</label>
				<input id="file-input" type="file" name="_file"><br />
                        CSVファイルのネーミングは以下のように指定してください<br />
                        class20130831.csv<br />
                        <span class="text-red">※注意!! CSVアップロードを行うと既存の全てのデータが初期化されます。</span><br />
                        <span class="text-red">※注意!! アップロードを行うと装備クラスリストも初期化されます。事前にアイテム管理からバックアップをするなどしてください。</span>
			</div>

			<div class="form-controller">
				<input id="fileCheck" type="submit" name="_submit" value="送信">
			</div>
  		</form>
	</div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>