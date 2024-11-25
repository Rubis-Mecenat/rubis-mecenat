
<article class="block-project">
    <a href="<?php the_permalink(); ?>">
        <?php if (has_post_thumbnail()) : ?>
            <div class="block-project__image mb-m">
                <?php the_post_thumbnail('full'); ?>
            </div>
        <?php endif; ?>

        <div class="">
            <h3 class="h3 mb-xxs"><?php the_title(); ?></h3>
            <p class="h3 -other mb-xs"><?php the_field('project_subtitle'); ?></p>
            <p class="body -big -light mb-xs"><?php the_field('project_place'); ?></p>
            <p class="-light"><?php the_field('project_artiste'); ?></p>
        </div>
    </a>
</article>
