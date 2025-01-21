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

	<?php if( $head_design === 'simple' ) : //  titre et chapo centrés (modèle du Design "Espace Press") ?>
		<header class="entry-header -simple txt-center mb-xxl">
			<div class="wrapper grid">
				<div class="header-titles t-12col m-8col -centered">
					<h1 class="entry-title mb-m"><?php the_title(); ?></h1>
					<div class="body-title"><?php the_excerpt(); ?></div>
				</div>
			</div>
		</header><!-- .entry-header -->


	<?php elseif( $head_design === 'full' ) : // Sur le modèle du Design "Le Fonds" ?>

		<header class="entry-header">
			<div class="grid gap-0">
				
				<div class="t-12col m-6col mod_cover is-relative">
					<?php rubismecenat_post_thumbnail( get_the_ID(), 'theme_large' ); ?>
				</div>
				
				<div class="t-12col m-6col mod_content flex -center-y -column -center-x gap-xl">
					<div class="body-title">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						<?php the_excerpt(); ?>	
					</div>
					<a href="#content" class="btn -circled-arrow on-desktop">
						<?php get_template_part('Components/Svgs/Svg', "ArrowDown"); ?>
					</a>
				</div>

			</div>
		</header><!-- .entry-header -->

		<?php elseif( $head_design === 'fullwrapped' ) : // Sur le modèle du Design "Créez & Accompagnez" ?>

			<header class="entry-header -fullwrapped -red">

				<?php if( $args['breadcrumbs']) : ?>
					<div class="breadcrumb_container t-12col">
						<?php get_template_part('Components/Modules/Module', "Breadcrumbs"); ?>
					</div>
				<?php endif; ?>


				<div class="grid gap-0">
					
					<div class="t-12col m-6col mod_cover is-relative">
						<div class="content-absolute">
							<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						</div>
					</div>
					
					<div class="t-12col m-6col mod_content flex -center-y">
						<div class="body-title">
							<?php the_excerpt(); ?>	
						</div>
					</div>

				</div>
			</header><!-- .entry-header -->

	<?php elseif( $head_design === 'notitle' ) : // Pas de titre (modèle du design de l'accueil) ?>

	<?php endif; ?>


	
	<?php if( get_the_content() !== '' ) : ?>
		<div id="content" class="entry-content wrapper mb-xxl">

			<div class="grid">
				<div class="t-12col m-6col body">
					<?php the_content(); ?>
				</div>

				<div class="t-12col m-1col"></div>

				<div class="t-12col m-5col">
					<?php 
						$doc = get_field('page_document');
						if( $doc ): ?>
                            <div class="project_presskit flex -column gap-m">
                                <a href="<?php echo $doc['url']; ?>" target="_blank" class="flex gap-s -center-y btn -filled-picto">

                                    <p class="picto">
                                        <?php get_template_part('Components/Svgs/Svg',  'Download'); ?>
                                    </p>

                                    <p class="label flex -column">
                                        <span class="body -bold"><?php echo $doc['title']; ?></span>
                                        <span class="body -light"><?php echo human_filesize($doc['filesize'], 0); ?></span>
                                    </p>

                                </a>
                            </div>
            		<?php endif; ?>
				</div>
			</div>
		</div><!-- .entry-content -->
	<?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->


<div id="step"></div>