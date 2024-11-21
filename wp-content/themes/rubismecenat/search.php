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

			<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'rubismecenat' ), '<span>' . get_search_query() . '</span>' );
					?>

		</header>

		<div class="grid wrapper">
				<div class="m-4col">
					<?php list_post_type(); ?>
				</div>

				<div class="m-8col">

						<?php if ( have_posts() ) : ?>
							<div id="mainGrid" class="grid">

								<?php while ( have_posts()) : the_post(); ?>

									<div class="m-6col mb-l">
										<?php get_template_part( 'Components/Blocks/Block', get_post_type() ); ?>
									</div>

									
								<?php endwhile; ?>
								

							</div>

							<div class="pagination flex center gap-s">
								<?php pagination_bar(); ?>
							</div>

						<?php else :

						get_template_part( 'Components/content', 'none' );

						endif; ?>
					
				</div>
			</div>

	</main><!-- #main -->

<?php
get_footer();
