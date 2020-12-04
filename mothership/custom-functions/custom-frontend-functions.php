<?php
/**
 * healthcareinc frontend functions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package healthcareinc
 */


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function healthcareinc_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'healthcareinc_content_width', 640 );
}
add_action( 'after_setup_theme', 'healthcareinc_content_width', 0 );




/*
 * Breadcrumbs for article page
 */

function fc_breadcrumbs() {
  
  $delimiter = '/';
  $name = 'Home'; //text for the 'Home' link
  $currentBefore = '<span class="current">';
  $currentAfter = '</span>';
  
  if ( !is_home() && !is_front_page() || is_paged() ) {
  
    echo '<div id="crumbs">';
  
    global $post;
    $home = get_bloginfo('url');
    echo '<a href="' . $home . '">' . $name . '</a> ' . $delimiter . ' ';

    $currentID = get_the_ID();
    $category = get_the_category();

    // Get primary (Yoast) term if it is set
    $category_display = '';
    $category_slug = '';

    if ( class_exists('WPSEO_Primary_Term') ) {

         // Show the post's 'Primary' category, if this Yoast feature is available, & one is set
      $wpseo_primary_term = new WPSEO_Primary_Term( 'category', get_the_id() );
      $wpseo_primary_term = $wpseo_primary_term->get_primary_term();
      $term = get_term( $wpseo_primary_term );

         if ( is_wp_error( $term ) ) {

              // Default to first category (not Yoast) if an error is returned
              $category_display = $category[0]->name;
              $category_slug = $category[0]->slug;
              $category_id = get_cat_ID( $category_display );
              $category_link = get_category_link( $category_id );

              echo '<a href="' . $category_link . '">' . $category_display . '</a> ';

         } else {

              // Set variables for category_display & category_slug based on Primary Yoast Term
              $category_id = $term->term_id;
              $category_term = get_category($category_id);
              $category_display = $term->name;
              $category_slug = $term->slug;
              $category_link = get_category_link( $category_id );

              echo '<a href="' . $category_link . '">' . $category_display . '</a> ';

         }

    } else {

         // Default, display the first category in WP's list of assigned categories
         $category_display = $category[0]->name;
         $category_slug = $category[0]->slug;
         $category_id = get_cat_ID( $category_display );
         $category_link = get_category_link( $category_id );

         echo '<a href="' . $category_link . '">' . $category_display . '</a> ';

    }
  
    if ( is_category() ) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
      if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
      echo $currentBefore . 'Archive by category &#39;';
      single_cat_title();
      echo '&#39;' . $currentAfter;
  
    } elseif ( is_day() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
      echo $currentBefore . get_the_time('d') . $currentAfter;
  
    } elseif ( is_month() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo $currentBefore . get_the_time('F') . $currentAfter;
  
    } elseif ( is_year() ) {
      echo $currentBefore . get_the_time('Y') . $currentAfter;
  
    } elseif ( is_single() && !is_attachment() ) {
      $cat = get_the_category(); $cat = $cat[0];
      //echo get_category_parents($cat, TRUE, ' ');
      //echo $currentBefore;
      //the_title();
      //echo $currentAfter;
  
    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
      echo $currentBefore;
      the_title();
      echo $currentAfter;
  
    } elseif ( is_page() && !$post->post_parent ) {
      echo $currentBefore;
      the_title();
      echo $currentAfter;
  
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
      echo $currentBefore;
      the_title();
      echo $currentAfter;
  
    } elseif ( is_search() ) {
      echo $currentBefore . 'Search results for &#39;' . get_search_query() . '&#39;' . $currentAfter;
  
    } elseif ( is_tag() ) {
      echo $currentBefore . 'Posts tagged &#39;';
      single_tag_title();
      echo '&#39;' . $currentAfter;
  
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $currentBefore . 'Articles posted by ' . $userdata->display_name . $currentAfter;
  
    } elseif ( is_404() ) {
      echo $currentBefore . 'Error 404' . $currentAfter;
    }
  
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
  
    echo '</div>';
  
  }
}


/**
 * Filter the except length to 70 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length( $length ) {
	if(is_search()){
		return 32;
	}elseif(is_archive()){
		return 15;
	}elseif (is_author()) {
		return 32;
	}else{
		return 12;
	}
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

/**
 * Filter the excerpt "read more" string.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function wpdocs_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

/**
* Hightlight WordPress Search Results
* Taken from wpsnipp.com 
* (http://wpsnipp.com/index.php/excerpt/highlight-keywords-in-search-results-the_excerpt-and-the_title/)
* Just paste in functions.php
*/
function search_excerpt_highlight( $limit ) {
	$excerpt = get_the_excerpt();
	$excerpt = explode(' ', get_the_excerpt(), $limit);

	if ( count( $excerpt ) >= $limit ) {
		array_pop( $excerpt );
		$excerpt = implode(' ', $excerpt);
	} else {
		$excerpt = implode(' ', $excerpt);
	}

	$excerpt = apply_filters( 'get_the_excerpt', $excerpt );

	$allowed_tags = '<p>,<br>,<mark>,<strong>';
	$excerpt = strip_tags( $excerpt, $allowed_tags );

	$excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);

	$keys = implode('|', explode(' ', get_search_query()));
	$excerpt = trim(preg_replace('/(' . $keys .')/iu', '<strong class="search-excerpt">\0</strong>', $excerpt));

	echo '<p>' . $excerpt . '</p>';
}

remove_action( 'template_redirect', 'redirect_canonical' );


