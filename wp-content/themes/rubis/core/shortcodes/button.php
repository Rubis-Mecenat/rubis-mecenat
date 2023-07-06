<?php

function ts_button($atts, $content = null){
	extract(shortcode_atts(array(
		'link' => '#',
		'target' => '_self',
		'size' => '',
		'secondary' => 'false',
	), $atts));
	
	$classes = array('button');
	if(in_array($size , array('small' , 'medium' , 'large'))) $classes[] = $size;
	if($secondary == 'true') $classes[] = 'secondary';
	
	return '<button onclick = "window.open(\'' . $link . '\' , \'' . $target . '\');" class = "' . implode(' ' , $classes) . '">' . do_shortcode($content) . '</button>';
}
add_shortcode('button', 'ts_button');