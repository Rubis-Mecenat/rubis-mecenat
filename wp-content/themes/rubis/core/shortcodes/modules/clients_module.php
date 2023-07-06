<?php

function ts_clients($atts , $content = null){
	extract(shortcode_atts(array(
		  'title' => __('Our Clients' , TS_DOMAIN) ,
			) , $atts));

	$content = do_shortcode($content);
	$title = $title ? '<h3 class = "fancy-title">' . $title . '</h3>' : '';
	
	$clients = new WP_Query(array(
		'post_type' => 'client' ,
		'posts_per_page' => '6' ,
		'orderby' => 'date' ,
	));
	
	$i = 0;
	while($clients->have_posts()){
		$i++;
		
		$clients->the_post();
		
		$image = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
		$the_title = get_the_title();
		$the_link = ts_get_meta('ts_link' , get_the_ID());
		
		if($i%2 == 1){
			$clients_str .= '<div class = "span-3">';
		}
		
		$clients_str .= '<a target = "_blank" href = "' . $the_link . '" class = "entry overlay" title = "' . $the_title . '"><span class = "overlay-color"></span><img alt = "' . $the_title . '" src = "' . $image . '" /></a>';
		
		if($i%2 == 0){
			$clients_str .= '</div>';
		}
	}

	if($i%2 != 0){
		$clients_str .= '</div>';
	}
	
	$return .= '<div class = "clients-grid row has-divider">';
	$return .= '<div class = "span-3">' . $title . '' . $content . '</div>' . $clients_str . '</div>';

	return '[raw]' . $return . '[/raw]';
}

add_shortcode('clients_module' , 'ts_clients');