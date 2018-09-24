{include file=$header}
<link rel="stylesheet" href="http://aochd.jp/themes/js/Library/morris/morris.css">
<link rel="stylesheet" href="http://aochd.jp/themes/css/bootstrap-datepicker3.standalone.min.css">
<h1>プレイヤー名: <span class="text-italic">{$player_name}</span></h1>
<div class="window-container">
    <h2>{$title}</h2>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script src="http://aochd.jp/themes/js/Library/morris/morris.min.js"></script>
	<div id="myfirstchart" style="height: 250px;">
		<script language="JavaScript">
			var rate_data = {$rate_data};
			// get average from target player's rate transition
			var elementNum = 0;
			for (var i in rate_data){
				elementNum++;
			}
			
			var last_date = new Date(rate_data[0]['created_on']);
			var first_date = new Date(rate_data[elementNum - 1]['created_on']);
			
			var row = elementNum;
			var max_rate = 0;
			var min_rate = rate_data[0]['rate'];
			
			for (var j=0; j<elementNum; j++){
				if(rate_data[j]['rate'] > max_rate){
					max_rate = rate_data[j]['rate'];
				} else if(rate_data[j]['rate'] < min_rate){
					min_rate = rate_data[j]['rate'];
				}
			}
		
			new Morris.Line({
				element: 'myfirstchart',       // idで使用する文字列
				data: rate_data,  // 加工したjsonデータ
				xkey: 'created_on',              // x軸
				ykeys: ['rate'],              // y軸
				ymax: max_rate,
				ymin: min_rate,
				labels: ['レート']            // ラベル
			});
			
		</script>
	</div>
	<form action="/player/rategraph" method="get" class="form-inline" id="submit">
        <fieldset>
        	<legend>期間指定</legend>
			<div class="form-group col-xs-2">
				<div class="input-group date col-xs-12 datepicker" data-provide="datepicker">
					<label for="start_date" class="sr-only">レート表示開始日</label>
					<input type="text" name="start_date" autocomplete="off" placeholder="レート表示開始日" class="form-control input-sm" />
					<div class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
					</div>
				</div>
			</div>
			<div class="form-group col-xs-2">
                <div class="input-group date col-xs-12 datepicker" data-provide="datepicker">
					<label for="end_date" class="sr-only">レート表示終了日</label>
					<input type="text" name="end_date" autocomplete="off" placeholder="レート表示終了日" class="form-control input-sm" />
					<div class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
					</div>
				</div>
			</div>
			<input type="hidden" name="player_id" value="{$player_id}">
	        <button id="date_submit" type="button" class="btn btn-primary">送信</button>
			<input type="reset" class="btn btn-warning" value="リセット">
		</fieldset>
	</form>
	<script src="http://aochd.jp/themes/js/Library/bootstrap-datepicker.min.js"></script>
	<script src="http://aochd.jp/themes/js/Library/bootstrap-datepicker.ja.min.js" charset="UTF-8"></script>
	<script language="JavaScript">
		$('.datepicker').datepicker({
			    format: "yyyy-mm-dd",
				startView: 2,
				todayBtn: "linked",
				language: "ja",
				orientation: "bottom auto",
				autoclose: true,
				todayHighlight: true
		});
		
		$('*[name=start_date]').val(getNowYMD(first_date));
		$('*[name=end_date]').val(getNowYMD(last_date));
		$('#date_submit').on('click', function() {
			$('#submit').submit();
		});
		
		function getNowYMD(input_date){
			var y = input_date.getFullYear();
			var m = ("00" + (input_date.getMonth()+1)).slice(-2);
			var d = ("00" + input_date.getDate()).slice(-2);
			var result = y + '-' + m + '-' + d;
			return result;
		}
	</script>
</div>

{include file =$footer}