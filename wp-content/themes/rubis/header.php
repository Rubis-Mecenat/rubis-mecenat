<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<!-- Meta -->
		<meta charset = "<?php bloginfo('charset'); ?>" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1">
        <meta name="robots" content="index, follow">

		<!-- Favicon -->
		<link rel = "shortcut icon" href = "<?php echo ts_get_theme_option('favicon_path'); ?>" />

		<!-- Title -->
		<title>
		<?php
		/* Print the <title> tag based on what is being viewed. */
		global $page , $paged;

		if(is_home()){
			$GLOBALS['current_post_id'] = get_option('page_for_posts');
		}else{
			$GLOBALS['current_post_id'] = $post->ID;
		}

		$site_description = get_bloginfo('description' , 'display');
		if($site_description && (is_home() || is_front_page())){
			echo get_bloginfo('name') . ' - ' . $site_description;
		}else{
			echo wp_title('' , false) . ' - ' . get_bloginfo('name');
		}

		/* Add a page number if necessary: */
		if($paged >= 2 || $page >= 2){
			echo ' - ' . sprintf(__('Page %s' , TS_DOMAIN) , max($paged , $page));
		}
		?>
		</title>

		<!-- Link -->
		<link rel = "profile" href = "http://gmpg.org/xfn/11" />
		<link rel = "pingback" href = "<?php bloginfo('pingback_url'); ?>" />

		<!-- Fonts -->
		<?php echo ts_get_theme_option('fonts'); ?>

		<!-- Styles -->
		<link rel = "stylesheet" type = "text/css" media = "all" href = "<?php bloginfo('stylesheet_url'); ?>?ver=<?php echo THEME_VERSION; ?>" />

		<!-- jQuery -->
		<?php wp_enqueue_script('jquery'); ?>

		<!-- Plugins -->
		<link href = "<?php echo THEME_PLUGINS; ?>/colorbox/colorbox.css?ver=<?php echo THEME_VERSION; ?>" rel = "stylesheet" type = "text/css" media = "all" />
		<link href = "<?php echo THEME_PLUGINS; ?>/colorbox/skin.css?ver=<?php echo THEME_VERSION; ?>" rel = "stylesheet" type = "text/css" media = "all" />

		<link href = "<?php echo THEME_PLUGINS; ?>/flexslider/flexslider.css?ver=<?php echo THEME_VERSION; ?>" rel = "stylesheet" type = "text/css" media = "all" />
		<link href = "<?php echo THEME_PLUGINS; ?>/flexslider/skin.css?ver=<?php echo THEME_VERSION; ?>" rel = "stylesheet" type = "text/css" media = "all" />

		<link href = "<?php echo THEME_PLUGINS; ?>/mediaelement/mediaelementplayer.min.css?ver=<?php echo THEME_VERSION; ?>" rel = "stylesheet" type = "text/css" media = "all" />
		<link href = "<?php echo THEME_PLUGINS; ?>/mediaelement/skin.css?ver=<?php echo THEME_VERSION; ?>" rel = "stylesheet" type = "text/css" media = "all" />

		<!-- Skin -->
		<link rel = "stylesheet" type = "text/css" media = "all" href = "<?php echo THEME_STYLES; ?>/skin.php?ver=<?php echo THEME_VERSION; ?>" />

		<!-- IE -->
		<!--[if lt IE 9]>
			<link href = "<?php echo THEME_STYLES; ?>/ie/ie.css?ver=<?php echo THEME_VERSION; ?>" rel = "stylesheet" type = "text/css" media = "all" />
			<script src = "<?php echo THEME_SCRIPTS; ?>/ie/html5.js?ver=<?php echo THEME_VERSION; ?>" type = "text/javascript"></script>
		<![endif]-->

		<?php if(is_singular() && comments_open() && get_option('thread_comments'))
			wp_enqueue_script('comment-reply'); ?>
		<?php wp_head(); ?>

		<style>
			<?php echo ts_get_theme_option('custom_css'); ?>
		</style>

		<script type = "text/javascript">
			var template_path = "<?php echo THEME_URL; ?>";
		</script>

		<?php echo ts_get_theme_option("google_analytics"); ?>
	</head>

	<body <?php body_class(); ?>>
		<div id = "main-wrap">
			<?php edit_post_link(__('Edit' , TS_DOMAIN) , '<span class = "ts-edit-link edit-link">' , '</span>' , $GLOBALS['current_post_id']); ?>

			<?php if(ts_get_announcement()) : ?>
			<div id = "announcement" class = "container-wrap">
				<div id = "announcement-container" class = "container">
					<div id = "announcement-content">
						<?php echo ts_get_announcement(); ?>
					</div><!--- #announcement-content -->

					<a href = "#" class = "close-announcement"><?php _e('Close' , TS_DOMAIN); ?></a>
				</div><!--- #announcement-container -->
			</div><!--- #announcement -->
			<?php endif; ?>

			<div id = "cap" class = "container-wrap"></div><!--- #cap -->

			<header id = "header" class = "container-wrap">
            	
				<div id = "header-container" class = "container">

					<div id = "logo">
						<a id = "site-title" href = "<?php echo esc_url(home_url('/')); ?>" title = "<?php echo esc_attr(get_bloginfo('name' , 'display')); ?>" rel = "home">
							<img src = "<?php echo ts_get_theme_option('logo'); ?>" alt = "<?php echo esc_attr(get_bloginfo('name' , 'display')); ?>" />
						</a><!--- #site-title -->

						<?php if(ts_get_theme_option('show_tagline') == 'on') : ?>
							<span id = "site-description">
								<?php bloginfo('description'); ?>
							</span><!--- #site-description -->
						<?php endif; ?>
					</div><!--- #logo -->
					
					<nav id = "main-nav-menu">
						<?php
						wp_nav_menu(array(
						'theme_location' => 'primary' ,
						'fallback_cb' => 'ts_nav_menu_fallback' ,
						'container' => false
						));
						?>
                      
					</nav><!--- #main-nav-menu -->
					<div id="language">
            	 		<!-- ajout choix trad--><?php echo qtrans_generateLanguageSelectCode('both'); ?>
            	 		<!-- ajout choix trad--><?php //echo qtrans_generateLanguageSelectCode('image'); ?>
                	</div>
					<select id = "responsive-main-nav-menu" onchange = "javascript:window.location.replace(this.value);"></select>

				</div><!--- #header-container -->
			</header><!--- #header -->

			<section id = "page" class = "container-wrap">
				<div id = "page-container" class = "container">

				<?php 
				$custom_title = isset($GLOBALS['ts_custom_title']) ? $GLOBALS['ts_custom_title'] : ts_get_meta('ts_custom_title'); 
				$hide_title = isset($GLOBALS['ts_hide_title']) ? $GLOBALS['ts_hide_title'] : ts_get_meta('ts_hide_title'); 
				$subtitle = isset($GLOBALS['ts_subtitle']) ? $GLOBALS['ts_subtitle'] : ts_get_meta('ts_subtitle'); 
				
				if($_GET['lang']=='en'){
					$custom_title = ts_get_meta('ts_custom_title_en') /*'Individuals are at the heart of organisations that make things happen' */; 
					$subtitle = ts_get_meta('ts_subtitle_en'); 
				}
				?>
				<?php if(!$hide_title) : ?>
				<header id = "page-header" <?php echo ts_get_meta('ts_center_title') ? 'class = "center"' : ''; ?>>
					<h1><span><?php echo $custom_title ? $custom_title : wp_title('' , false); ?></span><?php /*<small><?php echo $subtitle; ?></small> */ ?></h1>
					
					<?php
						echo isset($GLOBALS['ts_header_aside_content']) ? $GLOBALS['ts_header_aside_content'] : '';
					?>
                   
				</header><!--- #page-header -->
				<?php endif; ?>

				<div id = "page-content">
					<div class = "row">
						<section class = "span-12">