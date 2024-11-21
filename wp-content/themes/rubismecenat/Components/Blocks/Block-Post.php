<?php 

    ?>

<article class="block-post">
    <a 
        href="<?php the_permalink(); ?>" 
        data-slug="<?php echo get_post_field( 'post_name', get_post() );?>"
        data-type="Post"
        class="js-load-modal">

        <?php the_post_thumbnail('medium'); ?>
        <h3><?php the_title(); ?></h3>
    </a>
</article>
