<div class="form-container">

    <form id="edit" method="post" action="userlist">
        <fieldset>
            <table class="table-center">
            
                <tr>
                    <td><label>ID： </label><input  class="text-right" type="text" name="search_user_id"  size="10" value="{$search_user_id}"></td>
                    <td><label>ユーザー名: </label><input type="text" name="search_user_name" size="10" value="{$search_user_name}"></td>
                    <td><label>Email: </label><input type="text" name="search_email" size="40" value="{$search_email}"></td>
        			<td><label>Login</label>
            			<select name="search_login">
                			<option value="2" {if ($search_login == 2)}selected{/if}>指定なし</option>
                			<option value="1" {if ($search_login == 1)}selected{/if}>ログイン中</option>
                			<option value="0" {if ($search_login == 0)}selected{/if}>ログアウト</option>
            			</select>
        			</td>
                    <td><label>状態: </label>
            			<select name="search_status">
			                <option value="2" {if ($search_status == 2)}selected{/if}>指定なし</option>	
			                <option value="1" {if ($search_status == 1)}selected{/if}>登録</option>
			                <option value="0" {if ($search_status == 0)}selected{/if}>退会</option>
                        </select>
                    </td>
                    <td>
            			<input id="search_submit" type="submit" value="検索">
            			<input id="search_reset" type="reset" value="リセット"></td>
                </tr>
            </table>
        </fieldset>
    </form>

</div>
