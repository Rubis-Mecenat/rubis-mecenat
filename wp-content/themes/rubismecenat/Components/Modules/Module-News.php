<?php
    $title = $args['title'];
    $publication = $args['publication'];
?>


<section class="mod_news">

    <header class="mod_header">
        <h2 class="h2 txt-center mt-xxl"><?php echo $title; ?></h2>
    </header>

    <div class="mod_publication">
        <?php if( $publication ): ?>
            <article class="">
                <a class="-block" href="<?php echo get_permalink($publication->ID); ?>">
                
                    <div class="grid gap-xl">
                        <div class="s-6col">

                            <header class="mb-l">
                                <h2 class="h2 mb-xxs"><?php  echo $publication->post_title; ?></h2>    
                                <div class="h2 -other mb-xxs">
                                    <?php the_field('project_subtitle', $publication->ID); ?>
                                </div>
                                <div>
                                    <?php the_field('project_place', $publication->ID); ?></div>
                                <div>
                                    <?php the_field('project_artiste', $publication->ID); ?>
                                </div>
                                <div class="h3 -light">
                                    <?php the_field('project_practical', $publication->ID); ?>
                                </div>
                            </header>

                            <div class="body mb-s">
                                <?php echo $publication->post_content; ?>
                            </div>

                            <footer>
                                <span class="action" href="<?php echo get_permalink($publication->ID); ?>">
                                    <?php get_template_part('Components/Svgs/Svg', 'ArrowRight'); ?>
                                </span>
                            </footer>
                        </div>

                        <div class="s-6col">
                            <?php echo get_the_post_thumbnail( $publication->ID, 'full' ); ?>
                        </div>
                    </div>
                </a>

            </article>
        <?php endif; ?>

    </div>

</section>