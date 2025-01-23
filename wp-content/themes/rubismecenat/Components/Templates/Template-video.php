<?php
/**
 * Template part for displaying project
 *
 * @package rubismecenat
 */

 $artist = get_field('edition_artist');

 $categories = get_the_terms( $post->ID, 'video_cat' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header -video">
        <div class="breadcrumb_container t-12col">
            <?php get_template_part('Components/Modules/Module', "Breadcrumbs"); ?>
        </div>

        <?php if(get_field('video_player')) : ?>
            <iframe src="<?php the_field('video_player'); ?>?autoplay=0&amp;loop=0&amp;controls=1&amp;muted=0" frameborder="0" title="<?php the_title(); ?>" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>
        <?php else : ?>
            <?php rubismecenat_post_thumbnail( get_the_ID(), 'theme_large' ); ?>
        <?php endif; ?>
	</header><!-- .entry-header -->


	<div class="entry-content wrapper grid">
        <div class="t-12col m-6col">
            <p class="mb-s">
                <?php 
                	foreach ( $categories as $term ) {
                        echo '<span class="h5">' . $term->name . '</span>';
                    }
                ?>
            </p>
            <h1 class="entry-title h2 -other mb-s"><?php the_title(); ?></h1>
            <h2 class="h2"><?php echo $artist ? $artist->post_title : '' ?></h2>
        </div>

        <div class="t-12col m-6col body -styled">
            <?php the_content(); ?>
        </div>
	</div><!-- .entry-content -->



</article><!-- #post-<?php the_ID(); ?> -->



<?php get_template_part('Components/Modules/Module', 'Artist', array( 'artist' => get_field('edition_artist') )); ?>


<?php 
    if(  get_field('edition_projects')) : 
        get_template_part('Components/Modules/Module', 'News', array( 'title' => 'Projet lié',  'publication' =>  get_field('edition_projects') )); 
    endif;
?>


