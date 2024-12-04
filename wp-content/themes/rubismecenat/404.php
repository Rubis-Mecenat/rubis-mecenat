<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package rubismecenat
 */

get_header();
?>

	<main id="primary" class="site-main">

		<section class="error-404 not-found">

			<header class="entry-header -red">
				<div class="grid gap-0">
					
					<div class="m-6col mod_cover is-relative">
						<?php 
						$image = get_field('404_media', 'options');
						if( !empty( $image ) ): ?>
							<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
						<?php endif; ?>

					</div>
					
					<div class="m-6col mod_content flex -center-y">
						<div class="body-title">
							<div class="mb-l">
								<?php pll_e("Oops. Nous ne trouvons pas la page..."); ?> <br>
								<?php pll_e("Essayer avec une recherche"); ?> 
							</div>

							<div class="mb-l">
								<?php get_search_form(); ?>
							</div>

						</div>
					</div>

				</div>
			</header><!-- .entry-header -->

			
			<div class="page-content">
			</div><!-- .page-content -->
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
