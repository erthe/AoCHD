<!DOCTYPE HTML>
<html lang="ja">
<head>
  <base herf="{$base}">
  <meta http-equiv="Content-Type" content="application/json" charset="utf-8">
  <link rel="stylesheet" type="text/css" href="{$base}/themes/css/admin.css" media="all" /> 
  <link href="{$base}/themes/css/bootstrap.min.css" rel="stylesheet" media="screen" />
  <link href="{$base}/themes/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen" />
  <link rel="stylesheet" type="text/css" href="{$base}/themes/css/common.css" media="all" /> 
  <title>{$title}</title>
</head>

<body>
<h1>DateTimePickerテスト</h1>
<form id="datetime-edit" method="post">
    <fieldset>
        <div class="form-group">
            <label for=“text_field” class="col-sm-4 control-label input-append date">テキストタイプ</label>
            <div class="col-sm-8">
                <div id="text_field" class="input-group date col-xs-4">
                    <input type='text' class="form-control" name=“text_field”>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>

	<div class="form-group">
            <label for=“datetime_field” class="col-sm-4 control-label input-append date">DateTimeタイプ</label>
       	    <div class="col-sm-8">
                <div id="datetime_field" class="input-group date col-xs-4" id=“datetime_field”>
               	    <input type="datetime-local" class="form-control" name=“datetime_field”>
          	    <span class="input-group-addon">
                    	<span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
    </fieldset>
</form>
<button id="datetime_edit" type="button" class="btn btn-primary">送信</button>
<div id="data-container"></div>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script type="text/javascript" src="{$base}/themes/js/Library/bootstrap.min.js"></script>
<script type="text/javascript" src="{$base}/themes/js/Library/moment.js"></script>
<script type="text/javascript" src="{$base}/themes/js/Library/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="{$base}/themes/js/Library/bootstrap-datetimepicker.ja.js"></script>
<script type="text/javascript" src="{$base}/themes/js/Library/jquery.browser.sp.js"></script>
<script type="text/javascript" src="{$base}/themes/js/Library/jquery.dateValidate.js "></script>
<script type="text/javascript" src="{$base}/themes/js/Library/jquery.timeValidate.js"></script>
<script src="{$base}/themes/js/Library/common.js"></script>
<script>
$(function () {
    $('#text_field').datetimepicker({
        language: 'ja',
	format: 'yyyy-mm-dd hh:ii',
        pickTime: true,
    }).on('changeDate', function(ev){
        $(this).datetimepicker('hide');
    });

    $('#datetime_field').datetimepicker({
        language: 'ja',
        format: 'yyyy-mm-dd hh:ii',
        pickTime: true,
    }).on('changeDate', function(ev){
        $(this).datetimepicker('hide');
    });

});

$('#datetime_edit').click(function() {
    var $form = $('#datetime-edit');
    var data = $form.serializeArray();
console.log(data);
    submit_action('datesend', data, 'getdata');
});
</script>
</body>
</html>
