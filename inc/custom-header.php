<?php
/**
 * Custom header setup.
 *
 * @package fotobook
 */

function understrap_custom_header_setup() {

	/**
	 * Filter UnderStrap custom-header support arguments.
	 *
	 * @since UnderStrap 0.5.2
	 *
	 * @param array $args {
	 *     An array of custom-header support arguments.
	 *
	 *     @type string $default-image     		Default image of the header.
	 *     @type string $default_text_color     Default color of the header text.
	 *     @type int    $width                  Width in pixels of the custom header image. Default 954.
	 *     @type int    $height                 Height in pixels of the custom header image. Default 1300.
	 *     @type string $wp-head-callback       Callback function used to styles the header image and text
	 *                                          displayed on the blog.
	 *     @type string $flex-height     		Flex support for height of header.
	 * }
	 */
	add_theme_support( 'custom-header', apply_filters( 'understrap_custom_header_args', array(
		'default-image'      => get_parent_theme_file_uri( '/img/main_banner-min.jpg' ),
		'width'              => 1520,
		'height'             => 548,
		'flex-height'        => true,
	) ) );

	register_default_headers( array(
		'default-image' => array(
			'url'           => '%s/img/main_banner-min.jpg',
			'thumbnail_url' => '%s/img/main_banner-min.jpg',
			'description'   => __( 'Default Header Image', 'fotobook' ),
		),
	) );
}
add_action( 'after_setup_theme', 'understrap_custom_header_setup' );
