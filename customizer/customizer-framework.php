<?php

/*
  Plugin Name: WPshed Customizer
  Plugin URI: http://wpshed.com/
  Description: Create an easy to use customizer section for your WordPress theme.
  Version: 1.1
  Author: Stefan I.
  Author URI: http://istefan.me/
  License: GNU General Public License v2 or later
  License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */


/**
 * This function defines the WPC constants
 */
define( 'WPC_DIR', trailingslashit( get_template_directory() ) . basename( dirname( __FILE__ ) ) );
define( 'WPC_URL', trailingslashit( get_template_directory_uri() ) . basename( dirname( __FILE__ ) ) );

define( 'WPC_THEME_CUSTOMIZER', trailingslashit( WPC_DIR ) . 'customizer.php' );
define( 'WPC_THEME_CUSTOMIZER_SAMPLE', trailingslashit( WPC_DIR ) . 'customizer-marvy.php' );


/**
 * Rewuire custom control class
 */
require_once trailingslashit( WPC_DIR ) . 'inc/class-wp-customize-control.php';

/**
 * Detect support for Customizer panels.
 * This feature was introduced in WP 4.0.
 *
 * @return bool.
 */
function wpc_panel_support() {
	return ( class_exists( 'WP_Customize_Manager' ) && method_exists( 'WP_Customize_Manager', 'add_panel' ) ) || function_exists( 'wp_validate_boolean' );
}

/**
 * Define WPC settings file
 */
function wpc_customizer_file() {

	if ( file_exists( WPC_THEME_CUSTOMIZER ) ) {
		$customizer_options = WPC_THEME_CUSTOMIZER;
	} else {
		$customizer_options = WPC_THEME_CUSTOMIZER_SAMPLE;
	}

	return $customizer_options;
}

/**
 * Register WPC Settings.
 */
function wpc_register_settings() {

	require_once wpc_customizer_file();

	foreach ( $options as $option ) {
		if ( $option[ 'type' ] != 'panel' && $option[ 'type' ] != 'section' ) {
			if ( !get_option( $option[ 'id' ] ) ) {
				update_option( $option[ 'id' ], $option[ 'default' ] );
			}
		}
	}
}

add_action( 'after_switch_theme', 'wpc_register_settings' );

/**
 * Define WPC settings file
 */
function wpc_customizer_register( $wp_customize ) {

	// Require customizer options file
	require_once wpc_customizer_file();

	$type = 'option'; // option / theme_mod

	$i = 0;
	foreach ( $options as $option ) {

		// Add panel - WP 4.0+ only
		if ( $option[ 'type' ] == 'panel' && wpc_panel_support() ) {

			$priority		 = ( isset( $option[ 'priority' ] ) ) ? $option[ 'priority' ] : $i + 10;
			$theme_supports	 = ( isset( $option[ 'theme_supports' ] ) ) ? $option[ 'theme_supports' ] : '';
			$title			 = ( isset( $option[ 'title' ] ) ) ? esc_attr( $option[ 'title' ] ) : __( 'Untitled Panel', 'marvy' );
			$description	 = ( isset( $option[ 'description' ] ) ) ? esc_attr( $option[ 'description' ] ) : '';

			$wp_customize->add_panel( $option[ 'id' ], array(
				'priority'		 => $priority,
				'capability'	 => $capability,
				'theme_supports' => $theme_supports,
				'title'			 => $title,
				'description'	 => $description,
			) );
		}

		// Add sections
		if ( $option[ 'type' ] == 'section' ) {

			$priority		 = ( isset( $option[ 'priority' ] ) ) ? $option[ 'priority' ] : $i + 10;
			$theme_supports	 = ( isset( $option[ 'theme_supports' ] ) ) ? $option[ 'theme_supports' ] : '';
			$title			 = ( isset( $option[ 'title' ] ) ) ? esc_attr( $option[ 'title' ] ) : __( 'Untitled Section', 'marvy' );
			$description	 = ( isset( $option[ 'description' ] ) ) ? esc_attr( $option[ 'description' ] ) : '';
			$panel			 = ( isset( $option[ 'panel' ] ) ) ? esc_attr( $option[ 'panel' ] ) : '';

			$wp_customize->add_section( esc_attr( $option[ 'id' ] ), array(
				'priority'		 => $priority,
				'capability'	 => $capability,
				'theme_supports' => $theme_supports,
				'title'			 => $title,
				'description'	 => $description,
				'panel'			 => $panel,
			) );
		}

		// Add controls
		if ( $option[ 'type' ] == 'control' ) {

			$priority			 = ( isset( $option[ 'priority' ] ) ) ? $option[ 'priority' ] : $i + 10;
			$section			 = ( isset( $option[ 'section' ] ) ) ? esc_attr( $option[ 'section' ] ) : '';
			$default			 = ( isset( $option[ 'default' ] ) ) ? $option[ 'default' ] : '';
			$transport			 = ( isset( $option[ 'transport' ] ) ) ? esc_attr( $option[ 'transport' ] ) : 'refresh';
			$title				 = ( isset( $option[ 'title' ] ) ) ? esc_attr( $option[ 'title' ] ) : __( 'Untitled Section', 'marvy' );
			$description		 = ( isset( $option[ 'description' ] ) ) ? esc_attr( $option[ 'description' ] ) : '';
			$form_field			 = ( isset( $option[ 'option' ] ) ) ? esc_attr( $option[ 'option' ] ) : 'option';
			$sanitize_callback	 = ( isset( $option[ 'sanitize_callback' ] ) ) ? esc_attr( $option[ 'sanitize_callback' ] ) : '';

			// Add control settings
			$wp_customize->add_setting( esc_attr( $option[ 'id' ] ), array(
				'default'			 => $default,
				'type'				 => $type,
				'capability'		 => $capability,
				'transport'			 => $transport,
				'sanitize_callback'	 => $sanitize_callback,
			) );

			// Add form field
			switch ( $form_field ) {

				// URL Field
				case 'url':
					$wp_customize->add_control( esc_attr( $option[ 'id' ] ), array(
						'type'			 => 'url',
						'priority'		 => $priority,
						'section'		 => $section,
						'label'			 => $title,
						'description'	 => $description,
					) );
					break;

				// URL Field
				case 'email':
					$wp_customize->add_control( esc_attr( $option[ 'id' ] ), array(
						'type'			 => 'email',
						'priority'		 => $priority,
						'section'		 => $section,
						'label'			 => $title,
						'description'	 => $description,
					) );
					break;

				// Password Field
				case 'password':
					$wp_customize->add_control( esc_attr( $option[ 'id' ] ), array(
						'type'			 => 'password',
						'priority'		 => $priority,
						'section'		 => $section,
						'label'			 => $title,
						'description'	 => $description,
					) );
					break;

				// Range Field
				case 'range':
					$input_attrs = ( isset( $option[ 'input_attrs' ] ) ) ? $option[ 'input_attrs' ] : array();

					$wp_customize->add_control( esc_attr( $option[ 'id' ] ), array(
						'type'			 => 'range',
						'priority'		 => $priority,
						'section'		 => $section,
						'label'			 => $title,
						'description'	 => $description,
						'input_attrs'	 => $input_attrs,
					) );
					break;

				// Text Field
				case 'text':
					$wp_customize->add_control( esc_attr( $option[ 'id' ] ), array(
						'type'			 => 'text',
						'priority'		 => $priority,
						'section'		 => $section,
						'label'			 => $title,
						'description'	 => $description,
					) );
					break;

				// Radio Field
				case 'radio':
					$choices = ( isset( $option[ 'choices' ] ) ) ? $option[ 'choices' ] : array();

					$wp_customize->add_control( esc_attr( $option[ 'id' ] ), array(
						'type'			 => 'radio',
						'priority'		 => $priority,
						'section'		 => $section,
						'label'			 => $title,
						'description'	 => $description,
						'choices'		 => $choices,
					) );
					break;

				// Checkbox Field
				case 'checkbox':
					$wp_customize->add_control( esc_attr( $option[ 'id' ] ), array(
						'type'			 => 'checkbox',
						'priority'		 => $priority,
						'section'		 => $section,
						'label'			 => $title,
						'description'	 => $description,
					) );
					break;

				// Radio Field
				case 'select':
					$choices = ( isset( $option[ 'choices' ] ) ) ? $option[ 'choices' ] : array();

					$wp_customize->add_control( esc_attr( $option[ 'id' ] ), array(
						'type'			 => 'select',
						'priority'		 => $priority,
						'section'		 => $section,
						'label'			 => $title,
						'description'	 => $description,
						'choices'		 => $choices,
					) );
					break;

				// Image Upload Field
				case 'image':
					$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, esc_attr( $option[ 'id' ] ), array(
						'priority'		 => $priority,
						'section'		 => $section,
						'label'			 => $title,
						'description'	 => $description,
					) ) );
					break;

				// File Upload Field
				case 'file':
					$wp_customize->add_control( new WP_Customize_Upload_Control( $wp_customize, esc_attr( $option[ 'id' ] ), array(
						'priority'		 => $priority,
						'section'		 => $section,
						'label'			 => $title,
						'description'	 => $description,
					) ) );
					break;

				// Color Picker Field
				case 'color':
					$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, esc_attr( $option[ 'id' ] ), array(
						'priority'		 => $priority,
						'section'		 => $section,
						'label'			 => $title,
						'description'	 => $description,
					) ) );
					break;

				// Pages Field
				case 'pages':
					$wp_customize->add_control( esc_attr( $option[ 'id' ] ), array(
						'type'			 => 'dropdown-pages',
						'priority'		 => $priority,
						'section'		 => $section,
						'label'			 => $title,
						'description'	 => $description,
					) );
					break;

				// Categories Field
				case 'categories':
					$wp_customize->add_control( new WPC_Customize_Categories_Control( $wp_customize, esc_attr( $option[ 'id' ] ), array(
						'priority'		 => $priority,
						'section'		 => $section,
						'label'			 => $title,
						'description'	 => $description,
					) ) );
					break;

				// Menus Field
				case 'menus':
					$wp_customize->add_control( new WPC_Customize_Menus_Control( $wp_customize, esc_attr( $option[ 'id' ] ), array(
						'priority'		 => $priority,
						'section'		 => $section,
						'label'			 => $title,
						'description'	 => $description,
					) ) );
					break;

				// Users Field
				case 'users':
					$wp_customize->add_control( new WPC_Customize_Users_Control( $wp_customize, esc_attr( $option[ 'id' ] ), array(
						'priority'		 => $priority,
						'section'		 => $section,
						'label'			 => $title,
						'description'	 => $description,
					) ) );
					break;

				// Posts Field
				case 'posts':
					$wp_customize->add_control( new WPC_Customize_Posts_Control( $wp_customize, esc_attr( $option[ 'id' ] ), array(
						'priority'		 => $priority,
						'section'		 => $section,
						'label'			 => $title,
						'description'	 => $description,
					) ) );
					break;

				// Post Types Field
				case 'post_types':
					$wp_customize->add_control( new WPC_Customize_Post_Type_Control( $wp_customize, esc_attr( $option[ 'id' ] ), array(
						'priority'		 => $priority,
						'section'		 => $section,
						'label'			 => $title,
						'description'	 => $description,
					) ) );
					break;

				// Tags Field
				case 'tags':
					$wp_customize->add_control( new WPC_Customize_Tags_Control( $wp_customize, esc_attr( $option[ 'id' ] ), array(
						'priority'		 => $priority,
						'section'		 => $section,
						'label'			 => $title,
						'description'	 => $description,
					) ) );
					break;
			}
		}
	}
}

add_action( 'customize_register', 'wpc_customizer_register' );
