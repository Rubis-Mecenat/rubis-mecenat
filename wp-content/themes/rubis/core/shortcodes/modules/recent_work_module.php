<?php

function ts_recent_work($atts , $content = null){
	extract(shortcode_atts(array(
		  'title' => __('Recent Work' , TS_DOMAIN) ,
			) , $atts));

	$content = do_shortcode($content);
	$title = $title ? '<h3 class = "fancy-title">' . $title . '</h3>' : '';
	
	$recent_projects = new WP_Query(array(
		'post_type' => 'portfolio' ,
		'posts_per_page' => '3' ,
		'orderby' => 'date' ,
	));
	
	
	while($recent_projects->have_posts()){
		$recent_projects->the_post();
		
		$featured = ts_get_meta('ts_featured_content' , get_the_ID());
		$image = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
		$the_title = get_the_title();
		$the_permalink = get_permalink(get_the_ID());
		
		$cats_list = get_the_terms(get_the_ID() , 'portfolio_category');
		if($cats_list){
			$cats = array();
			foreach($cats_list as $cat){
				$cats[] = '<span>' . $cat->name . '</span>';
			}
			$the_tags = implode($cats , '<span class = "separator">|</span>');
		}
		
		$recent_work_str .= '<div class = "span-3"><article class = "entry"><div class = "entry-wrap"><div class = "entry-feature">';
					
					if(ts_get_meta('ts_featured_colorbox' , get_the_ID()) == 'on'){
						$recent_work_str .= '<a href="' . $image . '" class="overlay colorbox cboxElement" title="' . $the_title . '"><span class="overlay-color"></span><span class="overlay-icon zoom"></span><img alt="' . $the_title . '" src="' . $image . '"></a>';
					}else{
						$recent_work_str .= '<img alt="' . $the_title . '" src="' . $image . '">';
					}
					
					$recent_work_str .= '</div><div class = "entry-body">';
					$recent_work_str .= '<header>';
					$recent_work_str .= '<h2 class = "entry-title">';
					$recent_work_str .= '<a href = "' . $the_permalink . '">' . $the_title . '</a>';
					$recent_work_str .= '</h2>';
							
					$recent_work_str .= '<div class = "entry-meta">';
					$recent_work_str .= '<span class = "tags">' . $the_tags . '</span>';
					$recent_work_str .= '</div>';
					$recent_work_str .= '</header>';
					$recent_work_str .= '</div>';
					$recent_work_str .= '</div>';
					$recent_work_str .= '</article>';
					$recent_work_str .= '</div>';
	}

	$return .= '<div class = "portfolio portfolio-4 row has-divider">';
	$return .= '<div class = "span-3">' . $title . '' . $content . '</div>' . $recent_work_str . '</div>';

	return '[raw]' . $return . '[/raw]';
}

add_shortcode('recent_work_module' , 'ts_recent_work');