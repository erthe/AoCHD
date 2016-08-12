<div class="page-header">
	<h1>ギルド妖精帝國<small>メンバー交流用サイト</small></h1>
</div>

<h2>ギルドニュース</h2>
{if $notes|@count > 0}
	<table>
		<thead>
		<tr>
			<th class="date text-center">更新日</th>
			<th class="text-center">更新内容</th>
		</tr>
		</thead>

		<tbody>
		{foreach item=item from=$notes}
			<tr>
				<td>{$item.update_date|date_format:"%Y/%m/%d"|escape}</td>
				<td><span class="autolink">{$item.update_note|escape}</span></td>
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
	<table>
		<thead>
		<tr>
			<th class="date text-center">加入日</th>
			<th class="text-center">加入キャラ名</th>
		</tr>
		</thead>

		<tbody>
		{foreach item=item from=$notes}
			<tr>
				<td>{$item.created_date|date_format:"%Y/%m/%d"|escape}</td>
				<td><{$item.name|escape}</td>
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
    	{if $admin >= 100}
    		<li class="list-group-item">
    			<a id="create_news"><img src="themes/images/information.png" alt="新規登録">ニュースを作成する</a>
    		</li>
	    	<li class="list-group-item">
	    		<a id="create_member"><img src="themes/images/edit.png" alt="お茶会終了">ギルドメンバーを登録する</a>
	    	</li>
    	{/if}
    	
		<li class="list-group-item">
			<a href="teaparty/index/logout">ログアウトする</a>
    	</li>
   	</ul>
</div>
	
</div>
