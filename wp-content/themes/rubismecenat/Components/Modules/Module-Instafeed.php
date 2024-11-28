<?php
    $id = $args['id'];
    $account = $args['account'];
    $hashtag = $args['hashtag'];
    $bg = $args['bg'];
?>


    <section class="mod_instafeed <?php echo $bg ? '-backgrounded' : ''; ?>">


        <header class="mod_header wrapper mb-xl flex -center-y gap-s">
            <span class="btn -round -small -clean"><?php get_template_part('Components/Svgs/Svg', "Instagram"); ?></span>
            <h2><?php echo $hashtag; ?></h2>
        </header>

        <div class="mod_publication wrapper">

            <?php echo do_shortcode('[insta-gallery id="' . $id . '"]'); ?>
        </div>

    </section>
