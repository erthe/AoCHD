<?php /* Smarty version Smarty-3.1.13, created on 2013-08-18 03:42:05
         compiled from "/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/userlist.tpl" */ ?>
<?php /*%%SmartyHeaderCode:187084377051eb745554c7b9-01897001%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a5c888975c825c95adb094a5fafc36386bb80188' => 
    array (
      0 => '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/userlist.tpl',
      1 => 1376764923,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '187084377051eb745554c7b9-01897001',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51eb7455586d19_82749488',
  'variables' => 
  array (
    'header' => 0,
    'status' => 0,
    'menu' => 0,
    'usersearch' => 0,
    'items' => 0,
    'no' => 0,
    'item' => 0,
    'pages' => 0,
    'p' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51eb7455586d19_82749488')) {function content_51eb7455586d19_82749488($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/library/smarty/plugins/modifier.truncate.php';
?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['status']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['menu']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="wrapper">
	<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['usersearch']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <?php if (count($_smarty_tpl->tpl_vars['items']->value)>0){?>

        <table id="tbl" class="table-center">
            <thead>
                <tr>
                    <th class="userid text-center">ID</th>
                    <th class="username text-centering">ユーザー名</th>
                    <th class="email text-center">Email</th>
                    <th class="login text-center">login</th>
                    <th class="status text-center">状態</th>
                    <th class="memo text-center">メモ</th>
                    <th class="datetime text-center">作成日</th>
                    <th class="datetime text-center">変更日</th>
                    <th class="editable text-center">編集</th>
                    <th class="editable text-center">閲覧</th>
                    <th class="editable text-center">削除</th>
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
                        <td><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['item']->value['user_name'],12);?>
</td>
                        <td><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['item']->value['email'],30);?>
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
                        <td><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['item']->value['memo'],14);?>
</td>
                        <td class="text-right"><?php echo $_smarty_tpl->tpl_vars['item']->value['created_on'];?>
</td>
                        <td class="text-right"><?php echo $_smarty_tpl->tpl_vars['item']->value['updated_on'];?>
</td>
                        <td class="editable text-center"><a href="/admin/useredit/id/<?php echo $_smarty_tpl->tpl_vars['item']->value['user_id'];?>
?width=500&height=255&modal=true" class="thickbox"><img src="../themes/images/edit.gif" alt="edit"></a></td>
                        <td class="editable text-center"><img src="../themes/images/show.gif" alt="show"></td>
                        <td id="<?php echo $_smarty_tpl->tpl_vars['item']->value['user_id'];?>
" class="editable text-center"><span class="delete"><img src="../themes/images/delete.gif" alt="delete"></span></td>
                    </tr>
                    <?php $_smarty_tpl->tpl_vars['no'] = new Smarty_variable($_smarty_tpl->tpl_vars['no']->value+1, null, 0);?>
                <?php } ?>
            </tbody>
        </table>

        
        <table class="table-center">
        <tr>
            <td>
                <?php echo $_smarty_tpl->tpl_vars['pages']->value['firstItemNumber'];?>
 to <?php echo $_smarty_tpl->tpl_vars['pages']->value['lastItemNumber'];?>
 of <?php echo $_smarty_tpl->tpl_vars['pages']->value['totalItemCount'];?>
 |

                <?php if ($_smarty_tpl->tpl_vars['pages']->value['current']!=$_smarty_tpl->tpl_vars['pages']->value['first']){?>
                    <a href="userlist?page=<?php echo $_smarty_tpl->tpl_vars['pages']->value['first'];?>
"> &lt;&lt; </a>
                <?php }?>

                <?php if (isset($_smarty_tpl->tpl_vars['pages']->value['previous'])){?>
                    <a href="userlist?page=<?php echo $_smarty_tpl->tpl_vars['pages']->value['previous'];?>
">  &lt; </a>
                <?php }?>

                <?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pages']->value['pagesInRange']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value){
$_smarty_tpl->tpl_vars['p']->_loop = true;
?>

                    <?php if ($_smarty_tpl->tpl_vars['pages']->value['current']==$_smarty_tpl->tpl_vars['p']->value){?>
                        <?php echo $_smarty_tpl->tpl_vars['p']->value;?>

                    <?php }else{ ?>
                        <a href="userlist?page=<?php echo $_smarty_tpl->tpl_vars['p']->value;?>
">  <?php echo $_smarty_tpl->tpl_vars['p']->value;?>
 </a>
                    <?php }?>
                <?php } ?>

                <?php if (isset($_smarty_tpl->tpl_vars['pages']->value['next'])){?>
                    <a href="userlist?page=<?php echo $_smarty_tpl->tpl_vars['pages']->value['next'];?>
"> &gt; </a>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['pages']->value['current']!=$_smarty_tpl->tpl_vars['pages']->value['last']){?>
                    <a href="userlist?page=<?php echo $_smarty_tpl->tpl_vars['pages']->value['last'];?>
"> &gt;&gt; </a>
                <?php }?>
            </td>
        </tr>
    </table>

    

    <?php }else{ ?>
        there is no-data.
    <?php }?>
    
    <div class="option">
        <a href="usercreate?width=500&height=255&modal=true" class="thickbox">ユーザー新規登録</a>
        <a href="userdeleted">削除済みユーザー</a>
    </div>
</div> 

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>