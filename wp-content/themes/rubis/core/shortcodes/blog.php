<?php

/* Popular Posts
  -------------------------------------------------------------- */

function ts_popular_posts($atts , $content = null){
	$atts = shortcode_atts(array(
		  'count' => '3' ,
		  'show_image' => 'true' ,
		  'show_title' => 'true' ,
		  'show_author' => 'false' ,
		  'show_date' => 'true' ,
		  'show_comments_count' => 'true' ,
			) , $atts);

	return ts_posts_widget(array(
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
		) , 'popular-posts-widget' , $atts);
}

add_shortcode('popular_posts' , 'ts_popular_posts');



/* Recent Posts
  -------------------------------------------------------------- */

function ts_recent_posts($atts , $content = null){
	$atts = shortcode_atts(array(
		  'count' => '3' ,
		  'show_image' => 'true' ,
		  'show_title' => 'true' ,
		  'show_author' => 'false' ,
		  'show_date' => 'true' ,
		  'show_comments_count' => 'true' ,
			) , $atts);

	return ts_posts_widget(array(
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
		) , 'recent-posts-widget' , $atts);
}

add_shortcode('recent_posts' , 'ts_recent_posts');



/* Random Posts
  -------------------------------------------------------------- */

function ts_random_posts($atts , $content = null){
	$atts = shortcode_atts(array(
		  'count' => '3' ,
		  'show_image' => 'true' ,
		  'show_title' => 'true' ,
		  'show_author' => 'false' ,
		  'show_date' => 'true' ,
		  'show_comments_count' => 'true' ,
			) , $atts);

	global $post;

	return ts_posts_widget(array(
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
		) , 'random-posts-widget' , $atts);
}

add_shortcode('random_posts' , 'ts_random_posts');



/* Related Posts
  -------------------------------------------------------------- */

function ts_related_posts($atts , $content = null){
	$atts = shortcode_atts(array(
		  'count' => '3' ,
		  'show_image' => 'true' ,
		  'show_title' => 'true' ,
		  'show_author' => 'true' ,
		  'show_date' => 'false' ,
		  'show_comments_count' => 'true' ,
			) , $atts);

	global $post;
	$post_tags = wp_get_post_tags($post->ID);

	if($post_tags){
		$tags = array();
		foreach($post_tags as $tag){
			$tags[] = $tag->term_id;
		}
	}

	return ts_posts_widget(array(
	  'tag__in' => $tags ,
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
	  'post__not_in' => array($post->ID) ,
	  'orderby' => 'post_date' ,
		) , 'related-posts-widget' , $atts);
}

add_shortcode('related_posts' , 'ts_related_posts');

function ts_posts_widget($query , $class , $atts){
	$query['order'] = 'DESC';
	$query['posts_per_page'] = $atts['count'];
	$posts_query = new WP_Query($query);

	$classes = array('posts-widget');
	if($class)
		$classes[] = $class;

	$return = '<div class = "' . implode(' ' , $classes) . '">';
	$return .= '<ul>';

	while($posts_query->have_posts()){
		$posts_query->the_post();
		$return .= '<li>';

		/*--------------------------------------------------------------------*/
		
		if(has_post_thumbnail() && $atts['show_image'] == 'true'){
			$return .= '<div class = "entry-feature overlay">';
			$return .= '<a href = "' . get_permalink() . '"><span class = "overlay-color"></span>';
			$return .= ts_get_image(array(
				  'src' => get_the_ID() ,
				  'size' => 'thumb64' ,
				  'format' => true ,
				  'atts' => array(
					'class' => 'entry-image'
				  )
				));
			$return .= '</a>';
			$return .= '</div>';
		}

		$return .= '<div class = "entry-body' . (!has_post_thumbnail() || $atts['show_image'] != 'true' ? ' no-image' : '') . '">';

		if($atts['show_title'] == 'true'){
			$return .= '<h4 class = "entry-title">';
			$return .= '<a href = "' . get_permalink() . '" title = "' . the_title_attribute(array('echo' => false)) . '" rel = "bookmark">' . get_the_title() . '</a>';
			$return .= '</h4>';
		}

		if($atts['show_author'] == 'true'){
			$return .= '<span class = "author vcard entry-meta entry-author">';
			$return .= '<a class = "url fn n" href = "' . get_author_posts_url(get_the_author_meta('ID')) . '" title = "' . sprintf(esc_attr__('View all posts by %s' , TS_DOMAIN) , get_the_author()) . '" >' . get_the_author() . '</a>';
			$return .= '</span>';
		}

		if($atts['show_date'] == 'true'){
			$return .= '<span class = "entry-meta entry-date">';
			$return .= '<time datetime = "' . get_the_time("Y-m-d") . '">' . get_the_date() . '</time>';
			$return .= '</span>';
		}

		if($atts['show_comments_count'] == 'true'){
			$return .= '<span class = "entry-meta entry-comments">';
			$return .= ts_get_comments_link();
			$return .= '</span>';
		}

		$return .= '</div>';

		/*--------------------------------------------------------------------*/
		
		$return .= '</li>';
	}

	$return .= '</ul>';
	$return .= '</div>';

	return $return;
}