<script type="text/javascript">
	<!--
	var json_raw = {$json};
	{literal}
	set_info(json_raw);
	
;	$('#reset').click(function(){
		set_info(json_raw);
	});
	
	function set_info(row){
		$('*[name=player_id]').val(json_raw['player_id']);
		$('*[name=player_name]').val(json_raw['player_name']);
		$('*[name=rate]').val(json_raw['rate']);
		$('*[name=previous_rate]').val(json_raw['previous_rate']);
		$('*[name=win]').val(json_raw['win']);
		$('*[name=lose]').val(json_raw['lose']);
		$('*[name=delete_flag]').val(json_raw['delete_flag']);
		$('*[name=memo]').val(json_raw['memo']);
	}
	{/literal}
</script>