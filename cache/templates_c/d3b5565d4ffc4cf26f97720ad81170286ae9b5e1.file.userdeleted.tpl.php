<?php /* Smarty version Smarty-3.1.13, created on 2013-08-14 13:30:59
         compiled from "/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/userdeleted.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15262346551ec4e046f35d0-42801513%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd3b5565d4ffc4cf26f97720ad81170286ae9b5e1' => 
    array (
      0 => '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/userdeleted.tpl',
      1 => 1376454653,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15262346551ec4e046f35d0-42801513',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51ec4e047e5808_99031993',
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
<?php if ($_valid && !is_callable('content_51ec4e047e5808_99031993')) {function content_51ec4e047e5808_99031993($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/library/smarty/plugins/modifier.truncate.php';
?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['status']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['menu']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="wrapper">
    <?php if (count($_smarty_tpl->tpl_vars['items']->value)>0){?>

        <table id="tbl">
            <thead>
                <tr>
                    <th class="userid text-center">ID</th>
                    <th class="username text-centering">ユーザー名</th>
                    <th class="email text-center">Email</th>
                    <th class="login text-center">login</th>
                    <th class="status text-center">状態</th>
                    <th class="memo text-center">メモ</th>
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
                        <td class="userid text-right"><?php echo $_smarty_tpl->tpl_vars['item']->value['user_id'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['user_name'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['email'];?>
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
                        <td><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['item']->value['memo'],16);?>
</td>
                        <td class="text-right"><?php echo $_smarty_tpl->tpl_vars['item']->value['created_on'];?>
</td>
                        <td class="text-right"><?php echo $_smarty_tpl->tpl_vars['item']->value['updated_on'];?>
</td>
                        <td class="editable text-center"><a href="/admin/useredit/id/<?php echo $_smarty_tpl->tpl_vars['item']->value['user_id'];?>
?width=500&height=255&modal=true" class="thickbox"><img src="../themes/images/edit.gif" alt="edit"></a></td>
                        <td class="editable text-center"><img src="../themes/images/show.gif" alt="show"></td>
                        <td id="<?php echo $_smarty_tpl->tpl_vars['item']->value['user_id'];?>
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
        <a href="userlist">ユーザー一覧</a>
    </div>
</div> 

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>