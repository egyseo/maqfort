<?php
/**
 * -----------------------------------------------------------
 * The theme searchform template.
 * -----------------------------------------------------------
 */

?>

<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">

	<div class="input-group">

		<input type="search" id="s" name="s" value="<?php the_search_query(); ?>" placeholder="<?php esc_html_e( 'Procurar...', 'maqfort' ); ?>" class="input-search" />

		<button type="submit" id="searchsubmit" ><i class="fa fa-search" aria-hidden="true"></i></button>

	</div>

</form>
