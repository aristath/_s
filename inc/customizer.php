<?php
/**
 * Shoestrap Theme Customizer.
 *
 * @package Shoestrap
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function shoestrap_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'shoestrap_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function shoestrap_customize_preview_js() {
	wp_enqueue_script( 'shoestrap_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'shoestrap_customize_preview_js' );

if ( class_exists( 'Kirki' ) ) {

	Kirki::add_config( 'shoestrap', array(
		'option_type' => 'theme_mod',
		'capability'  => 'edit_theme_options',
	) );

	Kirki::add_panel( 'shoestrap_header', array(
		'title' => esc_attr__( 'Header', 'shoestrap' ),
	) );

	Kirki::add_section( 'shoestrap_navigation', array(
		'title' => esc_attr__( 'Navigation', 'shoestrap' ),
		'panel' => 'shoestrap_header',
		'type'  => 'expanded',
	) );

	Kirki::add_panel( 'shoestrap_typography', array(
		'title' => esc_attr__( 'Typography', 'shoestrap' ),
	) );

	Kirki::add_section( 'shoestrap_typography_body', array(
		'title' => esc_attr__( 'Body Typography', 'shoestrap' ),
		'panel' => 'shoestrap_typography',
		'type'  => 'expanded',
	) );

	Kirki::add_panel( 'shoestrap_layout', array(
		'title' => esc_attr__( 'Layout', 'shoestrap' ),
	) );

	Kirki::add_section( 'shoestrap_layout_navbar', array(
		'title' => esc_attr__( 'NavBar', 'shoestrap' ),
		'panel' => 'shoestrap_layout',
		'type'  => 'expanded',
	) );

	Kirki::add_section( 'shoestrap_layout_content', array(
		'title' => esc_attr__( 'Content', 'shoestrap' ),
		'panel' => 'shoestrap_layout',
		'type'  => 'expanded',
	) );

	Kirki::add_field( 'shoestrap', array(
		'type'        => 'color-alpha',
		'settings'    => 'navbar_bg_color',
		'label'       => esc_attr__( 'Navbar Background Color', 'shoestrap' ),
		'section'     => 'shoestrap_navigation',
		'default'     => '#333333',
		'priority'    => 10,
		'output'      => array(
			array(
				'element'  => '#site-navigation',
				'property' => 'background-color',
			),
			array(
				'element'           => '#site-navigation a',
				'property'          => 'color',
				'sanitize_callback' => 'shoestrap_get_readable_color',
			),
			array(
				'element'           => '#site-navigation .active',
				'property'          => 'background-color',
				'sanitize_callback' => 'shoestrap_darken_5',
			),
		),
	) );

	Kirki::add_field( 'shoestrap', array(
		'type'        => 'typography',
		'settings'    => 'body_typography',
		'label'       => esc_attr__( 'Typography', 'shoestrap' ),
		'description' => esc_attr__( 'Controls the main typography of your site. Please note that this control affects all typography elemenents on your site.', 'shoestrap' ),
		'section'     => 'shoestrap_typography_body',
		'default'     => array(
			'font-family'    => 'Roboto',
			'font-size'      => '1em',
			'variant'        => '300',
			'line-height'    => '1.5',
			'letter-spacing' => '0',
			'color'          => '#333333',
		),
		'priority'    => 10,
		'choices'     => array(
			'font-family'    => true,
			'font-size'      => true,
			'font-weight'    => true,
			'line-height'    => true,
			'color'          => false,
		),
		'output' => array(
			array(
				'element' => 'body',
			),
		),
	) );

	Kirki::add_field( 'shoestrap', array(
		'type'        => 'radio-buttonset',
		'settings'    => 'navbar_container',
		'label'       => esc_attr__( 'Navbar Mode', 'shoestrap' ),
		'description' => esc_attr__( 'Select if the navbar should be boxed or fluid.', 'shoestrap' ),
		'section'     => 'shoestrap_layout_navbar',
		'default'     => 'container-fluid',
		'priority'    => 10,
		'choices'     => array(
			'container'       => esc_attr__( 'Boxed', 'shoestrap' ),
			'container-fluid' => esc_attr__( 'Fluid', 'shoestrap' ),
		),
	) );

	Kirki::add_field( 'shoestrap', array(
		'type'        => 'radio-buttonset',
		'settings'    => 'content_container',
		'label'       => esc_attr__( 'Content Mode', 'shoestrap' ),
		'description' => esc_attr__( 'Select if the content should be boxed or fluid.', 'shoestrap' ),
		'section'     => 'shoestrap_layout_content',
		'default'     => 'container',
		'priority'    => 10,
		'choices'     => array(
			'container'       => esc_attr__( 'Boxed', 'shoestrap' ),
			'container-fluid' => esc_attr__( 'Fluid', 'shoestrap' ),
		),
	) );


}
