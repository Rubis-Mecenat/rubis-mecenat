<?php

function ts_image($atts, $content = null){
	extract(shortcode_atts(array(
		'source' => '',
		'width' => '',
		'height' => '',
		'size' => 'small',
		'title' => '',
		'alt' => '',
		'crop' => 'true',
		'crop_align' => 'c',
		'colorbox' => 'false',
		'align' => '',
		'colorbox_class' => '',
		'overlay_color' => '',
		'overlay_icon' => '',
	), $atts));

	$classes = in_array($align , array('right' , 'left' , 'center')) ? 'align-' . $align : '';
	$image = ts_get_image(array(
								'src' => $source ,
								'size' => (empty($width) || empty($height)) ? $size : array($width , $height) ,
								'format' => true ,
								'crop' => $crop == 'true' ,
								'crop_align' => $crop_align ,
								'atts' => array(
												'title' => $title ,
												'alt' => $alt ,
												'class' => ($overlay_color == '' && $overlay_icon == '') ? $classes : '' ,
												)
								));

	if($size){
		$size = ts_get_size($size);
		$width = $size[0];
		$height = $size[1];
	}
	
	if($overlay_color != '' || $overlay_icon != ''){
		$overlays = '';

		if($overlay_color) $overlays .= '<span class = "overlay-color ' . $overlay_color . '"></span>';
		if($overlay_icon) $overlays .= '<span class = "overlay-icon ' . $overlay_icon . '"></span>';
		$classes .= ' overlay';
		$image = $overlays . $image;
	}

	$return = '<div class = "' . $classes . '" style = "width:' . $width . 'px; height:' . $height . 'px;">' . $image . '</div>';
	
	if($colorbox == 'true'){
		$return = '[colorbox class = "' . $colorbox_class . '" title = "' . $title . '" link = "' . $source . '"]' . $return . '[/colorbox]';
	}

	return do_shortcode($return);
}
add_shortcode('image', 'ts_image');
