<?php

class Shoestrap_Layout {

	public function __construct() {

		add_filter( 'body_class', array( $this, 'body_class' ) );

	}

	public function body_class( $classes ) {

		$classes[] = 'container';

		return $classes;

	}

}
new Shoestrap_Layout();
