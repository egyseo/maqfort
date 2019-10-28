<?php
/**
 * -----------------------------------------------------------
 * The theme header template.
 * -----------------------------------------------------------
 */

?>
<header id="main-header" class="main-header">
	<?php get_template_part( 'template-parts/header/searchform', 'top' ); ?>
	<div class="container container-fluid">
		<div class="row between-xs between-sm middle-xs middle-sm middle-md middle-lg">
		<?php get_template_part( 'template-parts/header/site', 'branding' ); ?>
		<?php get_template_part( 'template-parts/header/mobile', 'nav' ); ?>
		<?php get_template_part( 'template-parts/header/main', 'nav' ); ?>
		</div>
	</div>
</header>
