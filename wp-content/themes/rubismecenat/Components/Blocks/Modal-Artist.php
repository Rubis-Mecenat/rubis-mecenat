<?php 
    $artist = get_field('edition_artist');
    $date = get_field('edition_date');
    $editor = get_field('edition_editor');
?>

<article class="modal-artist">
    <div class="grid">

        <div class="t-12col m-6col flex -center modal-media m:mb-l">
            <?php the_post_thumbnail('theme_medium'); ?>
        </div>

        <div class="m-1col"></div>

        <div class="t-12col m-5col modal-content">
            
            <div class="mb-m">
                <h3 class="h4"><?php the_title(); ?></h3>
            </div>

            <div class="mb-l">
                <p class="body"><?php the_excerpt(); ?></p>
            </div>

            <div class="body mb-s">

                <?php if( get_field('artist_instagram', $artist->ID) ) : ?>
                    <a class="flex gap-s -center-y mb-s btn -circled-picto" target="_blank" href="<?php the_field('artist_instagram', $artist->ID); ?>">
                        <span class="picto"><?php get_template_part('Components/Svgs/Svg', "Instagram"); ?></span>
                    <span class="body">#<?php echo the_title(); ?></span>
                    </a>
                <?php endif; ?>

                <?php if( get_field('artist_website', $artist->ID) ) : ?>
                    <a class="flex gap-s -center-y btn -circled-picto" target="_blank" href="<?php the_field('artist_website', $artist->ID); ?>">
                        <span class="picto"><?php get_template_part('Components/Svgs/Svg', "Link"); ?></span>
                        <span class="body"><?php pll_e("Site Internet de l'artiste"); ?></span>
                    </a>
                <?php endif; ?>
            </div>
<!-- 
            <a href="<?php the_permalink(); ?>" data-slug="<?php echo get_post_field( 'post_name', get_post() );?>" class=" -block js-load-modal flex gap-s -center-y btn -circled-picto">
                <span class="picto"><?php get_template_part( 'Components/Svgs/Svg', 'Plus' ); ?></span>
                <span class="body"><?php pll_e('Tous les détails'); ?></span>
            </a> -->
        </div>

    </div>

</article>
