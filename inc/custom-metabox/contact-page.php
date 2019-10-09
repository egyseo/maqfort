<?php
/*
* -----------------------------------------------------------
* Metabox for contacts page.
* -----------------------------------------------------------
*/
if ( ! function_exists('mf_address') ) {

  function mf_address() {

  	$prefix = '_mf_address_';

  	/**
  	 * Initiate the metabox
  	 */
  	$cmb = new_cmb2_box( array(
  			'id'            => $prefix . 'details',
  			'title'         => __( 'MAQFORT Contacts', 'maqfort' ),
  			'object_types'  => array( 'page' ), // Post type
        'show_on'       => array( 'key' => 'page-template', 'value' => 'page-contacts.php' ),
  			'context'       => 'normal',
  			'priority'      => 'high',
  			'show_names'    => true, // Show field names on the left
  			// 'cmb_styles' => false, // false to disable the CMB stylesheet
  			// 'closed'     => true, // Keep the metabox closed by default
  	) );

    $cmb->add_field( array(
        'name' => __( 'Title', 'maqfort' ),
        'description' => __( '', 'maqfort' ),
        'id'   => $prefix . 'title',
        'type' => 'text',
    ) );
    // text area
    $cmb->add_field( array(
        'name' => __( 'Address', 'maqfort' ),
        'desc' => __( 'Insert address here.', 'maqfort' ),
        'default' => '',
        'id' => $prefix . 'address',
        'type' => 'textarea_small'
    ) );
    $cmb->add_field( array(
        'name' => __( 'Phone', 'maqfort' ),
        'description' => __( 'Insert the phone number here.', 'maqfort' ),
        'id'   => $prefix . 'phone',
        'type' => 'text',
    ) );

    $cmb->add_field( array(
        'name' => __( 'Email', 'maqfort' ),
        'description' => __( 'Insert the phone number here.', 'maqfort' ),
        'id'   => $prefix . 'email',
        'type' => 'text_email',
    ) );

  }

  add_action( 'cmb2_init', 'mf_address' );

}

//contact form metabox
if ( ! function_exists('mf_contact_form') ) {

  function mf_contact_form() {

  	$prefix = 'mf_contact_form_';

  	/**
  	 * Initiate the metabox
  	 */
  	$cmb = new_cmb2_box( array(
  			'id'            => $prefix . 'details',
  			'title'         => __( 'Contact Form', 'maqfort' ),
  			'object_types'  => array( 'page' ), // Post type
        'show_on'       => array( 'key' => 'page-template', 'value' => 'page-contacts.php' ),
  			'context'       => 'normal',
  			'priority'      => 'high',
  			'show_names'    => true, // Show field names on the left
  			// 'cmb_styles' => false, // false to disable the CMB stylesheet
  			// 'closed'     => true, // Keep the metabox closed by default
  	) );

    $cmb->add_field( array(
        'name' => __( 'Title', 'maqfort' ),
        'description' => __( 'Form Title', 'maqfort' ),
        'id'   => $prefix . 'title',
        'type' => 'text',
    ) );

    // text area
    $cmb->add_field( array(
        'name' => __( 'Description', 'maqfort' ),
        'desc' => __( 'Description here', 'maqfort' ),
        'default' => '',
        'id' => $prefix . 'description',
        'type' => 'text'
    ) );

    $cmb->add_field( array(
        'name' => __( 'Form Shortcode', 'maqfort' ),
        'description' => __( 'Insert here the form shortcode', 'maqfort' ),
        'id'   => $prefix . 'shortcode',
        'type' => 'text',
    ) );


  }

  add_action( 'cmb2_init', 'mf_contact_form' );

}
