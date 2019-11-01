<?php

/**
 * -----------------------------------------------------------
 * Implement the custom theme functions.
 * -----------------------------------------------------------
 */
require_once get_template_directory() . '/inc/custom-post-types.php';

require_once get_template_directory() . '/inc/template-functions.php';

require_once get_template_directory() . '/inc/template-tags.php';

require_once get_template_directory() . '/inc/widgets.php';

require_once get_template_directory() . '/inc/loops.php';

require_once get_template_directory() . '/inc/custom-metabox.php';

require_once get_template_directory() . '/inc/customizer.php';

require_once get_template_directory() . '/inc/admin.php';



/*
 * -----------------------------------------------------------
 * Setup theme default and register various supported features.
 * -----------------------------------------------------------
*/

if ( ! function_exists( 'mf_setup' ) ) {

	function mf_setup() {

		// Load theme translations.
		load_theme_textdomain( 'maqfort', get_template_directory() . '/languages' );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Let Wordpress manage the doucment title.
		add_theme_support( 'title-tag' );

		// Enable suppot for Post Thumbnails.
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'maqfort-thumbnail', 604, 517 );
		add_image_size( 'maqfort-home-thumb', 640, 480 );
		add_image_size( 'maqfort-header', 1920, 476 );

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'mf_custom_background_args',
				array(
					'default-color' => 'fff',
					'default-image' => '',
				)
			)
		);

		// Switch default core markup for search form, comment form, and comments to output valid HTML5.
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		/**
		* Add support for core custom logo.
		*
		* @link https://codex.wordpress.org/Theme_Logo
		*/
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 500,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'main-menu'   => __( 'Main Menu', 'maqfort' ),
				'mobile-menu' => __( 'Mobile Menu', 'maqfort' ),
				'menu-footer' => __( 'Footer Menu', 'maqfort' ),
			)
		);

		// Cleaning up random code around images.
		add_filter( 'the_content', 'mf_filter_ptags_on_images' );

		// Cleaning up excerpt.
		add_filter( 'excerpt_more', 'mf_excerpt_more' );

		// Clean up gallery output in wp.
		add_filter( 'gallery_style', 'mf_gallery_style' );

		// A better title.
		add_filter( 'wp_title', 'rw_title', 10, 3 );

		// Remove WP version from RSS.
		add_filter( 'the_generator', 'mf_rss_version' );

		// Remove pesky injected css for recent comments widget.
		add_filter( 'wp_head', 'mf_remove_wp_widget_recent_comments_style', 1 );

		// Launching operation cleanup.
		add_action( 'init', 'mf_head_cleanup' );

		// Clean up comment styles in the head.
		add_action( 'wp_head', 'mf_remove_recent_comments_style', 1 );

	}

	add_action( 'after_setup_theme', 'mf_setup' );

}

/*
 * -----------------------------------------------------------
 * Setup the content with value based on the theme's design.
 * -----------------------------------------------------------
*/
if ( ! function_exists( 'mf_content_width' ) ) {
	function mf_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'mf_content_width', 640 );
	}
}

add_action( 'after_setup_theme', 'mf_content_width', 0 );

/*
 * -----------------------------------------------------------
 * Scripts e Styles register and enqueing.
 * -----------------------------------------------------------
*/
if ( ! function_exists( 'mf_scripts_and_styles' ) ) {

	function mf_scripts_and_styles() {

		if ( ! is_admin() ) {

			wp_enqueue_style( 'font-awesome', get_stylesheet_directory_uri() . '/assets/css/font-awesome.min.css' );

			wp_enqueue_style( 'flex-slider', get_stylesheet_directory_uri() . '/assets/css/flexslider.css' );

			wp_enqueue_style( 'swiperjs', get_stylesheet_directory_uri() . '/assets/css/swiper.min.css' );

			wp_enqueue_style( 'fancy-box', get_stylesheet_directory_uri() . '/assets/css/jquery.fancybox.min.css' );

			wp_enqueue_style( 'theme-core', get_stylesheet_directory_uri() . '/assets/css/style.css' );

			wp_enqueue_script( 'jquery' );

			wp_enqueue_script( 'maqfort-onload-scripts', get_stylesheet_directory_uri() . '/assets/js/theme-onload.js', '1.0.0', true );

			wp_enqueue_script( 'fancybox', get_stylesheet_directory_uri() . '/assets/js/jquery.fancybox.min.js', array( 'jquery' ), '3.5.7', false);

			wp_enqueue_script( 'swiperjs', get_stylesheet_directory_uri() . '/assets/js/swiper.min.js', array( 'jquery' ), '1.0.0', false);

			wp_enqueue_script( 'flex-slider', get_stylesheet_directory_uri() . '/assets/js/jquery.flexslider-min.js', array( 'jquery' ), false, false );

			wp_enqueue_script( 'flex-slider-setup', get_stylesheet_directory_uri() . '/assets/js/flex-slider-setup.js', array( 'flex-slider' ), false, false );

			wp_enqueue_script( 'maqfort-onready-scripts', get_stylesheet_directory_uri() . '/assets/js/theme-onready.js', array( 'jquery', 'fancybox' ), '1.0.0', false );

		}
	}
}

add_action( 'wp_enqueue_scripts', 'mf_scripts_and_styles' );

/*
 * -----------------------------------------------------------
 * Register the widget areas.
 * -----------------------------------------------------------
*/
if ( ! function_exists( 'mf_widget_init' ) ) :
	function mf_widget_init() {
		register_sidebar(
			array(
				'name'          => __( 'Sidebar', 'maqfort' ),
				'id'            => 'sidebar',
				'description'   => __( 'Show on some page and posts', 'maqfort' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h4 class="widget-title">',
				'after_title'   => '</h4>',
			)
		);
		register_sidebar(
			array(
				'name'          => __( 'Footer', 'maqfort' ),
				'id'            => 'footer',
				'description'   => __( 'Show on some page and posts', 'maqfort' ),
				'before_widget' => '<div id="%1$s" class="widget col-xs-12 col-sm-4 col-md-3 col-lg-3 %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h4 class="widget-title">',
				'after_title'   => '</h4>',
			)
		);
	}
endif;

add_action( 'widgets_init', 'mf_widget_init' );
