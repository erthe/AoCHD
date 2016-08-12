<div class="modal-content window-container">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">キャラクター画像アップロード</h4>
        キャラの画像のアップロードと確認が行えます。
    </div>
    <div class="modal-body">
        {if $image == 1}
            {$imageName}
        {/if}

        <div class="form-container">
            <form method="post" enctype="multipart/form-data" id="image_upload">
                <div class="form-item">
                    <label>ファイル</label> <input id="file-input" type="file" name="_file"><br />
                </div>

                <div class="form-controller">
                    <button id="img_upload" class="btn btn-primary">送信</button>
                </div>
            </form>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
    </div>
</div>
<script type="text/javascript" src="themes/js/common.js"></script>
<script type="text/javascript" src="themes/js/modal.js"></script>

<script>
    $('#img_upload').prop('disabled', true);
    $("#file-input").change(function(){
        inputCheck("img_upload");
    });
</script>
