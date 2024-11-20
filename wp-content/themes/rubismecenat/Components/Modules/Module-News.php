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
                    <a class="h2" href="<?php echo get_permalink($publication->ID); ?>"><?php  echo $publication->post_title; ?></a>
                </div>
                <div class="s-6col">
                    <?php echo get_the_post_thumbnail( $publication->ID, 'full' ); ?>
                </div>
            </article>
        <?php endif; ?>

    </div>

</section>