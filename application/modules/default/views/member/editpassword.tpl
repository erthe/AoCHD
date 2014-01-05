<div class="window-container">

    <form id="edit-user" method="post" action="userupdate">
        <fieldset>
            <table>
            
                <tr>
                    <td><label>ID： </label></td>
                    <td><input class="text-right" name="user_id" type="text" readonly size="20" value="{$user_id}"></td>
                </tr>
                
                <tr>
                    <td><label>ユーザー名: </label></td>
                    <td><input type="text" name="user_name" readonly size="20" value="{$user_name}"></td>
                </tr>
                
                <tr>
                    <td><label>パスワード: </label></td>
                    <td><input type="password" name="user_password" size="20"></td>
                </tr>
                
                <tr>
                    <td><label>パスワード再入力: </label></td>
                    <td><input type="password" name="retype" size="20"></td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input id="password_update" type="submit" value="送信">
                        <input type="reset" value="リセット">
                        <input type="button" id="closetb" value="閉じる">
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>

</div>
<script "text/javascript" src="../themes/js/thickboxuseadmin.js"></script>