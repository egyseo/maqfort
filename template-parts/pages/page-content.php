<?php
/**
 * -----------------------------------------------------------
 * Default page template for the theme.
 *
 * @package maqfort
 * -----------------------------------------------------------
 */

$add_class      = '';
$add_css        = '';
$thumbnail      = get_the_post_thumbnail_url( get_the_ID(), 'full' );
$banner_overlay = get_theme_mod( 'mf_page_headers_banners_overlay' );

if ( has_post_thumbnail() ) :
	$add_class = 'page-header-background';
	$add_css   = 'style="background-image: linear-gradient( ' . esc_attr( $banner_overlay ) . ', ' . esc_attr( $banner_overlay ) . ' ), url(' . $thumbnail . ');"';
endif;

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="page-header <?php echo esc_html( $add_class ); ?>"  <?php echo wp_kses_post( $add_css ); ?> >
		<div class="container container-fluid">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<?php the_title( '<h1 class="page-title"><span>', '</span></h1>' ); ?>
				</div><!-- .col -->
			</div><!-- .row  -->
		</div><!-- .container -->
	</header><!-- .page-header -->
	<?php do_action( 'breadcrumbs' ); ?>
	<section class="page-content">
		<div class="container container-fluid">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<?php the_content(); ?>
				</div><!-- .row -->
			</div><!-- .row -->
		</div><!-- .container -->
	</section><!-- .page-content -->
</article>
