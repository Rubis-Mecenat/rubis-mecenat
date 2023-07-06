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
	$args = array(
		'post_type'      => 'attachment',
		'post_parent'    => $post->ID,
		'post_mime_type' => 'image',
		'post_status'    => null,
		'numberposts'    => -1,
	);
	$attachments = get_posts($args);
	
	if($attachments) :
	?>
	<div class = "entry-feature">
		<div class = "flexslider autohide">
			<ul class = "slides">
			<?php
				foreach($attachments as $attachment){
					?>
					<li><?php echo do_shortcode('[image source = "' . wp_get_attachment_url($attachment->ID) . '" size = "featured" alt = "' . get_the_title() . '" colorbox = "true" overlay_icon = "zoom" overlay_color = "ffffff"]'); ?></li>
					<?php;
				}
			?>
			</ul>
		</div>
	</div><!-- .entry-feature -->
	<?php
	endif;
	?>
	
	<div class = "entry-date"><span><?php echo  get_the_date('j'); ?></span> <?php echo  get_the_date('M'); ?></div>
	
	<div class = "entry-content">
		<?php the_content(''); ?>
		<?php ts_wp_link_pages(); ?>
	</div><!-- .entry-content -->
</article>

<?php comments_template(); ?>