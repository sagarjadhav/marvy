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
	'title'			 => __( 'Home Page', 'marvy' ), // Panel name
	'id'			 => 'home_panel', // unique ID
	'priority'		 => 10,
	'theme_supports' => '',
	'type'			 => 'panel'
);

/* ---------------------------------------------------------------------------------------------------
  Sections
  --------------------------------------------------------------------------------------------------- */

$options[] = array(
	'title'			 => __( 'Header Banner', 'marvy' ), // Section name
	'panel'			 => 'home_panel', // panel
	'id'			 => 'home_banner_section', // unique ID
	'theme_supports' => '',
	'type'			 => 'section'
);

$options[] = array(
	'title'			 => __( 'About Content', 'marvy' ), // Section name
	'panel'			 => 'home_panel', // panel
	'id'			 => 'home_about_content', // unique ID
	'theme_supports' => '',
	'type'			 => 'section'
);

$options[] = array(
	'title'			 => __( 'Feature Pages', 'marvy' ), // Section name
	'panel'			 => 'home_panel', // panel
	'id'			 => 'home_feature_pages', // unique ID
	'theme_supports' => '',
	'type'			 => 'section'
);

$options[] = array(
	'title'			 => __( 'Theme Features', 'marvy' ), // Section name
	'panel'			 => 'home_panel', // panel
	'id'			 => 'home_theme_features', // unique ID
	'theme_supports' => '',
	'type'			 => 'section'
);

$options[] = array(
	'title'			 => __( 'Latest Blog', 'marvy' ), // Section name
	'panel'			 => 'home_panel', // panel
	'id'			 => 'home_latest_blog', // unique ID
	'theme_supports' => '',
	'type'			 => 'section'
);

$options[] = array(
	'title'			 => __( 'Callout Section', 'marvy' ), // Section name
	'panel'			 => 'home_panel', // panel
	'id'			 => 'home_callout', // unique ID
	'theme_supports' => '',
	'type'			 => 'section'
);

/* ---------------------------------------------------------------------------------------------------
  Controls
  --------------------------------------------------------------------------------------------------- */

/*
 * Home Banner Options
 */

// Home page banner background
$options[] = array(
	'title'				 => __( 'Background', 'marvy' ), // Control label
	'description'		 => '', // Control description
	'section'			 => 'home_banner_section', // section
	'id'				 => 'home_banner_bg_color', // unique ID
	'default'			 => '#ef6e7e', // HEX
	'option'			 => 'color',
	'sanitize_callback'	 => 'sanitize_hex_color',
	'type'				 => 'control',
);

// Banner Content Page
$options[] = array(
	'title'				 => __( 'Select banner content page', 'marvy' ), // Control label
	'description'		 => '', // Control description
	'section'			 => 'home_banner_section', // section
	'id'				 => 'home_banner_content', // unique ID
	'default'			 => 0,
	'option'			 => 'pages',
	'sanitize_callback'	 => 'marvy_sanitize_int',
	'type'				 => 'control'
);

/*
 * Home about content
 */

// Banner Content Page
$options[] = array(
	'title'				 => __( 'Select about content page', 'marvy' ), // Control label
	'description'		 => '', // Control description
	'section'			 => 'home_about_content', // section
	'id'				 => 'home_about_content', // unique ID
	'default'			 => 0,
	'option'			 => 'pages',
	'sanitize_callback'	 => 'marvy_sanitize_int',
	'type'				 => 'control'
);

/*
 * Home feature pages
 */

// Section title
$options[] = array(
	'title'				 => __( 'Section Title', 'marvy' ), // Control label
	'description'		 => '', // Control description
	'section'			 => 'home_feature_pages', // section
	'id'				 => 'home_feature_pages_title', // unique ID
	'default'			 => __( 'Get Started with Pages', 'marvy' ),
	'option'			 => 'text',
	'sanitize_callback'	 => 'sanitize_text_field',
	'type'				 => 'control'
);

// Feature page 1
$options[] = array(
	'title'				 => __( 'Select first page', 'marvy' ), // Control label
	'description'		 => '', // Control description
	'section'			 => 'home_feature_pages', // section
	'id'				 => 'home_feature_page_first', // unique ID
	'default'			 => 0,
	'option'			 => 'pages',
	'sanitize_callback'	 => 'marvy_sanitize_int',
	'type'				 => 'control'
);

// Feature page 2
$options[] = array(
	'title'				 => __( 'Select second page', 'marvy' ), // Control label
	'description'		 => '', // Control description
	'section'			 => 'home_feature_pages', // section
	'id'				 => 'home_feature_page_second', // unique ID
	'default'			 => 0,
	'option'			 => 'pages',
	'sanitize_callback'	 => 'marvy_sanitize_int',
	'type'				 => 'control'
);

// Feature page 3
$options[] = array(
	'title'				 => __( 'Select third page', 'marvy' ), // Control label
	'description'		 => '', // Control description
	'section'			 => 'home_feature_pages', // section
	'id'				 => 'home_feature_page_third', // unique ID
	'default'			 => 0,
	'option'			 => 'pages',
	'sanitize_callback'	 => 'marvy_sanitize_int',
	'type'				 => 'control'
);

/*
 * Site features
 */

// Section title
$options[] = array(
	'title'				 => __( 'Section Title', 'marvy' ), // Control label
	'description'		 => '', // Control description
	'section'			 => 'home_theme_features', // section
	'id'				 => 'home_theme_feature_title', // unique ID
	'default'			 => __( 'Theme features', 'marvy' ),
	'option'			 => 'text',
	'sanitize_callback'	 => 'sanitize_text_field',
	'type'				 => 'control'
);

// Feature page 1
$options[] = array(
	'title'				 => __( 'Select first feature page', 'marvy' ), // Control label
	'description'		 => '', // Control description
	'section'			 => 'home_theme_features', // section
	'id'				 => 'home_theme_feature_1', // unique ID
	'default'			 => 0,
	'option'			 => 'pages',
	'sanitize_callback'	 => 'marvy_sanitize_int',
	'type'				 => 'control'
);

$options[] = array(
	'title'				 => __( 'Add icon class', 'marvy' ), // Control label
	'description'		 => __( '', 'marvy' ),
	'section'			 => 'home_theme_features', // section
	'id'				 => 'home_theme_feature_icon_1', // unique ID
	'default'			 => 'ti-mobile',
	'option'			 => 'text',
	'sanitize_callback'	 => 'sanitize_text_field',
	'type'				 => 'control'
);

// Feature page 2
$options[] = array(
	'title'				 => __( 'Select second feature page', 'marvy' ), // Control label
	'description'		 => '', // Control description
	'section'			 => 'home_theme_features', // section
	'id'				 => 'home_theme_feature_2', // unique ID
	'default'			 => 0,
	'option'			 => 'pages',
	'sanitize_callback'	 => 'marvy_sanitize_int',
	'type'				 => 'control'
);

$options[] = array(
	'title'				 => __( 'Add icon class', 'marvy' ), // Control label
	'description'		 => __( '', 'marvy' ),
	'section'			 => 'home_theme_features', // section
	'id'				 => 'home_theme_feature_icon_2', // unique ID
	'default'			 => 'ti-folder',
	'option'			 => 'text',
	'sanitize_callback'	 => 'sanitize_text_field',
	'type'				 => 'control'
);

// Feature page 3
$options[] = array(
	'title'				 => __( 'Select third feature page', 'marvy' ), // Control label
	'description'		 => '', // Control description
	'section'			 => 'home_theme_features', // section
	'id'				 => 'home_theme_feature_3', // unique ID
	'default'			 => 0,
	'option'			 => 'pages',
	'sanitize_callback'	 => 'marvy_sanitize_int',
	'type'				 => 'control'
);

$options[] = array(
	'title'				 => __( 'Add icon class', 'marvy' ), // Control label
	'description'		 => __( '', 'marvy' ),
	'section'			 => 'home_theme_features', // section
	'id'				 => 'home_theme_feature_icon_3', // unique ID
	'default'			 => 'ti-face-smile',
	'option'			 => 'text',
	'sanitize_callback'	 => 'sanitize_text_field',
	'type'				 => 'control'
);

/*
 * Latest blog
 */

// Section title
$options[] = array(
	'title'				 => __( 'Blog Title', 'marvy' ), // Control label
	'description'		 => '', // Control description
	'section'			 => 'home_latest_blog', // section
	'id'				 => 'home_blog_title', // unique ID
	'default'			 => __( 'Latest Blog', 'marvy' ),
	'option'			 => 'text',
	'sanitize_callback'	 => 'sanitize_text_field',
	'type'				 => 'control'
);

// Home page banner background
$options[] = array(
	'title'				 => __( 'Link Color', 'marvy' ), // Control label
	'description'		 => '', // Control description
	'section'			 => 'colors', // section
	'id'				 => 'link_color', // unique ID
	'default'			 => '#ef6e7e', // HEX
	'option'			 => 'color',
	'sanitize_callback'	 => 'sanitize_hex_color',
	'type'				 => 'control',
);

/*
 * Home Callout
 */

// Banner Content Page
$options[] = array(
	'title'				 => __( 'Select callout content page', 'marvy' ), // Control label
	'description'		 => '', // Control description
	'section'			 => 'home_callout', // section
	'id'				 => 'home_callout_content', // unique ID
	'default'			 => 0,
	'option'			 => 'pages',
	'sanitize_callback'	 => 'marvy_sanitize_int',
	'type'				 => 'control'
);

/* ---------------------------------------------------------------------------------------------------
  End Control Options
  --------------------------------------------------------------------------------------------------- */

// Do not edit or delete below. This will include any child theme options.
if ( file_exists( get_stylesheet_directory() . '/customizer.php' ) ) {
	include get_stylesheet_directory() . '/customizer.php';
}