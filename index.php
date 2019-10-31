<?php
/**
 * -----------------------------------------------------------
 * The default page to display all posts.
 *
 * @package maqfort
 * -----------------------------------------------------------
 */

get_header();

$news_page_description = get_theme_mod( 'news_page_desc' ); ?>

<div class="container container-fluid">
	<div class="row">
		<div class="col-xs-12">
			<h1><?php esc_html_e( 'Notícias', 'maqfort' ); ?></h1>
			<?php
			if ( $news_page_description ) :
				echo '<p>' , esc_html( $news_page_description ) , '</p>';
			endif;
			?>
		</div>
	</div>
	<div class="row">
	<?php
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/post/content', 'card' );
		endwhile;
		mf_pagination();
		else :
			get_template_part( 'template-parts/content', 'none' );
	endif;
		?>
	</div>
</div>

<?php

get_footer();
