<?php
/**
 *
 * Template Name: Page Programmes
 *
 * @package rubismecenat
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'Components/content', 'programmes' );

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
