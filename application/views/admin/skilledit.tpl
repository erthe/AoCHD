<div class="window-container">

    <form id="edit" method="post" action="skillupdate">
        <fieldset>
            <table>
            
                <tr>
                    <td><label>ID： </label></td>
                    <td><input class="text-right" type="text" readonly size="40" value="{$item.skill_id}"></td>
                </tr>
                
                <tr>
                    <td><label>スキル名</label></td>
                    <td><input type="text" name="skill_name" size="40" value="{$item.skill_name}"></td>
                </tr>
                
                <tr>
                    <td><label>説明: </label></td>
                    <td><input type="text" name="description" size="40" value="{$item.description}"></td>
                </tr>
                
                <tr>
                    <td>
                    	<input type="hidden" name="original_name" value="{$item.skill_name}">
                        <input type="hidden" name="skill_id" value="{$item.skill_id}">
                        <input id="submit_update" type="submit" value="送信"><input type="reset" value="リセット"></td>
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