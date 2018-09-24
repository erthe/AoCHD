<table>
	<thead>
	<tr>
		<th class="text-center">配信者</th>
		<th class="text-center">配信媒体</th>
		<th class="text-center">URL</th>
		<th class="text-center">編集</th>
		<th class="text-center" style="width: 110px;">パスワード変更</th>
		<th class="text-center">削除</th>
		{if $user == true}<th class="text-center" style="width: 110px;">パスワード初期化</th>{/if}
	</tr>
	</thead>

	<tbody>
	{$n = 0}
	{foreach item=item from=$livers}
		<tr>
			<td>{$item.name|escape}</td>
			<td>{$item.live_type}</td>
			<td>{if $item.live_type === 'CaveTube'}<a href="https://www.cavelis.net/user/{$item.stream_id}" target="_blank">https://www.cavelis.net/user/{$item.stream_id}</a>{elseif $item.live_type === 'Twitch'}<a href="http://www.twitch.tv/{$item.stream_id}" target="_blank">http://www.twitch.tv/{$item.stream_id}</a>{elseif $item.live_type === 'Mixer'}<a href="https://mixer.com/{$item.stream_id}" target="_blank">https://mixer.com/{$item.stream_id}</a>{elseif $item.live_type === 'YouTube'}<a href="https://www.youtube.com/channel/{$item.stream_id}" target="_blank">https://www.youtube.com/channel/{$item.stream_id}</a>{/if}</td>
			<td class="editable text-center"><a id="stream_edit_{$item.id|escape}"><img src="{$base}/themes/images/edit.png" alt="edit"></a></td>
			<td class="editable text-center"><a id="stream_password_{$item.id|escape}"><i class="glyphicon glyphicon-lock"></i></a></td>
			<td class="editable text-center"><a id="stream_delete_{$item.id|escape}"><img src="{$base}/themes/images/delete.png" alt="delete"></a></td>
			{if $user == true}<td class="editable text-center"><a id="init_password_{$item.id|escape}"><i class="glyphicon glyphicon-file"></i></a></td>{/if}
		</tr>
	{/foreach}
	</tbody>
</table>

<script>
	{literal}
	$('#search-submit').click(function() {
		if (input_check('search_name', '配信者名') != true) return false;

		var $form = $('#member-search');
		var data = $form.serializeArray();

		submit_action('search', data, 'rewrite');
		return false;
	});

	$('#search-reset').click(function() {
		location.reload();
	});

	$("*[id^=stream_edit]").on('click', function() {
		var id = $(this).attr('id').split('_');
		var data = {'id': id[2]};
		submit_action('password', {'id': data, 'mode': 'edit'}, null);
		$('#modal-window').modal();
		return false;
	});

	$("*[id^=stream_delete]").on('click', function() {
		var id = $(this).attr('id').split('_');
		var data = {'id': id[2]};
		submit_action('password', {'id': data, 'mode': 'delete'}, null);
		$('#modal-window').modal();
		return false;
	});

	$("*[id^=stream_password]").on('click', function() {
		var id = $(this).attr('id').split('_');
		var data = {'id': id[2]};
		submit_action('password', {'id': data, 'mode': 'password'}, null);
		$('#modal-window').modal();
		return false;
	});

	$("*[id^=init_password]").on('click', function() {
		var id = $(this).attr('id').split('_');
		data = {'id': id[2]};
		jConfirm('パスワードを初期化しますか?', '確認', function(r) {
			if (r === true) {
				submit_action('initpassword', data, null);
				$('#modal-window').modal();
				return false;
			} else {
				jAlert('はい。', '結果');
			}

		});
		return false;
	});
	{/literal}
</script>