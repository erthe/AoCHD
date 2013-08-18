<div class="window-container">

    <form id="edit" method="post" action="classupdate">
        <fieldset>
            <table class="table-center">
            
                <tr>
                    <td><label>ID： </label></td>
                    <td><input class="text-right" type="text" readonly size="5" value="{$item.class_id}"></td>
                    <td><label>ランク: </label></td>
                    <td colspan=2><input class="text-right" type="text" name="class_rank" size="5" value="{$item.class_rank}"></td>
                    
                </tr>
               
               <tr>
                    <td><label>クラス名: </label></td>
                    <td colspan="5"><input type="text" name="class_name" size="20" value="{$item.class_name}"></td>
                </tr>
                
                <tr>
                    <td><label>HP: </label></td>
                    <td><input class="text-right" type="text" name="hp_val" size="5" value="{$item.hp_val}"></td>
                    <td><label>HP率: </label></td>
                    <td colspan="2"><input class="text-right" type="text" name="hp_grow" size="5" value="{$item.hp_grow}%"></td>
                </tr>

                <tr>
                    <td><label>STR: </label></td>
                    <td><input class="text-right" type="text" name="str_val" size="5" value="{$item.str_val}"></td>
                   	<td><label>STR率: </label></td>
                    <td colspan="2"><input class="text-right" type="text" name="str_grow" size="5" value="{$item.str_grow}%"></td>
                </tr>

                <tr>
                    <td><label>MAG: </label></td>
                    <td><input class="text-right" type="text" name="mag_val" size="5" value="{$item.mag_val}"></td>
                    <td><label>MAG率: </label></td>
                    <td colspan="2"><input class="text-right" type="text" name="mag_grow" size="5" value="{$item.mag_grow}%"></td>
                </tr>

                <tr>
                    <td><label>SKL: </label></td>
                    <td><input class="text-right" type="text" name="skl_val" size="5" value="{$item.skl_val}"></td>
                    <td><label>SKL率: </label></td>
                    <td colspan="2"><input class="text-right" type="text" name="skl_grow" size="5" value="{$item.skl_grow}%"></td>
                </tr>

                <tr>
                    <td><label>SPD: </label></td>
                    <td><input class="text-right" type="text" name="spd_val" size="5" value="{$item.spd_val}"></td>
                    <td><label>SPD率: </label></td>
                    <td colspan="2"><input class="text-right" type="text" name="spd_grow" size="5" value="{$item.spd_grow}%"></td>
                </tr>

                <tr>
                    <td><label>LUK: </label></td>
                    <td><input class="text-right" type="text" name="luk_val" size="5" value="{$item.luk_val}"></td>
                    <td><label>LUK率: </label></td>
                    <td colspan="2"><input class="text-right" type="text" name="luk_grow" size="5" value="{$item.luk_grow}%"></td>
                </tr>

                <tr>
                    <td><label>DEF: </label></td>
                    <td><input class="text-right" type="text" name="def_val" size="5" value="{$item.def_val}"></td>
                    <td><label>DEF率: </label></td>
                    <td colspan="2"><input class="text-right" type="text" name="def_grow" size="5" value="{$item.def_grow}%"></td>
                </tr>

                <tr>
                    <td><label>MDF: </label></td>
                    <td><input class="text-right" type="text" name="mdf_val" size="5" value="{$item.mdf_val}"></td>
                    <td><label>MDF率: </label></td>
                    <td colspan="2"><input class="text-right" type="text" name="mdf_grow" size="5" value="{$item.mdf_grow}%"></td>
                </tr>

                <tr>
                    <td><label>BOD: </label></td>
                    <td><input class="text-right" type="text" name="bod_val" size="5" value="{$item.bod_val}"></td>
                    <td><label>BOD率: </label></td>
                    <td colspan="2"><input class="text-right" type="text" name="bod_grow" size="5" value="{$item.bod_grow}%"></td>
                </tr>

                <tr>
                	<td><label>スキル: </label></td>
                    <td><select name="own_skl_id">
                    		<option value="NULL" {if $item.own_skl_id == null}selected{/if}>なし</option>
                            <option value="1" {if $item.own_skl_id == 1}selected{/if}>可</option>
                            <option value="2" {if $item.own_skl_id == 2}selected{/if}>不可</option>
                        </select>
                    </td>
                    <td><label>選択: </label></td>
                    <td><select name="playable">
                            <option value="1" {if $item.playable == 1}selected{/if}>可</option>
                            <option value="0" {if $item.playable == 0}selected{/if}>不可</option>
                        </select>
                    </td>
                    <td><label>転職</label></td>
                    <td><select name="classchange_id">
                            <option value="NULL" {if $item.own_skl_id == null}selected{/if}>なし</option>
                            <option value="55" {if $item.classchange_id == 55}selected{/if}>★ハイプリースト</option>
							<option value="56" {if $item.classchange_id == 56}selected{/if}>★シーフファイター</option>
							<option value="57" {if $item.classchange_id == 57}selected{/if}>★マージナイト</option>
							<option value="58" {if $item.classchange_id == 58}selected{/if}>★ウォーリアー</option>
							<option value="59" {if $item.classchange_id == 59}selected{/if}>★マムルーク</option>
							<option value="60" {if $item.classchange_id == 60}selected{/if}>★セイジ</option>
							<option value="61" {if $item.classchange_id == 61}selected{/if}>★ジェネラル</option>
							<option value="62" {if $item.classchange_id == 62}selected{/if}>★ボウマスター</option>
							<option value="63" {if $item.classchange_id == 63}selected{/if}>★バーサーカー</option>
							<option value="64" {if $item.classchange_id == 64}selected{/if}>★ダークビショップ</option>
							<option value="65" {if $item.classchange_id == 65}selected{/if}>★ヴァルキリー</option>
							<option value="66" {if $item.classchange_id == 66}selected{/if}>★スナイパー</option>
							<option value="67" {if $item.classchange_id == 67}selected{/if}>★マーシナリー</option>
							<option value="68" {if $item.classchange_id == 68}selected{/if}>★グレートナイト</option>
							<option value="69" {if $item.classchange_id == 69}selected{/if}>★ソードマスター</option>
							<option value="70" {if $item.classchange_id == 70}selected{/if}>★デュークナイト</option>
							<option value="71" {if $item.classchange_id == 71}selected{/if}>★フォレストナイト</option>
							<option value="72" {if $item.classchange_id == 72}selected{/if}>★パラディン</option>
							<option value="73" {if $item.classchange_id == 73}selected{/if}>★ボウナイト</option>
							<option value="74" {if $item.classchange_id == 74}selected{/if}>★バロン</option>
							<option value="75" {if $item.classchange_id == 75}selected{/if}>★ファルコンナイト</option>
							<option value="76" {if $item.classchange_id == 76}selected{/if}>★ドラゴンマスター</option>
                	</select></td>
                </tr>
                
                <tr>
                    <td colspan="4">
                    	<input type="hidden" name="original_name" value="{$item.class_name}">
                        <input type="hidden" name="class_id" value="{$item.class_id}">
                        <input id="submit_update" type="submit" value="送信"><input type="reset" value="リセット"></td>
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
<script "text/javascript" src="../themes/js/thickboxuseadmin.js"></script>