<?php
    $title = $args['title'];
    $publication = $args['publication'];
?>


<section class="mod_news -bordered">

    <header class="mod_header wrapper">
        <h2 class="h2 txt-center mb-xxl"><?php echo $title; ?></h2>
    </header>

    <div class="mod_publication wrapper">
        <?php if( $publication ): ?>
            <article class="">
                <a class="-block" href="<?php echo get_permalink($publication->ID); ?>">
                
                    <div class="grid">
                        <div class="s-5col">

                            <header class="mb-l">
                                <h2 class="h2 mb-xxs"><?php  echo $publication->post_title; ?></h2>    
                                <div class="h2 -other mb-xxs">
                                    <?php the_field('project_subtitle', $publication->ID); ?>
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

                            <div class="body mb-s">
                                <?php echo $publication->post_content; ?>
                            </div>

                            <footer>
                                <span class="action btn" href="<?php echo get_permalink($publication->ID); ?>">
                                    <?php get_template_part('Components/Svgs/Svg', 'ArrowRight'); ?>
                                </span>
                            </footer>
                        </div>
                        <div class="s-1col"></div>
                        <div class="s-6col">
                            <?php rubismecenat_post_thumbnail( $publication->ID, 'full' ); ?>
                        </div>
                    </div>
                </a>

            </article>
        <?php endif; ?>

    </div>

</section>