<?php /* Smarty version Smarty-3.1.13, created on 2013-08-20 13:43:44
         compiled from "/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/equipclasserror.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12749372455212f400cb0a81-05513592%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0ecb304883e10316049f819ca151fc6866ca5065' => 
    array (
      0 => '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/equipclasserror.tpl',
      1 => 1376973100,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12749372455212f400cb0a81-05513592',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5212f400d2a592_33222139',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5212f400d2a592_33222139')) {function content_5212f400d2a592_33222139($_smarty_tpl) {?><div class="result-container">
    <h1 class="text-red">確認エラー</h1><br />
    <p>classテーブルのクラス数とequip_classテーブルのクラス数が一致しません</p><br />
    <a href="#"; onclick="tb_remove();">一覧リストに戻る</a>
</div>
<?php }} ?>