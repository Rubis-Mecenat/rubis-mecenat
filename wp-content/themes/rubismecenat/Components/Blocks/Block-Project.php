
<article class="block-project">
    <?php if (has_post_thumbnail()) : ?>
        <div class="block-project__image mb-m">
            <?php the_post_thumbnail('full'); ?>
        </div>
    <?php endif; ?>
    <a href="<?php the_permalink(); ?>">
        <h3><?php the_title(); ?></h3>
        <p><?php the_field('project_subtitle'); ?></p>
        <p><?php the_field('project_place'); ?></p>
        <p><?php the_field('project_artiste'); ?></p>
    </a>
</article>
