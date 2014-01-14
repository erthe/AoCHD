<script type="text/javascript">
	<!--
	var user_id= {$user_id};
	var user_name= '{$user_name}';
	{literal}
	set_info(user_id, user_name);
	
;	$('#reset-changepassword').click(function(){
		set_info(user_id, user_name);
	});
	
	function set_info(user_id, user_name){
		$('*[name=user_id_password]').val(user_id);
		$('*[name=user_name_password]').val(user_name);
		$('*[name=change_password]').val('');
		$('*[name=retype]').val('');
	}
	{/literal}
</script>