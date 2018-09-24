{include file=$header}

<h1>配信者一覧</h1>
<form id="member-search" method="post" class="form-inline text-center">
    <div class="form-group">
        <input type="text" name="search_name" placeholder="メンバー名" class="form-control" />
    </div>
    <div class="form-group">
        <input id="search-submit" type="submit" class="btn btn-default" value="検索" />
        <input id="search-reset" type="reset" class="btn btn-default" value="初期状態に戻す" />
    </div>
</form>
{if $livers|@count > 0}
    <div id="search" class="col-xs-12">
    <table>
        <thead>
            <tr>
                <th class="text-center">IRC名</th>
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

    {* pagenation links *}
    <div class="text-center col-xs-12">
        {$pages.firstItemNumber} to {$pages.lastItemNumber} of {$pages.totalItemCount}<br />

        <ul class="pagination">
            {if $pages.current!=$pages.first}
                <li><a href="index?page={$pages.first}">&lt;&lt;</a></li>
            {/if}

            {if isset($pages.previous)}
                <li><a href="index?pages={$pages.previous}">&lt;</a></li>
            {/if}

            {foreach item=p from=$pages.pagesInRange}
                {if $pages.current==$p}
                    <li><span>{$p|escape}</span></li>
                {else}
                    <li><a href="index?page={$p}">{$p}</a></li>
                {/if}
            {/foreach}

            {if isset($pages.next)}
                <li><a href="index?page={$pages.next}">&gt;</a></li>
            {/if}

            {if $pages.current!=$pages.last}
                <li><a href="index?page={$pages.last}">&gt;&gt;</a></li>
            {/if}
        </ul>
    </div>
    {*pagination links end *}
</div>
{else}
    配信者なし
{/if}
    パスワードをわすれた方は管理者までご連絡ください。

{include file=$footer}