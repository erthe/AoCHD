{include file="$header"}
<div class="page-header">
	<h1>交流掲示板</h1>
</div>

<div class="contents-wrapper">
	<h2>メッセージ一覧</h2>
	連絡や交流用にご利用ください。
</div>
<a id="communication_new" class="clickable"><span class="glyphicon glyphicon-pencil"></span>新規投稿する</a>

{if $communications|@count>=1}
	{$current_thread=null}
	{foreach item=item from=$communications}
		{if $item.parent_flag==1}
			{$comment_id=$item.communication_id}
			<div class="panel panel-info panel-header-padding-kill">
				<div class="panel-heading panel-header-position">
					<span class="text-itaric text-bold col-xs-10">{$item.title|escape}</span>
				</div>

				<div class="comment-wrapper">
					<div class="comment comment-speaker">
						<div class="speaker-image">
							{if isset($item.image)}
								<img src="data/images/redstone/character/{$item.image}" alt="{$item.name}">
							{else}
								<img src="{$noimage}" alt="no image">
							{/if}
						</div>

						<span class="msgspan-topleft">名前: {$item.name|escape} </span><br />
						{if $item.image_number>=1}
							<span class="msgspan-topleft">
								<a href="data/images/redstone/communication/{$item.image_name}" target="_blank"><img src="data/images/redstone/communication/thumbnail/{$item.thumbnail_name}"></a><br />
							</span>
							{/if}
						<span class="msgspan-topleft">{$item.message|escape}<br />
						<span class="msgspan-bottomright span-right">{$item.updated_on|date_format: "%Y/%m/%d %H:%M:%S"}<br />
							<span id="reply-message-{$item.communication_child_id}-{$item.communication_id}" class="glyphicon glyphicon-share-alt clickable">返信する</span>
							{if $member_id==$item.child_member_id}
								<span id="change-message-{$item.communication_child_id}" class="glyphicon glyphicon-edit clickable">編集する</span>
							{/if}
							{if $member_id==$item.child_member_id || $admin>=100}
								<span id="delete-message-{$item.communication_child_id}" class="glyphicon glyphicon-trash clickable">削除する</span>
							{/if}
						</span>
					</div>
					{$i=1}
		{elseif $item.member_id==$item.child_member_id}
				<div class="comment comment-speaker">
					<div class="speaker-image">
						{if $item.image>=1}
							<img src="data/images/redstone/character/{$item.image}" alt="{$item.name}">
						{else}
							<img src="{$noimage}" alt="no image">
						{/if}
					</div>

					<span class="msgspan-topleft">名前: {$item.name|escape} </span><br />
					{if $item.image_number>=1}
						<span class="msgspan-topleft">
							<a href="data/images/redstone/communication/{$item.image_name}" target="_blank"><img src="data/images/redstone/communication/thumbnail/{$item.thumbnail_name}"></a><br />
						</span>
					{/if}
					<span class="msgspan-topleft">{$item.message|escape}</span><br />
					<span class="msgspan-bottomright span-right">{$item.updated_on|date_format: "%Y/%m/%d %H:%M:%S"}<br />
						<span id="reply-message-{$item.communication_child_id}-{$item.communication_id}" class="glyphicon glyphicon-share-alt clickable">返信する</span>
						{if $member_id==$item.child_member_id}
							<span id="change-message-{$item.communication_child_id}" class="glyphicon glyphicon-edit clickable">編集する</span>
						{/if}
						{if $member_id==$item.child_member_id || $admin>=100}
							<span id="delete-message-{$item.communication_child_id}" class="glyphicon glyphicon-trash clickable">削除する</span>
						{/if}
					</span>
				</div>
			{$i=$i+1}
		{else}
				<div class="comment comment-response">
					<div class="response-image">
						{if isset($item.image)}
							<img src="data/images/redstone/character/{$item.image}" alt="{$item.name}">
						{else}
							<img src="{$noimage}" alt="no image">
						{/if}
					</div>

					<span class="msgspan-topleft">名前: {$item.name|escape} </span><br />
						{if $item.image_number>=1}
							<span class="msgspan-topleft">
								<a href="data/images/redstone/communication/{$item.image_name}" target="_blank"><img src="data/images/redstone/communication/thumbnail/{$item.thumbnail_name}"></a><br />
							</span>
						{/if}
					<span class="msgspan-topleft">{$item.message|escape}</span><br />
					<span class="msgspan-bottomright span-right">{$item.updated_on|date_format: "%Y/%m/%d %H:%M:%S"}<br />
						<span id="reply-message-{$item.communication_child_id}-{$item.communication_id}" class="glyphicon glyphicon-share-alt clickable">返信する</span>
						{if $member_id==$item.child_member_id}
							<span id="change-message-{$item.communication_child_id}" class="glyphicon glyphicon-edit clickable">編集する</span>
						{/if}
						{if $member_id==$item.child_member_id || $admin>=100}
							<span id="delete-message-{$item.communication_child_id}" class="glyphicon glyphicon-trash clickable">削除する</span>
						{/if}
					</span>
				</div>
			{$i=$i+1}
		{/if}
		{if $comment_id!=$item.communication_id || $i>=$item.message_number}
				</div>
				{if $member_id==$item.member_id || admin>=100}
					<span id="delete-message-{$item.communication_id}" class="glyphicon glyphicon-trash clickable">スレッドを削除する</span>
				{/if}
			</div>
		{/if}
	{/foreach}
{/if}

{include file="$footer"}