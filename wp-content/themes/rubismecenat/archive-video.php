<?php
/**
 * Template Name: Archives Vidéos
 *
 * @package rubismecenat
 */

get_header();

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$args = array(
	'post_type' => 'video',
	'posts_per_page' => 10,
	'paged' => $paged
);

$query = new WP_Query($args);
?>

	<main id="primary" class="site-main  -archive">


		<?php if ($query->have_posts()) : ?>
			
			<header class="entry-header -simple txt-center mb-xxl">
				<div class="wrapper grid">
					<div class="header-titles t-12col m-8col -centered">
						<h1 class="entry-title mb-m"><?php the_title(); ?></h1>
						<div class="body-title"><?php the_excerpt(); ?></div>
					</div>
				</div>
			</header><!-- .entry-header -->

			<div class="grid wrapper">
				<div class="t-12col m-4col m:mb-xl">
					<?php list_terms_custom_taxonomy(array( 'tax' => 'video_cat', 'posttype' => 'video' )); ?>
				</div>

				<div class="t-12col m-8col">
					<div id="mainGrid" class="grid">

						<?php while ($query->have_posts()) : $query->the_post(); ?>

							<div class="t-12col m-6col mb-xxl">
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
