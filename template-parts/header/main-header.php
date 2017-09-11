<header id="main-header">

  <div class="container-fluid">
    <div class="row between-xs between-sm middle-xs middle-sm middle-md middle-lg">

      <?php get_template_part( 'template-parts/header/site', 'branding' ); ?>

      <?php get_template_part( 'template-parts/header/mobile', 'nav' ); ?>

      <?php get_template_part( 'template-parts/header/main', 'nav' ); ?>

    </div>
  </div>

  <?php get_template_part( 'template-parts/header/searchform', 'top' ); ?>

</header>
