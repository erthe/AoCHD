<h2>レート遷移図</h2>
<link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
<div id="myfirstchart" style="height: 250px;">
    <script language="JavaScript">
    	var rate_data = {$player_transition};
    	// get average from target player's rate transition
		var elementNum = 0;
		for (var i in rate_data){
			elementNum++;
		}
		
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