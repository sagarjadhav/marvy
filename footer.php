<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Marvy
 */
?>

</div><!-- #content -->

<?php if ( is_active_sidebar( 'sidebar-2' ) ) { ?>

	<div class="footer-widget-area">

		<div class="container">

			<div class="grid">
				<?php dynamic_sidebar( 'sidebar-2' ); ?>
			</div>

		</div>

	</div>

<?php } ?>

<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="container site-info">
		<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'marvy' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'marvy' ), 'WordPress' ); ?></a>
		<span class="sep"> | </span>
		<?php printf( esc_html__( 'Theme: %1$s', 'marvy' ), 'Marvy' ); ?>
	</div><!-- .site-info -->
</footer><!-- #colophon -->

</div><!-- #page -->

<div class="nav-overlay"></div>

<?php wp_footer(); ?>

</body>
</html>