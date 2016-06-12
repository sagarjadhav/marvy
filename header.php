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

		<div id="page" class="site">

			<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'marvy' ); ?></a>

			<header id="masthead" class="site-header fixed-header" role="banner">

				<div class="container">

					<div class="grid">

						<div class="grid-cell">
							<div class="site-branding">
								<?php if ( is_front_page() && is_home() ) : ?>
									<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
								<?php else : ?>
									<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
								<?php
								endif;
								?>
							</div>
						</div>

						<div class="grid-cell">
							<nav id="site-navigation" class="main-navigation" role="navigation">
								<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="ti-menu"></i></button>
								<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'container' => false, 'menu_class' => 'primary-menu', ) ); ?>
							</nav>
						</div>

					</div>

				</div>

			</header>

			<div class="mobile-menu-wrapper">
				<p class="nav-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'mobile-menu', 'container' => false, 'menu_class' => 'mobile-menu', 'depth' => 2, ) ); ?>
			</div>

			<?php
			$class = is_page_template( 'homepage.php' ) ? '' : ' container';
			?>

			<div id="content" class="site-content<?php echo $class; ?>">