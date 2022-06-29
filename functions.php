<?php

/*

1. Includes
2. Add theme support
3. Navigation
4. Set WordPress permalink structure
5. Tidy
6. Security
7. Pass arguements to JS
8. Update HTML Headers

*/

/* 1. Includes
-------------------------------------------- */

	// ENQUEUE CSS and Javascript and Fonts
	require_once('functions/functions-enqueue.php');

	// Register SIDEBARS for widgets
	require_once('functions/functions-sidebars.php');

	// CUSTOMIZER additional settings
	require_once('functions/functions-customiser.php');

	// ADMIN DASHBOARD modifications
	require_once('functions/functions-dashboard.php');

	// WIDGETS
	include('widgets/widget-social-block.php');

/* Add theme support
------------------------------------------------------------------------------ */

	// HTML5
add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

	// Enable automatic FEED LINKS
add_theme_support( 'automatic-feed-links' );

	// Add document title tag to PAGE TITLE
add_theme_support( 'title-tag' );

	// Register FEATURED IMAGES  for posts and pages only
add_theme_support( 'post-thumbnails', array( 'post', 'page', 'local_services' ) );

	// What is the maximum width for images/video within content?
	if ( ! isset( $content_width ) ) $content_width = 780;

	// Add excerpts to pages
add_action( 'init', 'my_add_excerpts_to_pages' );
	function my_add_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
		}


/* 3. Navigation
------------------------------------------------------------------------------ */

	// Register navigation menu areas
register_nav_menus( array(
	'main_menu' => 'Main',
	'footer_menu' => 'Footer',
) );

// Register custom navigation walker
    require_once('elements/wp_bootstrap_navwalker.php');




/* 4. Set WordPress permalink structure
------------------------------------------------------------------------------ */

Function hw_set_permalinks() {
    global $wp_rewrite;
    $wp_rewrite->set_permalink_structure( '/%year%/%monthnum%/%postname%/' );
}
add_action( 'init', 'hw_set_permalinks' );

update_option('image_default_link_type','none');



/* 5. Tidy
------------------------------------------------------------------------------ */

// Remove meta boxes from Posts and Pages
function hw_remove_meta_boxes() {
	remove_meta_box( 'trackbacksdiv' , 'post' , 'normal' );
	remove_meta_box( 'trackbacksdiv' , 'page' , 'normal' );
	remove_meta_box( 'commentsdiv' , 'post' , 'normal');
	remove_meta_box( 'commentsdiv' , 'page' , 'normal');
}
add_action( 'admin_menu' , 'hw_remove_meta_boxes' );


// remove junk from head
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');

// clear oembed cache
add_filter( 'oembed_ttl', function($ttl) {
      $GLOBALS['wp_embed']->usecache = 0;
            $ttl = 0;
            // House-cleanoing
            do_action( 'wpse_do_cleanup' );
    return $ttl;
});

add_filter( 'embed_oembed_discover', function( $discover )
{
    if( 1 === did_action( 'wpse_do_cleanup' ) )
        $GLOBALS['wp_embed']->usecache = 1;
    return $discover;
} );

// wrap video iframes in divs
function wrap_oembed_dataparse($return, $data, $url) {

    if  ( $data->type == 'video' ) {
    	return '<div class="responsive-iframe">' . $return . '</div>';
		} else {
			return $return;
		}
}

add_filter( 'oembed_dataparse', 'wrap_oembed_dataparse', 99, 4 );

// don't create an excerpt from content if blank
remove_filter( 'get_the_excerpt', 'wp_trim_excerpt' );

/**
 * Filter the excerpt length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

// Wrap the excerpt in some html
function scaffold_excerpt($content) {
		if ( ! empty($content) ) {
			return '<div id="excerpt">' . $content . '</div>';
		}
}

add_filter('the_excerpt', 'scaffold_excerpt');

/* 6. Security
------------------------------------------------------------------------------ */

// Hide WordPress version number
function wpbeginner_remove_version() {
return '';
}
add_filter('the_generator', 'wpbeginner_remove_version');

/* 7. Pass arguements to JS
------------------------------------------------------------------------------ */
if (!(is_admin() )) {
	function add_js_arguements ( $url ) {
	// if the url doesn't contain .js do nothing
	if ( FALSE === strpos( $url, '.js' ) ) return $url;
	// if the url contains jquery.js do nothing
	if ( strpos( $url, 'jquery.js' ) ) return $url;
	// if the url contains /wp-includes do nothing
	if ( strpos( $url, '/wp-includes' ) ) return $url;
	// if the url contains fontawesome kit, append crossorigin="anonymous"
	if ( strpos( $url, '/c1c5370dea.js' ) ) return str_replace(' src', ' crossorigin="anonymous" src', $url);
	// Defer jQuery Parsing using the HTML5 defer property
	if ( FALSE === strpos( $url, 'defer' ) ) return str_replace(' src', ' defer src', $url);
	}
	add_filter( 'clean_url', 'add_js_arguements', 11, 1 );
}

/* 8. Pass arguements to JS
------------------------------------------------------------------------------ */
function hw_scaffold_nocache($headers)
{
	if(is_home()) {
		unset($headers['Cache-Control']);
		// set new header for home page
		$headers['Cache-Control'] = 'no-store';
    return $headers;
	}
}
add_filter('wp_headers', 'hw_scaffold_nocache');

/* Sanitizers */

// Function to sanitize_text
function sanitize_text( $text ) {
	return sanitize_text_field( $text );
}

// Function to sanitize_telephone
function sanitize_telephone( $telno ) {
	$telno = sanitize_text_field( $telno );
	// No spaces - we'll use masks
	$telno = str_replace(' ', '', $telno);
	// CLean brackets
	$telno = str_replace(')', '', $telno);
	$telno = str_replace('(', '', $telno);
	return $telno;
}

// Function to sanitize_twitter handles
function sanitize_twitter( $handle ) {
	$handle = sanitize_text_field( $handle );
	$handle = trim($handle, '@');
	return $handle;
}

function format_telephone($telno) {
	if (str_starts_with($telno,'020')) {
		$mask = "%s%s%s %s%s%s%s %s%s%s%s";
	} else {
		$mask = "%s%s%s%s%s %s%s%s %s%s%s";
	}
	$telno = vsprintf($mask, str_split($telno));
	return $telno;
}

?>
