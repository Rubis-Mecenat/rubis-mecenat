<?php 
    $artist = get_field('edition_artist');
    $date = get_field('edition_date');
    $editor = get_field('edition_editor');

    ?>

<article class="modal-video">
    <div class="grid">

        <div class="m-6col">
            <iframe src="<?php the_field('video_player'); ?>?autoplay=0&amp;loop=0&amp;controls=1&amp;muted=0" width="1500" height="844" frameborder="0" title="ART(ist) Geert Goiris" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>
        </div>
        
        <div class="m-1col"></div>

        <div class="m-5col">

            <div class="mb-m">
                <h3 class="h4"><?php the_title(); ?></h3>
                <p class="body-title"><?php echo $artist ? $artist->post_title : ''; ?></p>
            </div>

            <div class="mb-l">
                <p class="body -light"><?php echo $date; ?></p>
            </div>

            <div class="mb-l">
                <p class="body"><?php the_excerpt(); ?></p>
            </div>

            <a href="<?php the_permalink(); ?>" data-slug="<?php echo get_post_field( 'post_name', get_post() );?>" class=" -block flex gap-s -center-y btn -circled-picto">
                <span class="picto"><?php get_template_part( 'Components/Svgs/Svg', 'Plus' ); ?></span>
                <span class="body"><?php pll_e('Tous les détails'); ?></span>
            </a>
        </div>


    </div>

</article>
