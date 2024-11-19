<?php
/*
Plugin Name: Plugin Rubis Mécénat
Desription: Ajout des Custom Post Types, Custom Taxonomies & Champs ACF
Author: Thomas Florentin
Version: 1.0
*/

define('RUBIS_DIR', WP_PLUGIN_DIR.'/rubis-plugin');
define('RUBIS_PATH', '/'.str_replace(ABSPATH, '', RUBIS_DIR));
define('RUBIS_URL', WP_PLUGIN_URL.'/rubis-plugin');


require_once(RUBIS_DIR.'/acf.php');
require_once(RUBIS_DIR.'/cpt/cpt-project.php');
require_once(RUBIS_DIR.'/cpt/cpt-edition.php');
require_once(RUBIS_DIR.'/cpt/cpt-video.php');
require_once(RUBIS_DIR.'/cpt/cpt-artist.php');

