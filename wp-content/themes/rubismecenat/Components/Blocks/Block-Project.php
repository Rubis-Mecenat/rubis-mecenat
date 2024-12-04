
<article class="block-project">
    <a 
        href="<?php the_permalink(); ?>" 
        data-slug="<?php echo get_post_field( 'post_name', get_post() );?>"
        data-type="<?php echo get_post_type(); ?>"
        class="-block">

        <div class="block-project__image mb-m">
            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('full'); ?>
            <?php else: ?>
                <div class="block_placeholder"></div>
            <?php endif; ?>
        </div>

        <div class="">
            <h3 class="h3 mb-xxs"><?php the_title(); ?></h3>
            <p class="h3 -other mb-xs"><?php the_field('project_subtitle'); ?></p>
            <p class="body -big -light mb-xs"><?php the_field('project_place'); ?></p>
            <p class="-light"><?php the_field('project_artiste'); ?></p>
        </div>
    </a>
</article>
