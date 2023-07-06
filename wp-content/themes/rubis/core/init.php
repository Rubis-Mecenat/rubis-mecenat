<?php

/*==================================================================*/
/* 	DEFINITIONS
/*==================================================================*/

define('TS_DOMAIN' , 'ts_domain');
define('ADMIN_URL' , get_admin_url());
define('THEME_ROOT' , get_template_directory());
define('THEME_URL' , get_template_directory_uri());
define('THEME_CORE' , THEME_ROOT . '/core');
define('THEME_CORE_URL' , THEME_URL . '/core');
define('THEME_IMAGES' , THEME_URL . '/images');
define('THEME_SCRIPTS' , THEME_URL . '/scripts');
define('THEME_STYLES' , THEME_URL . '/styles');
define('THEME_PLUGINS' , THEME_URL . '/plugins');
define('THEME_LANGUAGES' , THEME_URL . '/languages');
define('THEME_VERSION' , '3.1.5');


/*==================================================================*/
/* 	IMPORTS
/*==================================================================*/

require_once(THEME_CORE . '/utils/ts_form.php');
require_once(THEME_CORE . '/utils/ts_colors.php');

/* import the api */
require_once(THEME_CORE . '/api.php');

/* import the shortcoder */
require_once(THEME_CORE . '/shortcoder/init.php');

/* import the media uploader */
require_once(THEME_CORE . '/admin/media_uploader.php');

/* import sidebars */
require_once(THEME_CORE . '/sidebars/sidebars.php');

require_once(THEME_CORE . '/utils/raw.php');


/*==================================================================*/
/* 	IMPORT SHORTCODES
/*==================================================================*/

require_once(THEME_CORE . '/shortcodes/accordion.php');
require_once(THEME_CORE . '/shortcodes/tabs.php');
require_once(THEME_CORE . '/shortcodes/toggle.php');
require_once(THEME_CORE . '/shortcodes/blog.php');
require_once(THEME_CORE . '/shortcodes/button.php');
require_once(THEME_CORE . '/shortcodes/colorbox.php');
require_once(THEME_CORE . '/shortcodes/contact_form.php');
require_once(THEME_CORE . '/shortcodes/flickr.php');
require_once(THEME_CORE . '/shortcodes/twitter.php');
require_once(THEME_CORE . '/shortcodes/map.php');
require_once(THEME_CORE . '/shortcodes/image.php');
require_once(THEME_CORE . '/shortcodes/video.php');
require_once(THEME_CORE . '/shortcodes/search.php');
require_once(THEME_CORE . '/shortcodes/slider.php');
require_once(THEME_CORE . '/shortcodes/typography.php');
require_once(THEME_CORE . '/shortcodes/user_bio.php');
require_once(THEME_CORE . '/shortcodes/modules/blog_modules.php');
require_once(THEME_CORE . '/shortcodes/modules/recent_work_module.php');
require_once(THEME_CORE . '/shortcodes/modules/clients_module.php');


/*==================================================================*/
/* 	IMPORT WIDGETS
/*==================================================================*/

require_once(THEME_CORE . '/widgets/advanced_text.php');
require_once(THEME_CORE . '/widgets/contact_form.php');
require_once(THEME_CORE . '/widgets/dailymotion_video.php');
require_once(THEME_CORE . '/widgets/youtube_video.php');
require_once(THEME_CORE . '/widgets/vimeo_video.php');
require_once(THEME_CORE . '/widgets/twitter.php');
require_once(THEME_CORE . '/widgets/search.php');
require_once(THEME_CORE . '/widgets/flickr.php');
require_once(THEME_CORE . '/widgets/popular_posts.php');
require_once(THEME_CORE . '/widgets/recent_posts.php');
require_once(THEME_CORE . '/widgets/random_posts.php');


/*==================================================================*/
/*	IMPORT CUSTOM TYPES
/*==================================================================*/

require_once(THEME_CORE . '/types/slides.php');
require_once(THEME_CORE . '/types/portfolio.php');
require_once(THEME_CORE . '/types/clients.php');


/*==================================================================*/
/*	IMPORT METABOXES
/*==================================================================*/

require_once(THEME_CORE . '/metaboxes/page_options.php');
require_once(THEME_CORE . '/metaboxes/portfolio_page_options.php');
require_once(THEME_CORE . '/metaboxes/sidebar_options.php');
require_once(THEME_CORE . '/metaboxes/slide_options.php');
require_once(THEME_CORE . '/metaboxes/portfolio_options.php');
require_once(THEME_CORE . '/metaboxes/client_options.php');


/*==================================================================*/
/*	ADMIN ONLY
/*==================================================================*/

if(is_admin()){
	/* theme admin */
	require_once(THEME_CORE . '/admin/init.php');
	
	/* import admin scripts/styles */
	$cpage = basename($PHP_SELF);
	
	if((($cpage == 'post-new.php' || $cpage == 'post.php') && !isset($_GET['post_type'])) ||
		(($cpage == 'post-new.php' || $cpage == 'post.php') && $_GET['post_type'] == 'page') ||
		(($cpage == 'post-new.php' || $cpage == 'post.php') && $_GET['post_type'] == 'slide') ||
		(($cpage == 'post-new.php' || $cpage == 'post.php') && $_GET['post_type'] == 'portfolio') ||
		(($cpage == 'post-new.php' || $cpage == 'post.php') && $_GET['post_type'] == 'client') ||
		($cpage == 'edit.php' && $_GET['post_type'] == 'slide') ||
		($cpage == 'edit.php' && $_GET['post_type'] == 'portfolio') ||
		($cpage == 'edit.php' && $_GET['post_type'] == 'client') ||
		($cpage == 'widgets.php') ||
		$cpage == 'themes.php' && $_GET['page'] == 'ts-theme-options'){
		add_action('admin_print_styles' , 'admin_styles');
		add_action('admin_enqueue_scripts' , 'admin_scripts');
	}
	
	function admin_styles(){
		wp_register_style('ts_admin_styles' , THEME_CORE_URL . '/styles/styles.css' , array() , THEME_VERSION , 'all');
		wp_enqueue_style('ts_admin_styles');
	}

	function admin_scripts(){
		wp_register_script('ts_range' , THEME_CORE_URL . '/scripts/jquery.tools.min.js' , array() , THEME_VERSION);
		wp_enqueue_script('ts_range');

		wp_register_script('ts_color' , THEME_CORE_URL . '/scripts/jscolor.js' , array() , THEME_VERSION);
		wp_enqueue_script('ts_color');

		wp_register_script('ts_admin_scripts' , THEME_CORE_URL . '/scripts/scripts.js' , array('jquery') , THEME_VERSION);
		wp_enqueue_script('ts_admin_scripts');
	}
	
	/* thickbox */
	if(isset($_GET['page']) && $_GET['page'] == 'ts-theme-options'){
		wp_enqueue_style('thickbox');
		wp_enqueue_script('thickbox');
	}
}