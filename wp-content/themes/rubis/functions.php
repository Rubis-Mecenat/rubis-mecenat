<?php

/* Initialize */
require_once('core/init.php');

/* ================================================================== */
/* 	SETUP THEME
/* ================================================================== */

$supported_post_formats = array('aside' , 'gallery' , 'link' , 'image' , 'quote' , 'video' , 'audio');

if(!function_exists('ts_setup')){

	function ts_setup(){
		global $content_width;
		if(!isset($content_width)) $content_width = 640;
		
		/* Make this theme available for translation.
		  Translations can be added to the /languages/ directory. */
		load_theme_textdomain(TS_DOMAIN , get_template_directory() . '/languages');

		$locale = get_locale();
		$locale_file = get_template_directory() . '/languages/' . $locale . '.php';
		if(is_readable($locale_file)){
			require_once($locale_file);
		}

		/* Register navigation menus */
		register_nav_menu('primary' , __('Primary Menu' , TS_DOMAIN));

		/* This theme styles the visual editor with editor-style.css to match the theme style. */
		add_editor_style();

		/* Add default posts and comments RSS feed links to <head>. */
		add_theme_support('automatic-feed-links');

		/* Add support for a variety of post formats */
		global $supported_post_formats;
		add_theme_support('post-formats' , $supported_post_formats);

		/* This theme uses Featured Images (also known as post thumbnails) for per-post/per-page Custom Header images */
		add_theme_support('post-thumbnails');
	}

}

add_action('after_setup_theme' , 'ts_setup');

/* ================================================================== */
/*  THEME FUNCTIONS
/* ================================================================== */

if(!function_exists('ts_get_announcement')){

	function ts_get_announcement(){
		$announcement = ts_get_theme_option('announcement');
		if(ts_get_theme_option('show_announcement') != "off" && !empty($announcement)){
			return ts_get_theme_option('announcement');
		}
	}

}

if(!function_exists('ts_get_social_links')){

	function ts_get_social_links(){
		$social_links_text = ts_get_theme_option('social_links_text');
		if($social_links_text)
			echo '<p>' . $social_links_text . '</p>';
?>

		<ul>
	<?php
		$social_links = ts_get_theme_option('social_links');

		foreach($social_links as $social_link => $data){
			if($data['link']){
	?>
				<li class = "<?php echo $social_link; ?>-link">
					<a href = "<?php echo $data['link']; ?>" title = "<?php echo $data['title']; ?>" target = "<?php echo ts_get_theme_option('social_links_target'); ?>"><?php echo $data['title']; ?></a>
				</li>
	<?php
			}
		}
	?>
	</ul>
<?php
	}

}
/* Autoriser les fichiers SVG */
function wpc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'wpc_mime_types');