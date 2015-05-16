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
	'priority' => 10,
	'theme_supports' => '',
	'type' => 'section'
);

/* ---------------------------------------------------------------------------------------------------
  Controls
  --------------------------------------------------------------------------------------------------- */


// Color Picker field - Example Panel - section 1
$options[] = array(
	'title' => __( 'Color Picker Field', 'marvy' ), // Control label
	'description' => '', // Control description
	'section' => 'colors', // section
	'id' => 'home_banner_color', // unique ID
	'default' => '#ee6e73', // HEX
	'option' => 'color',
	'sanitize_callback' => '',
	'type' => 'control',
		//'transport' => 'postMessage'
);

// Textarea field - Example Panel - section 1
$options[] = array(
	'title' => __( 'Textarea Field', 'marvy' ), // Control label
	'description' => '', // Control description
	'section' => 'home_banner_section', // section
	'id' => 'home_banner_text', // unique ID
	'default' => 'Welcome to Marvy WordPress Theme with <strong>Customizer</strong> options',
	'option' => 'textarea',
	'sanitize_callback' => 'esc_textarea',
	'type' => 'control'
);


/* ---------------------------------------------------------------------------------------------------
  End Control Options
  --------------------------------------------------------------------------------------------------- */

// Do not edit or delete below. This will include any child theme options.
if ( file_exists( get_stylesheet_directory() . '/customizer.php' ) ) {
	include get_stylesheet_directory() . '/customizer.php';
}