<?php
    $id = $args['id'];
    $account = $args['account'];
    $hashtag = $args['hashtag'];
    $bg = $args['bg'];

    wp_enqueue_style('sbi_styles_custom'); ?>


    <section class="mod_instafeed <?php echo $bg ? '-backgrounded' : ''; ?>">
        <div class="mod_publication wrapper">
            <?php echo do_shortcode('[instagram-feed feed="' . $id . '"]'); ?>
        </div>
    </section>
