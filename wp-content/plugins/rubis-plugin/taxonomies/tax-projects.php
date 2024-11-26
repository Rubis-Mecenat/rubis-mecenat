<?php 
//hook into the init action and call create_book_taxonomies when it fires
  
add_action( 'init', 'create_project_taxonomy', 0 );
  
//create a custom taxonomy name it subjects for your posts
  
function create_project_taxonomy() {
  
// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI
  
  $labels = array(
    'name' => _x( 'Catégories Projets', 'taxonomy general name' ),
    'singular_name' => _x( 'Catégorie Projet', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Catégorie Projets' ),
    'all_items' => __( 'Toutes Catégories Projets' ),
    'parent_item' => __( 'Parent Subject' ),
    'parent_item_colon' => __( 'Parent Subject:' ),
    'edit_item' => __( 'Modifier Catégorie Projets' ), 
    'update_item' => __( 'Mettre à jour Catégorie Projets' ),
    'add_new_item' => __( 'Ajouter Catégorie Projets' ),
    'new_item_name' => __( 'New Subject Name' ),
    'menu_name' => __( 'Catégories Projets' ),
  );    
  
// Now register the taxonomy
  register_taxonomy('project_cat',array('project'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'project_category' ),
  ));
  
}