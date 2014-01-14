<div>
	<h1>Player: {$player_info.player_name}</h1>
	{if $rate|@count > 0}
	
	        <table id="tbl" class="table-center">
	            <thead>
	                <tr>
	                    <th class="rate text-center">レート<span id="sort_status1" class="rate""></th>
	                    <th class="number text-center">連勝/連敗数<span id="sort_status2" class="win"></th>
	                    <th class="number text-center">勝利<span id="sort_status2" class="win"></th>
	                    <th class="number text-center">敗北<span id="sort_status3" class="lose"></span></th>
	                    <th class="number text-center">連勝数<span id="sort_status2" class="win"></th>
	                    <th class="number text-center">連敗数<span id="sort_status2" class="win"></th>
	                    <th class="number text-center">レート最大値<span id="sort_status2" class="win"></th>
	                    <th class="number text-center">勝率<span id="sort_status4" class="percent"></th>
	                </tr>
	            </thead>
	            
	            <tbody>
                    <tr>
                        <td class="text-right">{$rate.rate}</td>
                        <td class="text-right">{$rate.streak}</td>
                        <td class="text-right">{$rate.win}</td>
                        <td class="text-right">{$rate.lose}</td>
                        <td class="text-right">{$rate.win_streak}</td>
                        <td class="text-right">{$rate.lose_streak}</td>
                        <td class="text-right">{$rate.max_rate}</td>
                        <td class="text-right">{$rate.percent}</td>
                    </tr>
	            </tbody>
	        </table>
	
	{else}
	    there is no-data.
	{/if}
</div>
