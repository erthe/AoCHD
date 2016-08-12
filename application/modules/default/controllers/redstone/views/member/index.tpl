{if $member|@count > 0}
    <a id="how_edit_info" class="left-space">自分の情報の編集方法</a><br />
    <span class="left-space">現在のメンバー数は{$member|@count} 人です。</span><br />
    <div class="col-xs-12">
        {$i = 0}
        {foreach item=item from=$member}
            <div id="member_{$i}" class="panel panel-info panel-header-padding-kill col-xs-12 col-md-6">
                <div class="panel-heading panel-header-position">
                    <span class="col-xs-10">キャラクター名: <span class="text-itaric text-bold">{$item.name|escape}</span></span>
					<span class="col-xs-2 text-right">
						{if $name == $item.name|escape}<img src="themes/images/edit.png" alt="edit" id="edit_{$item.member_id|escape}" />{/if}
                        {if $admin >= 100}<img src="themes/images/attention.gif" alt="admin_edit" id="edit_{$item.member_id|escape}" />{/if}
					</span>
                </div>
                <div class=col-xs-4">
                    <img src="themes/images/redstone/{$member.image_name}"
                </div>
                <ul class="list-group col-xs-8">
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
            {if $i % 2 == 1}
                <div class="col-xs-12"></div>
            {/if}
            {$i = $i + 1}
        {/foreach}
    </div>
{else}
    現在、ギルド加入者は居ません。
{/if}