<?php
/**
 * @package rubismecenat
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header grid gap-0">

        <div class="t-12col m-6col mod_cover is-relative">

            <?php rubismecenat_post_thumbnail( get_the_ID() ); ?>

        </div>

        <div class="t-12col m-6col mod_content flex -column -center-y -center-x gap-xl">
            
            <div class="body-title">
                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                <?php the_content(); ?>
            </div>

            <a href="#programmes" class="btn -circled-arrow on-desktop">
				<?php get_template_part('Components/Svgs/Svg', "ArrowDown"); ?>
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

            <article id="programmes">
                <a href="<?php the_permalink($child->ID); ?>" class="entry-header -linked -wrapped grid gap-0">

                    <div class="t-12col d:hide">
                        <h2 class="h2 mb-m"><?php echo $child->post_title; ?></h2>
                    </div>

                    <div class="t-12col m-6col">
                        <?php echo rubismecenat_post_thumbnail( $child->ID, 'full' ); ?>
                    </div>

                    <div class="t-12col m-6col mod_content flex -center-y">
                        <div class="">
                            <div class="m:hide mod_title">
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
