<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Shoestrap
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'shoestrap' ); ?></a>

	<header id="masthead" class="<?php echo apply_filters( 'shoestrap/layout/navbar/class', 'site-header' ); ?>" role="banner">
		<nav id="site-navigation" class="navbar main-navigation" role="navigation">
			<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>

			<?php wp_nav_menu( array(
				'menu'              => 'primary',
				'theme_location'    => 'primary',
				'menu_id'           => 'primary-menu',
				'depth'             => 2,
				'container'         => '',
				// 'container_class'   => 'navbar',
				'container_id'      => '',
				'menu_class'        => 'nav nav-pills',
				'fallback_cb'       => 'Shoestrap_Navwalker::fallback',
				'walker'            => new Shoestrap_Navwalker())
			);
			// wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="<?php echo apply_filters( 'shoestrap/layout/content/class', 'site-content' ); ?>">
