<?php
/**
 * Template Name: Archives Vidéos
 *
 * @package rubismecenat
 */

get_header();

$args = array(
	'post_type' => 'video',
	'posts_per_page' => 10,
);

$query = new WP_Query($args);
?>

	<main id="primary" class="site-main wrapper">


		<?php if ($query->have_posts()) : ?>
			
			<header class="entry-header -simple txt-center mb-xxl">
				<div class="wrapper flex -center-x">
					<div class="header-titles">
						<h1 class="entry-title mb-m"><?php the_title(); ?></h1>
						<div class="body-title"><?php the_excerpt(); ?></div>
					</div>
				</div>
			</header><!-- .entry-header -->

			<div class="grid">
				<div class="m-4col">
					<?php list_terms_custom_taxonomy(array( 'tax' => 'video_cat', 'posttype' => 'video' )); ?>
				</div>

				<div class="m-8col">
					<div id="mainGrid" class="grid">

						<?php while ($query->have_posts()) : $query->the_post(); ?>

							<div class="m-6col">
								<?php get_template_part( 'Components/Blocks/Block', 'Video' ); ?>
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
