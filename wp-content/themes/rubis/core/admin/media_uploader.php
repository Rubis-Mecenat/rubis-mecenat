<?php

add_action('admin_init' , 'ts_init_media_uploader');

function ts_init_media_uploader(){
	add_filter('media_upload_tabs' , 'ts_media_uploader_tabs');
	add_filter('attachment_fields_to_edit' , 'ts_media_uploader_form_fields' , 10 , 2);
}

function ts_media_uploader_tabs($tabs){
	if(!isset($_GET['ts-upload']))
		return $tabs;

	unset($tabs['gallery']);
	unset($tabs['type_url']);
	return $tabs;
}

function ts_media_uploader_form_fields($form_fields , $post){
	if(!isset($_GET['ts-upload']))
		return $form_fields;

	unset($form_fields['align']);
	unset($form_fields['image_alt']);
	unset($form_fields['post_title']);
	unset($form_fields['post_content']);
	unset($form_fields['post_excerpt']);
	unset($form_fields['image-size']);
	unset($form_fields['url']);

	$tr = '<tr class = "submit"><td></td>';
	$tr.= '<td class = "savesend">';

	if(isset($_GET['ts-shortcoder-request'])){
		$tr.= '<a href = "#" class = "ts-button" onclick = "parent.returnToShortcoder(\'' . wp_get_attachment_url($post->ID) . '\')">' . __("Select this item" , TS_DOMAIN) . '</a>';
		$tr.= '<a href = "#" class = "ts-secondary-button" onclick = "parent.returnToShortcoder(\'\')">' . __("Return to Shortcoder" , TS_DOMAIN) . '</a>';
	}else{
		$tr.= '<a href= "#" class = "ts-button" onclick = "setFileReference(\'' . wp_get_attachment_url($post->ID) . '\'); return false;">' . __("Select this item" , TS_DOMAIN) . '</a>';
	}

	$tr.= '</td>';
	$tr.= '</tr>';

	$form_fields['buttons'] = array(
		'tr' => $tr
	);
	return $form_fields;
}