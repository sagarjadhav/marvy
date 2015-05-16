<?php
/**
 * Template Name: Home Page
 * @package Marvy
 */
get_header();
?>

<div class="home-banner">
	<h1>Marvy WordPress Theme</h1>
	<?php echo get_theme_mod( 'home_banner_section' ); ?>
	<?php echo get_option( 'home_banner_color' ); ?>

	<div id="content">
		This is the content. <a href="#">This is an anchor</a> so that we can tell the Theme Customizer is working.
		<br>
		<br>

		home_banner_color: <?php echo get_option( 'home_banner_color' ); ?>
		color: <?php echo get_theme_mod( 'tcx_link_color' ); ?>
		Disply: <?php echo get_theme_mod( 'tcx_display_header' ); ?>
	</div><!-- /#content -->
</div>

<?php
// Footer
get_footer();
