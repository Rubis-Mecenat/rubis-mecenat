<?php

function ts_flex_slider($atts , $content = null){
	extract(shortcode_atts(array(
		  'source' => 'slider' ,
		  'slider_name' => '' ,
		  'width' => '680' ,
		  'height' => '380' ,
		  'align' => '' ,
		  'count' => '5' ,
		  'show_captions' => 'false' ,
		  'pause_on_hover' => 'true' ,
		  'pause_time' => '5000' ,
		  'animation_duration' => '150' ,
			) , $atts));

	$GLOBAL['slider_count']++;

	$class = array();

	if(in_array($align , array('right' , 'left' , 'center')))
		$class[] = 'align-' . $align;

	$slides_code = "";

	$slider = $slider_name;
	$slides_count = 0;
	if($source == "slider"){
		if(!is_numeric($slider)){
			$slider = get_term_by("name" , $slider , "slider");
			$slider = $slider->term_id;
		}

		$slides = get_posts(array("post_type" => "slide" ,
					  "numberposts" => "-1" ,
					  "order" => "ASC" ,
					  "tax_query" => array(
						array(
						  'taxonomy' => 'slider' ,
						  'field' => 'id' ,
						  'operator' => "IN" ,
						  'terms' => explode("," , $slider)
						)
					  )
					));

		foreach($slides as $slide){
			$slides_count++;
			setup_postdata($slide);
			$link_to = ts_get_meta('ts_link_to' , $slide->ID);
			$link = ts_get_meta('ts_' . $link_to , $slide->ID);

			$slides_code .= "<li>";
			if($link_to != "none"){
				$slides_code .= "<a href = '";
				if($link_to == "post" || $link_to == "page" || $link_to == "portfolio-item"){
					$slides_code .= get_permalink($link) . "'>";
				}else{
					$slides_code .= $link . "'>";
				}
			}

			$slides_code .= ts_get_image(array(
				  'src' => $slide->ID ,
				  'size' => array($width , $height) ,
				  'format' => true
				));

			if($link_to != "none"){
				$slides_code .= "</a>";
			}

			if($show_captions == 'true'){
				$slides_code .= "<div class = 'flex-caption'>";
				if($slide->post_title) $slides_code .= "<h4>" . $slide->post_title . "</h4>";
				if($slide->post_content) $slides_code .= "<p>" . apply_filters('the_content', $slide->post_content) . "</p>";
				$slides_code .= "</div>";
			}
			
			$slides_code .= "</li>";
		}
	}else{
		if($source == "popular_posts"){
			global $wpdb;
			$slides = $wpdb->get_results("SELECT ID FROM " . $wpdb->posts . " WHERE comment_status = 'open' AND post_type = 'post' AND post_status = 'publish' ORDER BY comment_count DESC , post_title DESC LIMIT 0 , " . $count);
		}else{
			$args = array("numberposts" => $count ,
			  "order" => "DESC"
			);

			if($source == "random_posts"){
				$args["orderby"] = "rand";
			}

			$slides = get_posts($args);
		}

		foreach($slides as $slide){
			$slides_count++;
			$slides_code .= "<li>";
			$slides_code .= "<a href = '" . get_permalink($slide->ID) . "'>";
			$slides_code .= ts_get_image(array(
				  'src' => $slide->ID ,
				  'size' => array($width , $height) ,
				  'format' => true
				));
			$slides_code .= "</a>";

			if($show_captions == 'true'){
				$slides_code .= "<div class = 'flex-caption'>";
				if($slide->post_title) $slides_code .= "<h4>" . $slide->post_title . "</h4>";
				if($slide->post_content) $slides_code .= "<p>" . apply_filters('the_content', $slide->post_content) . "</p>";
				$slides_code .= "</div>";
			}

			$slides_code .= "</li>";
		}
	}

	$return = '<div class="flexslider ' . implode(' ' , $class) . '" ';
	$return.= 'data-pause_on_action="' . ($pause_on_action == "true" ? "true" : "false") . '" ';
	$return.= 'data-pause_on_hover="' . ($pause_on_hover == "true" ? "true" : "false") . '" ';
	$return.= 'data-pause_time="' . $pause_time . '" ';
	$return.= 'data-animation_duration="' . $animation_duration . '" ';
	$return.= '><ul class = "slides">';
	$return.= $slides_code;
	$return.= '</ul></div>';

	return do_shortcode($return);
}

add_shortcode('image_slider' , 'ts_flex_slider');