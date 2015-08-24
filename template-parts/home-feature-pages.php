<div class="home-feature-pages home-section">

	<h2><?php echo get_option( 'home_feature_pages_title' ); ?></h2>

	<?php
	$page_first = get_option( 'home_feature_page_first' );
	$page_second = get_option( 'home_feature_page_second' );
	$page_third = get_option( 'home_feature_page_third' );

	$pages = array( $page_first, $page_second, $page_third );
	?>

	<ul class="row">

		<?php
		foreach ( $pages as $page ) {

			if ( 0 != $page ) {
				?>

				<li class="column large-4 medium-4 small-12">

					<div class="img-wrap">
						<?php echo get_the_post_thumbnail( $page, 'thumbnail' ); ?>

						<h4>
							<a href="<?php echo get_permalink( $page ); ?>"><?php echo get_the_title( $page ); ?></a>
						</h4>
					</div>

				</li>

				<?php
			}
		}
		?>
	</ul>

</div>