<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Marvy
 */
if ( !is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area grid-cell sm-grid-1-1 lg-grid-1-4" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div>