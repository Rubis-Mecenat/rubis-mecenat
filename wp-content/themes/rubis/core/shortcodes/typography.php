<?php

/* Highlight
/* -------------------------------------------------------------- */

function ts_highlight($atts , $content = null){
	extract(shortcode_atts(array(
		  'color' => '333333' ,
		  'background_color' => 'transparent' ,
			) , $atts));

	return '<span class = "highlight" style = "color:' . ts_filter_color($color) . ' ; background-color:' . ts_filter_color($background_color) . ' ;">' . do_shortcode($content) . '</span>';
}

add_shortcode('highlight' , 'ts_highlight');



/* Code
/* -------------------------------------------------------------- */

function ts_code($atts , $content = null){
	return '[raw]<code class = "code">' . htmlspecialchars($content) . '</code>[/raw]';
}

add_shortcode('code' , 'ts_code');



/* Pre
/* -------------------------------------------------------------- */

function ts_pre($atts , $content = null){
	return '[raw]<pre class = "pre">' . htmlspecialchars($content) . '</pre>[/raw]';
}

add_shortcode('pre' , 'ts_pre');



/* Blockquote
/* -------------------------------------------------------------- */

function ts_blockquote($atts , $content = null){
	extract(shortcode_atts(array(
		  'align' => '' ,
		  'cite' => '' ,
			) , $atts));

	return '[raw]<blockquote class = "blockquote' . ($align == 'right' || $align == 'left' ? ' align-' . $align : '') . '">[/raw]' . do_shortcode($content) . '[raw]' . ($cite ? '<p><cite>&mdash; ' . $cite . '</cite></p>' : '') . '</blockquote>[/raw]';
}

add_shortcode('blockquote' , 'ts_blockquote');



/* Divider
/* -------------------------------------------------------------- */

function ts_divider($atts , $content = null){
	return '<div class = "divider"></div>';
}

add_shortcode('divider' , 'ts_divider');



/* Margin
/* -------------------------------------------------------------- */

function ts_margin($atts , $content = null){
	extract(shortcode_atts(array(
		  'value' => '20' ,
			) , $atts));
	return '<div style = "height: ' . $value . 'px;"></div>';
}

add_shortcode('margin' , 'ts_margin');



/* Clear
/* -------------------------------------------------------------- */

function ts_clear($atts , $content = null){
	return '<div class = "clearboth"></div>';
}

add_shortcode('clear' , 'ts_clear');



/* Styled Boxes - General
/* -------------------------------------------------------------- */

function ts_box($atts , $content = null){
	return '<div class = "styled-box">' . do_shortcode($content) . '</div>';
}

add_shortcode('box' , 'ts_box');



/* Styled Boxes - Success
/* -------------------------------------------------------------- */

function ts_success_box($atts , $content = null){
	return '<div class = "styled-box iconed-box success">' . do_shortcode($content) . '</div>';
}

add_shortcode('success_box' , 'ts_success_box');



/* Styled Boxes - Error
/* -------------------------------------------------------------- */

function ts_error_box($atts , $content = null){
	return '<div class = "styled-box iconed-box error">' . do_shortcode($content) . '</div>';
}

add_shortcode('error_box' , 'ts_error_box');



/* Styled Boxes - Alert
/* -------------------------------------------------------------- */

function ts_alert_box($atts , $content = null){
	return '<div class = "styled-box iconed-box alert">' . do_shortcode($content) . '</div>';
}

add_shortcode('alert_box' , 'ts_alert_box');



/* Styled Boxes - Info
/* -------------------------------------------------------------- */

function ts_info_box($atts , $content = null){
	return '<div class = "styled-box iconed-box info">' . do_shortcode($content) . '</div>';
}

add_shortcode('info_box' , 'ts_info_box');



/* Styled Boxes - Tip
/* -------------------------------------------------------------- */

function ts_tip_box($atts , $content = null){
	return '<div class = "styled-box iconed-box tip">' . do_shortcode($content) . '</div>';
}

add_shortcode('tip_box' , 'ts_tip_box');



/* Styled Boxes - Note
/* -------------------------------------------------------------- */

function ts_note_box($atts , $content = null){
	return '<div class = "styled-box iconed-box note">' . do_shortcode($content) . '</div>';
}

add_shortcode('note_box' , 'ts_note_box');



/* Styled List
/* -------------------------------------------------------------- */

function ts_styled_list($atts , $content = null){
	extract(shortcode_atts(array(
		  'type' => 'check' ,
			) , $atts));
	return '<ul class = "styled-list ' . $type . '">' . do_shortcode($content) . '</ul>';
}

add_shortcode('styled_list' , 'ts_styled_list');



/* Tagline
/* -------------------------------------------------------------- */

function ts_tagline($atts , $content = null){
	extract(shortcode_atts(array(
		  'heading' => '' ,
			) , $atts));

	return '[raw]<div class = "tagline">' . ($heading ? '<h2>' . $heading . '</h2>' : '') . do_shortcode($content) . '</div>[/raw]';
}

add_shortcode('tagline' , 'ts_tagline');