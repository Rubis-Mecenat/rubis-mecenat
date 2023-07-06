<?php

add_action('init' , 'ts_register_portfolio');

function ts_register_portfolio(){
    $labels = array(
      'name' => _x('Portfolio' , 'post type general name' , TS_DOMAIN) ,
      'singular_name' => _x('Portfolio Item' , 'post type singular name' , TS_DOMAIN) ,
      'add_new' => _x('Add New' , 'portfolio item' , TS_DOMAIN) ,
      'add_new_item' => __('Add New Portfolio Item' , TS_DOMAIN) ,
      'edit_item' => __('Edit Portfolio Item' , TS_DOMAIN) ,
      'new_item' => __('New Portfolio Item' , TS_DOMAIN) ,
      'view_item' => __('View Portfolio Item' , TS_DOMAIN) ,
      'search_items' => __('Search Portfolio' , TS_DOMAIN) ,
      'not_found' => __('Nothing found' , TS_DOMAIN) ,
      'not_found_in_trash' => __('Nothing found in Trash' , TS_DOMAIN) ,
      'parent_item_colon' => ''
    );

    $args = array(
      'labels' => $labels ,
      'public' => true ,
      'publicly_queryable' => true ,
      'show_ui' => true ,
      'query_var' => true ,
      'rewrite' => true ,
      'capability_type' => 'post' ,
      'hierarchical' => false ,
      'menu_position' => null ,
      'supports' => array('title' , 'editor' , 'thumbnail')
    );

    register_post_type('portfolio' , $args);

	$labels = array(
		'name' => _x('Categories' , 'taxonomy general name' , TS_DOMAIN),
		'singular_name' => _x('Category' , 'taxonomy singular name' , TS_DOMAIN),
		'search_items' =>  __('Search Categories' , TS_DOMAIN),
		'all_items' => __('All Categories' , TS_DOMAIN),
		'parent_item' => __('Parent Category' , TS_DOMAIN),
		'parent_item_colon' => __('Parent Category:' , TS_DOMAIN),
		'edit_item' => __('Edit Category' , TS_DOMAIN),
		'update_item' => __('Update Category' , TS_DOMAIN),
		'add_new_item' => __('Add New Category' , TS_DOMAIN),
		'new_item_name' => __('New Category Name' , TS_DOMAIN),
		'menu_name' => __('Categories' , TS_DOMAIN),
	);


    register_taxonomy(
        'portfolio_category' ,
        array('portfolio') ,
        array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array('slug' => 'portfolio_category'),
		)
    );
}

add_filter('manage_edit-portfolio_columns', 'ts_portfolio_edit_columns');
function ts_portfolio_edit_columns($portfolio_columns){
	$portfolio_columns = array(
		'cb' => '<input type=\'checkbox\' />' ,
		'title' => __('Title' , TS_DOMAIN) ,
		'portfolio_type' => __('Featured Content' , TS_DOMAIN) ,
		'portfolio_categories' => __('Categories' , TS_DOMAIN) ,
		'portfolio_thumb' => __('Featured Image' , TS_DOMAIN) ,
	);
	return $portfolio_columns;
}

add_action('manage_posts_custom_column',  'ts_portfolio_columns_display');
function ts_portfolio_columns_display($portfolio_column){
	global $post;
	
	switch ($portfolio_column){
		case 'portfolio_thumb':
			if(has_post_thumbnail()){
				$img = ts_get_image(array(
									'src' => get_the_ID() ,
									'size' => array(200 , 80) ,
									'format' => true
									));
				echo "<a href = '" . ADMIN_URL . "post.php?post=" . get_the_ID() . "&action=edit' title = '" . __("Edit Portfolio Item" , TS_DOMAIN) . "'>" . $img . "</a>";
			}
			break;

		case 'portfolio_type':
			$type = ts_get_meta("ts_featured_content");
			if($type == "image") echo __("Featured image" , TS_DOMAIN);
			if($type == "youtube-video-id") echo sprintf(__('%1$s YouTube Video %2$s' , TS_DOMAIN) , '<a target = "_blank" href = "' . ts_get_video_embed_url('youtube') . ts_get_meta("ts_youtube_video_id") . '">' , '</a>');
			if($type == "vimeo-video-id") echo sprintf(__('%1$s Vimeo Video %2$s' , TS_DOMAIN) , '<a target = "_blank" href = "' . ts_get_video_embed_url('vimeo') . ts_get_meta("ts_vimeo_video_id") . '">' , '</a>');
			if($type == "dailymotion-video-id") echo sprintf(__('%1$s DailyMotion Video %2$s' , TS_DOMAIN) , '<a target = "_blank" href = "' . ts_get_video_embed_url('dailymotion') . ts_get_meta("ts_dailymotion_video_id") . '">' , '</a>');
			if($type == "slider") echo sprintf(__('Image Slider' , TS_DOMAIN));
			break;

		case 'portfolio_categories':
			$terms = get_the_terms($post->ID , "portfolio_category");
			
			if($terms){
				foreach($terms as $term){
					$groups[] = "<a href = 'edit.php?post_type=portfolio&portfolio_category=" . $term->slug . "'>" . $term->name . "</a>";
				}
				echo join(", " , $groups);
			}else{
				echo "<span style = 'color: #aaaaaa;'>" . __("None" , TS_DOMAIN) . "</span>";
			}
			break;
	}
}