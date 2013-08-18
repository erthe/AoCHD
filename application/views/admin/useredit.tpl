<div class="window-container">

    <form id="edit" method="post" action="userupdate">
        <fieldset>
            <table>
            
                <tr>
                    <td><label>ID： </label></td>
                    <td><input class="text-right" type="text" readonly size="40" value="{$item.user_id}"></td>
                </tr>
                
                <tr>
                    <td><label>ユーザー名: </label></td>
                    <td><input type="text" name="user_name" size="40" value="{$item.user_name}"></td>
                </tr>
                
                <tr>
                    <td><label>Email: </label></td>
                    <td><input type="email" name="email" size="40" value="{$item.email}"></td>
                </tr>
                
                <tr>
                    <td><label>パスワード: </label></td>
                    <td><input type="password" name="password" size="40" value="{$item.password}"> <input type="button" id="md5" value="ハッシュ値変換"></td>
                </tr>

                <tr>
                    <td><label>状態: </label></td>
                    <td><select name="status">
                            <option value=1 {if $item.status == 1} selected{/if}
                            >登録</option>
                            <option value="0" {if $item.status == 0} selected{/if}>退会</option>
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <td><label>メモ: </label></td>
                    <td><textarea name="memo" rows="5" cols="45" wrap="soft">{$item.memo}</textarea></td>
                </tr>

                <tr>
                    <td>
                   		<input type="hidden" name="original_name" value="{$item.user_name}"> 
                        <input type="hidden" name="user_id" value="{$item.user_id}">
                        <input id="submit_update" type="submit" value="送信"><input type="reset" value="リセット"></td>
                </tr>
                
                <td colspan="2">
                		<input type="button" id="closetb" value="閉じる">
                		パスワード変更時はハッシュ値変換ボタンを押してください。
                	</td>
            </table>
        </fieldset>
    </form>

</div>
<script "text/javascript" src="../themes/js/library/md5.js"></script>
<script "text/javascript" src="../themes/js/thickboxuseadmin.js"></script>