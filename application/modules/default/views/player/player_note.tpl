<h2>プレイヤーコメント</h2>
<div id="player_note">
	{if $player_note|@count > 0}
	
        <table id="tbl" class="table table-bordered">
            <thead>
                <tr>
                	<th class="playername text-center">コメンター<span id="sort_status3" class="editor_id"></th>
                	<th class="text-center">コメント内容<span id="sort_status1" class="previous_rate"></th>  
                	<th class="text-center">投稿日時<span id="sort_status0" class="created_on"></th>
                	{if $user == true}<th class="editable text-center">削除</th>{/if}
                </tr>
            </thead>
            
            <tbody>
                {$no = 1}{$n = 0}
                {foreach item=item from=$player_note}
                    <tr id="trno_{$no}" class="list">
                        <td>{$item.writer_name|escape}</td>
						<td>{$item.comment|escape}</td>
						<td class="text-right">{$item.created_on|escape}</td>
						{if $user == true}<td id="{$item.player_note_id|escape}" class="editable text-center"><span class="delete"><img src="{$base}/themes/images/delete.png" alt="delete"></span></td>{/if}
                    </tr>
                    {$no = $no + 1}
                {/foreach}
            </tbody>
        </table>
	
        {* pagination links *}
        <div class="text-center">
            {$pages3.firstItemNumber|escape} to {$pages3.lastItemNumber|escape} of {$pages3.totalItemCount|escape}<br />
			<ul class="pagination">
                {if $pages3.current != $pages3.first}
                    <li><a href="?page3={$pages3.first|escape}"> &lt;&lt; </a></li>
                {/if}

                {if isset($pages3.previous)}
                    <li><a href="?page3={$pages3.previous|escape}">  &lt; </a></li>
                {/if}

                {foreach item=p from=$pages3.pagesInRange}

                    {if $pages3.current == $p}
                        <li><span>{$p|escape}</span></li>
                    {else}
                        <li><a href="?page3={$p|escape}">  {$p|escape} </a></li>
                    {/if}
                {/foreach}

                {if isset($pages3.next)}
                    <li><a href="?page3={$pages3.next|escape}"> &gt; </a></li>
                {/if}

                {if $pages3.current != $pages3.last}
                    <li><a href="?page3={$pages3.last|escape}"> &gt;&gt; </a></li>
                {/if}
            </ul>
		</div>
	    {* pagination links *}
	
	{else}
	    there is no-data.
	{/if}
	<br />
    <h3>コメント投稿</h4>
	
    <form id="insert_comment" method="post" class="form-inline" role="form">
        <fieldset>
			<div class="form-group">
                <label for="writer_name" class="sr-only">writer_name</label>
                <input class="form-control" type="text" name="writer_name" id="writer_name" placeholder="お名前" style="width: 200px;">
			</div>
			
			<div class="form-group">
                <label for="comment" class="sr-only">comment</label>
                <input class="form-control" type="text" name="comment" id="comment" placeholder="コメント内容" style="width: 650px;">
			</div>

			<input type="hidden" name="token" value="{$token}">
			<input type="hidden" name="action_tag" value="playercomment">
        
	        <button id="update_comment" type="button" class="btn btn-primary">送信</button>
			<input type="reset" class="btn btn-warning" value="リセット">
        </fieldset>
    </form>
    <p class="help-block">運営が不適切と感じたコメントは削除される恐れがあります。あらかじめご了承下さい。</p>

</div>
<br /><br />
<script type="text/javascript">
	<!--
	playerlist = {$playerlist};
	player_id = {$playerid};
	{literal}
	{/literal}
</script>