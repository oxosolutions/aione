<?php
/**
* Aione functions and definitions
* @package Aione
*/



add_action( 'after_setup_theme', 'aione_init' );

if ( ! function_exists( 'aione_init' ) ) :

	function aione_init() {

		/*
		* textdomain for translation.
		*/
		load_theme_textdomain( 'aione', get_template_directory() . '/languages' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary-menu' => esc_html__( 'Primary', 'aione' ),
		) );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Page title tag in 
		add_theme_support( 'title-tag' );

		//Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for post formats.
		add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link', 'status' ) );

		// add block stypes
		// add_theme_support( 'wp-block-styles' );

		// Add support for custom color scheme.
		/*
		Depricated in 5.4
		See updated docs to manage
		add_theme_support( 'editor-color-palette',
			'#168dc5',
			'#1570a6',
			'#0073aa',
			'#229fd8',
			'#eee',
			'#444'
		);
		*/

		//Switch default core markup for search form, comment form, and comments to output valid HTML5
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
		) );

		// Set up the WordPress core custom background feature.
		/*
		add_theme_support( 'custom-background', apply_filters( '_s_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );
		*/

		/**
		 * Add support for core custom logo.
		 */
		/*
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
		*/
	}
endif;


//remove emoji styles and scripts
remove_action( 'wp_head', 'print_emoji_detection_script', 7 ); 
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' ); 
remove_action( 'wp_print_styles', 'print_emoji_styles' ); 
remove_action( 'admin_print_styles', 'print_emoji_styles' );



/**
* Show Reusable blocks in wordpress export content area to export
*
* from one site to another site
*
*/
function aione_support_reusable_block_export( $post_type_args, $post_type ) {
	if ( 'wp_block' === $post_type ) {
		// $post_type_args['public'] = true;
		$post_type_args['can_export'] = true;
		// $post_type_args['show_in_menu'] = true;

		/*
		echo "<pre style='padding:50px 0 0 200px'>";
		print_r($post_type_args);
		echo "</pre>";
		*/

	}

	return $post_type_args;
}
add_filter( 'register_post_type_args', 'aione_support_reusable_block_export', 10, 2 );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function aionetheme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'aionetheme_content_width', 980 ); 
}
add_action( 'after_setup_theme', 'aionetheme_content_width', 0 );

add_filter( 'gform_init_scripts_footer', '__return_true' );
/*
function aione_remove_gf_scripts() {
    // De-register the default version of jQuery
    wp_deregister_script( 'jquery' );
    // Register a new version of jQuery under the same handle
    wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js', false, '1.9.1', true );
}
add_action('wp_enqueue_scripts', 'aione_remove_gf_scripts', 10);
*/



/**
 * Enqueue scripts and styles.
 */
function aione_styles() {

	global $theme_options;

	$in_footer = false;
	if( $theme_options['advanced_load_js_bottom'] ){
		$in_footer = true;
	}


	wp_register_style( 'core', get_template_directory_uri() . '/assets/css/core.min.css', array(), null, 'all' );
	wp_register_style( 'aione', get_template_directory_uri() . '/assets/css/aione.min.css', array(), null, 'all' );
	wp_register_style( 'aionefull', get_template_directory_uri() . '/assets/css/aionefull.min.css', array(), null, 'all' );

	wp_register_script( 'aione-js', get_template_directory_uri() . '/assets/js/aione.min.js', array(), null, $in_footer );


	//If not loaded from CDN
	if( !$theme_options['advanced_use_cdn'] ) {

		if( $theme_options['advanced_load_css_bottom'] ) {
			//Enqueue core css essencial for layout in head, rest css will be loaded in footer
			wp_enqueue_style( 'core' );
		} else{
			wp_enqueue_style( 'aionefull' );
		}

		wp_enqueue_script( 'aione-js' );


	}
	

	// wp_deregister_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library' );
}
add_action( 'wp_enqueue_scripts', 'aione_styles' );
//add_action( 'admin_enqueue_scripts', 'aione_scripts' );

function aione_scripts() {

	global $theme_options;

	//If not loaded from CDN
	if( !$theme_options['advanced_use_cdn'] ) {

		if( $theme_options['advanced_load_css_bottom'] ) {
			wp_enqueue_style( 'aione' );
		}
	}

	//wp_deregister_script( 'wp-embed' );
	wp_dequeue_script( 'wp-embed' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'get_footer', 'aione_scripts' );

/**
* Register styles for admin editor conponants
*/
add_action( 'admin_enqueue_scripts', 'aione_admin_editor_style' );
function aione_admin_editor_style( $hook ) {

	global $post_type;

	wp_register_style( 'aione-admin-css', get_template_directory_uri() . '/assets/css/admin/aione-admin.min.css', array(), false, 'all' );
    wp_enqueue_style( 'aione-admin-css' );


    if( in_array( $hook, array( 'post-new.php', 'post.php' ) ) ) {

		// If not the desired post type bail here.
		if( in_array( $post_type , array( 'aione-slider' ) ) ) {
			return;
		}

    	wp_register_style( 'aione-admin-editor-css', get_template_directory_uri() . '/assets/css/admin/aione-admin-editor.min.css', array(), false, 'all' );
    	wp_enqueue_style( 'aione-admin-editor-css' );

    }
    
}

/**
 * Register Google Fonts
 */
function aionetheme_fonts_url() {
	$fonts_url = '';

	/*
	 *Translators: If there are characters in your language that are not
	 * supported by Karla, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$notoserif = esc_html_x( 'on', 'Noto Serif font: on or off', 'aione' );

	if ( 'off' !== $notoserif ) {
		$font_families = array();
		$font_families[] = 'Noto Serif:400,400italic,700,700italic';
		$font_families[] = 'Open Sans:400,400italic,700,700italic';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;

}

/* Remove type='text/javascript' and type='text/css' for accesiblity */
//add_filter( 'style_loader_tag',  'clean_style_tag', 10, 2 );
//add_filter( 'script_loader_tag', 'clean_script_tag', 10, 2 );


/**
 * Clean up output of stylesheet <link> tags
 */

/*
function clean_style_tag( $input ) {
    preg_match_all( "!<link rel='stylesheet'\s?(id='[^']+')?\s+href='(.*)' type='text/css' media='(.*)' />!", $input, $matches );
    if ( empty( $matches[2] ) ) {
        return $input;
    }
    // Only display media if it is meaningful
    $media = $matches[3][0] !== '' && $matches[3][0] !== 'all' ? ' media="' . $matches[3][0] . '"' : '';

    return '<link rel="stylesheet" href="' . $matches[2][0] . '"' . $media . '>' . "\n";
}
*/
/**
 * Clean up output of <script> tags
 /*
function clean_script_tag( $input ) {
    $input = str_replace( "type='text/javascript' ", '', $input );

    return str_replace( "'", '"', $input );
}
*/

/**
 * Implement the Custom Header feature.
 * Removed on 2019/01/07
 * Delete this file if no issue
 */

// require get_template_directory() . '/includes/custom-header.php';

// Common Aione functions
require get_template_directory() . '/includes/aione-functions.php';

// Common Aione Theme functions
require get_template_directory() . '/includes/theme-functions.php';

// Common Aione Theme filters
require get_template_directory() . '/includes/theme-filters.php';

// Aione Widgets
require get_template_directory() . '/includes/aione-widgets.php';

// Register Sidebars(Widget Areas)
require get_template_directory() . '/includes/register-sidebars.php';

// Register Blocks(Using ACF)
require get_template_directory() . '/includes/aione-blocks.php';



//Register Aione Slider
//require get_template_directory() . '/includes/register-aione-slider.php';

// Shortcodes
//require get_template_directory() . '/includes/shortcodes.php';

//Custom template tags for this theme.
require get_template_directory() . '/includes/template-tags.php';

//Functions which enhance the theme by hooking into WordPress.
require get_template_directory() . '/includes/template-functions.php';

//Customizer additions.
require get_template_directory() . '/includes/customizer.php';

//Load Jetpack compatibility file.
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/includes/jetpack.php';
}

//Customize Menu
require get_template_directory() . '/includes/customize-menu.php';

// Aione custom function
require get_template_directory() . '/custom-functions.php';

// Aione Blocks
require get_template_directory() . '/blocks/main.php';


add_action( 'init', 'kses_unfiltered_html' );
function kses_unfiltered_html() {
    //$user = wp_get_current_user();

    if ( current_user_can('edit_pages') || current_user_can('edit_posts')){
        kses_remove_filters();
    }
}