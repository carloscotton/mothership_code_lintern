<?php
/**
 * healthcareinc backend functions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package healthcareinc
 */



if ( ! function_exists( 'healthcareinc_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function healthcareinc_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on healthcareinc, use a find and replace
		 * to change 'healthcareinc' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'healthcareinc', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'healthcareinc' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		add_theme_support( 'align-wide' );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'healthcareinc_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		add_image_size( 'archive-featured', 300, 300, true );
		add_image_size( 'archive-important-primary', 410, 320, true );
		add_image_size( 'archive-important-secondary', 322, 130, true );
		add_image_size( 'content-hub-hero-header', 1350, 320, true );
		add_image_size( 'content-hub-important-articles', 410, 320, true );
    	add_image_size( 'content-hub-important-articles-secondary', 322, 130, true );
		add_image_size( 'content-hub-looking-for', 267, 97, true );
		add_image_size( 'author-image', 125, 125, true );
		add_image_size( 'expert-image', 100, 100, true );
		add_image_size( 'content-hub-latest-articles', 229, 171, true );
		add_image_size( 'homepage-content-hub-module', 315, 75, true );
		add_image_size( 'homepage-featured-articles', 328, 100, true );
		add_image_size( 'content-page-important-articles', 626, 348, true );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'healthcareinc_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function healthcareinc_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'healthcareinc' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'healthcareinc' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'healthcareinc_widgets_init' );

register_sidebar( array (
	'name' => __( 'Footer text 1'),
	'id' => 'widget-footer-text-1',
	'description' => __( 'Footer text 1'),
	'before_widget' => '<div class="widget-container">',
	'after_widget' => '</div>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
) );

register_sidebar( array (
	'name' => __( 'Footer text 2'),
	'id' => 'widget-footer-text-2',
	'description' => __( 'Footer text 2'),
	'before_widget' => '<div class="widget-container">',
	'after_widget' => '</div>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
) );

register_sidebar( array (
	'name' => __( 'Footer text 3'),
	'id' => 'widget-footer-text-3',
	'description' => __( 'Footer text 3'),
	'before_widget' => '<div class="widget-container widget-full-container">',
	'after_widget' => '</div>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
) );

register_sidebar( array (
	'name' => __( 'Footer menu'),
	'id' => 'widget-footer-menu',
	'description' => __( 'Footer menu'),
	'before_widget' => '<div class="widget-container">',
	'after_widget' => '</div>',
	'before_title' => '<h4 class="widget-title">',
	'after_title' => '</h4>',
) );

register_sidebar( array (
	'name' => __( 'Footer Disclaimer'),
	'id' => 'widget-footer-disclaimer',
	'description' => __( 'Footer Disclaimer'),
	'before_widget' => '<div class="widget-container">',
	'after_widget' => '</div>',
	'before_title' => '<h4 class="widget-title">',
	'after_title' => '</h4>',
) );

/**
 * Google API KEY
 */
function my_acf_google_map_api( $api ){
    $api['key'] = 'AIzaSyAeRbWJH5Ce-oleT9Yr_sKIg9qGz4WU1qE';
    return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');


/**
 * Add Role Expert Reviewer
 */
add_role('expert reviewer', __(
   'Expert Reviewer'),
   array(
       'read'            => true, // Allows a user to read
       'create_posts'      => true, // Allows user to create new posts
       'edit_posts'        => true, // Allows user to edit their own posts
       'edit_others_posts' => true, // Allows user to edit others posts too
       'publish_posts' => true, // Allows the user to publish posts
       'manage_categories' => true, // Allows user to manage post categories
       )
);

/**
 * Page Options
 */
add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init() {

    // Check function exists.
    if( function_exists('acf_add_options_page') ) {

        // Add General Theme Settings
        $parent = acf_add_options_page(array(
            'page_title'  => __('Theme General Settings'),
            'menu_title'  => __('Theme Settings'),
            'menu_slug' 	=> 'theme-general-settings',
            'redirect'    => false,
        ));

        // Add Article Settings
        $child = acf_add_options_page(array(
            'page_title'  => __('Article Page Settings'),
            'menu_title'  => __('Article Page'),
            'parent_slug' => $parent['menu_slug'],
        ));

        // Add Color Settings
        $child = acf_add_options_page(array(
            'page_title'  => __('Color Page Settings'),
            'menu_title'  => __('Colors'),
            'parent_slug' => $parent['menu_slug'],
        ));     

		// Add Typography Settings
        $child = acf_add_options_page(array(
            'page_title'  => __('Typography Page Settings'),
            'menu_title'  => __('Typography'),
            'parent_slug' => $parent['menu_slug'],
        ));   

		// Add Shortcodes Settings
        $child = acf_add_options_page(array(
            'page_title'  => __('Shortcodes Settings'),
            'menu_title'  => __('Shortcodes'),
            'parent_slug' => $parent['menu_slug'],
        ));   
    }
}

/*SECRET CODE URL*/
function append_slug_on_publish($data) {
	global $post_ID;

	if (!empty($data['post_name']) && $data['post_status'] != "draft" && $data['post_type'] == "post") {

		$terms = wp_get_object_terms($post_ID, 'category');
		$category_range_min =  get_field('category_range_min', 'category_'.$terms[0]->term_id);
	    $category_range_max =  get_field('category_range_max', 'category_'.$terms[0]->term_id);

		//foreach($terms as $term) {
		    //if( get_post_meta($post_ID, '_yoast_wpseo_primary_category',true) == $term->term_id ) {
	    if( !is_numeric(substr($data['post_name'], -5)) ) {
	        $random = rand($category_range_min,$category_range_max);
	        $data['post_name'] = sanitize_title($data['post_title'], $post_ID);
	        $data['post_name'] .= '-' . $random;
	    }
		   	//}
		//}

	}
	return $data;
} 
add_filter('wp_insert_post_data', 'append_slug_on_publish', 10);


function append_slug_from_draft_to_publish( $post ) {

	// Only run this on the actual talk posts
	if ( $post->post_type != 'post' )
		return;

	// Get the ID
	$post_id = $post->ID;

	// We just want to add to the slug, not change anything else.
	//$post_name = $post->post_name;
	$post_name = get_post_meta( $post_id, 'hc_custom_post_slug', true );

	$terms = wp_get_object_terms($post_id, 'category');
	$category_range_min =  get_field('category_range_min', 'category_'.$terms[0]->term_id);
    $category_range_max =  get_field('category_range_max', 'category_'.$terms[0]->term_id);

	//foreach($terms as $term) {
	//if( get_post_meta($post_ID, '_yoast_wpseo_primary_category',true) == $term->term_id ) {
    if( !is_numeric(substr($post_name, -5)) ) {
        $random = rand($category_range_min,$category_range_max);
    }

	// We want to add to the date of the slug, but the date is in a long format, we just need the d-m-y format
	$post_date = date( 'jS-F-Y', strtotime( $post->post_date ) );

	// If we have a location, add it too
	//$location    = get_post_meta( $post_id, 'location', true );
	$addedstring = $random ? '-' . $random : '';

	// Structure the new post name
	$new_post_name = sanitize_title( $post_name . $addedstring );

	wp_update_post( array(
        'ID' => $post_id,
        'post_name' => $new_post_name
    ));

} 
add_action( 'draft_to_publish',  'append_slug_from_draft_to_publish', 10, 1 );


# Adds base html tag to define the base folder for all relative links in the admin, this to fix urls that are relative 
# that don't work with folders without a trailing slash
#find if the current plugin is SEO yoast

$my_plugin = $_GET['page'];
$plugin_flag = 1;
if ($my_plugin == "wpseo_dashboard" || $my_plugin == "wpseo_titles" || $my_plugin == "wpseo_search_console" || $my_plugin == "wpseo_social" || $my_plugin == "wpseo_tools" || $my_plugin == "wpseo_licenses" || $my_plugin == "wpseo_redirects" || $my_plugin == "gf_edit_forms" ) {

	$plugin_flag = 0;
}
if ($plugin_flag == 1)  { 
add_action( 'admin_head', 'insert_header_wp_hc_custom' );
}
function insert_header_wp_hc_custom()
{
    echo '
    <base href="' . HC_WP_ADMIN_BASE_PATH . '" target="_self" >
    ';
}

function __search_by_title_only( $search, $wp_query )
{
    global $wpdb;
    if(empty($search)) {
        return $search; // skip processing - no search term in query
    }
    $q = $wp_query->query_vars;
    $n = !empty($q['exact']) ? '' : '%';
    $search =
    $searchand = '';
    foreach ((array)$q['search_terms'] as $term) {
        $term = esc_sql($wpdb->esc_like($term));
        $search .= "{$searchand}($wpdb->posts.post_name LIKE '{$n}{$term}{$n}')";
        $searchand = ' AND ';
    }
    if (!empty($search)) {
        $search = " AND ({$search}) ";
        if (!is_user_logged_in())
            $search .= " AND ($wpdb->posts.post_password = '') ";
    }
    return $search;
}
add_filter('posts_search', '__search_by_title_only', 500, 2);

function my_post_object_query( $args, $field, $post_id ) {
	
    $args['post_status'] = 'publish';	
	// return
    return $args;
    
}
// filter for every field
add_filter('acf/fields/post_object/query', 'my_post_object_query', 10, 3);

function my_post_object_result( $title, $post, $field, $post_id ) {

    $title = $post->post_name;
    return $title;

}

add_filter('acf/fields/post_object/result', 'my_post_object_result', 10, 4);

add_filter('user_contactmethods','hide_profile_fields',10,1);
 
function hide_profile_fields( $contactmethods ) {
	unset($contactmethods['url']);
	unset($contactmethods['facebook']);
	unset($contactmethods['instagram']);
	unset($contactmethods['linkedin']);
	unset($contactmethods['myspace']);
	unset($contactmethods['pinterest']);
	unset($contactmethods['soundcloud']);
	unset($contactmethods['tumblr']);
	unset($contactmethods['twitter']);
	unset($contactmethods['youtube']);
	unset($contactmethods['wikipedia']);
	return $contactmethods;
}

function remove_website_row_wpse_94963_css()
{
    echo '<style>tr.user-url-wrap,.user-description-wrap{ display: none; }</style>';
}
add_action( 'admin_head-user-edit.php', 'remove_website_row_wpse_94963_css' );
add_action( 'admin_head-profile.php',   'remove_website_row_wpse_94963_css' );

function explore_module_setup_post_type() {
    $args = array(
        'public'    => false,
        'show_ui' => true,
        'label'     => __( 'Explore Modules', 'healthcareinc' ),
        'menu_icon' => 'dashicons-book',
    );
    register_post_type( 'explore-module', $args );
}
add_action( 'init', 'explore_module_setup_post_type' );

add_action('gform_pre_submission_6', function ($form) {
	if ($_POST['input_1'] == "1") {
		$env = getenv('ENV') ? getenv('ENV') : "prd";
		$url = "https://www.healthcare.com/unsubscribe/";
		if ($env == "stg") {
			$url = "https://stg.healthcare.com/unsubscribe/";
		}else if($env == "qa"){
			$url = "https://qa.healthcare.com/unsubscribe/";
		}
		$email = $_POST['input_5'];
		$message = $_POST['input_8'];
		$url = $url . "?email=" . $email . "&message=" . rawurlencode($message);
		wp_redirect($url);
		exit;
	}
});

// Page Slug Body Class
function add_slug_body_class( $classes ) {
	global $post;
	if ( isset( $post ) ) {
		$classes[] = $post->post_type . '-' . $post->post_name;
	}
	return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );

add_action('acf/input/admin_head', 'my_acf_modify_wysiwyg_height');

// disable srcset on frontend
function disable_wp_responsive_images() {
	return 1;
}
add_filter('max_srcset_image_width', 'disable_wp_responsive_images');

function my_acf_modify_wysiwyg_height() {
    
    ?>
    <style type="text/css">
        div.mce-edit-area iframe{
            height: 80px !important;
            min-height: 80px !important;
        }
    </style>
    <?php    
    
}
// SUBMIT EMAIL LEAD FORM EMAIL TO MAROPOST
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'gravityforms/gravityforms.php' ) ) {
$gravity_email_form_id = get_field('gravity_forms_email_lead_form_id', 'option');
$site_to_maropost = get_field('maropost_site_to_log', 'option');
add_action( 'gform_after_submission_'.$gravity_email_form_id,'log_to_maropost', 10, 2 );
function log_to_maropost( $entry, $form ) {
 //get the email from the email lead short code form
$gfemail = $entry[1];
global $site_to_maropost;
 ?>
 <script>
 // connect and log email to maropost
 async function subscribeMaropost(url = '', data = {}) {
	const response = await fetch(url, {
	  method: 'POST',
	  headers: {
		'Content-Type': 'application/json'
	  },
	  body: JSON.stringify(data) 
	});
	return response.json(); 
  }
  var today = new Date();
  var dd = String(today.getDate()).padStart(2, '0');
  var mm = String(today.getMonth() + 1).padStart(2, '0'); 
  var yyyy = today.getFullYear();
  today = mm + '/' + dd + '/' + yyyy;
  const payload = {
	  "properties": {
		"email": "<?php echo $gfemail; ?>",
		"site": "<?php echo $site_to_maropost; ?>",
		"product": "MEDICARE",
		"sign_update": today,
		"tags": [
		  "test-qa",
		  "test"
		]
	  }
  }
  var stg = document.domain.match(/stg/) ? '.stg' : '';
  var subdomain = document.domain.match(/local|qa/) ? '.qa' : stg;
  subscribeMaropost('https://sem-content' + subdomain + '.healthcare.com/v3/email/subscribe', payload)
	.then(data => {
//		console.log(data); // JSON data parsed by `data.json()` call
	});
  
   </script>
	<?php 
	 
  }
} 