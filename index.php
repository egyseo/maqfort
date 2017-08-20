<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
<div class="container-fluid">
  <div class="row">
    <?php while ( have_posts() ) : the_post();
    ?>
      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <article class="">
          <header>
            <?php the_title(); ?>
          </header>
          <?php
            the_content();
            the_date();
            the_tags(); ?>
        </article>
      </div>
    <?php
    endwhile; ?>


<?php endif; ?>
  </div>
</div>


<?php get_footer(); ?>
