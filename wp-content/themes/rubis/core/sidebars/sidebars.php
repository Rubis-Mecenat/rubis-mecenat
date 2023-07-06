<?php

$ts_default_sidebars = array(
  'primary-sidebar' => __('Primary Sidebar' , TS_DOMAIN) ,
  'footer-sidebar-1' => __('First Footer Widgets Area' , TS_DOMAIN) ,
  'footer-sidebar-2' => __('Second Footer Widgets Area' , TS_DOMAIN) ,
  'footer-sidebar-3' => __('Third Footer Widgets Area' , TS_DOMAIN) ,
  'footer-sidebar-4' => __('Fourth Footer Widgets Area' , TS_DOMAIN) ,
  'footer-sidebar-5' => __('Fifth Footer Widgets Area' , TS_DOMAIN) ,
  'footer-sidebar-6' => __('Sixth Footer Widgets Area' , TS_DOMAIN) ,
);

$ts_footer_layouts = array(
  array(12) ,
  array(6 , 6) ,
  array(4 , 4 , 4) ,
  array(3 , 3 , 3 , 3) ,
  array(2 , 2 , 2 , 2 , 2 , 2) ,
  array(6 , 3 , 3) ,
  array(3 , 3 , 6) ,
  array(4 , 4 , 2 , 2) ,
  array(4 , 2 , 2 , 2 , 2) ,
  array(2 , 2 , 4 , 4) ,
  array(2 , 2 , 2 , 2 , 4) ,
  array(8 , 2 , 2) ,
  array(2 , 2 , 8) ,
  array(2 , 2  , 2 , 6) ,
  array(6 , 2 , 2 , 2) ,
);


/*
 * REGISTER CUSTOM SIDEBARS
 */

$custom_sidebars = ts_get_theme_option('custom_sidebars');
$custom_sidebars = !empty($custom_sidebars) ? explode("&" , $custom_sidebars) : array();

foreach($custom_sidebars as $custom_sidebar){
	$custom_sidebar = explode("=" , $custom_sidebar);
	$ts_default_sidebars[$custom_sidebar[0]] = $custom_sidebar[1];
}


/*
 * REGISTER DEFAULT SIDEBARS
 */

foreach($ts_default_sidebars as $id => $name){
    register_sidebar(
        array(
          'id' => $id ,
          'name' => $name ,
          'before_widget' => '<div class = "widget">' ,
          'after_widget' => '</div>' ,
          'before_title' => '<h4 class = "widget-title">' ,
          'after_title' => '</h4>'
        )
    );
}