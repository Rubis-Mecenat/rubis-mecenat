<?php
/**
 * Template part for displaying project
 *
 * @package rubismecenat
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="wrapper project-header grid is-relative">

        <div class="project_breadcrumb s-12col">
            <?php get_template_part('Components/Modules/Module', "Breadcrumbs"); ?>
        </div>

        <div class="project_cover s-12col">
            <?php rubismecenat_post_thumbnail(); ?>
        </div>

        <div class="project_titles m-5col">
            <h1 class="entry-title"><?php the_title(); ?></h1>
            <h2 class="h3 -other mb-s"><?php the_field('project_subtitle'); ?></h2>
            <p class="body -big -light"><?php the_field('project_place'); ?></p>
            <p><?php the_field('project_artiste'); ?></p>
        </div>
	</header><!-- .entry-header -->


	<div class="wrapper project-content grid mb-xxl">

        <div class="m-6col body">
            <?php the_content(); ?>
        </div>

        <div class="m-2col "></div>
        
        <div class="m-4col">
            <div>
                <?php the_field('project_practical'); ?>
            </div>

            <?php $presskit = get_field('project_presskit');
                    if( $presskit ): ?>
                            <div class="project_presskit flex -column gap-m">
                                <a href="<?php echo $presskit['url']; ?>" target="_blank" class="flex gap-s -center-y">

                                    <p class="btn -round">
                                        <?php get_template_part('Components/Svgs/Sgv',  'Download'); ?>
                                    </p>

                                    <p class="flex -column">
                                        <span class="body -bold"><?php echo $presskit['filename']; ?></span>
                                        <span class="body -light"><?php echo human_filesize($presskit['filesize'], 0); ?></span>
                                    </p>

                                </a>
                            </div>

                            
            <?php endif; ?>
            
        </div>       

	</div><!-- .entry-content -->


    <?php get_template_part('Components/Modules/Module', 'Artist', array( 'artist' => get_field('project_artists') )); ?>

    

</article><!-- #post-<?php the_ID(); ?> -->
