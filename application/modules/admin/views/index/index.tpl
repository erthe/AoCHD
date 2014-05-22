{include file=$header}
<h1>今日のゲーム</h1>
{if $games|@count > 0}
    <table id="cancel">
        <thead>
            <tr>
            	<th class="datetime text-center">作成時間</th>
            	<th>状態</th>
                <th>プレイヤー1</th>
                <th>プレイヤー2</th>
                <th>プレイヤー3</th>
                <th>プレイヤー4</th>
                <th>プレイヤー5</th>
                <th>プレイヤー6</th>
                <th>プレイヤー7</th>
                <th>プレイヤー8</th>
            </tr>
        </thead>

        <tbody>
            {foreach item=item from=$games}
                <tr>
                    <td class="text-right">{$item.created_on|escape}</td>
                    <td>{if $item.game_status == 0}終了{elseif $item.game_status == 1}試合中{else}中止{/if}</td>
                    <td>{$item.player1_name|escape}</td>
                    <td>{$item.player2_name|escape}</td>
                    <td>{$item.player3_name|escape}</td>
                    <td>{$item.player4_name|escape}</td>
                    <td>{$item.player5_name|escape}</td>
                    <td>{$item.player6_name|escape}</td>
                    <td>{$item.player7_name|escape}</td>
                    <td>{$item.player8_name|escape}</td>
                </tr>
            {/foreach}
        </tbody>
    </table>
    
{else}
    ゲームはありません。
{/if}
<br /><br /><br /><br />
{include file=$footer}