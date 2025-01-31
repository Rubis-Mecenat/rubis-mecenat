
<article class="block-project">
    <a 
        href="<?php the_permalink(); ?>" 
        data-slug="<?php echo get_post_field( 'post_name', get_post() );?>"
        data-type="<?php echo get_post_type(); ?>"
        class="-block">

        <div class="block-project__image mb-m">
            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('theme_small'); ?>
            <?php else: ?>
                <div class="block_placeholder"></div>
            <?php endif; ?>
        </div>

        <div class="">
            <h3 class="h3 mb-xxs"><?php the_title(); ?></h3>

            <?php if( get_field('project_artists') ) : ?>
                    <p class="h3 -other mb-s">
                        <?php $artists = get_field('project_artists');
                            foreach( $artists as $key => $artist) : ?>
                                <span><?php echo $key > 0 ? " & " : '';  echo $artist->post_title; ?></span>
                            <?php endforeach; ?>
                    </p>
            <?php endif; ?>

            <div class="mb-xs">

                <?php if( get_field('project_subtitle') ) : ?>
                    <p class="body -other mb-xs"><?php echo wp_kses_post( get_field('project_subtitle') ); ?></p>
                <?php endif; ?>
                
                <?php if( get_field('project_place') ) : ?>
                    <p class="body -light mb-0"><?php the_field('project_place'); ?></p>
                <?php endif; ?>

                <?php if( get_field('project_date') ) : ?>
                    <p class="body -light mb-0"><?php the_field('project_date'); ?></p>
                <?php endif; ?>
            </div>


        </div>
    </a>
</article>
