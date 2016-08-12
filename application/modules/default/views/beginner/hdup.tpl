{include file=$header}
<pre style="margin-top: -20px;">
	HDのユーザーパッチ化(以下UP)導入について
	ユーザーパッチとは本来パッケージ版をWin7以降対応、独自の改良を行った有志によるパッチです。
	HDにおいてはSteamのサーバーを介さない、バージョンを固定するため軽さと安定性を兼ね備えたゲームができます。
	逆に言えば、パッケージ版と同じ扱いになるため、ルーターのポート開放等が必要になる場合があります。

	詳細については英語ですが以下を参照ください。
	<a href="http://aoccs.net/" target="_blank">http://aoccs.net/</a>

	日本語化されたページは<a href="hdcomp" target="_blank">こちら</a>です。

	ユーザーパッチを導入するメリットについては、<a href="http://galapon.dip.jp/" target="_blank">こちら</a>が参考になります。
	なお、上記リンクはパッケージ版を主眼に置いており、HDがメインではありませんのでご注意ください。

	【導入】
	
	上記サイトよりDownload Patchボタンを押して実行ファイルをダウンロードします。
	ダウンロードしたaochdcompat-v4.exeを実行します。
	すると、C:\Program Files (x86)\Steam\SteamApps\common\Age2HDの下にage2_x1フォルダが作成され、その中にage2_x1.exeなどができます。
	また、インストールの前にパッケージ版のAoFEが必要なのでこれもダウンロードします。
	exeファイルでも、Zipファイルでもどちらでも構いません。
	<a href="http://www.forgottenempires.net/install" target="_blank">>http://www.forgottenempires.net/install</a>
	ダウンロードし、解凍したランチャーを、AoCHDをインストールしたフォルダにAoFE_Launcherをドラッグアンドドロップします。
	(デフォルトではC:\Program Files (x86)\Steam\SteamApps\common\Age2HD)
	その後、ランチャーを起動してインストールします。

	これでゲームは起動できるのですが、文明名がバグるのでもう1手順必要です。
	ランゲージファイルを以下からダウンロードして下さい。
	<a href="http://aochd.jp/LANGUAGEs.ZIP">LANGUAGEs.ZIP</a>
	これをC:\Program Files (x86)\Steam\SteamApps\common\Age2HDにある言語ファイルに対して上書きします。
	ゲームの開始は
	C:\Program Files (x86)\Steam\SteamApps\common\Age2HD\age2_x1
	のage2_x1.exeを実行してください。

	【タウントについて】
	C:\Program Files (x86)\Steam\SteamApps\common\Age2HD\resources\jp\sound\
	のtauntフォルダを
	C:\Program Files (x86)\Steam\SteamApps\common\Age2HD
	にコピーしてください。

	【観戦について】

	検証中ですが、パッケージ版を持っており、パッケージ版UserPatchを導入している方なら見れそうです。
{*
	<a href="http://aochd.jp/spectate.exe">spectate.exe</a>
	上記ファイルをダウンロードして
	C:\Program Files (x86)\Steam\SteamApps\common\Age2HD\age2_x1
	フォルダに移動してください。
*}
	【マルチ部屋見れない入れいない場合】

	Windows標準のFWなど、ファイアーウォールで実行ファイル(age2_x1.exe) が許可されているか設定を観直してください。

	以上でUPの導入手順は終了です。
	ゲーム方法についてはパッケージ版と同じになりますので、詳細はIRCなどでお問い合わせください。
	IRCch、#AoCHDUPでも受け付けております。

	【Voobly接続について】
	HDUP(aoccs)を用いてVooblyでゲームを行う事ができます。
	また、パッケージ版プレイヤーもVooblyを通してHDUPとゲームを行うことが可能になり、クロスプラットフォーム対応ということになります。
	(パッケージ版プレイヤーはHDUPを導入しなくても構いません。)
	アカウント取得については<a href="http://www57.atwiki.jp/voobly/pages/10.html" target="_blank">こちら</a>をご覧ください。

	以上です。

	</pre><br /><br />
{include file=$footer}