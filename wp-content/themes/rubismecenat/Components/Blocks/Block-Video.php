<?php 
    $artist = get_field('edition_artist');
    $date = get_field('edition_date');
    $editor = get_field('edition_editor');

    ?>

<article class="block-video">
    <a 
        href="<?php the_permalink(); ?>" 
        data-slug="<?php echo get_post_field( 'post_name', get_post() );?>" 
        data-type="<?php echo get_post_type(); ?>"
        class="js-load-modal -block">

        <?php if (has_post_thumbnail()) : ?>
            <div class="block-video__image mb-m">
                <?php the_post_thumbnail('full'); ?>
                <span class="overlay flex -center">
                    <?php get_template_part('Components/Svgs/Svg', 'Plus'); ?>
                </span>
            </div>
        <?php endif; ?>

        <div class="">
            <h3 class="h3 -other mb-xxs"><?php the_title(); ?></h3>
            <p class="h3 mb-xs"><?php echo $artist ? $artist->post_title : ''; ?></p>
            <p class="body -big -light"><?php echo $date; ?></p>
        </div>

    </a>
</article>
