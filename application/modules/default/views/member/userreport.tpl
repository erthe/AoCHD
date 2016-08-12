<script type="text/javascript">
	<!--
	var team1 = {$team1};
	var team2 = {$team2};
	
	var item = {$item};
	var now = {$now};
	var token = {$token}
	
	{literal}
	$('#team1').html('');
	$('#team2').html('');
	var idx = 0;
	$.each(team1, function(key){
		if(key != 'num_member') {
			var value = this;
			var member1 = $('#team1').html() + htmlEscape(value) + '<br />';
			$('#team1').html(member1);
			idx = idx + 1;
		}
	});	
	
	idx = 0;
	$.each(team2, function(key){
		if(key != 'num_member') {
			var value = this;
			var member2 = $('#team2').html() + htmlEscape(value) + '<br />';
			$('#team2').html(member2);
			idx = idx + 1;
		}
	});	
	
	set_info(item, now);
	$('*[name=token]').val(token);
	
	$('#reset_gamelog').click(function(){
		set_info(item, now);
	});
	
	function set_info(item, now){
		$('*[name=gamelog_id]').val(htmlEscape(item['gamelog_id']));
		$('*[name=game_start]').val(htmlEscape(item['created_on']));
		$('*[name=game_end]').val(now);
	}
	{/literal}
	-->
</script>