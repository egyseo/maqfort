<?php
/**
 * -----------------------------------------------------------
 * Block comment
 *
 * @package maqfort
 * -----------------------------------------------------------
 */

function mf_customize_register( $wp_customize ) {

	$wp_customize->add_panel(
		'mf_theme_panel',
		array(
			'priority'       => 1,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => __( 'Definições MAQFORT', 'maqfort' ),
			'description'    => __( 'Configurações no tema/site', 'maqfort' ),
		)
	);

	require get_parent_theme_file_path( '/inc/customizer/class-text-editor-custom-control.php' );
	require get_parent_theme_file_path( '/inc/customizer//alpha-color-picker/alpha-color-picker.php' );
	require get_parent_theme_file_path( '/inc/customizer/general-section.php' );
	require get_parent_theme_file_path( '/inc/customizer/products-section.php' );
	require get_parent_theme_file_path( '/inc/customizer/cookies-section.php' );
	require get_parent_theme_file_path( '/inc/customizer/touch-icon-section.php' );
	require get_parent_theme_file_path( '/inc/customizer/social-icons-section.php' );
	require get_parent_theme_file_path( '/inc/customizer/hero-section.php' );
	require get_parent_theme_file_path( '/inc/customizer/services-section.php' );

}

add_action( 'customize_register', 'mf_customize_register' );
