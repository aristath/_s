<?php

class Shoestrap_Layout {

	public function __construct() {

		add_filter( 'body_class', array( $this, 'body_class' ) );
		add_filter( 'shoestrap/layout/navbar/class', array( $this, 'navbar_class' ) );
		add_filter( 'shoestrap/layout/content/class', array( $this, 'content_class' ) );

	}

	public function body_class( $classes ) {
		return $classes;
	}

	public function navbar_class( $classes ) {
		return $classes . ' ' . get_theme_mod( 'navbar_container', 'container-fluid' );
	}

	public function content_class( $classes ) {
		return $classes . ' ' . get_theme_mod( 'content_container', 'container' );
	}

}
new Shoestrap_Layout();
