<div class="window-container">

    <form id="edit" method="post" action="admininsert">
        <fieldset>
            <table>
            
                <tr>
                    <td><label>ID： </label></td>
                    <td><input type="text" readonly size="40"></td>
                </tr>
                
                <tr>
                    <td><label>管理者名: </label></td>
                    <td><input type="text" name="admin_name" size="40"></td>
                </tr>
                
                <tr>
                    <td><label>パスワード: </label></td>
                    <td><input type="password" name="password" size="40" > </td>
                </tr>

                <tr>
                    <td><label>状態: </label></td>
                    <td><select name="status">
                            <option value="1">登録</option>
                            <option value="0">退会</option>
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <input id="submit_insert" type="submit" value="送信"><input type="reset" value="リセット"></td>
                </tr>
                
                <tr>
                	<td colspan="2">
                		<input type="button" id="closetb" value="閉じる">
                	</td>
                </tr>
            </table>
        </fieldset>
    </form>

</div>
<script "text/javascript" src="../themes/js/library/md5.js"></script>
<script "text/javascript" src="../themes/js/thickboxuseadmin.js"></script>