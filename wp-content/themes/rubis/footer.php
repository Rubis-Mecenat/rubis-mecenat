						</section>
					</div>
				</div><!--- #page-content -->

				</div><!--- #page-container -->
			</section><!--- #page -->


			<?php if(ts_has_footer_widgets() && ts_get_theme_option('enable_footer_widgets') == 'on') : ?>
			<footer id = "page-footer" class = "container-wrap">
				<div id = "page-footer-container" class = "container">
					<?php ts_get_footer_widgets(ts_get_theme_option('footer_widgets_layout')); ?>
				</div><!--- #page-footer-container -->
			</footer><!--- #page-footer -->
			<?php endif; ?>


			<footer id = "footer" class = "container-wrap">
				<div id = "footer-container" class = "container">

					<div class = "row">
						<div id = "footer-left" class = "span-6">
							<p id = "copyright">
								<?php echo ts_get_theme_option('copyright'); ?>
							</p>

							<nav id = "footer-nav-menu">
								<?php ts_get_footer_nav(); ?>
							</nav>
						</div>

						<div id = "footer-right" class = "span-6">
							<div id = "social-links">
								<?php ts_get_social_links(); ?>
							</div>
						</div>
					</div>

				</div><!--- #page-footer-container -->
			</footer><!--- #page-footer -->

		</div><!--- #main-wrap -->

		<!-- Scripts -->
		<script type = "text/javascript" src = "<?php echo THEME_SCRIPTS; ?>/jquery.easing.js?ver=<?php echo THEME_VERSION; ?>"></script>
		<script type = "text/javascript" src = "<?php echo THEME_SCRIPTS; ?>/jquery_cookie.js?ver=<?php echo THEME_VERSION; ?>"></script>
		<script type = "text/javascript" src = "<?php echo THEME_SCRIPTS; ?>/scripts.js?ver=<?php echo THEME_VERSION; ?>"></script>

		<!-- Plugins -->
		<script type = "text/javascript" src = "<?php echo THEME_PLUGINS; ?>/colorbox/jquery.colorbox.js?ver=<?php echo THEME_VERSION; ?>"></script>
		<script type = "text/javascript" src = "<?php echo THEME_PLUGINS; ?>/flexslider/jquery.flexslider-min.js?ver=<?php echo THEME_VERSION; ?>"></script>
		<script type = "text/javascript" src = "<?php echo THEME_PLUGINS; ?>/mediaelement/mediaelement.min.js?ver=<?php echo THEME_VERSION; ?>"></script>
		<script type = "text/javascript" src = "<?php echo THEME_PLUGINS; ?>/social/jquery.social.js?ver=<?php echo THEME_VERSION; ?>"></script>
		<script type = "text/javascript" src = "<?php echo THEME_PLUGINS; ?>/quicksand/jquery-animate-css-rotate-scale.js?ver=<?php echo THEME_VERSION; ?>"></script>
		<script type = "text/javascript" src = "<?php echo THEME_PLUGINS; ?>/quicksand/jquery-css-transform/jquery-css-transform.js?ver=<?php echo THEME_VERSION; ?>"></script>
		<script type = "text/javascript" src = "<?php echo THEME_PLUGINS; ?>/quicksand/jquery.quicksand.js?ver=<?php echo THEME_VERSION; ?>"></script>

		<!--[if lt IE 9]>
		<script src = "<?php echo THEME_SCRIPTS; ?>/ie/scripts.js" type = "text/javascript"></script>
		<![endif]-->

		<?php if($GLOBALS['ts_map_count'] > 0) : ?>
		<script type = "text/javascript" src = "http://maps.google.com/maps/api/js?sensor=false"></script>
		<script type = "text/javascript" src = "<?php echo THEME_SCRIPTS; ?>/gmap.js"></script>
		<?php endif; ?>

		<?php wp_footer(); ?>

	</body>
</html>