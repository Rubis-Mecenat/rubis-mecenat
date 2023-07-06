<?php

/* YouTube
  ---------------------------------------------------------------- */

function ts_youtube($atts , $content = null){
	return ts_video('youtube' , $atts , $content);
}

add_shortcode('youtube' , 'ts_youtube');



/* Vimeo
  ---------------------------------------------------------------- */

function ts_vimeo($atts , $content = null){
	return ts_video('vimeo' , $atts , $content);
}

add_shortcode('vimeo' , 'ts_vimeo');



/* DailyMotion
  ---------------------------------------------------------------- */

function ts_dailymotion($atts , $content = null){
	return ts_video('dailymotion' , $atts , $content);
}

add_shortcode('dailymotion' , 'ts_dailymotion');

function ts_video($type , $atts , $content = null){
	extract(shortcode_atts(array(
		  'video_id' => '' ,
		  'width' => '' ,
		  'height' => '' ,
		  'size' => '' ,
		  'autoplay' => 'false' ,
		  'align' => '' ,
			) , $atts));

	if(strrpos($video_id , "?") === false)
		$video_id .= "?";
	
	$video_id .= '&amp;wmode=transparent';
	$video_id .= $autoplay == 'true' ? '&amp;autoplay=1' : '';

	if(in_array($align , array('right' , 'left' , 'center')))
		$class[] = 'align-' . $align;

	if($size){
		$size = ts_get_size($size);
		$width = $size[0];
		$height = $size[1];
	}

	$return = '';

	if(!$width && !$height)
		$return .= '<div class = "video-wrap">';

	$return .= "<iframe " . ($class == "" ? "" : " class = '" . implode(' ' , $class) . "'") . " src = '" . ts_get_video_embed_url($type) . $video_id . "' " . ($width ? "width = '" . $width . "'" : "") . " " . ($height ? "height = '" . $height . "'" : "") . "></iframe>";

	if(!$width && !$height)
		$return .= '</div>';

	return do_shortcode($return);
}