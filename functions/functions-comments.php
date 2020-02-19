<?php

// Redirect to thank you post after comment on local_services

add_action('comment_post_redirect', 'redirect_to_thank_page', 10,2 );

function redirect_to_thank_page( $location, $commentdata) {
	$the_url = site_url();
  $post_id = $commentdata->comment_post_ID;
  if('local_services' == get_post_type($post_id)){
    return $the_url . '/thanks/';
  }
  return $location;
	}

?>
