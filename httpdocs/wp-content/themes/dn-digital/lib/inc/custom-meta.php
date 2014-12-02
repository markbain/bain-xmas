<?php

//	Date/author meta ( "Posted On" )

function mbdmaster_posted_on() {
	printf( __( '<div class="post-meta"><span class="sep">Posted on </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a><span class="byline"> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span></div>', 'mbdmaster' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'mbdmaster' ), get_the_author() ) ),
		esc_html( get_the_author() )
	);
}

//	Post meta ( Categories/Tags/etc. )

function mbdmaster_post_meta() {

	$categories_list = get_the_category_list( __( ', ', 'mbdmaster' ) );
	$tag_list = get_the_tag_list( '', __( ', ', 'mbdmaster' ) );

	if ( $categories_list || $tag_list ) {
		echo '<div class="post-meta">';
	}

		if ( $categories_list ) {
			echo '<div class="categories-links"><h4>Categories</h4> ' . $categories_list . '</div>';
		}

		if ( $tag_list ) {
			echo '<div class="tags-links"><h4>Tags</h4> ' . $tag_list . '</div>';
		}
	
	if ( $categories_list || $tag_list ) {
		echo '</div>';
	}

}
