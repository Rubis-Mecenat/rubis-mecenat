<?php

add_action('add_meta_boxes' , 'ts_portfolio_page_add_metaboxes');

function ts_portfolio_page_add_metaboxes(){
	global $post;
	$template = get_post_meta($post->ID, '_wp_page_template', true);
	
	if($template == "portfolio-classic-1c.php" ||
	   $template == "portfolio-classic-2c.php" ||
	   $template == "portfolio-classic-3c.php" ||
	   $template == "portfolio-classic-4c.php" ||
	   $template == "portfolio-compact-2c.php" ||
	   $template == "portfolio-compact-3c.php" ||
	   $template == "portfolio-filterable.php"){
	   
	   add_meta_box('portfolio_page-options' , __('Simplex - Portfolio Options' , TS_DOMAIN) , 'ts_portfolio_page_options' , 'page' , 'normal' , 'high');
	}
}

function ts_portfolio_page_options(){
	global $post;
	$custom = get_post_custom($post->ID);

	ts_get_option(null , array(
	  'label' => __('Items Count' , TS_DOMAIN) ,
	  'type' => 'range' ,
	  'name' => 'ts_portfolio_count' ,
	  'min' => 1 ,
	  'max' => 100 ,
	  'value' => ts_get_meta('ts_portfolio_count') ,
	  'info' => __('Set the number of portfolio items per page.' , TS_DOMAIN) ,
	));
	
	ts_get_option(null , array(
	  'label' => __('Hide Titles' , TS_DOMAIN) ,
	  'type' => 'checkbox' ,
	  'name' => 'ts_portfolio_hide_titles' ,
	  'checked' => ts_get_meta('ts_portfolio_hide_titles') == 'on' ,
	  'info' => __('Check this option if you want to hide titles of the portfolio items.' , TS_DOMAIN) ,
	));
	
	ts_get_option(null , array(
	  'label' => __('Hide Categories' , TS_DOMAIN) ,
	  'type' => 'checkbox' ,
	  'name' => 'ts_portfolio_hide_cats' ,
	  'checked' => ts_get_meta('ts_portfolio_hide_cats') == 'on' ,
	  'info' => __('Check this option if you want to hide categories of the portfolio items.' , TS_DOMAIN) ,
	));
	
	ts_get_option(null , array(
	  'label' => __('Do not link to Portfolio Item Page' , TS_DOMAIN) ,
	  'type' => 'checkbox' ,
	  'name' => 'ts_portfolio_nolink_to_page' ,
	  'checked' => ts_get_meta('ts_portfolio_nolink_to_page') == 'on' ,
	  'info' => __('Check this option if you do not want to display titles of the portfolio items as links.' , TS_DOMAIN) ,
	));
	
	ts_get_option(null , array(
	  'label' => __('Group ColorBox Previews' , TS_DOMAIN) ,
	  'type' => 'checkbox' ,
	  'name' => 'ts_portfolio_colorbox_items' ,
	  'checked' => ts_get_meta('ts_portfolio_colorbox_items') == 'on' ,
	  'info' => __('Check this option if you want to display next/previous buttons in the ColorBox preview.' , TS_DOMAIN) ,
	));

}

/* ============================================================================ */

add_action('save_post' , 'ts_portfolio_page_save_details');

function ts_portfolio_page_save_details(){
	global $post;

	update_post_meta($post->ID , 'ts_portfolio_count' , $_POST['ts_portfolio_count']);
	update_post_meta($post->ID , 'ts_portfolio_hide_titles' , $_POST['ts_portfolio_hide_titles']);
	update_post_meta($post->ID , 'ts_portfolio_hide_cats' , $_POST['ts_portfolio_hide_cats']);
	update_post_meta($post->ID , 'ts_portfolio_nolink_to_page' , $_POST['ts_portfolio_nolink_to_page']);
	update_post_meta($post->ID , 'ts_portfolio_colorbox_items' , $_POST['ts_portfolio_colorbox_items']);
}