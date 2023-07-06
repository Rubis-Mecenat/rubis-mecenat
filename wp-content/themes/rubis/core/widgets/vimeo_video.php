<?php

class ts_vimeo_video extends WP_Widget{

    function ts_vimeo_video(){
        $widget_ops = array('description' => __("Displays a Vimeo video." , TS_DOMAIN));
        $control_ops = array('id_base' => 'ts-vimeo-video');
        $this->WP_Widget('ts-vimeo-video' , __('Simplex - Vimeo Video' , TS_DOMAIN) , $widget_ops , $control_ops);
    }

    function update($new_instance , $old_instance){
        $instance = $old_instance;

        $instance['title'] = strip_tags($new_instance['title']);
        $instance['intro'] = $new_instance['intro'];
        $instance['outro'] = $new_instance['outro'];
        $instance['video_id'] = $new_instance['video_id'];
        $instance['autoplay'] = isset($new_instance['autoplay']) ? "true" : "false";

        return $instance;
    }

    function form($instance){
        global $theme;
        $defaults = array(
          'title' => __('Vimeo Video' , TS_DOMAIN) ,
          'intro' => '' ,
          'outro' => '' ,
          'video_id' => '' ,
          'autoplay' => 'false' ,
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

            $option = "video_id";
            ts_get_option(null , array(
              'label' => __('Video ID:' , TS_DOMAIN) ,
              'type' => 'text' ,
              'id' => $this->get_field_id($option) ,
              'name' => $this->get_field_name($option) ,
              'value' => $instance[$option] ,
              'info' => __("http://www.vimeo.com/<code>5014038</code><br/>The video ID is: <b>5014038</b>" , TS_DOMAIN) ,
            ));

            $option = "autoplay";
            ts_get_option(null , array(
              'label' => __('Autoplay' , TS_DOMAIN) ,
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
        $widget_content .= '<div class = "vimeo-video-widget">';
        $widget_content .= ts_formatter(do_shortcode('[vimeo video_id = "' . $instance['video_id'] . '" autoplay = "' . $instance['autoplay'] . '"]'));
        $widget_content .= "</div>";
        $widget_content .= $instance['outro'] ? '<div class = "widget-outro">' . do_shortcode($instance['outro']) . '</div>' : '';
        echo $widget_content;

        /* end widget */
        echo $after_widget;
    }

}

register_widget('ts_vimeo_video');
?>