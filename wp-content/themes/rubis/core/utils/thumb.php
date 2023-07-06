<?php

error_reporting(E_ERROR);

require_once("ts_colors.php");

if(isset($_GET['src'])){
	if(!isset($_GET['w']) || !isset($_GET['h'])){
		$img_data = getimagesize($_GET['src']);
		
		if(!isset($_GET['w'])) $_GET['w'] = (int) $img_data["0"];
		if(!isset($_GET['h'])) $_GET['h'] = (int) $img_data["1"];
	}
	
	if(isset($_GET['color'])){
		$_GET['color'] = html2rgb($_GET['color']);
		$r = (int) $_GET['color'][0];
		$g = (int) $_GET['color'][1];
		$b = (int) $_GET['color'][2];
		$_GET['f'] = '5,' . $r . ',' . $g . ',' . $b . ',0';
	}
}

require_once("timthumb.php");

?>