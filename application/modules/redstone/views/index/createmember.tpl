<div class="modal-content">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	    <h4 class="modal-title">ギルドメンバー情報編集</h4>
	</div>
	
	<div class="modal-body">
	    <form id="edit-member" class="form-horizontal" method="post">
	        <fieldset>
				<div class="form-group">
                    <label for="name" class="col-sm-3 control-label">キャラクター名</label>
                    <div class="col-sm-9">
                    	<input type="text" class="form-control" name="name" maxrength="255"  value="{$member.name|escape}" autofocus/>
	                </div>
                </div>

				<div class="form-group">
					<label for="class" class="col-sm-3 control-label">職業</label>
					<div class="col-sm-9">
						<select class="form-control" name="class">
							<option value="剣士/戦士">剣士/戦士</option>
							<option value="ランサー/アーチャー">ランサー/アーチャー</option>
							<option vlaue="ウィザード/ウルフマン">ウィザード/ウルフマン</option>
							<option value="ビショップ/追放天使">ビショップ/追放天使</option>
							<option value="ビーストテイマー/サマナー">ビーストテイマー/サマナー</option>
							<option value="シーフ/武道家">シーフ/武道家</option>
							<option value="プリンセス/リトルウィッチ">プリンセス/リトルウィッチ</option>
							<option value="ネクロマンサー/悪魔">ネクロマンサー/悪魔</option>
							<option value="霊術師/闘士">霊術師/闘士</option>
							<option value="光奏師/獣人">光奏師/獣人</option>
							<option value="メイド/黒魔術師">メイド/黒魔術師</option>
						</select>
					</div>
				</div>

				<div class="form-group">
                    <label for="title" class="col-sm-3 control-label">名称(自称)</label>
                    <div class="col-sm-9">
                    	<input type="text" class="form-control" name="title" maxlength="255"  value="{$member.screen_name|escape}">
	                </div>
                </div>
                
                <div class="form-group">
                    <label for="self_introduction" class="col-sm-3 control-label">自己紹介: </label>
                    <div class="col-sm-9">
                    	<textarea id='memo' class="form-control" name="self_introduction" rows="5" cols="45" wrap="soft">{$member.self_introduction|escape}</textarea>
					</div>
				</div>

				<div class="form-group">
					<label for="auth" class="col-sm-3 control-label">権限</label>
					<div class="col-sm-9">
						<select class="form-control" name="auth">
							<option value="10">一般ギルドメンバー</option>
							<option value="50">名誉一般ギルドメンバー</option>
							<option value="100">副ギルドマスター</option>
							<option value="110">ギルドマスター</option>
							<option value="120">システム管理者</option>
						</select>
					</div>
				</div>
				
				<div class="form-group">
                	<div class="pull-right col-sm-2"><input type="reset" class="btn btn-warning" value="リセット"></div>
                </div>
                <input type="hidden" name="token" value="{$token}">
				<input type="hidden" name="action_tag" value="guild_member">
	        </fieldset>
	    </form>
    </div>
    
    <div class="modal-footer">
		<button id="member_update" type="button" class="btn btn-primary">送信</button>
		<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
	</div>
</div>
<script type="text/javascript" src="themes/js/redstone_modal.js"></script>