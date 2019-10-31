<?php
/**
 * -----------------------------------------------------------
 * The theme main header template.
 *
 * @package maqfort
 * -----------------------------------------------------------
 */

?>

<!DOCTYPE html>
<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?>><!--<![endif]-->
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<?php // force Internet Explorer to use the latest rendering engine available. ?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="<?php bloginfo( 'description' ); ?>">
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<meta name="msapplication-TileColor" content="#ed1d24">
	<meta name="theme-color" content="#ed1d24">
	<link rel="icon" href="<?php get_site_icon_url(); ?>">
	<?php do_action( 'mf_touch_icons' ); ?>
	<!--[if IE]>
	<link rel="shortcut icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/favicon.ico">
	<![endif]-->
	<title><?php wp_title( '-', true, 'right' ); ?></title>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> <?php mf_html_tag_schema(); ?> >
	<?php get_template_part( 'template-parts/cookies', 'bar' ); ?>
	<div id="site-wrapper">
		<div id="site-container">
			<div id="mobile-grey-back"></div>
			<?php get_template_part( 'template-parts/header/main', 'header' ); ?>
			<main id="main-content">
