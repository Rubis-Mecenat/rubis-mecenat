<?php

function ts_accordion($atts , $content = null){
	extract(shortcode_atts(array(
		  'selected_index' => '1' ,
			) , $atts));

	$GLOBALS['current_accordion_index'] = 0;
	$GLOBALS['accordion_index'] = $selected_index;

	$content = do_shortcode($content);

	unset($GLOBALS['current_accordion_index']);
	unset($GLOBALS['accordion_index']);
	
	return '<div class = "accordion">' . $content . '</div>';
}

add_shortcode('accordion' , 'ts_accordion');

function ts_accordion_panel($atts , $content = null){
	extract(shortcode_atts(array(
		  'title' => '' ,
			) , $atts));

	$GLOBALS['current_accordion_index']++;
	return '[raw]<div class = "accordion-panel' . ($GLOBALS['accordion_index'] == $GLOBALS['current_accordion_index'] ? ' active' : '') . '"><div class = "accordion-panel-title"><span class = "indicator"></span>' . $title . '</div><div class = "accordion-panel-body">[/raw]' . do_shortcode($content) . '[raw]</div></div>[/raw]';
}

add_shortcode('accordion_panel' , 'ts_accordion_panel');