<?php
/*
* -----------------------------------------------------------
* Metabox for service page template.
* -----------------------------------------------------------
*/
if ( ! function_exists('mf_service_template') ) {

  function mf_service_template() {

  	$prefix = '_mf_service_template_';

  	/**
  	 * Initiate the metabox
  	 */
  	$cmb = new_cmb2_box( array(
  			'id'            => 'service_details',
  			'title'         => __( 'Services Button', 'maqfort' ),
  			'object_types'  => array( 'page', ), // Post type
        'show_on'      => array( 'key' => 'page-template', 'value' => 'page-service.php' ),
  			'context'       => 'normal',
  			'priority'      => 'high',
  			'show_names'    => true, // Show field names on the left
  			// 'cmb_styles' => false, // false to disable the CMB stylesheet
  			// 'closed'     => true, // Keep the metabox closed by default
  	) );

    $cmb->add_field( array(
        'name' => __( 'Button title', 'maqfort' ),
        'description' => __( 'Insert here the button title.', 'maqfort' ),
        'id'   => $prefix . 'title',
        'type' => 'text',
    ) );

    // Contact form shortcode
    $cmb->add_field( array(
      'name' => __( 'Contact Form Shortcode', 'maqfort' ),
      'desc' => __( 'Insert here the shortcode of the disere contact form.', 'maqfort' ),
      'default' => '',
      'id' => $prefix . 'quote_url',
      'type' => 'text'
    ) );

  }

  add_action( 'cmb2_init', 'mf_service_template' );

}
