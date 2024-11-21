<?php
/**
 * @package rubismecenat
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="mod_header-page grid gap-xl">

        <div class="left is-relative entry-content m-6col">
            <?php rubismecenat_post_thumbnail(); ?>
            <div class="content-absolute">
                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
            </div>
        </div>

        <div class="right entry-content m-6col flex center-y">
            <?php the_content(); ?>
        </div><!-- .entry-content -->
        
	</header><!-- .entry-header -->



    <?php 
        $child_args = array(
            'post_parent' => $post->ID, // The parent id.
            'post_type'   => 'page',
            'post_status' => 'publish'
        );
        
        $children = get_children( $child_args ); ?>

        <?php if( $children) : foreach($children as $child) : ?>

            <article>
                <a href="<?php the_permalink($child->ID); ?>" class="grid gap-l">
                    <div class="s-6col">
                        <?php echo get_the_post_thumbnail( $child->ID, 'full' ); ?>
                    </div>
                    <div class="s-6col flex column center-x">
                        <h2><?php echo $child->post_title; ?></h2>
                        <?php echo $child->post_excerpt; ?>
                    </div>
                </a>
            </article>

        <?php endforeach; endif; ?>
        

    <section>

    </section>

</article><!-- #post-<?php the_ID(); ?> -->
