<?php

    $home_url = esc_url( home_url( '/' ) );
    $parent = false;

    if( get_post_type() === "project" ) {
        $cat = wp_get_post_terms( $post->ID, 'project_cat', array( 'fields' => 'all' ) )[0];
        $parent = get_post_parent();
    }
    if( get_post_type() === "video" ) {
        $parent = get_field('archives_videos', 'options');
    }
    if( get_post_type() === "edition" ) {
        $parent = get_field('archives_editions', 'options');
    }

    if( $parent ) {
        $parent_id_for_nav = $parent->ID;
        $parent_permalink_for_nav = get_the_permalink( $parent_id_for_nav );
        $parent_title_for_nav = $parent->post_title;

        $grandparent = get_post_parent($parent->ID);
    }
    else {
        if( $cat ) {
            $parent_id_for_nav = $cat->ID;
            $parent_permalink_for_nav = $home_url . $cat->slug;
            $parent_title_for_nav = $cat->name;
        }
    }
?>


<nav class="mod_parent_nav">
    <a href="<?php echo $parent_permalink_for_nav; ?>" class="-block h3 -bold flex gap-xs -center">
        <?php echo $parent_title_for_nav; ?>
        <?php get_template_part('Components/Svgs/Svg', "ArrowLeftSmall"); ?>
    </a>
</nav>


<nav class="mod_breadcrumbs">

    <ul class="flex gap-xs">
        <li>
            <a href="<?php echo $home_url; ?>"><?php pll_e('Accueil'); ?></a> 
        </li>
        <span class="separator">></span>

        <?php if( $cat ) : ?>
            <li>
                <a href="<?php echo $home_url . $cat->slug; ?>"><?php echo $cat->name; ?></a> 
            </li>
            <span class="separator"> > </span>
        <?php endif; ?>

        <?php if( $parent ) : ?>
            <li>
                <a href="<?php echo $parent_permalink_for_nav; ?>"><?php echo $parent_title_for_nav; ?></a> 
            </li>
            <span class="separator"> > </span>

        <?php endif; ?>

        <li>
            <span class="current"><?php the_title(); ?></span> 
        </li>
        
    </ul>
</nav>

