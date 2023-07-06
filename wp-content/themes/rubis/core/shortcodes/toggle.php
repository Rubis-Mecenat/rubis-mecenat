<?php

function ts_toggle($atts , $content = null){
	extract(shortcode_atts(array(
		  'title' => '' ,
		  'active' => 'true' ,
			) , $atts));

	return '[raw]<div class = "toggle ' . ($active == 'false' ? '' : ' active') . '"><div class = "toggle-title"><span class = "indicator"></span>' . $title . '</div><div class = "toggle-body">[/raw]' . do_shortcode($content) . '[raw]</div></div>[/raw]';
}

add_shortcode('toggle' , 'ts_toggle');