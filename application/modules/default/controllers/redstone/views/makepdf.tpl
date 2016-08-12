<!DOCTYPE HTML>
<html lang="ja">
<head>
	<base href="{$base}">
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
	<link rel="stylesheet" type="text/css" href="themes/css/mpdf.css" media="all" /> 
	<link href="themes/css/bootstrap.min.css" rel="stylesheet" media="screen" />
	<link rel="stylesheet" type="text/css" href="themes/css/common.css" media="all" /> 
	<title>{$title}</title>
</head>
<body>
{if $participants|@count > 1}
	<table class="table-center" border="1">
        <thead>
            <tr>
				<th>呼ばれ方</th>
                <th class="screenname">スクリーンネーム</th>
                <th>趣味</th>
                <th>自己紹介</th>
            </tr>
        </thead>

		<tbody>
      	{foreach item=item from=$participants}
			<tr>
				<td>{$item.entry_name|escape}</td>
				<td>{if $item.show_flag == 1}{$item.screen_name|escape}{else}非公開{/if}</td>
				<td>{$item.interest|escape}</td>
				<td>{$item.self_introduction|escape}</td>
			</tr>
		{/foreach}
	</table>
{else}
    現在、お茶会参加者は居ません。
{/if}
</body>
</html>	