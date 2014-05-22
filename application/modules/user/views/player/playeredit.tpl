<script type="text/javascript">
	<!--
	var json_raw = {$json};
	var token = "{$token}";
	{literal}
	
	set_info(json_raw);
	$('*[name=token]').val(htmlEscape(token));
	
;	$('#reset').click(function(){
		set_info(json_raw);
	});
	
	function set_info(row){
		$('*[name=player_id_edit]').val(htmlEscape(json_raw['player_id']));
		$('*[name=steam_id_edit]').val(htmlEscape(json_raw['steam_id']));
		$('*[name=player_name_edit]').val(htmlEscape(json_raw['player_name']));
		$('*[name=rate_edit]').val(htmlEscape(json_raw['rate']));
		$('*[name=previous_rate]').val(htmlEscape(json_raw['previous_rate']));
		$('*[name=win]').val(htmlEscape(json_raw['win']));
		$('*[name=lose]').val(htmlEscape(json_raw['lose']));
		$('*[name=warn_flag_edit]').val(htmlEscape(json_raw['warn_flag']));
		$('*[name=delete_flag]').val(htmlEscape(json_raw['delete_flag']));
		$('*[name=memo_edit]').val(htmlEscape(json_raw['memo']));
	}
	{/literal}
	-->
</script>