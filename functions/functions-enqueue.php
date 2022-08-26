<?php // ENQUEUE CSS and Javascript and Google Fonts

function scaffold_add_theme_scripts() {

/* 6. Enqueue JS
------------------------------------------------------------------------------ */

	wp_enqueue_script( 'scaffold_jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js');

	wp_enqueue_script( 'scaffold_bootstrap', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js');

	wp_enqueue_script( 'fontawesome_5_cdn', 'https://kit.fontawesome.com/c1c5370dea.js');

	wp_enqueue_script( 'scaffold_hide_on_scroll', get_template_directory_uri() . '/js/hide_on_scroll.js');

	// wp_enqueue_script( 'scaffold_compact_on_scroll', get_template_directory_uri() . '/js/compact_on_scroll.js');

  // only load recaptcha on your-story
  if ( is_page('your-story') ){ //Check if we are viewing your-story page
    wp_enqueue_script( 'recaptcha_2', 'https://www.google.com/recaptcha/api.js');
  }

	// only on enqueue on local_services

	if  ( is_singular('local_services') ) {
		wp_enqueue_script( 'scaffold_tooltip_enable', get_template_directory_uri() . '/js/tooltip-enable.js');
	}

/* 7. Enqueue CSS
------------------------------------------------------------------------------ */

// Add a reset CSS sheet
//	wp_enqueue_style( 'erc_reset', 'https://meyerweb.com/eric/tools/css/reset/reset.css' );

// Bootstrap

	wp_enqueue_style( 'scaffold_bootstrap', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css');

	wp_enqueue_style( 'scaffold_bootstrap_theme', get_template_directory_uri() . '/bootstrap/css/bootstrap-theme.min.css');

// Main stylesheet
	wp_enqueue_style( 'style', get_stylesheet_uri() );

// Additional stylesheets
	wp_enqueue_style( 'scaffold_structure', get_template_directory_uri() . '/css/structure.css?v=' . rand());

	wp_enqueue_style( 'scaffold_typography', get_template_directory_uri() . '/css/typography.css?v=' .rand());

	wp_enqueue_style( 'scaffold_forms', get_template_directory_uri() . '/css/forms.css?v=' .rand());

	wp_enqueue_style( 'scaffold_colours', get_template_directory_uri() . '/css/colours.css?v=' .rand());

	wp_enqueue_style( 'scaffold_navigation', get_template_directory_uri() . '/css/navigation.css?' .rand());

	wp_enqueue_style( 'scaffold_widgets', get_template_directory_uri() . '/css/widgets.css');

	wp_enqueue_style( 'scaffold_icons', get_template_directory_uri() . '/css/icons.css?' .rand());

//   wp_enqueue_style( 'scaffold_sidebar', get_template_directory_uri() . '/css/sidebar.css');

	wp_enqueue_style( 'scaffold_responsiveness', get_template_directory_uri() . '/css/responsiveness.css');

	wp_enqueue_style( 'scaffold_print', get_template_directory_uri() . '/css/print.css');

}

add_action( 'wp_enqueue_scripts', 'scaffold_add_theme_scripts' );

/* 8. Enqueue Google Fonts
------------------------------------------------------------------------------ */

function webfonts_loader() {
	// Include the file.
	require_once get_theme_file_path( 'includes/wptt-webfont-loader.php' );
  // build families
  $font_families = array(
  	'Poppins:wght@300;600',
  	'Bitter:wght@400;700',
    'Open+Sans:ital,wght@0,400;0,600;0,700;0,800;1,400'
  );

  $fonts_url = add_query_arg( array(
    	'family' => implode( '&family=', $font_families ),
    	'display' => 'swap',
    ), 'https://fonts.googleapis.com/css2' );

  // Load the fonts.
  wp_enqueue_style(
    'gfonts_local',
    wptt_get_webfont_url( esc_url_raw( $fonts_url ) ),
    array(),
    '1.0'
  );
  error_log('hw-feedback:'.$fonts_url);
}
add_action( 'wp_enqueue_scripts', 'webfonts_loader' );

?>
