<script type="text/javascript">
	<!--
	var reloaded = {$json};
	var token = "{$token}";
	{literal}
		
	player = load_player(reloaded);
	player_name = player[0];
	player_data = player[1];
	
	$('*[name=token]').val(htmlEscape(token));
	
	$('.suggestion').each(function(idx, obj){
    	idx++;
    	var text_idx = 'text_' + idx;
		var suggest_idx = 'suggest_' + idx;
			
		$(function(){new Suggest.Local(text_idx, suggest_idx, player_name, {dispMax: 10, highlight: true});});
    });
	{/literal}
	-->
</script>