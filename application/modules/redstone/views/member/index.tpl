{include file="$header"}
{if $members|@count > 0}
    <a id="how_edit_info" class="left-space">自分の情報の編集方法</a><br />
    <span class="left-space">現在のメンバー数は{$member} 人です。</span><br />

	<form id="member-search" method="post" class="form-inline text-center">
		<div class="form-group">
			<input type="text" name="search_name" placeholder="メンバー名" class="form-control" />
		</div>
		<div class="form-group">
			<input id="search-submit" type="submit" class="btn btn-default" value="検索" />
			<input id="search-reset" type="reset" class="btn btn-default" value="初期状態に戻す" />
		</div>
	</form>

    <div id="data-container" class="col-xs-12">
        {$i = 0}
        {foreach item=item from=$members}
            <div id="member_{$i}" class="panel panel-info panel-header-padding-kill col-xs-12 col-md-6">
                <div class="panel-heading panel-header-position">
                    <span class="col-xs-10">キャラクター名: <span class="text-itaric text-bold">{$item.name|escape}</span></span>
					<span class="col-xs-2 text-right">
						{if $username == $item.name|escape}<img src="themes/images/edit.png" alt="edit" id="edit-member-{$item.member_id|escape}" />{/if}
                        {if $auth >= 100}<img src="themes/images/attention.gif" alt="admin_edit" id="edit-admin-{$item.member_id|escape}" />{/if}
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

		{* pagenation links *}
		<div class="text-center col-xs-12">
			{$pages.firstItemNumber} to {$pages.lastItemNumber} of {$pages.totalItemCount}<br />

			<ul class="pagination">
				{if $pages.current!=$pages.first}
					<li><a href="redstone/member/index?page={$pages.first}">&lt;&lt;</a></li>
				{/if}

				{if isset($pages.previous)}
					<li><a href="redstone/member/index?pages={$pages.previous}">&lt;</a></li>
				{/if}

				{foreach item=p from=$pages.pagesInRange}
					{if $pages.current==$p}
						<li><span>{$p|escape}</span></li>
					{else}
						<li><a href="redstone/member/index?page={$p}">{$p}</a></li>
					{/if}
				{/foreach}

				{if isset($pages.next)}
					<li><a href="redstone/member/index?page={$pages.next}">&gt;</a></li>
				{/if}

				{if $pages.current!=$pages.last}
					<li><a href="redstone/member/index?page={$pages.last}">&gt;&gt;</a></li>
				{/if}
			</ul>
		</div>
		{*pagination links end *}
    </div>
{else}
    現在、ギルド加入者は居ません。
{/if}
{include file="$footer"}