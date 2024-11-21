<?php 
    $artist = get_field('edition_artist');
    $date = get_field('edition_date');
    $editor = get_field('edition_editor');

    ?>

<article class="block-edition">
    <a 
        href="<?php the_permalink(); ?>" 
        data-slug="<?php echo get_post_field( 'post_name', get_post() );?>" 
        data-type="Video"
        class="js-load-modal">

        <?php the_post_thumbnail('medium'); ?>
        <h3><?php the_title(); ?></h3>
        <p><?php echo $artist ? $artist->post_title : ''; ?></p>
        <p><?php echo $date; ?></p>
    </a>
</article>
