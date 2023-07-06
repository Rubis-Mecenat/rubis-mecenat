<?php

function ts_user_bio($atts , $content = null){
	extract(shortcode_atts(array(
		  'user' => '' ,
		  'show_image' => 'true' ,
			) , $atts));

	if($user == ''){
		$current_post = get_post($GLOBALS['current_post_id']);
		$user_id = $current_post->post_author;
	}else
	if(is_numeric($user)){
		$user_id = $user;
	}else{
		$user = get_userdatabylogin($user);
		$user_id = $user->ID;
	}

	$return = '<div class = "user-bio">';
	if($show_image == 'true'){
		$return .= '<div class = "user-avatar">';
		$return .= get_avatar($user_id , '80');
		$return .= '</div>';
	}
	$return .= '<div class = "user-info' . ($show_image == 'true' ? '' : ' no-image') . '">';
	$return .= '<h4>' . sprintf(__('About %s' , TS_DOMAIN) , get_the_author_meta('display_name' , $user_id)) . '</h4>';
	$return .= '<div class = "user-description">';
	$return .= get_the_author_meta('description' , $user_id);
	$return .= '</div>';
	$return .= '</div>';
	$return .= '</div>';
	return '[raw]' . $return . '[/raw]';
}

add_shortcode('user_bio' , 'ts_user_bio');