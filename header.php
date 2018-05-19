<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package fotobook
 */

$container = get_theme_mod( 'understrap_container_type' );
$telno  = get_theme_mod( 'fotobook_telephone_number', '+1-234-567-89' );

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php wp_nav_menu(
				array(
						'theme_location'  => 'primary',
						'container'    	  => 'nav',						
						'container_id'    => 'fotobook-menu',						
						'menu_id'         => 'main-menu',						
				)
			); ?>
 
<div id="fotobook-page"> <!-- jquery mmenu page wrapper -->

<div class="hfeed site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	<header class="wrapper-fluid wrapper-navbar fixed-top mm-fixed" id="wrapper-navbar">

		<a class="skip-link screen-reader-text sr-only" href="#content"><?php esc_html_e( 'Skip to content',
		'fotobook' ); ?></a>

		<div class="navbar navbar-light bg-white py-3">
			
			<button class="hamburger-toggler hamburger hamburger--spin ml-auto d-none d-xl-inline-block" type="button">
   				<span class="hamburger-box">
      				<span class="hamburger-inner"></span>
   				</span>
			</button>
		
			<div class="container">
		
				<div>
					<button class="hamburger-toggler hamburger hamburger--spin d-xl-none" type="button">
   				<span class="hamburger-box">
      				<span class="hamburger-inner"></span>
   				</span>
			</button>
					<!-- Your site title as branding in the menu -->
					<?php if ( ! has_custom_logo() ) { ?>

						<?php if ( is_front_page() && is_home() ) : ?>

							<h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr_e( 'Home','fotobook' ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
							
						<?php else : ?>

							<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr_e( 'Home','fotobook' ); ?>"><?php bloginfo( 'name' ); ?></a>
						
						<?php endif; ?>
						
					
					<?php } else { ?>

						<?php if ( is_front_page() && is_home() ) : ?>
							
							<!-- Tag h1 di home untuk keperluan SEO -->
							<h1 class="text-hide"><?php bloginfo( 'name' ); ?></h1>

						<?php endif; ?>

						<?php the_custom_logo(); ?>

					<?php } ?><!-- end custom logo -->
				</div>		
				<div>
				<a href="tel:<?php echo ($telno); ?>" class="btn btn-secondary px-5 tel d-none d-sm-inline-block"><?php echo esc_html($telno); ?></a>				
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>?s=keywords" class="btn btn-outline-dark mr-auto border-0 d-xl-none">
				<i class="fa fa-search" aria-hidden="true"></i>
				</a>
				</div>
			
			</div><!-- .container -->

			<a href="<?php echo esc_url( home_url( '/' ) ); ?>?s=keywords" class="btn btn-outline-dark mr-auto border-0 d-none d-xl-inline-block">
				<i class="fa fa-search" aria-hidden="true"></i>
			</a>			

		</div><!-- .site-navigation -->

	</header><!-- .wrapper-navbar end -->
