<?php
	
	if(is_search()){
		$GLOBALS['ts_custom_title'] = "'" . get_query_var('s') . "'";
		$GLOBALS['ts_subtitle'] = __('Search Results' , TS_DOMAIN);
	}else
	if(is_author()){
		$GLOBALS['ts_subtitle'] = __('Author Archive' , TS_DOMAIN);
	}else
	if(is_date()){
		$GLOBALS['ts_subtitle'] = __('Date Archive' , TS_DOMAIN);
	}else
	if(is_category()){
		$GLOBALS['ts_subtitle'] = __('Category Archive' , TS_DOMAIN);
	}else
	if(is_tag()){
		$GLOBALS['ts_subtitle'] = __('Tag Archive' , TS_DOMAIN);
	}
	
	$GLOBALS['ts_sidebar_location'] = 'right';
?><?php get_header(); ?>


<?php $sidebar_location = $GLOBALS['ts_sidebar_location'] ? $GLOBALS['ts_sidebar_location'] : ts_get_meta('ts_sidebar_location'); ?>

<div class = "row">
	<section id = "content" class = "span-<?php echo $sidebar_location != 'none' ? '9' : '12'; ?> <?php echo $sidebar_location == 'right' ? 'float-left' : 'float-right'; ?>">
		
		<div class = "blog">
			<nav class = "sticky-nav">
				<a href = "#" class = "prev" title = "<?php echo  __('Next Entry' , TS_DOMAIN); ?>"><?php echo  __('Next Entry' , TS_DOMAIN); ?></a>
				<a href = "#" class = "next" title = "<?php echo  __('Previous Entry' , TS_DOMAIN); ?>"><?php echo  __('Previous Entry' , TS_DOMAIN); ?></a>
			</nav>
			
			<?php
			if(have_posts()){
				while(have_posts()){
					the_post();
					
					/* reset the tags array */
					$tags = array();
					
					/* $supported_post_formats is defined in theme_dir/functions.php */
					$post_format = get_post_format();
					if(in_array($post_format , $supported_post_formats) && file_exists(THEME_ROOT . '/blog-' . $post_format . '-entry.php')){
						require('blog-' . $post_format . '-entry.php');
					}else{
						require('blog-entry.php');
					}
				}
			}
			?>
			
			<?php
				/* pagination */
				
				if(get_next_posts_link() || get_previous_posts_link()){
					echo '<nav class = "pnnav">';
					echo '<span class = "next-link">';
					next_posts_link(sprintf(__('Older Entries %s' , TS_DOMAIN) , '<span class = "colored">&rarr;</span>'));
					echo '</span>';
					echo '<span class = "prev-link">';
					previous_posts_link(sprintf(__('%s Newer Entries' , TS_DOMAIN) , '<span class = "colored">&larr;</span>'));
					echo '</span>';
					echo '</nav>';
				}
			?>
		</div><!-- .blog -->
		
	</section>

	<?php if($sidebar_location != 'none') : ?>
	<aside id = "sidebar" class = "span-3 <?php echo 'float-' . $sidebar_location; ?>">
		<?php get_sidebar(ts_get_meta('ts_sidebar') ? ts_get_meta('ts_sidebar') : null); ?>
	</aside><!-- #sidebar -->
	<?php endif; ?>
</div><!--- .row -->
					
<?php get_footer(); ?>