<!DOCTYPE html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?>><!--<![endif]-->

<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <?php // force Internet Explorer to use the latest rendering engine available ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php wp_title('-', true, 'right' ); ?></title>
    <meta name="description" content="<?php bloginfo( 'description' ); ?>">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <!--[if IE]>
    	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
    <![endif]-->
    <?php // or, set /favicon.ico for IE10 win ?>
    <meta name="msapplication-TileColor" content="#ed1d24">
    <meta name="theme-color" content="#ed1d24">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">


    <!-- Google Tag Manager -->
      <script>
        (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});
        var f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';
        j.async=true;
        j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;
        f.parentNode.insertBefore(j,f);
        })
        (window,document,'script','dataLayer','GTM-WB7PJ44');
      </script>
    <!-- End Google Tag Manager -->


    <!-- Google Analytics -->

    <!-- End Google Analytics -->

    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?> <?php maqfort_html_tag_schema(); ?> >

    <!-- Google Tag Manager (noscript) -->
      <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WB7PJ44" height="0" width="0" style="display:none;visibility:hidden"></iframe>
      </noscript>
    <!-- End Google Tag Manager (noscript) -->

    <?php get_template_part( 'template-parts/cookies', 'bar' ); ?>

    <div id="site-wrapper">
      <div id="site-container">

        <?php get_template_part( 'template-parts/header/main', 'header'); ?>

        <main id="main-content">
