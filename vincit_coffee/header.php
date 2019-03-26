<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package vincit_coffee
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<!-- <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'vincit_coffee' ); ?></a> -->

	<header id="masthead" class="bg-dark">
		<div class="text-center"><img src="http://localhost:8080/vincit/wp-content/uploads/2018/08/white-logo.png" width="100" alt="vincit-logo" class="p-2"></div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
