<?php

/*
 * -----------------------------------------------------------
 * 1.0 Implement the custom theme functions.
 * -----------------------------------------------------------
*/

require_once get_template_directory() . '/inc/maqfort.php';

require_once get_template_directory() . '/inc/custom-post-type.php';

require_once get_template_directory() . '/inc/widgets.php';

require_once get_template_directory() . '/inc/template-tags.php';

require_once get_template_directory() . '/inc/loops.php';

require_once get_template_directory() . '/inc/components/CMB2/init.php';

require_once get_template_directory() . '/inc/custom-metabox.php';

require_once get_template_directory() . '/inc/admin.php';

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
    add_image_size( 'maqfort-thumbnail', 604, 517 );
    add_image_size( 'maqfort-header', 1920, 476 );


    // Set up the WordPress core custom background feature.
    add_theme_support( 'custom-background', apply_filters( 'maqfort_custom_background_args', array(
      'default-color' => 'fff',
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
      'mobile-menu' => esc_html__( 'Mobile Menu', 'maqfort' ),
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

      wp_enqueue_style( 'font-awesome', get_stylesheet_directory_uri() . '/assets/css/font-awesome.min.css' );

      wp_enqueue_style( 'flex-slider', get_stylesheet_directory_uri() . '/assets/css/flexslider.css' );

      wp_enqueue_style( 'fancy-box', get_stylesheet_directory_uri() . '/assets/css/jquery.fancybox.min.css' );

      wp_enqueue_style( 'theme-core', get_stylesheet_directory_uri() . '/assets/css/style.css' );

      wp_enqueue_script( 'jquery' );

      wp_enqueue_script( 'navigation-offcanvas', get_stylesheet_directory_uri() . '/assets/js/navigation-offcanvas.js', array( 'jquery' ), false, true );

      wp_enqueue_script( 'searchform', get_stylesheet_directory_uri() . '/assets/js/searchform.js', array( 'jquery' ), false, true );

      wp_enqueue_script( 'header-scroll', get_stylesheet_directory_uri() . '/assets/js/header-scroll.js', array( 'jquery' ), false, true );

      wp_enqueue_script( 'scroll-to-top', get_stylesheet_directory_uri() . '/assets/js/scroll-to-top.js', array( 'jquery' ), false, true );

      wp_enqueue_script( 'cookies-bar', get_stylesheet_directory_uri() . '/assets/js/cookies-bar.js', array( 'jquery' ), false, true );

      wp_enqueue_script( 'fancybox', get_stylesheet_directory_uri() . '/assets/js/jquery.fancybox.min.js', array( 'jquery' ), false, true );

      wp_enqueue_script( 'fancybox-setup', get_stylesheet_directory_uri() . '/assets/js/fancybox-setup.js', array( 'fancybox' ), false, true);

      wp_enqueue_script( 'flex-slider', get_stylesheet_directory_uri() . '/assets/js/jquery.flexslider-min.js', array( 'jquery' ), false, false );

      wp_enqueue_script( 'flex-slider-setup', get_stylesheet_directory_uri() . '/assets/js/flex-slider-setup.js', array( 'flex-slider' ), false, false);



    }
  }
}

add_action( 'wp_enqueue_scripts', 'maqfort_scripts_and_styles' );

/*
 * -----------------------------------------------------------
 * 5.0 Register the widget areas.
 * -----------------------------------------------------------
*/

if ( ! function_exists( 'maqfort_widget_init' ) ) {

  function maqfort_widget_init() {

    if ( function_exists( 'register_sidebar' ) ) {

      register_sidebar(array(
        'name' => __( 'Sidebar', 'maqfort' ),
        'id' => 'sidebar',
        'description' => __( 'Show on some page and posts', 'maqfort' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>'
      ));

      register_sidebar(array(
        'name' => __( 'Footer', 'maqfort' ),
        'id' => 'footer',
        'description' => __( 'Show on some page and posts', 'maqfort' ),
        'before_widget' => '<div id="%1$s" class="widget col-xs-12 col-sm-4 col-md-3 col-lg-3 %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>'
      ));

      register_sidebar(array(
        'name' => __( 'Footer Small', 'maqfort' ),
        'id' => 'footer-small',
        'description' => __( 'Show on some page and posts', 'maqfort' ),
        'before_widget' => '<div id="%1$s" class="widget-footer-small col-xs-12 col-sm-6 col-md-6 col-lg-6 %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>'
      ));

    }

  }
}

add_action( 'widgets_init', 'maqfort_widget_init'  );
