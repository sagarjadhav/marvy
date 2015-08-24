<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Marvy
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		<div id="page" class="hfeed site">
			<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'marvy' ); ?></a>

			<header id="masthead" class="site-header" role="banner">

				<div class="site-header-inner">

					<div class="row">

						<div class="column large-12">
							<div class="site-branding">
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
								<!--<h2 class="site-description"><?php // bloginfo( 'description' );             ?></h2>-->
							</div><!-- .site-branding -->

							<nav id="site-navigation" class="main-navigation" role="navigation">
								<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'marvy' ); ?></button>
								<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
							</nav><!-- #site-navigation -->
						</div>

					</div>

				</div>

			</header><!-- #masthead -->

			<?php
			$class = is_page_template( 'home-page.php' ) ? '' : ' row';
			?>

			<div id="content" class="site-content<?php echo $class; ?>">