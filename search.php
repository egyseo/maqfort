<?php
/**
 * -----------------------------------------------------------
 * The theme template default template to display search results.
 *
 * @package maqfort
 * -----------------------------------------------------------
 */

get_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( have_posts() ) : ?>
	<header class="search-header">
		<div class="container container-fluid">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<h1 class="page-title"><?php echo esc_html__( 'Resultados de pesquisa para:', 'maqfort' ); ?><span> <?php the_search_query(); ?></span></h1>
				</div><!-- .col -->
			</div><!-- row -->
		</div><!-- .container -->
	</header><!-- .search-header -->
	<section class="search-page">
		<div class="container container-fluid">
			<div class="row">
			<?php
			while ( have_posts() ) :
				the_post();
				do_action( 'mf_loop' );
			endwhile;
			else :
				get_template_part( 'template-parts/post/content', 'none' );
			endif;
			?>
		</div><!-- .row -->
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<?php mf_pagination(); ?>
			</div><!-- .col -->
			</div><!-- .row -->
		</div><!-- .container -->
	</section><!-- .search-page -->
</article><!-- article -->

<?php get_footer(); ?>
