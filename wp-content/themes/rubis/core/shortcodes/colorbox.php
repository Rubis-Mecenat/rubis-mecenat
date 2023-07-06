<?php

function ts_colorbox($atts , $content = null){
	extract(shortcode_atts(array(
		  'title' => '' ,
		  'link' => '' ,
		  'group' => '' ,
		  'width' => '' ,
		  'height' => '' ,
		  'slideshow' => 'false' ,
		  'slideshow_autostart' => 'false' ,
		  'slideshow_speed' => '2500' ,
		  'iframe' => 'false' ,
		  'inline' => 'false' ,
		  'force_photo_mode' => 'false' ,
		  'class' => '' ,
			) , $atts));

	$return = '<a class = "colorbox' . ($class ? ' ' . $class : '') . '"';
	$return.= empty($title) ? '' : ' title = "' . do_shortcode($title) . '"';
	$return.= empty($group) ? '' : ' rel = "' . $group . '"';
	$return.= empty($width) ? '' : ' data-width = "' . $width . '"';
	$return.= empty($height) ? '' : ' data-height = "' . $height . '"';
	$return.= ' data-slideshow = "' . $slideshow . '"';
	$return.= ' data-slideshowauto = "' . $slideshow_autostart . '"';
	$return.= ' data-slideshowspeed = "' . $slideshow_speed . '"';
	$return.= ' data-iframe = "' . $iframe . '"';
	$return.= ' data-inline = "' . $inline . '"';
	$return.= ' data-photo = "' . $force_photo_mode . '"';
	$return.= ' href = "' . $link . '"';
	$return.= '>';
	$return.= $content ? do_shortcode($content) : '';
	$return.= '</a>';

	return $return;
}

add_shortcode('colorbox' , 'ts_colorbox');