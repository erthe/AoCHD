{include file=$header}

{if $login == true}
    <meta http-equiv="refresh" content="5; URL=index">
{else}
    <meta http-equiv="refresh" content="5; URL=login">
{/if}

<h1>{$result}</h1><br />

{if $login == true}
    <a href="../member/index">管理画面へ</a><br />
    <a href="../admin/index">鯖管理専用ページヘ<a><br />
    <a href="logout">ログアウトする</a><br />
{else}
    <a href="login">ログイン画面へ</a>
{/if}


{include file=$footer}