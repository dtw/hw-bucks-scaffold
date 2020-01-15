<?php

// Redirect to thank you post after comment

//if (is_singular('local_services')) {

add_action('comment_post_redirect', 'redirect_to_thank_page');

function redirect_to_thank_page() {
	$the_url = site_url();
		return $the_url . '/thanks/';
	}

// 		}
?>
