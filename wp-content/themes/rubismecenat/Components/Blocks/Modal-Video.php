<?php 
    $artist = get_field('edition_artist');
    $date = get_field('edition_date');
    $editor = get_field('edition_editor');

    ?>

<article class="block-edition">
    <div class="grid">

    <div class="m-6col">
        <iframe src="<?php the_field('video_player'); ?>?autoplay=0&amp;loop=0&amp;controls=1&amp;muted=0" width="1500" height="844" frameborder="0" title="ART(ist) Geert Goiris" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>
    </div>

    <div class="m-6col">
        

        <h3><?php the_title(); ?></h3>
        <p><?php echo $artist ? $artist->post_title : ''; ?></p>
        <p><?php echo $date; ?></p>
        <p><?php echo $editor; ?></p>

        <a href="<?php the_permalink(); ?>" data-slug="<?php echo get_post_field( 'post_name', get_post() );?>" class="js-load-modal">
            <?php pll_e('Tous les détails'); ?>
        </a>
        </div>


    </div>

</article>
