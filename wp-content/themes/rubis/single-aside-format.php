<article id = "post-<?php the_ID(); ?>" <?php post_class('entry has-divider' . ($post_format ? ' ' . $post_format . '-entry' : '')); ?>>
	<div class = "post-format"><a href = "<?php echo  get_permalink(); ?>" title = "<?php echo __('Permalink' , TS_DOMAIN); ?>"></a></div>
	
	<div class = "entry-content">
		<?php the_content(''); ?>
		<?php ts_wp_link_pages(); ?>
	</div><!-- .entry-content -->
</article>