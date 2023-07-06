<?php
	$bid = get_option('page_for_posts');
	$GLOBALS['ts_custom_title'] = get_the_title($bid);
	$GLOBALS['ts_subtitle'] = ts_get_meta('ts_subtitle' , $bid);
	$GLOBALS['ts_hide_title'] = ts_get_meta('ts_hide_title' , $bid);
?><?php get_header(); ?>

<div class = "row">
	<section id = "content" class = "span-9 float-left">
		<div class = "blog single-entry">
			
		<?php
		if(have_posts()){
			while(have_posts()){
				global $post;
				the_post();
				?>
				
				<nav class = "sticky-nav">
					<a href = "http://twitter.com/intent/tweet?source=sharethiscom&text=<?php echo  get_the_title(); ?>&url=<?php echo  urlencode(ts_get_current_url()); ?>" class = "twitter" title = "<?php _e('Share this on Twitter' , TS_DOMAIN); ?>" target = "_blank"><?php _e('Twitter' , TS_DOMAIN); ?></a>
					<a href = "https://www.facebook.com/sharer.php?u=<?php echo  urlencode(ts_get_current_url()); ?>&t=<?php echo  get_the_title(); ?>" class = "facebook" title = "<?php _e('Share this on Facebook' , TS_DOMAIN); ?>" target = "_blank"><?php _e('Facebook' , TS_DOMAIN); ?></a>
					<a href = "https://plus.google.com/share?url=<?php echo  urlencode(ts_get_current_url()); ?>" class = "googleplus" title = "<?php _e('Share this on Google Plus' , TS_DOMAIN); ?>" target = "_blank"><?php _e('Google Plus' , TS_DOMAIN); ?></a>
				</nav>
				
				<?php
				/* $supported_post_formats is defined in theme_dir/functions.php */
				$post_format = get_post_format();
				if(in_array($post_format , $supported_post_formats) && file_exists(THEME_ROOT . '/single-' . $post_format . '-format.php')){
					require('single-' . $post_format . '-format.php');
				}else{
					require('single-format.php');
				}
			}
		}
		?>
			
		</div><!-- .blog -->
	
	</section>
	
	<aside id = "sidebar" class = "span-3 float-right">
		<?php get_sidebar(ts_get_meta('ts_sidebar')); ?>
	</aside><!-- #sidebar -->
</div><!--- .row -->
					
<?php get_footer(); ?>