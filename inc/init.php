<?php

if ( !function_exists( 'marvy_setup' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function marvy_setup() {

		global $content_width;

		if ( !isset( $content_width ) ) {
			$content_width = apply_filters( 'marvy_content_width', 720 );
		}

		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Marvy, use a find and replace
		 * to change 'marvy' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'marvy', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support( 'post-thumbnails' );

		if ( function_exists( 'add_image_size' ) ) {
			add_image_size( 'marvy-thumb', 440, 330, true );
			add_image_size( 'marvy-large-thumb', 800, 320, true );
		}

		/*
		 * This theme uses wp_nav_menu() in one location.
		 */
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary Menu', 'marvy' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
		) );

		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'aside', 'image', 'video', 'quote', 'link',
		) );

		/**
		 * Set up the WordPress core custom background feature.
		 */
		add_theme_support( 'custom-background', apply_filters( 'marvy_custom_background_args', array(
			'default-color'	 => 'ffffff',
			'default-image'	 => '',
		) ) );
	}

endif; // marvy_setup

add_action( 'after_setup_theme', 'marvy_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function marvy_widgets_init() {
	register_sidebar(
	array(
		'name'			 => esc_html__( 'Sidebar', 'marvy' ),
		'id'			 => 'sidebar-1',
		'description'	 => '',
		'before_widget'	 => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	 => '</aside>',
		'before_title'	 => '<h3 class="widget-title">',
		'after_title'	 => '</h3>',
	)
	);

	register_sidebar(
	array(
		'name'			 => esc_html__( 'Footer Sidebar', 'marvy' ),
		'id'			 => 'sidebar-2',
		'description'	 => '',
		'before_widget'	 => '<aside id="%1$s" class="widget grid-cell footer-widget %2$s">',
		'after_widget'	 => '</aside>',
		'before_title'	 => '<h3 class="widget-title">',
		'after_title'	 => '</h3>',
	)
	);
}

add_action( 'widgets_init', 'marvy_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function marvy_scripts() {
	//wp_deregister_style( 'open-sans' );
	//wp_register_style( 'open-sans', false );

	wp_enqueue_style( 'marvy-google-font2', '//fonts.googleapis.com/css?family=Roboto+Slab:400,700,300' );
	wp_enqueue_style( 'marvy-google-font', '//fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,400italic' );
	wp_enqueue_style( 'marvy-style', get_stylesheet_uri() );

	wp_enqueue_script( 'marvy-js', get_template_directory_uri() . '/js/main.min.js', array( 'jquery' ), '20120206', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'marvy_scripts' );
