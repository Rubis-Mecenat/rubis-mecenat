<?php

add_action('add_meta_boxes' , 'ts_page_add_metaboxes');

function ts_page_add_metaboxes(){
	add_meta_box('page-options' , __('Simplex - Page Options' , TS_DOMAIN) , 'ts_page_options' , 'page' , 'normal' , 'high');
}

function ts_page_options(){
	global $post;
	$custom = get_post_custom($post->ID);

	/*-----------------------*/

	ts_get_option(null , array(
	  'label' => __('Custom Title' , TS_DOMAIN) ,
	  'type' => 'text' ,
	  'name' => 'ts_custom_title' ,
	  'value' => $custom['ts_custom_title'][0] ,
	  'info' => __('If provided, this custom title will be displayed instead of the original page title.' , TS_DOMAIN) ,
	));

	/*-----------------------*/

	ts_get_option(null , array(
	  'label' => __('Subtitle' , TS_DOMAIN) ,
	  'type' => 'text' ,
	  'name' => 'ts_subtitle' ,
	  'value' => $custom['ts_subtitle'][0] ,
	  'info' => __('This subtitle will appear next to the page title.' , TS_DOMAIN) ,
	));

	/*-----------------------*/

	ts_get_option(null , array(
	  'label' => __('Center Page Title' , TS_DOMAIN) ,
	  'type' => 'checkbox' ,
	  'name' => 'ts_center_title' ,
	  'checked' => $custom['ts_center_title'][0] == 'on' ,
	  'info' => __('If this option is checked, the page title will be displayed on the center of the page.' , TS_DOMAIN) ,
	));

	/*-----------------------*/

	ts_get_option(null , array(
	  'label' => __('Hide Page Title' , TS_DOMAIN) ,
	  'type' => 'checkbox' ,
	  'name' => 'ts_hide_title' ,
	  'checked' => $custom['ts_hide_title'][0] == 'on' ,
	  'info' => __('If this option is checked, the page title will be hidden on this page.' , TS_DOMAIN) ,
	));

}

/* ============================================================================ */

add_action('save_post' , 'ts_page_save_details');

function ts_page_save_details(){
	global $post;

	update_post_meta($post->ID , 'ts_custom_title' , htmlspecialchars($_POST['ts_custom_title']));
	update_post_meta($post->ID , 'ts_subtitle' , htmlspecialchars($_POST['ts_subtitle']));
	update_post_meta($post->ID , 'ts_hide_title' , $_POST['ts_hide_title']);
	update_post_meta($post->ID , 'ts_center_title' , $_POST['ts_center_title']);
}