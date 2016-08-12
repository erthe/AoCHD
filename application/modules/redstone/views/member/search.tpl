{if $members|@count > 0}
    <span class="left-space">検索結果は{$members|@count} 人です。</span><br />
    {$i = 0}
	{foreach item=item from=$members}
		<div id="member_{$i}" class="panel panel-info panel-header-padding-kill col-xs-12 col-md-6">
			<div class="panel-heading panel-header-position">
				<span class="col-xs-10">キャラクター名: <span class="text-itaric text-bold">{$item.name|escape}</span></span>
				<span class="col-xs-2 text-right">
					{if $username == $item.name|escape}<img src="themes/images/edit.png" alt="edit" id="searched-member-{$item.member_id|escape}" />{/if}
					{if $auth >= 100}<img src="themes/images/attention.gif" alt="admin_edit" id="searched-admin-{$item.member_id|escape}" />{/if}
				</span>
			</div>
			<div class="col-xs-3" style="margin-top: 20px; text-align: center;">
				{if isset($item.image)}
					<img src="data/images/redstone/character/{$item.image}" alt="{$item.name}">
				{else}
					<img src="{$noimage}" alt="no image">
				{/if}
			</div>
			<div class="col-xs-9" style="margin-top: 20px;">
				<ul class="list-group">
					<li class="list-group-item col-xs-12">
						<span class="col-xs-4">職業</span>
						<span class="col-xs-8">{$item.class|escape}</span>
					</li>
					<li class="list-group-item col-xs-12">
						<span class="col-xs-4">称号(自称)</span>
						<span class="col-xs-8">{$item.title|escape}</span>
					</li>
					<li class="list-group-item col-xs-12">
						<span class="col-xs-4">自己紹介</span>
						<span class="col-xs-8">{$item.self_introduction|escape}</span>
					</li>
				</ul>
			</div>
		</div>
		{if $i % 2 == 1}
			<div class="col-xs-12"></div>
		{/if}
		{$i = $i + 1}

	{/foreach}
	<script>
		{literal}
		$('*[id^=searched-member]').click(function() {
			var id = $(this).attr('id').split('-');
			var data = {'id': id[2]};
			submit_action('redstone/member/changemember', data, null);
			$('#modal-window').modal();
			return false;
		});

		$('*[id^=searched-admin]').click(function() {
			var id = $(this).attr('id').split('-');
			var data = {'id': id[2]};
			submit_action('redstone/member/changeadmin', data, null);
			$('#modal-window').modal();
			return false;
		});
		{/literal}
	</script>
{else}
    ヒットしませんでした。
{/if}
