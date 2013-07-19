<div class="form-container">

    <form id="edit" method="post" action="userupdate">
        <fieldset>
            <table>
            
                <tr>
                    <td><label>User ID： </label></td>
                    <td><input type="text" readonly size="40" value="{$item.user_id}"</td>
                </tr>
                
                <tr>
                    <td><label>User Name: </label></td>
                    <td><input type="text" name="user_name" size="40" value="{$item.user_name}"></td>
                </tr>
                
                <tr>
                    <td><label>Email: </label></td>
                    <td><input type="email" name="email" size="40" value="{$item.email}"></td>
                </tr>
                
                <tr>
                    <td><label>Password: </label></td>
                    <td><input type="password" name="password" size="40" value="{$item.password}"> <input type="button" id="md5" value="ハッシュ値変換"></td>
                </tr>

                <tr>
                    <td><label>Status: </label></td>
                    <td><select name="status">
                            <option value="1">登録</option>
                            <option value="0">退会</option>
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <td><label>Memo: </label></td>
                    <td><textarea name="memo" rows="2" cols="40" value="{$item.memo}"></textarea></td>
                </tr>

                <tr>
                    <td>
                        <input type="hidden" name="user_id" value="{$item.user_id}">
                        <input type="submit" value="送信"><input type="reset" value="リセット"></td>
                </tr>
            </table>
        </fieldset>
    </form>

    <button id="closetb">閉じる</button>

</div>
<script "text/javascript" src="../themes/js/library/md5.js"></script>
<script "text/javascript" src="../themes/js/thickboxuse.js"></script>