<div class="modal-content window-container">
    <div class="modal-header">
        <button type="button" class="close" name="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">メンバープロフィール</h4>
        ギルドメンバーのプロフィールを表示します。
    </div>
    <div class="modal-body">
        <div class="panel panel-info panel-header-padding-kill col-xs-12">
            <div class="panel-heading panel-header-position">
                <span class="col-xs-10">キャラクター名: <span class="text-itaric text-bold">{$item.name|escape}</span></span>
            </div>

            <div class="col-xs-3" style="margin-top: 20px; text-align: center;">
                {if isset($item.image)}
                    <img src="data/images/redstone/character/{$item.image}" alt="{$item.name}">
                {else}
                    <img src="{$noimage}" alt="no image">
                {/if}
            </div>
            <div class="col-xs-9" style="margin-top: 20px;">
                <ul class="list-group">
                    <li class="list-group-item col-xs-12">
                        <span class="col-xs-4">職業</span>
                        <span class="col-xs-8">{$item.class|escape}</span>
                    </li>
                    <li class="list-group-item col-xs-12">
                        <span class="col-xs-4">称号(自称)</span>
                        <span class="col-xs-8">{$item.title|escape}</span>
                    </li>
                    <li class="list-group-item col-xs-12">
                        <span class="col-xs-4">自己紹介</span>
                        <span class="col-xs-8">{$item.self_introduction|escape}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-default" name="close" data-dismiss="modal">閉じる</button>
    </div>
</div>
