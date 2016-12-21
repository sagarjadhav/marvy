<?php

/**
 * Sanitize page id
 */
function marvy_sanitize_int( $page_id ) {
	return intval( $page_id );
}

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function marvy_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}

add_filter( 'body_class', 'marvy_body_classes' );

/**
 * Change excerpt more string
 */
function marvy_excerpt_more( $more ) {
	return '&hellip;';
}

add_filter( 'excerpt_more', 'marvy_excerpt_more' );

/**
 * Display the post content.
 *
 * @since 1.0
 *
 * @param int   Post ID.
 * @param string Accepts 'the_excerpt' or 'the_content'.
 *               Default 'the_excerpt'.
 */
function marvy_page_content_by_id( $id, $content = 'the_excerpt' ) {
	if ( isset( $id ) && 0 != $id ) {
		global $post;

		$post = get_post( $id );
		setup_postdata( $post );

		if ( 'the_content' == $content ) {
			the_content();
		} else {
			the_excerpt();
		}

		wp_reset_postdata( $post );
	}
}

/**
 * Comments
 */
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

/**
 * Custom Pagination
 */
function marvy_custom_pagination( $numpages = '', $pagerange = '', $paged = '' ) {

	if ( empty( $pagerange ) ) {
		$pagerange = 2;
	}

	/**
	 * This first part of our function is a fallback
	 * for custom pagination inside a regular loop that
	 * uses the global $paged and global $wp_query variables.
	 *
	 * It's good because we can now override default pagination
	 * in our theme, and use this function in default quries
	 * and custom queries.
	 */
	global $paged;
	if ( empty( $paged ) ) {
		$paged = 1;
	}

	if ( $numpages == '' ) {
		global $wp_query;
		$numpages = $wp_query->max_num_pages;

		if ( !$numpages ) {
			$numpages = 1;
		}
	}

	/**
	 * We construct the pagination arguments to enter into our paginate_links function.
	 */
	$pagination_args = array(
		'base'			 => get_pagenum_link( 1 ) . '%_%',
		'format'		 => 'page/%#%',
		'total'			 => $numpages,
		'current'		 => $paged,
		'show_all'		 => False,
		'end_size'		 => 1,
		'mid_size'		 => $pagerange,
		'prev_next'		 => True,
		'prev_text'		 => __( '&laquo;', 'marvy' ),
		'next_text'		 => __( '&raquo;', 'marvy' ),
		'type'			 => 'plain',
		'add_args'		 => false,
		'add_fragment'	 => ''
	);

	$paginate_links = paginate_links( $pagination_args );

	if ( $paginate_links ) {
		$html = '';
		$html .= '<nav class="marvy-pagination">';
		//$html .= '<span class="page-numbers page-num">Page ' . $paged . ' of ' . $numpages . '</span> ';
		$html .= $paginate_links;
		$html .= '</nav>';

		echo $html;
	}
}
