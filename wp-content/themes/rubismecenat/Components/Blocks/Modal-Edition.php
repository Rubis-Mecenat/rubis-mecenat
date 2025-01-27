<?php 
    $artists = get_field('edition_artist');
    $date = get_field('edition_date');
    $editor = get_field('edition_editor');
?>

<article class="modal-edition">
    <div class="grid">

        <div class="t-12col m-6col flex -center m:mb-xl modal-media">

            <?php if( get_field('edition_file') ) : ?>
                <iframe class="" src="<?php echo get_field('edition_file')["url"]; ?>"></iframe>

            <?php else : ?>
                <?php the_post_thumbnail('theme_medium'); ?>
                
            <?php endif; ?>

        </div>

        <div class="t-12col m-5col -end modal-content">
            
            <div class="mb-m">
                <h3 class="h4"><?php the_title(); ?></h3>
                <?php if ($artists) : ?>
                    <div class="mt-s">
                        <?php
                            foreach ($artists as $artist) {
                                echo '<p class="body-title">' . esc_html($artist->post_title) . '</p>';
                            }
                        ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="mb-l">
                <p class="body -light"><?php echo $editor; ?></p>
                <p class="body -light"><?php echo $date; ?></p>
            </div>

            <div class="mb-l">
                <p class="body"><?php the_excerpt(); ?></p>
            </div>

            <?php if( get_field('edition_file') ) : ?>
                <a href="<?php echo get_field('edition_file')["url"]; ?>" target="_blank" class="flex gap-s -center-y mb-m btn -filled-picto">
                    <p class="picto">
                        <?php get_template_part('Components/Svgs/Svg',  'Download'); ?>
                    </p>
                            
                    <p class="label flex -column">
                        <span class="body -bold"><?php pll_e('Récupérer le fichier'); ?></span>
                        <span class="body -light"><?php echo human_filesize($presskit['presskit_file']['filesize'], 0); ?></span>
                    </p>
                </a>

            <?php elseif( get_field('edition_link') ) : ?>
                <a href="<?php echo get_field('edition_link'); ?>" target="_blank" class="flex gap-s -center-y btn -filled-picto">
                    <p class="picto">
                        <?php get_template_part('Components/Svgs/Svg',  'Link'); ?>
                    </p>

                    <p class="label flex -column">
                        <span class="body -bold"><?php pll_e('Voir le site de l\'éditeur'); ?></span>
                    </p>
                </a>

            <?php else : ?>
                <a href="<?php the_permalink(); ?>" data-slug="<?php echo get_post_field( 'post_name', get_post() );?>" class=" -block flex gap-s -center-y btn -circled-picto">
                    <span class="picto"><?php get_template_part( 'Components/Svgs/Svg', 'Plus' ); ?></span>
                    <span class="body"><?php pll_e('Tous les détails'); ?></span>
                </a>

            <?php endif; ?>

        </div>

    </div>

</article>
