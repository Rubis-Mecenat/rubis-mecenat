<?php
/**
 * The template for displaying all pages
 *
 * @package rubismecenat
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'Components/Templates/Template', 'page' );

			get_template_part('Components/content', 'flexible'); 

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
