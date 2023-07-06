<?php

add_action('add_meta_boxes' , 'ts_sidebar_add_metaboxes');

function ts_sidebar_add_metaboxes(){
	add_meta_box('sidebar-options' , __('Simplex - Sidebar Options' , TS_DOMAIN) , 'ts_sidebar_options' , 'page' , 'side' , 'default');
}

function ts_sidebar_options(){
	global $post;
	$custom = get_post_custom($post->ID);

	/*-----------------------*/
	
	$options = array(
		'right' => __('Right side' , TS_DOMAIN) ,
		'left' => __('Left side' , TS_DOMAIN) ,
		'none' => __('No Sidebar' , TS_DOMAIN) ,
	);
	
	ts_get_option(null , array(
	  'label' => __('Sidebar location' , TS_DOMAIN) ,
	  'type' => 'select' ,
	  'name' => 'ts_sidebar_location' ,
	  'value' => $custom['ts_sidebar_location'][0] ,
	  'options' => $options ,
	));

	/*-----------------------*/
	
	$options = array(
		'primary-sidebar' => __('Primary Sidebar' , TS_DOMAIN) ,
	);
	
	$custom_sidebars = ts_get_theme_option('custom_sidebars');
	if($custom_sidebars){
		$custom_sidebars = explode("&" , $custom_sidebars);
	
		foreach($custom_sidebars as $str){
			$a = explode("=" , $str);
			$options[$a[0]] = $a[1];
		}
	}
	
	ts_get_option(null , array(
	  'label' => __('Select a sidebar' , TS_DOMAIN) ,
	  'type' => 'select' ,
	  'name' => 'ts_sidebar' ,
	  'value' => $custom['ts_sidebar'][0] ,
	  'options' => $options ,
	  'info' => sprintf(__('Select a sidebar to display on this page. <br> You can add more sidebars on the %1$s Theme Options %2$s page.' , TS_DOMAIN) , '<a href = "' . ADMIN_URL . 'themes.php?page=ts-theme-options&tab=sidebars">' , '</a>') ,
	));

	/*-----------------------*/

}

/* ============================================================================ */

add_action('save_post' , 'ts_sidebar_save_details');

function ts_sidebar_save_details(){
	global $post;

	update_post_meta($post->ID , 'ts_sidebar_location' , $_POST['ts_sidebar_location']);
	update_post_meta($post->ID , 'ts_sidebar' , $_POST['ts_sidebar']);
}