<?php 
    $artist = get_field('edition_artist');
    $date = get_field('edition_date');
    $editor = get_field('edition_editor');
?>

<article class="modal-artist">
    <div class="grid">

        <div class="m-6col flex -center">
            <?php the_post_thumbnail('medium'); ?>
        </div>

        <div class="m-1col"></div>

        <div class="m-5col">
            
            <div class="mb-m">
                <h3 class="h4"><?php the_title(); ?></h3>
            </div>

            <div class="mb-l">
                <p class="body"><?php the_excerpt(); ?></p>
            </div>

            <a href="<?php the_permalink(); ?>" data-slug="<?php echo get_post_field( 'post_name', get_post() );?>" class=" -block js-load-modal flex gap-s -center-y btn -circled-picto">
                <span class="picto"><?php get_template_part( 'Components/Svgs/Svg', 'Plus' ); ?></span>
                <span class="body"><?php pll_e('Tous les détails'); ?></span>
            </a>
        </div>

    </div>

</article>
