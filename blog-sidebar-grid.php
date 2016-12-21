<?php
/**
 * Template Name: Blog - grid with sidebar
 * The custom page template file
 */
?>

<?php get_header(); ?>

<div class="grid entry-grid">

	<div id="primary" class="content-area grid-cell sm-grid-1-1 lg-grid-3-4">

		<main id="main" class="site-main" role="main">

			<h2 class="blog-template-title"><?php single_post_title(); ?></h2>
			<div class="blog-template-desc"><?php marvy_page_content_by_id( get_the_ID(), 'the_content' ) ?></div>

			<?php
			$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

			$custom_args = array(
				'post_type'		 => 'post',
				'posts_per_page' => 6,
				'paged'			 => $paged
			);

			$custom_query = new WP_Query( $custom_args );
			?>

			<?php if ( $custom_query->have_posts() ) : ?>
				<div class="post-box-style">
					<div class="grid">
						<!-- the loop -->
						<?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
							<div class="grid-cell sm-grid-1-1 md-grid-1-2">
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
						<?php endwhile; ?>
						<!-- end of the loop -->
					</div>

					<!-- pagination here -->
					<?php
					if ( function_exists( 'marvy_custom_pagination' ) ) {
						marvy_custom_pagination( $custom_query->max_num_pages, '', $paged );
					}
					?>

					<?php wp_reset_postdata(); ?>

				<?php else: ?>
					<p><?php _e( 'Sorry, no posts matched your criteria.', 'marvy' ); ?></p>
				<?php endif; ?>

			</div>


		</main><!-- #main -->

	</div><!-- #primary -->

	<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>