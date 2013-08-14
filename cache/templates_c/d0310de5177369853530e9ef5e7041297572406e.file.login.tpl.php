<?php /* Smarty version Smarty-3.1.13, created on 2013-08-14 11:43:22
         compiled from "/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:126626260351ebfd70527095-49350677%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd0310de5177369853530e9ef5e7041297572406e' => 
    array (
      0 => '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/login.tpl',
      1 => 1376448200,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '126626260351ebfd70527095-49350677',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51ebfd7055c8f0_86264157',
  'variables' => 
  array (
    'header' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51ebfd7055c8f0_86264157')) {function content_51ebfd7055c8f0_86264157($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<form id="login" method="post" action="auth">

    <fieldset>
        <h1 class="shadow">Adminログインフォーム</h1>

        <div>
            <label for="Login_Username">Adminネーム</label>
            <input id="login_username" class="field required" type="text" title="Please provide your username" name="username">
        </div>
        <div>
            <label for="Login_Password">パスワード</label>
            <input id="login_password" class="field required" type="password" title="Password is required" name="password">
        </div>
        
        <p class="forgot">
            <a href="#">パスワードを忘れましたか?</a>
        </p>

        <div class="submit">
            <button type="submit">ログイン</button>
            <label>
                <input id="login_remember" type="checkbox" value="yes" name="remember">
                このコンピュータにログイン情報を記憶させる
            </label>
        </div>
        <p class="back">
        <a href="../index/">インデックスに戻るx</a>
        </p>
        
    </fieldset>
</form>

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>



<?php }} ?>