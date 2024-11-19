<?php
    $title = $args['title'];
    $publication = $args['publication'];

    var_dump($publication);

?>


<section class="mod_carousel">

    <header class="mod_header">
        <h2><?php echo $title; ?></h2>
    </header>

    <div class="mod_publication">
        <?php if( $publication ): ?>
            <article>
                <a href="<?php echo get_permalink($publication->ID); ?>"><?php  echo $publication->post_title; ?></a>
                <?php echo get_the_post_thumbnail( $publication->ID, 'full' ); ?>
            </article>
        <?php endif; ?>

    </div>

</section>