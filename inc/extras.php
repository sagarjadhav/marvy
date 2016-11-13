<?php
/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
if ( !function_exists( 'marvy_body_classes' ) ) {

	function marvy_body_classes( $classes ) {
		// Adds a class of group-blog to blogs with more than 1 published author.
		if ( is_multi_author() ) {
			$classes[] = 'group-blog';
		}

		return $classes;
	}

	add_filter( 'body_class', 'marvy_body_classes' );
}

/*
 * Change excerpt more string
 */
if ( !function_exists( 'marvy_excerpt_more' ) ) {

	function marvy_excerpt_more( $more ) {
		return '&hellip;';
	}

	add_filter( 'excerpt_more', 'marvy_excerpt_more' );
}


/*
 * Get content by page ID
 */
if ( !function_exists( 'marvy_the_content_by_id' ) ) {

	function marvy_the_content_by_id( $id ) {
		if ( isset( $id ) && 0 != $id ) {
			global $post;
			$post = get_post( $id );
			setup_postdata( $post );
			the_content();
			wp_reset_postdata( $post );
		}
	}

}

/*
 * Get excerpt by page ID
 */
if ( !function_exists( 'marvy_get_excerpt_by_id' ) ) {

	function marvy_get_excerpt_by_id( $id ) {
		if ( isset( $id ) && 0 != $id ) {
			global $post;
			$post = get_post( $id );
			setup_postdata( $post );
			the_excerpt();
			wp_reset_postdata( $post );
		}
	}

}

/*
 * Comments
 */
if ( !function_exists( 'marvy_comment' ) ) {

	function marvy_comment( $comment, $args, $depth ) {
		if ( 'div' === $args[ 'style' ] ) {
			$tag		 = 'div';
			$add_below	 = 'comment';
		} else {
			$tag		 = 'li';
			$add_below	 = 'div-comment';
		}
		?>

		<<?php echo $tag ?> <?php comment_class( empty( $args[ 'has_children' ] ) ? '' : 'parent'  ) ?> id="comment-<?php comment_ID() ?>">

		<?php if ( 'div' != $args[ 'style' ] ) { ?>
			<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
			<?php } ?>

			<div class="comment-author vcard">
				<?php if ( $args[ 'avatar_size' ] != 0 ) echo get_avatar( $comment, $args[ 'avatar_size' ] ); ?>
			</div>

			<div class="comment-content-wrap">

				<div class="comment-meta commentmetadata">
					<?php printf( __( '<cite class="fn">%s</cite>', 'marvy' ), get_comment_author_link() ); ?>

					<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
						<?php
						/* translators: 1: date, 2: time */
						printf( __( '%1$s at %2$s', 'marvy' ), get_comment_date(), get_comment_time() );
						?></a><?php edit_comment_link( __( '(Edit)', 'marvy' ), '  ', '' );
						?>
				</div>

				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'marvy' ); ?></em>
				<?php endif; ?>

				<?php comment_text(); ?>

				<div class="reply">
					<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args[ 'max_depth' ] ) ) ); ?>
				</div>

			</div>

			<?php if ( 'div' != $args[ 'style' ] ) { ?>
			</div>
		<?php } ?>

		<?php
	}

}