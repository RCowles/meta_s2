<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package meta_s2
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		
		<ul id="footer-widgets">
			<?php dynamic_sidebar( 'footer-widgets' ); ?>
		</ul>
	
		<div class="site-info">
			<?php do_action( 'meta_s2_credits' ); ?>
			<a href="http://wordpress.org/" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'meta_s2' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s', 'meta_s2' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'meta_s2' ), 'meta_s2', '<a href="http://ryanscowles.com" rel="designer">Ryan Cowles</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>