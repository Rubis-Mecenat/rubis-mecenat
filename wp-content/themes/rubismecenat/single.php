<?php
/**
 * The template for displaying all single Vidéo
 *
 * @package rubismecenat
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post(); 

			$template = get_post_type() === 'post' ? 'project' : get_post_type();

			get_template_part( 'Components/Templates/Template', ucfirst($template) );

			get_template_part('Components/content', 'flexible'); 

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
