<?php
    $title = $args['title'];
    $publication = $args['publication'];
?>


<section class="mod_news">

    <header class="mod_header">
        <h2 class="txt-center mt-xxl"><?php echo $title; ?></h2>
    </header>

    <div class="mod_publication">
        <?php if( $publication ): ?>
            <article class="grid gap-xl">
                <div class="s-6col">

                    <header>
                        <h2 class="h2"><?php  echo $publication->post_title; ?></h2>    
                        <p><?php the_field('project_subtitle', $publication->ID); ?></p>
                        <p><?php the_field('project_place', $publication->ID); ?></p>
                        <p><?php the_field('project_artiste', $publication->ID); ?></p>
                        <p><?php the_field('project_practical', $publication->ID); ?></p>
                    </header>

                    <div><?php echo $publication->post_content; ?></div>

                    <footer>
                        <a class="btn" href="<?php echo get_permalink($publication->ID); ?>">
                        Suite
                        </a>
                    </footer>
                </div>
                <div class="s-6col">
                    <?php echo get_the_post_thumbnail( $publication->ID, 'full' ); ?>
                </div>
            </article>
        <?php endif; ?>

    </div>

</section>