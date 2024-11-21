<?php 
//hook into the init action and call create_book_taxonomies when it fires
  
add_action( 'init', 'create_video_taxonomy', 0 );
  
//create a custom taxonomy name it subjects for your posts
  
function create_video_taxonomy() {
  
// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI
  
  $labels = array(
    'name' => _x( 'Catégories Vidéo', 'taxonomy general name' ),
    'singular_name' => _x( 'Catégorie Vidéo', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Catégorie Vidéo' ),
    'all_items' => __( 'Toutes Catégories Vidéo' ),
    'parent_item' => __( 'Parent Subject' ),
    'parent_item_colon' => __( 'Parent Subject:' ),
    'edit_item' => __( 'Modifier Catégorie Vidéo' ), 
    'update_item' => __( 'Mettre à jour Catégorie Vidéo' ),
    'add_new_item' => __( 'Ajouter Catégorie Vidéo' ),
    'new_item_name' => __( 'New Subject Name' ),
    'menu_name' => __( 'Catégories Vidéo' ),
  );    
  
// Now register the taxonomy
  register_taxonomy('video_cat',array('video'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'video_category' ),
  ));
  
}