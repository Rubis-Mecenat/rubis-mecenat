<?php
/**
 * @package rubismecenat
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header -red grid gap-0">

        <div class="m-6col mod_cover is-relative">

            <?php rubismecenat_post_thumbnail( get_the_ID() ); ?>
            
            <div class="content-absolute">
                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
            </div>
        </div>

        <div class="m-6col mod_content flex -column -center-y -center-x gap-xl">
            <div class="body-title">
                <?php the_content(); ?>
            </div>

            <a href="#" class="btn -round -big -red -hover-black">
				<?php get_template_part('Components/Svgs/svg', "ArrowDown"); ?>
            </a>
        </div><!-- .entry-content -->
        
	</header><!-- .entry-header -->



    <?php 
        $child_args = array(
            'post_parent' => $post->ID, // The parent id.
            'post_type'   => 'project',
            'post_status' => 'publish'
        );
        
        $children = get_children( $child_args ); ?>

        <?php if( $children) : foreach($children as $child) : ?>

            <article >
                <a href="<?php the_permalink($child->ID); ?>" class="entry-header -linked -wrapped grid gap-0">

                    <div class="m-6col">
                        <?php echo rubismecenat_post_thumbnail( $child->ID, 'full' ); ?>
                    </div>

                    <div class="m-6col mod_content flex -center-y">
                        <div class="">
                            <div class="mod_title">
                                <h2 class="h2 mb-m"><?php echo $child->post_title; ?></h2>
                            </div>
                            <div class="body -big">
                                <?php echo $child->post_excerpt; ?>
                            </div>
                        </div>
                    </div><!-- .entry-content -->
                    
                    <span class="mod_button flex -center-y -center-x">
                        <?php get_template_part('Components/Svgs/Svg', 'ArrowRight'); ?>
                    </span>
                </a>
            </article>

        <?php endforeach; endif; ?>
        

    <section>

    </section>

</article><!-- #post-<?php the_ID(); ?> -->
