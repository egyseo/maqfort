<?php

/*
 * -----------------------------------------------------------
 * 1.0 Clean the header.
 * -----------------------------------------------------------
*/

if ( ! function_exists( 'mf_head_cleanup' ) ) {

  function mf_head_cleanup() {
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
    add_filter( 'style_loader_src', 'mf_remove_wp_ver_css_js', 9999 );

    // Remove Wp version from scripts.
    add_filter( 'script_loader_src', 'mf_remove_wp_ver_css_js', 9999 );

  }
}

/*
 * -----------------------------------------------------------
 * 2.0 Remove WP version from RSS.
 * -----------------------------------------------------------
*/

if ( ! function_exists( 'mf_rss_version' ) ) {

  function mf_rss_version() { return ''; }

}

/*
 * -----------------------------------------------------------
 * 3.0 Remove WP version from scripts.
 * -----------------------------------------------------------
*/

if ( ! function_exists( 'mf_remove_wp_ver_css_js' ) ) {

  function mf_remove_wp_ver_css_js( $src ) {
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

if ( ! function_exists( 'mf_remove_wp_widget_recent_comments_style' ) ) {

  function mf_remove_wp_widget_recent_comments_style() {
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

if ( ! function_exists( 'mf_remove_recent_comments_style' ) ) {

  function mf_remove_recent_comments_style() {
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

if ( ! function_exists( 'mf_gallery_style' ) ) {

  function mf_gallery_style($css) {
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
      $title .= " {$sep} " . sprintf( __( 'Page %s', 'maqfort' ), max( $paged, $page ) );
    }

    return $title;

  }
}

/*
 * -----------------------------------------------------------
 * 8.0 Remove the p from around images.
 * -----------------------------------------------------------
*/

if ( ! function_exists( 'mf_filter_ptags_on_images' ) ) {
  function mf_filter_ptags_on_images($content){
    return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
  }
}

/*
 * -----------------------------------------------------------
 * 9.0 Excerpt lenght
 * -----------------------------------------------------------
*/

if ( ! function_exists( 'mf_excerpt_length' ) ) {

  function mf_excerpt_length( $length ) {
    return 14;
  }

}

add_filter( 'excerpt_length', 'mf_excerpt_length', 999 );

/*
 * -----------------------------------------------------------
 * 10.0 Customize the archive title
 * -----------------------------------------------------------
*/
add_filter( 'get_the_archive_title', function ( $title ) {

    if( is_tax() ) {

        $title = single_cat_title( '', false );

    } elseif ( is_tax() ) {

        $title = single_term_title( '', false );

    } elseif ( is_post_type_archive() ) {

        $title = post_type_archive_title( '', false );
    }
    elseif ( is_category() ) {

            $title = single_cat_title( '', false );
    }
    elseif ( is_tag() ) {

            $title = single_tag_title( '', false );
    }
    return $title;

});

/*
 * -----------------------------------------------------------
 * 11.0 This removes the annoying […] to a Read More link
 * -----------------------------------------------------------
*/
if ( ! function_exists( 'mf_excerpt_more' ) ) {

  function mf_excerpt_more($more) {
    global $post;
    // edit here if you like
    return '...';
  }

}

/*
 * -----------------------------------------------------------
 * 11.0 Hide editor on certain posts
 * -----------------------------------------------------------
*/
if ( ! function_exists( 'mf_hide_editor' ) ) {

  function mf_hide_editor() {
      if ( isset( $_GET['post'] ) ) {
      $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
      if( !isset( $post_id ) ) return;
      $template_file = get_post_meta($post_id, '_wp_page_template', true);
      if($template_file == 'page-contacts.php'){//change mycustom-page.php to your thing
          remove_post_type_support('page', 'editor');
      }
      if($template_file == 'page-home.php'){//change mycustom-page.php to your thing
          remove_post_type_support('page', 'editor');
      }

    }
  }

  add_action( 'init', 'mf_hide_editor' );

}

/* -----------------------------------------------------------------------------
 * 12.0 HTML Tag Schema
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'mf_html_tag_schema' ) ) {

	function mf_html_tag_schema() {

		$schema = 'http://schema.org/';

    // Is products post type
    if ( is_singular('products') ) {
      $type = 'Product';
    }

    // Is service page
    elseif ( is_page_template('page-service.php') ) {
      $type = 'Service';
    }

		// Is single post
		elseif( is_single() ) {
			$type = "Article";
		}

		// Is author page
		elseif( is_author() ) {
			$type = 'ProfilePage';
		}

		// Is search results page
		elseif( is_search() ) {
			$type = 'SearchResultsPage';
		}

		else {
			$type = 'WebPage';
		}

		echo 'itemscope="itemscope" itemtype="' . $schema . $type . '"';

	}

}
