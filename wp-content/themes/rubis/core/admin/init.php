<?php

add_action('admin_menu' , 'ts_theme_admin');
add_action('wp_ajax_ts_theme_data_save' , 'ts_theme_admin_save');

function ts_theme_admin(){
	add_theme_page(__('Theme Options' , TS_DOMAIN) , __('Theme Options' , TS_DOMAIN) , 'edit_themes' , 'ts-theme-options' , 'ts_init_theme_admin');
}

function ts_theme_admin_save(){
	check_ajax_referer('ts-theme-data', 'security');

	$data = $_POST;
	unset($data['security'], $data['action']);
	
	if(!is_array(get_option('ts_theme_options')) || $data['reset'] == 'true'){
		$options = array();
	} else {
		$options = get_option('ts_theme_options');
	}
	
	if($data == $options) die("2");
	
	if(update_option('ts_theme_options' , $data)){
		die('1');
	}else{
		die('0');
	}
}

function ts_init_theme_admin(){
	require_once('theme_admin.php');
}