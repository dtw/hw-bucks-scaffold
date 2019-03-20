<?php 
	
	



// Hide meta boxes from everyone
function my_remove_meta_boxes() {
 if( !current_user_can('manage_options') ) {
  remove_meta_box('commentsdiv', 'post', 'normal');
 }
}
add_action( 'admin_menu', 'my_remove_meta_boxes' );	




// Custom Admin Login Logo
function custom_login_logo() {
	echo '<style type="text/css">
	h1 a { background-image: url('.get_template_directory_uri().'/images/login.png) !important; }
	</style>';
}
add_action('login_head', 'custom_login_logo');







?>