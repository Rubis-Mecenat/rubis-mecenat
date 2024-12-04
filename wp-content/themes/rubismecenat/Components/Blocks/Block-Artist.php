<?php 

?>

<article class="block-artist">
    <a 
        href="<?php the_permalink(); ?>" 
        data-slug="<?php echo get_post_field( 'post_name', get_post() );?>"
        data-type="<?php echo get_post_type(); ?>"
        class="js-load-modal -block">

        <div class="block-edition__image mb-m">
            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('full'); ?>
            <?php else: ?>
                <div class="block_placeholder"></div>
            <?php endif; ?>

            <span class="overlay flex -center">
                <?php get_template_part('Components/Svgs/Svg', 'Plus'); ?>
            </span>
        </div>



        <div class="">
            <h3 class="h3 -other mb-xxs"><?php the_title(); ?></h3>
        </div>

    </a>
</article>
