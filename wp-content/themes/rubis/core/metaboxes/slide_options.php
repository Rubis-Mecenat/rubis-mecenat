<?php

add_action('add_meta_boxes' , 'ts_slide_add_metaboxes');

function ts_slide_add_metaboxes(){
	add_meta_box('slide-options' , __('Simplex - Slide Options' , TS_DOMAIN) , 'ts_slide_options' , 'slide' , 'normal' , 'high');
}

function ts_slide_options(){
	global $post;
	$custom = get_post_custom($post->ID);

	$link_to = $custom['ts_link_to'][0];
	$post = $custom['ts_post'][0];
	$project = $custom['ts_portfolio-item'][0];
	$page = $custom['ts_page'][0];
	$custom_link = $custom['ts_custom-link'][0];

	/*-----------------------*/

	ts_get_option(null , array(
	  'label' => __('Where should this slide link to?' , TS_DOMAIN) ,
	  'type' => 'select' ,
	  'id' => 'slide-link-to' ,
	  'class' => 'ts-select-by-id' ,
	  'name' => 'link_to' ,
	  'value' => $link_to ,
	  'options' => array(
		'none' => __('Nothing' , TS_DOMAIN) ,
		'post' => __('Blog post' , TS_DOMAIN) ,
		'portfolio-item' => __('Portfolio item' , TS_DOMAIN) ,
		'page' => __('Page' , TS_DOMAIN) ,
		'custom-link' => __('Custom link' , TS_DOMAIN) ,
	  ) ,
	));

	/*-----------------------*/

	$options = array();
	$posts = get_posts(array('numberposts' => -1));
	foreach($posts as $__post){
		setup_postdata($__post);
		$options[$__post->ID] = get_the_title($__post->ID);
	}
	wp_reset_query();

	ts_get_option(null , array(
	  'label' => __('Select a blog post' , TS_DOMAIN) ,
	  'type' => 'select' ,
	  '::id' => 'post' ,
	  '::class' => 'ts-hide slide-link-to' ,
	  'name' => 'post' ,
	  'value' => $post ,
	  'options' => $options ,
	));

	/*-----------------------*/

	$options = array();
	$posts = get_posts(array('numberposts' => -1 , 'post_type' => 'portfolio'));
	foreach($posts as $__post){
		setup_postdata($__post);
		$options[$__post->ID] = get_the_title($__post->ID);
	}
	wp_reset_query();

	ts_get_option(null , array(
	  'label' => __('Select a portfolio item' , TS_DOMAIN) ,
	  'type' => 'select' ,
	  '::id' => 'portfolio-item' ,
	  '::class' => 'ts-hide slide-link-to' ,
	  'name' => 'portfolio-item' ,
	  'value' => $project ,
	  'options' => $options ,
	));

	/*-----------------------*/

	$label = __('Select a page' , TS_DOMAIN);
	$dropdown = wp_dropdown_pages(array(
								'name' => 'page' ,
								'id' => 'slide-link-to-page' ,
								'echo' => false ,
								'selected' => $page ,
								));
	$select_page = <<<TST
	<div id = "page" class="ts-option ts-hide slide-link-to">
		<label class="ts-label">{$label}<span class="ts-clear"></span>
		{$dropdown}
		</label>
	</div>
TST;
	echo $select_page;

	/*-----------------------*/

	ts_get_option(null , array(
      'label' => __('Custom Link' , TS_DOMAIN) ,
      'type' => 'text' ,
      '::id' => 'custom-link' ,
	  '::class' => 'ts-hide slide-link-to' ,
      'name' => 'custom-link' ,
      'value' => $custom_link ,
    ));

}

/* ============================================================================ */

add_action('save_post' , 'ts_slide_save_details');

function ts_slide_save_details(){
	global $post;

	update_post_meta($post->ID , 'ts_link_to' , $_POST['link_to']);
	update_post_meta($post->ID , 'ts_post' , $_POST['post']);
	update_post_meta($post->ID , 'ts_portfolio-item' , $_POST['portfolio-item']);
	update_post_meta($post->ID , 'ts_page' , $_POST['page']);
	update_post_meta($post->ID , 'ts_custom-link' , $_POST['custom-link']);
}