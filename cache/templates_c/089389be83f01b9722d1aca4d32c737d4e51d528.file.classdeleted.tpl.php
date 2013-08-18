<?php /* Smarty version Smarty-3.1.13, created on 2013-08-18 01:06:00
         compiled from "/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/classdeleted.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1244049442520de185d14531-13147778%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '089389be83f01b9722d1aca4d32c737d4e51d528' => 
    array (
      0 => '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/classdeleted.tpl',
      1 => 1376755558,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1244049442520de185d14531-13147778',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_520de185f14187_39784671',
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
<?php if ($_valid && !is_callable('content_520de185f14187_39784671')) {function content_520de185f14187_39784671($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['status']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['menu']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="wrapper">
    <?php if (count($_smarty_tpl->tpl_vars['items']->value)>0){?>

        <table id="tbl" class="table-center">
            <thead>
                <tr>
                    <th class="rank text-center">ID</th>
                    <th class="rank text-center">ランク</th>
                    <th class="classname text-center">クラス名</th>
                    <th class="ability text-center">HP</th>
                    <th class="ability text-center">STR</th>
                    <th class="ability text-center">MAG</th>
                    <th class="ability text-center">SKL</th>
                    <th class="ability text-center">SPD</th>
                    <th class="ability text-center">LUK</th>
                    <th class="ability text-center">DEF</th>
                    <th class="ability text-center">MDF</th>
                    <th class="ability text-center">BOD</th>
                    <th class="grow text-center">HP率</th>
                    <th class="grow text-center">STR率</th>
                    <th class="grow text-center">MAG率</th>
                    <th class="grow text-center">SKL率</th>
                    <th class="grow text-center">SPD率</th>
                    <th class="grow text-center">LUK率</th>
                    <th class="grow text-center">DEF率</th>
                    <th class="grow text-center">MDF率</th>
                    <th class="grow text-center">BOD率</th>
                    <th class="text-center">スキル</th>
                    <th class="text-center">選択</th>
                    <th class="editable2 text-center">編集</th>
                    <th class="editable2 text-center">復元</th>
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
                        <td class="text-right matrix"><?php echo $_smarty_tpl->tpl_vars['item']->value['class_id'];?>
</td>
                        <td class="text-right"><?php echo $_smarty_tpl->tpl_vars['item']->value['class_rank'];?>
</td>
						<td class="matrix"><?php echo $_smarty_tpl->tpl_vars['item']->value['class_name'];?>
</td>
						<td class="text-right matrix"><?php echo $_smarty_tpl->tpl_vars['item']->value['hp_val'];?>
</td>
						<td class="text-right matrix"><?php echo $_smarty_tpl->tpl_vars['item']->value['str_val'];?>
</td>
						<td class="text-right matrix"><?php echo $_smarty_tpl->tpl_vars['item']->value['mag_val'];?>
</td>
						<td class="text-right matrix"><?php echo $_smarty_tpl->tpl_vars['item']->value['skl_val'];?>
</td>
						<td class="text-right matrix"><?php echo $_smarty_tpl->tpl_vars['item']->value['spd_val'];?>
</td>
						<td class="text-right matrix"><?php echo $_smarty_tpl->tpl_vars['item']->value['luk_val'];?>
</td>
						<td class="text-right matrix"><?php echo $_smarty_tpl->tpl_vars['item']->value['def_val'];?>
</td>
						<td class="text-right matrix"><?php echo $_smarty_tpl->tpl_vars['item']->value['mdf_val'];?>
</td>
						<td class="text-right matrix"><?php echo $_smarty_tpl->tpl_vars['item']->value['bod_val'];?>
</td>
						<td class="text-right matrix"><?php echo $_smarty_tpl->tpl_vars['item']->value['hp_grow'];?>
%</td>
						<td class="text-right matrix"><?php echo $_smarty_tpl->tpl_vars['item']->value['str_grow'];?>
%</td>
						<td class="text-right matrix"><?php echo $_smarty_tpl->tpl_vars['item']->value['mag_grow'];?>
%</td>
						<td class="text-right matrix"><?php echo $_smarty_tpl->tpl_vars['item']->value['skl_grow'];?>
%</td>
						<td class="text-right matrix"><?php echo $_smarty_tpl->tpl_vars['item']->value['spd_grow'];?>
%</td>
						<td class="text-right matrix"><?php echo $_smarty_tpl->tpl_vars['item']->value['luk_grow'];?>
%</td>
						<td class="text-right matrix"><?php echo $_smarty_tpl->tpl_vars['item']->value['def_grow'];?>
%</td>
						<td class="text-right matrix"><?php echo $_smarty_tpl->tpl_vars['item']->value['mdf_grow'];?>
%</td>
						<td class="text-right matrix"><?php echo $_smarty_tpl->tpl_vars['item']->value['bod_grow'];?>
%</td>
						<td class="matrix">
                            <?php if (isset($_smarty_tpl->tpl_vars['item']->value['own_skl_id'])){?>
                                <span class="text-right"><?php echo $_smarty_tpl->tpl_vars['item']->value['own_skl_id'];?>
</span>
                            <?php }else{ ?>
                                <span class="span-center">-</span>
                            <?php }?>
                        </td>
						<td class="matrix">
                            <?php if ($_smarty_tpl->tpl_vars['item']->value['playable']==0){?>
                                不可
                            <?php }else{ ?>
                                可
                            <?php }?>
                        </td>
                        <td class="editable2 text-center"><a href="/admin/classedit/id/<?php echo $_smarty_tpl->tpl_vars['item']->value['class_id'];?>
?width=400&height=280&modal=true" class="thickbox"><img src="../themes/images/edit.gif" alt="edit"></a></td>
                        <td id="<?php echo $_smarty_tpl->tpl_vars['item']->value['class_id'];?>
" class="editable2 text-center"><span class="revert"><img src="../themes/images/revert.gif" alt="revert"></span></td>
                    </tr>
                    <?php $_smarty_tpl->tpl_vars['no'] = new Smarty_variable($_smarty_tpl->tpl_vars['no']->value+1, null, 0);?>
                <?php } ?>
            </tbody>
        </table>

    <?php }else{ ?>
        there is no-data.
    <?php }?>
    
    <div class="option">
        <a href="classlist">登録済みクラス</a>
    </div>
</div> 

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>