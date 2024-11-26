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

				<div class="mb-l">
					<h3 class="h1">Newsletter</h3>
					
					<?php get_template_part('Components/Modules/Module', 'NewsletterForm'); ?>
				</div>

				<div class="mb-xxl">
					<a href="mailto:<?php the_field('rubis_contact_mail', 'option'); ?>" class="-clean flex -center-y gap-s">
						<span class="btn -round -small -gray">
							<?php get_template_part('Components/Svgs/Svg', 'Mail'); ?>
						</span>
						<span class="body -bold -gray">Nous contacter</span>
					</a>
				</div>

				<div class="">
					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-footer-last',
								'menu_id'        => 'footer-menu',
								'menu_class' => 'menu-footer-last menu flex -center-y gap-m',
							)); ?>
				</div>

			</div>

			<div class="m-3col">
				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-footer-1',
							'menu_id'        => 'footer-menu',
							'menu_class' => 'menu-footer-1 menu flex -column gap-xs',
						)); ?>
			</div>

			<div class="m-3col">
				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-footer-2',
							'menu_id'        => 'footer-menu',
							'menu_class'	 => 'menu-footer-2 menu flex -column gap-xs',
						)); ?>
			</div>

		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->


<div id="modal" class="modal">
	<button id="modal-close" class="close">
		<?php get_template_part( 'Components/Svgs/Svg', 'Close' ); ?>
	</button>
	<div id="modal-inner" class="wrapper modal-inner"></div>
</div>

<?php wp_footer(); ?>

</body>
</html>
