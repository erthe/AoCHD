<?php /* Smarty version Smarty-3.1.13, created on 2013-08-19 13:31:07
         compiled from "/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/skilllist.tpl" */ ?>
<?php /*%%SmartyHeaderCode:81824255752118f399837d3-17259691%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c1bd2fbd930e528bbfe33f84949a35866434a6ff' => 
    array (
      0 => '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/skilllist.tpl',
      1 => 1376886666,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '81824255752118f399837d3-17259691',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_52118f39b4c818_63295801',
  'variables' => 
  array (
    'header' => 0,
    'status' => 0,
    'menu' => 0,
    'items' => 0,
    'no' => 0,
    'item' => 0,
    'pages' => 0,
    'p' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52118f39b4c818_63295801')) {function content_52118f39b4c818_63295801($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['status']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['menu']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="wrapper">
    <?php if (count($_smarty_tpl->tpl_vars['items']->value)>0){?>
        
        <table id="tbl" class="table-center">
            <thead>
                <tr>
                    <th class="userid text-center">ID</th>
                    <th class="username text-centering">スキル名</th>
                    <th class="text-center">説明</th>
                    <th class="editable text-center">編集</th>
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
                        <td class="userid text-right"><?php echo $_smarty_tpl->tpl_vars['item']->value['skill_id'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['skill_name'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['item']->value['description'];?>
</td>
                        <td class="editable text-center"><a href="/admin/skilledit/id/<?php echo $_smarty_tpl->tpl_vars['item']->value['skill_id'];?>
?width=500&height=255&modal=true" class="thickbox"><img src="../themes/images/edit.gif" alt="edit"></a></td>
                        <td id="<?php echo $_smarty_tpl->tpl_vars['item']->value['skill_id'];?>
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
                    <a href="skilllist?page=<?php echo $_smarty_tpl->tpl_vars['pages']->value['first'];?>
"> &lt;&lt; </a>
                <?php }?>

                <?php if (isset($_smarty_tpl->tpl_vars['pages']->value['previous'])){?>
                    <a href="skilllist?page=<?php echo $_smarty_tpl->tpl_vars['pages']->value['previous'];?>
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
                        <a href="skilllist?page=<?php echo $_smarty_tpl->tpl_vars['p']->value;?>
">  <?php echo $_smarty_tpl->tpl_vars['p']->value;?>
 </a>
                    <?php }?>
                <?php } ?>

                <?php if (isset($_smarty_tpl->tpl_vars['pages']->value['next'])){?>
                    <a href="skilllist?page=<?php echo $_smarty_tpl->tpl_vars['pages']->value['next'];?>
"> &gt; </a>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['pages']->value['current']!=$_smarty_tpl->tpl_vars['pages']->value['last']){?>
                    <a href="skilllist?page=<?php echo $_smarty_tpl->tpl_vars['pages']->value['last'];?>
"> &gt;&gt; </a>
                <?php }?>
            </td>
        </tr>
    </table>

    

    <?php }else{ ?>
        there is no-data.
    <?php }?>
    
    <div class="option">
        <a href="skillcreate?width=500&height=255&modal=true" class="thickbox">スキル新規登録</a>
        <a href="skilldeleted">削除済みスキル</a>
        <a href="skillupload">CSVアップロード</a>
        <a href="skilldownload">CSVダウンロード</a>
    </div>
</div> 

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>