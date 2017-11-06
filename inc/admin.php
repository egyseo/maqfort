<?php
/*
This file handles the admin area and functions.
You can use this file to make changes to the
dashboard. Updates to this page are coming soon.
It's turned off by default, but you can call it
via the functions file.


	- removing some default WordPress dashboard widgets
	- an example custom dashboard widget
	- adding custom login css
	- changing text in footer of admin


*/

/************* DASHBOARD WIDGETS *****************/

// disable default dashboard widgets
function disable_default_dashboard_widgets() {
	global $wp_meta_boxes;
	// unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);    // Right Now Widget
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);        // Activity Widget
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']); // Comments Widget
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);  // Incoming Links Widget
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);         // Plugins Widget

	// unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);    // Quick Press Widget
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);     // Recent Drafts Widget
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);           //
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);         //

	// remove plugin dashboard boxes
	unset($wp_meta_boxes['dashboard']['normal']['core']['yoast_db_widget']);           // Yoast's SEO Plugin Widget
	unset($wp_meta_boxes['dashboard']['normal']['core']['rg_forms_dashboard']);        // Gravity Forms Plugin Widget
	unset($wp_meta_boxes['dashboard']['normal']['core']['bbp-dashboard-right-now']);   // bbPress Plugin Widget

}

/*
Now let's talk about adding your own custom Dashboard widget.
Sometimes you want to show clients feeds relative to their
site's content. For example, the NBA.com feed for a sports
site. Here is an example Dashboard Widget that displays recent
entries from an RSS Feed.

For more information on creating Dashboard Widgets, view:
http://digwp.com/2010/10/customize-wordpress-dashboard/
*/


// removing the dashboard widgets
add_action( 'wp_dashboard_setup', 'disable_default_dashboard_widgets' );
// adding any custom widgets
//add_action( 'wp_dashboard_setup', 'maqfort_custom_dashboard_widgets' );


/************* CUSTOM LOGIN PAGE *****************/

// calling your own login css so you can style it

//Updated to proper 'enqueue' method
//http://codex.wordpress.org/Plugin_API/Action_Reference/login_enqueue_scripts
function maqfort_login_css() {
	wp_enqueue_style( 'maqfort_login_css', get_template_directory_uri() . '/assets/css/admin-login.css', false );
}

// changing the logo link from wordpress.org to your site
function maqfort_login_url() {  return home_url(); }

// changing the alt text on the logo to show your site name
function maqfort_login_title() { return get_option( 'blogname' ); }

// calling it only on the login page
add_action( 'login_enqueue_scripts', 'maqfort_login_css', 10 );
add_filter( 'login_headerurl', 'maqfort_login_url' );
add_filter( 'login_headertitle', 'maqfort_login_title' );


/************* CUSTOMIZE ADMIN *******************/

/*
I don't really recommend editing the admin too much
as things may get funky if WordPress updates. Here
are a few funtions which you can choose to use if
you like.
*/

// Custom Backend Footer
function maqfort_custom_admin_footer() {
	_e( '<span id="footer-thankyou">Developed by <a href="http://crew.pt" target="_blank">Crew</a></span>.', 'maqfort' );
}

// adding it to the admin area
add_filter( 'admin_footer_text', 'maqfort_custom_admin_footer' );


// Change login page logo
function maqfort_login_logo() {
  echo '<style type="text/css">
    h1 a {
      background-image: url(' . get_template_directory_uri() . '/assets/images/maqfort-logo.svg) !important;
    }
  </style>';
}
add_action('login_head', 'maqfort_login_logo');


//remove WordPress logo from admin bar
add_action( 'admin_bar_menu', 'remove_wp_links', 999 );
function remove_wp_links( $wp_admin_bar ) {
  $wp_admin_bar->remove_node( 'wp-logo' );
}


// Custom WordPress Admin Color Scheme
function custom_admin_css() {
	wp_enqueue_style( 'admin_css', get_template_directory_uri() . '/assets/css/admin.css' );
}
add_action('admin_print_styles', 'custom_admin_css' );


//
function my_footer_shh() {
  remove_filter( 'update_footer', 'core_update_footer' );
}
add_action( 'admin_menu', 'my_footer_shh' );
