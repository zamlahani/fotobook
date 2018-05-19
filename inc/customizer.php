<?php
/**
 * Fotobook Theme Customizer
 *
 * @package fotobook
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
if ( ! function_exists( 'understrap_customize_register' ) ) {
	/**
	 * Register basic customizer support.
	 *
	 * @param object $wp_customize Customizer reference.
	 */
	function understrap_customize_register( $wp_customize ) {
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	}
}
add_action( 'customize_register', 'understrap_customize_register' );

if ( ! function_exists( 'understrap_theme_customize_register' ) ) {
	/**
	 * Register individual settings through customizer's API.
	 *
	 * @param WP_Customize_Manager $wp_customize Customizer reference.
	 */
	function understrap_theme_customize_register( $wp_customize ) {

		// Theme layout settings.
		$wp_customize->add_section( 'understrap_theme_layout_options', array(
			'title'       => __( 'Theme Layout Settings', 'fotobook' ),
			'capability'  => 'edit_theme_options',
			'description' => __( 'Container width and sidebar defaults', 'fotobook' ),
			'priority'    => 160,
		) );

		 // select sanitization function.
        function understrap_theme_slug_sanitize_select( $input, $setting ){
         
            // input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only.
            $input = sanitize_key($input);
 
            // get the list of possible select options.
            $choices = $setting->manager->get_control( $setting->id )->choices;
                             
            // return input if valid or return default option.
            return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                
             
        }

		$wp_customize->add_setting( 'understrap_container_type', array(
			'default'           => 'container',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'understrap_theme_slug_sanitize_select',
			'capability'        => 'edit_theme_options',
		) );		

		$wp_customize->add_setting( 'understrap_sidebar_position', array(
			'default'           => 'right',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'sanitize_text_field',
			'capability'        => 'edit_theme_options',
		) );

		// Theme options.
		$wp_customize->add_panel( 'fotobook_theme_options', array(
			'title'       => __( 'Theme Options', 'fotobook' ),			
			'description' => __( 'Fotobook theme options', 'fotobook' ),					
		) );

		// Basic section.
		$wp_customize->add_section( 'fotobook_options_basic', array(
			'title'       => __( 'Basic', 'fotobook' ),			
			'description' => __( 'Telephone number, call to action, social links & footer logo', 'fotobook' ),
			'panel' => 'fotobook_theme_options',
		) );

		$wp_customize->add_setting( 'fotobook_telephone_number', array(				
			'sanitize_callback' => 'sanitize_text_field',		
			'default'			=> '+1-234-567-89'
		) );

		$wp_customize->add_control( 'fotobook_telephone_number', array(
  			'type' 				=> 'tel',
  			'section' 			=> 'fotobook_options_basic',
  			'label'				=> __( 'Telephone number', 'fotobook' ),
  			'description' 		=> __( 'Enter the telephone number for the link at the right side of the header. Use international format with a plus sign (+). Hyphens (-) are allowed.', 'fotobook' ),  
		) );

		$wp_customize->add_setting( 'fotobook_calltoaction_text', array(						
			'sanitize_callback' => 'sanitize_text_field',	
			'default'			=> 'Placeholder',		
		) );

		$wp_customize->add_control( 'fotobook_calltoaction_text', array(
  			'type' 				=> 'text',
  			'section' 			=> 'fotobook_options_basic',
  			'label'				=> __( 'Call to action text', 'fotobook' ),
		) );

		$wp_customize->add_setting( 'fotobook_calltoaction_url', array(			
			'sanitize_callback' => 'esc_url_raw',			
			'default'			=> '#',
		) );

		$wp_customize->add_control( 'fotobook_calltoaction_url', array(
  			'type' 				=> 'url',
  			'section' 			=> 'fotobook_options_basic',
  			'label'				=> __( 'Call to action URL', 'fotobook' ),
		) );

		$wp_customize->add_setting( 'fotobook_facebook_username', array(			
			'sanitize_callback' => 'sanitize_title',			
			'default'			=> 'Placeholder',
		) );

		$wp_customize->add_control( 'fotobook_facebook_username', array(
  			'type' 				=> 'url',
  			'section' 			=> 'fotobook_options_basic',
  			'label'				=> __( 'Facebook username', 'fotobook' ),
		) );

		$wp_customize->add_setting( 'fotobook_instagram_username', array(			
			'sanitize_callback' => 'sanitize_title',			
			'default'			=> 'Placeholder',
		) );

		$wp_customize->add_control( 'fotobook_instagram_username', array(
  			'type' 				=> 'url',
  			'section' 			=> 'fotobook_options_basic',
  			'label'				=> __( 'Instagram username (without @)', 'fotobook' ),
		) );

		$wp_customize->add_setting( 'fotobook_twitter_username', array(			
			'sanitize_callback' => 'sanitize_title',			
			'default'			=> 'Placeholder',
		) );

		$wp_customize->add_control( 'fotobook_twitter_username', array(
  			'type' 				=> 'url',
  			'section' 			=> 'fotobook_options_basic',
  			'label'				=> __( 'Twitter username (without @)', 'fotobook' ),
		) );

		$wp_customize->add_setting( 'fotobook_footer_logo_url', array(			
			'sanitize_callback' => 'esc_url_raw',	
			'default'			=> get_template_directory_uri().'/img/z_zamlahani.png',
		) );

		$wp_customize->add_control( 'fotobook_footer_logo_url', array(
  			'type' 				=> 'url',
  			'section' 			=> 'fotobook_options_basic',
  			'label'				=> __( 'Footer logo URL', 'fotobook' ),
		) );

		// Main Banner.
		$wp_customize->add_section( 'fotobook_options_banner', array(
			'title'       => __( 'Main Banner', 'fotobook' ),			
			'panel' => 'fotobook_theme_options',
		) );		
		
		$wp_customize->add_setting( 'fotobook_banner_url', array(						
			'sanitize_callback' => 'esc_url_raw',	
			'default'		=> get_template_directory_uri().'/img/main_banner-min.jpg',
		) );

		$wp_customize->add_control( 'fotobook_banner_url', array(
  			'type' 				=> 'url',
  			'section' 			=> 'fotobook_options_banner',
  			'label'				=> __( 'Image URL', 'fotobook' ),  			
		) );

		$wp_customize->add_setting( 'fotobook_banner_alt_text', array(						
			'sanitize_callback' => 'sanitize_text_field',						
		) );

		$wp_customize->add_control( 'fotobook_banner_alt_text', array(
  			'type' 				=> 'text',
  			'section' 			=> 'fotobook_options_banner',
  			'label'				=> __( 'Alt text', 'fotobook' ),  			
		) );

		$wp_customize->add_setting( 'fotobook_banner_title', array(						
			'sanitize_callback' => 'sanitize_text_field',			
			'default'			=> 'Placeholder',
		) );

		$wp_customize->add_control( 'fotobook_banner_title', array(
  			'type' 				=> 'text',
  			'section' 			=> 'fotobook_options_banner',
  			'label'				=> __( 'Title', 'fotobook' ),  			
		) );

		$wp_customize->add_setting( 'fotobook_banner_subtitle', array(						
			'sanitize_callback' => 'sanitize_text_field',			
			'default'			=> 'Placeholder',
		) );

		$wp_customize->add_control( 'fotobook_banner_subtitle', array(
  			'type' 				=> 'text',
  			'section' 			=> 'fotobook_options_banner',
  			'label'				=> __( 'Subtitle', 'fotobook' ),  			
		) );

		// Icon Box.
		$wp_customize->add_section( 'fotobook_options_iconbox', array(
			'title'       => __( 'Iconboxes', 'fotobook' ),			
			'panel' => 'fotobook_theme_options',
		) );

		for ($i=0; $i < 4 ; $i++) { 
		
		$wp_customize->add_setting( 'fotobook_icon_title_'.$i, array(						
			'sanitize_callback' => 'sanitize_text_field',		
			'default'			=> 'Placeholder',	
		) );

		$wp_customize->add_control( 'fotobook_icon_title_'.$i, array(
  			'type' 				=> 'text',  			
  			'section' 			=> 'fotobook_options_iconbox',
  			'label'				=> sprintf(__( 'Iconbox title %u', 'fotobook' ),$i+1),  			
		) );

		$wp_customize->add_setting( 'fotobook_icon_bg_'.$i, array(						
			'sanitize_callback' => 'sanitize_text_field',			
			'default'			=> 'wordpress',
		) );

		$wp_customize->add_control( 'fotobook_icon_bg_'.$i, array(
  			'type' 				=> 'text',
  			'section' 			=> 'fotobook_options_iconbox',
  			'label'				=> sprintf(__( 'Background icon %u', 'fotobook' ),$i+1),  			
		) );

		$wp_customize->add_setting( 'fotobook_icon_fg_'.$i, array(						
			'sanitize_callback' => 'sanitize_text_field',	
			'default'			=> 'font-awesome',		
		) );

		$wp_customize->add_control( 'fotobook_icon_fg_'.$i, array(
  			'type' 				=> 'text',
  			'section' 			=> 'fotobook_options_iconbox',
  			'label'				=> sprintf(__( 'Foreground icon %u', 'fotobook' ),$i+1),  			
		) );

		}

		// Image Box.
		$wp_customize->add_section( 'fotobook_options_imagebox', array(
			'title'       => __( 'Image Boxes', 'fotobook' ),			
			'panel' => 'fotobook_theme_options',
		) );

		$wp_customize->add_setting( 'fotobook_imagebox_section_title', array(						
			'sanitize_callback' => 'sanitize_text_field',		
			'default'			=> 'Placeholder',	
		) );

		$wp_customize->add_control( 'fotobook_imagebox_section_title', array(
  			'type' 				=> 'text',  			
  			'section' 			=> 'fotobook_options_imagebox',
  			'label'				=> __( 'Section title', 'fotobook' ),  			
		) );

		for ($i=0; $i < 3 ; $i++) { 
		
		$wp_customize->add_setting( 'fotobook_imagebox_title_'.$i, array(						
			'sanitize_callback' => 'sanitize_text_field',		
			'default'			=> 'Placeholder',	
		) );

		$wp_customize->add_control( 'fotobook_imagebox_title_'.$i, array(
  			'type' 				=> 'text',  			
  			'section' 			=> 'fotobook_options_imagebox',
  			'label'				=> sprintf(__( 'Image box title %u', 'fotobook' ),$i+1),  			
		) );

		$wp_customize->add_setting( 'fotobook_imagebox_description_'.$i, array(						
			'sanitize_callback' => 'sanitize_text_field',		
			'default'			=> 'Placeholder',	
		) );

		$wp_customize->add_control( 'fotobook_imagebox_description_'.$i, array(
  			'type' 				=> 'text',  			
  			'section' 			=> 'fotobook_options_imagebox',
  			'label'				=> sprintf(__( 'Image box description %u', 'fotobook' ),$i+1),  			
		) );

		$wp_customize->add_setting( 'fotobook_imagebox_url_'.$i, array(						
			'sanitize_callback' => 'esc_url_raw',						
			'default'			=> get_template_directory_uri().'/img/kitten-min.jpg'
		) );

		$wp_customize->add_control( 'fotobook_imagebox_url_'.$i, array(
  			'type' 				=> 'url',  			
  			'section' 			=> 'fotobook_options_imagebox',
  			'label'				=> sprintf(__( 'Image box URL %u', 'fotobook' ),$i+1),  			
		) );

		$wp_customize->add_setting( 'fotobook_imagebox_alttext_'.$i, array(						
			'sanitize_callback' => 'sanitize_text_field',					
		) );

		$wp_customize->add_control( 'fotobook_imagebox_alttext_'.$i, array(
  			'type' 				=> 'text',  			
  			'section' 			=> 'fotobook_options_imagebox',
  			'label'				=> sprintf(__( 'Image box alt text %u', 'fotobook' ),$i+1),  			
		) );

		}

		// Price Table.
		$wp_customize->add_section( 'fotobook_options_pricetable', array(
			'title'       => __( 'Pricetable', 'fotobook' ),			
			'panel' => 'fotobook_theme_options',
		) );

		$wp_customize->add_setting( 'fotobook_pricetable_section_title', array(						
			'sanitize_callback' => 'sanitize_text_field',		
			'default'			=> 'Placeholder',	
		) );

		$wp_customize->add_control( 'fotobook_pricetable_section_title', array(
  			'type' 				=> 'text',  			
  			'section' 			=> 'fotobook_options_pricetable',
  			'label'				=> __( 'Section title', 'fotobook' ),  			
		) );

		for ($i=0; $i < 3 ; $i++) { 
		
		$wp_customize->add_setting( 'fotobook_pricecolumn_title_'.$i, array(						
			'sanitize_callback' => 'sanitize_text_field',		
			'default'			=> 'Placeholder',	
		) );

		$wp_customize->add_control( 'fotobook_pricecolumn_title_'.$i, array(
  			'type' 				=> 'text',  			
  			'section' 			=> 'fotobook_options_pricetable',
  			'label'				=> sprintf(__( 'Column title %u', 'fotobook' ),$i+1),  			
		) );

		$wp_customize->add_setting( 'fotobook_pricecolumn_bestseller_'.$i, array(						
			'sanitize_callback' => 'sanitize_key',					
		) );

		$wp_customize->add_control( 'fotobook_pricecolumn_bestseller_'.$i, array(
  			'type' 				=> 'checkbox',  			
  			'section' 			=> 'fotobook_options_pricetable',
  			'label'				=> __( 'Bestseller?', 'fotobook' ),    			
  			
		) );

		$wp_customize->add_setting( 'fotobook_pricecolumn_features_'.$i, array(						
			'sanitize_callback' => 'sanitize_text_field',		
			'default'			=> 'feature 1,feature 2,feature 3 &times; 4',	
		) );

		$wp_customize->add_control( 'fotobook_pricecolumn_features_'.$i, array(
  			'type' 				=> 'text',  			
  			'section' 			=> 'fotobook_options_pricetable',
  			'label'				=> __( 'Features ', 'fotobook' ),  	
  			'description'		=> __('Separate features with commas. Accepts HTML entities.','fotobook')
		) );

		$wp_customize->add_setting( 'fotobook_pricecolumn_price_'.$i, array(						
			'sanitize_callback' => 'sanitize_text_field',		
			'default'			=> '123',				
		) );

		$wp_customize->add_control( 'fotobook_pricecolumn_price_'.$i, array(
  			'type' 				=> 'text',  			
  			'section' 			=> 'fotobook_options_pricetable',
  			'label'				=> __( 'Price ', 'fotobook' ),  	  			
		) );

		$wp_customize->add_setting( 'fotobook_pricecolumn_linktext_'.$i, array(						
			'sanitize_callback' => 'sanitize_text_field',	
			'default'			=> 'Placeholder',					
		) );

		$wp_customize->add_control( 'fotobook_pricecolumn_linktext_'.$i, array(
  			'type' 				=> 'text',  			
  			'section' 			=> 'fotobook_options_pricetable',
  			'label'				=> __( 'Link text ', 'fotobook' ),  	  			
		) );

		$wp_customize->add_setting( 'fotobook_pricecolumn_url_'.$i, array(						
			'sanitize_callback' => 'sanitize_text_field',	
			'default'			=> '#',					
		) );

		$wp_customize->add_control( 'fotobook_pricecolumn_url_'.$i, array(
  			'type' 				=> 'text',  			
  			'section' 			=> 'fotobook_options_pricetable',
  			'label'				=> __( 'URL ', 'fotobook' ),  	  			
		) );

		}

		// Testi.
		$wp_customize->add_section( 'fotobook_options_testimonials', array(
			'title'       => __( 'Testimonials', 'fotobook' ),			
			'panel' => 'fotobook_theme_options',
		) );

		$wp_customize->add_setting( 'fotobook_testimonial_section_title', array(						
			'sanitize_callback' => 'sanitize_text_field',		
			'default'			=> 'Placeholder',	
		) );

		$wp_customize->add_control( 'fotobook_testimonial_section_title', array(
  			'type' 				=> 'text',  			
  			'section' 			=> 'fotobook_options_testimonials',
  			'label'				=> __( 'Section title', 'fotobook' ),  			
		) );

		$wp_customize->add_setting( 'fotobook_testimonial_background', array(						
			'sanitize_callback' => 'esc_url_raw',			
			'default'			=> get_template_directory_uri().'/img/banner_2-min.jpg'
		) );

		$wp_customize->add_control( 'fotobook_testimonial_background', array(
  			'type' 				=> 'url',  			
  			'section' 			=> 'fotobook_options_testimonials',
  			'label'				=> __( 'Background image URL', 'fotobook' ),  			
		) );

		for ($i=0; $i < 2 ; $i++) { 
		
		$wp_customize->add_setting( 'fotobook_testimonial_name_'.$i, array(						
			'sanitize_callback' => 'sanitize_text_field',		
			'default'			=> 'Placeholder',	
		) );

		$wp_customize->add_control( 'fotobook_testimonial_name_'.$i, array(
  			'type' 				=> 'text',  			
  			'section' 			=> 'fotobook_options_testimonials',
  			'label'				=> sprintf(__( 'Name %u', 'fotobook' ),$i+1),  			
		) );

		$wp_customize->add_setting( 'fotobook_testimonial_job_'.$i, array(						
			'sanitize_callback' => 'sanitize_text_field',		
			'default'			=> 'Placeholder',	
		) );

		$wp_customize->add_control( 'fotobook_testimonial_job_'.$i, array(
  			'type' 				=> 'text',  			
  			'section' 			=> 'fotobook_options_testimonials',
  			'label'				=> __( 'Occupations', 'fotobook' ),  			
		) );

		$wp_customize->add_setting( 'fotobook_testimonial_comment_'.$i, array(						
			'sanitize_callback' => 'sanitize_text_field',		
			'default'			=> 'Placeholder',	
		) );

		$wp_customize->add_control( 'fotobook_testimonial_comment_'.$i, array(
  			'type' 				=> 'text',  			
  			'section' 			=> 'fotobook_options_testimonials',
  			'label'				=> __( 'Comments', 'fotobook' ),  			
		) );

		$wp_customize->add_setting( 'fotobook_testimonial_image_'.$i, array(						
			'sanitize_callback' => 'esc_url_raw',		
			'default'			=> get_template_directory_uri().'/img/isyana_square-min.jpg'
		) );

		$wp_customize->add_control( 'fotobook_testimonial_image_'.$i, array(
  			'type' 				=> 'url',  			
  			'section' 			=> 'fotobook_options_testimonials',
  			'label'				=> __( 'Image URL', 'fotobook' ),  			
		) );

		$wp_customize->add_setting( 'fotobook_testimonial_alttext_'.$i, array(						
			'sanitize_callback' => 'sanitize_text_field',			
		) );

		$wp_customize->add_control( 'fotobook_testimonial_alttext_'.$i, array(
  			'type' 				=> 'text',  			
  			'section' 			=> 'fotobook_options_testimonials',
  			'label'				=> __( 'Alt text', 'fotobook' ),  			
		) );

		}

		$wp_customize->add_setting( 'fotobook_testimonial_control_next', array(						
			'sanitize_callback' => 'sanitize_text_field',		
			'default'			=> 'Placeholder',	
		) );

		$wp_customize->add_control( 'fotobook_testimonial_control_next', array(
  			'type' 				=> 'text',  			
  			'section' 			=> 'fotobook_options_testimonials',
  			'label'				=> __( 'Next', 'fotobook' ), 
  			'description'		=> __( 'Link text to slide to the next testimonial.', 'fotobook') 			
		) );

		$wp_customize->add_setting( 'fotobook_testimonial_control_prev', array(						
			'sanitize_callback' => 'sanitize_text_field',		
			'default'			=> 'Placeholder',	
		) );

		$wp_customize->add_control( 'fotobook_testimonial_control_prev', array(
  			'type' 				=> 'text',  			
  			'section' 			=> 'fotobook_options_testimonials',
  			'label'				=> __( 'Previous', 'fotobook' ), 
  			'description'		=> __( 'Link text to slide to the previous testimonial.', 'fotobook') 			
		) );

		// Bottom card.
		$wp_customize->add_section( 'fotobook_options_bottom_cards', array(
			'title'       => __( 'Bottom cards', 'fotobook' ),			
			'panel' => 'fotobook_theme_options',
		) );

		for ($i=0; $i < 3 ; $i++) { 
		
		$wp_customize->add_setting( 'fotobook_bottom_card_title_'.$i, array(						
			'sanitize_callback' => 'sanitize_text_field',		
			'default'			=> 'Placeholder',	
		) );

		$wp_customize->add_control( 'fotobook_bottom_card_title_'.$i, array(
  			'type' 				=> 'text',  			
  			'section' 			=> 'fotobook_options_bottom_cards',
  			'label'				=> sprintf(__( 'Bottom card title %u', 'fotobook' ),$i+1),   			
		) );

		$wp_customize->add_setting( 'fotobook_bottom_card_text_'.$i, array(						
			'sanitize_callback' => 'wp_filter_post_kses',		
			'default'			=> 'Line 1<br>Line 2 <b>bold</b>:<ul><li>list item 1</li><li>list item 2</li></ul>',	
		) );

		$wp_customize->add_control( 'fotobook_bottom_card_text_'.$i, array(
  			'type' 				=> 'textarea',  			
  			'section' 			=> 'fotobook_options_bottom_cards',
  			'label'				=> __( 'Bottom card text', 'fotobook' ),   	
  			'description'		=> __('You can use HTML tags', 'fotobook')		
		) );

		}
		
	}
} // endif function_exists( 'understrap_theme_customize_register' ).
add_action( 'customize_register', 'understrap_theme_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
if ( ! function_exists( 'understrap_customize_preview_js' ) ) {
	/**
	 * Setup JS integration for live previewing.
	 */
	function understrap_customize_preview_js() {
		wp_enqueue_script( 'understrap_customizer', get_template_directory_uri() . '/js/customizer.js',
			array( 'customize-preview' ), '20130508', true );
	}
}
add_action( 'customize_preview_init', 'understrap_customize_preview_js' );
