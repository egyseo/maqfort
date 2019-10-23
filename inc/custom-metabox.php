<?php
/*
 * -----------------------------------------------------------
 * Custom Meta Boxes
 * -----------------------------------------------------------
 */

/*----------- Initiat CMB2 -----------*/
if ( file_exists( dirname( __FILE__ ) . '/lib/cmb2/cmb2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/lib/cmb2/cmb2/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/lib/CMB2/CMB2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/lib/CMB2/CMB2/init.php';
}


/*----------- Get custom metaboxes -----------*/
require_once dirname( __FILE__ ) . '/lib/CMB2/cmb2-post-search/cmb-field-post-search-ajax.php';
require_once dirname( __FILE__ ) . '/lib/CMB2/cmb2-icon-picker/cmb2-fontawesome-picker.php';
require_once dirname( __FILE__ ) . '/custom-metabox/home-page-metabox.php';
require_once dirname( __FILE__ ) . '/custom-metabox/contact-page-metabox.php';
require_once dirname( __FILE__ ) . '/custom-metabox/service-page-metabox.php';
require_once dirname( __FILE__ ) . '/custom-metabox/products-page-metabox.php';
require_once dirname( __FILE__ ) . '/custom-metabox/related-posts-metabox.php';
require_once dirname( __FILE__ ) . '/custom-metabox/taxonomie-metabox.php';
require_once dirname( __FILE__ ) . '/custom-metabox/tables-metabox.php';
