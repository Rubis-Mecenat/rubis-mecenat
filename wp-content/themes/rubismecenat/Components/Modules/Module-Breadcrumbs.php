<?php

    $home_url = esc_url( home_url( '/' ) );
    $parent = false;

    if( get_post_type() === "project" ) {
        $parent = get_post_parent();
    }
    if( get_post_type() === "video" ) {
        $parent = get_field('archives_videos', 'options');
    }
    if( get_post_type() === "edition" ) {
        $parent = get_field('archives_editions', 'options');
    }
    if( get_post_type() === "post" ) {
        $parent = get_field('archives_actualites', 'options');
    }

    if( $parent ) {
        $parent_id_for_nav = $parent->ID;
        $parent_permalink_for_nav = get_the_permalink( $parent_id_for_nav );
        $parent_title_for_nav = $parent->post_title;

        $grandparent = get_post_parent($parent->ID);

        if( $grandparent ) {
            $grandparent = get_post_parent($parent->ID);
            $grandparent_id_for_nav = $grandparent->ID;
            $grandparent_permalink_for_nav = get_the_permalink( $grandparent_id_for_nav );
            $grandparent_title_for_nav = $grandparent->post_title;
    
            $grandgrandparent = get_post_parent($grandparent->ID);

            if( $grandgrandparent ) {
                $grandgrandparent_id_for_nav = $grandparent->ID;
                $grandgrandparent_permalink_for_nav = get_the_permalink( $grandgrandparent_id_for_nav );
                $grandgrandparent_title_for_nav = $grandgrandparent->post_title;
            }
        }
    }

?>


<?php if( isset($parent)) : ?>
    <nav class="mod_parent_nav">
        <a href="<?php echo $parent_permalink_for_nav; ?>" class="-block h3 -bold flex gap-xs -center">
            <?php echo $parent_title_for_nav; ?>
            <?php get_template_part('Components/Svgs/Svg', "ArrowLeftSmall"); ?>
        </a>
    </nav>
<?php endif; ?>

<nav class="mod_breadcrumbs">

    <ul class="flex gap-xs">
        <li>
            <a href="<?php echo $home_url; ?>"><?php pll_e('Accueil'); ?></a> 
        </li>
        <span class="separator">></span>

        <?php if( isset( $grandgrandparent ) ) : ?>
            <li>
                <a href="<?php echo $grandgrandparent_permalink_for_nav; ?>"><?php echo $grandgrandparent_title_for_nav; ?></a> 
            </li>
            <span class="separator"> > </span>
        
        <?php endif; ?>


        <?php if( isset ($grandparent ) ) : ?>
            <li>
                <a href="<?php echo $grandparent_permalink_for_nav; ?>"><?php echo $grandparent_title_for_nav; ?></a> 
            </li>
            <span class="separator"> > </span>

        <?php endif; ?>


        <?php if( isset( $parent ) ) : ?>
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

