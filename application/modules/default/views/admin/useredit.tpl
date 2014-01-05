<div class="window-container">

    <form id="edit-user" method="post" action="userupdate">
        <fieldset>
            <table>
            
                <tr>
                    <td><label>ID： </label></td>
                    <td><input class="text-right" type="text" name="user_id" readonly size="20" value="{$item.user_id}"></td>
                </tr>
                
                <tr>
                    <td><label>ユーザー名: </label></td>
                    <td><input type="text" name="user_name" size="20" value="{$item.user_name}"></td>
                </tr>
                
                <tr>
                	<td><label>パスワード: </label></td>
                    <td><input type="password" name="user_password" value="{$item.user_password}" size="20"><input type="button" id="md5" value="ハッシュ値変換"></td>
                <tr>

				<tr>
                    <td><label>権限: </label></td>
                    <td><select name="user_control">
                            <option value="host" {if $item.user_control == 'host'} selected{/if}>ホスト</option>
                            <option value="other" {if $item.user_control == 'other'} selected{/if}>その他</option>
                            <option value="administrator" {if $item.user_control == 'administrator'} selected{/if}>管理者</option>
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <td><label>状態: </label></td>
                    <td><select name="delete_flag">
                            <option value="0" {if $item.delete_flag == 0} selected{/if}>登録</option>
                            <option value="1" {if $item.delete_flag == 1} selected{/if}>削除</option>
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <input id="user_update" type="submit" value="送信"><input type="reset" value="リセット"></td>
                	</td>
                	<td>
                		<input type="button" id="closetb" value="閉じる">
                	</td>
            </table>
        </fieldset>
    </form>
<span class="text-red">プレイヤー名には「'」を使用しないで下さい。</span><br />
「'」の代用として「_」を使用してください。<br />
<span class="text-red">パスワードを変更したら必ずハッシュ値変換ボタンを押して下さい。。</span><br />
</div>

<script "text/javascript" src="../themes/js/library/md5.js"></script>
<script "text/javascript" src="../themes/js/thickboxuseadmin.js"></script>