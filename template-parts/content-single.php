<?php
/**
 * @package Marvy
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php marvy_posted_on(); ?>
		</div><!-- .entry-meta -->

		<?php
		if ( has_post_thumbnail() ) {
			the_post_thumbnail( 'full' );
		}
		?>

	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'marvy' ),
			'after' => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php marvy_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
