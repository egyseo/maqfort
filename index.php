<?php

get_header();

$desc = get_theme_mod('news_page_desc');
?>
  <div class="container container-fluid">
    <div class="row">
      <div class="col-xs-12">
        <h1><?php _e( 'Notícias', 'maqfort' ); ?></h1>
        <?php if($desc) : ?>
          <p><?php echo esc_html($desc); ?></p>
        <?php endif; ?>
      </div>
    </div>
    <div class="row">
      <?php
      if ( have_posts() ) :
        while ( have_posts() ) : the_post();
          get_template_part( 'template-parts/post/content', 'card' );
        endwhile;
        mf_pagination();
      else :
        get_template_part( 'template-parts/content', 'none' );
      endif; ?>
    </div>
  </div>
<?php get_footer();
