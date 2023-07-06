<article id = "post-<?php the_ID(); ?>" <?php post_class('entry has-divider' . ($post_format ? ' ' . $post_format . '-entry' : '')); ?>>
	<header>
		<div class = "post-format"><a href = "<?php echo  get_permalink(); ?>" title = "<?php echo __('Permalink' , TS_DOMAIN); ?>"></a></div>
		
		<h2 class = "entry-title"><?php echo ts_formatter('[raw]' . get_the_content('') . '[/raw]'); ?></h2><!-- .entry-title -->
		
		<div class = "entry-meta">
			&mdash; <?php echo  get_the_title(); ?>
		</div><!-- .entry-meta -->
	</header>
</article>