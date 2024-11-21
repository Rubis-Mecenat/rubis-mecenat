
<article class="block-edition">
    <a href="<?php the_permalink(); ?>" data-slug="<?php echo get_post_field( 'post_name', get_post() );?>" class="js-load-modal">
        <?php the_post_thumbnail('medium'); ?>
        <h3><?php the_title(); ?></h3>
    </a>
    <?php the_excerpt(); ?>
</article>
