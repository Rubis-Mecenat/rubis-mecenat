<?php

	if(is_active_sidebar(ts_get_meta('ts_sidebar'))){
		dynamic_sidebar(ts_get_meta('ts_sidebar'));
	}else
	if(is_active_sidebar('primary-sidebar')){
		dynamic_sidebar('primary-sidebar');
	}else{
		$p1 = '<a href = "' . ADMIN_URL . 'widgets.php">';
		$p2 = '</a>';
		echo __('Your primary sidebar is empty.' , TS_DOMAIN);
		echo "<br />";
		echo sprintf(__('Click %1$s here %2$s to start adding widgets.' , TS_DOMAIN) , $p1 , $p2);
	}

?>