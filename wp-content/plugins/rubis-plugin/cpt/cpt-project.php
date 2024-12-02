<?php 

function project_register_post_types() {
	
    $labels = array(
        'name' => 'Projets',
        'all_items' => 'Tous les Projets', 
        'singular_name' => 'Projet',
        'add_new_item' => 'Ajouter un Projet',
        'edit_item' => 'Modifier le Projet ',
        'menu_name' => 'Projets'
    );

	$args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_rest' => true,
        'has_archive' => true,
        'supports' => array( 'page-attributes', 'title', 'editor','thumbnail','excerpt'),
        'taxonomies' => array('post_tag'),
        'rewrite' => array('slug' => 'p','with_front' => true),
        'menu_position' => 5, 
        'menu_icon' => 'dashicons-archive',
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'hierarchical' => true,
	);

	register_post_type( 'project', $args );
}
add_action( 'init', 'project_register_post_types' ); 