<?php
/**
 * healthcareinc functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package healthcareinc
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses healthcareinc_header_style()
 */
function healthcareinc_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'healthcareinc_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '000000',
		'width'                  => 1000,
		'height'                 => 250,
		'flex-height'            => true,
		'wp-head-callback'       => 'healthcareinc_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'healthcareinc_custom_header_setup' );

if ( ! function_exists( 'healthcareinc_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see healthcareinc_custom_header_setup().
	 */
	function healthcareinc_header_style() {
		$header_text_color = get_header_textcolor();

		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
		 */
		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
			return;
		}

		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
		<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) :
			?>
			.site-title,
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}
		<?php
		// If the user has set a custom color for the text use that.
		else :
			?>
			.site-title a,
			.site-description {
				color: #<?php echo esc_attr( $header_text_color ); ?>;
			}
		<?php endif; ?>
		</style>
		<?php
	}
endif;


//Define constants
define('HOMELINK', site_url('/'));
define('PATH', get_template_directory_uri());
define('IMAGES', get_template_directory_uri()."/assets" );
define('SITENAME', get_bloginfo('name') );
define('HOMECAT', get_cat_ID('home'));
define('BLOGCAT', get_cat_ID('blog'));

// conditional to check whether Gravity Forms shortcode is on a page
function has_gform() {
     global $post;
     $all_content = get_the_content();
     if (strpos($all_content,'[gravityform') !== false) {
	return true;
     } else {
	return false;
     }
}

/**
 * Enqueue scripts and styles.
 */
function healthcareinc_scripts() {
	wp_enqueue_style( 'bootstrap_4', get_template_directory_uri() . '/css/css-libraries.min.css');

	wp_enqueue_style( 'healthcareinc-style', get_template_directory_uri() . '/style.css');
	wp_enqueue_style( 'healthcareinc-header', get_template_directory_uri() . '/css/master-header.min.css');

	if(is_search()){
		wp_enqueue_style( 'healthcareinc-search', get_template_directory_uri() . '/css/search-page.min.css');
	}

	if(is_author()){
		wp_enqueue_style( 'healthcareinc-author', get_template_directory_uri() . '/css/author-page.min.css');
	}

	if(is_single()){
		wp_enqueue_style( 'healthcareinc-single', get_template_directory_uri() . '/css/single-page.css');
	}

	if(is_category()){
		wp_enqueue_style( 'healthcareinc-category', get_template_directory_uri() . '/css/category-page.min.css');
	}

	if(is_page() && !is_front_page()){
		wp_enqueue_style( 'healthcareinc-common', get_template_directory_uri() . '/css/common-page.min.css');
	}

	wp_enqueue_style( 'healthcareinc-shortcodes', get_template_directory_uri() . '/css/custom-shortcodes.css');

    wp_enqueue_script( 'bootstrap_js_4', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '20191219', true );

    if (has_gform()) {
    	wp_enqueue_script( 'input_mask_js', get_template_directory_uri() . '/js/jquery.maskedinput.min.js', array( 'jquery' ), '20200306', true );
    }

    wp_enqueue_script( 'custom-hc-js', get_template_directory_uri() . '/js/custom-hc.js', array( 'jquery' ), '1', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	//wp_dequeue_script('jquery');
    //wp_deregister_script('jquery');
}
add_action( 'wp_enqueue_scripts', 'healthcareinc_scripts' );

/*function dcms_styles_footer() {

	wp_enqueue_style( 'healthcareinc-shortcodes', get_template_directory_uri() . '/css/custom-shortcodes.min.css');

};

add_action( 'get_footer', 'dcms_styles_footer' );*/


/**
 * Register Custom Navigation Walker
 */
require get_template_directory() . '/inc/wp_bootstrap4-mega-navwalker.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom HealthCare Inc. functions.
 */
require get_template_directory() . '/custom-functions/custom-widgets.php';
require get_template_directory() . '/custom-functions/custom-shortcodes.php';
require get_template_directory() . '/custom-functions/custom-backend-functions.php';
require get_template_directory() . '/custom-functions/custom-frontend-functions.php';


/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

remove_filter('the_content', 'wpautop');


//add_action( 'wp_print_styles',     'my_deregister_styles', 100 );

/*function wpdocs_dequeue_dashicon() {
    if (current_user_can( 'update_core' )) {
        return;
    }
    wp_deregister_style('dashicons');
}
 add_action( 'wp_enqueue_scripts', 'wpdocs_dequeue_dashicon' );

//Remove JQuery migrate
function remove_jquery_migrate( $scripts ) {
if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
	$script = $scripts->registered['jquery'];
	if ( $script->deps ) { 
	// Check whether the script has any dependencies

	$script->deps = array_diff( $script->deps, array( 'jquery-migrate' ) );
	}
 }
}
add_action( 'wp_default_scripts', 'remove_jquery_migrate' );

add_filter('json_enabled', '__return_false');
add_filter('json_jsonp_enabled', '__return_false');*/