<?php

/*
 * -----------------------------------------------------------
 * 1.0 Clean the header.
 * -----------------------------------------------------------
*/

if ( ! function_exists( 'maqfort_head_cleanup' ) ) {

  function maqfort_head_cleanup() {
    // category feeds
    // remove_action( 'wp_head', 'feed_links_extra', 3 );
    // post and comment feeds
    // remove_action( 'wp_head', 'feed_links', 2 );
    // EditURI link.
    remove_action( 'wp_head', 'rsd_link' );

    // Windows live writer.
    remove_action( 'wp_head', 'wlwmanifest_link' );

    // Previous link.
    remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );

    // Start link.
    remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );

    // Links for adjacent posts.
    remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

    // WP version.
    remove_action( 'wp_head', 'wp_generator' );

    // Remove WP version from css.
    add_filter( 'style_loader_src', 'maqfort_remove_wp_ver_css_js', 9999 );

    // Remove Wp version from scripts.
    add_filter( 'script_loader_src', 'maqfort_remove_wp_ver_css_js', 9999 );

  }
}

/*
 * -----------------------------------------------------------
 * 2.0 Remove WP version from RSS.
 * -----------------------------------------------------------
*/

if ( ! function_exists( 'maqfort_rss_version' ) ) {

  function maqfort_rss_version() { return ''; }

}

/*
 * -----------------------------------------------------------
 * 3.0 Remove WP version from scripts.
 * -----------------------------------------------------------
*/

if ( ! function_exists( 'maqfort_remove_wp_ver_css_js' ) ) {

  function maqfort_remove_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' ) )
      $src = remove_query_arg( 'ver', $src );
    return $src;

  }
}

/*
 * -----------------------------------------------------------
 * 4.0 Remove injected CSS for recent comments widget.
 * -----------------------------------------------------------
*/

if ( ! function_exists( 'maqfort_remove_wp_widget_recent_comments_style' ) ) {

  function maqfort_remove_wp_widget_recent_comments_style() {
    if ( has_filter( 'wp_head', 'wp_widget_recent_comments_style' ) ) {
      remove_filter( 'wp_head', 'wp_widget_recent_comments_style' );
    }
  }
}

/*
 * -----------------------------------------------------------
 * 5.0 Remove injected CSS from recent comments widget.
 * -----------------------------------------------------------
*/

if ( ! function_exists( 'maqfort_remove_recent_comments_style' ) ) {

  function maqfort_remove_recent_comments_style() {
    global $wp_widget_factory;
    if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
      remove_action( 'wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style') );
    }
  }
}

/*
 * -----------------------------------------------------------
 * 6.0 Remove injected CSS from gallery.
 * -----------------------------------------------------------
*/

if ( ! function_exists( 'maqfort_gallery_style' ) ) {

  function maqfort_gallery_style($css) {
    return preg_replace( "!<style type='text/css'>(.*?)</style>!s", '', $css );
  }
}

/*
 * -----------------------------------------------------------
 * 7.0 A better title.
 * -----------------------------------------------------------
*/

if ( ! function_exists( 'rw_title' ) ) {
  // http://www.deluxeblogtips.com/2012/03/better-title-meta-tag.html
  function rw_title( $title, $sep, $seplocation ) {
    global $page, $paged;

    // Don't affect in feeds.
    if ( is_feed() ) return $title;

    // Add the blog's name.
    if ( 'right' == $seplocation ) {
      $title .= get_bloginfo( 'name' );
    } else {
      $title = get_bloginfo( 'name' ) . $title;
    }

    // Add the blog description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );

    if ( $site_description && ( is_home() || is_front_page() ) ) {
      $title .= " {$sep} {$site_description}";
    }

    // Add a page number if necessary.
    if ( $paged >= 2 || $page >= 2 ) {
      $title .= " {$sep} " . sprintf( __( 'Página %s', 'amob' ), max( $paged, $page ) );
    }

    return $title;

  }
}

/*
 * -----------------------------------------------------------
 * 8.0 Remove the p from around images.
 * -----------------------------------------------------------
*/

if ( ! function_exists( 'maqfort_filter_ptags_on_images' ) ) {
  function maqfort_filter_ptags_on_images($content){
    return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
  }
}

/*
 * -----------------------------------------------------------
 * 9.0 Excerpt lenght
 * -----------------------------------------------------------
*/

if ( ! function_exists( 'maqfort_excerpt_length' ) ) {

  function maqfort_excerpt_length( $length ) {
    return 14;
  }

}

add_filter( 'excerpt_length', 'maqfort_excerpt_length', 999 );
