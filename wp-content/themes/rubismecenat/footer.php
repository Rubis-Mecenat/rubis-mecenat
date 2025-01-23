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

			<div class="t-12col m-6col">

				<div class="mb-l on-desktop">
					<h3 class="h1">Newsletter</h3>
					
					<?php get_template_part('Components/Modules/Module', 'NewsletterForm'); ?>
				</div>

				<div class="mb-xxl on-desktop">
					<a href="mailto:<?php the_field('rubis_contact_mail', 'option'); ?>" class="flex -center-y gap-s btn -footer-picto">
						<span class="picto">
							<?php get_template_part('Components/Svgs/Svg', 'Mail'); ?>
						</span>
						<span class="body -bold -gray label"><?php pll_e('Nous contacter'); ?></span>
					</a>
				</div>

			</div>

			<div class="m-3col on-desktop">
				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-footer-1',
							'menu_id'        => 'footer-menu',
							'menu_class' => 'menu-footer-1 menu flex -column gap-xs',
						)); ?>
			</div>

			<div class="m-3col on-desktop">
				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-footer-2',
							'menu_id'        => 'footer-menu',
							'menu_class'	 => 'menu-footer-2 menu flex -column gap-xs',
						)); ?>
			</div>

		</div><!-- .site-info -->

		<div class="wrapper mb-l">

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

					<div class="on-desktop">
						<?php get_template_part('Components/Svgs/Svg', 'LogoSmall', array(
							'color'   => 'white',
						) ); ?>
					</div>
			</div>
		</div>

		<div class="wrapper ">
			<div class="on-mobile">
				<?php get_template_part('Components/Svgs/Svg', 'LogoSmall', array(
					'color'   => 'white',
				) ); ?>
			</div>
		</div>

		<div class="wrapper ">
			<p class=""><span class="credit">© <?php echo date("Y"); ?> Rubis Mécénat</span></p>
		</div>

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
