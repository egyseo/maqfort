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
require_once dirname( __FILE__ ) . '/lib/cmb2/cmb2-post-search/cmb-field-post-search-ajax.php';
require_once dirname( __FILE__ ) . '/custom-metabox/home-page.php';
require_once dirname( __FILE__ ) . '/custom-metabox/contact-page.php';
require_once dirname( __FILE__ ) . '/custom-metabox/service-page.php';
require_once dirname( __FILE__ ) . '/custom-metabox/produtos.php';
require_once dirname( __FILE__ ) . '/custom-metabox/related-posts.php';
