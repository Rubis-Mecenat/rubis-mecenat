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
        <div class="breadcrumb_container s-12col">
            <?php get_template_part('Components/Modules/Module', "Breadcrumbs"); ?>
        </div>

        <iframe src="<?php the_field('video_player'); ?>?autoplay=0&amp;loop=0&amp;controls=1&amp;muted=0" frameborder="0" title="<?php the_title(); ?>" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>
	</header><!-- .entry-header -->


	<div class="entry-content wrapper grid">
        <div class="m-6col">
            <h1 class="entry-title h2 -other mb-s"><?php the_title(); ?></h1>
            <h2 class="h2"><?php echo $artist ? $artist->post_title : '' ?></h2>
        </div>

        <div class="m-6col body">
            <?php the_content(); ?>
        </div>
	</div><!-- .entry-content -->



</article><!-- #post-<?php the_ID(); ?> -->



<?php get_template_part('Components/Modules/Module', 'Artist', array( 'artist' => get_field('edition_artist') )); ?>



