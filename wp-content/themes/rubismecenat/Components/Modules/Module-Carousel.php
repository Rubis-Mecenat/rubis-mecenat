<?php
    $title = $args['title'];
    $posts = $args['relations'];
    $bg = $args['bg'];
?>


<section class="mod_carousel <?php echo $bg ? '-bg' : ''; ?>">

    <header class="mod_title ">
        <h2 class=" ">
            <?php echo $title; ?>
        </h2>
    </header>

    <div class="mod_relations">
        <?php if ($posts) : ?>

            <div class="flex">

                <?php foreach ($posts as $post) : setup_postdata($post); ?>
                 
                    <div class="s_12col m_8col mb-medium">
                        <?php get_template_part('Components/Blocks/Block', 'Project'); ?>
                    </div>

                <?php endforeach; ?>

            </div>

            <?php wp_reset_postdata(); ?>
        <?php endif; ?>
    </div>


</section>