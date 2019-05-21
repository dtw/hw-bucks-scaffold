<?php 

/* 

1. Includes
2. Add theme support
3. Navigation
4. Set WordPress permalink structure
5. Tidy
6. Security

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

	// COMMENTS and COMMENT FORM modifications
	require_once('functions/functions-comments.php');


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
function remove_meta_boxes() {
	remove_meta_box( 'trackbacksdiv' , 'post' , 'normal' ); 
	remove_meta_box( 'trackbacksdiv' , 'page' , 'normal' ); 
}
add_action( 'admin_menu' , 'remove_meta_boxes' );


// remove junk from head
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');




/* 6. Security
------------------------------------------------------------------------------ */

// Hide WordPress version number
function wpbeginner_remove_version() {
return '';
}
add_filter('the_generator', 'wpbeginner_remove_version');

/* 7. Defer parsing JS
------------------------------------------------------------------------------ */

function defer_parsing_of_js ( $url ) {
if ( FALSE === strpos( $url, '.js' ) ) return $url;
if ( strpos( $url, 'jquery.js' ) ) return $url;
return "$url' defer ";
}
add_filter( 'clean_url', 'defer_parsing_of_js', 11, 1 );




?>