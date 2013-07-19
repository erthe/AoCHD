{include file=$header}

{if $login == true}
    <meta http-equiv="refresh" content="5; URL=index">
{else}
    <meta http-equiv="refresh" content="5; URL=login">
{/if}

<h1>login was successful.</h1><br />

<a href="index">インデックス</a><br />
<a href="logout">ログアウトする</a><br />

{include file=$footer}