<?php

function ts_search($atts , $content = null){
	extract(shortcode_atts(array(
		  'prompt' => __('Search ...' , TS_DOMAIN) ,
			) , $atts));

	$return .= '<div class = "search-box">';
	$return .= '<form method = "get" action = "#" class = "search-form">';
	$return .= '<input type = "text" data-prompt = "' . $prompt . '" value = "' . $prompt . '" name = "s">';
	$return .= '<button name = "submit" type = "submit"></button></form></div>';

	return '[raw]' . $return . '[/raw]';
}

add_shortcode('search' , 'ts_search');