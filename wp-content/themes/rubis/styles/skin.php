<?php

require_once( '../core/wp.php' );

header("Content-Type:text/css");

?>

body{
font-size: <?php echo ts_get_theme_option('body_size'); ?>px;
}

h1{
font-size: <?php echo ts_get_theme_option('h1_size'); ?>px;
}

h2{
font-size: <?php echo ts_get_theme_option('h2_size'); ?>px;
}

h3{
font-size: <?php echo ts_get_theme_option('h3_size'); ?>px;
}

h4{
font-size: <?php echo ts_get_theme_option('h4_size'); ?>px;
}

h5{
font-size: <?php echo ts_get_theme_option('h5_size'); ?>px;
}

h6{
font-size: <?php echo ts_get_theme_option('h6_size'); ?>px;
}

#header ,
#header-container{
height: <?php echo ts_get_theme_option('header_height'); ?>px;
}

#main-nav-menu ul li a{
line-height: <?php echo ts_get_theme_option('header_height'); ?>px;
}

#logo{
margin-bottom: <?php echo ts_get_theme_option('logo_offset_y'); ?>px;
margin-left: <?php echo ts_get_theme_option('logo_offset_x'); ?>px;
}

#logo #site-description{
margin-bottom: <?php echo ts_get_theme_option('tagline_offset_y'); ?>px;
margin-left: <?php echo ts_get_theme_option('tagline_offset_x'); ?>px;
}

#main-nav-menu > ul li ul{
width: <?php echo ts_get_theme_option('main_nav_submenu_width'); ?>px;
}


/* Skin Color */

.cboxSlideshow_off #cboxSlideshow:hover ,
.cboxSlideshow_on #cboxSlideshow:hover ,
#cboxPrevious:hover ,
#cboxNext:hover ,
#cboxClose:hover ,
.flexslider .controls a.next:hover ,
.flexslider .controls a.prev:hover ,
.ts-edit-link a:hover ,
#page-header > * span:before ,
#page-header > * span:after ,
.fancy-title:before ,
.vcard .overlay-color ,
.portfolio.compact .entry .entry-body header a.more:hover ,
#comment-form .leave-a-comment ,
#comments .leave-a-comment ,
#page-content .blog .entry .post-format a ,
.back-to-top:hover a ,
.sticky-nav a:hover ,
ul.list.tags li a:hover ,
.toggle.active .indicator ,
.toggle:hover .indicator ,
.accordion-panel.active .indicator ,
.accordion-panel-title:hover .indicator ,
.tab-group li.active ,
.widget-title:before ,
button:hover ,
.button:hover ,
#page-header:before ,
#cap{
background-color: #<?php echo ts_get_theme_option('skin_color'); ?>;
}

.colored ,
.toggle.active .toggle-title h3 ,
.toggle .toggle-title:hover h3 ,
.portfolio .entry .entry-title a:hover ,
#comments .comments-list .comment .comment-author a:hover ,
#page-content .blog nav a:hover ,
#page-content .blog .entry-content .more-link:hover ,
#page-content .blog .entry .entry-title a:hover ,
.contact-form .meta span ,
.twitter-feed a ,
.toggle.active .toggle-title ,
.toggle-title:hover ,
.accordion-panel.active .accordion-panel-title ,
.accordion-panel-title:hover ,
dl dt ,
#main-nav-menu > ul > li.current-menu-item > a ,
#main-nav-menu > ul > li.current_page_item > a ,
#main-nav-menu > ul > li.current_page_ancestor > a ,
#main-nav-menu > ul > li.current_page_parent > a ,
#main-nav-menu > ul > li.current-page-ancestor > a ,
#main-nav-menu > ul > li.current-menu-ancestor > a ,
a:hover{
color: #<?php echo ts_get_theme_option('skin_color'); ?>;
}

input[type=text]:focus ,
input[type=password]:focus ,
textarea:focus{
border-color: #<?php echo ts_get_theme_option('skin_color'); ?>;
}

.clients-grid .entry:hover ,
.portfolio-4 .entry:hover ,
.portfolio-3 .entry:hover ,
.portfolio-2 .entry:hover ,
#main-nav-menu > ul > li.current-menu-item > a ,
#main-nav-menu > ul > li.current_page_item > a ,
#main-nav-menu > ul > li.current_page_ancestor > a ,
#main-nav-menu > ul > li.current_page_parent > a ,
#main-nav-menu > ul > li.current-page-ancestor > a ,
#main-nav-menu > ul > li.current-menu-ancestor > a{
border-bottom-color: #<?php echo ts_get_theme_option('skin_color'); ?>;
}

blockquote{
border-left-color: #<?php echo ts_get_theme_option('skin_color'); ?>;
}

.qtrans_flag_en { background:none !important; }
.qtrans_flag_fr { background:none !important; }