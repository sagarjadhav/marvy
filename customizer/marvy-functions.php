<?php
if ( !function_exists( 'marvy_customize_css' ) ) {

	function marvy_customize_css() {
		?>

		<style>
			.site-header,
			.home-banner { background-color:<?php echo get_option( 'home_banner_bg_color' ); ?>; }

			a,
			.footer-widget a:hover,
			.site-footer a:hover {
				color: <?php echo get_option( 'link_color' ); ?>;
			}
		</style>

		<?php
	}

	add_action( 'wp_head', 'marvy_customize_css' );
}