<?php

/**
 * WPshed Customizer
 */
/** The short name gives a unique element to each options id. */
$shortname = 'marvy_';

// User access level
$capability = 'edit_theme_options';

/**
 * Here we will set the options we are going to have in the customizer.
 */
$options = array(); // If you delete this line, the sky will fall down! So you better don't.


/* ---------------------------------------------------------------------------------------------------
  Panels (optional - WP 4.0+ only)
  --------------------------------------------------------------------------------------------------- */

$options[] = array(
	'title' => __( 'Home Page', 'marvy' ), // Panel name
	//'description' => __( 'Home page settings.', 'marvy' ), // Panel description
	'id' => 'home_panel', // unique ID
	'priority' => 10,
	'theme_supports' => '',
	'type' => 'panel'
);

/* ---------------------------------------------------------------------------------------------------
  Sections
  --------------------------------------------------------------------------------------------------- */

$options[] = array(
	'title' => __( 'Header Banner', 'marvy' ), // Section name
	//'description' => __( 'Header banner settings.', 'marvy' ), // Section description
	'panel' => 'home_panel', // panel
	'id' => 'home_banner_section', // unique ID
	'theme_supports' => '',
	'type' => 'section'
);

$options[] = array(
	'title' => __( 'About Content', 'marvy' ), // Section name
	//'description' => __( 'Header banner settings.', 'marvy' ), // Section description
	'panel' => 'home_panel', // panel
	'id' => 'home_about_content', // unique ID
	'theme_supports' => '',
	'type' => 'section'
);

$options[] = array(
	'title' => __( 'Feature Pages', 'marvy' ), // Section name
	//'description' => __( 'Header banner settings.', 'marvy' ), // Section description
	'panel' => 'home_panel', // panel
	'id' => 'home_feature_pages', // unique ID
	'theme_supports' => '',
	'type' => 'section'
);

$options[] = array(
	'title' => __( 'Marvy Features', 'marvy' ), // Section name
	//'description' => __( 'Header banner settings.', 'marvy' ), // Section description
	'panel' => 'home_panel', // panel
	'id' => 'home_theme_features', // unique ID
	'theme_supports' => '',
	'type' => 'section'
);

$options[] = array(
	'title' => __( 'Latest Blog', 'marvy' ), // Section name
	//'description' => __( 'Header banner settings.', 'marvy' ), // Section description
	'panel' => 'home_panel', // panel
	'id' => 'home_latest_blog', // unique ID
	'theme_supports' => '',
	'type' => 'section'
);

/* ---------------------------------------------------------------------------------------------------
  Controls
  --------------------------------------------------------------------------------------------------- */

/*
 * Home Banner Options
 */

// Home page banner background
$options[] = array(
	'title' => __( 'Background', 'marvy' ), // Control label
	'description' => '', // Control description
	'section' => 'home_banner_section', // section
	'id' => 'home_banner_bg_color', // unique ID
	'default' => '#ee6e73', // HEX
	'option' => 'color',
	'sanitize_callback' => '',
	'type' => 'control',
		//'transport' => 'postMessage'
);

// Home page banner content
$options[] = array(
	'title' => __( 'Content', 'marvy' ), // Control label
	'description' => '', // Control description
	'section' => 'home_banner_section', // section
	'id' => 'home_banner_text', // unique ID
	'default' => 'Welcome to Marvy<br> WordPress Theme with <strong>Customizer</strong> options',
	'option' => 'textarea',
	'sanitize_callback' => 'esc_textarea',
	'type' => 'control'
);

// Banner button text
$options[] = array(
	'title' => __( 'Button Text', 'marvy' ), // Control label
	'description' => '', // Control description
	'section' => 'home_banner_section', // section
	'id' => 'home_banner_button_text', // unique ID
	'default' => 'Download',
	'option' => 'text',
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'control'
);

// Banner button link
$options[] = array(
	'title' => __( 'Button Link', 'marvy' ), // Control label
	'description' => '', // Control description
	'section' => 'home_banner_section', // section
	'id' => 'home_banner_button_url', // unique ID
	'default' => '#',
	'option' => 'url',
	'sanitize_callback' => 'esc_url',
	'type' => 'control'
);

/*
 * Home feature content
 */

// Home feature content
$options[] = array(
	'title' => __( 'Content', 'marvy' ), // Control label
	'description' => '', // Control description
	'section' => 'home_about_content', // section
	'id' => 'home_about_text', // unique ID
	'default' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore <br>magna ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor',
	'option' => 'textarea',
	'sanitize_callback' => 'esc_textarea',
	'type' => 'control'
);

/*
 * Home feature pages
 */

// Section title
$options[] = array(
	'title' => __( 'Section Title', 'marvy' ), // Control label
	'description' => '', // Control description
	'section' => 'home_feature_pages', // section
	'id' => 'home_feature_pages_title', // unique ID
	'default' => 'Special features',
	'option' => 'text',
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'control'
);

// Feature page 1
$options[] = array( 'title' => __( 'Select first page', 'marvy' ), // Control label
	'description' => '', // Control description
	'section' => 'home_feature_pages', // section
	'id' => 'home_feature_page_first', // unique ID
	'default' => 0,
	'option' => 'pages',
	'sanitize_callback' => '',
	'type' => 'control'
);

// Feature page 2
$options[] = array( 'title' => __( 'Select second page', 'marvy' ), // Control label
	'description' => '', // Control description
	'section' => 'home_feature_pages', // section
	'id' => 'home_feature_page_second', // unique ID
	'default' => 0,
	'option' => 'pages',
	'sanitize_callback' => '',
	'type' => 'control'
);

// Feature page 3
$options[] = array( 'title' => __( 'Select third page', 'marvy' ), // Control label
	'description' => '', // Control description
	'section' => 'home_feature_pages', // section
	'id' => 'home_feature_page_third', // unique ID
	'default' => 0,
	'option' => 'pages',
	'sanitize_callback' => '',
	'type' => 'control'
);

/*
 * Site features
 */

// Section title
$options[] = array(
	'title' => __( 'Section Title', 'marvy' ), // Control label
	'description' => '', // Control description
	'section' => 'home_theme_features', // section
	'id' => 'home_theme_feature_title', // unique ID
	'default' => 'Theme features',
	'option' => 'text',
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'control'
);

/*
 * Latest blog
 */

// Section title
$options[] = array(
	'title' => __( 'Blog Title', 'marvy' ), // Control label
	'description' => '', // Control description
	'section' => 'home_latest_blog', // section
	'id' => 'home_blog_title', // unique ID
	'default' => 'Latest Blog',
	'option' => 'text',
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'control'
);


/* ---------------------------------------------------------------------------------------------------
  End Control Options
  --------------------------------------------------------------------------------------------------- */

// Do not edit or delete below. This will include any child theme options.
if ( file_exists( get_stylesheet_directory() . '/customizer.php' ) ) {
	include get_stylesheet_directory() . '/customizer.php';
}