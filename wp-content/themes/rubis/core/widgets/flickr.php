<?php

class ts_flickr extends WP_Widget{

    function ts_flickr(){
        $widget_ops = array('description' => __("Displays image badges from flickr." , TS_DOMAIN));
        $control_ops = array('id_base' => 'ts-flickr');
        $this->WP_Widget('ts-flickr' , __('Simplex - Flickr' , TS_DOMAIN) , $widget_ops , $control_ops);
    }

    function update($new_instance , $old_instance){
        $instance = $old_instance;

        $instance['title'] = strip_tags($new_instance['title']);
        $instance['intro'] = $new_instance['intro'];
        $instance['outro'] = $new_instance['outro'];
        $instance['user'] = $new_instance['user'];
        $instance['count'] = $new_instance['count'];
        $instance['loading_text'] = $new_instance['loading_text'];

        return $instance;
    }

    function form($instance){
        global $theme;
        $defaults = array(
          'title' => __('Flickr' , TS_DOMAIN) ,
          'intro' => '' ,
          'outro' => '' ,
          'user' => '' ,
          'count' => '9' ,
          'loading_text' => __('Loading images ...' , TS_DOMAIN) ,
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

            $option = "user";
            ts_get_option(null , array(
              'label' => __('Flickr ID:' , TS_DOMAIN) ,
              'type' => 'text' ,
              'id' => $this->get_field_id($option) ,
              'name' => $this->get_field_name($option) ,
              'value' => $instance[$option] ,
              'info' => sprintf(__('Flickr ID (%1$s Get your flickr ID %2$s)' , TS_DOMAIN) , "<a target = '_blank' href = 'http://idgettr.com/' title = '" , "'>IDGettr</a>") ,
            ));

            $option = "count";
            ts_get_option(null , array(
              'label' => __('Count:' , TS_DOMAIN) ,
              'type' => 'select' ,
              'id' => $this->get_field_id($option) ,
              'name' => $this->get_field_name($option) ,
              'value' => $instance[$option] ,
			  'options' => array(
				'1' => '1' ,
				'2' => '2' ,
				'3' => '3' ,
				'4' => '4' ,
				'5' => '5' ,
				'6' => '6' ,
				'7' => '7' ,
				'8' => '8' ,
				'9' => '9' ,
				'10' => '10' ,
			  ) ,
            ));

            $option = "loading_text";
            ts_get_option(null , array(
              'label' => __('Loading Text:' , TS_DOMAIN) ,
              'type' => 'textarea' ,
              'id' => $this->get_field_id($option) ,
              'name' => $this->get_field_name($option) ,
              'value' => $instance[$option] ,
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
        $widget_content .= '<div class = "flickr-widget">';
        $widget_content .= ts_formatter(do_shortcode('[flickr user = "' . $instance['user'] . '" count = "' . $instance['count'] . '" loading_text = "' . $instance['loading_text'] . '"]'));
        $widget_content .= "</div>";
        $widget_content .= $instance['outro'] ? '<div class = "widget-outro">' . do_shortcode($instance['outro']) . '</div>' : '';
        echo $widget_content;

        /* end widget */
        echo $after_widget;
    }

}

register_widget('ts_flickr');
?>