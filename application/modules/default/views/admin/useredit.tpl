<script type="text/javascript">
	<!--
	var item = {$item};
	var token = '{$token}';
	{literal}
	set_info(item);
	$('*[name=token]').val(token);
	
	$('#reset').click(function(){
		set_info(item);
	});
	
	function set_info(row){
		$('*[name=user_id]').val(htmlEscape(item['user_id']));
		$('*[name=user_name]').val(htmlEscape(item['user_name']));
		$('*[name=user_password]').val(htmlEscape(item['user_password']));
		$('*[name=user_control]').val(htmlEscape(item['user_control']));
		$('*[name=delete_flag]').val(htmlEscape(item['delete_flag']));
		$('*[name=token]').val(htmlEscape(item['token']));
	}
	{/literal}
	-->
</script>