<?php
/*
 * Customize CSS styles
 */
if ( !function_exists( 'marvy_customize_css' ) ) {

	function marvy_customize_css() {
		$link_rgb	 = marvy_hex2rgb( sanitize_hex_color( get_option( 'link_color' ) ) );
		$banner_bg	 = marvy_hex2rgb( sanitize_hex_color( get_option( 'home_banner_bg_color' ) ) );
		?>
		<style>
			.site-header { background-color: rgba(<?php echo $banner_bg; ?>, 0.94); }

			.nav-site-title,
			.home-banner { background-color: rgba(<?php echo $banner_bg; ?>, 1); }
			.home-banner .button.invert { color: rgba(<?php echo $banner_bg; ?>, 1); }

			a,
			.home-theme-features .icon,
			.footer-widget a:hover,
			.entry-title a:hover,
			.entry-footer a:hover,
			.comment-meta a:hover,
			.entry-footer i,
			.button.button-cirlce,
			.site-footer a:hover {
				color: rgba(<?php echo $link_rgb; ?>, 1);
			}

			.button,
			#submit {
				background-color: rgba(<?php echo $link_rgb; ?>, 1);
			}

			.overlay {
				background-color: rgba(<?php echo $link_rgb; ?>, 0.94);
			}
		</style>
		<?php
	}

	add_action( 'wp_head', 'marvy_customize_css' );
}

/*
 * Convert Hex Color to RGB
 */
if ( !function_exists( 'marvy_hex2rgb' ) ) {

	function marvy_hex2rgb( $hex ) {
		$hex = str_replace( '#', '', $hex );

		if ( strlen( $hex ) == 3 ) {
			$r	 = hexdec( substr( $hex, 0, 1 ) . substr( $hex, 0, 1 ) );
			$g	 = hexdec( substr( $hex, 1, 1 ) . substr( $hex, 1, 1 ) );
			$b	 = hexdec( substr( $hex, 2, 1 ) . substr( $hex, 2, 1 ) );
		} else {
			$r	 = hexdec( substr( $hex, 0, 2 ) );
			$g	 = hexdec( substr( $hex, 2, 2 ) );
			$b	 = hexdec( substr( $hex, 4, 2 ) );
		}

		$rgb = array( $r, $g, $b );
		return implode( ',', $rgb ); // returns the rgb values separated by commas
	}

}