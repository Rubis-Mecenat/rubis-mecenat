<?php
/**
 * The template for displaying the footer
 *
 * @package rubismecenat
 */

?>

	<footer id="colophon" class="site-footer -small">
		<div class="grid wrapper">

			<div class="t-12col m-6col">


				<div class="flex -space">
					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-footer-last',
								'menu_id'        => 'footer-menu',
								'menu_class' => 'menu-footer-last menu flex -center-y gap-m',
							)); ?>

					<label class="burger-menu -white on-mobile" for="burger">
						<span class="burger-menu__stick"></span>
						<span class="burger-menu__stick"></span>
					</label>
				</div>

			</div>

		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->


<?php wp_footer(); ?>

</body>
</html>
