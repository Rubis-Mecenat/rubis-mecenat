<?php
/**
 * @package rubismecenat
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php rubismecenat_post_thumbnail(); ?>

	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->


    <?php 
        $child_args = array(
            'post_parent' => $post->ID, // The parent id.
            'post_type'   => 'page',
            'post_status' => 'publish'
        );
        
        $children = get_children( $child_args );?>

        <?php if( $children) : foreach($children as $child) :  ?>

            <?php echo $child->post_title; ?>
            <?php echo get_the_post_thumbnail( $child->ID, 'full' ); ?>

        <?php endforeach; endif; ?>
        

    <section>

    </section>

</article><!-- #post-<?php the_ID(); ?> -->
