<?php
/**
 * The template for displaying archive pages
 *
 * Template Name: Archives Editions
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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

	<main id="primary" class="site-main">


		<?php if ($query->have_posts()) : ?>
			
			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<div>
				<h2>Filtres</h2>
			</div>

			<?php while ($query->have_posts()) : $query->the_post(); ?>

				<div>
					<a href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
				</div>

			<?php endwhile;  wp_reset_postdata(); ?>

		<?php else : ?>
			// Display no posts found message

		<?php endif; ?>



	</main><!-- #main -->

<?php
get_footer();
