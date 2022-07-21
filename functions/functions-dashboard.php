<?php

// Custom Admin Login Logo
function custom_login_logo() {
	$logo_style = '<style type="text/css">h1 a { background-image: url(' . get_site_icon_url( 512, get_template_directory_uri().'/images/login.png') . ') !important; }</style>';
  echo $logo_style;
}
add_action('login_head', 'custom_login_logo');

?>
