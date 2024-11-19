<?php
/**
 * Template part for displaying page content in page.php
 *
 * @package rubismecenat
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if( ! get_field('hide_title')) : ?>
		<header class="entry-header">
			<?php rubismecenat_post_thumbnail(); ?>

			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->
	<?php endif; ?>


	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->


</article><!-- #post-<?php the_ID(); ?> -->
