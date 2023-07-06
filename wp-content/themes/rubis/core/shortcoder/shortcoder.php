<?php

require_once("../wp.php");

?><!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
	<head>
		<title></title>
		<meta charset = "<?php bloginfo('charset'); ?>" />

		<script src = "<?php echo THEME_CORE_URL; ?>/scripts/jquery.1.4.4.js?ver=<?php echo THEME_VERSION; ?>" type = "text/javascript"></script>
		<script src = "<?php echo THEME_CORE_URL; ?>/scripts/jquery.tools.min.js?ver=<?php echo THEME_VERSION; ?>" type = "text/javascript"></script>
		<script src = "<?php echo THEME_CORE_URL; ?>/scripts/jscolor.js?ver=<?php echo THEME_VERSION; ?>" type = "text/javascript"></script>
		<script src = "<?php echo THEME_CORE_URL; ?>/scripts/scripts.js?ver=<?php echo THEME_VERSION; ?>" type = "text/javascript"></script>
		<script src = "<?php echo THEME_CORE_URL; ?>/scripts/shortcoder.js?ver=<?php echo THEME_VERSION; ?>" type = "text/javascript"></script>

		<link rel = "stylesheet" href = "<?php echo THEME_CORE_URL; ?>/styles/reset.css?ver=<?php echo THEME_VERSION; ?>" type = "text/css" media = "all" />
		<link rel = "stylesheet" href = "<?php echo THEME_CORE_URL; ?>/styles/styles.css?ver=<?php echo THEME_VERSION; ?>" type = "text/css" media = "all" />
		<link rel = "stylesheet" href = "<?php echo THEME_CORE_URL; ?>/styles/shortcoder.css?ver=<?php echo THEME_VERSION; ?>" type = "text/css" media = "all" />

		<script type = "text/javascript">
			var ts_media_uploader = "<?php echo ADMIN_URL; ?>media-upload.php";
		</script>
	</head>

	<body>
		<div id = "shortcoder" style = "display: none;">
			<fieldset class = "ts-fieldset">
				<legend class = "ts-title ts-legend"><?php _e("Select a Shortcode" , TS_DOMAIN); ?></legend>
				<?php
				
				$ts_form->select(array(
					'id' => 'shortcodes' ,
					'class' => 'ts-select-by-id' ,
					'options' => array(
										'none-options' => __('Select a Shortcode ...' , TS_DOMAIN) ,
										'columns-options' => __('Columns' , TS_DOMAIN) ,
										'youtube-options' => __('YouTube Video' , TS_DOMAIN) ,
										'vimeo-options' => __('Vimeo Video' , TS_DOMAIN) ,
										'dailymotion-options' => __('DailyMotion Video' , TS_DOMAIN) ,
										'image-options' => __('Image' , TS_DOMAIN) ,
										'image_slider-options' => __('Image Slider' , TS_DOMAIN) ,
										'accordion-options' => __('Accordion' , TS_DOMAIN) ,
										'tabs-options' => __('Tabs' , TS_DOMAIN) ,
										'toggle-options' => __('Toggle' , TS_DOMAIN) ,
										'divider-options' => __('Horizontal Divider' , TS_DOMAIN) ,
										'margin-options' => __('Margin' , TS_DOMAIN) ,
										'clear-options' => __('Clear' , TS_DOMAIN) ,
										'highlight-options' => __('Highlight' , TS_DOMAIN) ,
										'button-options' => __('Button' , TS_DOMAIN) ,
										'styled_list-options' => __('Styled List' , TS_DOMAIN) ,
										'box-options' => __('Styled Box' , TS_DOMAIN) ,
										'success_box-options' => __('Success Box' , TS_DOMAIN) ,
										'error_box-options' => __('Error Box' , TS_DOMAIN) ,
										'info_box-options' => __('Info Box' , TS_DOMAIN) ,
										'alert_box-options' => __('Alert Box' , TS_DOMAIN) ,
										'note_box-options' => __('Note Box' , TS_DOMAIN) ,
										'tip_box-options' => __('Tip Box' , TS_DOMAIN) ,
										'code-options' => __('Code' , TS_DOMAIN) ,
										'pre-options' => __('Pre' , TS_DOMAIN) ,
										'blockquote-options' => __('Blockquote' , TS_DOMAIN) ,
										'random_posts-options' => __('Random Posts' , TS_DOMAIN) ,
										'related_posts-options' => __('Related Posts' , TS_DOMAIN) ,
										'recent_posts-options' => __('Recent Posts' , TS_DOMAIN) ,
										'popular_posts-options' => __('Popular Posts' , TS_DOMAIN) ,
										'colorbox-options' => __('ColorBox Element' , TS_DOMAIN) ,
										'user_bio-options' => __('User Bio.' , TS_DOMAIN) ,
										'map-options' => __('Google Map' , TS_DOMAIN) ,
										'static_map-options' => __('Static Google Map' , TS_DOMAIN) ,
										'search-options' => __('Search Box' , TS_DOMAIN) ,
										'flickr-options' => __('Flickr Badges' , TS_DOMAIN) ,
										'twitter-options' => __('Twitter Feed' , TS_DOMAIN) ,
										'contact_form-options' => __('Contact Form' , TS_DOMAIN) ,
										'recent_blog_posts_module-options' => __('Recent Blog Posts Module' , TS_DOMAIN) ,
										'random_blog_posts_module-options' => __('Random Blog Posts Module' , TS_DOMAIN) ,
										'popular_blog_posts_module-options' => __('Popular Blog Posts Module' , TS_DOMAIN) ,
										'recent_work_module-options' => __('Recent Work Module' , TS_DOMAIN) ,
										'clients_module-options' => __('Clients Module' , TS_DOMAIN) ,
										),
				));
				
				?>
			</fieldset>
				
			<fieldset id = "ts-shortcode-options" class = "ts-shortcode-options ts-fieldset">
				<legend class = "ts-title ts-legend"><?php _e("Shortcode Options" , TS_DOMAIN); ?></legend>
				
				<!-- Shortcode Options -->
				<fieldset id = "none-options" class = "shortcodes ts-hide">
					<?php
						_e('Select a shortcode from the list above.' , TS_DOMAIN)
					?>
				</fieldset>
				
				<!-- Shortcode Options -->
				<?php $shortcode = 'columns'; ?>
				<fieldset id = "<?php echo $shortcode; ?>-options" class = "shortcodes ts-hide">
					<?php
					ts_get_option($shortcode , array(
						'type' => 'select' ,
						'label' => __('Row bottom divider' , TS_DOMAIN) ,
						'id' => 'bdiv' ,
						'value' => ' has-divider' ,
						'options' => array(
							' ' => __("No divider" , TS_DOMAIN) ,
							' has-divider' => __("Has a normal divider - 40px margin" , TS_DOMAIN) ,
							' has-divider micro' => __("Has a normal divider - 20px margin" , TS_DOMAIN) ,
							' has-divider dashed' => __("Has a dashed divider - 40px margin" , TS_DOMAIN) ,
							' has-divider dashed micro' => __("Has a dashed divider - 20px margin" , TS_DOMAIN) ,
						) ,
						'info' => __('Select the type of the bottom divider that should be assigned to this row of columns. If there is no content below the row, the divider will not appear.' , TS_DOMAIN) ,
					));
					?>
					
					<hr>
					
					<h4><?php _e('Columns' , TS_DOMAIN); ?></h4>
					<br/>
					
					<div class = "ts-dlist" data-max-items = "12">
						<div class = "ts-dlist-item">
							<h3 class = "ts-dlist-item-count"><?php _e('Column' , TS_DOMAIN); ?> <span></span></h3>
							
							<?php
								ts_get_option($shortcode , array(
									'type' => 'textarea' ,
									'label' => __('Column content' , TS_DOMAIN) ,
									'class' => 'ts-column-content' ,
									'value' => '' ,
									'info' => __('You can use HTML and shortcodes.' , TS_DOMAIN) ,
									'::class' => 'noborder' ,
								));
							?>
							
							<button class = "ts-dlist-item-add ts-dlist-button ts-secondary-button"><?php _e('Add another column' , TS_DOMAIN); ?></button>
							<button class = "ts-dlist-item-remove ts-dlist-button ts-secondary-button ts-red"><?php _e('Remove' , TS_DOMAIN); ?></button>
						</div>
					</div>
					
					<div class = "ts-hidden ts-dlist-alert">
						<?php _e('There can only be 12 columns or less.' , TS_DOMAIN); ?>
					</div>
				</fieldset>
				
				<!-- Shortcode Options -->
				<?php $shortcode = 'youtube'; ?>
				<fieldset id = "<?php echo $shortcode; ?>-options" class = "shortcodes ts-hide">
					<?php
						ts_get_option($shortcode , array(
							'type' => 'text' ,
							'label' => __("Video ID" , TS_DOMAIN) ,
							'id' => 'video_id' ,
							'info' => __("Example: http://www.youtube.com/watch?v=<code>jKATcFKW98A</code>, the video ID is: <b>jKATcFKW98A</b>" , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'range' ,
							'label' => __('Video width' , TS_DOMAIN) ,
							'id' => 'width' ,
							'value' => '480' ,
							'max' => 1000 ,
							'info' => __("Set width of the video, in pixels" , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'range' ,
							'label' => __('Video height' , TS_DOMAIN) ,
							'id' => 'height' ,
							'value' => '360' ,
							'max' => 800 ,
							'info' => __("Set height of the video, in pixels" , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'checkbox' ,
							'label' => __('Auto-start video' , TS_DOMAIN) ,
							'id' => 'autoplay' ,
							'info' => __("If this option is checked, the video will start automatically." , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'select' ,
							'label' => __('Align' , TS_DOMAIN) ,
							'id' => 'align' ,
							'optional' => true ,
							'options' => array(
								'' => __("Select ..." , TS_DOMAIN) ,
								'right' => __("Right" , TS_DOMAIN) ,
								'center' => __("Center" , TS_DOMAIN) ,
								'left' => __("Left" , TS_DOMAIN) ,
							) ,
						));
					?>
				</fieldset>
				
				<!-- Shortcode Options -->
				<?php $shortcode = 'vimeo'; ?>
				<fieldset id = "<?php echo $shortcode; ?>-options" class = "shortcodes ts-hide">
					<?php
						ts_get_option($shortcode , array(
							'type' => 'text' ,
							'label' => __("Video ID" , TS_DOMAIN) ,
							'id' => 'video_id' ,
							'info' => __("Example: http://www.vimeo.com/<code>5014038</code>, the video ID is: <b>5014038</b>" , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'range' ,
							'label' => __('Video width' , TS_DOMAIN) ,
							'id' => 'width' ,
							'value' => '480' ,
							'max' => 1000 ,
							'info' => __("Set width of the video, in pixels" , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'range' ,
							'label' => __('Video height' , TS_DOMAIN) ,
							'id' => 'height' ,
							'value' => '360' ,
							'max' => 800 ,
							'info' => __("Set height of the video, in pixels" , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'checkbox' ,
							'label' => __('Auto-start video' , TS_DOMAIN) ,
							'id' => 'autoplay' ,
							'info' => __("If this option is checked, the video will start automatically." , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'select' ,
							'label' => __('Align' , TS_DOMAIN) ,
							'id' => 'align' ,
							'optional' => true ,
							'options' => array(
								'' => __("Select ..." , TS_DOMAIN) ,
								'right' => __("Right" , TS_DOMAIN) ,
								'center' => __("Center" , TS_DOMAIN) ,
								'left' => __("Left" , TS_DOMAIN) ,
							) ,
						));
					?>
				</fieldset>
				
				<!-- Shortcode Options -->
				<?php $shortcode = 'dailymotion'; ?>
				<fieldset id = "<?php echo $shortcode; ?>-options" class = "shortcodes ts-hide">
					<?php
						ts_get_option($shortcode , array(
							'type' => 'text' ,
							'label' => __("Video ID" , TS_DOMAIN) ,
							'id' => 'video_id' ,
							'info' => __("Example: http://www.dailymotion.com/video/<code>xta12</code>_cutest-cat-ever, the video ID is: <b>xta12</b>" , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'range' ,
							'label' => __('Video width' , TS_DOMAIN) ,
							'id' => 'width' ,
							'value' => '480' ,
							'max' => 1000 ,
							'info' => __("Set width of the video, in pixels" , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'range' ,
							'label' => __('Video height' , TS_DOMAIN) ,
							'id' => 'height' ,
							'value' => '360' ,
							'max' => 800 ,
							'info' => __("Set height of the video, in pixels" , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'checkbox' ,
							'label' => __('Auto-start video' , TS_DOMAIN) ,
							'id' => 'autoplay' ,
							'info' => __("If this option is checked, the video will start automatically." , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'select' ,
							'label' => __('Align' , TS_DOMAIN) ,
							'id' => 'align' ,
							'optional' => true ,
							'options' => array(
								'' => __("Select ..." , TS_DOMAIN) ,
								'right' => __("Right" , TS_DOMAIN) ,
								'center' => __("Center" , TS_DOMAIN) ,
								'left' => __("Left" , TS_DOMAIN) ,
							) ,
						));
					?>
				</fieldset>
				
				<!-- Shortcode Options -->
				<?php $shortcode = 'image'; ?>
				<fieldset id = "<?php echo $shortcode; ?>-options" class = "shortcodes ts-hide">
					<?php
						ts_get_option($shortcode , array(
							'type' => 'text' ,
							'label' => __("Source" , TS_DOMAIN) ,
							'id' => 'source' ,
							'info' => __("Enter the full image URL." , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'select' ,
							'label' => __('Size' , TS_DOMAIN) ,
							'id' => 'size' ,
							'class' => 'ts-select-by-id' ,
							'value' => 'small' ,
							'options' => array(
								'custom' => __("Custom size ..." , TS_DOMAIN) ,
								'large' => sprintf(__("%s Large" , TS_DOMAIN) , '[600x450]&nbsp;&nbsp;&nbsp;') ,
								'medium' => sprintf(__("%s Medium" , TS_DOMAIN) , '[480x320]&nbsp;&nbsp;&nbsp;') ,
								'small' => sprintf(__("%s Small" , TS_DOMAIN) , '[320x240]&nbsp;&nbsp;&nbsp;') ,
								'tiny' => sprintf(__("%s Tiny" , TS_DOMAIN) , '[240x160]&nbsp;&nbsp;&nbsp;') ,
								'thumb200' => sprintf(__("%s Thumb" , TS_DOMAIN) , '[200x200]&nbsp;&nbsp;&nbsp;') ,
								'thumb150' => sprintf(__("%s Thumb" , TS_DOMAIN) , '[150x150]&nbsp;&nbsp;&nbsp;') ,
								'thumb100' => sprintf(__("%s Thumb" , TS_DOMAIN) , '[100x100]&nbsp;&nbsp;&nbsp;') ,
								'thumb80' => sprintf(__("%s Thumb" , TS_DOMAIN) , '[80x80]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;') ,
								'thumb64' => sprintf(__("%s Thumb" , TS_DOMAIN) , '[64x64]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;') ,
							) ,
						));
					?>
					
					<div id = "custom" class = "ts-hide image-size ts-option">
						<?php
							ts_get_option($shortcode , array(
								'type' => 'range' ,
								'label' => __('Image width' , TS_DOMAIN) ,
								'id' => 'width' ,
								'value' => '480' ,
								'max' => 1000 ,
								'info' => __("Set width of the image, in pixels" , TS_DOMAIN) ,
							));
							
							ts_get_option($shortcode , array(
								'type' => 'range' ,
								'label' => __('Image height' , TS_DOMAIN) ,
								'id' => 'height' ,
								'value' => '360' ,
								'max' => 800 ,
								'info' => __("Set height of the image, in pixels" , TS_DOMAIN) ,
							));
						?>
					</div>
					
					<?php
						ts_get_option($shortcode , array(
							'type' => 'checkbox' ,
							'label' => __("Crop image to fit size" , TS_DOMAIN) ,
							'id' => 'crop' ,
							'checked' => true ,
							'info' => __("If this option is checked, the image will be cropped to fit the specified size and the aspect ratio will be maintained." , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'select' ,
							'label' => __('Crop align' , TS_DOMAIN) ,
							'id' => 'crop_align' ,
							'value' => 'c' ,
							'options' => array(
								't' => __("Top" , TS_DOMAIN) ,
								'r' => __("Right" , TS_DOMAIN) ,
								'c' => __("Center" , TS_DOMAIN) ,
								'l' => __("Left" , TS_DOMAIN) ,
								'b' => __("Bottom" , TS_DOMAIN) ,
							) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'checkbox' ,
							'label' => __('Open in ColorBox' , TS_DOMAIN) ,
							'id' => 'colorbox' ,
							'info' => __("If this option is checked, the source image will be opened in a ColorBox window when the resized image is clicked." , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'select' ,
							'label' => __('Color Overlay' , TS_DOMAIN) ,
							'id' => 'overlay_color' ,
							'value' => '' ,
							'options' => array(
								'' => __("Do not add a color overlay" , TS_DOMAIN) ,
								'white' => __("White" , TS_DOMAIN) ,
								'black' => __("Black" , TS_DOMAIN) ,
								'orange' => __("Orange" , TS_DOMAIN) ,
								'blue' => __("Blue" , TS_DOMAIN) ,
								'green' => __("Green" , TS_DOMAIN) ,
								'yellow' => __("Yellow" , TS_DOMAIN) ,
								'pink' => __("Pink" , TS_DOMAIN) ,
								'red' => __("Red" , TS_DOMAIN) ,
								'purple' => __("Purple" , TS_DOMAIN) ,
								'brown' => __("Brown" , TS_DOMAIN) ,
							) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'select' ,
							'label' => __('Icon Overlay' , TS_DOMAIN) ,
							'id' => 'overlay_icon' ,
							'value' => '' ,
							'options' => array(
								'' => __("Do not add an icon overlay" , TS_DOMAIN) ,
								'zoom' => __("Zoom" , TS_DOMAIN) ,
								'play' => __("Play" , TS_DOMAIN) ,
							) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'text' ,
							'label' => __('Title' , TS_DOMAIN) ,
							'id' => 'title' ,
							'optional' => true ,
							'info' => __("This title will appear on mouse hover and, if 'Open in ColorBox' option is checked, below the image in the ColorBox window." , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'text' ,
							'label' => __('Alternative text' , TS_DOMAIN) ,
							'id' => 'alt' ,
							'optional' => true ,
							'info' => __("Use this field to provide text for visitors who, for whatever reason, will not be able to see the image." , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'select' ,
							'label' => __('Align' , TS_DOMAIN) ,
							'id' => 'align' ,
							'value' => '' ,
							'optional' => true ,
							'options' => array(
								'' => __("Select ..." , TS_DOMAIN) ,
								'right' => __("Right" , TS_DOMAIN) ,
								'center' => __("Center" , TS_DOMAIN) ,
								'left' => __("Left" , TS_DOMAIN) ,
							) ,
						));
					?>
				</fieldset>
				
				<!-- Shortcode Options -->
				<?php $shortcode = 'image_slider'; ?>
				<fieldset id = "<?php echo $shortcode; ?>-options" class = "shortcodes ts-hide">
					<?php
						$sliders = array();
						$sliders_list = get_categories(array(
							  'taxonomy' => 'slider'
							));

						foreach($sliders_list as $slider){
							$sliders[$slider->cat_name] = $slider->cat_name;
						}
						
						ts_get_option($shortcode , array(
							'type' => 'select' ,
							'label' => __('Source for slides' , TS_DOMAIN) ,
							'id' => 'source' ,
							'class' => 'ts-select-by-id' ,
							'value' => 'recent_posts' ,
							'options' => array(
								'slider' => __("Slider" , TS_DOMAIN) ,
								'popular_posts' => __("Popular posts" , TS_DOMAIN) ,
								'recent_posts' => __("Recent posts" , TS_DOMAIN) ,
								'random_posts' => __("Random posts" , TS_DOMAIN) ,
							) ,
							'info' => __("Select a source to pull slides from." , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'select' ,
							'label' => __('Slider' , TS_DOMAIN) ,
							'id' => 'slider_name' ,
							'::id' => 'slider' ,
							'::class' => 'ts-hide image_slider-source' ,
							'options' => $sliders ,
							'info' => sprintf(__('Select a %1$s slider. %2$s' , TS_DOMAIN) , '<a target = "_top" href = "' . ADMIN_URL . 'edit-tags.php?taxonomy=ts_slider&post_type=ts_slide">' , '</a>') ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'range' ,
							'label' => __('Image width' , TS_DOMAIN) ,
							'id' => 'width' ,
							'value' => '600' ,
							'min' => 200 ,
							'max' => 1000 ,
							'info' => __("Set the desired slider width, in pixels." , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'range' ,
							'label' => __('Image height' , TS_DOMAIN) ,
							'id' => 'height' ,
							'value' => '250' ,
							'max' => 200 ,
							'max' => 800 ,
							'info' => __("Set the desired slider height, in pixels." , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'range' ,
							'label' => __('Count' , TS_DOMAIN) ,
							'id' => 'count' ,
							'value' => '5' ,
							'min' => 1 ,
							'max' => 10 ,
							'info' => __("Set how many slides should be displayed." , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'checkbox' ,
							'label' => __('Show captions' , TS_DOMAIN) ,
							'id' => 'show_captions' ,
							'info' => __("If this option is checked, the title of the slide or post will be displayed as a caption for the slide." , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'checkbox' ,
							'label' => __('Pause on hover' , TS_DOMAIN) ,
							'id' => 'pause_on_hover' ,
							'checked' => true ,
							'info' => __("Uncheck this option if you want the slider to autoplay even if the mouse is over the slider." , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'range' ,
							'label' => __('Pause time' , TS_DOMAIN) ,
							'id' => 'pause_time' ,
							'value' => '5000' ,
							'min' => 1000 ,
							'max' => 20000 ,
							'info' => __("For how long should each slide be displayed, in micro-seconds?" , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'range' ,
							'label' => __('Animation duration' , TS_DOMAIN) ,
							'id' => 'animation_duration' ,
							'value' => '150' ,
							'min' => 10 ,
							'max' => 5000 ,
							'info' => __("Set the animation duration, in micro-seconds." , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'select' ,
							'label' => __('Align' , TS_DOMAIN) ,
							'id' => 'align' ,
							'optional' => true ,
							'options' => array(
								'' => __("Select ..." , TS_DOMAIN) ,
								'right' => __("Right" , TS_DOMAIN) ,
								'center' => __("Center" , TS_DOMAIN) ,
								'left' => __("Left" , TS_DOMAIN) ,
							) ,
						));
					?>
				</fieldset>
				
				<!-- Shortcode Options -->
				<?php $shortcode = 'accordion'; ?>
				<fieldset id = "<?php echo $shortcode; ?>-options" class = "shortcodes ts-hide">
					<h4><?php _e('Panels' , TS_DOMAIN); ?></h4>
					<br/>
					
					<div class = "ts-dlist">
						<div class = "ts-dlist-item">
							<h3 class = "ts-dlist-item-count"><?php _e('Panel' , TS_DOMAIN); ?> <span></span></h3>
							
							<?php
								ts_get_option($shortcode , array(
									'type' => 'text' ,
									'label' => __('Panel title' , TS_DOMAIN) ,
									'class' => 'ts-panel-title' ,
									'value' => '' ,
									'::class' => 'noborder' ,
								));
								
								ts_get_option($shortcode , array(
									'type' => 'textarea' ,
									'label' => __('Panel content' , TS_DOMAIN) ,
									'class' => 'ts-panel-content' ,
									'value' => '' ,
									'info' => __('You can use HTML and shortcodes.' , TS_DOMAIN) ,
									'::class' => 'noborder' ,
								));
							?>
							
							<button class = "ts-dlist-item-add ts-dlist-button ts-secondary-button"><?php _e('Add another panel' , TS_DOMAIN); ?></button>
							<button class = "ts-dlist-item-remove ts-dlist-button ts-secondary-button ts-red"><?php _e('Remove' , TS_DOMAIN); ?></button>
						</div>
					</div>
				</fieldset>
				
				<!-- Shortcode Options -->
				<?php $shortcode = 'tabs'; ?>
				<fieldset id = "<?php echo $shortcode; ?>-options" class = "shortcodes ts-hide">
					<h4><?php _e('Tabs' , TS_DOMAIN); ?></h4>
					<br/>
					
					<div class = "ts-dlist">
						<div class = "ts-dlist-item">
							<h3 class = "ts-dlist-item-count"><?php _e('Tab' , TS_DOMAIN); ?> <span></span></h3>
							
							<?php
								ts_get_option($shortcode , array(
									'type' => 'text' ,
									'label' => __('Tab title' , TS_DOMAIN) ,
									'class' => 'ts-tab-title' ,
									'value' => '' ,
									'::class' => 'noborder' ,
								));
								
								ts_get_option($shortcode , array(
									'type' => 'textarea' ,
									'label' => __('Tab content' , TS_DOMAIN) ,
									'class' => 'ts-tab-content' ,
									'value' => '' ,
									'info' => __('You can use HTML and shortcodes.' , TS_DOMAIN) ,
									'::class' => 'noborder' ,
								));
							?>
							
							<button class = "ts-dlist-item-add ts-dlist-button ts-secondary-button"><?php _e('Add another tab' , TS_DOMAIN); ?></button>
							<button class = "ts-dlist-item-remove ts-dlist-button ts-secondary-button ts-red"><?php _e('Remove' , TS_DOMAIN); ?></button>
						</div>
					</div>
				</fieldset>
				
				<!-- Shortcode Options -->
				<?php $shortcode = 'toggle'; ?>
				<fieldset id = "<?php echo $shortcode; ?>-options" class = "shortcodes ts-hide">
					<?php
						ts_get_option($shortcode , array(
							'type' => 'text' ,
							'label' => __('Toggle title' , TS_DOMAIN) ,
							'id' => 'title' ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'checkbox' ,
							'label' => __("Active" , TS_DOMAIN) ,
							'id' => 'active' ,
							'checked' => true ,
							'info' => __("If this option is checked, the toggle will be opened by default." , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'textarea' ,
							'label' => __('Toggle content' , TS_DOMAIN) ,
							'id' => 'sccontent' ,
							'info' => __('You can use HTML and shortcodes.' , TS_DOMAIN) ,
						));
					?>
				</fieldset>
				
				<!-- Shortcode Options -->
				<?php $shortcode = 'divider'; ?>
				<fieldset id = "<?php echo $shortcode; ?>-options" class = "shortcodes ts-hide">
					<?php
						_e("This shortcode doesn't accept any options." , TS_DOMAIN)
					?>
				</fieldset>
				
				<!-- Shortcode Options -->
				<?php $shortcode = 'margin'; ?>
				<fieldset id = "<?php echo $shortcode; ?>-options" class = "shortcodes ts-hide">
					<?php
						ts_get_option($shortcode , array(
							'type' => 'range' ,
							'label' => __('Margin value' , TS_DOMAIN) ,
							'id' => 'value' ,
							'value' => '20' ,
							'min' => 0 ,
							'max' => 200 ,
						));
					?>
				</fieldset>
				
				<!-- Shortcode Options -->
				<?php $shortcode = 'clear'; ?>
				<fieldset id = "<?php echo $shortcode; ?>-options" class = "shortcodes ts-hide">
					<?php
						_e("Use this shortcode after any floated element to prevent it from overlapping with the following elements." , TS_DOMAIN)
					?>
				</fieldset>
				
				<!-- Shortcode Options -->
				<?php $shortcode = 'highlight'; ?>
				<fieldset id = "<?php echo $shortcode; ?>-options" class = "shortcodes ts-hide">
					<?php
						ts_get_option($shortcode , array(
							'type' => 'color' ,
							'label' => __('Text color' , TS_DOMAIN) ,
							'id' => 'color' ,
							'value' => '333333' ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'color' ,
							'label' => __('Background color' , TS_DOMAIN) ,
							'id' => 'background_color' ,
							'value' => 'transparent' ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'textarea' ,
							'label' => __('Content' , TS_DOMAIN) ,
							'id' => 'sccontent' ,
							'info' => __("Enter the text that should be highlighted." , TS_DOMAIN) ,
						));
					?>
				</fieldset>
				
				<!-- Shortcode Options -->
				<?php $shortcode = 'button'; ?>
				<fieldset id = "<?php echo $shortcode; ?>-options" class = "shortcodes ts-hide">
					<?php
						ts_get_option($shortcode , array(
							'type' => 'text' ,
							'label' => __('Button label' , TS_DOMAIN) ,
							'id' => 'sccontent' ,
							'value' => __('Click here' , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'text' ,
							'label' => __('Link' , TS_DOMAIN) ,
							'id' => 'link' ,
							'value' => __('#' , TS_DOMAIN) ,
							'info' => __("Enter the URL that the button should link to." , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'select' ,
							'label' => __('Open link in:' , TS_DOMAIN) ,
							'id' => 'target' ,
							'options' => array(
								'_self' => __("The same window or tab" , TS_DOMAIN) ,
								'_blank' => __("A new window or tab" , TS_DOMAIN) ,
							) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'select' ,
							'label' => __('Size' , TS_DOMAIN) ,
							'id' => 'size' ,
							'optional' => true ,
							'options' => array(
								'' => __("Normal" , TS_DOMAIN) ,
								'small' => __("Small" , TS_DOMAIN) ,
								'medium' => __("Medium" , TS_DOMAIN) ,
								'large' => __("Large" , TS_DOMAIN) ,
							) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'checkbox' ,
							'label' => __('Secondary button' , TS_DOMAIN) ,
							'id' => 'secondary' ,
							'info' => __("Check this option if this is a secondary button." , TS_DOMAIN) ,
						));
					?>
				</fieldset>
				
				<!-- Shortcode Options -->
				<?php $shortcode = 'styled_list'; ?>
				<fieldset id = "<?php echo $shortcode; ?>-options" class = "shortcodes ts-hide">
					<?php
						ts_get_option($shortcode , array(
							'type' => 'select' ,
							'label' => __('Type' , TS_DOMAIN) ,
							'id' => 'type' ,
							'options' => array(
								'check' => __("Check" , TS_DOMAIN) ,
								'error' => __("Error" , TS_DOMAIN) ,
								'minus' => __("Minus" , TS_DOMAIN) ,
								'plus' => __("Plus" , TS_DOMAIN) ,
								'arrow' => __("Arrow" , TS_DOMAIN) ,
							) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'textarea' ,
							'label' => __('List items' , TS_DOMAIN) ,
							'id' => 'sccontent' ,
							'value' => "<li>List Item 1</li>\r\n<li>List Item 2</li>\r\n<li>List Item 3</li>" ,
						));
					?>
				</fieldset>
				
				<!-- Shortcode Options -->
				<?php $shortcode = 'box'; ?>
				<fieldset id = "<?php echo $shortcode; ?>-options" class = "shortcodes ts-hide">
					<?php
						ts_get_option($shortcode , array(
							'type' => 'textarea' ,
							'label' => __('Content' , TS_DOMAIN) ,
							'id' => 'sccontent' ,
						));
					?>
				</fieldset>
				
				<!-- Shortcode Options -->
				<?php $shortcode = 'success_box'; ?>
				<fieldset id = "<?php echo $shortcode; ?>-options" class = "shortcodes ts-hide">
					<?php
						ts_get_option($shortcode , array(
							'type' => 'textarea' ,
							'label' => __('Content' , TS_DOMAIN) ,
							'id' => 'sccontent' ,
						));
					?>
				</fieldset>
				
				<!-- Shortcode Options -->
				<?php $shortcode = 'error_box'; ?>
				<fieldset id = "<?php echo $shortcode; ?>-options" class = "shortcodes ts-hide">
					<?php
						ts_get_option($shortcode , array(
							'type' => 'textarea' ,
							'label' => __('Content' , TS_DOMAIN) ,
							'id' => 'sccontent' ,
						));
					?>
				</fieldset>
				
				<!-- Shortcode Options -->
				<?php $shortcode = 'info_box'; ?>
				<fieldset id = "<?php echo $shortcode; ?>-options" class = "shortcodes ts-hide">
					<?php
						ts_get_option($shortcode , array(
							'type' => 'textarea' ,
							'label' => __('Content' , TS_DOMAIN) ,
							'id' => 'sccontent' ,
						));
					?>
				</fieldset>
				
				<!-- Shortcode Options -->
				<?php $shortcode = 'tip_box'; ?>
				<fieldset id = "<?php echo $shortcode; ?>-options" class = "shortcodes ts-hide">
					<?php
						ts_get_option($shortcode , array(
							'type' => 'textarea' ,
							'label' => __('Content' , TS_DOMAIN) ,
							'id' => 'sccontent' ,
						));
					?>
				</fieldset>
				
				<!-- Shortcode Options -->
				<?php $shortcode = 'alert_box'; ?>
				<fieldset id = "<?php echo $shortcode; ?>-options" class = "shortcodes ts-hide">
					<?php
						ts_get_option($shortcode , array(
							'type' => 'textarea' ,
							'label' => __('Content' , TS_DOMAIN) ,
							'id' => 'sccontent' ,
						));
					?>
				</fieldset>
				
				<!-- Shortcode Options -->
				<?php $shortcode = 'note_box'; ?>
				<fieldset id = "<?php echo $shortcode; ?>-options" class = "shortcodes ts-hide">
					<?php
						ts_get_option($shortcode , array(
							'type' => 'textarea' ,
							'label' => __('Content' , TS_DOMAIN) ,
							'id' => 'sccontent' ,
						));
					?>
				</fieldset>
				
				<!-- Shortcode Options -->
				<?php $shortcode = 'code'; ?>
				<fieldset id = "<?php echo $shortcode; ?>-options" class = "shortcodes ts-hide">
					<?php
						ts_get_option($shortcode , array(
							'type' => 'textarea' ,
							'label' => __('Code' , TS_DOMAIN) ,
							'id' => 'sccontent' ,
						));
					?>
				</fieldset>
				
				<!-- Shortcode Options -->
				<?php $shortcode = 'pre'; ?>
				<fieldset id = "<?php echo $shortcode; ?>-options" class = "shortcodes ts-hide">
					<?php
						ts_get_option($shortcode , array(
							'type' => 'textarea' ,
							'label' => __('Pre' , TS_DOMAIN) ,
							'id' => 'sccontent' ,
						));
					?>
				</fieldset>
				
				<!-- Shortcode Options -->
				<?php $shortcode = 'blockquote'; ?>
				<fieldset id = "<?php echo $shortcode; ?>-options" class = "shortcodes ts-hide">
					<?php
						ts_get_option($shortcode , array(
							'type' => 'textarea' ,
							'label' => __('Quote' , TS_DOMAIN) ,
							'id' => 'sccontent' ,
							'info' => __("Enter the quoted text." , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'text' ,
							'label' => __('Cite' , TS_DOMAIN) ,
							'id' => 'cite' ,
							'optional' => true ,
							'info' => __("Enter the source of the quotation." , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'select' ,
							'label' => __('Align' , TS_DOMAIN) ,
							'id' => 'align' ,
							'optional' => true ,
							'options' => array(
								'' => __("Select ..." , TS_DOMAIN) ,
								'right' => __("Right" , TS_DOMAIN) ,
								'center' => __("Center" , TS_DOMAIN) ,
								'left' => __("Left" , TS_DOMAIN) ,
							) ,
						));
					?>
				</fieldset>
				
				<!-- Shortcode Options -->
				<?php $shortcode = 'popular_posts'; ?>
				<fieldset id = "<?php echo $shortcode; ?>-options" class = "shortcodes ts-hide">
					<?php
						ts_get_option($shortcode , array(
							'type' => 'range' ,
							'label' => __('Count' , TS_DOMAIN) ,
							'id' => 'count' ,
							'value' => '3' ,
							'min' => '1' ,
							'max' => '15' ,
							'info' => __("Set the number of posts to display." , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'checkbox' ,
							'label' => __("Show post image" , TS_DOMAIN) ,
							'id' => 'show_image' ,
							'checked' => true ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'checkbox' ,
							'label' => __("Show post title" , TS_DOMAIN) ,
							'id' => 'show_title' ,
							'checked' => true ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'checkbox' ,
							'label' => __("Show post author" , TS_DOMAIN) ,
							'id' => 'show_author' ,
							'checked' => true ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'checkbox' ,
							'label' => __("Show post date" , TS_DOMAIN) ,
							'id' => 'show_date' ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'checkbox' ,
							'label' => __("Show comments count" , TS_DOMAIN) ,
							'id' => 'show_comments_count' ,
							'checked' => true ,
						));
					?>
				</fieldset>
				
				<!-- Shortcode Options -->
				<?php $shortcode = 'related_posts'; ?>
				<fieldset id = "<?php echo $shortcode; ?>-options" class = "shortcodes ts-hide">
					<?php
						ts_get_option($shortcode , array(
							'type' => 'range' ,
							'label' => __('Count' , TS_DOMAIN) ,
							'id' => 'count' ,
							'value' => '3' ,
							'min' => '1' ,
							'max' => '15' ,
							'info' => __("Set the number of posts to display." , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'checkbox' ,
							'label' => __("Show post image" , TS_DOMAIN) ,
							'id' => 'show_image' ,
							'checked' => true ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'checkbox' ,
							'label' => __("Show post title" , TS_DOMAIN) ,
							'id' => 'show_title' ,
							'checked' => true ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'checkbox' ,
							'label' => __("Show post author" , TS_DOMAIN) ,
							'id' => 'show_author' ,
							'checked' => true ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'checkbox' ,
							'label' => __("Show post date" , TS_DOMAIN) ,
							'id' => 'show_date' ,
							'checked' => false ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'checkbox' ,
							'label' => __("Show comments count" , TS_DOMAIN) ,
							'id' => 'show_comments_count' ,
							'checked' => true ,
						));
					?>
				</fieldset>
				
				<!-- Shortcode Options -->
				<?php $shortcode = 'random_posts'; ?>
				<fieldset id = "<?php echo $shortcode; ?>-options" class = "shortcodes ts-hide">
					<?php
						ts_get_option($shortcode , array(
							'type' => 'range' ,
							'label' => __('Count' , TS_DOMAIN) ,
							'id' => 'count' ,
							'value' => '3' ,
							'min' => '1' ,
							'max' => '15' ,
							'info' => __("Set the number of posts to display." , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'checkbox' ,
							'label' => __("Show post image" , TS_DOMAIN) ,
							'id' => 'show_image' ,
							'checked' => true ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'checkbox' ,
							'label' => __("Show post title" , TS_DOMAIN) ,
							'id' => 'show_title' ,
							'checked' => true ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'checkbox' ,
							'label' => __("Show post author" , TS_DOMAIN) ,
							'id' => 'show_author' ,
							'checked' => true ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'checkbox' ,
							'label' => __("Show post date" , TS_DOMAIN) ,
							'id' => 'show_date' ,
							'checked' => false ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'checkbox' ,
							'label' => __("Show comments count" , TS_DOMAIN) ,
							'id' => 'show_comments_count' ,
							'checked' => true ,
						));
					?>
				</fieldset>
				
				<!-- Shortcode Options -->
				<?php $shortcode = 'recent_posts'; ?>
				<fieldset id = "<?php echo $shortcode; ?>-options" class = "shortcodes ts-hide">
					<?php
						ts_get_option($shortcode , array(
							'type' => 'range' ,
							'label' => __('Count' , TS_DOMAIN) ,
							'id' => 'count' ,
							'value' => '3' ,
							'min' => '1' ,
							'max' => '15' ,
							'info' => __("Set the number of posts to display." , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'checkbox' ,
							'label' => __("Show post image" , TS_DOMAIN) ,
							'id' => 'show_image' ,
							'checked' => true ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'checkbox' ,
							'label' => __("Show post title" , TS_DOMAIN) ,
							'id' => 'show_title' ,
							'checked' => true ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'checkbox' ,
							'label' => __("Show post author" , TS_DOMAIN) ,
							'id' => 'show_author' ,
							'checked' => true ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'checkbox' ,
							'label' => __("Show post date" , TS_DOMAIN) ,
							'id' => 'show_date' ,
							'checked' => true ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'checkbox' ,
							'label' => __("Show comments count" , TS_DOMAIN) ,
							'id' => 'show_comments_count' ,
							'checked' => false ,
						));
					?>
				</fieldset>
				
				<!-- Shortcode Options -->
				<?php $shortcode = 'colorbox'; ?>
				<fieldset id = "<?php echo $shortcode; ?>-options" class = "shortcodes ts-hide">
					<?php
						ts_get_option($shortcode , array(
							'type' => 'text' ,
							'label' => __('Link' , TS_DOMAIN) ,
							'id' => 'link' ,
							'info' => __("Enter the link to the ColorBox content." , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'text' ,
							'label' => __('Link text' , TS_DOMAIN) ,
							'id' => 'sccontent' ,
							'optional' => true ,
							'info' => __("Enter text that should be used as a label for the link. (Example: 'Click here to open a ColorBox window')" , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'text' ,
							'label' => __('Title' , TS_DOMAIN) ,
							'id' => 'title' ,
							'optional' => true ,
							'info' => __("This title will appear on mouse hover and below the content in the ColorBox window." , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'text' ,
							'label' => __('Content width' , TS_DOMAIN) ,
							'id' => 'width' ,
							'optional' => true ,
							'info' => __("Enter a fixed inner width. This excludes borders and buttons. Example: 50%, 500px, or 500" , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'text' ,
							'label' => __('Content height' , TS_DOMAIN) ,
							'id' => 'height' ,
							'optional' => true ,
							'info' => __("Enter a fixed inner height. This excludes borders and buttons. Example: 50%, 500px, or 500" , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'text' ,
							'label' => __('Group' , TS_DOMAIN) ,
							'id' => 'group' ,
							'optional' => true ,
							'info' => __("ColorBox links with the same group name will be combined together in a gallery. The group name can be set to 'nofollow' to disable grouping." , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'checkbox' ,
							'label' => __("Slideshow mode" , TS_DOMAIN) ,
							'id' => 'slideshow' ,
							'checked' => false ,
							'info' => __("If this link is part of a gallery, you can check this option to enable slideshow mode." , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'checkbox' ,
							'label' => __("Autostart slideshow mode" , TS_DOMAIN) ,
							'id' => 'slideshow_autostart' ,
							'checked' => false ,
							'info' => __("If slideshow mode is enabled, you can check this option to autostart the slideshow when the ColorBox window is opened." , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'range' ,
							'label' => __('Slideshow speed' , TS_DOMAIN) ,
							'id' => 'slideshow_speed' ,
							'value' => '2500' ,
							'min' => '1000' ,
							'max' => '15000' ,
							'info' => __("If slideshow mode is enabled, you can use this option to set the speed of the slideshow, in milliseconds." , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'checkbox' ,
							'label' => __("IFrame mode" , TS_DOMAIN) ,
							'id' => 'iframe' ,
							'checked' => false ,
							'info' => __("If this option is checked, the ColorBox content will be displayed in an iFrame." , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'checkbox' ,
							'label' => __("Inline mode" , TS_DOMAIN) ,
							'id' => 'inline' ,
							'checked' => false ,
							'info' => __("If this option is checked, you can use a jQuery selector to display content from the current page.<br />For example: #myForm" , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'checkbox' ,
							'label' => __("Force photo mode" , TS_DOMAIN) ,
							'id' => 'force_photo_mode' ,
							'checked' => false ,
							'info' => __("If this option is checked, ColorBox will be forced to display the content as a photo. Use this option when automatic photo detection fails (such as using a url like 'photo.php' instead of 'photo.jpg')." , TS_DOMAIN) ,
						));
					?>
				</fieldset>
				
				<!-- Shortcode Options -->
				<?php $shortcode = 'user_bio'; ?>
				<fieldset id = "<?php echo $shortcode; ?>-options" class = "shortcodes ts-hide">
					<?php
						$users = get_users();
						$options = array('' => __("Auto Detect" , TS_DOMAIN));
						foreach($users as $user){
							$options[$user->ID] = $user->display_name;
						}
						
						ts_get_option($shortcode , array(
							'type' => 'select' ,
							'label' => __('User' , TS_DOMAIN) ,
							'id' => 'user' ,
							'options' => $options ,
							'info' => __("If 'Auto Detect' is selected, the user of the current page or post will be used." , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'checkbox' ,
							'label' => __("Show user avatar" , TS_DOMAIN) ,
							'id' => 'show_image' ,
							'checked' => true ,
						));
					?>
				</fieldset>
				
				<!-- Shortcode Options -->
				<?php $shortcode = 'map'; ?>
				<fieldset id = "<?php echo $shortcode; ?>-options" class = "shortcodes ts-hide">
					<?php
						ts_get_option($shortcode , array(
							'type' => 'text' ,
							'label' => __('Address' , TS_DOMAIN) ,
							'id' => 'address' ,
							'info' => __("Enter a string address (e.g. 'city hall, new york, ny') identifying a unique location on the face of the earth.<br />http://maps.google.com/" , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'select' ,
							'label' => __('Map type' , TS_DOMAIN) ,
							'id' => 'type' ,
							'options' => array(
											'roadmap' => __("Road Map" , TS_DOMAIN) ,
											'satellite' => __("Satellite" , TS_DOMAIN) ,
											'hybrid' => __("Hybrid" , TS_DOMAIN) ,
											'terrain' => __("Terrain" , TS_DOMAIN) ,
											) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'select' ,
							'label' => __('Size' , TS_DOMAIN) ,
							'id' => 'size' ,
							'class' => 'ts-select-by-id' ,
							'value' => 'medium' ,
							'options' => array(
								'custom' => __("Custom size ..." , TS_DOMAIN) ,
								'large' => sprintf(__("%s Large" , TS_DOMAIN) , '[600x450]&nbsp;&nbsp;&nbsp;') ,
								'medium' => sprintf(__("%s Medium" , TS_DOMAIN) , '[480x320]&nbsp;&nbsp;&nbsp;') ,
								'small' => sprintf(__("%s Small" , TS_DOMAIN) , '[320x240]&nbsp;&nbsp;&nbsp;') ,
							) ,
						));
					?>
					
					<div id = "custom" class = "ts-hide map-size ts-option">
						<?php
							ts_get_option($shortcode , array(
								'type' => 'range' ,
								'label' => __('Map width' , TS_DOMAIN) ,
								'id' => 'width' ,
								'value' => '480' ,
								'max' => 1000 ,
								'info' => __("Set width of the map, in pixels." , TS_DOMAIN) ,
							));
							
							ts_get_option($shortcode , array(
								'type' => 'range' ,
								'label' => __('Map height' , TS_DOMAIN) ,
								'id' => 'height' ,
								'value' => '360' ,
								'max' => 800 ,
								'info' => __("Set height of the map, in pixels." , TS_DOMAIN) ,
							));
						?>
					</div>
					
					<?php
						
						ts_get_option($shortcode , array(
							'type' => 'range' ,
							'label' => __('Zoom' , TS_DOMAIN) ,
							'id' => 'zoom' ,
							'value' => '4' ,
							'min' => 0 ,
							'max' => 20 ,
							'info' => __("Set the zoom level." , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'checkbox' ,
							'label' => __("Navigation controls" , TS_DOMAIN) ,
							'id' => 'nav_controls' ,
							'checked' => true ,
							'info' => __("If this option is checked, zoom and pan controls will be displayed on the map." , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'checkbox' ,
							'label' => __("Map type controls" , TS_DOMAIN) ,
							'id' => 'map_type_controls' ,
							'checked' => true ,
							'info' => __("If this option is checked, map type control will be displayed on the map." , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'checkbox' ,
							'label' => __("Street view" , TS_DOMAIN) ,
							'id' => 'enable_street_view' ,
							'checked' => true ,
							'info' => __("If this option is checked, street view mode will be enabled for this map." , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'checkbox' ,
							'label' => __("Enable dragging" , TS_DOMAIN) ,
							'id' => 'draggable' ,
							'checked' => true ,
							'info' => __("If this option is checked, users can navigate the map by dragging its canvas." , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'checkbox' ,
							'label' => __("Enable scroll wheel" , TS_DOMAIN) ,
							'id' => 'scrollwheel' ,
							'checked' => true ,
							'info' => __("If this option is checked, users can zoom in/out using the mouse scroll wheel." , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'select' ,
							'label' => __('Align' , TS_DOMAIN) ,
							'id' => 'align' ,
							'optional' => true ,
							'options' => array(
								'' => __("Select ..." , TS_DOMAIN) ,
								'right' => __("Right" , TS_DOMAIN) ,
								'center' => __("Center" , TS_DOMAIN) ,
								'left' => __("Left" , TS_DOMAIN) ,
							) ,
						));
						
					?>
					
					<hr>
					
					<h4><?php 
						ts_get_option($shortcode , array(
							'type' => 'checkbox' ,
							'label' => __("Map markers" , TS_DOMAIN) ,
							'id' => 'markers-toggle' ,
							'checked' => false ,
							'atts' => array('onchange' => '$(\'#ts-map-markers\').toggle();') ,
							'info' => __("Check this option if you want to use markers on this map." , TS_DOMAIN) ,
						));
					?>
					</h4>
					<br/>
					
					<div id = "ts-map-markers" class = "ts-dlist ts-hide">
						<div class = "ts-dlist-item">
							<h3 class = "ts-dlist-item-count"><?php _e('Marker' , TS_DOMAIN); ?> <span></span></h3>
							
							<?php
								ts_get_option($shortcode , array(
									'type' => 'text' ,
									'label' => __('Marker address' , TS_DOMAIN) ,
									'class' => 'ts-marker-address' ,
									'info' => __("Enter a string address (e.g. 'city hall, new york, ny') identifying a unique location on the face of the earth.<br />http://maps.google.com/" , TS_DOMAIN) ,
									'::class' => 'noborder' ,
								));
								
								ts_get_option($shortcode , array(
									'type' => 'text' ,
									'label' => __('Marker title' , TS_DOMAIN) ,
									'class' => 'ts-marker-title' ,
									'value' => '' ,
									'info' => __('The marker title will appear on mouse hover.' , TS_DOMAIN) ,
									'::class' => 'noborder' ,
								));
								
								ts_get_option($shortcode , array(
									'type' => 'select' ,
									'label' => __('Marker color' , TS_DOMAIN) ,
									'class' => 'ts-marker-color' ,
									'options' => array(
													'blue' => __("Blue" , TS_DOMAIN) ,
													'green' => __("Green" , TS_DOMAIN) ,
													'lightblue' => __("Light Blue" , TS_DOMAIN) ,
													'orange' => __("Orange" , TS_DOMAIN) ,
													'pink' => __("Pink" , TS_DOMAIN) ,
													'purple' => __("Purple" , TS_DOMAIN) ,
													'red' => __("Red" , TS_DOMAIN) ,
													'yellow' => __("Yellow" , TS_DOMAIN) ,
												) ,
									'::class' => 'noborder' ,
								));
							?>
							
							<button class = "ts-dlist-item-add ts-dlist-button ts-secondary-button"><?php _e('Add another marker' , TS_DOMAIN); ?></button>
							<button class = "ts-dlist-item-remove ts-dlist-button ts-secondary-button ts-red"><?php _e('Remove' , TS_DOMAIN); ?></button>
						</div>
					</div>
				</fieldset>
				
				<!-- Shortcode Options -->
				<?php $shortcode = 'static_map'; ?>
				<fieldset id = "<?php echo $shortcode; ?>-options" class = "shortcodes ts-hide">
					<?php
						ts_get_option($shortcode , array(
							'type' => 'text' ,
							'label' => __('Address' , TS_DOMAIN) ,
							'id' => 'address' ,
							'info' => __("Enter a string address (e.g. 'city hall, new york, ny') identifying a unique location on the face of the earth.<br />http://maps.google.com/" , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'select' ,
							'label' => __('Map type' , TS_DOMAIN) ,
							'id' => 'type' ,
							'options' => array(
											'roadmap' => __("Road Map" , TS_DOMAIN) ,
											'satellite' => __("Satellite" , TS_DOMAIN) ,
											'hybrid' => __("Hybrid" , TS_DOMAIN) ,
											'terrain' => __("Terrain" , TS_DOMAIN) ,
											) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'select' ,
							'label' => __('Size' , TS_DOMAIN) ,
							'id' => 'size' ,
							'class' => 'ts-select-by-id' ,
							'value' => 'medium' ,
							'options' => array(
								'custom' => __("Custom size ..." , TS_DOMAIN) ,
								'large' => sprintf(__("%s Large" , TS_DOMAIN) , '[600x450]&nbsp;&nbsp;&nbsp;') ,
								'medium' => sprintf(__("%s Medium" , TS_DOMAIN) , '[480x320]&nbsp;&nbsp;&nbsp;') ,
								'small' => sprintf(__("%s Small" , TS_DOMAIN) , '[320x240]&nbsp;&nbsp;&nbsp;') ,
							) ,
						));
					?>
					
					<div id = "custom" class = "ts-hide static_map-size ts-option">
						<?php
							ts_get_option($shortcode , array(
								'type' => 'range' ,
								'label' => __('Map width' , TS_DOMAIN) ,
								'id' => 'width' ,
								'value' => '480' ,
								'max' => 1000 ,
								'info' => __("Set width of the map, in pixels." , TS_DOMAIN) ,
							));
							
							ts_get_option($shortcode , array(
								'type' => 'range' ,
								'label' => __('Map height' , TS_DOMAIN) ,
								'id' => 'height' ,
								'value' => '360' ,
								'max' => 800 ,
								'info' => __("Set height of the map, in pixels." , TS_DOMAIN) ,
							));
						?>
					</div>
					
					<?php
						
						ts_get_option($shortcode , array(
							'type' => 'range' ,
							'label' => __('Zoom' , TS_DOMAIN) ,
							'id' => 'zoom' ,
							'value' => '4' ,
							'min' => 0 ,
							'max' => 20 ,
							'info' => __("Set the zoom level." , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'select' ,
							'label' => __('Align' , TS_DOMAIN) ,
							'id' => 'align' ,
							'optional' => true ,
							'options' => array(
								'' => __("Select ..." , TS_DOMAIN) ,
								'right' => __("Right" , TS_DOMAIN) ,
								'center' => __("Center" , TS_DOMAIN) ,
								'left' => __("Left" , TS_DOMAIN) ,
							) ,
						));
						
					?>
					
					<hr>
					
					<h4><?php 
						ts_get_option($shortcode , array(
							'type' => 'checkbox' ,
							'label' => __("Map markers" , TS_DOMAIN) ,
							'id' => 'static-markers-toggle' ,
							'checked' => false ,
							'atts' => array('onchange' => '$(\'#ts-static-map-markers\').toggle();') ,
							'info' => __("Check this option if you want to use markers on this map." , TS_DOMAIN) ,
						));
					?>
					</h4>
					<br/>
					
					<div id = "ts-static-map-markers" class = "ts-dlist ts-hide">
						<div class = "ts-dlist-item">
							<h3 class = "ts-dlist-item-count"><?php _e('Marker' , TS_DOMAIN); ?> <span></span></h3>
							
							<?php
								ts_get_option($shortcode , array(
									'type' => 'text' ,
									'label' => __('Marker address' , TS_DOMAIN) ,
									'class' => 'ts-marker-address' ,
									'info' => __("Enter a string address (e.g. 'city hall, new york, ny') identifying a unique location on the face of the earth.<br />http://maps.google.com/" , TS_DOMAIN) ,
									'::class' => 'noborder' ,
								));
								
								ts_get_option($shortcode , array(
									'type' => 'select' ,
									'label' => __('Marker size' , TS_DOMAIN) ,
									'class' => 'ts-marker-size' ,
									'options' => array(
													'mid' => __("Normal" , TS_DOMAIN) ,
													'small' => __("Small" , TS_DOMAIN) ,
													'tiny' => __("Tiny" , TS_DOMAIN) ,
												) ,
									'::class' => 'noborder' ,
									'info' => __('Select a marker size. Tiny or small markers cannot have labels.' , TS_DOMAIN) ,
								));
								
								ts_get_option($shortcode , array(
									'type' => 'text' ,
									'label' => __('Marker label' , TS_DOMAIN) ,
									'class' => 'ts-marker-label' ,
									'value' => '' ,
									'info' => __('Enter a single uppercase alphanumeric character from the set {A-Z, 0-9}.' , TS_DOMAIN) ,
									'::class' => 'noborder' ,
								));
								
								ts_get_option($shortcode , array(
									'type' => 'color' ,
									'label' => __('Marker color' , TS_DOMAIN) ,
									'class' => 'ts-marker-color' ,
									'::class' => 'noborder' ,
								));
							?>
							
							<button class = "ts-dlist-item-add ts-dlist-button ts-secondary-button"><?php _e('Add another marker' , TS_DOMAIN); ?></button>
							<button class = "ts-dlist-item-remove ts-dlist-button ts-secondary-button ts-red"><?php _e('Remove' , TS_DOMAIN); ?></button>
						</div>
					</div>
				</fieldset>
				
				<!-- Shortcode Options -->
				<?php $shortcode = 'search'; ?>
				<fieldset id = "<?php echo $shortcode; ?>-options" class = "shortcodes ts-hide">
					<?php
						ts_get_option($shortcode , array(
							'type' => 'text' ,
							'label' => __('Prompt text' , TS_DOMAIN) ,
							'id' => 'prompt' ,
							'value' => __('Search ...' , TS_DOMAIN) ,
						));
					?>
				</fieldset>
				
				<!-- Shortcode Options -->
				<?php $shortcode = 'flickr'; ?>
				<fieldset id = "<?php echo $shortcode; ?>-options" class = "shortcodes ts-hide">
					<?php
						ts_get_option($shortcode , array(
							'type' => 'text' ,
							'label' => __('User' , TS_DOMAIN) ,
							'id' => 'user' ,
							'info' => sprintf(__('Flickr ID (%1$s Get your flickr ID %2$s)' , TS_DOMAIN) , "<a target = '_blank' href = 'http://idgettr.com/' title = '" , "'>IDGettr</a>") ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'range' ,
							'label' => __('Images count' , TS_DOMAIN) ,
							'id' => 'count' ,
							'value' => '9' ,
							'min' => '1' ,
							'max' => '10' ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'text' ,
							'label' => __('Loading text' , TS_DOMAIN) ,
							'id' => 'loading_text' ,
							'value' => __('Loading images ...' , TS_DOMAIN) ,
						));
					?>
				</fieldset>
				
				<!-- Shortcode Options -->
				<?php $shortcode = 'twitter'; ?>
				<fieldset id = "<?php echo $shortcode; ?>-options" class = "shortcodes ts-hide">
					<?php
						ts_get_option($shortcode , array(
							'type' => 'text' ,
							'label' => __('User' , TS_DOMAIN) ,
							'id' => 'user' ,
							'info' => __('Username on Twitter' , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'range' ,
							'label' => __('Tweets count' , TS_DOMAIN) ,
							'id' => 'count' ,
							'value' => '3' ,
							'min' => '1' ,
							'max' => '10' ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'text' ,
							'label' => __('Loading text' , TS_DOMAIN) ,
							'id' => 'loading_text' ,
							'value' => __('Loading tweets ...' , TS_DOMAIN) ,
						));
					?>
				</fieldset>
				
				<!-- Shortcode Options -->
				<?php $shortcode = 'contact_form'; ?>
				<fieldset id = "<?php echo $shortcode; ?>-options" class = "shortcodes ts-hide">
					<?php
						ts_get_option($shortcode , array(
							'type' => 'text' ,
							'label' => __('Send data to' , TS_DOMAIN) ,
							'id' => 'to' ,
							'info' => __('Enter the e-mail address that should receive the submitted form data.' , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'text' ,
							'label' => __("Label for name field" , TS_DOMAIN) ,
							'id' => 'name_label' ,
							'optional' => true ,
							'value' => __('Name' , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'text' ,
							'label' => __("Label for email field" , TS_DOMAIN) ,
							'id' => 'email_label' ,
							'optional' => true ,
							'value' => __('E-mail' , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'text' ,
							'label' => __("Label for message field" , TS_DOMAIN) ,
							'id' => 'message_label' ,
							'optional' => true ,
							'value' => __('Message' , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'text' ,
							'label' => __("Label for submit button" , TS_DOMAIN) ,
							'id' => 'button_label' ,
							'optional' => true ,
							'value' => __('Send Message' , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'textarea' ,
							'label' => __("Success message" , TS_DOMAIN) ,
							'id' => 'sccontent' ,
							'optional' => true ,
							'info' => __("This message will be displayed to the users when the form is successfully submitted. You can use HTML and shortcodes." , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'textarea' ,
							'label' => __("Failure message" , TS_DOMAIN) ,
							'id' => 'fmessage' ,
							'optional' => true ,
							'info' => __("This message will be displayed to the users if the form cannot be submitted. You can use HTML and shortcodes." , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'text' ,
							'label' => __("Required text" , TS_DOMAIN) ,
							'id' => 'required_text' ,
							'optional' => true ,
							'value' => __('All fields are required' , TS_DOMAIN) ,
						));
					?>
				</fieldset>
				
				<!-- Shortcode Options -->
				<?php $shortcode = 'recent_work_module'; ?>
				<fieldset id = "<?php echo $shortcode; ?>-options" class = "shortcodes ts-hide">
					<?php
						ts_get_option($shortcode , array(
							'type' => 'text' ,
							'label' => __('Module title' , TS_DOMAIN) ,
							'id' => 'title' ,
							'optional' => true ,
							'info' => __('Enter the module title.' , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'textarea' ,
							'label' => __("Module description" , TS_DOMAIN) ,
							'id' => 'sccontent' ,
							'info' => __("This message will be displayed to the left of the recent work." , TS_DOMAIN) ,
						));
					?>
				</fieldset>
				
				<!-- Shortcode Options -->
				<?php $shortcode = 'clients_module'; ?>
				<fieldset id = "<?php echo $shortcode; ?>-options" class = "shortcodes ts-hide">
					<?php
						ts_get_option($shortcode , array(
							'type' => 'text' ,
							'label' => __('Module title' , TS_DOMAIN) ,
							'id' => 'title' ,
							'optional' => true ,
							'info' => __('Enter the module title.' , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'textarea' ,
							'label' => __("Module description" , TS_DOMAIN) ,
							'id' => 'sccontent' ,
							'info' => __("This message will be displayed to the left of the clients list." , TS_DOMAIN) ,
						));
					?>
				</fieldset>
				
				<!-- Shortcode Options -->
				<?php $shortcode = 'recent_blog_posts_module'; ?>
				<fieldset id = "<?php echo $shortcode; ?>-options" class = "shortcodes ts-hide">
					<?php
						ts_get_option($shortcode , array(
							'type' => 'text' ,
							'label' => __('Module title' , TS_DOMAIN) ,
							'id' => 'title' ,
							'optional' => true ,
							'info' => __('Enter the module title.' , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'textarea' ,
							'label' => __("Module description" , TS_DOMAIN) ,
							'id' => 'sccontent' ,
							'info' => __("This message will be displayed to the left of the blog posts." , TS_DOMAIN) ,
						));
					?>
				</fieldset>
				
				<!-- Shortcode Options -->
				<?php $shortcode = 'random_blog_posts_module'; ?>
				<fieldset id = "<?php echo $shortcode; ?>-options" class = "shortcodes ts-hide">
					<?php
						ts_get_option($shortcode , array(
							'type' => 'text' ,
							'label' => __('Module title' , TS_DOMAIN) ,
							'id' => 'title' ,
							'optional' => true ,
							'info' => __('Enter the module title.' , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'textarea' ,
							'label' => __("Module description" , TS_DOMAIN) ,
							'id' => 'sccontent' ,
							'info' => __("This message will be displayed to the left of the blog posts." , TS_DOMAIN) ,
						));
					?>
				</fieldset>
				
				<!-- Shortcode Options -->
				<?php $shortcode = 'popular_blog_posts_module'; ?>
				<fieldset id = "<?php echo $shortcode; ?>-options" class = "shortcodes ts-hide">
					<?php
						ts_get_option($shortcode , array(
							'type' => 'text' ,
							'label' => __('Module title' , TS_DOMAIN) ,
							'id' => 'title' ,
							'optional' => true ,
							'info' => __('Enter the module title.' , TS_DOMAIN) ,
						));
						
						ts_get_option($shortcode , array(
							'type' => 'textarea' ,
							'label' => __("Module description" , TS_DOMAIN) ,
							'id' => 'sccontent' ,
							'info' => __("This message will be displayed to the left of the blog posts." , TS_DOMAIN) ,
						));
					?>
				</fieldset>
			</fieldset>
		</div>
			
		<div id = "ts-bottom-deck">
			<a id = "ts-send-shortcode" class = "ts-button"><?php _e("Insert Shortcode" , TS_DOMAIN); ?></a>
		</div>
	</body>
</html>