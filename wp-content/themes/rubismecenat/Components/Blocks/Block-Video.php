<?php 
    $artists = get_field('edition_artist');
    $date = get_field('edition_date');
    $editor = get_field('edition_editor');

    ?>

<article class="block-video">
    <a 
        href="<?php the_permalink(); ?>" 
        data-slug="<?php echo get_post_field( 'post_name', get_post() );?>" 
        data-type="<?php echo get_post_type(); ?>"
        class="js-load-modal -block">

        <div class="block-video__image mb-m">
            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('theme_small'); ?>
            <?php else: ?>
                <div class="block_placeholder"></div>
            <?php endif; ?>

            <span class="overlay flex -center">
                <?php get_template_part('Components/Svgs/Svg', 'Plus'); ?>
            </span>
        </div>

        <div class="">

            <h3 class="h3 mb-xxs"><?php the_title(); ?></h3>

            <?php if ($artists) : ?>
                <h3 class="h3 -other mb-s">
                    <?php
                        foreach( $artists as $key => $artist) : ?>
                                <span><?php echo $key > 0 ? " & " : '';  echo $artist->post_title; ?></span>
                        <?php endforeach; ?>
                </h3>
            <?php endif; ?>

            <p class="body -big -light"><?php echo $date; ?></p>
        </div>

    </a>
</article>
