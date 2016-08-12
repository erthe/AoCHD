{include file=$header}

<h1>月別ゲーム数を見たい年月指定</h1>
<form id="submit-yyyymm" method="post" class="form-inline text-center">
    <div class="form-group">
        <input type="text" name="yyyymm" placeholder="yyyy-mm" class="form-control" />
        <input type="hidden" name="token" value="{$token}">
        <input type="hidden" name="action_tag" value="yyyymm">
    </div>
    <div class="form-group">
        <input id="yyyymm-submit" type="button" class="btn btn-default" value="検索" />
        <input id="search-reset" type="reset" class="btn btn-default" value="初期状態に戻す" />
    </div>
</form>

<div id="showhistory"></div>

{include file=$footer}