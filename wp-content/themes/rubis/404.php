<?php
	$GLOBALS['ts_hide_title'] = true;
	$GLOBALS['ts_sidebar_location'] = 'none';
?><?php get_header(); ?>

<div id = "error-404-page">
	<div style = "text-align: center;">
		<h2 style = "font-size: 150px; font-style: normal; line-height: 1.3em; margin: 0;text-shadow: 0 1px 1px #fff, 0 -1px 1px rgba(0,0,0,0.4);color: #d0d0d0;">404</h2>
		<h3 class = "shade-6" style = "font-size: 24px;"><?php echo ts_get_theme_option('error_404_title'); ?></h3>
		<h4 class = "shade-9"><?php echo ts_get_theme_option('error_404_message'); ?></h4>
		
		<?php if(ts_get_theme_option('show_error_404_search') == 'on') : ?>
		<hr>
		
		<form method = "get" action = "#">
			<input style = "width: 150px; height: 16px;" type = "text" data-prompt = "<?php echo ts_get_theme_option('error_404_search_prompt'); ?>" value = "<?php echo ts_get_theme_option('error_404_search_prompt'); ?>" name = "s" class = "js-original">
			<button name = "submit" type = "submit"><?php echo ts_get_theme_option('error_404_search_button_label'); ?></button>
		</form>
		<?php endif; ?>
	</div>
</div>
					
<?php get_footer(); ?>