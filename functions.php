<?php

/*
 * -----------------------------------------------------------
 * 1.0 Implement the custom theme functions.
 * -----------------------------------------------------------
*/

require_once get_template_directory() . '/inc/maqfort.php';

/*
 * -----------------------------------------------------------
 * 2.0 Setup theme default and register various supported features.
 * -----------------------------------------------------------
*/

if ( ! function_exists( 'maqfort_setup' ) ) {

  function maqfort_setup() {

    // Load theme translations.
    load_theme_textdomain( 'maqfort', get_template_directory() . '/languages' );

    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );

    // Let Wordpress manage the doucment title.
    add_theme_support( 'title-tag' );

    // Enable suppot for Post Thumbnails.
    add_theme_support( 'post-thumbnails' );

    // Set up the WordPress core custom background feature.
    add_theme_support( 'custom-background', apply_filters( 'maqfort_custom_background_args', array(
      'default-color' => 'f2f3f7',
      'default-image' => '',
    ) ) );

    // Switch default core markup for search form, comment form, and comments to output valid HTML5.
    add_theme_support( 'html5', array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    ) );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
      'main-menu' => esc_html__( 'Main Menu', 'maqfort' ),
    ) );

    // Cleaning up random code around images.
    add_filter( 'the_content', 'maqfort_filter_ptags_on_images' );

    // Cleaning up excerpt.
    add_filter( 'excerpt_more', 'maqfort_excerpt_more' );

    // Clean up gallery output in wp.
    add_filter( 'gallery_style', 'maqfort_gallery_style' );

    // A better title.
    add_filter( 'wp_title', 'rw_title', 10, 3 );

    // Remove WP version from RSS.
    add_filter( 'the_generator', 'maqfort_rss_version' );

    // Remove pesky injected css for recent comments widget.
    add_filter( 'wp_head', 'maqfort_remove_wp_widget_recent_comments_style', 1 );

    // Launching operation cleanup.
    add_action( 'init', 'maqfort_head_cleanup' );

    // Clean up comment styles in the head.
    add_action( 'wp_head', 'maqfort_remove_recent_comments_style', 1 );

  }

  add_action( 'after_setup_theme', 'maqfort_setup' );

}

/*
 * -----------------------------------------------------------
 * 3.0 Setup the content with value based on the theme's design.
 * -----------------------------------------------------------
*/

if ( ! function_exists( 'maqfort_content_width' ) ) {

  function maqfort_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'maqfort_content_width', 640 );
  }
}

add_action( 'after_setup_theme', 'maqfort_content_width', 0 );

/*
 * -----------------------------------------------------------
 * 4.0 Scripts e Styles register and enqueing.
 * -----------------------------------------------------------
*/

if ( ! function_exists( 'maqfort_scripts_and_styles' ) ) {

  function maqfort_scripts_and_styles() {

    if ( !is_admin() ) {

      wp_enqueue_style( 'theme-core', get_stylesheet_directory_uri() . '/assets/css/style.css' );

      wp_enqueue_script( 'jquery' );

    }
  }
}

add_action( 'wp_enqueue_scripts', 'maqfort_scripts_and_styles' );
