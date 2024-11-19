<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package rubismecenat
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        <?php the_field('project_artiste'); ?>
	</header><!-- .entry-header -->

	<?php rubismecenat_post_thumbnail(); ?>

	<div class="entry-content">
		<?php the_content(); ?>

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

        
        <div>
            <?php 
                $artist = get_field('project_artists');
                $args = array(
                    'artist'   => $artist
                );
                get_template_part('Components/Modules/Module', 'Artist', $args);
            ?>
        </div>
       

	</div><!-- .entry-content -->



</article><!-- #post-<?php the_ID(); ?> -->
