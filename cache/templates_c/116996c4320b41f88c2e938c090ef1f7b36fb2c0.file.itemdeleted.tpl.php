<?php /* Smarty version Smarty-3.1.13, created on 2013-08-19 16:56:35
         compiled from "/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/itemdeleted.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21282238185211cef2a444d2-59372499%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '116996c4320b41f88c2e938c090ef1f7b36fb2c0' => 
    array (
      0 => '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/itemdeleted.tpl',
      1 => 1376898993,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21282238185211cef2a444d2-59372499',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5211cef2b2a499_71775276',
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
<?php if ($_valid && !is_callable('content_5211cef2b2a499_71775276')) {function content_5211cef2b2a499_71775276($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['status']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['menu']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="wrapper">
    <?php if (count($_smarty_tpl->tpl_vars['items']->value)>0){?>

        <table id="tbl" class="table-center">
            <thead>
                <tr>
                    <th class="userid text-center">ID</th>
                    <th class="username text-centering">アイテム名</th>
                    <th class="login text-center">威力</th>
                    <th class="login text-center">命中</th>
                    <th class="login text-center">必殺</th>
                    <th class="login text-center">重さ</th>
                    <th class="login text-center">耐久</th>
                    <th class="login text-center">武器レベル</th>
                    <th class="login text-center">種別</th>
                    <th class="login text-center">価格</th>
                    <th class="login text-center">説明</th>
                    <th class="editable text-center">編集</th>
                    <th class="editable text-center">装備</th>
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
                        <td class="userid text-right"><?php echo $_smarty_tpl->tpl_vars['item']->value['item_id'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['item_name'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['power'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['hit_chance'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['special_chance'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['weight'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['durability'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['weapon_level'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['weapon_type'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['description'];?>
</td>
                        <td class="editable text-center"><a href="/admin/itemedit/id/<?php echo $_smarty_tpl->tpl_vars['item']->value['item_id'];?>
?width=630&height=255&modal=true" class="thickbox"><img src="../themes/images/edit.gif" alt="edit"></a></td>
                        <td class="editable text-center"><img src="../themes/images/show.gif" alt="show"></td>
                        <td id="<?php echo $_smarty_tpl->tpl_vars['item']->value['item_id'];?>
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
        <a href="itemlist">アイテム一覧</a>
    </div>
</div> 

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>