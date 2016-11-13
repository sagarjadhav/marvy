<div class="home-section home-about-section">

	<div class="container home-about-content">

		<h2><?php echo html_entity_decode( get_option( 'home_about_title' ) ); ?></h2>

		<?php
		$page_id = get_option( 'home_about_content' );
		// get page excerpt
		marvy_page_content_by_id( $page_id );

		if ( has_post_thumbnail( $page_id ) ) {
			echo get_the_post_thumbnail( $page_id, 'full', array( 'class' => 'about-img' ) );
		}
		?>

	</div>

</div>