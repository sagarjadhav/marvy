<div class="home-section home-download-section">

	<div class="container">

		<div class="home-callout">
			<?php
			$page_id = get_option( 'home_callout_content' );
			// get page content
			marvy_page_content_by_id( $page_id, 'the_content' );
			?>
		</div>

	</div>

</div>