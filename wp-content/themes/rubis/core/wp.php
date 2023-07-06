<?php

$path = $_SERVER['PHP_SELF'];
$path = explode("wp-content" , $path);
$path = explode("/" , $path[1]);
$wp_path = "";
for($i = 0 ; $i < count($path) - 1 ; $i++){
	$wp_path .= "../";
}
require_once($wp_path . "wp-load.php");

add_action("admin_body_class", "sc");

?>