<?php
    $title = $args['title'];
    $firstContent = $args['firstContent'];
    $posts = $args['relations'];
?>


<section class="mod_carousel-horizontal">

    <div class="swiper carousel-horizontal wrapper">

        <?php if ($posts) : ?>
            <div class="swiper-wrapper">

                <header class="swiper-slide ">
                    <div class="entry-header -fullwrapped -red grid gap-0">
                        
                        <div class="m-6col mod_cover is-relative">
                            <div class="content-absolute">
                                <h1 class="h1"><?php echo $title; ?></h1>
                            </div>
                        </div>
                        
                        <div class="m-6col mod_content flex -center-y">
                            <div class="body-title">
                                <div class="mb-m">
                                    <?php echo $firstContent; ?>
                                </div>

                                <div class="links">
                                    <?php foreach ($posts as $key => $post) : setup_postdata($post); ?>
                                        <p class="">
                                            <button class="js-slide-trigger h3 -bold" data-slide="<?php echo $key+1; ?>">
                                                <?php the_title(); ?>
                                                <?php get_template_part('Components/Svgs/Svg', 'ArrowRightSmall'); ?>
                                            </button>
                                        </p>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </header><!-- .entry-header -->
                

                <?php foreach ($posts as $post) : setup_postdata($post); ?>
                        
                    <div class="swiper-slide">
                        <?php get_template_part('Components/Blocks/Slide', 'Project'); ?>
                    </div>

                <?php endforeach; ?>

            </div>
            <?php wp_reset_postdata(); ?>

            <div class="navigation flex gap-m -space">
                <div class="swiper-button prev">
                    <?php get_template_part('Components/Svgs/Svg', 'ArrowLeft'); ?>
                </div>
                <div class="swiper-button next">
                    <?php get_template_part('Components/Svgs/Svg', 'ArrowRight'); ?>
                </div>
            </div>

            <div class="swiper-scrollbar"></div>

        <?php endif; ?>

    </div>

</section>