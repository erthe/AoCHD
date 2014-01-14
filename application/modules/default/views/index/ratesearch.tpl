<div class="form-container">

    <form id="search" method="post" action="list" class="form-inline text-center">
    	<div class="form-group text-center"><input type="text" name="search_player_name" size="20" value="{$search_player_name}" placeholder="プレーヤー名" class="form-control input-sm" /></div>
        <div class="form-group text-center"><input type="text" name="search_rate" size="2"  class="form-control input-sm text-right" placeholder="レート" value="{$search_rate}" /></div>
        <div class="form-group"><input id="search_submit" type="submit" class="btn btn-default" value="検索" /></div>
        <div class="form-group"><input id="search_reset" type="reset" class="btn btn-default" value="初期状態に戻す" /></div>
    </form>

</div>
