<?php /* Smarty version Smarty-3.1.13, created on 2013-08-19 16:55:28
         compiled from "/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/itemdelete.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1334991075211cf7025f042-52172461%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0e12cc24333374b212fbc19358b43400ddedd2d5' => 
    array (
      0 => '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/itemdelete.tpl',
      1 => 1376890868,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1334991075211cf7025f042-52172461',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'result' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5211cf7028ecb1_41765302',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5211cf7028ecb1_41765302')) {function content_5211cf7028ecb1_41765302($_smarty_tpl) {?><div class="result-container">
    <h1>削除に成功しました!</h1><br />
    <p><?php echo $_smarty_tpl->tpl_vars['result']->value;?>
 件 削除しました</p><br />
    <a href="itemlist">アイテムリストに戻る</a>
</div>
<?php }} ?>