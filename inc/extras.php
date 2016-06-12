<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Marvy
 */

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

if ( version_compare( $GLOBALS[ 'wp_version' ], '4.1', '<' ) ) :

	/**
	 * Filters wp_title to print a neat <title> tag based on what is being viewed.
	 *
	 * @param string $title Default title text for current view.
	 * @param string $sep Optional separator.
	 * @return string The filtered title.
	 */
	function marvy_wp_title( $title, $sep ) {
		if ( is_feed() ) {
			return $title;
		}

		global $page, $paged;

		// Add the blog name
		$title .= get_bloginfo( 'name', 'display' );

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title .= " $sep $site_description";
		}

		// Add a page number if necessary:
		if ( ( $paged >= 2 || $page >= 2 ) && !is_404() ) {
			$title .= " $sep " . sprintf( esc_html__( 'Page %s', 'marvy' ), max( $paged, $page ) );
		}

		return $title;
	}

	add_filter( 'wp_title', 'marvy_wp_title', 10, 2 );

	/**
	 * Title shim for sites older than WordPress 4.1.
	 *
	 * @link https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
	 * @todo Remove this function when WordPress 4.3 is released.
	 */
	function marvy_render_title() {
		?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<?php
	}

	add_action( 'wp_head', 'marvy_render_title' );
endif;

/*
 * Change excerpt more string
 */

function marvy_excerpt_more( $more ) {
	return '&hellip;';
}

add_filter( 'excerpt_more', 'marvy_excerpt_more' );


/*
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
				<?php printf( __( '<cite class="fn">%s</cite>' ), get_comment_author_link() ); ?>

				<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
					<?php
					/* translators: 1: date, 2: time */
					printf( __( '%1$s at %2$s' ), get_comment_date(), get_comment_time() );
					?></a><?php edit_comment_link( __( '(Edit)' ), '  ', '' );
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
