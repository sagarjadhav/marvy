<div class="home-section home-theme-features">

	<div class="container">

		<h2><?php echo get_option( 'home_theme_feature_title' ); ?></h2>

		<?php
		$page_first	 = get_option( 'home_theme_feature_1' );
		$page_second = get_option( 'home_theme_feature_2' );
		$page_third	 = get_option( 'home_theme_feature_3' );

		$icon_1	 = get_option( 'home_theme_feature_icon_1' );
		$icon_2	 = get_option( 'home_theme_feature_icon_2' );
		$icon_3	 = get_option( 'home_theme_feature_icon_3' );

		$pages = array( $page_first, $page_second, $page_third );
		?>

		<ul class="grid">

			<?php
			foreach ( $pages as $page ) {

				if ( 0 != $page ) {
					?>

					<li class="grid-cell">
						<i class="icon <?php echo get_option( 'home_theme_feature_icon_1' ); ?>"></i>
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