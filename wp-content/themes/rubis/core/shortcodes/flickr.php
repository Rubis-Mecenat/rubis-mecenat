<?php

function ts_flickr($atts , $content = null){
	extract(shortcode_atts(array(
		  'user' => '' ,
		  'count' => '9' ,
		  'loading_text' => __('Loading images ...' , TS_DOMAIN) ,
			) , $atts));

	$link_title = __('View this on Flickr' , TS_DOMAIN);
	$return .= '<div class = "flickr-feed" data-user = "' . $user . '" data-count = "' . $count . '" data-loading = "' . $loading_text . '">';
	$return .= '<div class = "image">';
	$return .= '<a class = "overlay" href = "{url}" title = "' . $link_title . '" rel = "nofollow"><span class = "overlay-color"></span><img src = "{image}" alt = "Image" /></a>';
	$return .= '</div></div>';

	return '[raw]' . $return . '[/raw]';
}

add_shortcode('flickr' , 'ts_flickr');