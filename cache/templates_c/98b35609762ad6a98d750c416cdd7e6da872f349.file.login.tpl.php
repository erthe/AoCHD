<?php /* Smarty version Smarty-3.1.13, created on 2013-04-27 02:40:49
         compiled from "D:\workspaces\ArenaofGenelogy\application\views\user\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15718517abc212d2178-53855889%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '98b35609762ad6a98d750c416cdd7e6da872f349' => 
    array (
      0 => 'D:\\workspaces\\ArenaofGenelogy\\application\\views\\user\\login.tpl',
      1 => 1366993435,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15718517abc212d2178-53855889',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'header' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_517abc21315c93_25546513',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_517abc21315c93_25546513')) {function content_517abc21315c93_25546513($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<form id="login" method="post" action="auth">

    <fieldset>
        <h1 class="shadow">Admin Login Form</h1>
        <p class="register">
            Not a member?
            <a href="#">Register here!</a>
        </p>
        <div>
            <label for="Login_Username">UserName</label>
            <input id="login_username" class="field required" type="text" title="Please provide your username" name="username">
        </div>
        <div>
            <label for="Login_Password">Password</label>
            <input id="login_password" class="field required" type="password" title="Password is required" name="password">
        </div>
        
        <p class="forgot">
            <a href="#">Forgot your password?</a>
        </p>

        <div class="submit">
            <button type="submit">Log in</button>
            <label>
                <input id="login_remember" type="checkbox" value="yes" name="remember">
                Remember my login on this computer
            </label>
        </div>
        <p class="back">
        <a href="../index/">Go back to the index</a>
        </p>
        
    </fieldset>
</form>

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>