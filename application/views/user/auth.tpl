{include file=$header}

{if $login == true}
    <meta http-equiv="refresh" content="5; URL=index">
{else}
    <meta http-equiv="refresh" content="500; URL=login">
{/if}

<h1>{$result}</h1><br />

{if $login == true}
    <a href="index">インデックス</a><br />
    <a href="logout">ログアウトする</a><br />
{else}
    <a href="login">ログイン画面へ</a>
{/if}


{include file=$footer}