<?php

/*

This changes the options in the WordPress theme customiser.

1. Logo

*/

// Remove the static front page, nav and color options
add_action('customize_register', 'scaffold_customize_register');
function scaffold_customize_register($wp_customize) {
	$wp_customize->remove_section( 'static_front_page' );
	$wp_customize->remove_section( 'nav' );
	$wp_customize->remove_section( 'colors' );
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

	// Create a new section in the Theme Customizer
	$wp_customize->add_section( 'scaffold_logo_alt_section' , array(
		'title'       => __( 'Your Logo (alt)', 'scaffold' ),
		'priority'    => 30,
		'description' => 'Upload an alternate logo to replace the default site name and description',
	) );

	// Create a new section in the Theme Customizer
	$wp_customize->add_section( 'scaffold_org_identity_section' , array(
		'title'       => __( 'Organisation Identity', 'scaffold' ),
		'priority'    => 28,
		'description' => 'Add static information about your organisation',
	) );

	// Create a new section in the Theme Customizer
	$wp_customize->add_section( 'scaffold_org_social_media_section' , array(
		'title'       => __( 'Organisation Socials', 'scaffold' ),
		'priority'    => 29,
		'description' => 'Add socials for your organisation',
	) );

	// Register the new setting
	$wp_customize->add_setting( 'scaffold_logo' );
	$wp_customize->add_setting( 'scaffold_logo_alt' );
	// org identity
	$wp_customize->add_setting( 'scaffold_org_name', array(
	 'default'           => __( '', 'scaffold' ),
	 'sanitize_callback' => 'sanitize_text'
	));
	$wp_customize->add_setting( 'scaffold_org_email', array(
	 'default'           => __( '', 'scaffold' ),
	 'sanitize_callback' => 'sanitize_text'
	));
	$wp_customize->add_setting( 'scaffold_org_telephone', array(
	 'default'           => __( '', 'scaffold' ),
	 'sanitize_callback' => 'sanitize_telephone'
 	));
	// socials
	$wp_customize->add_setting( 'scaffold_org_facebook', array(
	 'default'           => __( '', 'scaffold' ),
	 'sanitize_callback' => 'sanitize_text'
	));
	$wp_customize->add_setting( 'scaffold_org_twitter', array(
	 'default'           => __( '', 'scaffold' ),
	 'sanitize_callback' => 'sanitize_text'
	));
	$wp_customize->add_setting( 'scaffold_org_linkedin', array(
	 'default'           => __( '', 'scaffold' ),
	 'sanitize_callback' => 'sanitize_text'
	));
	$wp_customize->add_setting( 'scaffold_org_youtube', array(
	 'default'           => __( '', 'scaffold' ),
	 'sanitize_callback' => 'sanitize_text'
	));
	$wp_customize->add_setting( 'scaffold_org_rss', array(
	 'default'           => true
	));

	// Tell Theme Customiser to let us use an image uploader
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'scaffold_logo', array(
		'label'    => __( 'Upload logo - should be 280px wide', 'scaffold' ),
		'section'  => 'scaffold_logo_section',
		'settings' => 'scaffold_logo',
	) ) );

	// Tell Theme Customiser to let us use an image uploader
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'scaffold_logo_alt', array(
		'label'    => __( 'Upload logo - should be 280px wide', 'scaffold' ),
		'section'  => 'scaffold_logo_alt_section',
		'settings' => 'scaffold_logo_alt',
	) ) );

	// Add org identity controls
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'scaffold_org_name', array(
		'label'    => __( 'Organisation Name', 'scaffold' ),
		'section'  => 'scaffold_org_identity_section',
		'settings' => 'scaffold_org_name',
		'type'     => 'text'
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'scaffold_org_email', array(
		'label'    => __( 'Email', 'scaffold' ),
		'section'  => 'scaffold_org_identity_section',
		'settings' => 'scaffold_org_email',
		'type'     => 'text'
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'scaffold_org_telephone', array(
		'label'    => __( 'Telephone', 'scaffold' ),
		'section'  => 'scaffold_org_identity_section',
		'settings' => 'scaffold_org_telephone',
		'type'     => 'text'
	) ) );
	// Add Socials controls
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'scaffold_org_facebook', array(
		'label'    => __( 'Facebook (page name)', 'scaffold' ),
		'section'  => 'scaffold_org_social_media_section',
		'settings' => 'scaffold_org_facebook',
		'type'     => 'text'
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'scaffold_org_twitter', array(
		'label'    => __( 'Twitter (username, no @)', 'scaffold' ),
		'section'  => 'scaffold_org_social_media_section',
		'settings' => 'scaffold_org_twitter',
		'type'     => 'text'
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'scaffold_org_linkedin', array(
		'label'    => __( 'LinkedIn (company ID)', 'scaffold' ),
		'section'  => 'scaffold_org_social_media_section',
		'settings' => 'scaffold_org_linkedin',
		'type'     => 'text'
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'scaffold_org_youtube', array(
		'label'    => __( 'YouTube (channel ID)', 'scaffold' ),
		'section'  => 'scaffold_org_social_media_section',
		'settings' => 'scaffold_org_youtube',
		'type'     => 'text'
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'scaffold_org_rss', array(
		'label'    => __( 'Show RSS feed link?', 'scaffold' ),
		'section'  => 'scaffold_org_social_media_section',
		'settings' => 'scaffold_org_rss',
		'type'     => 'checkbox'
	) ) );

}

	add_action( 'customize_register', 'scaffold_theme_customizer' );



/* 2. Custom BACKGROUND
----------------------------------------------

$args = array(
	'default-color' => 'fafafa',
);
add_theme_support( 'custom-background', $args );
 */

?>
