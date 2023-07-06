<?php

function ts_twitter($atts , $content = null){
	extract(shortcode_atts(array(
		  'user' => '' ,
		  'count' => '3' ,
		  'loading_text' => __('Loading tweets ...' , TS_DOMAIN) ,
			) , $atts));

	$link_title = __('View this on Twitter' , TS_DOMAIN);
	$return .= '<div class = "twitter-feed" data-user = "' . $user . '" data-count = "' . $count . '" data-loading = "' . $loading_text . '">';
	$return .= '<div class = "tweet">';
	$return .= '<div class = "text">{text}</div>';
	$return .= '<div class = "time">';
	$return .= '<a href = "{tweet_url}" title = "' . $link_title . '" rel = "nofollow">{time}</a>';
	$return .= '</div>';
	$return .= '</div>';
	$return .= '</div>';
	
	return '[raw]' . $return . '[/raw]';
}

add_shortcode('twitter' , 'ts_twitter');