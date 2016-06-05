<div class="home-section home-feature-pages post-box-style">

	<div class="container">

		<h2><?php echo get_option( 'home_feature_pages_title' ); ?></h2>

		<?php
		$page_first	 = get_option( 'home_feature_page_first' );
		$page_second = get_option( 'home_feature_page_second' );
		$page_third	 = get_option( 'home_feature_page_third' );

		$pages = array( $page_first, $page_second, $page_third );
		?>

		<ul class="grid">

			<?php
			foreach ( $pages as $page ) {

				if ( 0 != $page ) {
					?>

					<li class="grid-cell">
						<div class="img-wrap post">
							<?php echo get_the_post_thumbnail( $page, 'marvy-thumb' ); ?>
							<h4>
								<a href="<?php echo get_permalink( $page ); ?>"><?php echo get_the_title( $page ); ?></a>
							</h4>

							<a class="button button-cirlce" href="<?php echo get_permalink( $page ); ?>"><i class="ti-link"></i></a>

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