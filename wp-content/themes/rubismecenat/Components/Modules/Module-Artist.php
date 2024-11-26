<?php
    $artist = $args['artist'];
    $bg = $args['bg'];
?>


<?php if($artist ) : ?>
    <section class="mod_artist <?php echo $bg ? '-bordered' : ''; ?>">

        <div class="mod_publication wrapper">

            <header class="mod_header txt-center mb-xl">
                <h2><?php echo $artist->post_title; ?></h2>
            </header>
            
            <?php if( $artist ): ?>
                <article>
                    
                <a class="-block" href="<?php echo get_permalink($artist->ID); ?>">
                    
                        <div class="grid gap-xl">
                            <div class="s-6col">
                                <div class="body mb-s">
                                    <?php echo $artist->post_content; ?>
                                </div>
                            </div>

                            <div class="s-6col">
                                <?php echo get_the_post_thumbnail( $artist->ID, 'full' ); ?>
                            </div>
                        </div>
                    </a>

                </article>
            <?php endif; ?>

        </div>

    </section>
    <?php endif; ?>