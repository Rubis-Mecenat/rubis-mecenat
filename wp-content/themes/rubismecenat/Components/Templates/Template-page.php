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

		<header class="entry-header -red">
			<div class="grid gap-0">
				
				<div class="m-6col mod_cover is-relative">
					<?php rubismecenat_post_thumbnail(); ?>

					<div class="content-absolute">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					</div>
				</div>
				
				<div class="m-6col mod_content flex -center-y">
					<div class="body-title">
						<?php the_excerpt(); ?>	
					</div>
				</div>

			</div>
		</header><!-- .entry-header -->

		<?php elseif( $head_design === 'fullwrapped' ) : ?>

			<header class="entry-header -fullwrapped -red">
				<div class="grid gap-0">
					
					<div class="m-6col mod_cover is-relative">
						<div class="content-absolute">
							<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						</div>
					</div>
					
					<div class="m-6col mod_content flex -center-y">
						<div class="body-title">
							<?php the_excerpt(); ?>	
						</div>
					</div>

				</div>
			</header><!-- .entry-header -->

	<?php elseif( $head_design === 'notitle' ) : ?>

	<?php endif; ?>


	
	<div class="entry-content wrapper mb-xxl">

		<div class="grid">
			<div class="s-12col m-6col">
				<?php the_content(); ?>
			</div>

			<div class="s-12col m-1col"></div>

			<div class="s-12col m-5col">
			
			</div>
		</div>
	</div><!-- .entry-content -->


</article><!-- #post-<?php the_ID(); ?> -->
