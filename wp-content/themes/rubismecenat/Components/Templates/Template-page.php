<?php
/**
 * Template part for displaying page content in page.php
 *
 * @package rubismecenat
 */

	$head_design = get_field('head_design');
?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if( $head_design === 'simple' ) : ?>
		<header class="entry-header txt-center mb-xxl">
			<div class="grid">
				<div class="m-8col">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					<?php the_excerpt(); ?>
				</div>
			</div>
		</header><!-- .entry-header -->


	<?php elseif( $head_design === 'full' ) : ?>

		<header class="entry-header">
			<div class="grid">
				<div class="s-6col">
					<?php rubismecenat_post_thumbnail(); ?>
				</div>
				<div class="s-6col">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					<?php the_excerpt(); ?>	
				</div>
			</div>
		</header><!-- .entry-header -->

	<?php elseif( $head_design === 'notitle' ) : ?>

	<?php endif; ?>


	
	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->


</article><!-- #post-<?php the_ID(); ?> -->
