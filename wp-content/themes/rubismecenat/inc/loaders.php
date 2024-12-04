<?php 

function getPostTypesArray() {
    return array(
        'post'      => "Actualités", 
        'page'      => 'Pages', 
        'project'   => "Projets", 
        'video'     => 'Vidéos', 
        'edition'   => 'Editions', 
        'artist'    => "Artistes"
    );
}




/*
 * GEt & Display content with ajax
 */

 add_action("wp_ajax_load_popin", "load_popin");
 add_action("wp_ajax_nopriv_load_popin", "load_popin");
 
 function load_popin() {
 
    $postslug = $_REQUEST["postslug"];
    $type = $_REQUEST["type"];

    $args = array(
        'name'              => $postslug,
        'post_type'         => array($type),
        'post_status'       => 'publish',
        'posts_per_page'    => 1
    );
    $query = new WP_Query( $args );
 
    ob_start(); ?>
 
        <div class="page_content">
            <?php if ( $query->have_posts() ) : ?>
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>       
                    <?php get_template_part( 'Components/Blocks/Modal', ucfirst(get_post_type()) ); ?>
                <?php endwhile; endif; ?>
            <?php wp_reset_postdata(); ?>
        </div>
 
    <?php 

    $content = ob_get_clean();
    wp_send_json_success( $content );
    wp_die();
}


/*
 * GEt & Display content with ajax
 */

 add_action("wp_ajax_filter_content", "filter_content");
 add_action("wp_ajax_nopriv_filter_content", "filter_content");
 
 function filter_content() {
 
    $posttype = $_REQUEST["posttype"];
    $tax = $_REQUEST["tax"];
    $term = $_REQUEST["term"];
    $search = $_REQUEST["search"];
    $step = $_REQUEST["step"];
    $offset = $_REQUEST["offset"];

    $args = array(
        'post_status'       => 'publish',
        'post_per_pages'    => $step,
        'offset'            => $offset
    );

    if( $search !== '' ) {
        $args['s'] = $search;
    }

    if( $posttype === 'all' ) {
        $args['post_type'] = array_keys(getPostTypesArray());
    }
    else {
        $args['post_type'] = array($posttype);
    }
    
    if( $term !== '') {
        $args['tax_query'] = array(
            array(
                'taxonomy' => $tax,
                'field' => 'slug',
                'terms' => $term,
            )
        );
    }
    $query = new WP_Query( $args );
 
    ob_start(); ?>
 
            <div id="foundPosts" style="display:none" data-results="<?php echo $query->found_posts; ?>" data-posttype="<?php echo $posttype; ?>"></div>

            <?php if ( $query->have_posts() ) : ?>
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>       
                    <div class="m-6col mb-xxl">
                        <?php get_template_part( 'Components/Blocks/Block', ucfirst(get_post_type()) ); ?>
					</div>
                <?php endwhile; ?>
            <?php else : ?>
                <p class="m-6col"><?php pll_e('Aucun résultat'); ?></p>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
            
 
    <?php 

    $content = ob_get_clean();
    wp_send_json_success( $content );
    wp_die();
}
