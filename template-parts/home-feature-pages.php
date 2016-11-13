<div class="home-section home-feature-pages post-box-style">
	<div class="container">
		<?php
		// Title
		$title = esc_attr__( get_option( 'home_feature_pages_title' ), 'marvy' );

		if ( !empty( $title ) ) {
			echo '<h2>' . $title . '</h2>';
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

					<li class="grid-cell">
						<div class="img-wrap post">
							<?php
							if ( has_post_thumbnail( $page_id ) ) {
								echo get_the_post_thumbnail( $page_id, 'marvy-thumb' );
							} else {
								echo '<div class="marvy-placeholder"></div>';
							}
							?>
							<h4><a href="<?php echo get_permalink( $page ); ?>"><?php echo get_the_title( $page_id ); ?></a></h4>
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