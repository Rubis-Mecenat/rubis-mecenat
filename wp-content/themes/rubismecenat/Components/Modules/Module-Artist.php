<?php
    $artist = $args['artist'];
    $bg = isset( $args['bg'] ) ? $args['bg'] : '' ;
    $border = isset( $args['border'] ) ? $args['border'] : '' ;
?>


<?php if($artist ) : ?>
    <section class="mod_artist mb-xxl <?php echo $bg ? '-bg' : ''; ?> <?php echo $border ? '-bordered' : ''; ?>">

        <div class="mod_publication wrapper">

            <header class="mod_header txt-center mb-xl">
                <h2><?php echo $artist->post_title; ?></h2>
            </header>
            
            <?php if( $artist ): ?>
                <article>
                    
                        <div class="grid gap-xl">
                            <div class="s-6col">
                                <div class="body -styled mb-xl">
                                    <?php echo wpautop($artist->post_content); ?>
                                </div>
                                <div class="body mb-s">

                                    <?php if( get_field('artist_instagram', $artist->ID) ) : ?>
                                        <a class="flex gap-s -center-y mb-s" target="_blank" href="<?php the_field('artist_instagram', $artist->ID); ?>">
                                            <span class="btn -round -small -black"><?php get_template_part('Components/Svgs/Svg', "Instagram"); ?></span>
                                        <span>#<?php echo $artist->post_title; ?></span>
                                        </a>
                                    <?php endif; ?>

                                    <?php if( get_field('artist_website', $artist->ID) ) : ?>
                                        <a class="flex gap-s -center-y" target="_blank" href="<?php the_field('artist_website', $artist->ID); ?>">
                                            <span class="btn -round -small -black"><?php get_template_part('Components/Svgs/Svg', "Link"); ?></span>
                                        <span><?php pll_e("Site Internet de l'artiste"); ?></span>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="s-6col">
                                <?php rubismecenat_post_thumbnail( $artist->ID, 'full' ); ?>
                            </div>
                        </div>

                </article>
            <?php endif; ?>

        </div>

    </section>
    <?php endif; ?>