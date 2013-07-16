<?php /* Smarty version Smarty-3.1.13, created on 2013-04-27 01:24:01
         compiled from "D:\workspaces\ArenaofGenelogy\application\views\admin\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:68025179da5bd1b7c9-88169916%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e14ff771383473240c32c81b37f43ba1e6158985' => 
    array (
      0 => 'D:\\workspaces\\ArenaofGenelogy\\application\\views\\admin\\login.tpl',
      1 => 1366993435,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '68025179da5bd1b7c9-88169916',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5179da5bd58511_50640619',
  'variables' => 
  array (
    'header' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5179da5bd58511_50640619')) {function content_5179da5bd58511_50640619($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


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