<?php /* Smarty version Smarty-3.1.13, created on 2013-08-19 13:03:02
         compiled from "/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/skilldeleted.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1948442445521198aebdee07-98616658%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd84c5dbb6576ee7d9ae3836b8d8d6f6549ce5549' => 
    array (
      0 => '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/skilldeleted.tpl',
      1 => 1376884979,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1948442445521198aebdee07-98616658',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_521198aecd5c83_69320272',
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
<?php if ($_valid && !is_callable('content_521198aecd5c83_69320272')) {function content_521198aecd5c83_69320272($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['status']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['menu']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="wrapper">
    <?php if (count($_smarty_tpl->tpl_vars['items']->value)>0){?>

        <table id="tbl" class="table-center">
            <thead>
                <tr>
                    <th class="userid text-center">ID</th>
                    <th class="username text-centering">スキル名</th>
                    <th class="login text-center">説明</th>
                    <th class="datetime text-center">作成日</th>
                    <th class="datetime text-center">更新日</th>
                    <th class="editable text-center">編集</th>
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
                        <td class="userid text-right"><?php echo $_smarty_tpl->tpl_vars['item']->value['skill_id'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['skill_name'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['description'];?>
</td>
                        <td class="text-right"><?php echo $_smarty_tpl->tpl_vars['item']->value['created_on'];?>
</td>
                        <td class="text-right"><?php echo $_smarty_tpl->tpl_vars['item']->value['updated_on'];?>
</td>
                        <td class="editable text-center"><a href="/admin/skilledit/id/<?php echo $_smarty_tpl->tpl_vars['item']->value['skill_id'];?>
?width=500&height=255&modal=true" class="thickbox"><img src="../themes/images/edit.gif" alt="edit"></a></td>
                        <td id="<?php echo $_smarty_tpl->tpl_vars['item']->value['skill_id'];?>
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
        <a href="skilllist">スキル一覧</a>
    </div>
</div> 

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>