<?php

add_action('add_meta_boxes' , 'ts_client_add_metaboxes');

function ts_client_add_metaboxes(){
	add_meta_box('client-options' , __('Simplex - Client Options' , TS_DOMAIN) , 'ts_client_options' , 'client' , 'normal' , 'high');
}

function ts_client_options(){
	global $post;
	$custom = get_post_custom($post->ID);

	$link = $custom['ts_link'][0];

	ts_get_option(null , array(
      'label' => __('Client Link' , TS_DOMAIN) ,
      'type' => 'text' ,
      'name' => 'link' ,
      'value' => $link ,
    ));

}

/* ============================================================================ */

add_action('save_post' , 'ts_client_save_details');

function ts_client_save_details(){
	global $post;

	update_post_meta($post->ID , 'ts_link' , $_POST['link']);
}