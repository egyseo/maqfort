<?php
/*
 * -----------------------------------------------------------
 * The content of product single.
 * -----------------------------------------------------------
 */


?>
<article class="product-article" id="post-<?php the_ID(); ?> post-content" <?php post_class(); ?>>
	<?php do_action( 'breadcrumbs' ); ?>
  <section class="product-content">
	<div class="container container-fluid">
	  <div class="row">
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<?php get_template_part( 'template-parts/products/product', 'images' ); ?>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<?php the_title( '<h1 class="product-title">', '</h1>' ); ?>
			<?php the_content(); ?>
			<?php get_template_part( 'template-parts/products/product', 'buttons' ); ?>
		</div>
	  </div>
	</div>
  </section>
	<?php get_template_part( 'template-parts/products/product', 'videos' ); ?>
	<?php get_template_part( 'template-parts/products/product', 'tables' ); ?>
	<?php get_template_part( 'template-parts/products/products', 'related' ); ?>
</article>
