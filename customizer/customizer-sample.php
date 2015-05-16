<?php

/**
 * WPshed Customizer
 */
/** The short name gives a unique element to each options id. */
$shortname = 'my_theme_';

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
	'title' => __( 'Example Panel', 'marvy' ), // Panel name
	'description' => __( 'Panel description.', 'marvy' ), // Panel description
	'id' => $shortname . 'panel_id', // unique ID
	'priority' => 10,
	'theme_supports' => '',
	'type' => 'panel'
); // type = panel

$options[] = array(
	'title' => __( 'Example Panel 2', 'marvy' ), // Panel name
	'description' => __( 'Panel description.', 'marvy' ), // Panel description
	'id' => $shortname . 'panel_2', // unique ID
	'priority' => 20,
	'theme_supports' => '',
	'type' => 'panel'
); // type = panel


/* ---------------------------------------------------------------------------------------------------
  Sections
  --------------------------------------------------------------------------------------------------- */

$options[] = array(
	'title' => __( 'Standard Form Fields', 'marvy' ), // Section name
	'description' => __( 'Section description', 'marvy' ), // Section description
	'panel' => $shortname . 'panel_id', // panel
	'id' => $shortname . 'section_id', // unique ID
	'priority' => 10,
	'theme_supports' => '',
	'type' => 'section'
); // type = section

$options[] = array(
	'title' => __( 'WordPress 4.0+ Fields', 'marvy' ), // Section name
	'description' => __( 'Section description', 'marvy' ), // Section description
	'panel' => $shortname . 'panel_id', // panel
	'id' => $shortname . 'section_2', // unique ID
	'priority' => 10,
	'theme_supports' => '',
	'type' => 'section'
); // type = section

$options[] = array(
	'title' => __( 'WordPress Data', 'marvy' ), // Section name
	'description' => __( 'Section description', 'marvy' ), // Section description
	'panel' => $shortname . 'panel_2', // panel
	'id' => $shortname . 'section_3', // unique ID
	'priority' => 10,
	'theme_supports' => '',
	'type' => 'section'
); // type = section

/* ---------------------------------------------------------------------------------------------------
  Controls
  --------------------------------------------------------------------------------------------------- */

// Text field - Example Panel - section 1
$options[] = array(
	'title' => __( 'Text Field', 'marvy' ), // Control label
	'description' => '', // Control description
	'section' => $shortname . 'section_id', // section
	'id' => $shortname . 'text', // unique ID
	'default' => 'Default value',
	'option' => 'text',
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'control'
);

// Textarea field - Example Panel - section 1
$options[] = array(
	'title' => __( 'Textarea Field', 'marvy' ), // Control label
	'description' => '', // Control description
	'section' => $shortname . 'section_id', // section
	'id' => $shortname . 'textarea', // unique ID
	'default' => '',
	'option' => 'textarea',
	'sanitize_callback' => 'esc_textarea',
	'type' => 'control'
);

// Color Picker field - Example Panel - section 1
$options[] = array(
	'title' => __( 'Color Picker Field', 'marvy' ), // Control label
	'description' => '', // Control description
	'section' => $shortname . 'section_id', // section
	'id' => $shortname . 'color', // unique ID
	'default' => '#BADA55', // HEX
	'option' => 'color',
	'sanitize_callback' => '',
	'type' => 'control'
);

// Radio field - Example Panel - section 1
$options[] = array(
	'title' => __( 'Radio Field', 'marvy' ), // Control label
	'description' => '', // Control description
	'section' => $shortname . 'section_id', // section
	'id' => $shortname . 'radio', // unique ID
	'default' => 'value2',
	'option' => 'radio',
	'sanitize_callback' => '',
	'choices' => array(
		'value1' => 'Choice 1',
		'value2' => 'Choice 2',
		'value3' => 'Choice 3',
	),
	'type' => 'control'
);

// Checkbox field - Example Panel - section 1
$options[] = array(
	'title' => __( 'Checkbox Field', 'marvy' ), // Control label
	'description' => '', // Control description
	'section' => $shortname . 'section_id', // section
	'id' => $shortname . 'checkbox', // unique ID
	'default' => '', // 1 for checked
	'option' => 'checkbox',
	'sanitize_callback' => '',
	'type' => 'control'
);


// Select field - Example Panel - section 1
$options[] = array(
	'title' => __( 'Select Field', 'marvy' ), // Control label
	'description' => '', // Control description
	'section' => $shortname . 'section_id', // section
	'id' => $shortname . 'select', // unique ID
	'default' => 'value2',
	'option' => 'select',
	'sanitize_callback' => '',
	'choices' => array(
		'value1' => 'Choice 1',
		'value2' => 'Choice 2',
		'value3' => 'Choice 3',
	),
	'type' => 'control'
);

// Image Upload field - Example Panel - section 1
$options[] = array(
	'title' => __( 'Image Upload Field', 'marvy' ), // Control label
	'description' => '', // Control description
	'section' => $shortname . 'section_id', // section
	'id' => $shortname . 'image', // unique ID
	'default' => '',
	'option' => 'image',
	'sanitize_callback' => 'esc_url',
	'type' => 'control'
);

// File Upload field - Example Panel - section 1
$options[] = array(
	'title' => __( 'File Upload Field', 'marvy' ), // Control label
	'description' => '', // Control description
	'section' => $shortname . 'section_id', // section
	'id' => $shortname . 'file', // unique ID
	'default' => '',
	'option' => 'file',
	'sanitize_callback' => '',
	'type' => 'control'
);

// URL field - Example Panel - section 2
$options[] = array(
	'title' => __( 'URL Field', 'marvy' ), // Control label
	'description' => '', // Control description
	'section' => $shortname . 'section_2', // section
	'id' => $shortname . 'url', // unique ID
	'default' => '',
	'option' => 'url',
	'sanitize_callback' => 'esc_url',
	'type' => 'control'
);

// Email field - Example Panel - section 2
$options[] = array(
	'title' => __( 'Email Field', 'marvy' ), // Control label
	'description' => '', // Control description
	'section' => $shortname . 'section_2', // section
	'id' => $shortname . 'email', // unique ID
	'default' => '',
	'option' => 'email',
	'sanitize_callback' => 'sanitize_email',
	'type' => 'control'
);

// Password field - Example Panel - section 2
$options[] = array(
	'title' => __( 'Password Field', 'marvy' ), // Control label
	'description' => '', // Control description
	'section' => $shortname . 'section_2', // section
	'id' => $shortname . 'password', // unique ID
	'default' => '',
	'option' => 'password',
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'control'
);

// Range field - Example Panel - section 2
$options[] = array( 'title' => __( 'Range Field', 'marvy' ), // Control label
	'description' => '', // Control description
	'section' => $shortname . 'section_2', // section
	'id' => $shortname . 'range', // unique ID
	'default' => 70,
	'option' => 'range',
	'sanitize_callback' => '',
	'input_attrs' => array(
		'min' => 0,
		'max' => 100,
		'step' => 1,
		'class' => 'example-class',
	),
	'type' => 'control'
);

// Pages field - Example Panel 2 - section 3
$options[] = array( 'title' => __( 'Pages Field', 'marvy' ), // Control label
	'description' => '', // Control description
	'section' => $shortname . 'section_3', // section
	'id' => $shortname . 'pages', // unique ID
	'default' => 0,
	'option' => 'pages',
	'sanitize_callback' => '',
	'type' => 'control'
);

// Categories field - Example Panel 2 - section 3
$options[] = array(
	'title' => __( 'Categories Field', 'marvy' ), // Control label
	'description' => '', // Control description
	'section' => $shortname . 'section_3', // section
	'id' => $shortname . 'categories', // unique ID
	'default' => 0,
	'option' => 'categories',
	'sanitize_callback' => '',
	'type' => 'control'
);

// Tags field - Example Panel 2 - section 3
$options[] = array(
	'title' => __( 'Tags Field', 'marvy' ), // Control label
	'description' => '', // Control description
	'section' => $shortname . 'section_3', // section
	'id' => $shortname . 'tags', // unique ID
	'default' => '',
	'option' => 'tags',
	'sanitize_callback' => '',
	'type' => 'control'
);

// Post Types field - Example Panel 2 - section 3
$options[] = array(
	'title' => __( 'Post Types Field', 'marvy' ), // Control label
	'description' => '', // Control description
	'section' => $shortname . 'section_3', // section
	'id' => $shortname . 'post_types', // unique ID
	'default' => '',
	'option' => 'post_types',
	'sanitize_callback' => '',
	'type' => 'control'
);

// Posts field - Example Panel 2 - section 3
$options[] = array(
	'title' => __( 'Posts Field', 'marvy' ), // Control label
	'description' => '', // Control description
	'section' => $shortname . 'section_3', // section
	'id' => $shortname . 'posts', // unique ID
	'default' => '',
	'option' => 'posts',
	'sanitize_callback' => '',
	'type' => 'control'
);

// Users field - Example Panel 2 - section 3
$options[] = array(
	'title' => __( 'Users Field', 'marvy' ), // Control label
	'description' => '', // Control description
	'section' => $shortname . 'section_3', // section
	'id' => $shortname . 'users', // unique ID
	'default' => '',
	'option' => 'users',
	'sanitize_callback' => '',
	'type' => 'control'
);

// Menus field - Example Panel 2 - section 3
$options[] = array(
	'title' => __( 'Menus Field', 'marvy' ), // Control label
	'description' => '', // Control description
	'section' => $shortname . 'section_3', // section
	'id' => $shortname . 'menus', // unique ID
	'default' => '',
	'option' => 'menus',
	'sanitize_callback' => '',
	'type' => 'control'
);

/* ---------------------------------------------------------------------------------------------------
  End Control Options
  --------------------------------------------------------------------------------------------------- */

// Do not edit or delete below. This will include any child theme options.
if ( file_exists( get_stylesheet_directory() . '/customizer.php' ) ) {
	include get_stylesheet_directory() . '/customizer.php';
}