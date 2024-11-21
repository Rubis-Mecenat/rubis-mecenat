<?php 

function edition_register_post_types() {
	
    // CPT Portfolio
    $labels = array(
        'name'                 => 'Editions',
        'all_items'            => 'Toutes les Editions',  // affiché dans le sous menu
        'singular_name'        => 'Edition',
        'add_new_item'         => 'Ajouter une Editions',
        'edit_item'            => 'Modifier l\'Edition',
        'menu_name'            => 'Editions',
		'name_admin_bar'       => __( 'Post Type', 'text_domain' ),
    );

	$args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_rest' => true,
        'supports' => array( 'title', 'editor','thumbnail','excerpt','author' ),
        'taxonomies' => array('post_tag'),
        'rewrite' => array('slug' => 'edition','with_front' => true),
        'menu_icon' => 'dashicons-book',
        'hierarchical' => true,
        'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
	);

	register_post_type( 'edition', $args );
}
add_action( 'init', 'edition_register_post_types' ); // Le hook init lance la fonction