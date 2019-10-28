<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
 <header class="page-header">
   <div class="container container-fluid">
     <div class="row">
       <div class="col-xs-12">
         <?php the_title( '<h1 class="page-title"><span>', '</span></h1>' ); ?>
       </div>
     </div>
   </div>
 </header>
 <section class="page-content">
   <div class="container container-fluid">
     <div class="row center-xs middle-xs">


          <?php

            $args = array( 'child_of' => $post->ID, 'sort_column' => 'post_date', 'sort_order' => 'desc' );
            $our_pages = get_pages($args); ?>
           <?php if (!empty($our_pages)) : ?>
             <?php foreach ($our_pages as $key => $page_item) : ?>
               <div class="col-xs-4">
               <article class="post-card">
                 <header class="post-card-header">
                   <?php if ( has_post_thumbnail() ) : ?>
                     <a href="<?php echo esc_url(get_permalink($page_item->ID)); ?>" title="<?php the_title_attribute(); ?>">
                       <figure class="post-card-thumbnail">
                         <?php echo get_the_post_thumbnail($page_item->ID,'maqfort-thumbnail'); ?>
                       </figure>
                     </a>

                   <?php else : ?>
                     <figure class="post-card-thumbnail">
                       <img src="https://via.placeholder.com/370x280" alt="">
                     </figure>
                   <?php endif; ?>
                 </header>
                 <section class="post-card-content">
                   <h3 class="post-card-title"><a href="<?php echo esc_url(get_permalink($page_item->ID)); ?>" title="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>"><?php echo $page_item->post_title ; ?></a></h3>
                 </section>
               </article><!-- article ends -->
               </div>
              <?php endforeach; ?>
            <?php endif; ?>

   </div>
 </section>
</article>
