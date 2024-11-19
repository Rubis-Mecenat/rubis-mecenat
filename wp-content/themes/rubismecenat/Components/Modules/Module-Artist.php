<?php
    $artist = $args['artist'];
?>


<section class="mod_artist">

    <div class="mod_publication">

        <?php if( $artist ): ?>
            <article>
                
                <h2><?php echo $artist->post_title; ?></h2>

                <div class="flex">  
                    <div>
                        <?php echo $artist->post_content; ?>
                    </div>
                    <div>
                        <?php echo get_the_post_thumbnail( $artist->ID, 'full' ); ?>
                    </div>
                </div>



            </article>
        <?php endif; ?>

    </div>

</section>