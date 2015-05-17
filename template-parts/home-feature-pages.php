<div class="home-feature-pages home-section">
	<div class="row">

		<div class="column large-12">
			<h2><?php echo get_option( 'home_feature_pages_title' ); ?></h2>

			<ul class="large-block-grid-3">
				<li>
					<div class="img-wrap">
						<?php
						$page_first = get_option( 'home_feature_page_first' );
						echo get_the_post_thumbnail( $page_first, 'thumbnail' );
						?>
						<h4>
							<a href="<?php echo get_permalink( $page_first ); ?>"><?php echo get_the_title( $page_first ); ?></a>
						</h4>
					</div>
				</li>

				<li>
					<div class="img-wrap">
						<?php
						$page_second = get_option( 'home_feature_page_second' );
						echo get_the_post_thumbnail( $page_second, 'thumbnail' );
						?>
						<h4>
							<a href="<?php echo get_permalink( $page_second ); ?>"><?php echo get_the_title( $page_second ); ?></a>
						</h4>
					</div>
				</li>

				<li>
					<div class="img-wrap">
						<?php
						$page_third = get_option( 'home_feature_page_third' );
						echo get_the_post_thumbnail( $page_third, 'thumbnail' );
						?>
						<h4>
							<a href="<?php echo get_permalink( $page_third ); ?>"><?php echo get_the_title( $page_third ); ?></a>
						</h4>
					</div>
				</li>
			</ul>
		</div>

	</div>
</div>