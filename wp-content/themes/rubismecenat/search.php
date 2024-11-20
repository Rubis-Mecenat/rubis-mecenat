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

		<header class="wrapper">
			<?php get_search_form(); ?>

			<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'rubismecenat' ), '<span>' . get_search_query() . '</span>' );
					?>

		</header>

		<?php if ( have_posts() ) : ?>
			<div class="wrapper">

				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'Components/Blocks/Block', 'Search' );

				endwhile; 

				the_posts_navigation(); ?>

			</div>


		<?php else :

			get_template_part( 'Components/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
