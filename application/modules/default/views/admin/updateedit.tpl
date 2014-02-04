<script type="text/javascript">
	<!--
	var item = {$item};
	var token = '{$token}';
	{literal}
	set_info(item);
	$('*[name=token_update]').val(token);
	
	$('#reset').click(function(){
		set_info(item);
	});
	
	function set_info(row){
		$('*[name=updatelog_id]').val(htmlEscape(item['updatelog_id']));
		$('*[name=update_note]').val(htmlEscape(item['update_note']));
		$('*[name=delete_flag_update]').val(htmlEscape(item['delete_flag']));
	}
	{/literal}
	-->
</script>