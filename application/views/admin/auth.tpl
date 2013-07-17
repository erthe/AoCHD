{include file=$header}

{if $login == true}
    <meta http-equiv="refresh" content="500; URL=index">
{else}
    <meta http-equiv="refresh" content="5; URL=login">
{/if}

<a href="logout">ログアウトする</a>

{include file=$footer}