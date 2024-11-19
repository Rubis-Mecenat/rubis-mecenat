<?php
/**
 * Template part for displaying project
 *
 * @package rubismecenat
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
        <iframe src="<?php the_field('video_player'); ?>?autoplay=0&amp;loop=0&amp;controls=1&amp;muted=0" width="1500" height="844" frameborder="0" title="ART(ist) Geert Goiris" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>
	</header><!-- .entry-header -->


	<div class="entry-content grid">
        <div class="m-6col">
            <h1 class="entry-title"><?php the_title(); ?></h1>
            <p><?php the_field('video_artist'); ?></p>
        </div>

        <div class="m-6col">
            <?php the_content(); ?>
        </div>
	</div><!-- .entry-content -->



</article><!-- #post-<?php the_ID(); ?> -->
