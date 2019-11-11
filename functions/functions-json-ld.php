<?php
// JSON-LD for WordPress Home Articles and Author Pages
// From https://builtvisible.com/implementing-json-ld-wordpress/
 // Stuff for any page
 function get_post_data() {
    global $post;
    return $post;
  }
  // This has all the data of the post/page etc
  $payload["@context"] = "http://schema.org/";
  // Stuff for any page, if it exists
  $post_data = get_post_data();
  // Stuff for specific pages
  $category = get_the_category();
  // This gets the data for the user who wrote that particular item
  if (is_single()) {
    $author_data = get_userdata($post_data->post_author);
    $post_url = get_permalink();
    $post_thumb = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
  }

  // We do all this separately so we keep the right things for organization together
  if (is_front_page()) {
    $payload["@type"] = "Organization";
    $payload["name"] = "Healthwatch Bucks";
    $payload["logo"] = "https:\/\/healthwatchbucks.co.uk\/wp-content\/uploads\/2016\/07\/HW_BUCKS.png";
    $payload["url"] = "http:\/\/healthwatchbucks.co.uk\/";
    $payload["contactPoint"] = [
      ["@type" => "ContactPoint",
        "telephone" => "01844 348839",
        "email" => "info@healthwatchbucks.co.uk",
        "contactType" => "info"
      ]
    ];
  }
  // This gets the data for the user who wrote that particular item
  if (is_author()) {
  // Some of you may not have all of these data points in your user profiles - delete as appropriate
  // fetch twitter from author meta and concatenate with full twitter URL
    $author_data = get_userdata($post_data->post_author);
    $twitter_url = " https:\/\/twitter.com/";
    $twitterHandle = get_the_author_meta('twitter');
    $twitterHandleURL = $twitter_url . $twitterHandle;
    $websiteHandle = get_the_author_meta('url');
    $facebookHandle = get_the_author_meta('facebook');
    $gplusHandle = get_the_author_meta('googleplus');
    $linkedinHandle = get_the_author_meta('linkedin');
    $slideshareHandle = get_the_author_meta('slideshare');
  }
?>
