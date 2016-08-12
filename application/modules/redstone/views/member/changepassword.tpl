<div class="modal-content window-container">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times</button>
        <h4 class="modal-title">パスワード変更</h4>
    </div>

    <div class="modal-body">
        <form id="password-edit">
            <fieldset>
                <div class="form-group">
                    <label for="password" class="col-sm-4 control-label">パスワード入力</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="password" name="password" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="retype" class="col-sm-4 control-label">パスワード再入力</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="password" name="retype" />
                    </div>
                </div>

                <div class="pull-right col-sm-2">
                    <input type="reset" class="btn btn-warning" value="リセット">
                </div>
                <input type="hidden" name="token" value="{$token}">
                <input type="hidden" name="action_tag" value="password">
            </fieldset>
        </form>
    </div>

    <div class="modal-footer">
        <button id="edit_password" type="button" class="btn btn-primary">送信</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
    </div>

</div>

<script type="text/javascript" src="{$base}/themes/js/redstone_modal.js"></script>