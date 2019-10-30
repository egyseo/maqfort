<?php
/**
 * -----------------------------------------------------------
 * The theme main footer template.
 *
 * @package maqfort
 * -----------------------------------------------------------
 */

?>

			</main>
			<footer id="main-footer" role="footer-wrapper" itemscope itemtype="http://schema.org/WPFooter">
				<?php get_template_part( 'template-parts/footer', 'widgets' ); ?>
				<?php get_template_part( 'template-parts/footer', 'extras' ); ?>
				<?php get_template_part( 'template-parts/footer', 'copyright' ); ?>
			</footer><!-- #main-footer -->
			<a href="javascript:" id="return-to-top" rel="nofollow"><i class="fa fa-chevron-up" aria-hidden="true"></i></a>
			<?php wp_footer(); ?>
		</div><!-- .site-container -->
	</div><!-- .site-wrapper -->
</body>
</html>
