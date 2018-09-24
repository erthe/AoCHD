<div class="modal" id="modal-window">
	<div class="modal-dialog" id="window-container">
	</div>
</div>
		<div>
			<div class="navbar-header">
				<a class="navbar-brand" href="#">{$title}</a>
			</div>
			
			<p class="navbar-text pull-right">{$username}</p>
		</div>
		</div>
	</body>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="{$base}/themes/js/Library/bootstrap.min.js"></script>
    <script src="{$base}/themes/js/Library/alertbox.js"></script>
    <script src="{$base}/themes/js/Library/common.js"></script>
    <script src="{$base}/themes/js/Library/md5.js"></script>
    <script src="{$base}/themes/js/admin.js"></script>
    <script>
   	document.body.scrollTop = document.documentElement.scrollTop = 0;
    {literal}
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-51138356-1', 'aochd.jp');
		ga('send', 'pageview');

	{/literal}
	</script>
</html>