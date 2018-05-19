<?php
/**
 * Understrap enqueue scripts
 *
 * @package understrap
 */

if ( ! function_exists( 'understrap_scripts' ) ) {
	/**
	 * Load theme's JavaScript sources.
	 */
	function understrap_scripts() {
		// Get the theme data.
		$the_theme = wp_get_theme();
		
		wp_enqueue_style( 'understrap-styles', get_stylesheet_directory_uri() . '/css/theme.min.new.css', array(), $the_theme->get( 'Version' ), false );
		wp_enqueue_script( 'jquery');
		wp_enqueue_script( 'popper-scripts', get_template_directory_uri() . '/js/popper.min.js', array(), true);
		wp_enqueue_script( 'understrap-scripts', get_template_directory_uri() . '/js/theme.min.js', array(), $the_theme->get( 'Version' ), true );
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		wp_enqueue_script('jquery-mmenu-scripts',get_template_directory_uri().'/js/jquery.mmenu.js',array(),true);
		wp_enqueue_style('mmenu-styles', get_stylesheet_directory_uri() . '/css/jquery.mmenu.css', array(), true);
		wp_enqueue_script('jquery-mmenu-fixedelements-scripts',get_template_directory_uri().'/js/jquery.mmenu.fixedelements.js',array(),true);		
		// wp_enqueue_script( 'fotobook-effects-scripts', get_template_directory_uri() . '/js/effects.js', array(), true,true);
		wp_enqueue_style( 'hamburgers-styles', get_stylesheet_directory_uri() . '/css/hamburger.min.new.css', array(), true);
		wp_enqueue_style( 'mmenu-dim-styles', get_stylesheet_directory_uri() . '/css/jquery.mmenu.pagedim.css', array(), true);
	}
} // endif function_exists( 'understrap_scripts' ).

add_action( 'wp_enqueue_scripts', 'understrap_scripts' );
