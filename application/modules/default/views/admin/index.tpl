{include file=$header}
	<div class="option">
		<a href="updatecreate?width=500&height=255&modal=true" class="thickbox">アップデート作成</a>
		<a href="closedgamemanage">ゲームの編集</a>
		<a href="usercreate?width=500&height=255&modal=true" class="thickbox">ユーザー作成</a>
		<a href="userlist">ユーザー編集</a><br />
		
	    <a href="playerdownload">プレイヤー一括DL</a>
	    <a href="ratedownload">レート一括DL</a>
	    <a href="gamelogdownload">ゲームログ一括DL</a>
	    <a href="rateeditlogdownload">レート編集ログ一括DL</a>
	    <a href="userdownload">ユーザー一括DL</a>
	    <a href="usereditlogdownload">ユーザー編集ログ一括DL</a>
	    <a href="updatelogdownload">アップデートログ一括DL</a><br />
	    {*
	    <a href="playerupload">プレイヤー一登録</a>
	    <a href="rateupload">レート一括登録</a>
	    <a href="userupload">ユーザー一括登録</a><br />
	    *}
	</div>
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
                    <td class="text-right">{$item.created_on}</td>
                    <td>{if $item.game_status == 0}終了{elseif $item.game_status == 1}試合中{else}中止{/if}</td>
                    <td>{$item.player1_name}</td>
                    <td>{$item.player2_name}</td>
                    <td>{$item.player3_name}</td>
                    <td>{$item.player4_name}</td>
                    <td>{$item.player5_name}</td>
                    <td>{$item.player6_name}</td>
                    <td>{$item.player7_name}</td>
                    <td>{$item.player8_name}</td>
                </tr>
            {/foreach}
        </tbody>
    </table>
    
{else}
    ゲームはありません。
{/if}

{include file=$footer}