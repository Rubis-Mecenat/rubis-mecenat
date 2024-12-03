<?php
/**
 * Template part for displaying project
 *
 * @package rubismecenat
 */

 $artist = get_field('edition_artist');


?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    <div class="project_breadcrumb wrapper">
        <?php get_template_part('Components/Modules/Module', "Breadcrumbs"); ?>
    </div>

    <div class="grid wrapper mt-xxl mb-xxl">

        <div class="entry-header s-4col">
        <?php if( get_field('edition_file') ) : ?>
                <iframe class="" src="<?php echo get_field('edition_file')["url"]; ?>"></iframe>

            <?php else : ?>
                <?php the_post_thumbnail('medium'); ?>
                
            <?php endif; ?>
        </div><!-- .entry-header -->

    
        <div class="s-2col"></div>

        <div class="s-5col entry-content">
            <div class="m-6col">
                <h1 class="entry-title h2 -other mb-s"><?php the_title(); ?></h1>
                <h2 class="h2 mb-s"><?php echo $artist ? $artist->post_title : '' ?></h2>
            </div>

            <div class="m-6col">
                <?php the_content(); ?>
            </div>

        </div><!-- .entry-content -->

        <div class="s-1col"></div>
    </div>

</article><!-- #post-<?php the_ID(); ?> -->


<?php get_template_part('Components/Modules/Module', 'Artist', array( 'artist' => get_field('edition_artist'),  'bg' =>  false )); ?>

