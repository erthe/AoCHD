{include file=$header}

<h1>部屋一覧</h1>

{if $games|@count > 0}
    <table>
        <thead>
            <tr>
            	<th>作成時間</th>
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
                    <td>{$item.created_on}</td>
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
    現在、ゲームはありません。
{/if}

{if $notes|@count > 0}
    <table>
        <thead>
            <tr>
            	<th class="text-center">更新日</th>
                <th class="text-center">更新内容</th>
            </tr>
        </thead>

        <tbody>
            {section name=i loop=$notes step=-1}
                <tr>
                    <td>{$notes[i].update_date|date_format:"%Y/%m/%d"}</td>
                    <td>{$notes[i].update_note}</td>
                </tr>
            {/section}
        </tbody>
    </table>
{else}
    未更新
{/if}

{include file=$footer}