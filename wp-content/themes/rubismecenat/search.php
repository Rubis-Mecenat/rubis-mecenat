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
					<div id="mainGrid" class="grid">
						<?php if ( have_posts() ) : ?>

							<?php while ( have_posts()) : the_post(); ?>

								<div class="m-6col mb-l">
									<?php get_template_part( 'Components/Blocks/Block', 'Search' ); ?>
								</div>

							<?php endwhile; the_posts_navigation();?>

						<?php else :

						get_template_part( 'Components/content', 'none' );

						endif; ?>
					</div>
				</div>
			</div>

	</main><!-- #main -->

<?php
get_footer();
