<?php
/**
 * Template part for displaying project
 *
 * @package rubismecenat
 */

 $artists = get_field('edition_artist');


?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    <div class="breadcrumb_container -editions">
        <?php get_template_part('Components/Modules/Module', "Breadcrumbs"); ?>
    </div>

    <div class="grid wrapper d:mt-xxl mb-xxl">

        <div class="entry-cover t-12col m-5col">

            <?php the_post_thumbnail('large'); ?>
                
        </div><!-- .entry-header -->

    
        <div class="t-12col m-6col -end entry-content">
            <div class="m-6col">
                <h1 class="entry-title h2 -other mb-s"><?php the_title(); ?></h1>
                <?php if ($artists) : ?>
                    <div class="mt-s mb-s">
                        <?php
                            foreach ($artists as $artist) {
                                echo '<h2 class="h2 mb-xs">' . esc_html($artist->post_title) . '</h2>';
                            }
                        ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="m-6col body">
                <?php the_content(); ?>

                <div class="mt-xl">
                    <?php if( get_field('edition_file') ) : ?>
                        <a href="<?php echo get_field('edition_file')["url"]; ?>" target="_blank" class="flex gap-s -center-y mb-m btn -filled-picto">
                            <p class="picto">
                                <?php get_template_part('Components/Svgs/Svg',  'Download'); ?>
                            </p>
                            
                            <p class="label flex -column">
                                <span class="body -bold"><?php pll_e('Récupérer le fichier'); ?></span>
                                <span class="body -light"><?php echo get_field('edition_file')["filesize"]; ?></span>
                            </p>
                        </a>
                    <?php endif; ?>

                    <?php if( get_field('edition_link') ) : ?>
                        <a href="<?php echo get_field('edition_link'); ?>" target="_blank" class="flex gap-s -center-y btn -filled-picto">
                            <p class="picto">
                                <?php get_template_part('Components/Svgs/Svg',  'Link'); ?>
                            </p>

                            <p class="label flex -column">
                                <span class="body -bold"><?php pll_e('Voir le site de l\'éditeur'); ?></span>
                            </p>
                        </a>
                    <?php endif; ?>
                </div>
            </div>

        </div><!-- .entry-content -->

        <div class="s-1col"></div>
    </div>

</article><!-- #post-<?php the_ID(); ?> -->


<?php get_template_part('Components/Modules/Module', 'Artist', array( 'artist' => get_field('edition_artist')[0],  'bg' =>  false )); ?>

<?php get_template_part('Components/Modules/Module', 'News', array( 'title' => 'Projet lié',  'publication' =>  get_field('edition_projects') )); ?>
