<?php // ENQUEUE CSS and Javascript and Google Fonts

/* 6. Enqueue JS
------------------------------------------------------------------------------ */

  wp_enqueue_script( 'scaffold_jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js');

  wp_enqueue_script( 'scaffold_bootstrap', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js');

//  wp_enqueue_script( 'scaffold_fontawesome', 'https://use.fontawesome.com/bba45a4e25.js');

/* 7. Enqueue CSS
------------------------------------------------------------------------------ */

function scaffold_add_theme_scripts() {

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

  // Uses CDN in header instead - wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css');

  wp_enqueue_style( 'font-awesome-5', 'https://use.fontawesome.com/releases/v5.8.1/css/all.css', array(), null );

  function add_font_awesome_5_cdn_attributes( $html, $handle ) {
    if ( 'font-awesome-5' === $handle ) {
        return str_replace( "media='all'", "media='all' integrity='sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf' crossorigin='anonymous'", $html );
    }
    return $html;
  }

  add_filter( 'style_loader_tag', 'add_font_awesome_5_cdn_attributes', 10, 2 );

}

add_action( 'wp_enqueue_scripts', 'scaffold_add_theme_scripts' );

/* 8. Enqueue Google Fonts
------------------------------------------------------------------------------ */

function scaffold_google_fonts() {
	$query_args = array(
		'family' => 'Open+Sans:400,600,700,800,400italic|Bitter:400,700',
		'subset' => 'latin,latin-ext'
		);
	wp_enqueue_style( 'google_fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );
}

add_action('wp_enqueue_scripts', 'scaffold_google_fonts');

?>
