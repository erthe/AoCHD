<div class="modal-content">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	    <h4 class="modal-title">ギルドメンバー情報編集</h4>
	</div>
	
	<div class="modal-body">
	    <form id="admin-edit" class="form-horizontal" method="post">
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
							<option value="剣士/戦士" {if $member.class=="剣士/戦士"}selected{/if}>剣士/戦士</option>
							<option value="ランサー/アーチャー" {if $member.class=="ランサー/アーチャー"}selected{/if}>ランサー/アーチャー</option>
							<option vlaue="ウィザード/ウルフマン" {if $member.class=="ウィザード/ウルフマン"}selected{/if}>ウィザード/ウルフマン</option>
							<option value="ビショップ/追放天使" {if $member.class=="ビショップ/追放天使"}selected{/if}>ビショップ/追放天使</option>
							<option value="ビーストテイマー/サマナー" {if $member.class=="ビーストテイマー/サマナー"}selected{/if}>ビーストテイマー/サマナー</option>
							<option value="シーフ/武道家" {if $member.class=="シーフ/武道家"}selected{/if}>シーフ/武道家</option>
							<option value="プリンセス/リトルウィッチ" {if $member.class=="プリンセス/リトルウィッチ"}selected{/if}>プリンセス/リトルウィッチ</option>
							<option value="ネクロマンサー/悪魔" {if $member.class=="ネクロマンサー/悪魔"}selected{/if}>ネクロマンサー/悪魔</option>
							<option value="霊術師/闘士" {if $member.class=="霊術師/闘士"}selected{/if}>霊術師/闘士</option>
							<option value="光奏師/獣人" {if $member.class=="光奏師/獣人"}selected{/if}>光奏師/獣人</option>
							<option value="メイド/黒魔術師" {if $member.class=="メイド/黒魔術師"}selected{/if}>メイド/黒魔術師</option>
						</select>
					</div>
				</div>

				<div class="form-group">
                    <label for="title" class="col-sm-3 control-label">名称(自称)</label>
                    <div class="col-sm-9">
                    	<input type="text" class="form-control" name="title" maxlength="255"  value="{$member.title|escape}">
	                </div>
                </div>
                
                <div class="form-group">
                    <label for="self_introduction" class="col-sm-3 control-label">自己紹介: </label>
                    <div class="col-sm-9">
                    	<textarea id='memo' class="form-control" name="self_introduction" rows="5" cols="45" wrap="soft">{$member.self_introduction|escape}</textarea>
					</div>
				</div>

				<div class="form-group">
					<div class="col-xs-12">
						{if isset($member.image)}
							<img src="{$img}" alt="アバター"><br />
							<button type="biutton" id="delete_img" class="btn btn-danger">画像の削除</button>
						{else}
							<button type="button" id="insert-admin-img" class="btn btn-default">画像アップロード</button>
						{/if}
					</div>
				</div>

				<div class="form-group">
					<label for="auth" class="col-sm-3 control-label">権限</label>
					<div class="col-sm-9">
						<select class="form-control" name="auth">
                        	<option value="10" {if $member.auth==10}selected{/if}>一般ギルドメンバー</option>
							<option value="50" {if $member.auth==50}selected{/if}>名誉一般ギルドメンバー</option>
							<option value="100" {if $member.auth==100}selected{/if}>副ギルドマスター</option>
							<option value="110" {if $member.auth==110}selected{/if}>ギルドマスター</option>
							<option value="120" {if $member.auth>=120}selected{/if}>システム管理者</option>
						</select>
					</div>
				</div>
				
				<div class="form-group">
                	<div class="pull-right col-sm-2"><input type="reset" class="btn btn-warning" value="リセット"></div>
					<div class="col-sm-2"><input type="button" id="member_delete" class="btn btn-danger" value="メンバー削除"></div>
					<div class="col-sm-2"></div>
					<div class="col-sm-2"><input type="button" id="init-password" class="btn btn-info" value="パスワード初期化"></div>
                </div>

                <input type="hidden" name="token" value="{$token}">
				<input type="hidden" name="action_tag" value="guild_admin">
	        </fieldset>
	    </form>
    </div>
    
    <div class="modal-footer">
		<button id="admin_edit" type="button" class="btn btn-primary">送信</button>
		<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
	</div>
</div>
<script type="text/javascript" src="themes/js/redstone_modal.js"></script>