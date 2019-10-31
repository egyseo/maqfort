<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


	<?php if ( has_post_thumbnail() ) { ?>

	<header class="page-header-with-img" style="background-color:#525254;background-image:url(<?php the_post_thumbnail_url( 'full' ); ?>); background-position:center; background-repeat:no-repeat; background-size:cover;">

	</header>
	<section class="page-content">
	  <div class="container container-fluid">
		<div class="row">
		  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<?php the_title( '<h1 class="page-title"><span>', '</span></h1>' ); ?>
		  </div>
		</div>

			<?php
			  the_content();

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'maqfort' ),
					'after'  => '</div>',
				)
			);
			?>

	  </div>
	</section>
	<?php } else { ?>
	<header class="page-header">
	  <div class="container container-fluid">
		<div class="row">
		  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<?php the_title( '<h1 class="page-title"><span>', '</span></h1>' ); ?>
		  </div>
		</div>
	  </div>
	</header>
	<section class="page-content">
	  <div class="container container-fluid">

			<?php
			  the_content();

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'maqfort' ),
					'after'  => '</div>',
				)
			);
			?>

	  </div>
	</section>
	<?php } ?>


</article>