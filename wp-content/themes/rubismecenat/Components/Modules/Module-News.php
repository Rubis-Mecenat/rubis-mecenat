<?php
    $title = $args['title'];
    $publication = $args['publication'];
?>


<section class="mod_carousel">

    <header class="mod_header wrapper">
        <h2><?php echo $title; ?></h2>
    </header>

    <div class="mod_publication wrapper">
        <?php if( $publication ): ?>
            <article class="grid">
                <div class="s-6col">
                    <a href="<?php echo get_permalink($publication->ID); ?>"><?php  echo $publication->post_title; ?></a>
                </div>
                <div class="s-6col">
                    <?php echo get_the_post_thumbnail( $publication->ID, 'full' ); ?>
                </div>
            </article>
        <?php endif; ?>

    </div>

</section>