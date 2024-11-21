<?php 



/*
 * GEt & Display content with ajax
 */

 add_action("wp_ajax_load_popin", "load_popin");
 add_action("wp_ajax_nopriv_load_popin", "load_popin");
 
 function load_popin() {
 
    $postslug = $_REQUEST["postslug"];
    $type = $_REQUEST["type"];

    $args = array(
        'name'  => $postslug,
        'post_type' => array('post', 'page', 'edition', 'video'),
        'post_status' => 'publish',
    );
    $query = new WP_Query( $args );
 
    ob_start(); ?>
 
        <div class="page_content">
            <?php if ( $query->have_posts() ) : ?>
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>       
                    <?php get_template_part( 'Components/Blocks/Modal', $type ); ?>
                <?php endwhile; endif; ?>
            <?php wp_reset_postdata(); ?>
        </div>
 
    <?php 

    $content = ob_get_clean();
    wp_send_json_success( $content );
    wp_die();
}

