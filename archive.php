<?php
/**
 * -----------------------------------------------------------
 * The theme default archive page template.
 *
 * @package maqfort
 * -----------------------------------------------------------
 */

$add_class      = '';
$add_css        = '';
$thumbnail      = wp_get_attachment_image_url( get_term_meta( get_queried_object()->term_id, 'customtaxonomie_mb_banner_image_id', 1 ), 'maqfort-header' );
$banner_overlay = get_theme_mod( 'mf_page_headers_banners_overlay' );

if ( has_post_thumbnail() ) :
	$add_class = 'page-header-background';
	$add_css   = 'style="background-image: linear-gradient( ' . esc_attr( $banner_overlay ) . ', ' . esc_attr( $banner_overlay ) . ' ), url(' . $thumbnail . ');"';
endif;

get_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="page-header <?php echo esc_html( $add_class ); ?>" <?php echo wp_kses_post( $add_css ); ?> >
		<div class="container container-fluid">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<?php
					the_archive_title( '<h1 class="page-title"><span>', '</span></h1>' );
					if ( is_tax() ) :
						echo term_description();
					endif;
					?>
				</div><!-- .col -->
			</div><!-- .row -->
		</div><!-- .container -->
	</header><!-- .page-header-background -->
	<?php if ( have_posts() ) : ?>
		<?php do_action( 'breadcrumbs' ); ?>
		<section class="page-content">
			<div class="container container-fluid">
				<div class="row">
					<?php
					while ( have_posts() ) :
						the_post();
						do_action( 'mf_loop' );
					endwhile;
					?>
				</div><!-- .row -->
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<?php mf_pagination(); ?>
					</div><!-- .col -->
				</div><!-- .row -->
			</div><!-- .container -->
		</section><!-- .page-content -->
		<?php
		else :
			get_template_part( 'template-parts/post/content', 'none' );
		endif;
		?>
</article>

<?php
get_footer();
