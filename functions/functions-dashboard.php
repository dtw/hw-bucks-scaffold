<?php

// Custom Admin Login Logo
function custom_login_logo() {
	echo '<style type="text/css">
	h1 a { background-image: url('.get_template_directory_uri().'/images/login.png) !important; }
	</style>';
}
add_action('login_head', 'custom_login_logo');







?>
