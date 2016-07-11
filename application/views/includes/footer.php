		<style type="text/css">
			#footer {
				height: 6%;
				padding-top: 2%;
				padding-bottom: 2%;
				margin-top: 2%;
				border-color: #E7E7E7;
				background-color: #f8f8f8;
			    background-image: -webkit-linear-gradient(top, #fff 0%, #f8f8f8 100%);
			    background-image:      -o-linear-gradient(top, #fff 0%, #f8f8f8 100%);
			    background-image: -webkit-gradient(linear, left top, left bottom, from(#fff), to(#f8f8f8));
			    background-image:         linear-gradient(to bottom, #fff 0%, #f8f8f8 100%);
			}
		</style>
		<footer id="footer" class="navbar-default">
			<div class="container">
				<div class="pull-left">
					&copy; BEM KM Fasilkom Unsri 2016
				</div>
				<div class="pull-right">
					Created by PTI BEM KM Fasilkom Unsri
				</div>
			</div>
		</footer>
		<script type="text/javascript">
			var docHeight = $(window).height();
			var footerHeight = $('#footer').height();
			var footerTop = $('#footer').position().top + footerHeight;

			if (footerTop < docHeight) {
				$('#footer').css('margin-top', (docHeight - footerTop - 15) + 'px');
			}
		</script>
	</body>
</html>