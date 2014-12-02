<?php
/**
 * _mbbasetheme theme init setup
 *
 * @package _mbbasetheme
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 900; /* pixels */
}

if ( ! function_exists( '_mbbasetheme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function _mbbasetheme_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on _mbbasetheme, use a find and replace
	 * to change '_mbbasetheme' to the name of your theme in all the template files
	 */
	load_theme_textdomain( '_mbbasetheme', get_template_directory() . '/languages' );

	// Clean up the head
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'wp_generator' );
	remove_action( 'wp_head', 'wp_shortlink_wp_head' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Add support for featured content.
	add_theme_support( 'featured-content', array(
		'featured_content_filter' => 'mbdmaster_get_featured_posts',
		'max_posts' => 6,
	) );

	// Register nav menus
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'mbbasetheme' ),
	) );

	// Register Widget Areas
	// Function location: /lib/theme-functions.php
	add_action( 'widgets_init', 'mb_widgets_init' );

	// Execute shortcodes in widgets
	// add_filter('widget_text', 'do_shortcode');

	// Add Editor Style
	add_editor_style();

	// Prevent File Modifications
	define ( 'DISALLOW_FILE_EDIT', true );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );

	// Add Body Classes
	add_filter( 'body_class', 'mbdmaster_body_classes' );

	// Add Image Sizes
	// add_image_size( $name, $width = 0, $height = 0, $crop = false );
	add_image_size( 'book-cover', 234, 360, true );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( '_mbbasetheme_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Remove Dashboard Meta Boxes
	// Function location: /lib/theme-functions.php
	add_action( 'wp_dashboard_setup', 'mb_remove_dashboard_widgets' );

	// Change Admin Menu Order
	// Function location: /lib/theme-functions.php
	add_filter( 'custom_menu_order', '__return_true' );
	add_filter( 'menu_order', 'mb_custom_menu_order' );

	// Hide Admin Areas that are not used
	// Function location: /lib/theme-functions.php
	add_action( 'admin_menu', 'mb_remove_menu_pages' );

	// Remove default link for images
	// Function location: /lib/theme-functions.php
	add_action( 'admin_init', 'mb_imagelink_setup', 10 );

	// Show Kitchen Sink in WYSIWYG Editor
	// Function location: /lib/theme-functions.php
	add_filter( 'tiny_mce_before_init', 'mb_unhide_kitchensink' );

	// Custom Search Form
	// Function location: /lib/inc/template-tags.php
	add_filter( 'get_search_form', 'mbdmaster_search_form' );

	// Comment Form -- HTML5 Placeholders
	add_filter( 'comment_form_default_fields', 'mbdmaster_comment_form' );

	//  Comment Field
	add_filter( 'comment_form_field_comment', 'mbdmaster_comment_field' );
	// Hide Admin Bar
	// Let's face it: it's ugly
	add_filter( 'show_admin_bar', '__return_false' );

	// Enable support for HTML5 markup.
	add_theme_support( 'custom-header', array(
		'flex-width'    => true,
		'width'         => 980,
		'flex-height'    => true,
		'height'        => 200,
		'default-image' => get_stylesheet_directory_uri() . 'assets/images/logo.png',
	) );

	// Enable support for custom headers.
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'gallery',
		//'caption',
		'comment-list'
	) );

	add_theme_support( 'custom-background', array(
	// Background color default
	'default-color' => '000',
	// Background image default
	'default-image' => get_template_directory_uri() . 'assets/images/office-hero.jpg'
) );

	// Enable support for Post Formats.
	// add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Enqueue scripts
	// Function location: /lib/theme-functions.php
	add_action( 'wp_enqueue_scripts', 'mbdmaster324_scripts' );

	// Remove Query Strings From Static Resources
	// Function location: /lib/theme-functions.php
	add_filter( 'script_loader_src', 'mb_remove_script_version', 15, 1 );
	add_filter( 'style_loader_src', 'mb_remove_script_version', 15, 1 );

	// Remove Read More Jump
	// Function location: /lib/theme-functions.php
	add_filter( 'the_content_more_link', 'mb_remove_more_jump_link' );

	// Typekit Webfonts Inline Script
	add_action( 'wp_head', 'mbdmaster324_typekit_inline' );

	// Testimonials shortcode
	// Function location: mu-plugins
	add_action( 'init', 'mbdmaster324_register_shortcode' );

	// Posts 2 Posts plugin settings
	// Function location: mu-plugins
	add_action( 'p2p_init', 'mbdmaster324_connection_types' );

}
endif; // _mbbasetheme_setup

add_action( 'after_setup_theme', '_mbbasetheme_setup' );
