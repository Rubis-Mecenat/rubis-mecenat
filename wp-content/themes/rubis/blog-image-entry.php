<article id = "post-<?php the_ID(); ?>" <?php post_class('entry has-divider' . ($post_format ? ' ' . $post_format . '-entry' : '')); ?>>
	<header>
		<div class = "post-format"><a href = "<?php echo  get_permalink(); ?>" title = "<?php echo __('Permalink' , TS_DOMAIN); ?>"></a></div>
		
		<h2 class = "entry-title">
			<a href = "<?php echo  get_permalink(); ?>"><?php echo  get_the_title(); ?></a>
		</h2><!-- .entry-title -->
		
		<div class = "entry-meta">
			<span class = "author"><?php printf(__("By: %s" , TS_DOMAIN) , '<a class = "url fn n" href = "' . get_author_posts_url(get_the_author_meta('ID')) . '" title = "' . sprintf(esc_attr__('View all posts by %s' , TS_DOMAIN) , get_the_author()) . '" >' . get_the_author() . '</a>'); ?></span>
			<?php
			$posttags = get_the_tags();
			if($posttags){
				?>
				<span class = "separator">|</span>
				<span class = "tags"><?php echo __('Tagged' , TS_DOMAIN); ?>: 
				<?php
				foreach($posttags as $tag){
					$tags[] = '<a href = "' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a>'; 
				}
				
				echo implode(', ' , $tags);
				?>
				</span>
			<?php
			}
			?>
			<span class = "comments"><?php echo  ts_get_comments_link(__('0 Comments' , TS_DOMAIN) , __('1 Comment' , TS_DOMAIN) , __('%d Comments' , TS_DOMAIN) , __('Comments are off' , TS_DOMAIN)); ?></span>
		</div><!-- .entry-meta -->
	</header>
	
	<?php
	$image = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
	if($image) :
	?>
	<div class = "entry-feature">
		<a href = "<?php echo  $image; ?>" title = "<?php echo  get_the_title(); ?>" class = "colorbox overlay">
			<span class = "overlay-icon zoom"></span>
			<span class = "overlay-color"></span>
			<?php echo do_shortcode('[image source = "' . $image . '" size = "featured" alt = "' . get_the_title() . '"]'); ?>
		</a>
	</div><!-- .entry-feature -->
	<?php
	endif;
	?>
	
	<div class = "entry-date"><span><?php echo  get_the_date('j'); ?></span> <?php echo  get_the_date('M'); ?></div>
	
	<div class = "entry-content">
		<?php 
		global $more;
		$more = false;
		the_content('');
		$more = true;
		?>
		
		<?php
		global $post;
		if(strpos($post->post_content, '<!--more-->')) echo '<a href = "' . get_permalink() . '" class = "more-link">' . __('Read more...' , TS_DOMAIN) . '</a>';
		?>
		
	</div><!-- .entry-content -->
</article>