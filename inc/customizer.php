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
		'title' => esc_attr__( 'Header', 'kirki-demo' ),
	) );

	Kirki::add_section( 'shoestrap_navigation', array(
		'title' => esc_attr__( 'Navigation', 'kirki-demo' ),
		'panel' => 'shoestrap_header',
		'type'  => 'expanded',
	) );

	Kirki::add_field( 'shoestrap', array(
		'type'        => 'color-alpha',
		'settings'    => 'navbar_bg_color',
		'label'       => esc_attr__( 'Navbar Background Color', 'kirki' ),
		'section'     => 'shoestrap_navigation',
		'default'     => '#333333',
		'priority'    => 10,
		'output'      => array(
			array(
				'element'  => '#site-navigation',
				'property' => 'background-color',
			),
		),
	) );

}
