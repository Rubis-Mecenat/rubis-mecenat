<?php
/**
 * Template part for displaying project
 *
 * @package rubismecenat
 */

 $artist = get_field('edition_artist');


?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header wrapper">
        
        <div class="project_breadcrumb s-12col">
            <?php get_template_part('Components/Modules/Module', "Breadcrumbs"); ?>
        </div>


        <?php if( get_field('edition_file') ) : ?>
                <iframe class="" src="<?php echo get_field('edition_file')["url"]; ?>"></iframe>

            <?php else : ?>
                <?php the_post_thumbnail('medium'); ?>
                
            <?php endif; ?>
	</header><!-- .entry-header -->


	<div class="entry-content wrapper grid">
        <div class="m-6col">
            <h1 class="entry-title h2 -other mb-s"><?php the_title(); ?></h1>
            <h2 class="h2"><?php echo $artist ? $artist->post_title : '' ?></h2>
        </div>

        <div class="m-6col">
            <?php the_content(); ?>
        </div>
	</div><!-- .entry-content -->


</article><!-- #post-<?php the_ID(); ?> -->


<?php get_template_part('Components/Modules/Module', 'Artist', array( 'artist' => get_field('edition_artist'),  'bg' =>  false )); ?>

