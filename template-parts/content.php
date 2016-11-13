<?php
/**
 * @package Marvy
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( has_post_thumbnail() ) { ?>
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'marvy' ), the_title_attribute( 'echo=0' ) ) ); ?>" class="entry-media">
				<?php the_post_thumbnail( 'marvy-large-thumb' ); ?>
			</a><?php }
			?>

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</header><!-- .entry-header -->

	<footer class="entry-footer">
		<?php marvy_entry_list_footer(); ?>
	</footer>

	<div class="entry-content">
		<?php
		if ( is_singular() ) {
			/* translators: %s: Name of current post */
			the_content( sprintf(
			wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'marvy' ), array( 'span' => array( 'class' => array() ) ) ), the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		} else {
			the_excerpt();
		}
		?>

		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'marvy' ),
			'after'	 => '</div>',
		) );
		?>

		<?php if ( !is_singular() ) { ?>
			<p><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'marvy' ), the_title_attribute( 'echo=0' ) ) ); ?>" class="read-more button"><?php _e( 'Read More', 'marvy' ); ?></a></p>
			<?php } ?>

	</div><!-- .entry-content -->

</article><!-- #post-## -->