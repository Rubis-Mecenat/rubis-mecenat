
<article class="slide_project entry-header">

    <figure class="slide_cover">
        <?php the_post_thumbnail(); ?>
    </figure>

    <div class="h-full grid gap-0 ">
                        
        <div class="m-6col mod_cover is-relative"></div>
                            
        <div class="m-6col mod_content flex -center-y">
            <div class="body-title">
                <a href="<?php the_permalink(); ?>" class="-block">

                    <div class="mb-l">
                        <h3 class="h3">
                            <?php the_title(); ?></h3>

                        <p class="h3 -other -italic">
                            <?php the_field('project_subtitle'); ?></p>

                        <p class="h3 -other">
                            <?php the_field('project_place'); ?></p>

                        <p class="-light">
                            <?php the_field('project_artiste'); ?></p>
                    </div>

                    <button class="btn -hover-black">
                        <?php get_template_part('Components/Svgs/svg', "CircledArrowRight"); ?>
                    </button>
                </a>
            </div>
        </div>

    </div>


</article>
