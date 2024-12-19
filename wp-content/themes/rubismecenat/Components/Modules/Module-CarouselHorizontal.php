<?php
    $title = $args['title'];
    $firstContent = $args['firstContent'];
    $posts = $args['relations'];
?>


<section class="mod_carousel-horizontal">

    <header class="on-mobile">
        <div class="entry-header -fullwrapped -red grid gap-0">
            
            <div class="t-12col mod_cover is-relative">
                <div class="content-absolute">
                    <h1 class="h1"><?php echo $title; ?></h1>
                </div>
            </div>
            
            <div class="t-12col mod_content -header flex -center-y">
                <div class="content-container body-title mb-l">
                    <div class="mb-m">
                        <?php echo $firstContent; ?>
                    </div>

                    <div class="links flex -column m:gap-s on-desktop">
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

    <div class="swiper carousel-horizontal d:wrapper m:wrapper-padding">

        <?php if ($posts) : ?>
            <div class="swiper-wrapper">

                <header class="swiper-slide on-desktop">
                    <div class="entry-header -fullwrapped -red grid gap-0">
                        
                        <div class="t-12col m-6col mod_cover is-relative">
                            <div class="content-absolute">
                                <h1 class="h1"><?php echo $title; ?></h1>
                            </div>
                        </div>
                        
                        <div class="t-12col m-6col mod_content flex -center-y">
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

            <div class="swiper-scrollbar on-desktop"></div>
            <div class="swiper-pagination on-mobile"></div>

        <?php endif; ?>

    </div>

</section>