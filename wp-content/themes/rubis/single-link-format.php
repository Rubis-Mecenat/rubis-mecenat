<?php 
$content = get_the_content('');

if(strpos($content , 'http://') === 0){
	/* get the first link */
	$end = min(strpos($content , ' ') , strpos($content , PHP_EOL));
	$attached_link = substr($content , 0 , $end);
	$content = substr($content , $end);
	$components = parse_url($attached_link);
	$host = $components['host'];
}else{
	$attached_link = '#';
	$host = __('No link attached' , TS_DOMAIN);
}

?>

<article id = "post-<?php the_ID(); ?>" <?php post_class('entry has-divider' . ($post_format ? ' ' . $post_format . '-entry' : '')); ?>>
	<header>
		<div class = "post-format"><a href = "<?php echo  get_permalink(); ?>" title = "<?php echo __('Permalink' , TS_DOMAIN); ?>"></a></div>
		
		<h2 class = "entry-title">
			<a href = "<?php echo  $attached_link ? $attached_link : get_permalink(); ?>" <?php echo  $attached_link && $attached_link != '#' ? 'target = "_blank"' : ''; ?>><?php echo  get_the_title(); ?></a>
		</h2><!-- .entry-title -->
		
		<div class = "entry-meta">
			<?php
			$components = parse_url($attached_link);
			echo '&mdash; ' . $host;
			?>
		</div><!-- .entry-meta -->
	</header>
	
	<div class = "entry-content">
		<?php 
		$content = apply_filters('the_content', $content);
		
		global $more;
		$more = false;
		echo $content;
		$more = true;
		?>
		
		<?php
		global $post;
		if(strpos($post->post_content, '<!--more-->')) echo '<a href = "' . get_permalink() . '" class = "more-link">' . __('Read more...' , TS_DOMAIN) . '</a>';
		?>
		<?php ts_wp_link_pages(); ?>
	</div><!-- .entry-content -->
</article>