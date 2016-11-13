<div class="home-section home-banner">

	<div class="container">

		<div class="grid">

			<div class="grid-cell grid-cell-center">

				<div class="banner-content">
					<?php
					$page_id = get_option( 'home_banner_content' );
					// get page excerpt
					marvy_page_content_by_id( $page_id );
					?>
				</div>

				<a class="button invert" href="<?php echo get_permalink( $page_id ); ?>"><?php echo get_option( 'home_banner_button_text' ); ?></a>

			</div>

		</div>

	</div>

</div>