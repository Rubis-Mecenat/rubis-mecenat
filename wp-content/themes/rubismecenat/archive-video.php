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
			
			<header class="page-header txt-center mb-xxl">
				<h1 class="page-title"><?php the_title();?></h1>
				<div><?php the_excerpt(); ?></div>
			</header><!-- .page-header -->

			<div class="grid">
				<div class="m-4col">
					<h2>Filtres</h2>
				</div>

				<div class="m-8col">
					<div class="grid">

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
