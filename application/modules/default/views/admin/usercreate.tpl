<div class="window-container">

    <form id="insert_user" method="post" action="userinsert">
        <fieldset>
            <table>
            
                <tr>
                    <td><label>ID： </label></td>
                    <td><input type="text" readonly size="40"></td>
                </tr>
                
                <tr>
                    <td><label>ユーザー名: </label></td>
                    <td><input type="text" name="user_name" size="40"></td>
                </tr>
                
                <tr>
                    <td><label>パスワード: </label></td>
                    <td><input type="password" name="user_password" size="40" > </td>
                </tr>

                <tr>
                    <td><label>ユーザー権限: </label></td>
                    <td><select name="user_control">
                            <option value="host">ホスト</option>
                            <option value="other">その他</option>
                            <option value="administrator">管理者</option>
                        </select>
                    </td>
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
                    <td>
                        <input id="user_insert" type="submit" value="送信"><input type="reset" value="リセット"></td>
                </tr>
                
                <td colspan="2">
                		<input type="button" id="closetb" value="閉じる">
                	</td>
            </table>
        </fieldset>
    </form>
<span class="text-red">ユーザー名には「'」を使用しないで下さい。</span><br />
「'」の代用として「_」を使用してください。
</div>
<script "text/javascript" src="../themes/js/thickboxuseadmin.js"></script>