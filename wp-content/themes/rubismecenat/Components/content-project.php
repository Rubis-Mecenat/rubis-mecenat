<?php
/**
 * Template part for displaying project
 *
 * @package rubismecenat
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
        <?php rubismecenat_post_thumbnail(); ?>
        <h1 class="entry-title"><?php the_title(); ?></h1>
        <p><?php the_field('project_subtitle'); ?></p>
        <p><?php the_field('project_place'); ?></p>
        <p><?php the_field('project_artiste'); ?></p>
	</header><!-- .entry-header -->


	<div class="entry-content grid">

        <div class="m-6col">
            <?php the_content(); ?>
        </div>

        <div class="m-6col">
            <div>
                <?php the_field('project_practical'); ?>
            </div>

            <div>
                <?php 
                    $presskit = get_field('project_presskit');
                    if( $presskit ): ?>
                        <a href="<?php echo $presskit['url']; ?>" target="_blank">
                            <?php echo $presskit['filename']; ?>
                        </a>
                <?php endif; ?>
            </div>
            
        </div>

        
        <?php get_template_part('Components/Modules/Module', 'Artist', array( 'artist' => get_field('project_artists') )); ?>
       

	</div><!-- .entry-content -->



</article><!-- #post-<?php the_ID(); ?> -->
