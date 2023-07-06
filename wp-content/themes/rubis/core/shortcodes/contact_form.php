<?php

function ts_contact_form($atts , $content = null){
	extract(shortcode_atts(array(
		  'to' => '' ,
		  'required_text' => __('Tous les champs sont obligatoires' , TS_DOMAIN) ,
		  'name_label' => __('Nom' , TS_DOMAIN) ,
		  'email_label' => __('E-mail' , TS_DOMAIN) ,
		  'message_label' => __('Message' , TS_DOMAIN) ,
		  'button_label' => __('Envoyer' , TS_DOMAIN) ,
			) , $atts));

	if(empty($to))
		$to = get_the_author_meta('email' , 1);

	$GLOBALS['contact_forms_count']++;
	$GLOBALS['ts_success_msg'] = '';
	$GLOBALS['ts_failure_msg'] = '';

	do_shortcode($content);

	$contact_php_file = THEME_CORE_URL . '/utils/contact.php';
	$site_name = get_bloginfo('name');
	$success_msg = $GLOBALS['ts_success_msg'];
	$failure_msg = $GLOBALS['ts_failure_msg'];

	$GLOBALS['ts_success_msg'] = '';
	$GLOBALS['ts_failure_msg'] = '';

	$return .= '<form class = "contact-form" action = "' . $contact_php_file . '" method = "post">';
	$return .= '<input type = "hidden" name = "to" value = "' . $to . '" />';
	$return .= '<input type = "hidden" name = "site_name" value = "' . $site_name . '" />';

	$return .= '<div class = "form-input">';
	$return .= '<input type = "text" data-prompt = "' . $name_label . '" value = "' . $name_label . '" name = "name">';
	$return .= '</div>';

	$return .= '<div class = "form-input">';
	$return .= '<input type = "text" data-prompt = "' . $email_label . '" value = "' . $email_label . '" name = "email">';
	$return .= '</div>';

	$return .= '<div class = "form-input">';
	$return .= '<textarea data-prompt = "' . $message_label . '" name = "message">' . $message_label . '</textarea>';
	$return .= '</div>';

	$return .= '<p class = "meta"><span>*</span> ' . $required_text . '</p>';

	$return .= '<button name = "submit" type = "submit">' . $button_label . '</button>';

	$return .= '<div class = "form-failure">' . $failure_msg . '</div>';
	$return .= '</form>';

	$return .= '<div class = "form-success">' . $success_msg . '</div>';

	return do_shortcode('[raw]' . $return . '[/raw]');
}

$GLOBALS['contact_forms_count'] = 0;
add_shortcode('contact_form' , 'ts_contact_form');

function ts_on_success($atts , $content = null){
	return $GLOBALS['ts_success_msg'] = do_shortcode($content);
}

add_shortcode('on_success' , 'ts_on_success');

function ts_on_failure($atts , $content = null){
	return $GLOBALS['ts_failure_msg'] = do_shortcode($content);
}

add_shortcode('on_failure' , 'ts_on_failure');