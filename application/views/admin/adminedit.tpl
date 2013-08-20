<div class="window-container">

    <form id="edit" method="post" action="adminupdate">
        <fieldset>
            <table>
            
                <tr>
                    <td><label>ID： </label></td>
                    <td><input class="text-right" type="text" readonly size="40" value="{$item.admin_id}"></td>
                </tr>
                
                <tr>
                    <td><label>管理者名: </label></td>
                    <td><input type="text" name="admin_name" size="40" value="{$item.admin_name}"></td>
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
                    <td>
                    	<input type="hidden" name="original_name" value="{$item.admin_name}">
                        <input type="hidden" name="admin_id" value="{$item.admin_id}">
                        <input id="submit_update" type="submit" value="送信"><input type="reset" value="リセット"></td>
                </tr>
                                
                <tr>
                	<td colspan="2">
                		<input type="button" id="closetb" value="閉じる">
                		パスワード変更時はハッシュ値変換ボタンを押してください。
                	</td>
                </tr>
            </table>
        </fieldset>
    </form>

</div>
<script "text/javascript" src="../themes/js/library/md5.js"></script>
<script "text/javascript" src="../themes/js/thickboxuseadmin.js"></script>