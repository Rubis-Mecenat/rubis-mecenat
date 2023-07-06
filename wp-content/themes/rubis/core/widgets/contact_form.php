<?php

class ts_contact extends WP_Widget{

    function ts_contact(){
        $widget_ops = array('description' => __("A quick contact form." , TS_DOMAIN));
        $control_ops = array('id_base' => 'ts-contact');
        $this->WP_Widget('ts-contact' , __('Simplex - Contact Form' , TS_DOMAIN) , $widget_ops , $control_ops);
    }

    function update($new_instance , $old_instance){
        $instance = $old_instance;

        $instance['title'] = strip_tags($new_instance['title']);
        $instance['intro'] = $new_instance['intro'];
        $instance['outro'] = $new_instance['outro'];
        $instance['to'] = $new_instance['to'];
        $instance['name_label'] = $new_instance['name_label'];
        $instance['email_label'] = $new_instance['email_label'];
        $instance['message_label'] = $new_instance['message_label'];
        $instance['button_label'] = $new_instance['button_label'];
        $instance['required_text'] = $new_instance['required_text'];
        $instance['success_msg'] = $new_instance['success_msg'];
        $instance['failure_msg'] = $new_instance['failure_msg'];

        return $instance;
    }

    function form($instance){
        global $theme;
        $defaults = array(
          'title' => __('Contact' , TS_DOMAIN) ,
          'intro' => '' ,
          'outro' => '' ,
          'to' => '' ,
          'name_label' => __('Nom' , TS_DOMAIN) ,
          'email_label' => __('E-mail' , TS_DOMAIN) ,
          'message_label' => __('Message' , TS_DOMAIN) ,
          'button_label' => __('Envoyer' , TS_DOMAIN) ,
          'required_text' => __('Tous les champs sont obligatoires' , TS_DOMAIN) ,
          'success_msg' => __('<h5>Merci</h5><p>Votre message a bien été envoyé, nous vous répondrons dans les plus brefs délais</p>' , TS_DOMAIN) ,
          'failure_msg' => __("Votre message n'a pas été envoyé, merci de rééssayer" , TS_DOMAIN) ,
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

            $option = "to";
            ts_get_option(null , array(
              'label' => __('Send data to:' , TS_DOMAIN) ,
              'type' => 'text' ,
              'id' => $this->get_field_id($option) ,
              'name' => $this->get_field_name($option) ,
              'value' => $instance[$option] ,
            ));

            $option = "name_label";
            ts_get_option(null , array(
              'label' => __('Name Label:' , TS_DOMAIN) ,
              'type' => 'text' ,
              'id' => $this->get_field_id($option) ,
              'name' => $this->get_field_name($option) ,
              'value' => $instance[$option] ,
            ));

            $option = "email_label";
            ts_get_option(null , array(
              'label' => __('E-mail Label:' , TS_DOMAIN) ,
              'type' => 'text' ,
              'id' => $this->get_field_id($option) ,
              'name' => $this->get_field_name($option) ,
              'value' => $instance[$option] ,
            ));

            $option = "message_label";
            ts_get_option(null , array(
              'label' => __('Message Label:' , TS_DOMAIN) ,
              'type' => 'textarea' ,
              'id' => $this->get_field_id($option) ,
              'name' => $this->get_field_name($option) ,
              'value' => $instance[$option] ,
            ));

            $option = "button_label";
            ts_get_option(null , array(
              'label' => __('Button Label:' , TS_DOMAIN) ,
              'type' => 'text' ,
              'id' => $this->get_field_id($option) ,
              'name' => $this->get_field_name($option) ,
              'value' => $instance[$option] ,
            ));

            $option = "required_text";
            ts_get_option(null , array(
              'label' => __('Required Text:' , TS_DOMAIN) ,
              'type' => 'text' ,
              'id' => $this->get_field_id($option) ,
              'name' => $this->get_field_name($option) ,
              'value' => $instance[$option] ,
            ));

            $option = "success_msg";
            ts_get_option(null , array(
              'label' => __('Success Message:' , TS_DOMAIN) ,
              'type' => 'textarea' ,
              'id' => $this->get_field_id($option) ,
              'name' => $this->get_field_name($option) ,
              'value' => $instance[$option] ,
            ));

            $option = "failure_msg";
            ts_get_option(null , array(
              'label' => __('Failure Message:' , TS_DOMAIN) ,
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
        $str = <<<TST
        [contact_form to = '{$instance['to']}' name_label = '{$instance['name_label']}' email_label = '{$instance['email_label']}' message_label = '{$instance['message_label']}' button_label = '{$instance['button_label']}' required_text = '{$instance['required_text']}']
		[on_success]{$instance['success_msg']}[/on_success]
		[on_failure]{$instance['failure_msg']}[/on_failure]
		[/contact_form]
TST;
		$widget_content .= ts_formatter(do_shortcode($str));
        $widget_content .= $instance['outro'] ? '<div class = "widget-outro">' . do_shortcode($instance['outro']) . '</div>' : '';
        echo $widget_content;

        /* end widget */
        echo $after_widget;
    }

}

register_widget('ts_contact');
?>