<?php

function ts_map($atts , $content = null){
	extract(shortcode_atts(array(
		  'width' => '300' ,
		  'height' => '250' ,
		  'size' => '' ,
		  'type' => 'roadMap' ,
		  'address' => '' ,
		  'latitude' => '' ,
		  'longitude' => '' ,
		  'zoom' => '4' ,
		  'nav_controls' => 'true' ,
		  'enable_street_view' => 'true' ,
		  'map_type_controls' => 'true' ,
		  'draggable' => 'true' ,
		  'scrollwheel' => 'true' ,
		  'align' => '' ,
			) , $atts));

	if($size){
		$size = ts_get_size($size);
		$width = $size[0];
		$height = $size[1];
	}

	$class = array();

	if(in_array($align , array('right' , 'left' , 'center')))
		$class[] = 'align-' . $align;

	$type = strtolower($type);

	$GLOBALS['ts_markers'] = array();
	do_shortcode($content);
	$markers = $GLOBALS['ts_markers'] ? implode("," , $GLOBALS['ts_markers']) : "";
	unset($GLOBALS['ts_markers']);

	$return = "<div class = 'gmap " . implode(' ' , $class) . "' id = 'map_canvas_" . $GLOBALS['ts_map_count'] . "' style = 'width:" . $width . "px; height:" . $height . "px;'></div>";
	$return.= "<script type = 'text/javascript'>";
	$return.= "jQuery(document).ready(function(){";
	$return.= "initGMap('map_canvas_" . $GLOBALS['ts_map_count'] . "' , {";
	$return.= "type						: '" . $type . "' ,";
	$return.= "latitude					: '" . $latitude . "' ,";
	$return.= "longitude				: '" . $longitude . "' ,";
	$return.= "address					: '" . $address . "' ,";
	$return.= "zoom						: '" . $zoom . "' ,";
	$return.= "nav_controls				: '" . $nav_controls . "' ,";
	$return.= "enable_street_view		: '" . $enable_street_view . "' ,";
	$return.= "map_type_controls		: '" . $map_type_controls . "' ,";
	$return.= "draggable				: '" . $draggable . "' ,";
	$return.= "scrollwheel				: '" . $scrollwheel . "' ,";
	$return.= "markers					: [" . $markers . "] ,";
	$return.= "});";
	$return.= "});";
	$return.= "</script>";

	$GLOBALS['ts_map_count']++;

	return do_shortcode($return);
}

$GLOBALS['ts_map_count'] = 0;
add_shortcode('map' , 'ts_map');

function ts_marker($atts , $content = null){
	extract(shortcode_atts(array(
		  'title' => '' ,
		  'color' => 'blue' ,
		  'latitude' => '' ,
		  'longitude' => '' ,
		  'address' => '' ,
			) , $atts));

	$markers_count = count($GLOBALS['ts_markers']);
	$GLOBALS['ts_markers'][] = "{title: '" . $title . "' , color: '" . $color . "' , latitude: '" . $latitude . "' , longitude: '" . $longitude . "' , address: '" . $address . "'}";
}

add_shortcode('marker' , 'ts_marker');

function ts_static_map($atts , $content = null){
	extract(shortcode_atts(array(
		  'width' => '300' ,
		  'height' => '250' ,
		  'size' => '' ,
		  'address' => '' ,
		  'latitude' => '' ,
		  'longitude' => '' ,
		  'zoom' => '4' ,
		  'type' => 'roadMap' ,
		  'align' => '' ,
			) , $atts));

	if($size){
		$size = ts_get_size($size);
		$width = $size[0];
		$height = $size[1];
	}

	$class = array();

	$class = array('block');
	if(in_array($align , array('right' , 'left' , 'center')))
		$class[] = 'align-' . $align;


	$GLOBALS['ts_static_markers'] = array();
	do_shortcode($content);
	$markers = implode("" , $GLOBALS['ts_static_markers']);
	unset($GLOBALS['ts_static_markers']);

	$src = "http://maps.google.com/maps/api/staticmap?sensor=false";
	$src.= "&amp;size=" . $width . "x" . $height;
	$src.= "&amp;maptype=" . $type;
	$src.= "&amp;zoom=" . $zoom;
	$src.= "&amp;center=" . ($address ? $address : $latitude . "," . $longitude);
	$src.= $markers;

	$return = "<img class = '" . implode(' ' , $class) . "' width = '" . $width . "' height = '" . $height . "' src = '" . $src . "' />";

	return do_shortcode('[raw]' . $return . '[/raw]');
}

add_shortcode('static_map' , 'ts_static_map');

function ts_static_marker($atts , $content = null){
	extract(shortcode_atts(array(
		  'color' => 'ffffff' ,
		  'size' => 'mid' ,
		  'label' => '' ,
		  'address' => '' ,
		  'latitude' => '' ,
		  'longitude' => '' ,
			) , $atts));

	$GLOBALS['ts_static_markers'][] = "&amp;markers=color:0x" . name2hex($color) . "|size:" . $size . "|label:" . strtoupper($label) . "|" . ($address ? $address : $latitude . "," . $longitude);
}

add_shortcode('static_marker' , 'ts_static_marker');