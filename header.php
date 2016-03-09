<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package artist_website
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> ng-app="wpArtistTheme">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'deslauriers' ); ?></a>
  
	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">

			<h1 class="site-title"><a href="/" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
			endif; ?>

			<div class="language-menu"><?php get_sidebar(); ?></div>
		</div><!-- .site-branding -->
            <?php if ( has_nav_menu( 'primary' ) ) : ?>
            <nav id="site-navigation" class="main-navigation" role="navigation">
                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'artist-website' ); ?></button>
                <?php wp_nav_menu( array( 
                    'theme_location' => 'primary',
                    'menu_class'     => 'nav-menu',
                    'menu_id' => 'primary-menu',
                    'depth' => 2
                    ) ); ?>
            </nav><!-- #site-navigation -->
            <?php endif; ?>
	</header><!-- #masthead -->
	<div id="content" class="container site-content">
