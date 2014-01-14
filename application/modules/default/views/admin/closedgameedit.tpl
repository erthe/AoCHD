<script type="text/javascript">
	<!--
	var team1 = {$team1};
	var team2 = {$team2};
	
	var item = {$item};
	var now = {$now};
	
	{literal}
	$('#team1').html('');
	$('#team2').html('');
	var idx = 0;
	$.each(team1, function(key){
		if(key != 'num_member') {
			var value = this;
			var member1 = $('#team1').html() + value + '<br />';
			$('#team1').html(member1);
			idx = idx + 1;
		}
	});	
	
	idx = 0;
	$.each(team2, function(key){
		if(key != 'num_member') {
			var value = this;
			var member2 = $('#team2').html() + value + '<br />';
			$('#team2').html(member2);
			idx = idx + 1;
		}
	});	
	
	set_info(item, now);
	
;	$('#reset').click(function(){
		set_info(item, now);
	});
	
	function set_info(item, now){
		$('*[name=gamelog_id]').val(item['gamelog_id']);
		$('*[name=game_start]').val(item['created_on']);
		$('*[name=game_end]').val(now);
		if(item['game_status'] == 0) {
			if(item['win_team'] == 1) {
				$('*[name=game_status]').val('1');
			} else {
				$('*[name=game_status]').val('2');
			}
		} else if(item['game_status'] == 1) {
			$('*[name=game_status]').val('0');
		} else if(item['game_status'] == 2) {
			$('*[name=game_status]').val('3');
		}
	}
	{/literal}
</script>