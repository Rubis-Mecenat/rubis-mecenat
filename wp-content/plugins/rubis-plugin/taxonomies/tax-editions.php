<?php 
//hook into the init action and call create_book_taxonomies when it fires
  
add_action( 'init', 'create_subjects_hierarchical_taxonomy', 0 );
  
//create a custom taxonomy name it subjects for your posts
  
function create_subjects_hierarchical_taxonomy() {
  
// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI
  
  $labels = array(
    'name' => _x( 'Catégories Edition', 'taxonomy general name' ),
    'singular_name' => _x( 'Catégorie Edition', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Catégorie Edition' ),
    'all_items' => __( 'Toutes Catégories Edition' ),
    'parent_item' => __( 'Parent Subject' ),
    'parent_item_colon' => __( 'Parent Subject:' ),
    'edit_item' => __( 'Modifier Catégorie Edition' ), 
    'update_item' => __( 'Mettre à jour Catégorie Edition' ),
    'add_new_item' => __( 'Ajouter Catégorie Edition' ),
    'new_item_name' => __( 'New Subject Name' ),
    'menu_name' => __( 'Catégories Edition' ),
  );    
  
// Now register the taxonomy
  register_taxonomy('edition_cat',array('edition'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'edition_category' ),
  ));
  
}