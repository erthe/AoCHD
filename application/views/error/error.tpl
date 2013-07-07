{*
<div class="error-container">
	<div id="title-block">
		<h1>{$title}</h1>
	</div>

	<div class="title">{$message}</div>
	<div class="place">
		<a href="#">{$place}</a>
		<div>{$trace|nl2br}</div>
	</div>
</div>
*}

<html>
<head><title>エラー発生</title></head>
<body>
<h2>エラー発生！</h2>
エラーの種類：<?php echo $this->escape($this->errortype);?>
</body>
</html>