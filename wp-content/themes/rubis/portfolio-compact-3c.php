<?php
/*
 * Template Name: Portfolio - Compact - 3 Columns
 *
 * Selectable from a dropdown menu on the add/edit page screen.
 */
?><?php
	$GLOBALS['ts_sidebar_location'] = 'none';
?><?php get_header(); ?>

<?php 
$post_ID = get_the_ID();
$show_titles = ts_get_meta('ts_portfolio_hide_titles');
$show_cats = ts_get_meta('ts_portfolio_hide_cats');
$show_links = ts_get_meta('ts_portfolio_nolink_to_page');
$colorbox_group = ts_get_meta('ts_portfolio_colorbox_items');

if (!isset($_GET['lang']) && $language=='en') {
echo 'test en';
$projects = new WP_Query(array(
	'post_type' => 'portfolio' ,
	'portfolio_category' => '' ,// ligne à ajouter
	'posts_per_page' => ts_get_meta('ts_portfolio_count') ,
	'orderby' => 'post_date' ,
	'paged' => get_query_var('paged') ,
));
}
else {
$projects = new WP_Query(array(
	'post_type' => 'portfolio' ,
	'portfolio_category' => 'archive' ,// ligne à ajouter
	'posts_per_page' => ts_get_meta('ts_portfolio_count') ,
	'orderby' => 'post_date' ,
	'paged' => get_query_var('paged') ,
));
}

?>
<div class = "portfolio portfolio-3 compact">
<?php
$i = 0;
while($projects->have_posts()){
	$i++;
	
	if($i%3 == 1){
		echo '<div class = "row has-divider">';
	}
	
	$projects->the_post();
	?>
	<div class = "span-4">
		<article class = "entry">
			<div class = "entry-wrap">
				<div class = "entry-feature">
				<?php
				$featured = ts_get_meta('ts_featured_content' , get_the_ID());
				$image = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
				
				switch($featured){
					case 'image':
					if(ts_get_meta('ts_featured_colorbox' , get_the_ID()) == 'on'){
					?>
					<a href="<?php echo $image; ?>" class="overlay colorbox cboxElement" title="<?php the_title('' , ''); ?>" <?php if($colorbox_group == "on") echo 'data-group = "portfolio-' . $post_ID . '"'; ?>>
						<span class="overlay-color"></span>
						<span class="overlay-icon zoom"></span>
						<img alt="Image" data-tsrc="<?php echo $image; ?>">
					</a>
					<?php }else{ ?>
					<img alt="<?php the_title('' , ''); ?>" data-tsrc="<?php echo $image; ?>">
					<?php }
					break;
					
					case 'slider':
					echo do_shortcode('[image_slider source = "slider" slider_name = "' . ts_get_meta('ts_slider' , get_the_ID()) . '"]');
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
					
					if(ts_get_meta('ts_featured_colorbox' , get_the_ID()) == 'on'){
					?>
					<a data-iframe = "true" href="<?php echo $video_url; ?>?autoplay=true" class="overlay colorbox cboxElement" title="<?php the_title('' , ''); ?>" <?php if($colorbox_group == "on") echo 'data-group = "portfolio-' . $post_ID . '"'; ?>>
						<span class="overlay-color"></span>
						<span class="overlay-icon play"></span>
						<img alt="<?php the_title('' , ''); ?>" data-tsrc="<?php echo $image; ?>">
					</a>
					<?php }else{ 
						echo do_shortcode($video_sc);
					}
					break;
				}
				?>
				</div><!-- .entry-feature -->
				
				<div class = "entry-body">
					<header>
						<?php if($show_titles != 'on') : ?>
						<h2 class = "entry-title">
							<?php if($show_links != 'on') : ?>
							<!--<a href = "<?php /*echo get_permalink(get_the_ID()); */?>">-->
							<?php else : ?>
							<span>
							<? endif; ?>
								<?php 
								the_title('' , '');
								?>
							<?php if($show_links != 'on') : ?>
							</a>
							<?php else : ?>
							</span>
							<? endif; ?>
						</h2><!-- .entry-title -->
						<?php endif; ?>
						
						<?php if($show_cats != 'on') : ?>
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
						<?php endif; ?>
						
						<a href = "#" class = "more"></a>
					</header>
				
					<?php 
					$overview = ts_get_meta('ts_overview' , get_the_ID());
					if($overview) :
					?>
					<div class = "entry-content<?php echo $show_titles == 'on' && $show_cats == 'on' ? ' noborder' : ''; ?>">
						<?php echo do_shortcode(ts_get_meta('ts_overview' , get_the_ID())); ?>
					</div><!-- .entry-content -->
					<?php endif; ?>
				</div><!-- .entry-body -->
			</div><!-- .entry-wrap -->
		</article>
	</div>
	<?php
	
	if($i%3 == 0){
		echo '</div>';
	}
}

if($i%3 != 0){
	echo '</div>';
}

?>

<?php
	/* pagination */
	
	$page = get_query_var('paged');
	$pages = $projects->max_num_pages;

	if(empty($page)) $page = 1;
	if(!$pages) $pages = 1;
	
	echo ts_get_pagination(array(
					  'wp_func' => 'get_pagenum_link' ,
					  
					  'pages' => $pages ,
					  'paged' => $page ,
					  'range' => 2 ,
					  ));
?>
</div>
<?php get_footer(); ?>