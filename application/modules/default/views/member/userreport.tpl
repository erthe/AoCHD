<div class="window-container">

    <form id="edit-game" method="post" action="report">
        <fieldset>
            <table>
            
                <tr>
                    <td><label>ゲームID： </label></td>
                    <td><input class="text-right" type="text" readonly name="gamelog_id" name="gamelog_id" size="20" value="{$gamelog_id}"></td>
                </tr>

                <tr>
                    <td>
                    	チーム1<br />
                    	{$team1.member_0}
                    	{section name=i loop=$team1.num_member - 1}
                    		{assign var=member value=member_|cat:$smarty.section.i.iteration}
							<br />{$team1.$member}
						{/section}
                    </td>
                    
                    <td>
                    	チーム2<br />
                    	{$team2.member_0}
                    	{section name=i loop=$team2.num_member - 1}
                    		{assign var=member value=member_|cat:$smarty.section.i.iteration}
							<br />{$team2.$member}
                        {/section}
                    </td>
                </tr>
                
                <tr>
                    <td><label>ゲーム開始時間: </label></td>
                    <td><input type="text" class="text-right" name="game_start" size="20" value="{$item.created_on}"></td>
                </tr>
                
                <tr>
                    <td><label>ゲーム終了時間: </label></td>
                    <td><input type="text" class="text-right" name="game_end" size="20" value="{$now}"></td>
                </tr>

                <tr>
                    <td><label>勝利チーム: </label></td>
                    <td><select name="win_team">
                            <option value="1">チーム1</option>
                            <option value="2">チーム2</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input id="userreport_submit" type="button" value="送信"><input type="reset" value="リセット">
                		<input type="button" id="closetb" value="閉じる">
                	</td>
            </table>
        </fieldset>
    </form>

</div>
<script "text/javascript" src="../themes/js/Library/jquery.dateValidate.js"></script>
<script "text/javascript" src="../themes/js/Library/jquery.timeValidate.js"></script>
<script "text/javascript" src="../themes/js/thickboxuseadmin.js"></script>