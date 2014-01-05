<div class="window-container">

    <form id="edit-player" method="post" action="userupdate">
        <fieldset>
            <table>
            
                <tr>
                    <td><label>ID： </label></td>
                    <td colspan="3"><input class="text-right" type="text" name="player_id" readonly size="20" value="{$item.player_id}"></td>
                </tr>
                
                <tr>
                    <td><label>プレイヤー名: </label></td>
                    <td colspan="3"><input type="text" name="player_name" size="20" value="{$item.player_name}"></td>
                	
                </tr>
                	<td><label>レート: </label></td>
                    <td><input type="text" name="rate" class="text-right" size="20" value="{$item.rate}"></td>
                	<td><label>以前のレート: </label></td>
                    <td><input type="text" name="previous_rate" class="text-right" readonly size="20" value="{$item.previous_rate}"></td>
                <tr>
                    
                </tr>
                
                <tr>
                    <td><label>勝利: </label></td>
                    <td><input type="text" name="win" class="text-right"  readonly size="20" value="{$item.win}"></td>
                    <td><label>敗北: </label></td>
                    <td><input type="text" name="lose" class="text-right" readonly size="20" value="{$item.lose}"></td>
                </tr>

                <tr>
                    <td><label>状態: </label></td>
                    <td colspan="3"><select name="delete_flag">
                            <option value="0" {if $item.delete_flag == 0} selected{/if}>登録</option>
                            <option value="1" {if $item.delete_flag == 1} selected{/if}>削除</option>
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <td><label>メモ: </label></td>
                    <td colspan="3"><textarea name="memo" rows="5" cols="45" wrap="soft">{$item.memo}</textarea></td>
                </tr>

                <tr>
                    <td colspan="4">
                        <input id="player_update" type="submit" value="送信"><input type="reset" value="リセット"></td>
                </tr>
                
                <td colspan="4">
                		<input type="button" id="closetb" value="閉じる">
                	</td>
            </table>
        </fieldset>
    </form>
<span class="text-red">プレイヤー名には「'」を使用しないで下さい。</span><br />
「'」の代用として「_」を使用してください。
</div>
<script "text/javascript" src="../themes/js/thickboxuseadmin.js"></script>