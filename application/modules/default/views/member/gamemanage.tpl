{include file=$header}

<h1>管理者用部屋一覧</h1>

{if $games|@count > 0}
    <table id="usercancel">
        <thead>
            <tr>
            	<th class="text-center">ゲームID</th>
            	<th class="datetime text-center">作成時間</th>
                <th>プレイヤー1</th>
                <th>プレイヤー2</th>
                <th>プレイヤー3</th>
                <th>プレイヤー4</th>
                <th>プレイヤー5</th>
                <th>プレイヤー6</th>
                <th>プレイヤー7</th>
                <th>プレイヤー8</th>
                <th class="userreport">報告</th>
              	<th class="usercancel">キャンセル</th>
            </tr>
        </thead>

        <tbody>
        {$n=0}
            {section name=i loop=$games step=-1}
                <tr>
                	<td class="text-right">{$games[i].gamelog_id}</td>
                    <td class="text-right">{$games[i].created_on}</td>
                    <td>{$games[i].player1_name}</td>
                    <td>{$games[i].player2_name}</td>
                    <td>{$games[i].player3_name}</td>
                    <td>{$games[i].player4_name}</td>
                    <td>{$games[i].player5_name}</td>
                    <td>{$games[i].player6_name}</td>
                    <td>{$games[i].player7_name}</td>
                    <td>{$games[i].player8_name}</td>
                    <td><a href="userreport/gamelog_id/{$games[i].gamelog_id}?width=255&height=200&modal=true" class="thickbox">報告</a></td>
                    <td><a href="" id="user_cancel{$n}" name="{$games[i].gamelog_id}" onclick="return false">キャンセル</a></td>
                </tr>
                {$n = $n + 1}
            {/section}
        </tbody>
    </table>
    
{else}
    現在、ゲームはありません。
{/if}

<div class="option">
    <a href="index">管理画面へ</a>
</div>

{include file=$footer}