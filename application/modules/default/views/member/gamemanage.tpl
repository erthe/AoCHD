{include file=$header}
{include file=$gamereport}
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
                	<td class="text-right">{$games[i].gamelog_id|escape}</td>
                    <td class="text-right">{$games[i].created_on|escape}</td>
                    <td>{$games[i].player1_name|escape}</td>
                    <td>{$games[i].player2_name|escape}</td>
                    <td>{$games[i].player3_name|escape}</td>
                    <td>{$games[i].player4_name|escape}</td>
                    <td>{$games[i].player5_name|escape}</td>
                    <td>{$games[i].player6_name|escape}</td>
                    <td>{$games[i].player7_name|escape}</td>
                    <td>{$games[i].player8_name|escape}</td>
                    <td><a href="#" id="report" name="{$games[i].gamelog_id|escape}">報告</a></td>
                    <td><a href="" id="user_cancel{$n}" name="{$games[i].gamelog_id|escape}" onclick="return false">キャンセル</a></td>
                </tr>
                {$n = $n + 1}
            {/section}
        </tbody>
    </table>
    
{else}
    現在、ゲームはありません。
{/if}

{include file=$footer}