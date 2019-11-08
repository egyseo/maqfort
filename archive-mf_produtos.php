<?php
/**
 * -----------------------------------------------------------
 * The theme custom archive page to display all term from custom taxonomie.
 *
 * @package maqfort
 * -----------------------------------------------------------
 */

$products_archive_description = get_theme_mod( 'mf_products_archives_description' );
$products_archive_banner      = get_theme_mod( 'mf_products_archives_banner' );

$add_class = '';
$add_css   = '';

if ( $products_archive_banner ) :
	$add_class = 'page-header-background';
	$add_css   = 'style="background-image: linear-gradient( rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7) ), url(' . esc_url( $products_archive_banner ) . ');"';
endif;

get_header();

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="page-header <?php echo esc_html( $add_class ); ?>"  <?php echo wp_kses_post( $add_css ); ?> >
		<div class="container container-fluid">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<?php the_archive_title( '<h1 class="page-title"><span>', '</span></h1>' ); ?>
					<?php if ( $products_archive_description ) : ?>
						<p><?php echo esc_html( $products_archive_description ); ?></p>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</header>
	<?php do_action( 'breadcrumbs' ); ?>
	<section class="page-content">
		<div class="container container-fluid">
			<div class="row">
			<?php
			$products_taxonomies = get_terms(
				array(
					'taxonomy'   => 'mf_tipos_de_produtos',
					'hide_empty' => true,
					'parent'     => 0,
					'orderby'    => 'menu_order',
					'order'      => 'ASC',
				)
			);
			if ( $products_taxonomies ) :
				foreach ( $products_taxonomies as $product_cat ) :
					if ( 0 === $product_cat->parent ) :

						$term_link = get_term_link( $product_cat );
						$image     = wp_get_attachment_image( get_term_meta( $product_cat->term_id, 'customtaxonomie_mb_image_id', 1 ), 'full' );

						$output = '<div class="col-xs-12 col-md-4"><article class="card"><header class="card-header">';

						if ( ! empty( $image ) ) :
							$output .= '<a href="' . esc_url( $term_link ) . '">' . $image . '</a>';
						else :
							$output .= '<a href="' . esc_url( $term_link ) . '"><img src="' . get_template_directory_uri() . '/assets/images/placeholder.png" alt="imagem provisória"></a>';
						endif;

						$output .= '</header>';
						$output .= '<div class="card-content"><a href="' . esc_url( $term_link ) . '"><h2 class="card-title">' . esc_attr( $product_cat->name ) . '</h2></a>';
						$output .= '<p class="card-desc">' . mf_truncate( esc_html( $product_cat->description ), 90 ) . '</p></div>';
						$output .= '<footer class="card-footer"><a href="' . esc_url( $term_link ) . '"><i class="fa fa-chevron-right" aria-hidden="true"></i></a></footer></article></div>';

						echo wp_kses_post( $output );

					endif;

				endforeach;

			endif;
			?>
			</div>
		</div>
	</section>
</article>

<?php

get_footer();
