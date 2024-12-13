
<article class="slide_project entry-header">

    <figure class="slide_cover">
        <?php the_post_thumbnail(); ?>
    </figure>

    <div class="h-full grid gap-0 flex m:-column">
                        
        <div class="m-6col mod_cover is-relative on-desktop"></div>
                            
        <div class="t-12col m-6col mod_content flex -center-y">
            <div class="body-title">
                <a href="<?php the_permalink(); ?>" class="-block">

                    <div class="d:mb-l">
                        <h3 class="h3">
                            <?php the_title(); ?></h3>

                        <p class="h3 -other -italic">
                            <?php the_field('project_subtitle'); ?></p>

                        <p class="h3 -other">
                            <?php the_field('project_place'); ?></p>

                        <p class="-light">
                            <?php the_field('project_artiste'); ?></p>
                    </div>

                    <span class="btn -circled-arrow on-desktop">
                        <?php get_template_part('Components/Svgs/Svg', "ArrowRight"); ?>
                    </span>
                </a>
            </div>
        </div>

    </div>


</article>
