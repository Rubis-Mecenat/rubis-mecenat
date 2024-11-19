<?php 

function artist_register_post_types() {
	
    // CPT Portfolio
    $labels = array(
        'name'                 => 'Artistes',
        'all_items'            => 'Tous les Artistes',  // affiché dans le sous menu
        'singular_name'        => 'Artiste',
        'add_new_item'         => 'Ajouter un Artiste',
        'edit_item'            => 'Modifier l\'Artiste',
        'menu_name'            => 'Artistes',
		'name_admin_bar'       => __( 'Post Type', 'text_domain' ),
    );

	$args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_rest' => true,
        'supports' => array( 'title', 'editor','thumbnail','excerpt','author' ),
        'taxonomies' => array('category', 'post_tag'),
        'rewrite' => array('slug' => 'artist','with_front' => true),
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

	register_post_type( 'artist', $args );
}
add_action( 'init', 'artist_register_post_types' ); // Le hook init lance la fonction