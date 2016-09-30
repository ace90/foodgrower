<?php
/**
 * foodgrower Customizer Class
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Foodgrower_Customizer' ) ) :

	class Foodgrower_Customizer {

		public function __construct() {
			add_action( 'customize_preview_init', array( $this, 'customize_preview_js' ), 11 );
			add_action( 'customize_register',  array( $this, 'customize_register' ), 11 );
			add_action( 'wp_enqueue_scripts',  array( $this, 'add_customizer_css' ), 120 );


			add_action( 'after_switch_theme',  array( $this, 'set_foodgrower_style_theme_mods' ) );
			add_action( 'customize_save_after', array( $this, 'set_foodgrower_style_theme_mods' ) );
		}


		public function customize_register( $wp_customize ) {
			
			$wp_customize->remove_section( 'header_image' );
			$wp_customize->remove_section( 'background_image' );
			$wp_customize->remove_section( 'colors' );
			/**
			 * Add the typography section
		     */
			$wp_customize->add_section( 'foodgrower_background' , array(
				'title'      			=> __( 'Background', 'foodgrower' ),
				'priority'   			=> 10,
			) );

			/**
			 * Heading color
			 */
			$wp_customize->add_setting( 'foodgrower_heading_color', array(
				'default'           	=> apply_filters( 'foodgrower_default_heading_color', '#f6f6f6' ),
				'sanitize_callback' 	=> 'sanitize_hex_color',
				'transport'				=> 'postMessage',
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'food_heading_color_heading_color', array(
				'label'	   				=> __( 'Heading color', 'foodgrower' ),
				'section'  				=> 'foodgrower_background',
				'settings' 				=> 'foodgrower_heading_color',
				'priority' 				=> 20,
			) ) );

			/**
			 * Body Color
			 */
			$wp_customize->add_setting( 'foodgrower_body_color', array(
				'default'           	=> apply_filters( 'food_default_body_color', '#f6f6f6' ),
				'sanitize_callback' 	=> 'sanitize_hex_color',
				'transport'				=> 'postMessage',
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'foodgrower_body_color', array(
				'label'					=> __( 'Background color', 'foodgrower' ),
				'section'				=> 'foodgrower_background',
				'settings'				=> 'foodgrower_body_color',
				'priority'				=> 30,
			) ) );


			/**
			 * Add logo
		     */
			$wp_customize->add_section( 'foodgrower_logo' , array(
				'title'      			=> __( 'Logo', 'foodgrower' ),
				'priority'   			=> 3,
			) );

			$wp_customize->add_setting( 'foodgrower_image_upload' );

			$wp_customize->add_control(
			    new WP_Customize_Image_Control(
			        $wp_customize,
			        'foodgrower_image_upload',
			        array(
			            'label' => 'Image Upload',
			            'section' => 'foodgrower_logo',
			            'settings' => 'foodgrower_image_upload'
			        )
			    )
			);
		}

		/**
		 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
		 *
		 * @since  1.0.0
		 */
		public function customize_preview_js() {
			wp_enqueue_script( 'foodgrower-customizer', get_stylesheet_directory_uri() . '/assets/js/customizer.min.js', array( 'jquery' ), '1.2', true );
		}


		public function get_css(){

			$styles="
			.customize-support{
				background-color:".get_theme_mod( 'foodgrower_body_color' ).";
			}
			body .site-header{
				background-color:".get_theme_mod( 'foodgrower_heading_color' )."!important;
			}";
			return apply_filters( 'foodgrower_customizer_css', $styles );
		}

		/**
		 * Add CSS in <head> for styles handled by the theme customizer
		 * If the Customizer is active pull in the raw css. Otherwise pull in the prepared theme_mods if they exist.
		 *
		 */
		public function add_customizer_css() {
			
				//wp_add_inline_style( 'foodgrower-style', $this->get_css() );

			$storefront_styles  = get_theme_mod( 'foodgrower_styles' );		
			wp_add_inline_style( 'foodgrower-style', $this->get_css() );				
		}


		public function set_foodgrower_style_theme_mods() {
			set_theme_mod( 'foodgrower_styles', $this->get_css() );
		}
	}
endif;



return new Foodgrower_Customizer();