<div class="home-section home-latest-blog post-box-style">
	<div class="container">
		<?php
		// Title
		$title = esc_attr( get_option( 'home_blog_title' ) );

		if ( !empty( $title ) ) {
			printf( __( '<h2>%s</h2>', 'marvy' ), $title );
		}
		?>

		<div class="grid">
			<?php
			$args = array( 'posts_per_page' => 3, 'ignore_sticky_posts' => 1 );

			// The Query
			$the_query = new WP_Query( $args );

			if ( $the_query->have_posts() ) :
				?>

				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					<div class="grid-cell sm-grid-1-1 md-grid-1-3">
						<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-item' ); ?>>

							<?php if ( has_post_thumbnail() ) { ?>
								<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'marvy' ), the_title_attribute( 'echo=0' ) ) ); ?>">
									<?php the_post_thumbnail( 'marvy-thumb' ); ?>
								</a><?php }
								?>

							<header class="entry-header">
								<?php the_title( sprintf( '<h4 class="title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' ); ?>
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