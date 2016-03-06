<?php

function shoestrap_get_readable_color( $background ) {
	$color = ariColor::newColor( $background );
	return ( 127 < $color->luminance ) ? '#222222' : '#FFFFFF';
}

function shoestrap_darken_5( $background ) {
	$color = ariColor::newColor( $background );
	return $color->getNew( 'lightness', $color->lightness - 5 )->toCSS( 'rgba' );
}
