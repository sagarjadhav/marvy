<?php
if ( ! function_exists( 'marvy_customize_css' ) ) {

	function marvy_customize_css() {
		?>

		<style>
			.site-header { background-color:<?php echo get_option( 'home_banner_bg_color' ); ?>; }
		</style>

		<?php
	}

	add_action( 'wp_head', 'marvy_customize_css' );
}
