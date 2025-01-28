<?php
/**
 * Template part for displaying project
 *
 * @package rubismecenat
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="project-header is-relative">

        <div class="breadcrumb_container t-12col">
            <?php get_template_part('Components/Modules/Module', "Breadcrumbs"); ?>
        </div>

        <div class="project-header-container is-relative">

            <div class="project_cover t-12col">
                <?php rubismecenat_post_thumbnail( get_the_ID(), 'theme_large' ); ?>
            </div>

            <div class="project_content grid -end-y h-full">

                <div class="project_titles t-12col m-5col -end flex -column -end-x">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                    <h2 class="h3 -other mb-s"><?php the_field('project_subtitle'); ?></h2>
                    <p class="body -big -light"><?php the_field('project_place'); ?></p>                                       
                    <?php if (get_field('project_date')) : ?>
                        <p class="body -big -light"><?php the_field('project_date'); ?></p>
                    <?php endif; ?>
                    <?php 
                        $artists = get_field('project_artists');
                        if ($artists) : 
                    ?>
                        <div class="mt-s">
                            <?php
                                foreach ($artists as $artist) {
                                    echo '<p>' . esc_html($artist->post_title) . '</p>';
                                }
                            ?>
                        </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>

	</header><!-- .entry-header -->


	<div class="wrapper project-content grid mb-xxl">

        <div class="t-12col m-6col body">
            <?php the_content(); ?>
        </div>
        
        <div class="project-right t-12col m-5col -end">
            <div class="mb-l">
                <?php the_field('project_practical'); ?>
            </div>

            <?php $presskit = get_field('project_presskit');
                if( $presskit ): ?>
                    <div class="project_presskit flex -column gap-m">
                        <a href="<?php echo $presskit['url']; ?>" target="_blank" class="flex gap-s -center-y btn -filled-picto">

                            <p class="picto">
                                <?php get_template_part('Components/Svgs/Svg',  'Download'); ?>
                            </p>

                            <p class="label flex -column">
                                <span class="body -bold"><?php echo $presskit['title']; ?></span>
                                <span class="body -light"><?php echo human_filesize($presskit['filesize'], 0); ?></span>
                            </p>

                        </a>
                    </div>       
            <?php endif; ?>
            
        </div>       

	</div><!-- .entry-content -->    

</article><!-- #post-<?php the_ID(); ?> -->


<?php get_template_part('Components/Modules/Module', 'Artist', array( 'artist' => get_field('project_artists')[0], 'border' => true )); ?>