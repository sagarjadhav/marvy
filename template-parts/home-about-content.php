<?php
$page_id = intval( get_option( 'home_about_content' ) );
if ( 0 == $page_id ) {
	return;
}
?>

<div class="home-section home-about-section">
	<div class="container home-about-content">
		<?php
		// Title
		$title = get_the_title( $page_id );

		if ( !empty( $title ) ) {
			echo '<h2>' . $title . '</h2>';
		}

		// Get page excerpt
		marvy_page_content_by_id( $page_id, 'the_excerpt' );

		// Feature Image
		if ( has_post_thumbnail( $page_id ) ) {
			echo get_the_post_thumbnail( $page_id, 'full', array( 'class' => 'about-img' ) );
		}
		?>
	</div>
</div>