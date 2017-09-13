<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
  <a href="<?php the_permalink(); ?>" class="card-link">
    <article class="post-card">
      <header class="card-header">


      </header>
      <section class="card-body">
        <h3 class="post-title"><?php the_title(); ?></h3>
        <p class="post-date"><?php the_date(); ?></p>
        <?php the_content(); ?>
      </section>
    </article>
  </a>
</div>
