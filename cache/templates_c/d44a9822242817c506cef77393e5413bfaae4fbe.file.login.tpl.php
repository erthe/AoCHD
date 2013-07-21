<?php /* Smarty version Smarty-3.1.13, created on 2013-07-22 00:24:32
         compiled from "/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/user/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:75999405351ebfd30834528-04166335%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd44a9822242817c506cef77393e5413bfaae4fbe' => 
    array (
      0 => '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/user/login.tpl',
      1 => 1374221653,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '75999405351ebfd30834528-04166335',
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
  'unifunc' => 'content_51ebfd30860570_31698538',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51ebfd30860570_31698538')) {function content_51ebfd30860570_31698538($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<form id="login" method="post" action="auth">

    <fieldset>
        <h1 class="shadow">User Login Form</h1>
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