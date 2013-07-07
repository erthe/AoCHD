<?php /* Smarty version Smarty-3.1.13, created on 2013-04-15 21:12:53
         compiled from "D:\workspaces\ArenaofGenelogy\application\views\test\hello.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8652516beec5437e01-08311974%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f4af551057764a7a0088a44a36d4e16727ba3361' => 
    array (
      0 => 'D:\\workspaces\\ArenaofGenelogy\\application\\views\\test\\hello.tpl',
      1 => 1365547170,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8652516beec5437e01-08311974',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_516beec54dfd26_06652241',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_516beec54dfd26_06652241')) {function content_516beec54dfd26_06652241($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\workspaces\\ArenaOfGenelogy\\library\\Smarty\\plugins\\modifier.date_format.php';
?>こんにちは、<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
=サン!!
今日は<?php echo smarty_modifier_date_format(time(),'%Y年%m月%d日');?>
です。<?php }} ?>