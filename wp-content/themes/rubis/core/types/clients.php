<?php

add_action('init' , 'ts_register_clients');

function ts_register_clients(){
	$labels = array(
	  'name' => _x('Clients' , 'post type general name' , TS_DOMAIN) ,
	  'singular_name' => _x('Client' , 'post type singular name' , TS_DOMAIN) ,
	  'add_new' => _x('Add New' , 'client item' , TS_DOMAIN) ,
	  'add_new_item' => __('Add New Client' , TS_DOMAIN) ,
	  'edit_item' => __('Edit Client' , TS_DOMAIN) ,
	  'new_item' => __('New Client' , TS_DOMAIN) ,
	  'view_item' => __('View Client' , TS_DOMAIN) ,
	  'search_items' => __('Search Client' , TS_DOMAIN) ,
	  'not_found' => __('Nothing found' , TS_DOMAIN) ,
	  'not_found_in_trash' => __('Nothing found in Trash' , TS_DOMAIN) ,
	  'parent_item_colon' => ''
	);

	$args = array(
	  'labels' => $labels ,
	  'public' => false ,
	  'publicly_queryable' => false ,
	  'show_ui' => true ,
	  'query_var' => false ,
	  'rewrite' => false ,
	  'capability_type' => 'post' ,
	  'hierarchical' => false ,
	  'menu_position' => null ,
	  'supports' => array('title' , 'thumbnail')
	);

	register_post_type('client' , $args);
}

add_filter('manage_edit-client_columns' , 'ts_client_edit_columns');

function ts_client_edit_columns($client_columns){
	$client_columns = array(
	  'cb' => '<input type=\'checkbox\' />' ,
	  'title' => __('Client Name' , TS_DOMAIN) ,
	  'client_link' => __('Client Link' , TS_DOMAIN) ,
	  'client_logo' => __('Client Logo' , TS_DOMAIN) ,
	);
	return $client_columns;
}

add_action('manage_posts_custom_column' , 'ts_client_columns_display');

function ts_client_columns_display($client_columns){
	global $post;

	switch($client_columns){
		case 'client_thumb':
			if(has_post_thumbnail()){
				$img = ts_get_image(array(
					  'src' => get_the_ID() ,
					  'size' => array(200 , 80) ,
					  'format' => true
					));
				echo "<a href = '" . ADMIN_URL . "post.php?post=" . get_the_ID() . "&action=edit' title = '" . __("Edit Client" , TS_DOMAIN) . "'>" . $img . "</a>";
			}
			break;

		case 'client_link':
			$link = ts_get_meta("ts_link");
			$link = $link ? $link : "-";
			echo "<a href = '" . $link . "' target = '_blank'>";
			echo "<span style = '" . ($link == "none" ? "color: #aaaaaa;" : "") . "'>" . $link . "</span>";
			echo "</a>";
			break;
	}
}