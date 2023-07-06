<?php

add_action('init' , 'ts_register_slides');

function ts_register_slides(){
	$labels = array(
	  'name' => _x('Slides' , 'post type general name' , TS_DOMAIN) ,
	  'singular_name' => _x('Slide' , 'post type singular name' , TS_DOMAIN) ,
	  'add_new' => _x('Add New' , 'slide item' , TS_DOMAIN) ,
	  'add_new_item' => __('Add New Slide' , TS_DOMAIN) ,
	  'edit_item' => __('Edit Slide' , TS_DOMAIN) ,
	  'new_item' => __('New Slide' , TS_DOMAIN) ,
	  'view_item' => __('View Slide' , TS_DOMAIN) ,
	  'search_items' => __('Search Slide' , TS_DOMAIN) ,
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

	register_post_type('slide' , $args);

	$labels = array(
	  'name' => _x('Sliders' , 'taxonomy general name' , TS_DOMAIN) ,
	  'singular_name' => _x('Slider' , 'taxonomy singular name' , TS_DOMAIN) ,
	  'search_items' => __('Search Sliders' , TS_DOMAIN) ,
	  'all_items' => __('All Sliders' , TS_DOMAIN) ,
	  'parent_item' => __('Parent Slider' , TS_DOMAIN) ,
	  'parent_item_colon' => __('Parent Slider:' , TS_DOMAIN) ,
	  'edit_item' => __('Edit Slider' , TS_DOMAIN) ,
	  'update_item' => __('Update Slider' , TS_DOMAIN) ,
	  'add_new_item' => __('Add New Slider' , TS_DOMAIN) ,
	  'new_item_name' => __('New Slider Name' , TS_DOMAIN) ,
	  'menu_name' => __('Sliders' , TS_DOMAIN) ,
	);

	register_taxonomy(
		'slider' ,
		array('slide') ,
		array(
		  'hierarchical' => true ,
		  'labels' => $labels ,
		  'show_ui' => true ,
		  'query_var' => true ,
		)
	);
}

add_filter('manage_edit-slide_columns' , 'ts_slide_edit_columns');

function ts_slide_edit_columns($slide_columns){
	$slide_columns = array(
	  'cb' => '<input type=\'checkbox\' />' ,
	  'title' => __('Slide Title' , TS_DOMAIN) ,
	  'slide_slider' => __('Sliders' , TS_DOMAIN) ,
	  'slide_links_to' => __('Links To' , TS_DOMAIN) ,
	  'slide_link' => __('Link' , TS_DOMAIN) ,
	  'slide_thumb' => __('Preview' , TS_DOMAIN) ,
	);
	return $slide_columns;
}

add_action('manage_posts_custom_column' , 'ts_slide_columns_display');

function ts_slide_columns_display($slide_columns){
	global $post;

	switch($slide_columns){
		case 'slide_thumb':
			if(has_post_thumbnail()){
				$img = ts_get_image(array(
					  'src' => get_the_ID() ,
					  'size' => array(200 , 80) ,
					  'format' => true
					));
				echo "<a href = '" . ADMIN_URL . "post.php?post=" . get_the_ID() . "&action=edit' title = '" . __("Edit Slide" , TS_DOMAIN) . "'>" . $img . "</a>";
			}
			break;

		case 'slide_slider':
			$terms = get_the_terms(get_the_ID() , 'slider');
			
			if($terms){
				foreach($terms as $term){
					$ts_sliders[] = "<a href = 'edit.php?post_type=slide&slider=" . $term->slug . "'>" . $term->name . "</a>";
				}
				echo join(", " , $ts_sliders);
			}else{
				echo "<span style = 'color: #aaaaaa;'>" . __("None" , TS_DOMAIN) . "</span>";
			}
			break;
			
		case 'slide_links_to':
			$links_to = ts_get_meta("ts_link_to");
			echo "<span style = 'text-transform: capitalize;" . ($links_to == "none" ? "color: #aaaaaa;" : "") . "'>" . $links_to . "</span>";
			break;

		case 'slide_link':
			$links_to = ts_get_meta("ts_link_to");
			$link_value = ts_get_meta("ts_" . $links_to , $post->ID);
			if($links_to == "page" || $links_to == "post" || $links_to == "portfolio-item"){
				$link = get_the_title($link_value);
				$href = get_permalink($link_value);
			}else{
				$link = $link_value;
				$href = $link;
			}
			$link = $link ? $link : "-";
			echo "<a href = '" . $href . "' target = '_blank'>";
			echo "<span style = '" . ($link == "none" ? "color: #aaaaaa;" : "") . "'>" . $link . "</span>";
			echo "</a>";
			break;
	}
}