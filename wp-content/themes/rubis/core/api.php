<?php

/*==================================================================*/
/* 	API
/*==================================================================*/

$ts_form = new ts_form();

function ts_input($args){
	global $ts_form;
	return $ts_form->{$args['type']}($args);
}

function ts_get_option($name , $args){
	if($args['type'] == 'file'){
		$is_file = true;
		$args['type'] = 'text';
		$args['class'] .= ' ts-file-reference-field';
	}
	
	$option_classes = 'ts-option';
	$option_classes .= ' ' . $args['::class'];

	echo '<div ' . (isset($args['::id']) ? 'id = "' . $args['::id'] . '"' : '') . 'class = "' . $option_classes . '">';
	echo '<label class = "ts-label">';
	if($args['type'] != 'checkbox'){
		echo $args['label'];
		if($args['optional']) echo '<span class = "ts-optional"> - ' . __('optional' , TS_DOMAIN) . '</span>';
		echo '<span class = "ts-clear"></span>';
	}
	$args['class'] .= ' ts-default ';
	if(isset($args['id'])) $args['id'] = ($name ? $name . '-' : '') . $args['id'];
	ts_input($args);
	if($args['type'] == 'checkbox'){
		echo '<span class = "ts-inline-label">' . $args['label'] . '</span>';
	}
	
	if($is_file){
		echo '<a class = "ts-secondary-button ts-file-reference-button">' . __("Media Library" , TS_DOMAIN) . '</a>';
	}
	echo '</label>';

	if(isset($args['info'])){
		echo '<div class = "ts-info">' . $args['info'] . '</div>';
	}
	echo '</div>';
}

function ts_get_theme_option($name , $return_default = false){
	$default_values = array(
	// Announcement
		'show_announcement' => 'on' ,
		'announcement' => __('This is an announcement, you can change it or turn it off from the theme options page.' , TS_DOMAIN) ,

	// General options
		'header_height' => '90' ,
		'favicon_path' => THEME_IMAGES . '/favicon.ico' ,
		'google_analytics' => '' ,
		'enable_wptexturize_filter' => 'off' ,

	// Logo options
		'logo' => THEME_IMAGES . '/logo.png' ,
		'logo_offset_x' => '0' ,
		'logo_offset_y' => '-25' ,
		'show_tagline' => 'on' ,
		'tagline_offset_x' => '10' ,
		'tagline_offset_y' => '0' ,

	// Main Nav. Menu options
		'main_nav_submenu_width' => '180' ,

	// Sidebars
		'custom_sidebars' => '' ,

	// Footer options
		'enable_footer_widgets' => 'on' ,
		'footer_widgets_layout' => '3' ,
		
		'copyright' => sprintf(__('&copy; 2012 Simplex Theme by %1$s ThemeArt %2$s' , TS_DOMAIN) , '<a href = "http://themeart.net/" target = "_blank">' , '</a>') ,
		'show_footer_nav' => 'on' ,
		'footer_nav' => '' ,
		
		'social_links_text' => __('Stay Connected' , TS_DOMAIN) ,
		'social_links_target' => '_blank' ,
		'social_links' => array(
			'twitter' => array(
			  'title' => __('Twitter' , TS_DOMAIN) ,
			  'link' => '#' ,
			) ,
			'facebook' => array(
			  'title' => __('Facebook' , TS_DOMAIN) ,
			  'link' => '#' ,
			) ,
			'youtube' => array(
			  'title' => __('YouTube' , TS_DOMAIN) ,
			  'link' => '#' ,
			) ,
			'googleplus' => array(
			  'title' => __('Google Plus' , TS_DOMAIN) ,
			  'link' => '' ,
			) ,
			'linkedin' => array(
			  'title' => __('LinkedIn' , TS_DOMAIN) ,
			  'link' => '' ,
			) ,
			'vimeo' => array(
			  'title' => __('Vimeo' , TS_DOMAIN) ,
			  'link' => '#' ,
			) ,
			'flickr' => array(
			  'title' => __('Flickr' , TS_DOMAIN) ,
			  'link' => '#' ,
			) ,
			'dribbble' => array(
			  'title' => __('Dribbble' , TS_DOMAIN) ,
			  'link' => '#' ,
			) ,
			'deviantart' => array(
			  'title' => __('DeviantArt' , TS_DOMAIN) ,
			  'link' => '' ,
			) ,
		) ,

	// Portfolio options
		'show_project_overview' => 'on' ,
		'show_related_work' => 'on' ,
		'related_work_title' => __('Related Work' , TS_DOMAIN) ,
		'related_work_description' => __('These are some projects that might be related to this work.' , TS_DOMAIN) ,
		'overview_title' => __('Overview' , TS_DOMAIN) ,
		'project_details_title' => __('Project Details' , TS_DOMAIN) ,

	// Error 404 options
		'error_404_title' => __('Page not Found' , TS_DOMAIN) ,
		'error_404_message' => __("Ooops ... it looks like the page you were looking for doesn't exist anymore or is temporarily unavailable." , TS_DOMAIN) ,
		'show_error_404_search' => 'on' ,
		'error_404_search_button_label' => __("Search" , TS_DOMAIN) ,
		'error_404_search_prompt' => __("Type here then click ..." , TS_DOMAIN) ,

	// Font options
		'fonts' => "<link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,400italic|Open+Sans:400,400italic,600,800' rel='stylesheet' type='text/css'>" ,
		'body_size' => "11" ,
		'h1_size' => "24" ,
		'h2_size' => "18" ,
		'h3_size' => "16" ,
		'h4_size' => "14" ,
		'h5_size' => "12" ,
		'h6_size' => "11" ,
		
	// Color options
		'skin_color' => '22aaee' ,
		
	// CSS options
		'custom_css' => '' ,
  
	// Comments options
		'enable_comments_on_pages' => 'off' ,
		'comment_date_format' => 'date_time' , /* 'ago' | 'date_time' */
		'comment_form_tagline' => __("What's on your mind? Fill out the form below to let us know." , TS_DOMAIN) ,
	);
	
	$options = get_option('ts_theme_options');
	if($options) $options = array_map(create_function('$value' , 'return is_string($value) ? stripslashes($value) : $value;') , $options);

	if(!isset($options[$name]) || $return_default){
		return $default_values[$name];
	}else{
		return $options[$name];
	}
}

function ts_get_meta($name , $post_id = null , $return_default = false){
	global $post;

	$default_values = array(
	  'ts_tagline' => '' ,
	  'ts_sidebar_location' => 'right' ,
	  'ts_sidebar' => 'default' ,
	  'ts_portfolio_count' => '12' ,
	);

	if($post_id == null){
		$post_id = is_home() ? get_option('page_for_posts') : $post->ID;
	}
	
	$meta_value = get_post_meta($post_id , $name , true);
	
	if(!$meta_value || $return_default){
		return html_entity_decode(isset($default_values[$name]) ? $default_values[$name] : '');
	}else{
		return html_entity_decode($meta_value);
	}
}

function ts_nav_menu_fallback($args){
	$args['title_li'] = false;
	$args['echo'] = false;
	$items = wp_list_pages($args);
	echo '<ul>' . preg_replace('/title=\"(.*?)\"/' , '' , $items) . '</ul>';
}

function ts_wp_link_pages(){
	$args = array('before' => '<div class = "pagination">' ,
	  'after' => '</div>' ,
	  'link_before' => '<span class = "single-pagination">' ,
	  'link_after' => '</span>' ,
	  'next_or_number' => 'number' ,
	  'echo' => '0' ,
	);
	$link_pages = wp_link_pages($args);
	echo preg_replace('/<a href=/' , '<a class = "inactive" href=' , $link_pages);
}

function ts_get_comments_link($_0 = null , $_1 = null , $_more = null , $_off = null){
	$comments_num = get_comments_number();
	if(comments_open()){
		if($comments_num == 0){
			$link = sprintf(isset($_0) ? $_0 : __('No Comments' , TS_DOMAIN) , 0);
		}else
		if($comments_num > 1){
			$_more = isset($_more) ? $_more : __('%d Comments' , TS_DOMAIN);
			$link = sprintf($_more , $comments_num);
		}else{
			$link = sprintf(isset($_1) ? $_1 : __('1 Comment' , TS_DOMAIN) , 1);
		}
		return '<a href = "' . get_permalink() . '#comments" title = "' . esc_attr(sprintf(__('Comment on %s' , TS_DOMAIN) , the_title_attribute(array('echo' => 0)))) . '">' . $link . '</a>';
	}else{
		return '<span>' . $_off ? $_off : __('Comments Off' , TS_DOMAIN) . '</span>';
	}
}

function ts_get_pagination($args){
	$wp_func = $args['wp_func'];
	$pages = $args['pages'];
	$paged = $args['paged'];
	$range = $args['range'];

	$showcount = min($pages - $paged , $range) + min($paged - 1 , $range) + 1;

	if($pages != 1){
		$pagination =  "<nav class = 'pagination'><ul>";

		$start = ($paged > $range + 1 ? $paged - $range : 1);
		$end = $start + $showcount > $pages ? $pages + 1 : $start + $showcount;

		if($paged > 1){
			$pagination .= "<li><a href = '" . htmlentities(call_user_func($wp_func , $paged - 1)) . "'>" . __('Prev' , TS_DOMAIN) . "</a></li>";
		}

		if($start > 1){
			$pagination .= "<li><a href = '" . htmlentities(call_user_func($wp_func , 1)) . "'>1</a></li>";
		}

		for($i = $start ; $i < $end ; $i++){
			if($i == $paged){
				$pagination .= "<li class = 'current'><a href = '#'>" . $i . "</a></li>";
			}else{
				$pagination .= "<li><a href = '" . htmlentities(call_user_func($wp_func , $i)) . "'>" . $i . "</a></li>";
			}
		}

		if($end - 1 < $pages){
			$pagination .= "<li><a href = '" . htmlentities(call_user_func($wp_func , $pages)) . "'>" . $pages . "</a></li>";
		}

		if($paged < $pages){
			$pagination .= "<li><a href = '" . htmlentities(call_user_func($wp_func , $paged + 1)) . "'>" . __('Next' , TS_DOMAIN) . "</a></li>";
		}

		$pagination .= "</ul></nav>";

		return $pagination;
	}
}

function ts_comments_pagination($range = 2){
  $cpage = get_query_var('cpage');
  $cpages = get_comment_pages_count();
  
  if(empty($cpage)) $cpage = 1;
  if(!$cpages) $cpages = 1;
  
  echo ts_get_pagination(array(
              'wp_func' => 'get_comments_pagenum_link' ,
              'pages' => $cpages ,
              'paged' => $cpage ,
              'range' => $range ,
              ));
}

function ts_has_footer_widgets(){
	return is_active_sidebar('footer-sidebar-1') || is_active_sidebar('footer-sidebar-2') || is_active_sidebar('footer-sidebar-3') || is_active_sidebar('footer-sidebar-4') || is_active_sidebar('footer-sidebar-5') || is_active_sidebar('footer-sidebar-6');
}

function ts_get_footer_widgets($layout){
	global $ts_footer_layouts;

	for($i = 0; $i < count($ts_footer_layouts[$layout]); $i++){
		echo '<div class = "span-' . $ts_footer_layouts[$layout][$i] . '">';
		dynamic_sidebar('footer-sidebar-' . ($i + 1));
		echo '</div>';
	}
}

function ts_get_footer_nav(){
	$args['title_li'] = false;
	$args['echo'] = false;
	$args['include'] = ts_get_theme_option('footer_nav');
	$items = wp_list_pages($args);
	if($args['include'] != '' && ts_get_theme_option('show_footer_nav') == 'on') echo '<ul>' . $items . '</ul>';
}

function ts_get_image($options){
	if(is_numeric($options['src'])){
		$options['src'] = wp_get_attachment_url(get_post_thumbnail_id($options['src']));
	}

	if($options['size'] && $options['size'] != 'full' && is_string($options['size'])){
		$options['size'] = ts_get_size($options['size']);
	}

	if($options['size'] == 'full'){
		unset($options['size']);
	}

	$image_url = THEME_CORE_URL . '/utils/thumb.php';

	$query = array();
	$query[] = 'src=' . $options['src'];
	if(isset($options['size'][0]))
		$query[] = 'w=' . $options['size'][0];
	if(isset($options['size'][1]))
		$query[] = 'h=' . $options['size'][1];
	if(isset($options['filter']))
		$query[] = 'f=' . $options['filter'];
	if(isset($options['crop_align']))
		$query[] = 'a=' . $options['crop_align'];
	if(isset($options['fit']) && $options['fit'] == true){
		$query[] = 'zc=3';
	}else{
		if(isset($options['crop']))
			$query[] = 'zc=' . ($options['crop'] == 'true' ? '1' : '0');
	}
	$query[] = 'q=100';

	$query = implode("&amp;" , $query);
	$query = $query ? '?' . $query : '';

	$image_url .= $query;

	if($options['format']){
		$attributes = (array) $options['atts'];

		$attributes_string = array();
		foreach($attributes as $attribue => $value){
			$attributes_string[] = $attribue . '="' . $value . '"';
		}

		$attributes_string = implode(' ' , $attributes_string);

		$image = '<img src = "' . $image_url . '" ' . $attributes_string . ' />';
	}else{
		$image = $image_url;
	}

	if($options['echo']){
		echo $image;
	}

	if($options['get_data']){
		return array('image' => $image ,
		  'width' => $attributes['width'] ,
		  'height' => $attributes['height'] ,
		  'atts' => $attributes ,
		);
	}else{
		return $image;
	}
}

function ts_get_size($size = null){
	$default_sizes = array(
	  'full' => array(null , null) ,
	  'featured' => array(640 , 358) ,
	  'large' => array(600 , 335) ,
	  'medium' => array(480 , 268) ,
	  'small' => array(320 , 179) ,
	  'tiny' => array(240 , 134) ,
	  'thumb200' => array(200 , 200) ,
	  'thumb150' => array(150 , 150) ,
	  'thumb100' => array(100 , 100) ,
	  'thumb' => array(100 , 100) ,
	  'thumb80' => array(80 , 80) ,
	  'thumb64' => array(64 , 64) ,
	);

	return $default_sizes[$size];
}

function ts_get_video_embed_url($service){
	$sources = array(
	  'youtube' => 'http://www.youtube.com/embed/' ,
	  'vimeo' => 'http://player.vimeo.com/video/' ,
	  'dailymotion' => 'http://www.dailymotion.com/embed/video/' ,
	);

	return $sources[$service];
}

function ts_get_time_ago($time){
  $time_str = human_time_diff($time , strtotime(current_time('mysql')));

  $time_arr = explode(" " , $time_str);
  $time = $time_str;
  
  if($time_arr[1] == "min"){
    $time = __('1 minute ago' , TS_DOMAIN);
  }
  
  if($time_arr[1] == "mins"){
    if($time_arr[0] < 60){
      $time = sprintf(__('%d minutes ago' , TS_DOMAIN) , $time_arr[0]);
    }else{
      $time_arr[1] = "hour";
    }
  }
  
  if($time_arr[1] == "hour"){
    $time = __('1 hour ago' , TS_DOMAIN);
  }
  
  if($time_arr[1] == "hours"){
    if($time_arr[0] < 24){
      $time = sprintf(__('%d hours ago' , TS_DOMAIN) , $time_arr[0]);
    }else{
      $time_arr[1] = "day";
    }
  }
  
  if($time_arr[1] == "day"){
    $time = __('1 day ago' , TS_DOMAIN);
  }
  
  if($time_arr[1] == "days"){
    if($time_arr[0] < 7) $time = sprintf(__('%d days ago' , TS_DOMAIN) , $time_arr[0]);
    if($time_arr[0] == 7) $time = __('1 week ago' , TS_DOMAIN);
    if($time_arr[0] > 7 && $time_arr[0] < 30) $time = sprintf(__('%d days ago' , TS_DOMAIN) , $time_arr[0]);
    if($time_arr[0] == 30) $time = __('1 month ago' , TS_DOMAIN);
    if($time_arr[0] > 30 && $time_arr[0] < 365) $time = round($time_arr[0]/30) > 1 ? sprintf(__('About %d months ago' , TS_DOMAIN) , round($time_arr[0]/30)) : __('About 1 month ago' , TS_DOMAIN);
    if($time_arr[0] >= 365) $time = round($time_arr[0]/365) == 1 ? __('About 1 year ago' , TS_DOMAIN) : sprintf(__('About %d years ago' , TS_DOMAIN) , round($time_arr[0]/365));
  }
  
  return $time;
}

function ts_get_current_url(){
	return (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
}

function ts_filter_color($color){
	$color = name2hex($color);
	if($color != "transparent")
		$color = "#" . $color;
	return $color;
}

function ts_trim_string($string , $n , $d = '...'){
	$l = strlen($string);
	if($l > $n){
		preg_match('/(.{' . $n . '}.*?)\b/' , $string , $matches);
		return rtrim($matches[1]) . $d;
	}else{
		return $string;
	}
}