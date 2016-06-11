<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Marvy
 */

get_header(); ?>

<div class="grid entry-grid">

	<div id="primary" class="content-area grid-cell">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<div class="not-found-tag"><?php esc_html_e( '404', 'marvy' ); ?></div>
					<h1 class="page-title"><?php esc_html_e( 'The page your are looking for is not avaiable. Please search another', 'marvy' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content entry-content">
					<?php get_search_form(); ?>
				</div><!-- .page-content -->
				
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

</div>

<?php get_footer(); ?>