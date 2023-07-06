<?php

/* Recent Posts
  -------------------------------------------------------------- */

function ts_recent_posts_module($atts , $content = null){
	extract(shortcode_atts(array(
		  'title' => __('Recent Blog Posts' , TS_DOMAIN) ,
			) , $atts));

	return ts_posts_module(array(
	  'orderby' => 'post_date' ,
	  'tax_query' => array(
						array(
						  'taxonomy' => 'post_format',
						  'field' => 'slug',
						  'terms' => 'post-format-aside',
						  'operator' => 'NOT IN'
						) ,
						array(
						  'taxonomy' => 'post_format',
						  'field' => 'slug',
						  'terms' => 'post-format-quote',
						  'operator' => 'NOT IN'
						) ,
						array(
						  'taxonomy' => 'post_format',
						  'field' => 'slug',
						  'terms' => 'post-format-link',
						  'operator' => 'NOT IN'
						)
					  )
		) , 'recent-posts-module' , $atts , $title , $content);
}

add_shortcode('recent_blog_posts_module' , 'ts_recent_posts_module');

/* Popular Posts
  -------------------------------------------------------------- */

function ts_popular_posts_module($atts , $content = null){
	extract(shortcode_atts(array(
		  'title' => __('Popular Blog Posts' , TS_DOMAIN) ,
			) , $atts));

	return ts_posts_module(array(
	  'orderby' => 'comment_count' ,
	  'tax_query' => array(
						array(
						  'taxonomy' => 'post_format',
						  'field' => 'slug',
						  'terms' => 'post-format-aside',
						  'operator' => 'NOT IN'
						) ,
						array(
						  'taxonomy' => 'post_format',
						  'field' => 'slug',
						  'terms' => 'post-format-quote',
						  'operator' => 'NOT IN'
						) ,
						array(
						  'taxonomy' => 'post_format',
						  'field' => 'slug',
						  'terms' => 'post-format-link',
						  'operator' => 'NOT IN'
						)
					  )
		) , 'popular-posts-module' , $atts , $title , $content);
}

add_shortcode('popular_blog_posts_module' , 'ts_popular_posts_module');

/* Random Posts
  -------------------------------------------------------------- */

function ts_random_posts_module($atts , $content = null){
	extract(shortcode_atts(array(
		  'title' => __('Random Blog Posts' , TS_DOMAIN) ,
			) , $atts));

	return ts_posts_module(array(
		'post__not_in' => array($post->ID) ,
		'tax_query' => array(
						array(
						  'taxonomy' => 'post_format',
						  'field' => 'slug',
						  'terms' => 'post-format-aside',
						  'operator' => 'NOT IN'
						) ,
						array(
						  'taxonomy' => 'post_format',
						  'field' => 'slug',
						  'terms' => 'post-format-quote',
						  'operator' => 'NOT IN'
						) ,
						array(
						  'taxonomy' => 'post_format',
						  'field' => 'slug',
						  'terms' => 'post-format-link',
						  'operator' => 'NOT IN'
						)
					  ) ,
		'orderby' => 'rand' ,
		) , 'random-posts-module' , $atts , $title , $content);
}

add_shortcode('random_blog_posts_module' , 'ts_random_posts_module');



function ts_posts_module($query , $class , $atts , $title , $content){
	$content = do_shortcode($content);
	$title = $title ? '<h3 class = "fancy-title">' . $title . '</h3>' : '';
	
	$query['order'] = 'DESC';
	$query['posts_per_page'] = 3;
	$posts_query = new WP_Query($query);
	
	
	while($posts_query->have_posts()){
		$posts_query->the_post();
		
		$image = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
		$the_title = get_the_title();
		$the_permalink = get_permalink(get_the_ID());
		
		$blog_str .= '<div class = "span-3"><article class = "entry"><div class = "entry-wrap"><div class = "entry-feature">';
		$blog_str .= '<a href="' . $the_permalink . '" class="overlay" title="' . $the_title . '"><span class="overlay-color"></span><img alt="' . $the_title . '" src="' . $image . '"></a>';
		$blog_str .= '</div><div class = "entry-body">';
		$blog_str .= '<header>';
		$blog_str .= '<h2 class = "entry-title">';
		$blog_str .= '<a href = "' . $the_permalink . '">' . $the_title . '</a>';
		$blog_str .= '</h2>';
				
		$blog_str .= '<div class = "entry-meta">';
			$blog_str .= '<div class = "entry-date">';
			$blog_str .= '<time datetime = "' . get_the_time("Y-m-d") . '">' . get_the_date() . '</time>';
			$blog_str .= '</div>';
			
			$blog_str .= '<div class = "entry-comments">';
			$blog_str .= ts_get_comments_link();
			$blog_str .= '</div>';
		$blog_str .= '</div>';
		$blog_str .= '</header>';
		$blog_str .= '</div>';
		$blog_str .= '</div>';
		$blog_str .= '</article>';
		$blog_str .= '</div>';
	}

	$return .= '<div class = "portfolio portfolio-4 row has-divider">';
	$return .= '<div class = "span-3">' . $title . '' . $content . '</div>' . $blog_str . '</div>';

	return '[raw]' . $return . '[/raw]';
}