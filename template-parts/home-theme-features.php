<div class="home-section home-theme-features">
	<div class="container">
		<?php
		// Title
		$title = esc_attr( get_option( 'home_theme_feature_title' ) );

		if ( !empty( $title ) ) {
			printf( __( '<h2>%s</h2>', 'marvy' ), $title );
		}

		// Pages
		$page_first	 = intval( get_option( 'home_theme_feature_1' ) );
		$page_second = intval( get_option( 'home_theme_feature_2' ) );
		$page_third	 = intval( get_option( 'home_theme_feature_3' ) );

		$icon_0	 = esc_attr( get_option( 'home_theme_feature_icon_1' ) );
		$icon_1	 = esc_attr( get_option( 'home_theme_feature_icon_2' ) );
		$icon_2	 = esc_attr( get_option( 'home_theme_feature_icon_3' ) );

		$pages = array_values( compact( 'page_first', 'page_second', 'page_third' ) );
		?>

		<ul class="grid">
			<?php
			foreach ( $pages as $key => $page ) {

				if ( 0 != $page ) {
					?>
					<li class="grid-cell sm-grid-1-1 md-grid-1-3">
						<?php if ( !empty( ${"icon_$key"} ) ) { ?>
							<i class="icon <?php echo ${"icon_$key"}; ?>"></i>
						<?php } ?>

						<h4><?php echo get_the_title( $page ); ?></h4>

						<div class="page-excerpt">
							<?php marvy_page_content_by_id( $page ); ?>
						</div>
					</li>
					<?php
				}
			}
			?>
		</ul>
	</div>
</div>