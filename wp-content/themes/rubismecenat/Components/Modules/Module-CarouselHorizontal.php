<?php
    $title = $args['title'];
    $firstContent = $args['firstContent'];
    $posts = $args['relations'];

    var_dump($posts);
?>


<section class="mod_carousel <?php echo $bg ? '-bg' : ''; ?>">

    <div class="swiper">

        <header class="swiper-slide mod_title grid">
            <div class="m-6col">
                <h2 class="">
                    <?php echo $title; ?>
                </h2>
            </div>
            <div class="m-6col">
                <div class="">
                    <?php echo $firstContent; ?>
                </div>
            </div>
        </header>

        <?php if ($posts) : ?>

            <?php foreach ($posts as $post) : setup_postdata($post); ?>
                    
                <div class="swiper-slide">
                    <?php get_template_part('Components/Blocks/Slide', 'Project'); ?>
                </div>

            <?php endforeach; ?>

            <?php wp_reset_postdata(); ?>
        <?php endif; ?>

    </div>

</section>