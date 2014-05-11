<script type="text/javascript">
	<!--
	var team1 = {$team1};
	var team2 = {$team2};
	
	var item = {$item};
	var now = {$now};
	var token = '{$token}';
	
	{literal}
	var idx = 0;
	$.each(team1, function(key){
		if(key == 'member_'+idx) {
			var value = this;
			$('*[name=team_1_member_'+idx+']').val(htmlEscape(value));
		}
		if(key == 'number_'+idx) {
			var value = this;
			$('*[name=team1_member_'+idx+'_member]').val(htmlEscape(value));
			idx = idx + 1;
		}
	});	
	
	idx = 0;
	$.each(team2, function(key){
		if(key == 'member_'+idx) {
			var value = this;
			$('*[name=team_2_member_'+idx+']').val(htmlEscape(value));
		}
		
		if(key == 'number_'+idx) {
			var value = this;
			$('*[name=team2_member_'+idx+'_member]').val(htmlEscape(value));
			idx = idx + 1;
		}
	});	
	
	set_info(item, now);
	$('*[name=token]').val(token);
	
;	$('#reset').click(function(){
		set_info(item, now);
	});
	
	function set_info(item, now){
		$('*[name=gamelog_id]').val(htmlEscape(item['gamelog_id']));
		$('*[name=game_start]').val(htmlEscape(item['created_on']));
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
	-->
</script>