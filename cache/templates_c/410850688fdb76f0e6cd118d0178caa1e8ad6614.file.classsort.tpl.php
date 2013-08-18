<?php /* Smarty version Smarty-3.1.13, created on 2013-08-15 22:25:11
         compiled from "/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/classsort.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1365003641520cb42a0e1261-70934622%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '410850688fdb76f0e6cd118d0178caa1e8ad6614' => 
    array (
      0 => '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/classsort.tpl',
      1 => 1376573110,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1365003641520cb42a0e1261-70934622',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_520cb42a0e9966_74951267',
  'variables' => 
  array (
    'firstkey' => 0,
    'firstkeyorder' => 0,
    'secondkey' => 0,
    'secondkeyorder' => 0,
    'thirdkey' => 0,
    'thirdkeyorder' => 0,
    'fourthkey' => 0,
    'fourthkeyorder' => 0,
    'fifthkey' => 0,
    'fifthkeyorder' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_520cb42a0e9966_74951267')) {function content_520cb42a0e9966_74951267($_smarty_tpl) {?><div class="form-container">

    <form id="edit" method="post" action="classlist">
        <fieldset>
            <table class="table-center">
            
                <tr>
        			<td><label>第一キー</label>
            			<select name="first_key">
                			<option value="class_id" <?php if (($_smarty_tpl->tpl_vars['firstkey']->value==='class_id')){?>selected<?php }?>>ID</option>
							<option value="class_rank" <?php if (($_smarty_tpl->tpl_vars['firstkey']->value==='class_rank')){?>selected<?php }?>>ランク</option>
							<option value="class_name" <?php if (($_smarty_tpl->tpl_vars['firstkey']->value==='class_name')){?>selected<?php }?>>クラス名</option>
							<option value="hp_val" <?php if (($_smarty_tpl->tpl_vars['firstkey']->value==='hp_val')){?>selected<?php }?>>HP</option>
							<option value="str_val" <?php if (($_smarty_tpl->tpl_vars['firstkey']->value==='str_val')){?>selected<?php }?>>STR</option>
							<option value="mag_val" <?php if (($_smarty_tpl->tpl_vars['firstkey']->value==='mag_val')){?>selected<?php }?>>MAG</option>
							<option value="skl_val" <?php if (($_smarty_tpl->tpl_vars['firstkey']->value==='skl_val')){?>selected<?php }?>>SKL</option>
							<option value="spd_val" <?php if (($_smarty_tpl->tpl_vars['firstkey']->value==='spd_val')){?>selected<?php }?>>SPD</option>
							<option value="luk_val" <?php if (($_smarty_tpl->tpl_vars['firstkey']->value==='luk_val')){?>selected<?php }?>>LUK</option>
							<option value="def_val" <?php if (($_smarty_tpl->tpl_vars['firstkey']->value==='def_val')){?>selected<?php }?>>DEF</option>
							<option value="mdf_val" <?php if (($_smarty_tpl->tpl_vars['firstkey']->value==='mdf_val')){?>selected<?php }?>>MDF</option>
							<option value="bod_val" <?php if (($_smarty_tpl->tpl_vars['firstkey']->value==='bod_val')){?>selected<?php }?>>BOD</option>
							<option value="hp_grow" <?php if (($_smarty_tpl->tpl_vars['firstkey']->value==='hp_grow')){?>selected<?php }?>>HP率</option>
							<option value="str_grow" <?php if (($_smarty_tpl->tpl_vars['firstkey']->value==='str_grow')){?>selected<?php }?>>STR率</option>
							<option value="mag_grow" <?php if (($_smarty_tpl->tpl_vars['firstkey']->value==='mag_grow')){?>selected<?php }?>>MAG率</option>
							<option value="skl_grow" <?php if (($_smarty_tpl->tpl_vars['firstkey']->value==='skl_grow')){?>selected<?php }?>>SKL率</option>
							<option value="spd_grow" <?php if (($_smarty_tpl->tpl_vars['firstkey']->value==='spd_grow')){?>selected<?php }?>>SPD率</option>
							<option value="luk_grow" <?php if (($_smarty_tpl->tpl_vars['firstkey']->value==='luk_grow')){?>selected<?php }?>>LUK率</option>
							<option value="def_grow" <?php if (($_smarty_tpl->tpl_vars['firstkey']->value==='def_grow')){?>selected<?php }?>>DEF率</option>
							<option value="mdf_grow" <?php if (($_smarty_tpl->tpl_vars['firstkey']->value==='mdf_grow')){?>selected<?php }?>>MDF率</option>
							<option value="bod_grow" <?php if (($_smarty_tpl->tpl_vars['firstkey']->value==='bod_grow')){?>selected<?php }?>>BOD率</option>
							<option value="own_skl_id" <?php if (($_smarty_tpl->tpl_vars['firstkey']->value==='own_skl_id')){?>selected<?php }?>>スキル	</option>
            			</select>
            		</td>
            		
            		<td><label></label>
            			<select name="first_key_order">
            				<option value="asc" <?php if (($_smarty_tpl->tpl_vars['firstkeyorder']->value==='asc')){?>selected<?php }?>>昇順</option>
            				<option value="desc" <?php if (($_smarty_tpl->tpl_vars['firstkeyorder']->value==='desc')){?>selected<?php }?>>降順</option>
            			</select>
            		</td>
            		
            		<td><label>第ニキー</label>
            			<select name="second_key">
            				<option value="Null">なし</option>
                			<option value="class_id" <?php if (($_smarty_tpl->tpl_vars['secondkey']->value==='class_id')){?>selected<?php }?>>ID</option>
							<option value="class_rank" <?php if (($_smarty_tpl->tpl_vars['secondkey']->value==='class_rank')){?>selected<?php }?>>ランク</option>
							<option value="class_name" <?php if (($_smarty_tpl->tpl_vars['secondkey']->value==='class_name')){?>selected<?php }?>>クラス名</option>
							<option value="hp_val" <?php if (($_smarty_tpl->tpl_vars['secondkey']->value==='hp_val')){?>selected<?php }?>>HP</option>
							<option value="str_val" <?php if (($_smarty_tpl->tpl_vars['secondkey']->value==='str_val')){?>selected<?php }?>>STR</option>
							<option value="mag_val" <?php if (($_smarty_tpl->tpl_vars['secondkey']->value==='mag_val')){?>selected<?php }?>>MAG</option>
							<option value="skl_val" <?php if (($_smarty_tpl->tpl_vars['secondkey']->value==='skl_val')){?>selected<?php }?>>SKL</option>
							<option value="spd_val" <?php if (($_smarty_tpl->tpl_vars['secondkey']->value==='spd_val')){?>selected<?php }?>>SPD</option>
							<option value="luk_val" <?php if (($_smarty_tpl->tpl_vars['secondkey']->value==='luk_val')){?>selected<?php }?>>LUK</option>
							<option value="def_val" <?php if (($_smarty_tpl->tpl_vars['secondkey']->value==='def_val')){?>selected<?php }?>>DEF</option>
							<option value="mdf_val" <?php if (($_smarty_tpl->tpl_vars['secondkey']->value==='mdf_val')){?>selected<?php }?>>MDF</option>
							<option value="bod_val" <?php if (($_smarty_tpl->tpl_vars['secondkey']->value==='bod_val')){?>selected<?php }?>>BOD</option>
							<option value="hp_grow" <?php if (($_smarty_tpl->tpl_vars['secondkey']->value==='hp_grow')){?>selected<?php }?>>HP率</option>
							<option value="str_grow" <?php if (($_smarty_tpl->tpl_vars['secondkey']->value==='str_grow')){?>selected<?php }?>>STR率</option>
							<option value="mag_grow" <?php if (($_smarty_tpl->tpl_vars['secondkey']->value==='mag_grow')){?>selected<?php }?>>MAG率</option>
							<option value="skl_grow" <?php if (($_smarty_tpl->tpl_vars['secondkey']->value==='skl_grow')){?>selected<?php }?>>SKL率</option>
							<option value="spd_grow" <?php if (($_smarty_tpl->tpl_vars['secondkey']->value==='spd_grow')){?>selected<?php }?>>SPD率</option>
							<option value="luk_grow" <?php if (($_smarty_tpl->tpl_vars['secondkey']->value==='luk_grow')){?>selected<?php }?>>LUK率</option>
							<option value="def_grow" <?php if (($_smarty_tpl->tpl_vars['secondkey']->value==='def_grow')){?>selected<?php }?>>DEF率</option>
							<option value="mdf_grow" <?php if (($_smarty_tpl->tpl_vars['secondkey']->value==='mdf_grow')){?>selected<?php }?>>MDF率</option>
							<option value="bod_grow" <?php if (($_smarty_tpl->tpl_vars['secondkey']->value==='bod_grow')){?>selected<?php }?>>BOD率</option>
							<option value="own_skl_id" <?php if (($_smarty_tpl->tpl_vars['secondkey']->value==='own_skl_id')){?>selected<?php }?>>スキル	</option>
            			</select>
            		</td>
            		
            		<td><label></label>
            			<select name="second_key_order">
            				<option value="asc" <?php if (($_smarty_tpl->tpl_vars['secondkeyorder']->value==='asc')){?>selected<?php }?>>昇順</option>
            				<option value="desc" <?php if (($_smarty_tpl->tpl_vars['secondkeyorder']->value==='desc')){?>selected<?php }?>>降順</option>
            			</select>
            		</td>
            			
            		<td><label>第三キー</label>
            			<select name="third_key">
            				<option value="Null">なし</option>
                			<option value="class_id" <?php if (($_smarty_tpl->tpl_vars['thirdkey']->value==='class_id')){?>selected<?php }?>>ID</option>
							<option value="class_rank" <?php if (($_smarty_tpl->tpl_vars['thirdkey']->value==='class_rank')){?>selected<?php }?>>ランク</option>
							<option value="class_name" <?php if (($_smarty_tpl->tpl_vars['thirdkey']->value==='class_name')){?>selected<?php }?>>クラス名</option>
							<option value="hp_val" <?php if (($_smarty_tpl->tpl_vars['thirdkey']->value==='hp_val')){?>selected<?php }?>>HP</option>
							<option value="str_val" <?php if (($_smarty_tpl->tpl_vars['thirdkey']->value==='str_val')){?>selected<?php }?>>STR</option>
							<option value="mag_val" <?php if (($_smarty_tpl->tpl_vars['thirdkey']->value==='mag_val')){?>selected<?php }?>>MAG</option>
							<option value="skl_val" <?php if (($_smarty_tpl->tpl_vars['thirdkey']->value==='skl_val')){?>selected<?php }?>>SKL</option>
							<option value="spd_val" <?php if (($_smarty_tpl->tpl_vars['thirdkey']->value==='spd_val')){?>selected<?php }?>>SPD</option>
							<option value="luk_val" <?php if (($_smarty_tpl->tpl_vars['thirdkey']->value==='luk_val')){?>selected<?php }?>>LUK</option>
							<option value="def_val" <?php if (($_smarty_tpl->tpl_vars['thirdkey']->value==='def_val')){?>selected<?php }?>>DEF</option>
							<option value="mdf_val" <?php if (($_smarty_tpl->tpl_vars['thirdkey']->value==='mdf_val')){?>selected<?php }?>>MDF</option>
							<option value="bod_val" <?php if (($_smarty_tpl->tpl_vars['thirdkey']->value==='bod_val')){?>selected<?php }?>>BOD</option>
							<option value="hp_grow" <?php if (($_smarty_tpl->tpl_vars['thirdkey']->value==='hp_grow')){?>selected<?php }?>>HP率</option>
							<option value="str_grow" <?php if (($_smarty_tpl->tpl_vars['thirdkey']->value==='str_grow')){?>selected<?php }?>>STR率</option>
							<option value="mag_grow" <?php if (($_smarty_tpl->tpl_vars['thirdkey']->value==='mag_grow')){?>selected<?php }?>>MAG率</option>
							<option value="skl_grow" <?php if (($_smarty_tpl->tpl_vars['thirdkey']->value==='skl_grow')){?>selected<?php }?>>SKL率</option>
							<option value="spd_grow" <?php if (($_smarty_tpl->tpl_vars['thirdkey']->value==='spd_grow')){?>selected<?php }?>>SPD率</option>
							<option value="luk_grow" <?php if (($_smarty_tpl->tpl_vars['thirdkey']->value==='luk_grow')){?>selected<?php }?>>LUK率</option>
							<option value="def_grow" <?php if (($_smarty_tpl->tpl_vars['thirdkey']->value==='def_grow')){?>selected<?php }?>>DEF率</option>
							<option value="mdf_grow" <?php if (($_smarty_tpl->tpl_vars['thirdkey']->value==='mdf_grow')){?>selected<?php }?>>MDF率</option>
							<option value="bod_grow" <?php if (($_smarty_tpl->tpl_vars['thirdkey']->value==='bod_grow')){?>selected<?php }?>>BOD率</option>
							<option value="own_skl_id" <?php if (($_smarty_tpl->tpl_vars['thirdkey']->value==='own_skl_id')){?>selected<?php }?>>スキル	</option>
            			</select>
            		</td>
            		
            		<td><label></label>
            			<select name="third_key_order">
          					<option value="asc" <?php if (($_smarty_tpl->tpl_vars['thirdkeyorder']->value==='asc')){?>selected<?php }?>>昇順</option>
            				<option value="desc" <?php if (($_smarty_tpl->tpl_vars['thirdkeyorder']->value==='desc')){?>selected<?php }?>>降順</option>
            			</select>
            		</td>
            		
            		<td><label>第四キー</label>
            			<select name="fourth_key">
            				<option value="Null">なし</option>
                			<option value="class_id" <?php if (($_smarty_tpl->tpl_vars['fourthkey']->value==='class_id')){?>selected<?php }?>>ID</option>
							<option value="class_rank" <?php if (($_smarty_tpl->tpl_vars['fourthkey']->value==='class_rank')){?>selected<?php }?>>ランク</option>
							<option value="class_name" <?php if (($_smarty_tpl->tpl_vars['fourthkey']->value==='class_name')){?>selected<?php }?>>クラス名</option>
							<option value="hp_val" <?php if (($_smarty_tpl->tpl_vars['fourthkey']->value==='hp_val')){?>selected<?php }?>>HP</option>
							<option value="str_val" <?php if (($_smarty_tpl->tpl_vars['fourthkey']->value==='str_val')){?>selected<?php }?>>STR</option>
							<option value="mag_val" <?php if (($_smarty_tpl->tpl_vars['fourthkey']->value==='mag_val')){?>selected<?php }?>>MAG</option>
							<option value="skl_val" <?php if (($_smarty_tpl->tpl_vars['fourthkey']->value==='skl_val')){?>selected<?php }?>>SKL</option>
							<option value="spd_val" <?php if (($_smarty_tpl->tpl_vars['fourthkey']->value==='spd_val')){?>selected<?php }?>>SPD</option>
							<option value="luk_val" <?php if (($_smarty_tpl->tpl_vars['fourthkey']->value==='luk_val')){?>selected<?php }?>>LUK</option>
							<option value="def_val" <?php if (($_smarty_tpl->tpl_vars['fourthkey']->value==='def_val')){?>selected<?php }?>>DEF</option>
							<option value="mdf_val" <?php if (($_smarty_tpl->tpl_vars['fourthkey']->value==='mdf_val')){?>selected<?php }?>>MDF</option>
							<option value="bod_val" <?php if (($_smarty_tpl->tpl_vars['fourthkey']->value==='bod_val')){?>selected<?php }?>>BOD</option>
							<option value="hp_grow" <?php if (($_smarty_tpl->tpl_vars['fourthkey']->value==='hp_grow')){?>selected<?php }?>>HP率</option>
							<option value="str_grow" <?php if (($_smarty_tpl->tpl_vars['fourthkey']->value==='str_grow')){?>selected<?php }?>>STR率</option>
							<option value="mag_grow" <?php if (($_smarty_tpl->tpl_vars['fourthkey']->value==='mag_grow')){?>selected<?php }?>>MAG率</option>
							<option value="skl_grow" <?php if (($_smarty_tpl->tpl_vars['fourthkey']->value==='skl_grow')){?>selected<?php }?>>SKL率</option>
							<option value="spd_grow" <?php if (($_smarty_tpl->tpl_vars['fourthkey']->value==='spd_grow')){?>selected<?php }?>>SPD率</option>
							<option value="luk_grow" <?php if (($_smarty_tpl->tpl_vars['fourthkey']->value==='luk_grow')){?>selected<?php }?>>LUK率</option>
							<option value="def_grow" <?php if (($_smarty_tpl->tpl_vars['fourthkey']->value==='def_grow')){?>selected<?php }?>>DEF率</option>
							<option value="mdf_grow" <?php if (($_smarty_tpl->tpl_vars['fourthkey']->value==='mdf_grow')){?>selected<?php }?>>MDF率</option>
							<option value="bod_grow" <?php if (($_smarty_tpl->tpl_vars['fourthkey']->value==='bod_grow')){?>selected<?php }?>>BOD率</option>
							<option value="own_skl_id" <?php if (($_smarty_tpl->tpl_vars['fourthkey']->value==='own_skl_id')){?>selected<?php }?>>スキル	</option>
            			</select>
            		</td>
            		
            		<td><label></label>
            			<select name="fourth_key_order">
          					<option value="asc" <?php if (($_smarty_tpl->tpl_vars['fourthkeyorder']->value==='asc')){?>selected<?php }?>>昇順</option>
            				<option value="desc" <?php if (($_smarty_tpl->tpl_vars['fourthkeyorder']->value==='desc')){?>selected<?php }?>>降順</option>
            			</select>
            		</td>
            		
            		<td><label>第五キー</label>
            			<select name="fifth_key">
            				<option value="Null">なし</option>
                			<option value="class_id" <?php if (($_smarty_tpl->tpl_vars['fifthkey']->value==='class_id')){?>selected<?php }?>>ID</option>
							<option value="class_rank" <?php if (($_smarty_tpl->tpl_vars['fifthkey']->value==='class_rank')){?>selected<?php }?>>ランク</option>
							<option value="class_name" <?php if (($_smarty_tpl->tpl_vars['fifthkey']->value==='class_name')){?>selected<?php }?>>クラス名</option>
							<option value="hp_val" <?php if (($_smarty_tpl->tpl_vars['fifthkey']->value==='hp_val')){?>selected<?php }?>>HP</option>
							<option value="str_val" <?php if (($_smarty_tpl->tpl_vars['fifthkey']->value==='str_val')){?>selected<?php }?>>STR</option>
							<option value="mag_val" <?php if (($_smarty_tpl->tpl_vars['fifthkey']->value==='mag_val')){?>selected<?php }?>>MAG</option>
							<option value="skl_val" <?php if (($_smarty_tpl->tpl_vars['fifthkey']->value==='skl_val')){?>selected<?php }?>>SKL</option>
							<option value="spd_val" <?php if (($_smarty_tpl->tpl_vars['fifthkey']->value==='spd_val')){?>selected<?php }?>>SPD</option>
							<option value="luk_val" <?php if (($_smarty_tpl->tpl_vars['fifthkey']->value==='luk_val')){?>selected<?php }?>>LUK</option>
							<option value="def_val" <?php if (($_smarty_tpl->tpl_vars['fifthkey']->value==='def_val')){?>selected<?php }?>>DEF</option>
							<option value="mdf_val" <?php if (($_smarty_tpl->tpl_vars['fifthkey']->value==='mdf_val')){?>selected<?php }?>>MDF</option>
							<option value="bod_val" <?php if (($_smarty_tpl->tpl_vars['fifthkey']->value==='bod_val')){?>selected<?php }?>>BOD</option>
							<option value="hp_grow" <?php if (($_smarty_tpl->tpl_vars['fifthkey']->value==='hp_grow')){?>selected<?php }?>>HP率</option>
							<option value="str_grow" <?php if (($_smarty_tpl->tpl_vars['fifthkey']->value==='str_grow')){?>selected<?php }?>>STR率</option>
							<option value="mag_grow" <?php if (($_smarty_tpl->tpl_vars['fifthkey']->value==='mag_grow')){?>selected<?php }?>>MAG率</option>
							<option value="skl_grow" <?php if (($_smarty_tpl->tpl_vars['fifthkey']->value==='skl_grow')){?>selected<?php }?>>SKL率</option>
							<option value="spd_grow" <?php if (($_smarty_tpl->tpl_vars['fifthkey']->value==='spd_grow')){?>selected<?php }?>>SPD率</option>
							<option value="luk_grow" <?php if (($_smarty_tpl->tpl_vars['fifthkey']->value==='luk_grow')){?>selected<?php }?>>LUK率</option>
							<option value="def_grow" <?php if (($_smarty_tpl->tpl_vars['fifthkey']->value==='def_grow')){?>selected<?php }?>>DEF率</option>
							<option value="mdf_grow" <?php if (($_smarty_tpl->tpl_vars['fifthkey']->value==='mdf_grow')){?>selected<?php }?>>MDF率</option>
							<option value="bod_grow" <?php if (($_smarty_tpl->tpl_vars['fifthkey']->value==='bod_grow')){?>selected<?php }?>>BOD率</option>
							<option value="own_skl_id" <?php if (($_smarty_tpl->tpl_vars['fifthkey']->value==='own_skl_id')){?>selected<?php }?>>スキル	</option>
            			</select>
            		</td>
            		
            		<td><label></label>
            			<select name="fifth_key_order">
          					<option value="asc" <?php if (($_smarty_tpl->tpl_vars['fifthkeyorder']->value==='asc')){?>selected<?php }?>>昇順</option>
            				<option value="desc" <?php if (($_smarty_tpl->tpl_vars['fifthkeyorder']->value==='desc')){?>selected<?php }?>>降順</option>
            			</select>
            		</td>
            		
            		<td>
            			<input id="sort_submit" type="submit" value="整列">
            			<input id="sort_reset" type="reset" value="リセット">
            		</td>
                </tr>
            </table>
        </fieldset>
    </form>

</div>
<?php }} ?>