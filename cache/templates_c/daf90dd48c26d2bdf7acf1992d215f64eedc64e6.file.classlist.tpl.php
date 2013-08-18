<?php /* Smarty version Smarty-3.1.13, created on 2013-08-19 00:23:50
         compiled from "/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/classlist.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1560685216520c8a9f1ec1e0-05198757%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'daf90dd48c26d2bdf7acf1992d215f64eedc64e6' => 
    array (
      0 => '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/classlist.tpl',
      1 => 1376835488,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1560685216520c8a9f1ec1e0-05198757',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_520c8a9f38a4d5_93653330',
  'variables' => 
  array (
    'header' => 0,
    'status' => 0,
    'menu' => 0,
    'classsearchsort' => 0,
    'items' => 0,
    'no' => 0,
    'item' => 0,
    'pages' => 0,
    'p' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_520c8a9f38a4d5_93653330')) {function content_520c8a9f38a4d5_93653330($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['status']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['menu']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="wrapper">
	<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['classsearchsort']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
                    <th class="editable2 text-center">削除</th>
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
" class="editable2 text-center"><span class="delete"><img src="../themes/images/delete.gif" alt="delete"></span></td>
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
                    <a href="adminlist?page=<?php echo $_smarty_tpl->tpl_vars['pages']->value['first'];?>
"> &lt;&lt; </a>
                <?php }?>

                <?php if (isset($_smarty_tpl->tpl_vars['pages']->value['previous'])){?>
                    <a href="adminlist?page=<?php echo $_smarty_tpl->tpl_vars['pages']->value['previous'];?>
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
                        <a href="classlist?page=<?php echo $_smarty_tpl->tpl_vars['p']->value;?>
">  <?php echo $_smarty_tpl->tpl_vars['p']->value;?>
 </a>
                    <?php }?>
                <?php } ?>

                <?php if (isset($_smarty_tpl->tpl_vars['pages']->value['next'])){?>
                    <a href="classlist?page=<?php echo $_smarty_tpl->tpl_vars['pages']->value['next'];?>
"> &gt; </a>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['pages']->value['current']!=$_smarty_tpl->tpl_vars['pages']->value['last']){?>
                    <a href="classlist?page=<?php echo $_smarty_tpl->tpl_vars['pages']->value['last'];?>
"> &gt;&gt; </a>
                <?php }?>
            </td>
        </tr>
    </table>

    

    <?php }else{ ?>
        there is no-data.
    <?php }?>
    
    <div class="option">
        <a href="classcreate?width=400&height=280&modal=true" class="thickbox">クラス新規登録</a>
        <a href="classdeleted">削除済みクラス</a>
        <a href="classupload">CSVアップロード</a>
        <a href="classdownload">CSVダウンロード</a>
    </div>
</div> 

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>