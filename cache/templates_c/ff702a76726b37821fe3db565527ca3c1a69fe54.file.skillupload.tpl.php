<?php /* Smarty version Smarty-3.1.13, created on 2013-08-19 13:20:00
         compiled from "/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/skillupload.tpl" */ ?>
<?php /*%%SmartyHeaderCode:85629467252119ca3de9261-71383598%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ff702a76726b37821fe3db565527ca3c1a69fe54' => 
    array (
      0 => '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/skillupload.tpl',
      1 => 1376885933,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '85629467252119ca3de9261-71383598',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_52119ca3e746b3_59233121',
  'variables' => 
  array (
    'header' => 0,
    'status' => 0,
    'menu' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52119ca3e746b3_59233121')) {function content_52119ca3e746b3_59233121($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['status']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['menu']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="wrapper">
	<div class="title">
		<h1>スキルアップロード</h1> 
	</div>
	
	<div class="form-container">
  		<form method="post"  action="skillprocess" enctype="multipart/form-data">
			<div class="form-item">
				<label>ファイル</label>
				<input type="file" name="_file"><br />
                        CSVファイルのネーミングは以下のように指定してください<br />
                        skill20130831.csv<br />
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