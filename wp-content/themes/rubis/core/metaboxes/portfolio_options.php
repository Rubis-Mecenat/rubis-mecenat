<?php

add_action('add_meta_boxes' , 'ts_portfolio_add_metaboxes');

function ts_portfolio_add_metaboxes(){
	add_meta_box('portfolio-options' , __('Simplex - Portfolio Item Options' , TS_DOMAIN) , 'ts_portfolio_options' , 'portfolio' , 'normal' , 'high');
}

function ts_portfolio_options(){
	global $post;
	$custom = get_post_custom($post->ID);

	$subtitle = $custom['ts_project_subtitle'][0];
	$overview = $custom['ts_overview'][0];
	$featured_content = $custom['ts_featured_content'][0];
	$featured_colorbox = $custom['ts_featured_colorbox'][0];
	$youtube_video_id = $custom['ts_youtube_video_id'][0];
	$vimeo_video_id = $custom['ts_vimeo_video_id'][0];
	$dailymotion_video_id = $custom['ts_dailymotion_video_id'][0];
	$slider = $custom['ts_slider'][0];

	/*-----------------------*/

	ts_get_option(null , array(
      'label' => __('Subtitle' , TS_DOMAIN) ,
      'type' => 'text' ,
      'name' => 'ts_project_subtitle' ,
      'value' => $subtitle ,
      'info' => __('This subtitle will appear next to the title of the portfolio item.' , TS_DOMAIN) ,
    ));

	/*-----------------------*/

	ts_get_option(null , array(
      'label' => __('Overview' , TS_DOMAIN) ,
      'type' => 'textarea' ,
      'name' => 'overview' ,
      'value' => $overview ,
      'info' => __('Enter a brief description of this portfolio item.' , TS_DOMAIN) ,
    ));

	/*-----------------------*/

	ts_get_option(null , array(
	  'label' => __('Featured Content' , TS_DOMAIN) ,
	  'type' => 'select' ,
	  'id' => 'portfolio-featured-content' ,
	  'class' => 'ts-select-by-id' ,
	  'name' => 'featured_content' ,
	  'value' => $featured_content ,
	  'options' => array(
		'image' => __('Use featured image' , TS_DOMAIN) ,
		'youtube-video-id' => __('YouTube video' , TS_DOMAIN) ,
		'vimeo-video-id' => __('Vimeo video' , TS_DOMAIN) ,
		'dailymotion-video-id' => __('DailyMotion video' , TS_DOMAIN) ,
		'slider' => __('Image slider' , TS_DOMAIN) ,
	  ) ,
	));

	/*-----------------------*/

	echo "<br>";
	ts_get_option(null , array(
      'label' => __('Open featured content in a ColorBox window' , TS_DOMAIN) ,
      'type' => 'checkbox' ,
      '::class' => 'noborder' ,
      'name' => 'ts_featured_colorbox' ,
      'checked' => $featured_colorbox == 'on' ,
    ));

	/*-----------------------*/

	ts_get_option(null , array(
      'label' => __('YouTube Video ID' , TS_DOMAIN) ,
      'type' => 'text' ,
      '::id' => 'youtube-video-id' ,
	  '::class' => 'ts-hide portfolio-featured-content' ,
      'name' => 'youtube_video_id' ,
      'value' => $youtube_video_id ,
      'info' => __("http://www.youtube.com/watch?v=<code>jKATcFKW98A</code><br/>The video ID is: <b>jKATcFKW98A</b>" , TS_DOMAIN) ,
    ));

	/*-----------------------*/

	ts_get_option(null , array(
      'label' => __('Vimeo Video ID' , TS_DOMAIN) ,
      'type' => 'text' ,
      '::id' => 'vimeo-video-id' ,
	  '::class' => 'ts-hide portfolio-featured-content' ,
      'name' => 'vimeo_video_id' ,
      'value' => $vimeo_video_id ,
      'info' => __("http://www.vimeo.com/<code>5014038</code><br/>The video ID is: <b>5014038</b>" , TS_DOMAIN) ,
    ));

	/*-----------------------*/

	ts_get_option(null , array(
      'label' => __('DailyMotion Video ID' , TS_DOMAIN) ,
      'type' => 'text' ,
      '::id' => 'dailymotion-video-id' ,
	  '::class' => 'ts-hide portfolio-featured-content' ,
      'name' => 'dailymotion_video_id' ,
      'value' => $dailymotion_video_id ,
      'info' => __("http://www.dailymotion.com/video/<code>xta12</code>_cutest-cat-ever<br/>The video ID is: <b>xta12</b>" , TS_DOMAIN) ,
    ));

	/*-----------------------*/

	$a = '<a href = "' . ADMIN_URL . '/edit-tags.php?taxonomy=slider&post_type=slide">';
	$b = '<a href = "' . ADMIN_URL . '/post-new.php?post_type=slide">';
	$c = '</a>';

	$options = array();
	$sliders = get_categories(array('hide_empty' => 0 , 'taxonomy' => 'slider'));
	foreach($sliders as $__slider){
		$options[$__slider->cat_ID] = $__slider->cat_name;
	}

	ts_get_option(null , array(
	  'label' => __('Select an image slider' , TS_DOMAIN) ,
	  'type' => 'select' ,
	  '::id' => 'slider' ,
	  '::class' => 'ts-hide portfolio-featured-content' ,
	  'name' => 'slider' ,
	  'value' => $slider ,
	  'options' => $options ,
      'info' => sprintf(__('Click %1$s here %2$s to create a new image slider, or click %3$s here %4$s to add slides to an existing image slider.' , TS_DOMAIN) , $a , $c , $b , $c) ,
    ));
	
}

/* ============================================================================ */

add_action('save_post' , 'ts_portfolio_save_details');

function ts_portfolio_save_details(){
	global $post;

	update_post_meta($post->ID , 'ts_project_subtitle' , $_POST['ts_project_subtitle']);
	update_post_meta($post->ID , 'ts_overview' , $_POST['overview']);
	update_post_meta($post->ID , 'ts_featured_content' , $_POST['featured_content']);
	update_post_meta($post->ID , 'ts_featured_colorbox' , $_POST['ts_featured_colorbox']);
	update_post_meta($post->ID , 'ts_youtube_video_id' , $_POST['youtube_video_id']);
	update_post_meta($post->ID , 'ts_vimeo_video_id' , $_POST['vimeo_video_id']);
	update_post_meta($post->ID , 'ts_dailymotion_video_id' , $_POST['dailymotion_video_id']);
	update_post_meta($post->ID , 'ts_slider' , $_POST['slider']);
}