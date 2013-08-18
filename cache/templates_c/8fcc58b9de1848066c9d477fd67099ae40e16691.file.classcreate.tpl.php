<?php /* Smarty version Smarty-3.1.13, created on 2013-08-18 00:57:13
         compiled from "/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/classcreate.tpl" */ ?>
<?php /*%%SmartyHeaderCode:27079600520dd1ad197a85-94990968%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8fcc58b9de1848066c9d477fd67099ae40e16691' => 
    array (
      0 => '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/classcreate.tpl',
      1 => 1376755028,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27079600520dd1ad197a85-94990968',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_520dd1ad2314a4_76072702',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_520dd1ad2314a4_76072702')) {function content_520dd1ad2314a4_76072702($_smarty_tpl) {?><div class="window-container">

    <form id="edit" method="post" action="classinsert">
        <fieldset>
            <table class="table-center">
            
                <tr>
                    <td><label>ID： </label></td>
                    <td><input class="text-right" type="text" readonly size="5"></td>
                    <td><label>ランク: </label></td>
                    <td colspan="2"><input class="text-right" type="text" name="class_rank" size="5"></td>
                </tr>
               
               <tr>
                    <td><label>クラス名: </label></td>
                    <td colspan="4"><input type="text" name="class_name" size="20"></td>
                </tr>
                
                <tr>
                    <td><label>HP: </label></td>
                    <td><input class="text-right" type="text" name="hp_val" size="5"></td>
                    <td><label>HP率: </label></td>
                    <td colspan="2"><input class="text-right" type="text" name="hp_grow" size="5"></td>
                </tr>

                <tr>
                    <td><label>STR: </label></td>
                    <td><input class="text-right" type="text" name="str_val" size="5"></td>
                   	<td><label>STR率: </label></td>
                    <td colspan="2"><input class="text-right" type="text" name="str_grow" size="5"></td>
                </tr>

                <tr>
                    <td><label>MAG: </label></td>
                    <td><input class="text-right" type="text" name="mag_val" size="5"></td>
                    <td><label>MAG率: </label></td>
                    <td colspan="2"><input class="text-right" type="text" name="mag_grow" size="5"></td>
                </tr>

                <tr>
                    <td><label>SKL: </label></td>
                    <td><input class="text-right" type="text" name="skl_val" size="5"></td>
                    <td><label>SKL率: </label></td>
                    <td colspan="2"><input class="text-right" type="text" name="skl_grow" size="5"></td>
                </tr>

                <tr>
                    <td><label>SPD: </label></td>
                    <td><input class="text-right" type="text" name="spd_val" size="5"></td>
                    <td><label>SPD率: </label></td>
                    <td colspan="2"><input class="text-right" type="text" name="spd_grow" size="5"></td>
                </tr>

                <tr>
                    <td><label>LUK: </label></td>
                    <td><input class="text-right" type="text" name="luk_val" size="5"></td>
                    <td><label>LUK率: </label></td>
                    <td colspan="2"><input class="text-right" type="text" name="luk_grow" size="5"></td>
                </tr>

                <tr>
                    <td><label>DEF: </label></td>
                    <td><input class="text-right" type="text" name="def_val" size="5"></td>
                    <td><label>DEF率: </label></td>
                    <td colspan="2"><input class="text-right" type="text" name="def_grow" size="5"></td>
                </tr>

                <tr>
                    <td><label>MDF: </label></td>
                    <td><input class="text-right" type="text" name="mdf_val" size="5"></td>
                    <td><label>MDF率: </label></td>
                    <td colspan="2"><input class="text-right" type="text" name="mdf_grow" size="5"></td>
                </tr>

                <tr>
                    <td><label>BOD: </label></td>
                    <td><input class="text-right" type="text" name="bod_val" size="5"></td>
                    <td><label>BOD率: </label></td>
                    <td colspan="2"><input class="text-right" type="text" name="bod_grow" size="5"></td>
                </tr>

                <tr>
                	<td><label>スキル: </label></td>
                    <td><select name="own_skl_id">
                    		<option value="">なし</option>
                            <option value="1">可</option>
                            <option value="2">不可</option>
                        </select>
                    </td>
                    <td><label>選択: </label></td>
                    <td><select name="playable">
                            <option value="1">可</option>
                            <option value="0">不可</option>
                        </select>
                    </td>
                    <td><label>転職</label></td>
                    <td><select name="classchange_id">
                            <option value="NULL">なし</option>
                            <option value="55">★ハイプリースト</option>
							<option value="56">★シーフファイター</option>
							<option value="57">★マージナイト</option>
							<option value="58">★ウォーリアー</option>
							<option value="59">★マムルーク</option>
							<option value="60">★セイジ</option>
							<option value="61">★ジェネラル</option>
							<option value="62"}>★ボウマスター</option>
							<option value="63">★バーサーカー</option>
							<option value="64">★ダークビショップ</option>
							<option value="65">★ヴァルキリー</option>
							<option value="66">★スナイパー</option>
							<option value="67">★マーシナリー</option>
							<option value="68">★グレートナイト</option>
							<option value="69">★ソードマスター</option>
							<option value="70">★デュークナイト</option>
							<option value="71">★フォレストナイト</option>
							<option value="72">★パラディン</option>
							<option value="73">★ボウナイト</option>
							<option value="74">★バロン</option>
							<option value="75">★ファルコンナイト</option>
							<option value="76">★ドラゴンマスター</option>
                	</select></td>
                </tr>
                
                <tr>
                    <td colspan="4">
                        <input id="submit_insert" type="submit" value="送信"><input type="reset" value="リセット"></td>
                </tr>
                
                <tr>
                	<td colspan="4">
                		<input type="button" id="closetb" value="閉じる">
                	</td>
                </tr>
            </table>
        </fieldset>
    </form>

</div>
<script "text/javascript" src="../themes/js/thickboxuseadmin.js"></script><?php }} ?>