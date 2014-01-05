<div class="form-container">

    <form id="search" method="post" action="list">
        <fieldset>
        	<table class="table-center">
            
                <tr>
                    <td><label>プレイヤー名: </label><input type="text" name="search_player_name" size="10" value="{$search_player_name}"></td>
                    <td><label>レート: </label><input type="text" name="search_rate" size="10" value="{$search_rate}"></td>
                    <td>
            			<input id="search_submit" type="submit" value="検索">
            			<input id="search_reset" type="reset" value="初期状態に戻す">
            		</td>
                </tr>
            </table>
        </fieldset>
    </form>

</div>
