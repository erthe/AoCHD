<?php /* Smarty version Smarty-3.1.13, created on 2013-08-14 16:16:14
         compiled from "/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/admindeleted.tpl" */ ?>
<?php /*%%SmartyHeaderCode:606321045520b257d6b58b2-47348889%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '71171165bd33a684091933de4f8e78f5060dad4d' => 
    array (
      0 => '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/admindeleted.tpl',
      1 => 1376464572,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '606321045520b257d6b58b2-47348889',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_520b257d76e3e4_62601514',
  'variables' => 
  array (
    'header' => 0,
    'status' => 0,
    'menu' => 0,
    'items' => 0,
    'no' => 0,
    'item' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_520b257d76e3e4_62601514')) {function content_520b257d76e3e4_62601514($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['status']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['menu']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="wrapper">
    <?php if (count($_smarty_tpl->tpl_vars['items']->value)>0){?>

        <table id="tbl" class="table-center">
            <thead>
                <tr>
                    <th class="userid text-center">ID</th>
                    <th class="username text-centering">管理者名</th>
                    <th class="login text-center">login</th>
                    <th class="status text-center">状態</th>
                    <th class="datetime text-center">作成日</th>
                    <th class="datetime text-center">更新日</th>
                    <th class="editable text-center">編集</th>
                    <th class="editable text-center">閲覧</th>
                    <th class="editable text-center">戻す</th>
                </tr>
            </thead>
            
            <tbody>
                <?php $_smarty_tpl->tpl_vars['no'] = new Smarty_variable(1, null, 0);?>
                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                    <tr id="trno_<?php echo $_smarty_tpl->tpl_vars['no']->value;?>
" class="list">
                        <td class="userid text-right"><?php echo $_smarty_tpl->tpl_vars['item']->value['admin_id'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['admin_name'];?>
</td>
                        <td class="text-center">
                            <?php if ($_smarty_tpl->tpl_vars['item']->value['login_status']==1){?>
                                <img src="../themes/images/login.gif" alt="login">
                            <?php }else{ ?>
                                <img src="../themes/images/logoff.gif" alt="logoff">
                            <?php }?>
                        </td>
                        <td>
                            <?php if ($_smarty_tpl->tpl_vars['item']->value['status']==1){?>
                                登録
                            <?php }else{ ?>
                                退会
                            <?php }?>
                        </td>
                        <td class="text-right"><?php echo $_smarty_tpl->tpl_vars['item']->value['created_on'];?>
</td>
                        <td class="text-right"><?php echo $_smarty_tpl->tpl_vars['item']->value['updated_on'];?>
</td>
                        <td class="editable text-center"><a href="/admin/adminedit/id/<?php echo $_smarty_tpl->tpl_vars['item']->value['admin_id'];?>
?width=500&height=255&modal=true" class="thickbox"><img src="../themes/images/edit.gif" alt="edit"></a></td>
                        <td class="editable text-center"><img src="../themes/images/show.gif" alt="show"></td>
                        <td id="<?php echo $_smarty_tpl->tpl_vars['item']->value['admin_id'];?>
" class="editable text-center"><span class="revert"><img src="../themes/images/revert.gif" alt="revert"></span></td>
                    </tr>
                    <?php $_smarty_tpl->tpl_vars['no'] = new Smarty_variable($_smarty_tpl->tpl_vars['no']->value+1, null, 0);?>
                <?php } ?>
            </tbody>
        </table>

    <?php }else{ ?>
        there is no-data.
    <?php }?>
    
    <div class="option">
        <a href="adminlist">管理者一覧</a>
    </div>
</div> 

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>