<?php

class ts_recent_posts extends WP_Widget{

	function ts_recent_posts(){
		$widget_ops = array('description' => __("Displays a list of recent posts on your site." , TS_DOMAIN));
		$control_ops = array('id_base' => 'ts-recent-posts');
		$this->WP_Widget('ts-recent-posts' , __('Simplex - Recent Posts' , TS_DOMAIN) , $widget_ops , $control_ops);
	}

	function update($new_instance , $old_instance){
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['intro'] = $new_instance['intro'];
		$instance['outro'] = $new_instance['outro'];
		$instance['count'] = $new_instance['count'];
		$instance['show_image'] = isset($new_instance['show_image']) ? "true" : "false";
		$instance['show_title'] = isset($new_instance['show_title']) ? "true" : "false";
		$instance['show_author'] = isset($new_instance['show_author']) ? "true" : "false";
		$instance['show_date'] = isset($new_instance['show_date']) ? "true" : "false";
		$instance['show_comments_count'] = isset($new_instance['show_comments_count']) ? "true" : "false";

		return $instance;
	}

	function form($instance){
		global $theme;
		$defaults = array(
		  'title' => __('Recent Posts' , TS_DOMAIN) ,
		  'intro' => '' ,
		  'outro' => '' ,
		  'count' => '3' ,
		  'show_image' => 'true' ,
		  'show_title' => 'true' ,
		  'show_author' => 'false' ,
		  'show_date' => 'true' ,
		  'show_comments_count' => 'true' ,
		);

		$instance = wp_parse_args((array) $instance , $defaults);
?>

		<div class = "ts-widget-options">

	<?php
		$option = "title";
		ts_get_option(null , array(
		  'label' => __('Title:' , TS_DOMAIN) ,
		  'type' => 'text' ,
		  'id' => $this->get_field_id($option) ,
		  'name' => $this->get_field_name($option) ,
		  'value' => $instance[$option] ,
			));

		$option = "intro";
		ts_get_option(null , array(
		  'label' => __('Widget Introduction:' , TS_DOMAIN) ,
		  'type' => 'textarea' ,
		  'id' => $this->get_field_id($option) ,
		  'name' => $this->get_field_name($option) ,
		  'value' => $instance[$option] ,
			));

		$option = "outro";
		ts_get_option(null , array(
		  'label' => __('Widget Outroduction:' , TS_DOMAIN) ,
		  'type' => 'textarea' ,
		  'id' => $this->get_field_id($option) ,
		  'name' => $this->get_field_name($option) ,
		  'value' => $instance[$option] ,
			));

		$options = array();
		for($i = 1; $i <= 15; $i++){
			$options[$i] = $i;
		}
		$option = "count";
		ts_get_option(null , array(
		  'label' => __('How many posts to show?' , TS_DOMAIN) ,
		  'type' => 'select' ,
		  'id' => $this->get_field_id($option) ,
		  'name' => $this->get_field_name($option) ,
		  'value' => $instance[$option] ,
		  'options' => $options ,
			));

		$option = "show_image";
		ts_get_option(null , array(
		  'label' => __('Show featured image' , TS_DOMAIN) ,
		  'type' => 'checkbox' ,
		  'id' => $this->get_field_id($option) ,
		  'name' => $this->get_field_name($option) ,
		  'checked' => $instance[$option] == 'true' ,
		));

		$option = "show_title";
		ts_get_option(null , array(
		  'label' => __('Show post title' , TS_DOMAIN) ,
		  'type' => 'checkbox' ,
		  'id' => $this->get_field_id($option) ,
		  'name' => $this->get_field_name($option) ,
		  'checked' => $instance[$option] == 'true' ,
		));

		$option = "show_author";
		ts_get_option(null , array(
		  'label' => __('Show post author' , TS_DOMAIN) ,
		  'type' => 'checkbox' ,
		  'id' => $this->get_field_id($option) ,
		  'name' => $this->get_field_name($option) ,
		  'checked' => $instance[$option] == 'true' ,
		));

		$option = "show_date";
		ts_get_option(null , array(
		  'label' => __('Show post date' , TS_DOMAIN) ,
		  'type' => 'checkbox' ,
		  'id' => $this->get_field_id($option) ,
		  'name' => $this->get_field_name($option) ,
		  'checked' => $instance[$option] == 'true' ,
		));

		$option = "show_comments_count";
		ts_get_option(null , array(
		  'label' => __('Show comments count' , TS_DOMAIN) ,
		  'type' => 'checkbox' ,
		  'id' => $this->get_field_id($option) ,
		  'name' => $this->get_field_name($option) ,
		  'checked' => $instance[$option] == 'true' ,
		));
	?>

	</div>

<?php
	}

	function widget($args , $instance){
		extract($args);

		$title = apply_filters('widget_title' , $instance['title']);

		/* widget */
		echo $before_widget;

		/* title */
		if($title){
			echo $before_title . $title . $after_title;
		}

		/* body */
		$widget_content = $instance['intro'] ? '<div class = "widget-intro">' . do_shortcode($instance['intro']) . '</div>' : '';
		$widget_content .= '<div class = "recent-posts-widget">';
		$widget_content .= ts_formatter(do_shortcode("[recent_posts count = '" . $instance['count'] . "' show_image = '" . $instance['show_image'] . "' show_title = '" . $instance['show_title'] . "' show_author = '" . $instance['show_author'] . "' show_date = '" . $instance['show_date'] . "' show_comments_count = '" . $instance['show_comments_count'] . "']"));
		$widget_content .= $instance['outro'] ? '<div class = "widget-outro">' . do_shortcode($instance['outro']) . '</div>' : '';
		$widget_content .= '</div>';
		echo $widget_content;

		/* end widget */
		echo $after_widget;
	}

}

register_widget('ts_recent_posts');
?>