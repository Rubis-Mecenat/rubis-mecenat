<?php
/**
 * Template part for displaying page content in page.php
 *
 * @package rubismecenat
 */

	if( isset( $args['head_design']) ) {
		$head_design = $args['head_design'];
	}
	else {
		$head_design = get_field('head_design');
	}
?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if( $head_design === 'simple' ) : ?>
		<header class="entry-header -simple txt-center mb-xxl">
			<div class="wrapper grid">
				<div class="header-titles m-8col -centered">
					<h1 class="entry-title mb-m"><?php the_title(); ?></h1>
					<div class="body-title"><?php the_excerpt(); ?></div>
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
				
				<div class="m-6col mod_content flex -center-x -center-y -column gap-xl">
					<div class="body-title">
						<?php the_excerpt(); ?>	
					</div>
					<button class="btn -hover-black">
						<?php get_template_part('Components/Svgs/svg', "CircledArrowDown"); ?>
					</button>
				</div>

			</div>
		</header><!-- .entry-header -->

		<?php elseif( $head_design === 'fullwrapped' ) : ?>

			<header class="entry-header -fullwrapped -red">

				<?php if( $args['breadcrumbs']) : ?>
					<div class="breadcrumb_container s-12col">
						<?php get_template_part('Components/Modules/Module', "Breadcrumbs"); ?>
					</div>
				<?php endif; ?>


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


	
	<?php if( get_the_content() !== '' ) : ?>
		<div class="entry-content wrapper mb-xxl">

			<div class="grid">
				<div class="s-12col m-6col body">
					<?php the_content(); ?>
				</div>

				<div class="s-12col m-1col"></div>

				<div class="s-12col m-5col">
				
				</div>
			</div>
		</div><!-- .entry-content -->
	<?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->
