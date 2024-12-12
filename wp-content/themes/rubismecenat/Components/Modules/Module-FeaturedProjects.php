<?php
    $title = $args['title'];
    $posts = $args['relations'];
?>


<section class="mod_featured-projects -bordered">

    <div class="wrapper">

        <header class="mod_title grid mb-xl">
            <div class="s-12col m-6col">
                <h2 class="">
                    <?php echo $title; ?>
                </h2>
            </div>
        </header>

        <?php if ($posts) : ?>
            <div class="grid gap-m">
                <?php foreach ($posts as $post) : setup_postdata($post); ?>
                        
                    <div class="s-12col m-4col m:mb-l">
                        <?php get_template_part('Components/Blocks/Block', 'Project'); ?>
                    </div>

                <?php endforeach; ?>
            </div>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>

    </div>

</section>