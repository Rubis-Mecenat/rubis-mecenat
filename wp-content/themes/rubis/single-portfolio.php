<?php
	$next = get_adjacent_post(false , '' , true);
	$prev = get_adjacent_post(false , '' , false);
	
	if($next){
		$next_link = '<li><a title = "' . __('Next Project' , TS_DOMAIN) . '" href = "' . get_permalink($next->ID) . '">' . get_the_title($next->ID) . ' &rarr;</a></li>';
	}else{
		$next_link = '';
	}
	
	if($prev){
		$prev_link = '<li><a title = "' . __('Previous Project' , TS_DOMAIN) . '" href = "' . get_permalink($prev->ID) . '">&larr; ' . get_the_title($prev->ID) . '</a></li>';
	}else{
		$prev_link = '';
	}

	$GLOBALS['ts_sidebar_location'] = 'none';
	$GLOBALS['ts_subtitle'] = ts_get_meta('ts_project_subtitle');
	$GLOBALS['ts_header_aside_content'] = '<aside><nav class = "pagination"><ul>' . $prev_link . $next_link . '</ul></nav></aside>';
?><?php get_header(); ?>

<?php





	if(have_posts()){
		while(have_posts()){
			global $post;
			the_post();
			
			?>
			<div class = "portfolio single">
				<article class = "entry">
					<div class = "row">
						<div class = "span-12">
							<div class = "entry-feature">
							<?php
							$featured = ts_get_meta('ts_featured_content' , get_the_ID());
							$image = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
							
							switch($featured){
								case 'image':
								?>
								<img alt="<?php the_title('' , ''); ?>" src="<?php echo $image; ?>">
								<?php
								break;
								
								case 'slider':
								echo do_shortcode('[image_slider source = "slider" slider_name = "' . ts_get_meta('ts_slider' , get_the_ID()) . '"]');
								wp_reset_postdata();
								break;
								
								case 'vimeo-video-id':
								case 'youtube-video-id':
								case 'dailymotion-video-id':
								
								if($featured == 'vimeo-video-id'){
									$video_url = ts_get_video_embed_url('vimeo') . ts_get_meta('ts_vimeo_video_id' , get_the_ID());
									$video_sc = '[vimeo video_id = "' . ts_get_meta('ts_vimeo_video_id' , get_the_ID()) . '"]';
								}else
								if($featured == 'youtube-video-id'){
									$video_url = ts_get_video_embed_url('youtube') . ts_get_meta('ts_youtube_video_id' , get_the_ID());
									$video_sc = '[youtube video_id = "' . ts_get_meta('ts_youtube_video_id' , get_the_ID()) . '"]';
								}else
								if($featured == 'dailymotion-video-id'){
									$video_url = ts_get_video_embed_url('dailymotion') . ts_get_meta('ts_dailymotion_video_id' , get_the_ID());
									$video_sc = '[dailymotion video_id = "' . ts_get_meta('ts_dailymotion_video_id' , get_the_ID()) . '"]';
								}
								
								echo do_shortcode($video_sc);
								break;
							}
							?>
							</div><!-- .entry-feature -->
						</div>
					</div>
					
					<div class = "margin"></div>
					
					<div class = "row">
						<?php if(ts_get_theme_option('show_project_overview') == 'on') :?>
						<div class = "span-4">
							<h5><?php echo ts_get_theme_option('overview_title');?></h5>
							
							<span>
							<?php 
							$overview = ts_get_meta('ts_overview' , get_the_ID());
							if($overview){
								echo do_shortcode(ts_get_meta('ts_overview' , get_the_ID()));
							}
							?>
							</span>
						</div>
						<?php endif; ?>
						
						<div class = "span-<?php echo ts_get_theme_option('show_project_overview') == 'on' ? '8' : '12'; ?>">
							<h5><?php echo ts_get_theme_option('project_details_title');?></h5>
							
							<span>
							<?php the_content(); ?>
							</span>
						</div>
					</div>
				</article>
			</div><!-- .portfolio -->
		<?php
		}
	}
?>

<?php if(ts_get_theme_option('show_related_work') == 'on') : ?>

<div class = "divider"></div>

<div class = "portfolio portfolio-4 row has-divider">
	<div class = "span-3">
		<?php
		$related_work_title = ts_get_theme_option('related_work_title');
		$related_work_description = ts_get_theme_option('related_work_description');
		
		if($related_work_title) echo '<h3 class = "fancy-title">' . $related_work_title . '</h3>';
		if($related_work_description) /*echo '<p>' . $related_work_description . '</p>'*/;
		?>
	</div>
	
<?php 

$cats_list = get_the_terms(get_the_ID() , 'portfolio_category');

if($cats_list){
	$cats = array();
	foreach($cats_list as $cat){
		$cats[] = $cat->term_id;
	}
}

$related_projects = new WP_Query(array(
	'post_type' => 'portfolio' ,
	'posts_per_page' => '3' ,
	'post__not_in' => array(get_the_ID()) ,
	'orderby' => 'rand' ,
	'tax_query' => array(
						array(
							'taxonomy' => 'portfolio_category' , 
							'field' => 'term_id' , 
							'operator' => 'IN' ,
							'terms' => $cats ,
							)
						)
));

while($related_projects->have_posts()){
	$related_projects->the_post();
	?>
	
	<div class = "span-9">
		<article class = "entry">
			<div class = "entry-wrap">
				<div class = "entry-feature">
				<?php
				$featured = ts_get_meta('ts_featured_content' , get_the_ID());
				$image = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
				
				if(ts_get_meta('ts_featured_colorbox' , get_the_ID()) == 'on'){
					?>
					<a href="<?php echo $image; ?>" class="overlay colorbox cboxElement" title="<?php the_title('' , ''); ?>">
						<span class="overlay-color"></span>
						<span class="overlay-icon zoom"></span>
						<img alt="<?php the_title('' , ''); ?>" src="<?php echo $image; ?>">
					</a>
					<?php }else{ ?>
					<img alt="<?php the_title('' , ''); ?>" src="<?php echo $image; ?>">
					<?php }
				?>
				</div><!-- .entry-feature -->
				
				<div class = "entry-body">
					<header>
						<h2 class = "entry-title">
							<a href = "<?php echo get_permalink(get_the_ID()); ?>">
								<?php 
								the_title('' , '');
								?>
							</a>
						</h2><!-- .entry-title -->
						
						<div class = "entry-meta">
							<span class = "tags">
								<?php
								$cats_list = get_the_terms(get_the_ID() , 'portfolio_category');
								if($cats_list){
									$cats = array();
									foreach($cats_list as $cat){
										$cats[] = '<span>' . $cat->name . '</span>';
									}
									echo implode($cats , '<span class = "separator">|</span>');
								}
								?>
							</span>
						</div><!-- .entry-meta -->
					</header>
				</div><!-- .entry-body -->
			</div><!-- .entry-wrap -->
		</article>
	</div>
	
	<?php
}
?>

</div>

<?php endif; ?>

<?php get_footer(); ?>