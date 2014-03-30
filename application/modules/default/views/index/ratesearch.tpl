<div class="form-container">

    <form id="search" method="post" class="form-inline text-center">
    	<div class="form-group">
	    	<div class="form-group text-center"><input type="text" name="search_player_name" size="20" value="{$search_player_name}" placeholder="プレーヤー名" class="form-control input-sm" /></div>
	        <div class="form-group text-center"><input type="text" name="search_rate_up" size="7"  class="form-control input-sm text-right" placeholder="最低レート" value="{$search_rate_up}" /></div>
	        <div class="form-group text-center"><input type="text" name="search_rate_down" size="7"  class="form-control input-sm text-right" placeholder="最高レート" value="{$search_rate_down}" /></div>
	        <div class="form-group text-center"><input type="text" name="search_game_number" size="8"  class="form-control input-sm text-right" placeholder="最低ゲーム数" value="{$search_game_number}" /></div>
        </div>
        <br />
        <div class="form-group search-button">
        	<input id="search_submit" type="submit" class="btn btn-default" value="検索" />
        	<input id="search_reset" type="reset" class="btn btn-default" value="初期状態に戻す" />
       	</div>
    </form>

</div>
