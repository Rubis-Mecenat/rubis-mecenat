<?php
    $title = $args['title'];
    $posts = $args['relations'];
    $bg = $args['bg'];
?>


<section class="mod_carousel <?php echo $bg ? '-bg' : ''; ?>">

    <header class="mod_title wrapper">
        <h2 class="mb-m">
            <?php echo $title; ?>
        </h2>
    </header>

    <div class="mod_relations wrapper">
        <?php if ($posts) : ?>

            <div class="grid gap-m">

                <?php foreach ($posts as $post) : setup_postdata($post); ?>
                 
                    <div class="s-4col">
                        <?php get_template_part('Components/Blocks/Block', 'Project'); ?>
                    </div>

                <?php endforeach; ?>

            </div>

            <?php wp_reset_postdata(); ?>
        <?php endif; ?>
    </div>


</section>