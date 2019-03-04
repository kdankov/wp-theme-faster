<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Faster
 */

$tag_site_title = ( is_front_page() && is_home() ) ? 'h1' : 'p';
$faster_description = get_bloginfo( 'description', 'display' );

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

	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'faster' ); ?></a>

	<input type="checkbox" name="menu-toggle-input" id="menu-toggle-input" class="menu-toggle-input" />
	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php the_custom_logo(); ?>
			<<?php echo $tag_site_title; ?> class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></<?php echo $tag_site_title; ?>>
			<?php if ( $faster_description || is_customize_preview() ) : ?>
			<p class="site-description"><?php echo $faster_description; ?></p>
			<?php endif; ?>
		</div>

		<label for="menu-toggle-input" class="menu-toggle-label"><?php esc_html_e( 'Menu', 'faster' ); ?></label>
		<nav id="site-navigation" class="main-navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?>
		</nav>
	</header>

	<main id="main" class="site-content">
