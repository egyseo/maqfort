
<div id="form-top-wrapper" class="container-fluid">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <form role="search" method="get" id="searchform-top" class="searchform-top" action="<?php echo home_url( '/' ); ?>">
        <input type="search" id="s" name="s" value="<?php the_search_query(); ?>" placeholder="<?php _e('What would you like to search for?', 'maqfort');  ?>" class="input-search-top" />
        <button type="submit" id="search-submit-top" ><i class="fa fa-search" aria-hidden="true"></i></button>
      </form>
    </div>
  </div>
</div>
<div class="search-top">
  <div class="container-fluid">
    <div class="row between-md between-lg">
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <?php maqfort_social_icons(); ?>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <a class="btn-search-top" href="#/"><i class="fa fa-search"></i></a>
      </div>
    </div>
  </div>
</div>
