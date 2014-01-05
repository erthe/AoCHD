<div class="window-container">

    <form id="insert_player" method="post" action="userinsert">
        <fieldset>
            <table>
            
                <tr>
                    <td><label>ID： </label></td>
                    <td><input type="text" readonly size="40"></td>
                </tr>
                
                <tr>
                    <td><label>プレイヤー名: </label></td>
                    <td><input type="text" name="player_name" size="40"></td>
                </tr>
                
                <tr>
                    <td><label>レート: </label></td>
                    <td><input type="text" class="text-right" name="rate" size="40" > </td>
                </tr>

                <tr>
                    <td><label>状態: </label></td>
                    <td><select name="delete_flag">
                            <option value="0">登録</option>
                            <option value="1">削除</option>
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <td><label>メモ: </label></td>
                    <td><textarea name="memo" rows="5" cols="45" wrap="soft"></textarea></td>
                </tr>

                <tr>
                    <td>
                        <input id="player_insert" type="submit" value="送信"><input type="reset" value="リセット"></td>
                </tr>
                
                <td colspan="2">
                		<input type="button" id="closetb" value="閉じる">
                	</td>
            </table>
        </fieldset>
    </form>
<span class="text-red">プレイヤー名には「'」を使用しないで下さい。</span><br />
「'」の代用として「_」を使用してください。
</div>
<script "text/javascript" src="../themes/js/thickboxuseadmin.js"></script>