{include file=$header}
{include file=$status}
{include file=$menu}

<div class="wrapper">
	<div class="title">
		<h1>スキルアップロード</h1> 
	</div>
	
	<div class="form-container">
  		<form method="post"  action="skillprocess" enctype="multipart/form-data">
			<div class="form-item">
				<label>ファイル</label>
				<input type="file" name="_file"><br />
                        CSVファイルのネーミングは以下のように指定してください<br />
                        skill20130831.csv<br />
                        <span class="text-red">※注意!! CSVアップロードを行うと既存の全てのデータが初期化されます。</span>
			</div>

			<div class="form-controller">
				<input type="submit" name="_submit" value="送信">
			</div>
  		</form>
	</div>
</div>

{include file=$footer}