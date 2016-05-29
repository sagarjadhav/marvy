<div class="home-section home-latest-blog">

	<div class="container">

		<h2><?php echo get_option( 'home_blog_title' ); ?></h2>

		<div class="grid">

			<?php
			$args = array( 'posts_per_page' => 3, 'ignore_sticky_posts' => 1 );

			// The Query
			$the_query = new WP_Query( $args );

			if ( $the_query->have_posts() ) :
				?>

				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					<div class="grid-cell">
						<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-item' ); ?>>

							<?php the_post_thumbnail( 'marvy-thumb' ); ?>

							<header class="entry-header">
								<?php the_title( sprintf( '<h4 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' ); ?>
							</header><!-- .entry-header -->

							<footer class="entry-footer">
								<?php marvy_entry_list_footer(); ?>
							</footer><!-- .entry-footer -->
						</article><!-- #post-## -->

					</div>

					<?php
				endwhile;

			endif;

			/* Restore original Post Data */
			wp_reset_postdata();
			?>

		</div>

	</div>

</div>