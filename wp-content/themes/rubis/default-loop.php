<?php $sidebar_location = isset($GLOBALS['ts_sidebar_location']) ? $GLOBALS['ts_sidebar_location'] : ts_get_meta('ts_sidebar_location'); ?>
	
<div class = "row">
	<section id = "content" class = "span-<?php echo $sidebar_location != 'none' ? '9' : '12'; ?> <?php echo $sidebar_location != 'none' ? ($sidebar_location == 'right' ? 'float-left' : 'float-right') : ''; ?>">
	<?php
	if(have_posts()){
		while(have_posts()){
			global $post;
			the_post();
			?>
			<div id = "post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>
				<div class = "entry-content">
					<?php the_content(); ?>
					<?php ts_wp_link_pages(); ?>
				</div>

				<?php 
				if(ts_get_theme_option('enable_comments_on_pages') == 'true') 
					comments_template('' , true); 
				?>
			</div>
		<?php
		}
	}
	?>
	</section>

	<?php if($sidebar_location != 'none') : ?>
	<aside id = "sidebar" class = "span-3 <?php echo 'float-' . $sidebar_location; ?>">
		<?php get_sidebar(ts_get_meta('ts_sidebar')); ?>
	</aside><!-- #sidebar -->
	<?php endif; ?>
</div><!--- .row -->