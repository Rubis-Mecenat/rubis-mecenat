<?php
    $title = $args['title'];
    $publication = $args['publication'];
?>


<section class="mod_news -bordered">

    <header class="mod_header wrapper">
        <h2 class="h2 txt-center m:mb-xl d:mb-xxl"><?php echo $title; ?></h2>
    </header>

    <div class="mod_publication wrapper">
        <?php if( $publication ): ?>
            <article class="">
                <a class="-block" href="<?php echo get_permalink($publication->ID); ?>">
                
                    <div class="grid">
                        <div class="content-container t-12col m-5col">

                            <header class="mb-l">
                                <h2 class="h2 mb-xxs"><?php  echo $publication->post_title; ?></h2>    
                                <div class="h2 -other mb-xxs">
                                    <?php echo wp_kses_post( get_field('project_subtitle', $publication->ID ) ); ?>
                                </div>
                                <div class="h3 -other mb-xxs">
                                    <?php the_field('project_place', $publication->ID); ?></div>
                                <div class="h3 -other mb-s">
                                    <?php the_field('project_artiste', $publication->ID); ?>
                                </div>
                                <div class="h3 -light">
                                    <?php the_field('project_practical', $publication->ID); ?>
                                </div>
                            </header>

                            <div class="body mb-m">
                                <?php echo mb_strimwidth($publication->post_content, 0, 800, '...'); ?>
                            </div>

                            <footer class="on-desktop">
                                <span class="action btn" href="<?php echo get_permalink($publication->ID); ?>">
                                    <?php get_template_part('Components/Svgs/Svg', 'ArrowRight'); ?>
                                </span>
                            </footer>
                        </div>
                        <div class="img-container t-12col m-6col -end">
                            <?php rubismecenat_post_thumbnail( $publication->ID, 'theme_medium' ); ?>
                        </div>
                    </div>
                </a>

            </article>
        <?php endif; ?>

    </div>

</section>