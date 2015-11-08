<!--
Author: W3layouts, Isaac Campos, Roger Villalobos,  Jeffrey Alvarado
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
	<?php include_once("desconexionMySQL.php"); ?>


		<div hidden id="footer-widgets" role="contentinfo" class="clearfix">
			<div id="colophon">
				<div id="footer-widget-area" role="complementary">
					<div id="footer-logo" class="widget-area"></div>
					<div id="first" class="widget-area">
						<ul class="xoxo">
							<li id="text-8" class="widget-container widget_text">
								<h3 class="widget-title">Address</h3>
								<div class="textwidget">
									<p>123 WordPress Avenue, ThemeBoy City, VIC Australia 3000</p>
								</div>
							</li>
							<li id="text-7" class="widget-container widget_text">
								<h3 class="widget-title">Contact</h3>
								<div class="textwidget">
									<p>Phone: (+61) 555-555-6789
										<br> Email: <a href="mailto:demo@themeboy.com">demo@themeboy.com</a></p>
								</div>
							</li>
						</ul>
					</div>
					<!-- #first .widget-area -->

					<div id="second" class="widget-area">
						<ul class="xoxo">
							<li id="text-9" class="widget-container widget_text">
								<h3 class="widget-title">Football Club for SportsPress</h3>
								<div class="textwidget">
									<p>This demo was created using a premium website template.
										<br> Introducing Football Club for SportsPress
										<br> the best way to get your soccer team online.</p>
									<p>Visit <a href="https://themeboy.com/products/footballclub/">https://themeboy.com/products/footballclub/</a> for more details.</p>
								</div>
							</li>
						</ul>
					</div>
					<!-- #second .widget-area -->
				</div>
				<!-- #footer-widget-area -->
			</div>
			<!-- #colophon -->
		</div>
		<!-- #footer-widgets -->
	</div>
	<!-- #wrapper -->
	<footer class="clearfix">
		<div class="right">©<?php echo date("Y") ?> Comic Goal</div>
		<div class="left"><a href="login.php">Herramientas de Administrador</a></div>
		<!--ul id="social">
			<li class="facebook"><a href="http://facebook.com/themeboy" title="Facebook" target="_blank">Facebook</a></li>
			<li class="twitter"><a href="http://twitter.com/themeboy" title="Twitter" target="_blank">Twitter</a></li>
			<li class="gplus"><a href="http://gplus.to/themeboy" title="Google+" target="_blank">Google+</a></li>
			<li class="youtube"><a href="http://youtube.com/themeboyteam" title="YouTube" target="_blank">YouTube</a></li>
		</ul-->
	</footer>
	
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="js/jquery.jplayer.min.js"></script>
	
	<!----Calender -------->
	<script src="js/underscore-min.js"></script>
	<script src="js/moment-2.2.1.js"></script>
	<script src="js/clndr.js"></script>
	<script src="js/site.js"></script>
	<!----End Calender -------->

	 
	<script src="js/modernizr.custom.js"></script>
    	
    <script src="js/bootstrap.js"> </script>
    
    <script src="js/jquery.nouislider.js"></script>
    
    <script type="text/javascript" src="js/fd-slider.js"></script>

	<script src="js/jquery.circlechart.js"></script>
	
	<script type="text/javascript" src="js/move-top.js"></script>
	
	<script type="text/javascript" src="js/easing.js"></script>	
	<!-- script-for-menu -->
	
	<script src="js/jquery.flot.min.js"></script>	
	<script src="js/jquery-ui.js"></script>
	
	<script type="text/javascript">
		jQuery(document).ready(function(){
			
			$( ".acordion" ).accordion({
				  heightStyle: "content",
				  collapsible: true,
			});
			
			$( "span.menu" ).click(function() {
				$( "ul.nav1" ).slideToggle( 300, function() {
				// Animation complete.
				});
			});
			
			$( "span.menu2" ).click(function() {
				$( "ul.effct1" ).slideToggle( 300, function() {
				// Animation complete.
				});
			});
			
			$('.demo-1').percentcircle({
				animate : false,
				diameter : 100,
				guage: 3,
				coverBg: '#fff',
				bgColor: '#d9d9d9',
				fillColor: '#1da1f4',
				percentSize: '15px',
				percentWeight: 'normal'
			});

			$('.demo-2').percentcircle({
				animate : false,
				diameter : 100,
				guage: 3,
				coverBg: '#fff',
				bgColor: '#d9d9d9',
				fillColor: '#562b1a',
				percentSize: '15px',
				percentWeight: 'normal'
			});

			$('.demo-3').percentcircle({
				animate : false,
				diameter : 100,
				guage: 3,
				coverBg: '#fff',
				bgColor: '#a6192e',
				fillColor: '#E64608',
				percentSize: '18px',
				percentWeight: 'normal'
			});
			
			$("#jquery_jplayer_1").jPlayer({
				ready: function () {
					$(this).jPlayer("setMedia", {
						title: "Big Buck Bunny",
						m4v: "http://www.jplayer.org/video/m4v/Big_Buck_Bunny_Trailer.m4v",
						poster: "http://www.jplayer.org/video/poster/Big_Buck_Bunny_Trailer_480x270.png"
					});
				},
				swfPath: "../../dist/jplayer",
				supplied: "m4v",
				size: {
					width: "379px",
					height: "250px",
					cssClass: "jp-video-360p"
				},
				useStateClassSkin: true,
				autoBlur: false,
				smoothPlayBar: true,
				keyEnabled: true,
				remainingDuration: true,
				toggleDuration: true
			});
			
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
			
			 $( "span.menu3" ).click(function() {
			 	$( "ul.effct2" ).slideToggle( 300, function() {
			 	// Animation complete.
				});
			 });
			 
			 $("#slider").noUiSlider({
				start: [20, 80],
				connect: true,
				range: {
					'min': 0,
					'max': 100
				}
			});
			
		});
	</script>
	
	<script>
		jQuery(document).ready(function () {
		
			// Graph Data ##############################################
			var graphData = [{
					// Returning Visits
					data: [ [6, 4500], [7,3500], [8, 6550], [9, 7600], ],
					color: '#59676B',
					points: { radius: 4, fillColor: '#59676B' }
				}
			];
		
			// Lines Graph #############################################
			$.plot($('#graph-lines'), graphData, {
				series: {
					points: {
						show: true,
						radius: 1
					},
					lines: {
						show: true
					},
					shadowSize: 0
				},
				grid: {
					color: '#59676B',
					borderColor: 'transparent',
					borderWidth: 10,
					hoverable: true
				},
				xaxis: {
					tickColor: 'transparent',
					tickDecimals: false
				},
				yaxis: {
					tickSize: 1200
				}
			});
		
			// Bars Graph ##############################################
			$.plot($('#graph-bars'), graphData, {
				series: {
					bars: {
						show: true,
						barWidth: .9,
						align: 'center'
					},
					shadowSize: 0
				},
				grid: {
					color: '#fff',
					borderColor: 'transparent',
					borderWidth: 20,
					hoverable: true
				},
				xaxis: {
					tickColor: 'transparent',
					tickDecimals: 2
				},
				yaxis: {
					tickSize: 1000
				}
			});
		
			// Graph Toggle ############################################
			$('#graph-bars').hide();
		
			$('#lines').on('click', function (e) {
				$('#bars').removeClass('active');
				$('#graph-bars').fadeOut();
				$(this).addClass('active');
				$('#graph-lines').fadeIn();
				e.preventDefault();
			});
		
			$('#bars').on('click', function (e) {
				$('#lines').removeClass('active');
				$('#graph-lines').fadeOut();
				$(this).addClass('active');
				$('#graph-bars').fadeIn().removeClass('hidden');
				e.preventDefault();
			});
		
			// Tooltip #################################################
			function showTooltip(x, y, contents) {
				$('<div id="tooltip">' + contents + '</div>').css({
					top: y - 16,
					left: x + 20
				}).appendTo('body').fadeIn();
			}
		
			var previousPoint = null;
		
			$('#graph-lines, #graph-bars').bind('plothover', function (event, pos, item) {
				if (item) {
					if (previousPoint != item.dataIndex) {
						previousPoint = item.dataIndex;
						$('#tooltip').remove();
						var x = item.datapoint[0],
							y = item.datapoint[1];
							showTooltip(item.pageX, item.pageY, y+ x );
					}
				} else {
					$('#tooltip').remove();
					previousPoint = null;
				}
			});
		
		});
		</script>

<link rel="stylesheet" id="adminbar-stylesheet-css" href="assets/adminbar.css" type="text/css" media="all">
	<script type="text/javascript" src="assets/comment-reply.js"></script>
	<script type="text/javascript" src="assets/jquery_007.js"></script>
	<script type="text/javascript" src="assets/jquery_004.js"></script>
	<script type="text/javascript">
		/* <![CDATA[ */
		var localized_strings = {
			"days": "days",
			"hrs": "hrs",
			"mins": "mins",
			"secs": "secs",
			"previous": "Previous",
			"next": "Next"
		};
		/* ]]> */
	</script>
	<script type="text/javascript" src="assets/sportspress.js"></script>
	
	<script type="text/javascript">
		jQuery(document).ready(function(){

			// drop nav
			$('#drop-nav').change(function() {
				window.location = $(this).val();
			});
			// fancybox all image links
			$('a').each(function() {
				var self = this;
				var file = $(self).attr('href');
				if (file) {
					var extension = file.substr((file.lastIndexOf('.') + 1));
					switch (extension) {
						case 'jpg':
						case 'png':
						case 'gif':
							$(self).fancybox({
								'overlayColor': '#fff'
							});
					}
				}
			});
		})
	</script>
	
	<script src="js/wow.js"></script>
	  <script>
	  new WOW().init();
	  </script>


	<div id="fancybox-tmp"></div>
	<div id="fancybox-loading">
		<div></div>
	</div>
	<div id="fancybox-overlay"></div>
	<div id="fancybox-wrap">
		<div id="fancybox-outer">
			<div class="fancybox-bg" id="fancybox-bg-n"></div>
			<div class="fancybox-bg" id="fancybox-bg-ne"></div>
			<div class="fancybox-bg" id="fancybox-bg-e"></div>
			<div class="fancybox-bg" id="fancybox-bg-se"></div>
			<div class="fancybox-bg" id="fancybox-bg-s"></div>
			<div class="fancybox-bg" id="fancybox-bg-sw"></div>
			<div class="fancybox-bg" id="fancybox-bg-w"></div>
			<div class="fancybox-bg" id="fancybox-bg-nw"></div>
			<div id="fancybox-content"></div>
			<a id="fancybox-close"></a>
			<div id="fancybox-title"></div><a href="javascript:;" id="fancybox-left"><span class="fancy-ico" id="fancybox-left-ico"></span></a><a href="javascript:;" id="fancybox-right"><span class="fancy-ico" id="fancybox-right-ico"></span></a></div>
	</div>
</body>

</html>