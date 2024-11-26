<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package rubismecenat
 */

get_header();
?>

	<main id="primary" class="site-main">

		<header class="wrapper mb-xl">
			<?php get_search_form(); ?>
		</header>

		<div class="grid wrapper">
				<div class="m-4col">
					<?php list_post_type(); ?>
				</div>

				<div class="m-8col">

						<?php if ( have_posts() ) : ?>
							<div id="mainGrid" class="grid mb-l">
								
								<?php while ( have_posts()) : the_post(); ?>

									<div class="m-6col mb-xxl">
										<?php get_template_part( 'Components/Blocks/Block', get_post_type() ); ?>
									</div>
									
								<?php endwhile; ?>

							</div>

							<div id="search-pagination" class="pagination flex -center gap-s">
								<?php pagination_bar(); ?>
							</div>

							<div id="search-loadmore" class="pagination flex -center hidden">
								<button class="btn"><?php pll_e('Charger plus de résultats'); ?></button>
							</div>

						<?php else :

						get_template_part( 'Components/content', 'none' );

						endif; ?>
					
				</div>
			</div>

	</main><!-- #main -->

<?php
get_footer();
