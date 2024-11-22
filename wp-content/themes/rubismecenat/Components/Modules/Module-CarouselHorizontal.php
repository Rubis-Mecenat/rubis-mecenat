<?php
    $title = $args['title'];
    $firstContent = $args['firstContent'];
    $posts = $args['relations'];
?>


<section class="mod_carousel-horizontal <?php echo $bg ? '-bg' : ''; ?>">

    <div class="swiper carousel-horizontal">



        <?php if ($posts) : ?>
            <div class="swiper-wrapper">

                <header class="swiper-slide mod_title grid swiper-slide">
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

                <?php foreach ($posts as $post) : setup_postdata($post); ?>
                        
                    <div class="swiper-slide">
                        <?php get_template_part('Components/Blocks/Slide', 'Project'); ?>
                    </div>

                <?php endforeach; ?>

            </div>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>

    </div>

</section>