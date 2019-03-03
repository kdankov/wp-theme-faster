<?php
/**
 * Faster functions and definitions
 *
 * @package Faster
 */

if ( ! function_exists( 'faster_setup' ) ) :

	function faster_setup() {

		load_theme_textdomain( 'faster', get_template_directory() . '/languages' );

		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

		add_theme_support( 'custom-background', apply_filters( 'faster_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'faster' ),
		) );

	}

endif;
add_action( 'after_setup_theme', 'faster_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function faster_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'faster_content_width', 640 );
}
add_action( 'after_setup_theme', 'faster_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function faster_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'faster' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'faster' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'faster_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function faster_scripts() {

	wp_enqueue_style( 'faster-styles', get_template_directory_uri() . '/assets/dist/css/theme.css' );

}
add_action( 'wp_enqueue_scripts', 'faster_scripts' );

/**
 * Strip down the Front End from any scripts and additional cruft
 */
require get_template_directory() . '/inc/cleanup.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

