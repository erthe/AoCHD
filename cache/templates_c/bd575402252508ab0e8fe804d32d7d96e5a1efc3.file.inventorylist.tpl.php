<?php /* Smarty version Smarty-3.1.13, created on 2013-08-24 02:32:56
         compiled from "/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/inventorylist.tpl" */ ?>
<?php /*%%SmartyHeaderCode:62743870852178a2b2150c7-71950883%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bd575402252508ab0e8fe804d32d7d96e5a1efc3' => 
    array (
      0 => '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/inventorylist.tpl',
      1 => 1377279175,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '62743870852178a2b2150c7-71950883',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_52178a2b564e48_03304598',
  'variables' => 
  array (
    'header' => 0,
    'status' => 0,
    'menu' => 0,
    'inventorysearch' => 0,
    'items' => 0,
    'no' => 0,
    'item' => 0,
    'pages' => 0,
    'p' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52178a2b564e48_03304598')) {function content_52178a2b564e48_03304598($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['status']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['menu']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['inventorysearch']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="wrapper">
    <?php if (count($_smarty_tpl->tpl_vars['items']->value)>0){?>
        
        <table id="tbl" class="table-center">
            <thead>
                <tr>
                    <th class="userid text-center">ID</th>
                    <th class="itemname text-centering">アイテム名</th>
                    <th class="login text-center">威力</th>
                    <th class="login text-center">命中</th>
                    <th class="login text-center">必殺</th>
                    <th class="login text-center">重さ</th>
                    <th class="login text-center">耐久</th>
                    <th class="weapon-level text-center">武器レベル</th>
                    <th class="login text-center">種別</th>
                    <th class="money text-center">価格</th>
                    <th class="text-center">所有者ID</th>
                    <th class="text-center">所有者名</th>
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
                        <td class="text-right"><?php echo $_smarty_tpl->tpl_vars['item']->value['power'];?>
</td>
                        <td class="text-right"><?php echo $_smarty_tpl->tpl_vars['item']->value['hit_chance'];?>
</td>
                        <td class="text-right"><?php echo $_smarty_tpl->tpl_vars['item']->value['special_chance'];?>
</td>
                        <td class="text-right"><?php echo $_smarty_tpl->tpl_vars['item']->value['weight'];?>
</td>
                        <td class=text-right>
                        	<?php if ($_smarty_tpl->tpl_vars['item']->value['durability']==null){?>
                                -
                            <?php }else{ ?>
                                <?php echo $_smarty_tpl->tpl_vars['item']->value['current_durability'];?>
/<?php echo $_smarty_tpl->tpl_vars['item']->value['durability'];?>

                            <?php }?>
                        </td>
                        <td class="text-right"><?php echo $_smarty_tpl->tpl_vars['item']->value['weapon_level'];?>
</td>
                        <td>
                        	<?php if ($_smarty_tpl->tpl_vars['item']->value['weapon_type']==1){?>
                        		剣
                        	<?php }elseif($_smarty_tpl->tpl_vars['item']->value['weapon_type']==2){?>
                        		槍
                        	<?php }elseif($_smarty_tpl->tpl_vars['item']->value['weapon_type']==3){?>
                        		斧
                        	<?php }elseif($_smarty_tpl->tpl_vars['item']->value['weapon_type']==4){?>
                        		弓
                        	<?php }elseif($_smarty_tpl->tpl_vars['item']->value['weapon_type']==5){?>
                        		炎
                        	<?php }elseif($_smarty_tpl->tpl_vars['item']->value['weapon_type']==6){?>
                        		雷
                        	<?php }elseif($_smarty_tpl->tpl_vars['item']->value['weapon_type']==7){?>
                        		風
                        	<?php }elseif($_smarty_tpl->tpl_vars['item']->value['weapon_type']==8){?>
                        		闇
                        	<?php }elseif($_smarty_tpl->tpl_vars['item']->value['weapon_type']==9){?>
                        		光
                        	<?php }else{ ?>
                        		無
                        	<?php }?>
                        	</td>
                        <td class="text-right">
                        	<?php if ($_smarty_tpl->tpl_vars['item']->value['price']==null){?>
                                -
                            <?php }else{ ?>
                                <?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>

                            <?php }?>
                        </td>
                        <td class="text-right"><?php echo $_smarty_tpl->tpl_vars['item']->value['user_data_id'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['user_name'];?>
</td>
                        <td class="editable text-center"><a href="/admin/itemedit/id/<?php echo $_smarty_tpl->tpl_vars['item']->value['item_id'];?>
?width=630&height=255&modal=true" class="thickbox"><img src="../themes/images/edit.gif" alt="edit"></a></td>
                        <td class="editable text-center"><a href="/admin/equipclass/id/<?php echo $_smarty_tpl->tpl_vars['item']->value['item_id'];?>
?width=750&height=400&modal=true" class="thickbox"><img src="../themes/images/show.gif" alt="show"></a></td>
                        <td id="<?php echo $_smarty_tpl->tpl_vars['item']->value['item_id'];?>
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
                    <a href="itemlist?page=<?php echo $_smarty_tpl->tpl_vars['pages']->value['first'];?>
"> &lt;&lt; </a>
                <?php }?>

                <?php if (isset($_smarty_tpl->tpl_vars['pages']->value['previous'])){?>
                    <a href="itemlist?page=<?php echo $_smarty_tpl->tpl_vars['pages']->value['previous'];?>
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
                        <a href="itemlist?page=<?php echo $_smarty_tpl->tpl_vars['p']->value;?>
">  <?php echo $_smarty_tpl->tpl_vars['p']->value;?>
 </a>
                    <?php }?>
                <?php } ?>

                <?php if (isset($_smarty_tpl->tpl_vars['pages']->value['next'])){?>
                    <a href="itemlist?page=<?php echo $_smarty_tpl->tpl_vars['pages']->value['next'];?>
"> &gt; </a>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['pages']->value['current']!=$_smarty_tpl->tpl_vars['pages']->value['last']){?>
                    <a href="itemlist?page=<?php echo $_smarty_tpl->tpl_vars['pages']->value['last'];?>
"> &gt;&gt; </a>
                <?php }?>
            </td>
        </tr>
    </table>

    

    <?php }else{ ?>
        there is no-data.
    <?php }?>
    
    <div class="option">
        <a href="itemcreate?width=630&height=255&modal=true" class="thickbox">アイテム新規登録</a>
        <a href="itemdeleted">削除済みアイテム</a>
        <a href="itemupload">CSVアップロード</a>
        <a href="itemdownload">CSVダウンロード</a><br />
        <a href="equipupload">装備リストアップロード</a>
        <a href="equipdownload">装備リストダウンロード</a>
    </div>
</div> 

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>