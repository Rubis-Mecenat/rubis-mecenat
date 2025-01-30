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
                
                <div class="grid">
                    <div class="content-container t-12col m-5col">

                        <a class="-block" href="<?php echo get_permalink($publication->ID); ?>">
                            <header class="mb-l">
                                <h2 class="h2 mb-xxs"><?php  echo $publication->post_title; ?></h2>    

                                <?php if( get_field('project_artists', $publication->ID) ) : ?>
                                    <p class="h2 -other mb-s">
                                        <?php $artists = get_field('project_artists', $publication->ID);
                                            foreach( $artists as $key => $artist) : ?>
                                                <span><?php echo $key > 0 ? " & " : '';  echo $artist->post_title; ?></span>
                                        <?php endforeach; ?>
                                    </p>
                                <?php endif; ?>
                                
                                <div class="mb-s">

                                    <div class="h3 -light mb-0">
                                        <?php echo wp_kses_post( get_field('project_subtitle', $publication->ID ) ); ?>
                                    </div>
                                    
                                    <?php if( get_field('project_place', $publication->ID) ) : ?>
                                        <p class="h3 -light mb-0"><?php the_field('project_place', $publication->ID); ?></p>
                                    <?php endif; ?>

                                    <?php if( get_field('project_date', $publication->ID) ) : ?>
                                        <p class="h3 -light mb-0"><?php the_field('project_date', $publication->ID); ?></p>
                                    <?php endif; ?>
                                </div>

                                <div class="h3 -light">
                                    <?php the_field('project_practical', $publication->ID); ?>
                                </div>
                            </header>
                        </a>

                            <div class="body mb-m">
                                <?php echo mb_strimwidth($publication->post_content, 0, 800, '...'); ?>
                            </div>

                        <a class="-block" href="<?php echo get_permalink($publication->ID); ?>">
                            <footer class="on-desktop">
                                <span class="action btn" href="<?php echo get_permalink($publication->ID); ?>">
                                    <?php get_template_part('Components/Svgs/Svg', 'ArrowRight'); ?>
                                </span>
                            </footer>
                        </a>

                    </div>
                    <div class="img-container t-12col m-6col -end">
                        <a class="-block" href="<?php echo get_permalink($publication->ID); ?>">
                            <?php rubismecenat_post_thumbnail( $publication->ID, 'theme_medium' ); ?>
                        </a>
                    </div>

                </div>
                </a>

            </article>
        <?php endif; ?>

    </div>

</section>