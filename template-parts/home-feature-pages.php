<div class="home-section home-feature-pages post-box-style">
	<div class="container">
		<?php
		// Title
		$title = esc_attr( get_option( 'home_feature_pages_title' ) );

		if ( !empty( $title ) ) {
			printf( __( '<h2>%s</h2>', 'marvy' ), $title );
		}

		$page_first	 = intval( get_option( 'home_feature_page_first' ) );
		$page_second = intval( get_option( 'home_feature_page_second' ) );
		$page_third	 = intval( get_option( 'home_feature_page_third' ) );

		$pages = array( $page_first, $page_second, $page_third );
		?>

		<ul class="grid">
			<?php
			foreach ( $pages as $page_id ) {

				if ( 0 != $page_id ) {
					?>

					<li class="grid-cell sm-grid-1-1 md-grid-1-3">
						<div class="img-wrap post">
							<?php
							if ( has_post_thumbnail( $page_id ) ) {
								echo get_the_post_thumbnail( $page_id, 'marvy-thumb' );
							} else {
								echo '<div class="marvy-placeholder"></div>';
							}
							?>
							<h4><a href="<?php echo get_permalink( $page_id ); ?>"><?php echo get_the_title( $page_id ); ?></a></h4>
							<a class="button button-cirlce" href="<?php echo get_permalink( $page_id ); ?>"><i class="ti-link"></i></a>
							<div class="overlay"></div>
						</div>
					</li>
					<?php
				}
			}
			?>
		</ul>
	</div>
</div>