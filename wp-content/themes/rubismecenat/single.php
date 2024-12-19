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
			$args = array();

			switch ( get_post_type() ) {
				case 'post':
					$template = 'project';
					break;
				
				case 'project':

					if( get_field('page_model') === 'programmes' ) {
						$template = 'programmes';
					}
					else if( get_field('page_model') === 'transmettre' ) {
						$template = 'transmettre';
					}
					else if( get_field('page_model') === 'creer' ) {
						$template = 'page';
						$args['head_design'] = 'fullwrapped';
						$args['breadcrumbs'] = true;
					}
					else {
						$template = 'project';
					}
					break;

				default:
					$template =  get_post_type();
					break;
			}

			get_template_part( 'Components/Templates/Template', $template, $args );

			get_template_part('Components/content', 'flexible'); 

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
if( get_field('page_model') === 'transmettre' ) : 
	get_footer('small');

else : 
	get_footer();

endif; 