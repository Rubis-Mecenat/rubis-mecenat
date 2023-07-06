<?php

function ts_tabs($atts , $content = null){
	extract(shortcode_atts(array(
		  'selected_index' => '1' ,
			) , $atts));

	$GLOBALS['ts_tabs'] = array();
	do_shortcode($content);

	$current_tab_index = 0;
	foreach($GLOBALS['ts_tabs'] as $tab){
		$current_tab_index++;
		$tabs[] = '<li class = "tab' . ($selected_index == $current_tab_index ? ' active' : '') . '">' . $tab['title'] . '</li>';
		$panels[] = '<div class = "tab-body">' . $tab['body'] . '</div>';
	}

	return '[raw]<div class = "tabs"><ul class = "tab-group">' . implode("\n" , $tabs) . '</ul><div class = "tab-body-group">' . implode("\n" , $panels) . '</div></div>[/raw]';
}

add_shortcode('tabs' , 'ts_tabs');

function ts_tab($atts , $content = null){
	extract(shortcode_atts(array(
		  'title' => '' ,
			) , $atts));

	$GLOBALS['ts_tabs'][] = array('title' => $title , 'body' => do_shortcode($content));
}

add_shortcode('tab' , 'ts_tab');