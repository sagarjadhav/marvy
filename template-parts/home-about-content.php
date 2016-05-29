<div class="home-section home-about-section">

	<div class="container home-about-content">

		<h2><?php echo html_entity_decode( get_option( 'home_about_title' ) ); ?></h2>

		<p><?php echo html_entity_decode( get_option( 'home_about_text' ) ); ?></p>

		<?php
		$image_url = get_option( 'home_about_image' );

		if ( empty( $image_url ) ) {
			$image_url = get_template_directory_uri() . '/img/about-img.png';
		}
		?>

		<img class="about-img" src="<?php echo $image_url; ?>" alt="" />

	</div>

</div>