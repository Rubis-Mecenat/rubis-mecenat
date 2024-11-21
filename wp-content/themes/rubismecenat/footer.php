<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package rubismecenat
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="grid wrapper">

			<div class="m-6col">
				<h3>Newsletter</h3>
				<p>Recevez l’actualité de nos actions artistiques et culturelles</p>

				<form>
					<input type="text" name="email">
				</form>

				<p>Nous contacter</p>


				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-footer-last',
							'menu_id'        => 'footer-menu',
						)
					);
				?>

			</div>

			<div class="m-3col">
				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-footer-1',
							'menu_id'        => 'footer-menu',
						)
					);
				?>
			</div>

			<div class="m-3col">
				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-footer-2',
							'menu_id'        => 'footer-menu',
						)
					);
				?>
			</div>

		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->


<div id="modal">
	
</div>
<?php wp_footer(); ?>

</body>
</html>
