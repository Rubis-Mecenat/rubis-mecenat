<?php
/*
add_filter('media_buttons_context' , 'ts_shortcoder_button');

function ts_shortcoder_button($context){
	$shortcoder_button_image = THEME_CORE_URL . '/images/shortcoder_icon.png';
	$shortcoder_button = ' %s';
	$shortcoder_button .= '<a title = "' . __('Insert a Shortcode' , TS_DOMAIN) . '" href="' . THEME_CORE_URL . '/shortcoder/shortcoder.php?init=true&TB_iframe=true&width=500" class="thickbox"><img src = "' . $shortcoder_button_image . '" /></a>';
	return sprintf($context , $shortcoder_button);
}*/

add_action('media_buttons' , 'ts_shortcoder_button', 11);

function ts_shortcoder_button(){
  $shortcoder_button_image = THEME_CORE_URL . '/images/shortcoder_icon.png';
	$shortcoder_button = ' %s';
	echo '<a title = "' . __('Insert a Shortcode' , TS_DOMAIN) . '" href="' . THEME_CORE_URL . '/shortcoder/shortcoder.php?init=true&TB_iframe=true&width=500" class="thickbox"><img src = "' . $shortcoder_button_image . '" /></a>';
}