<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package healthcareinc
 */

if ( ! function_exists( 'healthcareinc_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function healthcareinc_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Published: %s', 'post date', 'healthcareinc' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'healthcareinc_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function healthcareinc_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'By %s', 'post author', 'healthcareinc' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'healthcareinc_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function healthcareinc_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'healthcareinc' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'healthcareinc' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'healthcareinc' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'healthcareinc' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'healthcareinc' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'healthcareinc' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'healthcareinc_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function healthcareinc_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<?php
			the_post_thumbnail( 'post-thumbnail', array(
				'alt' => the_title_attribute( array(
					'echo' => false,
				) ),
			) );
			?>
		</a>

		<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'healthcareinc_paging_nav' ) ) :

	function healthcareinc_paging_nav() {

		$settings = array(
			'count' => 6,
			'prev_text' => 'prev',
			'next_text' => 'next'
		);
	
		global $wp_query;
		$current = max( 1, get_query_var( 'paged' ) );
		$total = $wp_query->max_num_pages;
		$links = array();
		$dif_end = $total - $current;
	if ($total != 1) {
		// Offset for next link
		if( $current < $total )
			$settings['count']--;
	
		// Previous
		if( $current > 1 ) {
			//$settings['count']--;
			$links[] = healthcareinc_paging_nav_link( $current - 1, 'prev', $settings['prev_text'] );
		}
		if ($total > 5 ) {

	if (($dif_end < 4) and ($dif_end >= 0) ){
		for($ii=(4 - $dif_end); $ii>=1; $ii--){
			$links[] = healthcareinc_paging_nav_link( $current - $ii );
		}
	}
		} else {
		for ($j = 1; $j < ($total - $dif_end); $j++) {
			$links[] = healthcareinc_paging_nav_link( $j );
		}
	} // end total > 5

		// Current
		$links[] = healthcareinc_paging_nav_link( $current, 'current' );
	
		// Next Pages
		for( $i = 1; $i < $settings['count']; $i++ ) {
			$page = $current + $i;
			if( $page <= $total ) {
				$links[] = healthcareinc_paging_nav_link( $page );
			}
		}
	
		// Next
		if( $current < $total ) {
			$links[] = healthcareinc_paging_nav_link( $current + 1, 'next', $settings['next_text'] );
		}
	
	
		echo '<nav class="navigation paging-navigation" role="navigation">';
			echo '<h1 class="screen-reader-text">';
			_e( 'Posts navigation', 'healthcareinc' );
			echo '</h1>';
			echo '<div class="pagination loop-pagination">';
			if($current != 1){
				echo '<a href='.rtrim(get_pagenum_link(1),'/').' class="navigation-first page-numbers"><i class="fas fa-angle-left"></i><i class="fas fa-angle-left"></i></a>';
			} 
			echo  join( '', $links ) ;
			if($current < $total){
				echo '<a href='.get_pagenum_link($total).' class="navigation-last page-numbers"><i class="fas fa-angle-right"></i><i class="fas fa-angle-right"></i></a>';
			} 
			echo '</div>';
		echo '</nav>';
	}
}
	add_action( 'tha_content_while_after', 'healthcareinc_paging_nav' );
	
	function healthcareinc_paging_nav_link( $page = false, $class = '', $label = '' ) {
	
		if( ! $page )
			return;
	
		$classes = array( 'page-numbers' );
		if( !empty( $class ) )
			$classes[] = $class;
		$classes = array_map( 'sanitize_html_class', $classes );
	
		$label = $label ? $label : $page;
		$link = esc_url_raw( get_pagenum_link( $page ) );
	
		return '<a class="' . join ( ' ', $classes ) . '" href="' . rtrim($link,'/') . '">' . $label . '</a>';
	
	}
endif;

function rel_next_prev(){
    global $paged;
    if ( get_previous_posts_link() ) { ?>
        <link rel="prev" href="<?php echo get_pagenum_link( $paged - 1 ); ?>" /><?php
    }
    if ( get_next_posts_link() ) { ?>
        <link rel="next" href="<?php echo get_pagenum_link( $paged +1 ); ?>" /><?php
    }
}
add_action( 'wp_head', 'rel_next_prev' );