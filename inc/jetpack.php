<?php

/**
 * Jetpack Compatibility File
 * See: https://jetpack.me/
 *
 * @package Marvy
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function marvy_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container'	 => 'main',
		'render'	 => 'marvy_infinite_scroll_render',
		'footer'	 => 'page',
	) );
}

// end function marvy_jetpack_setup
add_action( 'after_setup_theme', 'marvy_jetpack_setup' );

function marvy_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
}

// end function marvy_infinite_scroll_render