<?php
$page_id = intval( get_option( 'home_banner_content' ) );

if ( 0 == $page_id ) {
	return;
}
?>

<div class="home-section home-banner">
	<div class="container">
		<div class="grid">
			<div class="grid-cell grid-cell-center">
				<div class="banner-content">
					<?php marvy_page_content_by_id( $page_id, 'the_content' ); ?>
				</div>
			</div>
		</div>
	</div>
</div>