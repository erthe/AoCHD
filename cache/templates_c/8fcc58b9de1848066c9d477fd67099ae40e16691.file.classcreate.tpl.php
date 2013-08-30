<?php /* Smarty version Smarty-3.1.13, created on 2013-08-21 21:44:06
         compiled from "/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/classcreate.tpl" */ ?>
<?php /*%%SmartyHeaderCode:27079600520dd1ad197a85-94990968%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8fcc58b9de1848066c9d477fd67099ae40e16691' => 
    array (
      0 => '/Users/Erlkonig/Documents/Workspace/ArenaofGenelogy/application/views/admin/classcreate.tpl',
      1 => 1377007499,
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

    <form id="edit-class" method="post" action="classinsert">
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
                    <td><input class="text-right" type="text" name="def_grow" size="5"></td>
                    <td><label>重装: </label></td>
                    <td><select name="armor_flag">
                            <option value="0">無</option>
                            <option value="1">有</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td><label>MDF: </label></td>
                    <td><input class="text-right" type="text" name="mdf_val" size="5"></td>
                    <td><label>MDF率: </label></td>
                    <td><input class="text-right" type="text" name="mdf_grow" size="5"></td>
                    <td><label>騎乗: </label></td>
                    <td><select name="knight_flag">
                            <option value="0">無</option>
                            <option value="1">有</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td><label>BOD: </label></td>
                    <td><input class="text-right" type="text" name="bod_val" size="5"></td>
                    <td><label>BOD率: </label></td>
                    <td><input class="text-right" type="text" name="bod_grow" size="5"></td>
                    <td><label>飛行: </label></td>
                    <td><select name="flying_flag">
                            <option value="0">無</option>
                            <option value="1">有</option>
                        </select>
                    </td>
                </tr>

                <tr>
                	<td><label>スキル: </label></td>
                    <td><select name="own_skl_id">
                    		<option value="">なし</option>
                            <option value="1">祈り</option>
                            <option value="2">盗む</option>
                            <option value="3">集中</option>
							<option value="4">強奪</option>
							<option value="5">急所狙い</option>
							<option value="6">先読み</option>
							<option value="7">修練</option>
							<option value="8">直感</option>
							<option value="9">闘争心</option>
							<option value="10">呪い</option>
							<option value="11">癒やしの心</option>
							<option value="12">集団戦	</option>
							<option value="13">熱血</option>
							<option value="14">乗馬術	</option>
							<option value="15">迅速</option>
							<option value="16">小盾</option>
							<option value="17">俊足</option>
							<option value="18">尖兵</option>
							<option value="19">強襲</option>
							<option value="20">大盾</option>
							<option value="21">波状攻撃</option>
							<option value="22">吸精</option>
							<option value="23">幸運の女神</option>
							<option value="24">月光</option>
							<option value="25">一撃必殺</option>
							<option value="26">流星</option>
							<option value="27">高貴なる血</option>
							<option value="28">連続</option>
							<option value="29">太陽</option>
							<option value="30">上級乗馬術</option>
							<option value="31">精鋭軍団</option>
							<option value="32">鉄壁</option>
							<option value="33">怒り</option>
							<option value="34">飛翔</option>
							<option value="35">孤高の英雄</option>
							<option value="36">踊り</option>
							<option value="37">クリティカル</option>
                            
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
                        <input id="class_insert" type="submit" value="送信"><input type="reset" value="リセット"></td>
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