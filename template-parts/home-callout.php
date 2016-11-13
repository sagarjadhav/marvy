<?php
$page_id = intval( get_option( 'home_callout_content' ) );

if ( 0 == $page_id ) {
	return;
}
?>

<div class="home-section home-download-section">
	<div class="container">
		<div class="home-callout">
			<?php marvy_page_content_by_id( $page_id, 'the_content' ); ?>
		</div>
	</div>
</div>