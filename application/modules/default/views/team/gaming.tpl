<legend>ゲーム報告</legend>
<div id="gameid" class="reporting" name="{$gameid}">
	<input type="hidden" name="token_gaming" value="{$token}">
	<input type="hidden" name="action_tag_gaming" value="gaming">
	<input id="win_team1" name="{$game[0].created_on|escape}" type="submit" class="btn btn-default" value="チーム1勝利">
	<input id="win_team2" name="{$game[0].created_on|escape}" type="submit" class="btn btn-default" style="margin-left: 90px;" value="チーム2勝利"><br />
	<br />
	<input id="game_cancel" type="button" class="btn btn-default" value="キャンセル">
</div><br /><br />

<script type="text/javascript" src="../themes/js/append.js"></script>