<div id = "ts-theme-options-wrap" class = "wrap">

	<script src = "<?php echo THEME_CORE_URL; ?>/scripts/theme_admin.js"></script>

	<input type = "hidden" id = "ts-current-tab" value = "ts-<?php echo $_GET['tab'] ? $_GET['tab'] : 'general'; ?>" />
	
	<div id = "ts-theme-options-header">
		<div class = "icon32" id = "icon-options-general"></div>
		<h2><?php _e('Theme Options' , TS_DOMAIN); ?></h2>
	</div>
	
	<div id = "ts-theme-options-body">
		<div id = "ts-theme-options-tabs">
			<span id = "ts-general" class = "ts-theme-options-tab"><?php _e("General" , TS_DOMAIN); ?></span>
			<span id = "ts-logo" class = "ts-theme-options-tab"><?php _e("Logo" , TS_DOMAIN); ?></span>
			<span id = "ts-nav-menu" class = "ts-theme-options-tab"><?php _e("Nav. menu" , TS_DOMAIN); ?></span>
			<span id = "ts-sidebars" class = "ts-theme-options-tab"><?php _e("Sidebars" , TS_DOMAIN); ?></span>
			<span id = "ts-footer" class = "ts-theme-options-tab"><?php _e("Footer" , TS_DOMAIN); ?></span>
			<span id = "ts-fonts" class = "ts-theme-options-tab"><?php _e("Fonts" , TS_DOMAIN); ?></span>
			<span id = "ts-colors" class = "ts-theme-options-tab"><?php _e("Skin color" , TS_DOMAIN); ?></span>
			<span id = "ts-styles" class = "ts-theme-options-tab"><?php _e("Styles" , TS_DOMAIN); ?></span>
			<span id = "ts-portfolio" class = "ts-theme-options-tab"><?php _e("Portfolio" , TS_DOMAIN); ?></span>
			<span id = "ts-error-404" class = "ts-theme-options-tab"><?php _e("Error 404" , TS_DOMAIN); ?></span>
			<span id = "ts-comments" class = "ts-theme-options-tab"><?php _e("Comments" , TS_DOMAIN); ?></span>
			<span id = "ts-announcement" class = "ts-theme-options-tab"><?php _e("Announcement" , TS_DOMAIN); ?></span>
		</div>
		
		<form id = "ts-theme-options">
			<!-- General Options -->
			<table  id = "ts-general-options" class = "ts-options-table">
				<tbody>
				
					<tr><td class = "ts-options-title">
						<div class = "ts-title"><?php _e("General Options" , TS_DOMAIN); ?></div>
					</td></tr>
					
					<tr><td>
					<?php
						ts_get_option(null , array(
												'type' => 'range' ,
												'label' => __("Header height" , TS_DOMAIN) ,
												'name' => 'header_height' ,
												'value' => ts_get_theme_option('header_height') ,
												'min' => 20 ,
												'max' => 400 ,
												'info' => __("Set height of the site header, in pixels." , TS_DOMAIN) ,
												));
					?>
					</td></tr>
					
					<tr><td>
					<?php
						ts_get_option(null , array(
												'type' => 'file' ,
												'label' => __("Fav icon" , TS_DOMAIN) ,
												'name' => 'favicon_path' ,
												'value' => ts_get_theme_option('favicon_path') ,
												'info' => __("A favicon, short for 'favorite icon', is a tiny image used as your website's logo that appears at the start URL in the web browser's menu bar, at the top of tabs and on the Favorites/Bookmarks list." , TS_DOMAIN) ,
												));
					?>
					</td></tr>
					
					<tr><td>
					<?php
						ts_get_option(null , array(
												'type' => 'textarea' ,
												'label' => __("Google analytics code" , TS_DOMAIN) ,
												'name' => 'google_analytics' ,
												'value' => ts_get_theme_option('google_analytics') ,
												'info' => sprintf(__('Enter your %1$s Google Analytics %2$s code here. This code will be added to every page on your site.' , TS_DOMAIN) , '<a href = "http://www.google.com/analytics/" target = "_blank">' , '</a>') ,
												));
					?>
					</td></tr>
					
					<tr><td>
					<?php
						ts_get_option(null , array(
												'type' => 'checkbox' ,
												'label' => __("Enable WordPress Texturize filter" , TS_DOMAIN) ,
												'name' => 'enable_wptexturize_filter' ,
												'checked' => ts_get_theme_option('enable_wptexturize_filter') == 'on' ,
												'info' => sprintf(__('WordPress %1$s Texturize filter %2$s transforms quotes to smart quotes, apostrophes, dashes, ellipses, the trademark symbol, and the multiplication symbol.' , TS_DOMAIN) , '<a href = "http://codex.wordpress.org/Function_Reference/wptexturize" target = "_blank">' , '</a>') ,
												));
					?>
					</td></tr>
					
				</tbody>
			</table>
			
			<!-- Logo Options -->
			<table  id = "ts-logo-options" class = "ts-options-table">
				<tbody>
				
					<tr><td class = "ts-options-title">
						<div class = "ts-title"><?php _e("Logo Options" , TS_DOMAIN); ?></div>
					</td></tr>
				
					<tr><td class = "ts-subtitle">
						<div><?php _e("Site Logo" , TS_DOMAIN); ?></div>
					</td></tr>
					
					<tr><td>
					<?php
						ts_get_option(null , array(
												'type' => 'file' ,
												'label' => __("Logo" , TS_DOMAIN) ,
												'name' => 'logo' ,
												'value' => ts_get_theme_option('logo') ,
												'info' => __("Enter the full url of the image you would like to use including <code>http://</code>." , TS_DOMAIN) ,
												));
					?>
					</td></tr>
					
					<tr><td>
					<?php
						ts_get_option(null , array(
												'type' => 'range' ,
												'label' => __("Logo offset x" , TS_DOMAIN) ,
												'name' => 'logo_offset_x' ,
												'min' => '-200' ,
												'max' => '200' ,
												'value' => ts_get_theme_option('logo_offset_x') ,
												'info' => __("Adjust the position of the logo horizontally, in pixels." , TS_DOMAIN) ,
												));
					?>
					</td></tr>
					
					<tr><td>
					<?php
						ts_get_option(null , array(
												'type' => 'range' ,
												'label' => __("Logo offset y" , TS_DOMAIN) ,
												'name' => 'logo_offset_y' ,
												'min' => '-200' ,
												'max' => '200' ,
												'value' => ts_get_theme_option('logo_offset_y') ,
												'info' => __("Adjust the position of the logo vertically, in pixels." , TS_DOMAIN) ,
												));
					?>
					</td></tr>
				
					<tr><td class = "ts-subtitle">
						<div><?php _e("Site Description" , TS_DOMAIN); ?></div>
					</td></tr>
					
					<tr><td>
					<?php
						ts_get_option(null , array(
												'type' => 'checkbox' ,
												'label' => __("Show site description" , TS_DOMAIN) ,
												'name' => 'show_tagline' ,
												'checked' => ts_get_theme_option('show_tagline') == 'on' ,
												'info' => sprintf(__('Check this option if you want to display your %1$s site description. %2$s' , TS_DOMAIN) , '<a href = "' . ADMIN_URL . 'options-general.php#blogdescription">' , '</a>') ,
												));
					?>
					</td></tr>
					
					<tr><td>
					<?php
						ts_get_option(null , array(
												'type' => 'range' ,
												'label' => __("Site description offset x" , TS_DOMAIN) ,
												'name' => 'tagline_offset_x' ,
												'min' => '-300' ,
												'max' => '300' ,
												'value' => ts_get_theme_option('tagline_offset_x') ,
												'info' => __("Adjust the position of the site description horizontally, in pixels." , TS_DOMAIN) ,
												));
					?>
					</td></tr>
					
					<tr><td>
					<?php
						ts_get_option(null , array(
												'type' => 'range' ,
												'label' => __("Site description offset y" , TS_DOMAIN) ,
												'name' => 'tagline_offset_y' ,
												'min' => '-300' ,
												'max' => '300' ,
												'value' => ts_get_theme_option('tagline_offset_y') ,
												'info' => __("Adjust the position of the site description vertically, in pixels." , TS_DOMAIN) ,
												));
					?>
					</td></tr>
				
				</tbody>
			</table>
			
			<!-- Nav. Menu Options -->
			<table  id = "ts-nav-menu-options" class = "ts-options-table">
				<tbody>
				
					<tr><td class = "ts-options-title">
						<div class = "ts-title"><?php _e("Navigation Menu Options" , TS_DOMAIN); ?></div>
					</td></tr>
					
					<tr><td>
					<?php
						ts_get_option(null , array(
												'type' => 'range' ,
												'label' => __("Submenu width" , TS_DOMAIN) ,
												'name' => 'main_nav_submenu_width' ,
												'min' => '50' ,
												'max' => '300' ,
												'value' => ts_get_theme_option('main_nav_submenu_width') ,
												'info' => __("Set width of the sub-menus, in pixels." , TS_DOMAIN) ,
												));
					?>
					</td></tr>
					
				</tbody>
			</table>
					
			<!-- Sidebars Options -->
			<table  id = "ts-sidebars-options" class = "ts-options-table">
				<tbody>
				
					<tr><td class = "ts-options-title">
						<div class = "ts-title"><?php _e("Custom Sidebars" , TS_DOMAIN); ?></div>
					</td></tr>
				
					<tr><td>
						<label class = "ts-label">
							<?php _e("Sidebar name" , TS_DOMAIN); ?>
							<input type = "text" id = "ts-sidebar-name">
						</label>
						<span class = "ts-secondary-button" onclick = "registerSidebar(this);"><?php _e("Register Sidebar" , TS_DOMAIN); ?></span>
						<span class="ts-info"><?php _e("The sidebar name can only contain: Alphabets (A-Z a-z), Numbers (0-9), Spaces, Underscores (_) and Dashes (-)." , TS_DOMAIN); ?></span>
					</td></tr>
					
					<tr><td>
						<label class = "ts-label">
							<?php _e("Registered Sidebars" , TS_DOMAIN); ?>
						</label>
						<div id = "ts-custom-sidebars">
							
						</div>
						<span class="ts-info ts-no-sidebars"><?php _e("No custom sidebars." , TS_DOMAIN); ?></span>
						<span class="ts-info"><?php _e("You can use a registered sidebar as a custom sidebar on any post or page." , TS_DOMAIN); ?></span>
						<input type = "hidden" name = "custom_sidebars" id = "ts_custom_sidebars" value = "<?php echo ts_get_theme_option('custom_sidebars'); ?>" />
					</td></tr>
				
				</tbody>
			</table>
			
			<!-- Footer Options -->
			<table  id = "ts-footer-options" class = "ts-options-table">
				<tbody>
				
					<tr><td class = "ts-options-title">
						<div class = "ts-title"><?php _e("Footer Widgets" , TS_DOMAIN); ?></div>
					</td></tr>
					
					<tr><td>
					<?php
						ts_get_option(null , array(
												'type' => 'checkbox' ,
												'label' => __("Enable footer widgets" , TS_DOMAIN) ,
												'name' => 'enable_footer_widgets' ,
												'checked' => ts_get_theme_option('enable_footer_widgets') == 'on' ,
												));
					?>
					</td></tr>
					
					<tr><td>
						<label class = "ts-label"><?php _e('Footer widgets layout' , TS_DOMAIN); ?><span class = "ts-block-label"></span></label>
						<input type = "hidden" id = "footer_widgets_layout" name = "footer_widgets_layout" value = "<?php echo ts_get_theme_option('footer_widgets_layout'); ?>">
						<div class = "ts-info"><?php _e('Select a layout for the footer widgets.' , TS_DOMAIN); ?></div>
						<div id = "ts-footer-widgets-layout-grid">
							<?php
								$value = ts_get_theme_option('footer_widgets_layout');
								for($i = 0 ; $i < 3 ; $i++){
									for($j = 0 ; $j < 5 ; $j++){
										echo '<a data-val = "' . ($i*5 + $j) . '" class = "ts-footer-widgets-layout ' . ($value == $i*5 + $j ? 'selected' : '') . '" style = "top: ' . 80*$j . 'px; left:' . 180*$i . 'px; background-position: -' . (180*$i + 3) . 'px -' . (80*$j + 3) . 'px;"></a>';
									}
								}
							?>
						</div>
						</td></tr>
				
					<tr><td class = "ts-options-title">
						<div class = "ts-title"><?php _e("Footer Options" , TS_DOMAIN); ?></div>
					</td></tr>
				
					<tr><td class = "ts-subtitle">
						<div><?php _e("Left Side" , TS_DOMAIN); ?></div>
					</td></tr>
					
					<tr><td>
					<?php
						ts_get_option(null , array(
												'type' => 'textarea' ,
												'label' => __("Copyright text" , TS_DOMAIN) ,
												'name' => 'copyright' ,
												'value' => ts_get_theme_option('copyright') ,
												));
					?>
					</td></tr>
					
					<tr><td>
					<?php
						ts_get_option(null , array(
												'type' => 'checkbox' ,
												'label' => __("Show footer navigation" , TS_DOMAIN) ,
												'name' => 'show_footer_nav' ,
												'checked' => ts_get_theme_option('show_footer_nav') == 'on' ,
												'info' => __('Check this option if you want to display a navigation menu next to the copyright text.' , TS_DOMAIN) ,
												));
					?>
					</td></tr>
					
					<tr><td>
						<h4><?php _e('Footer navigation' , TS_DOMAIN); ?></span></h4>
						<div class = "ts-info"><?php _e('Select pages to display on the footer navigation menu.' , TS_DOMAIN); ?></div>
						<div class = "ts-hide">
						<?php
							wp_dropdown_pages(array(
								'id' => 'footer-nav-page' ,
								'show_option_none' => __('Select a page ...' , TS_DOMAIN) ,
								));
						?>
						</div>
						<div id = "footer-nav-pages">
						
						</div>
						<input type = "hidden" id = "footer_nav" name = "footer_nav" value = "<?php echo ts_get_theme_option('footer_nav'); ?>">
					</td></tr>
				
					<tr><td class = "ts-subtitle">
						<div><?php _e("Right Side" , TS_DOMAIN); ?></div>
					</td></tr>
					
					<tr><td>
					<?php
						ts_get_option(null , array(
												'type' => 'textarea' ,
												'label' => __("Social links introduction text" , TS_DOMAIN) ,
												'name' => 'social_links_text' ,
												'value' => ts_get_theme_option('social_links_text') ,
												));
					?>
					</td></tr>
					
					<tr><td>
					<?php
						ts_get_option(null , array(
												'type' => 'select' ,
												'label' => __("Social links open in:" , TS_DOMAIN) ,
												'name' => 'social_links_target' ,
												'value' => ts_get_theme_option('social_links_target') ,
												'options' => array(
															'_blank' => __('A new window' , TS_DOMAIN) ,
															'_self' => __('The same window' , TS_DOMAIN) ,
																),
												));
					?>
					</td></tr>
					
					<?php
						$social_links = (ts_get_theme_option('social_links'));
						$twitter = $social_links['twitter'];
						$facebook = $social_links['facebook'];
						$youtube = $social_links['youtube'];
						$googleplus = $social_links['googleplus'];
						$linkedin = $social_links['linkedin'];
						$vimeo = $social_links['vimeo'];
						$flickr = $social_links['flickr'];
						$deviantart = $social_links['deviantart'];
						$dribbble = $social_links['dribbble'];
					?>
				
					<tr><td class = "ts-subtitle-2">
						<div><?php _e("Twitter" , TS_DOMAIN); ?></div>
					</td></tr>
					
					<tr><td>
					<?php
						
						ts_get_option(null , array(
												'type' => 'text' ,
												'::class' => 'noborder' ,
												'label' => __("Title" , TS_DOMAIN) ,
												'name' => 'social_links[twitter][title]' ,
												'value' => $twitter['title'] ,
												));
					?>
					
					<?php
						ts_get_option(null , array(
												'type' => 'text' ,
												'::class' => 'noborder' ,
												'label' => __("Link" , TS_DOMAIN) ,
												'name' => 'social_links[twitter][link]' ,
												'value' => $twitter['link'] ,
												));
					?>
					</td></tr>
				
					<tr><td class = "ts-subtitle-2">
						<div><?php _e("Facebook" , TS_DOMAIN); ?></div>
					</td></tr>
					
					<tr><td>
					<?php
						
						ts_get_option(null , array(
												'type' => 'text' ,
												'::class' => 'noborder' ,
												'label' => __("Title" , TS_DOMAIN) ,
												'name' => 'social_links[facebook][title]' ,
												'value' => $facebook['title'] ,
												));
					?>
					
					<?php
						ts_get_option(null , array(
												'type' => 'text' ,
												'::class' => 'noborder' ,
												'label' => __("Link" , TS_DOMAIN) ,
												'name' => 'social_links[facebook][link]' ,
												'value' => $facebook['link'] ,
												));
					?>
					</td></tr>
				
					<tr><td class = "ts-subtitle-2">
						<div><?php _e("YouTube" , TS_DOMAIN); ?></div>
					</td></tr>
					
					<tr><td>
					<?php
						
						ts_get_option(null , array(
												'type' => 'text' ,
												'::class' => 'noborder' ,
												'label' => __("Title" , TS_DOMAIN) ,
												'name' => 'social_links[youtube][title]' ,
												'value' => $youtube['title'] ,
												));
					?>
					
					<?php
						ts_get_option(null , array(
												'type' => 'text' ,
												'::class' => 'noborder' ,
												'label' => __("Link" , TS_DOMAIN) ,
												'name' => 'social_links[youtube][link]' ,
												'value' => $youtube['link'] ,
												));
					?>
					</td></tr>
				
					<tr><td class = "ts-subtitle-2">
						<div><?php _e("Google Plus" , TS_DOMAIN); ?></div>
					</td></tr>
					
					<tr><td>
					<?php
						
						ts_get_option(null , array(
												'type' => 'text' ,
												'::class' => 'noborder' ,
												'label' => __("Title" , TS_DOMAIN) ,
												'name' => 'social_links[googleplus][title]' ,
												'value' => $googleplus['title'] ,
												));
					?>
					
					<?php
						ts_get_option(null , array(
												'type' => 'text' ,
												'::class' => 'noborder' ,
												'label' => __("Link" , TS_DOMAIN) ,
												'name' => 'social_links[googleplus][link]' ,
												'value' => $googleplus['link'] ,
												));
					?>
					</td></tr>
				
					<tr><td class = "ts-subtitle-2">
						<div><?php _e("LinkedIn" , TS_DOMAIN); ?></div>
					</td></tr>
					
					<tr><td>
					<?php
						
						ts_get_option(null , array(
												'type' => 'text' ,
												'::class' => 'noborder' ,
												'label' => __("Title" , TS_DOMAIN) ,
												'name' => 'social_links[linkedin][title]' ,
												'value' => $linkedin['title'] ,
												));
					?>
					
					<?php
						ts_get_option(null , array(
												'type' => 'text' ,
												'::class' => 'noborder' ,
												'label' => __("Link" , TS_DOMAIN) ,
												'name' => 'social_links[linkedin][link]' ,
												'value' => $linkedin['link'] ,
												));
					?>
					</td></tr>
				
					<tr><td class = "ts-subtitle-2">
						<div><?php _e("Vimeo" , TS_DOMAIN); ?></div>
					</td></tr>
					
					<tr><td>
					<?php
						
						ts_get_option(null , array(
												'type' => 'text' ,
												'::class' => 'noborder' ,
												'label' => __("Title" , TS_DOMAIN) ,
												'name' => 'social_links[vimeo][title]' ,
												'value' => $vimeo['title'] ,
												));
					?>
					
					<?php
						ts_get_option(null , array(
												'type' => 'text' ,
												'::class' => 'noborder' ,
												'label' => __("Link" , TS_DOMAIN) ,
												'name' => 'social_links[vimeo][link]' ,
												'value' => $vimeo['link'] ,
												));
					?>
					</td></tr>
				
					<tr><td class = "ts-subtitle-2">
						<div><?php _e("Flickr" , TS_DOMAIN); ?></div>
					</td></tr>
					
					<tr><td>
					<?php
						
						ts_get_option(null , array(
												'type' => 'text' ,
												'::class' => 'noborder' ,
												'label' => __("Title" , TS_DOMAIN) ,
												'name' => 'social_links[flickr][title]' ,
												'value' => $flickr['title'] ,
												));
					?>
					
					<?php
						ts_get_option(null , array(
												'type' => 'text' ,
												'::class' => 'noborder' ,
												'label' => __("Link" , TS_DOMAIN) ,
												'name' => 'social_links[flickr][link]' ,
												'value' => $flickr['link'] ,
												));
					?>
					</td></tr>
				
					<tr><td class = "ts-subtitle-2">
						<div><?php _e("Dribbble" , TS_DOMAIN); ?></div>
					</td></tr>
					
					<tr><td>
					<?php
						
						ts_get_option(null , array(
												'type' => 'text' ,
												'::class' => 'noborder' ,
												'label' => __("Title" , TS_DOMAIN) ,
												'name' => 'social_links[dribbble][title]' ,
												'value' => $dribbble['title'] ,
												));
					?>
					
					<?php
						ts_get_option(null , array(
												'type' => 'text' ,
												'::class' => 'noborder' ,
												'label' => __("Link" , TS_DOMAIN) ,
												'name' => 'social_links[dribbble][link]' ,
												'value' => $dribbble['link'] ,
												));
					?>
					</td></tr>
				
					<tr><td class = "ts-subtitle-2">
						<div><?php _e("DeviantArt" , TS_DOMAIN); ?></div>
					</td></tr>
					
					<tr><td>
					<?php
						
						ts_get_option(null , array(
												'type' => 'text' ,
												'::class' => 'noborder' ,
												'label' => __("Title" , TS_DOMAIN) ,
												'name' => 'social_links[deviantart][title]' ,
												'value' => $deviantart['title'] ,
												));
					?>
					
					<?php
						ts_get_option(null , array(
												'type' => 'text' ,
												'::class' => 'noborder' ,
												'label' => __("Link" , TS_DOMAIN) ,
												'name' => 'social_links[deviantart][link]' ,
												'value' => $deviantart['link'] ,
												));
					?>
					</td></tr>
					
				</tbody>
			</table>
					
			<!-- Fonts Options -->
			<table  id = "ts-fonts-options" class = "ts-options-table">
				<tbody>
				
					<tr><td class = "ts-options-title">
						<div class = "ts-title"><?php _e("Web Fonts" , TS_DOMAIN); ?></div>
					</td></tr>
					
					<tr><td>
					<?php
						ts_get_option(null , array(
												'type' => 'textarea' ,
												'label' => __("Imported web fonts" , TS_DOMAIN) ,
												'class' => 'ts-full' ,
												'name' => 'fonts' ,
												'value' => ts_get_theme_option('fonts') ,
												'info' => sprintf(__('Select the fonts you want to use from %1$s Google Web Fonts Library %2$s, then paste the code here.' , TS_DOMAIN) , '<a href = "http://www.google.com/webfonts" target = "_blank">' , '</a>') ,
												));
					?>
					</td></tr>
				
					<tr><td class = "ts-options-title">
						<div class = "ts-title"><?php _e("Font Size" , TS_DOMAIN); ?></div>
					</td></tr>
					
					<tr><td>
					<?php
						ts_get_option(null , array(
												'type' => 'range' ,
												'label' => __("General font size" , TS_DOMAIN) ,
												'name' => 'body_size' ,
												'min' => 5 ,
												'max' => 60 ,
												'value' => ts_get_theme_option('body_size') ,
												));
					?>
					</td></tr>
					
					<tr><td>
					<?php
						ts_get_option(null , array(
												'type' => 'range' ,
												'label' => __("H1 font size" , TS_DOMAIN) ,
												'name' => 'h1_size' ,
												'min' => 5 ,
												'max' => 60 ,
												'value' => ts_get_theme_option('h1_size') ,
												));
					?>
					</td></tr>
					
					<tr><td>
					<?php
						ts_get_option(null , array(
												'type' => 'range' ,
												'label' => __("H2 font size" , TS_DOMAIN) ,
												'name' => 'h2_size' ,
												'min' => 5 ,
												'max' => 60 ,
												'value' => ts_get_theme_option('h2_size') ,
												));
					?>
					</td></tr>
					
					<tr><td>
					<?php
						ts_get_option(null , array(
												'type' => 'range' ,
												'label' => __("H3 font size" , TS_DOMAIN) ,
												'name' => 'h3_size' ,
												'min' => 5 ,
												'max' => 60 ,
												'value' => ts_get_theme_option('h3_size') ,
												));
					?>
					</td></tr>
					
					<tr><td>
					<?php
						ts_get_option(null , array(
												'type' => 'range' ,
												'label' => __("H4 font size" , TS_DOMAIN) ,
												'name' => 'h4_size' ,
												'min' => 5 ,
												'max' => 60 ,
												'value' => ts_get_theme_option('h4_size') ,
												));
					?>
					</td></tr>
					
					<tr><td>
					<?php
						ts_get_option(null , array(
												'type' => 'range' ,
												'label' => __("H5 font size" , TS_DOMAIN) ,
												'name' => 'h5_size' ,
												'min' => 5 ,
												'max' => 60 ,
												'value' => ts_get_theme_option('h5_size') ,
												));
					?>
					</td></tr>
					
					<tr><td>
					<?php
						ts_get_option(null , array(
												'type' => 'range' ,
												'label' => __("H6 font size" , TS_DOMAIN) ,
												'name' => 'h6_size' ,
												'min' => 5 ,
												'max' => 60 ,
												'value' => ts_get_theme_option('h6_size') ,
												));
					?>
					</td></tr>
				
				</tbody>
			</table>
					
			<!-- Colors Options -->
			<table  id = "ts-colors-options" class = "ts-options-table">
				<tbody>
				
					<tr><td class = "ts-options-title">
						<div class = "ts-title"><?php _e("Color Options" , TS_DOMAIN); ?></div>
					</td></tr>
					
					<tr><td>
					<?php
						ts_get_option(null , array(
												'type' => 'color' ,
												'label' => __("Skin color" , TS_DOMAIN) ,
												'name' => 'skin_color' ,
												'value' => ts_get_theme_option('skin_color') ,
												));
					?>
					</td></tr>
				
				</tbody>
			</table>
					
			<!-- Styles Options -->
			<table  id = "ts-styles-options" class = "ts-options-table">
				<tbody>
				
					<tr><td class = "ts-options-title">
						<div class = "ts-title"><?php _e("Custom Styles" , TS_DOMAIN); ?></div>
					</td></tr>
					
					<tr><td>
					<?php
						ts_get_option(null , array(
												'type' => 'textarea' ,
												'label' => __("Custom CSS" , TS_DOMAIN) ,
												'name' => 'custom_css' ,
												'class' => 'ts-full' ,
												'value' => ts_get_theme_option('custom_css') ,
												'info' => __('Enter the CSS rules as you would in an external stylesheet.' , TS_DOMAIN) ,
												));
					?>
					</td></tr>
				
				</tbody>
			</table>
					
			<!-- Portfolio Options -->
			<table  id = "ts-portfolio-options" class = "ts-options-table">
				<tbody>
				
					<tr><td class = "ts-options-title">
						<div class = "ts-title"><?php _e("Single Project Options" , TS_DOMAIN); ?></div>
					</td></tr>
					
					<tr><td>
					<?php
						ts_get_option(null , array(
												'type' => 'checkbox' ,
												'label' => __("Show overview" , TS_DOMAIN) ,
												'name' => 'show_project_overview' ,
												'checked' => ts_get_theme_option('show_project_overview') == 'on' ,
												'info' => __('Check this option if you want to show the project overview on the single project page.' , TS_DOMAIN) ,
												));
					?>
					</td></tr>
					
					<tr><td>
					<?php
						
						ts_get_option(null , array(
												'type' => 'text' ,
												'label' => __("Overview title" , TS_DOMAIN) ,
												'name' => 'overview_title' ,
												'value' => ts_get_theme_option('overview_title') ,
												));
					?>
					</td></tr>
					
					<tr><td>
					<?php
						
						ts_get_option(null , array(
												'type' => 'text' ,
												'label' => __("Project details title" , TS_DOMAIN) ,
												'name' => 'project_details_title' ,
												'value' => ts_get_theme_option('project_details_title') ,
												));
					?>
					</td></tr>
					
					<tr><td>
					<?php
						ts_get_option(null , array(
												'type' => 'checkbox' ,
												'label' => __("Show related work" , TS_DOMAIN) ,
												'name' => 'show_related_work' ,
												'checked' => ts_get_theme_option('show_related_work') == 'on' ,
												'info' => __('Check this option if you want to show related projects on the single project page.' , TS_DOMAIN) ,
												));
					?>
					</td></tr>
					
					<tr><td>
					<?php
						
						ts_get_option(null , array(
												'type' => 'text' ,
												'label' => __("Related work title" , TS_DOMAIN) ,
												'name' => 'related_work_title' ,
												'value' => ts_get_theme_option('related_work_title') ,
												));
					?>
					</td></tr>
					
					<tr><td>
					<?php
						
						ts_get_option(null , array(
												'type' => 'textarea' ,
												'label' => __("Related work description" , TS_DOMAIN) ,
												'name' => 'related_work_description' ,
												'value' => ts_get_theme_option('related_work_description') ,
												));
					?>
					</td></tr>
				
				</tbody>
			</table>
					
			<!-- Error 404 Options -->
			<table  id = "ts-error-404-options" class = "ts-options-table">
				<tbody>
				
					<tr><td class = "ts-options-title">
						<div class = "ts-title"><?php _e("Error 404" , TS_DOMAIN); ?></div>
					</td></tr>
					
					<tr><td>
					<?php
						ts_get_option(null , array(
												'type' => 'text' ,
												'label' => __("Error 404 title" , TS_DOMAIN) ,
												'name' => 'error_404_title' ,
												'value' => ts_get_theme_option('error_404_title') ,
												));
					?>
					</td></tr>
					
					<tr><td>
					<?php
						ts_get_option(null , array(
												'type' => 'textarea' ,
												'label' => __("Error 404 message" , TS_DOMAIN) ,
												'name' => 'error_404_message' ,
												'value' => ts_get_theme_option('error_404_message') ,
												));
					?>
					</td></tr>
				
					<tr><td class = "ts-options-title">
						<div class = "ts-title"><?php _e("Error 404 Search Box" , TS_DOMAIN); ?></div>
					</td></tr>
					
					<tr><td>
					<?php
						ts_get_option(null , array(
												'type' => 'checkbox' ,
												'label' => __("Show search box" , TS_DOMAIN) ,
												'name' => 'show_error_404_search' ,
												'checked' => ts_get_theme_option('show_error_404_search') == 'on' ,
												));
					?>
					</td></tr>
					
					<tr><td>
					<?php
						ts_get_option(null , array(
												'type' => 'text' ,
												'label' => __("Search box button label" , TS_DOMAIN) ,
												'name' => 'error_404_search_button_label' ,
												'value' => ts_get_theme_option('error_404_search_button_label') ,
												));
					?>
					</td></tr>
					
					<tr><td>
					<?php
						ts_get_option(null , array(
												'type' => 'text' ,
												'label' => __("Search box prompt" , TS_DOMAIN) ,
												'name' => 'error_404_search_prompt' ,
												'value' => ts_get_theme_option('error_404_search_prompt') ,
												));
					?>
					</td></tr>
				
				</tbody>
			</table>
					
			<!-- Comments Options -->
			<table  id = "ts-comments-options" class = "ts-options-table">
				<tbody>
				
					<tr><td class = "ts-options-title">
						<div class = "ts-title"><?php _e("Comments Options" , TS_DOMAIN); ?></div>
					</td></tr>
					
					<tr><td>
					<?php
						ts_get_option(null , array(
												'type' => 'checkbox' ,
												'label' => __("Enable comments on pages" , TS_DOMAIN) ,
												'name' => 'enable_comments_on_pages' ,
												'checked' => ts_get_theme_option('enable_comments_on_pages') == 'on' ,
												));
					?>
					</td></tr>
					
					<tr><td>
					<?php
						ts_get_option(null , array(
												'type' => 'select' ,
												'label' => __("Comment time format" , TS_DOMAIN) ,
												'name' => 'comment_date_format' ,
												'value' => ts_get_theme_option('comment_date_format') ,
												'options' => array(
																	__('Date and time' , TS_DOMAIN) ,
																	__('Time ago' , TS_DOMAIN) ,
																	),
												));
					?>
					</td></tr>
					
					<tr><td>
					<?php
						ts_get_option(null , array(
												'type' => 'textarea' ,
												'label' => __("Comment form subtitle" , TS_DOMAIN) ,
												'name' => 'comment_form_tagline' ,
												'value' => ts_get_theme_option('comment_form_tagline') ,
												));
					?>
					</td></tr>
				
				</tbody>
			</table>
					
			<!-- Announcement Options -->
			<table  id = "ts-announcement-options" class = "ts-options-table">
				<tbody>
				
					<tr><td class = "ts-options-title">
						<div class = "ts-title"><?php _e("Announcement Options" , TS_DOMAIN); ?></div>
					</td></tr>
					
					<tr><td>
					<?php
						ts_get_option(null , array(
												'type' => 'checkbox' ,
												'label' => __("Show announcement" , TS_DOMAIN) ,
												'name' => 'show_announcement' ,
												'checked' => ts_get_theme_option('show_announcement') == 'on' ,
												));
					?>
					</td></tr>
					
					<tr><td>
					<?php
						ts_get_option(null , array(
												'type' => 'textarea' ,
												'label' => __("Announcement content" , TS_DOMAIN) ,
												'name' => 'announcement' ,
												'value' => ts_get_theme_option('announcement') ,
												));
					?>
					</td></tr>
				
				</tbody>
			</table>
			
			<input type = "hidden" name = "action" value = "ts_theme_data_save" />
			<input type = "hidden" name = "security" value = "<?php echo wp_create_nonce('ts-theme-data'); ?>" />
		</form>
	</div>
	
	<div id = "ts-theme-options-footer">
		<span class = "ts-button ts-submit"><?php _e("Save Changes" , TS_DOMAIN); ?></span>
		<img class = "ts-ajax-feedback" src = "<?php echo ADMIN_URL; ?>/images/wpspin_light.gif" style = "visibility: hidden;">
		<span class = "ts-success" style = "display: none; color: #009900;"><?php _e("Changes saved." , TS_DOMAIN); ?></span>
		<span class = "ts-error" style = "display: none;"><?php _e("An error occured, changes couldn't be saved." , TS_DOMAIN); ?></span>
	</div>
	
</div>