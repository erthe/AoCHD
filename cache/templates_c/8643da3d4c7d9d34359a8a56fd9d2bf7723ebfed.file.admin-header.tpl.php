<?php /* Smarty version Smarty-3.1.13, created on 2013-07-18 07:11:39
         compiled from "/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/themes/layout/admin-header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:139099540051e6d9542a4af1-52264866%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8643da3d4c7d9d34359a8a56fd9d2bf7723ebfed' => 
    array (
      0 => '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/themes/layout/admin-header.tpl',
      1 => 1374098830,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '139099540051e6d9542a4af1-52264866',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51e6d9542ad580_38048239',
  'variables' => 
  array (
    'title' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51e6d9542ad580_38048239')) {function content_51e6d9542ad580_38048239($_smarty_tpl) {?><!DOCTYPE HTML>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="../themes/css/admin.css" media="all" /> 
  <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="../themes/js/admin.js"></script>
</head>

<body>
    <p class="menu">
        <a href="login">ログイン</a>
        <a href="index">インデックス</a>
        <a href="list">リスト</a>
        <a href="logout">ログアウト</a>
    </p>
    <?php }} ?>