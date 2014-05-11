{include file=$header}
<div class="window-container">
    <form id="versus_entry" name="versus_form" class="form-inline" method="post">
        <fieldset>
        	<legend>プレイヤー間勝率チェック</legend>
			<div class="form-group">
                <label for="writer_name" class="sr-only">対象プレイヤー</label>
               	<input type="text" name="player_name1" autocomplete="off" id="text_1" size="17" style="display: block;" placeholder="対象プレイヤー" class="form-control input-sm" autofocus />
                <div id="suggest_1" class="suggestion" name="suggest1" style="display:none;"></div>
                <input type="hidden" name="player_id1">
			</div>
			<select class="form-control" name="mode">
				<option>VS</option>
				<option>AND</option>
			</select>
			<div class="form-group">
                <label for="comment" class="sr-only">VSプレイヤー</label>
                <input type="text" name="player_name2" autocomplete="off" id="text_2" size="17" style="display: block;" placeholder="VSプレイヤー" class="form-control input-sm" />
                <div id="suggest_2" class="suggestion" name="suggest2" style="display:none;"></div>
                <input type="hidden" name="player_id2">
			</div>
        
	        <button id="versus_submit" type="button" class="btn btn-primary">送信</button>
			<input type="reset" class="btn btn-warning" value="リセット">
		</fieldset>
	</form>
</div>

<div id="versusresult"></div>
<br /><br /><br /><br />
<div class="navbar navbar-default navbar-fixed-bottom">
	<div class="navbar-header">
		<a class="navbar-brand" href="#">{$title}</a>
	</div>
	
	<p class="navbar-text pull-right">{$username}</p>
</div>
		<div class="navbar navbar-default navbar-fixed-bottom">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">{$title}</a>
			</div>
			
			<p class="navbar-text pull-right">{$username}</p>
		</div>
	</body>
	
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="../themes/js/Library/bootstrap.min.js"></script>
    <script type="text/javascript" src="../themes/js/Library/alertbox.js"></script>
    <script type="text/javascript" src="../themes/js/Library/common.js"></script>
    <script type="text/javascript" src="../themes/js/admin.js"></script>
    <script type="text/javascript" src="../themes/js/Library/suggest.js"></script>
    <script type="text/javascript" src="../themes/js/thickboxuseadmin.js"></script>
	<script type="text/javascript">
		<!--
		var json_raw = {$json};
		{literal}
		
		player = load_player(json_raw);
		player_name = player[0];
		player_data = player[1];
		
		$('.suggestion').each(function(idx, obj){
        	idx++;
        	var text_idx = 'text_' + idx;
    		var suggest_idx = 'suggest_' + idx;
    			
    		$(function(){new Suggest.Local(text_idx, suggest_idx, player_name, {dispMax: 10, highlight: true});});
    	});
    	
    	$('*[id^=suggest]').click(function() {
    		var row = $(this).attr("name").replace("suggest", "");
    		set_player_id(row, player_data);
    	});
    	
    	$('[id^=text]').blur(function(){
    		var row = $(this).attr("name").replace("player_name", "");
			set_player_id(row, player_data); 
    	});
    	
    	$('#versus_submit').click(function() {
    		versus_submit();
    	});
    	
    	function set_player_id(row, player_data){
			$('*[name=player_id'+row+']').val('');
			$.each(player_data, function(idx, obj){
				if($('*[name=player_name'+row+']').val() === player_data[idx][0]){
					$('*[name=player_id'+row+']').val(player_data[idx][2]);
					return false;
				}
			});
		}

		function versus_submit() {
			if(input_check('player_id1', 'プレイヤー1') != true) return false;
			if(input_check('player_id2', 'プレイヤー2') != true) return false;
			
			var $form = $('#versus_entry');
			var data = $form.serializeArray();
			
			submit_action('versusresult', data, 'rewrite');
		}
		// -->
		{/literal}
	</script>
</html>