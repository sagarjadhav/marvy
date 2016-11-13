<?php

/**
 * Prints HTML with meta information.
 */
if ( !function_exists( 'marvy_entry_list_footer' ) ) {

	function marvy_entry_list_footer() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
		}

		$time_string = sprintf( $time_string, esc_attr( get_the_date( 'c' ) ), esc_html( get_the_date() ), esc_attr( get_the_modified_date( 'c' ) ), esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
		esc_html_x( '%s', 'post date', 'marvy' ), '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		$byline = sprintf(
		esc_html_x( '%s', 'post author', 'marvy' ), '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"><i class="ti-user"></i> ' . $byline . '</span><span class="posted-on"><i class="ti-calendar"></i> ' . $posted_on . '</span>'; // WPCS: XSS OK
	}

}

/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
if ( !function_exists( 'marvy_entry_footer' ) ) {

	function marvy_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' == get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'marvy' ) );
			if ( $categories_list && marvy_categorized_blog() ) {
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'marvy' ) . '</span>', $categories_list ); // WPCS: XSS OK
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html__( ', ', 'marvy' ) );
			if ( $tags_list ) {
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'marvy' ) . '</span>', $tags_list ); // WPCS: XSS OK
			}
		}

		if ( !is_single() && !post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link( esc_html__( 'Leave a comment', 'marvy' ), esc_html__( '1 Comment', 'marvy' ), esc_html__( '% Comments', 'marvy' ) );
			echo '</span>';
		}

		edit_post_link( esc_html__( 'Edit', 'marvy' ), '<span class="edit-link">', '</span>' );
	}

}