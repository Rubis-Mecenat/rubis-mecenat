<?php
/**
 * Template Name: Archives Editions
 *
 * @package rubismecenat
 */

get_header();

$args = array(
	'post_type' => 'edition',
	'posts_per_page' => 10,
);

$query = new WP_Query($args);
?>

	<main id="primary" class="site-main wrapper">


		<?php if ($query->have_posts()) : ?>
			
			<header class="page-header txt-center mb-xxl">
				<h1 class="page-title"><?php the_title();?></h1>
				<div><?php the_excerpt(); ?></div>
			</header><!-- .page-header -->

			<div class="grid">
				<div class="m-4col">
					<?php list_terms_custom_taxonomy(array( 'tax' => 'edition_cat', 'posttype' => 'edition' )); ?>
				</div>

				<div class="m-8col">
					<div id="mainGrid" class="grid">

						<?php while ($query->have_posts()) : $query->the_post(); ?>

							<div class="m-6col mb-l">
								<?php get_template_part( 'Components/Blocks/Block', 'Edition' ); ?>
							</div>

						<?php endwhile;  wp_reset_postdata(); ?>
					</div>
				</div>
			</div>
		<?php else : ?>
			// Display no posts found message

		<?php endif; ?>



	</main><!-- #main -->

<?php
get_footer();
