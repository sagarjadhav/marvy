<div class="home-section home-latest-blog">

	<h2><?php echo get_option( 'home_blog_title' ); ?></h2>

	<div class="row">

		<?php
		$args = array( 'posts_per_page' => 3, 'ignore_sticky_posts' => 1 );

		// The Query
		$the_query = new WP_Query( $args );

		if ( $the_query->have_posts() ) :
			?>

			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'column large-4 medium-4 small-12 blog-item' ); ?>>

					<?php the_post_thumbnail(); ?>

					<header class="entry-header">
						<?php the_title( sprintf( '<h4 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' ); ?>
					</header><!-- .entry-header -->

					<footer class="entry-footer">
						<?php marvy_entry_footer(); ?>
					</footer><!-- .entry-footer -->
				</article><!-- #post-## -->

				<?php
			endwhile;

		endif;

		/* Restore original Post Data */
		wp_reset_postdata();
		?>

	</div>
</div>