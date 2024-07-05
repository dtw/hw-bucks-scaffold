<?php
// JSON-LD for WordPress Home Articles and Author Pages
// From https://builtvisible.com/implementing-json-ld-wordpress/

/* THIS RUNS OUTSIDE THE LOOP SO global $post cannot be used */

  if ( ! is_admin() ) {
  	// This has all the data of the post/page etc
  	$payload["@context"] = "http://schema.org/";
  	// This gets the data for the user who wrote that particular item
  	if (is_single()) {
			// Gets an array of post objects.  
			// If this is the single post page (single.php template), this should be an
			// array of length 1.
			$post_data = get_posts();
  		$author_data = get_userdata($post_data[0]->post_author);
  		$post_url = get_permalink();
			// get an image url
			if (!(wp_get_attachment_url(get_post_thumbnail_id($post_data[0]->ID)))) {
				$post_thumb = "http://www.healthwatchbucks.co.uk/wp-content/uploads/2016/07/Patterned-Quotes.png";
			} else {
				$post_thumb = wp_get_attachment_url(get_post_thumbnail_id($post_data[0]->ID));
			}
  	}

  	if ( is_singular('local_services') ) {
  		$rating = hw_feedback_get_rating($post->ID);
      // get the CQC Primary Inspection Category
      $cqc_inspection_category_tax_terms = wp_get_post_terms($post->ID, 'cqc_inspection_category', array('fields' => 'names'));
      // match inspection categories to Schema.org subtypes:  https://schema.org/MedicalOrganization
      $mapped_subtype = array(
        'P1' => 'Dentist',
        'P2' => 'Physician',
        'P3' => 'MedicalClinic',
        'P4' => 'MedicalClinic',
        'P6' => 'MedicalClinic',
        'P7' => 'Physician',
        'S3' => 'Hospital',
        'H1' => 'Hospital',
        'H2' => 'Hospital',
        'H3' => 'Hospital',
        'H6' => 'MedicalClinic'
      );
      // if no match just leave it as MedicalOrganization
      $schema_org_type = ! empty($mapped_subtype[$cqc_inspection_category_tax_terms[0]]) ? $mapped_subtype[$cqc_inspection_category_tax_terms[0]] : "MedicalOrganization";
      error_log("hw-scaffold: category ". $cqc_inspection_category_tax_terms[0] . " " . $schema_org_type);
      // build the address
      if ( get_post_meta( $post->ID, 'hw_services_address_line_2', true ) ) {
        $street_address = get_post_meta( $post->ID, 'hw_services_address_line_1', true ) . " " . get_post_meta($post->ID, 'hw_services_address_line_2', true);
      } else {
        $street_address = get_post_meta($post->ID, 'hw_services_address_line_1', true);
      }

      $payload["@type"] = "MedicalOrganization";
      $payload["name"] = get_the_title();
      $payload["description"] = get_the_excerpt();
      $payload["address"] = [
      "streetAddress" => $street_address,
      // city / town
      "addressLocality" => get_post_meta($post->ID, 'hw_services_city', true),
      // county
      "addressRegion" => get_post_meta($post->ID, 'hw_services_county', true),
      "postalCode" => get_post_meta($post->ID, 'hw_services_postcode', true),
      ];
  		if ( $rating['count'] > 2 ) {
  			$payload["aggregateRating"] = [
  				["@type" => "AggregateRating",
  				"ratingValue" => round($rating['average'],1),
  				"ratingCount" => $rating['count'],
  				"itemReviewed" => [
  					["@type" => $schema_org_type,
  					"name" => get_the_title(),
  					"image" => $post_thumb,
            "address" => [
              "streetAddress" => $street_address,
              // city / town
              "addressLocality" => get_post_meta($post->ID, 'hw_services_city', true),
              // county
              "addressRegion" => get_post_meta($post->ID, 'hw_services_county', true),
              "postalCode" => get_post_meta($post->ID, 'hw_services_postcode', true),
              // just to make Google happy - we're GB, not UK in ISO_3166-1
              "addressCountry" => "GB"
            ]
  					]
  				]
  			]
  			];
  		}
  	}
  	// We do all this separately so we keep the right things for organization together
  	if (is_front_page()) {
  		$payload["@type"] = "Organization";
  		$payload["name"] = get_theme_mod( 'scaffold_org_name');
  		$payload["logo"] = "https://healthwatchbucks.co.uk/wp-content/uploads/2016/07/HW_BUCKS.png";
  		$payload["url"] = get_site_url();
  		$payload["contactPoint"] = [
  			["@type" => "ContactPoint",
          // get phone from theme customiser
  				"telephone" => get_theme_mod( 'scaffold_org_telephone'),
          // get email from theme customiser
  				"email" => get_theme_mod( 'scaffold_org_email'),
  				"contactType" => "info"
  			]
  		];
  	}
  	// This gets the data for the user who wrote that particular item
  	if (is_author()) {
  	// Some of you may not have all of these data points in your user profiles - delete as appropriate
  	// fetch twitter from author meta and concatenate with full twitter URL
  		$author_data = get_userdata($post_data->post_author);
  		$twitter_url = " https://twitter.com/";
  		$twitterHandle = get_the_author_meta('twitter');
  		$twitterHandleURL = $twitter_url . $twitterHandle;
  		$websiteHandle = get_the_author_meta('url');
  		$facebookHandle = get_the_author_meta('facebook');
  		$gplusHandle = get_the_author_meta('googleplus');
  		$linkedinHandle = get_the_author_meta('linkedin');
  		$slideshareHandle = get_the_author_meta('slideshare');
  	}
  }
?>
