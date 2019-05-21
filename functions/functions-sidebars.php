<?php // Register Widget Areas

function scaffold_widgets_init() {

	register_sidebar( array(
		'name' => 'Pages',
		'id' => 'page_sidebar',
		'before_widget' => '<div id="%1$s" class="widget widget-pages %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );

	register_sidebar( array(
		'name' => 'Post archives',
		'id' => 'posts_sidebar',
		'before_widget' => '<div id="%1$s" class="widget widget-posts %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );
	
			register_sidebar( array(
		'name' => 'Single Post',
		'id' => 'single_post_sidebar',
		'before_widget' => '<div id="%1$s" class="widget widget-single-post %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );

	register_sidebar( array(
		'name' => 'Footer 1',
		'id' => 'footer_1',
		'before_widget' => '<div id="%1$s" class="widget widget-footer %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => 'Footer 2',
		'id' => 'footer_2',
		'before_widget' => '<div id="%1$s" class="widget widget-footer %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => 'Footer 3',
		'id' => 'footer_3',
		'before_widget' => '<div id="%1$s" class="widget widget-footer %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => 'Services',
		'id' => 'services_sidebar',
		'before_widget' => '<div id="%1$s" class="widget widget-services %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );

	register_sidebar( array(
		'name' => 'Events',
		'id' => 'events_sidebar',
		'before_widget' => '<div id="%1$s" class="widget widget-events %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );

		register_sidebar( array(
		'name' => 'Subfooter',
		'id' => 'subfooter_sidebar',
		'before_widget' => '<div id="%1$s" class="widget widget-subfooter %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );

		register_sidebar( array(
		'name' => 'Beside Tagline',
		'id' => 'beside_tagline_sidebar',
		'class' => '',
		'before_widget' => '<div id="%1$s" class="widget-beside-tagline %2$s">',
		'after_widget' => '</div>',
		'before_title' => '',
		'after_title' => '',
	) );

}
add_action( 'widgets_init', 'scaffold_widgets_init' );

?>