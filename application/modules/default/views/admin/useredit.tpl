<script type="text/javascript">
	<!--
	var item = {$item};
	{literal}
	set_info(item);
	
;	$('#reset').click(function(){
		set_info(item);
	});
	
	function set_info(row){
		$('*[name=user_id]').val(item['user_id']);
		$('*[name=user_name]').val(item['user_name']);
		$('*[name=user_password]').val(item['user_password']);
		$('*[name=user_control]').val(item['user_control']);
		$('*[name=delete_flag]').val(item['delete_flag']);
	}
	{/literal}
</script>