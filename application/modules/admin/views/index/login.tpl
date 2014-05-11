{include file=$header}
<form id="login" method="post" action="../../../admin/index/auth">

    <fieldset>
        <h1 class="shadow">ホストログインフォーム</h1>

        <div>
            <label for="Login_Username">管理者名</label>
            <input id="login_username" class="field required" type="text" title="Please provide your username" name="user_name">
        </div>
        <div>
            <label for="Login_Password">パスワード</label>
            <input id="login_password" class="field required" type="password" title="Password is required" name="user_password">
        </div>
        
        {*<p class="forgot">
            <a href="#">パスワードを忘れましたか?</a>
        </p>*}

        <div class="submit">
            <button type="submit">ログイン</button>
            {*<label>
                <input id="login_remember" type="checkbox" value="yes" name="remember">
                このコンピュータにログイン情報を記憶させる
            </label>*}
        </div>
        <p class="back">
        <a href="../index/index">インデックスに戻る</a>
        </p>
        
    </fieldset>
</form>

{include file=$footer}


