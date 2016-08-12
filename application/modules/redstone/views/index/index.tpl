{include file="$header"}
<div class="page-header">
	<h1>ギルド妖精帝國<small>メンバー交流用サイト</small></h1>
</div>

<h2>ギルドニュース</h2>
{if $notes|@count > 0}
	<table class="table table-striped">
		<thead>
		<tr>
			<th class="date text-center">更新日</th>
			<th class="text-center">トピック</th>
			<th class="text-center">内容</th>
			{if $auth>=100}<th class="text-center">編集</th>{/if}
		</tr>
		</thead>

		<tbody class="table table-hover">
		{foreach item=item from=$notes}
			<tr>
				<td>{$item.created_on|date_format:"%Y/%m/%d"|escape}</td>
				<td>{$item.title|escape}</td>
				<td><span class="autolink">{$item.article|escape}</span></td>
				{if $auth>=100}<td class="text-center"><a id="edit-news-{$item.news_id}"><img src="themes/images/edit.png" alt="ニュース編集"></a></td>{/if}
			</tr>
		{/foreach}
		</tbody>
	</table>

	{* pagination links *}
	<div class="text-center">
		{$pages.firstItemNumber|escape} to {$pages.lastItemNumber|escape} of {$pages.totalItemCount|escape}<br />
		<ul class="pagination">
			{if $pages.current != $pages.first}
			<li><a href="?page={$pages.first|escape}"> &lt;&lt; </a>
				{/if}

				{if isset($pages.previous)}
			<li><a href="?page={$pages.previous|escape}">  &lt; </a></li>
			{/if}

			{foreach item=p from=$pages.pagesInRange}

				{if $pages.current == $p}
					<li><span>{$p|escape}</span></li>
				{else}
					<li><a href="?page={$p|escape}">  {$p} </a></li>
				{/if}
			{/foreach}

			{if isset($pages.next)}
				<li><a href="?page={$pages.next|escape}"> &gt; </a></li>
			{/if}

			{if $pages.current != $pages.last}
				<li><a href="?page={$pages.last|escape}"> &gt;&gt; </a></li>
			{/if}
		</ul>
	</div>
	<br /><br />
	{* pagination links *}

{else}
	未更新
{/if}

<hr />
<h2>今月のギルド加入者</h2>
{if $member|@count > 0}
	<table class="table table-striped">
		<thead>
		<tr>
			<th class="date">加入日</th>
			<th>加入キャラ名</th>
			<th>職業</th>
		</tr>
		</thead>

		<tbody class="table table-hover">
		{foreach item=item from=$member}
			<tr>
				<td>{$item.created_on|date_format:"%Y/%m/%d"|escape}</td>
                    <td>{$item.name|escape} <span id="profile_{$item.member_id}"><i class="glyphicon glyphicon-list-alt"></i></span></td>
				<td>{$item.class|escape}</td>
			</tr>
		{/foreach}
		</tbody>
	</table>

{else}
	今月の加入者は居ません。
{/if}

<hr />
<h2>今月のプロフィール更新者</h2>
{if $changer|@count > 0}
	<table class="table table-striped">
		<thead>
		<tr>
			<th class="date">更新日</th>
			<th>キャラ名</th>
			<th>職業</th>
		</tr>
		</thead>

		<tbody class="table table-hover">
		{foreach item=item from=$changer}
			<tr>
				<td>{$item.created_on|date_format:"%Y/%m/%d"|escape}</td>
				<td>{$item.name|escape} <span id="profile_{$item.member_id}"><i class="glyphicon glyphicon-list-alt"></i></span></td>
				<td>{$item.class|escape}</td>
			</tr>
		{/foreach}
		</tbody>
	</table>

{else}
	今月の加入者は居ません。
{/if}

<div class="panel panel-info panel-header-padding-kill col-xs-12">
    <div class="panel-heading panel-header-position">
        <h4 class="panel-title">メニュー</h4>
    </div>
    <ul class="list-group col-xs-12">
    	{if $auth >= 100}
    		<li class="list-group-item">
    			<a id="create-news"><img src="themes/images/information.png" alt="新規登録">ニュースを作成する</a>
    		</li>
	    	<li class="list-group-item">
	    		<a id="create-member"><img src="themes/images/edit.png" alt="メンバー登録">ギルドメンバーを登録する</a>
	    	</li>
    	{/if}
    	
		<li class="list-group-item">
			<a href="redstone/index/logout">ログアウトする</a>
    	</li>
   	</ul>
</div>
	
</div>
{include file="$footer"}