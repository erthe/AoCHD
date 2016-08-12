{include file="$header}"}
<div class="modal-content window-container">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">キャラクター画像アップロード</h4>
        キャラの画像のアップロードと確認が行えます。
    </div>
    <div class="modal-body">
        <div class="form-container">
            <form method="post" enctype="multipart/form-data" action="imageprocess">
                <div class="form-item">
                    <legend>画像ファイルを選択(GIF, JPEG, PNGのみ対応)</legend>
                    <label>ファイル</label> <input id="file-input" type="file" name="_file"><br />
                    <input type="hidden" name="token" value="{$token}">
                    <input type="hidden" name="action_tag" value="image_upload">
                </div>

                <div class="form-controller">
                    <button id="img-upload" class="btn btn-primary">送信</button>
                </div>
            </form>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
    </div>
</div>
<script type="text/javascript" src="themes/js/redstone_modal.js"></script>

<script>
    $('#img-upload').prop('disabled', true);
    $("#file-input").on('change', function(){
        $("#img-upload").prop('disabled', false);
    });
</script>

{include file="{$footer}"}