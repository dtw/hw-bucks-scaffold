<?php

/*

1. Logo
2. Custom background

*/

// Remove the static front page option
add_action('customize_register', 'scaffold_customize_register');
function scaffold_customize_register($wp_customize) {
	$wp_customize->remove_section( 'static_front_page' );
	$wp_customize->remove_section( 'nav' );
}



/* 1. LOGO
------------------------------------------------------------- */

function scaffold_theme_customizer( $wp_customize ) {

	// Create a new section in the Theme Customizer
	$wp_customize->add_section( 'scaffold_logo_section' , array(
		'title'       => __( 'Your Logo', 'scaffold' ),
		'priority'    => 30,
		'description' => 'Upload a logo to replace the default site name and description',
	) );

	// Register the new setting
	$wp_customize->add_setting( 'scaffold_logo' );

	// Tell Theme Customiser to let us use an image uploader
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'scaffold_logo', array(
		'label'    => __( 'Upload logo - should be 280px wide', 'scaffold' ),
		'section'  => 'scaffold_logo_section',
		'settings' => 'scaffold_logo',
	) ) );

}

	add_action( 'customize_register', 'scaffold_theme_customizer' );



/* 2. Custom BACKGROUND
---------------------------------------------- */

$args = array(
	'default-color' => 'fafafa',
);
add_theme_support( 'custom-background', $args );


?>
