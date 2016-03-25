<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sfch
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo get_bloginfo('template_directory'); ?>/css/theme.css">

<link rel="stylesheet" href="<?php echo get_bloginfo('template_directory'); ?>/js/owl.carousel/assets/owl.carousel.css">

<script src="<?php echo get_bloginfo('template_directory'); ?>/js/jquery-1.12.2.min.js"></script>
<script src="<?php echo get_bloginfo('template_directory'); ?>/js/owl.carousel/owl.carousel.min.js"></script>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'sfch' ); ?></a>
	
	<header id="masthead" class="site-header" role="banner">
		<div class="site-header-content">
			<div class="site-utility">
				<ul>
					<li class="phone"><a href="tel://6053302724" title="(605) 330-2724">(605) 330-2724</a></li>
					<li class="contact-us"><a href="" title="Contact Us">Contact Us</a></li>
					<li style="clear:both;"></li>
				</ul>
			</div>
			<div class="site-branding">
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>" rel="home"><img src="<?php bloginfo( 'template_url' ); ?>/images/logo.png" alt="<?php bloginfo( 'name' ); ?>" /></a></h1>
			</div><!-- .site-branding -->
			
			<div id="overlay"></div><div id="overlay-border"></div>
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"></button>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</nav><!-- #site-navigation -->
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
