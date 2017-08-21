<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
<div class="container-fluid">
  <div class="row">
    <?php while ( have_posts() ) : the_post();
    ?>
      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
        <article class="post-card">
          <header class="card-header">

          </header>
          <section class="card-body">
            <h3 class="post-title"><?php the_title(); ?></h3>
            <p class="post-date"><?php the_date(); ?></p>
            <?php
              the_content();

              the_tags(); ?>
          </section>
        </article>
      </div>
    <?php
    endwhile; ?>


<?php endif; ?>
  </div>
</div>


<?php get_footer(); ?>
