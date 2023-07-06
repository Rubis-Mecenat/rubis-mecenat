<?php

class ts_search extends WP_Widget{

    function ts_search(){
        $widget_ops = array('description' => __("Displays a search box." , TS_DOMAIN));
        $control_ops = array('id_base' => 'ts-search');
        $this->WP_Widget('ts-search' , __('Simplex - Search' , TS_DOMAIN) , $widget_ops , $control_ops);
    }

    function update($new_instance , $old_instance){
        $instance = $old_instance;

        $instance['title'] = strip_tags($new_instance['title']);
        $instance['intro'] = $new_instance['intro'];
        $instance['outro'] = $new_instance['outro'];
        $instance['prompt'] = $new_instance['prompt'];

        return $instance;
    }

    function form($instance){
        global $theme;
        $defaults = array(
          'title' => __('Search' , TS_DOMAIN) ,
          'intro' => '' ,
          'outro' => '' ,
          'prompt' => __('Search ...' , TS_DOMAIN) ,
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

            $option = "prompt";
            ts_get_option(null , array(
              'label' => __('Prompt:' , TS_DOMAIN) ,
              'type' => 'text' ,
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
        $widget_content .= '<div class = "search-widget">';
        $widget_content .= ts_formatter(do_shortcode('[search prompt = "' . $instance['prompt'] . '"]'));
        $widget_content .= "</div>";
        $widget_content .= $instance['outro'] ? '<div class = "widget-outro">' . do_shortcode($instance['outro']) . '</div>' : '';
        echo $widget_content;

        /* end widget */
        echo $after_widget;
    }

}

register_widget('ts_search');
?>