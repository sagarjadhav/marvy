<?php

/**
 * Marvy Includes
 *
 * @package Marvy
 */
/**
 * Init
 */
require get_template_directory() . '/inc/init.php';

/**
 * Customizer
 */
require get_template_directory() . '/customizer/customizer-framework.php';
require get_template_directory() . '/customizer/marvy-functions.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
