<?php
/**
 * Gutenbergtheme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Gutenbergtheme
 */

if ( ! function_exists( 'gutenbergtheme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function gutenbergtheme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on gutenbergtheme, use a find and replace
		 * to change 'gutenbergtheme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'gutenbergtheme', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'gutenbergtheme' ),
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

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( '_s_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

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

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for custom color scheme.
		add_theme_support( 'editor-color-palette',
			'#0073aa',
			'#229fd8',
			'#eee',
			'#444'
		);

	}
endif;
add_action( 'after_setup_theme', 'gutenbergtheme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function gutenbergtheme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'gutenbergtheme_content_width', 640 ); 
}
add_action( 'after_setup_theme', 'gutenbergtheme_content_width', 0 );

/**
 * Register Google Fonts
 */
function gutenbergtheme_fonts_url() {
	$fonts_url = '';

	/*
	 *Translators: If there are characters in your language that are not
	 * supported by Karla, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$notoserif = esc_html_x( 'on', 'Noto Serif font: on or off', 'gutenbergtheme' );

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

/**
 * Enqueue scripts and styles.
 */
function aione_scripts() {
	wp_register_style( 'aione', get_template_directory_uri() . '/assets/css/aione.min.css' );
	wp_register_style( 'aione-theme', get_template_directory_uri() . '/assets/css/theme.css', array('aione'), time(), 'all' ); 
	wp_register_style( 'aione-color', get_template_directory_uri() . '/assets/css/color-blue.css', array('aione','aione-theme'), time(), 'all' );
	wp_register_style( 'aione-font', 'https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' );
	wp_register_style( 'gutenbergthemeblocks-style', get_template_directory_uri() . '/assets/css/blocks.css' );
	wp_register_style( 'aione-icons', 'https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css' );
	wp_enqueue_script( 'gutenbergtheme-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'gutenbergtheme-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script( 'aione-vendor', get_template_directory_uri() . '/assets/js/vendor.min.js', array(), '20151215', true );
	wp_enqueue_script( 'aione-js', get_template_directory_uri() . '/assets/js/aione.min.js', array(), time(), true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_style( 'aione' );
	wp_enqueue_style( 'aione-theme' );
	wp_enqueue_style( 'aione-color' );
	wp_enqueue_style( 'aione-font' );
	wp_enqueue_style( 'gutenbergthemeblocks-style' );
	wp_enqueue_style( 'aione-icons' );

}
add_action( 'wp_enqueue_scripts', 'aione_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/includes/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/includes/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/includes/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/includes/customizer.php';

/**
 * Register Sidebars(Widget Areas)
 */
require get_template_directory() . '/includes/register-sidebars.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/includes/jetpack.php';
}

/**
 * Customize Menu
 */
require get_template_directory() . '/includes/customize-menu.php';

/**
*
*
*/
//require 'custom-functions.php';

/**
*
*
*/

if ( ! function_exists( 'register_aione_slider' ) ){
    function register_aione_slider() {
        register_post_type( 'aione-slider',
            array(
                'labels' => array(
                    'name' => 'Slider',
                    'singular_name' => 'Slider',
                    'add_new' => 'Add New',
                    'add_new_item' => 'Add New Slider',
                    'edit' => 'Edit',
                    'edit_item' => 'Edit Slider',
                    'new_item' => 'New Slider',
                    'view' => 'View',
                    'view_item' => 'View Slider',
                    'search_items' => 'Search Slider',
                    'not_found' => 'No Slider found',
                    'not_found_in_trash' => 'No Slider found in Trash',
                    'parent' => ''
                ),
                'public' => true,
                'menu_position' => 15,
                'menu_icon' => 'dashicons-laptop',
                'supports' => array( 'title'), 
                'taxonomies' => array( '' ),
                'has_archive' => false,
                'register_meta_box_cb' => 'aione_slider_metaboxes',
            )
        );
    }
}
add_action( 'init', 'register_aione_slider' );

function aione_slider_metaboxes() {
	add_meta_box(
		'aione_slider_settings',
		'Settings',
		'aione_slider_settings_callback',
		'aione-slider',
		'side',
		'default'
	);
	add_meta_box(
		'aione_slider_docs',
		'Slider shortcode',
		'aione_slider_docs_callback',
		'aione-slider',
		'side',
		'default'
	);
}

function aione_slider_settings_callback(){
	echo "settings";
}

function aione_slider_docs_callback(){
	$id = get_the_ID();
	echo '[aione-slider id="'.$id.'"]';
}

function aione_slider_shortcode_callback( $atts ) {
	$atts = shortcode_atts( array(
		'id' => '',
		'class' => '',
		'items' => '1',
	), $atts, 'aione-slider' );

	$slides = get_field('images', $atts['id']);
	$output = '';
	$output .= '<div id="aione_slider" class="aione-slider">
			<div class="wrapper">';
				if(!empty($slides)):
					
					$output .=  '<div id="aione_slider_'.$atts['id'].'" class="slider owl-carousel owl-theme gallery aione-theme" data-items="'.$atts['items'].'">';
					//echo '<div id="aione_slider_'.$slider_id.'" class="aione-carousel owl-carousel owl-theme gallery aione-theme">';
					foreach ($slides as $key => $slide) {
						$output .= '<div class="aione-item">';
							$output .= '<div class="aione-image">';
								$output .= '<img src="'.$slide['url'].'" alt="'.$slide['alt'].'" />';

							$output .= '</div>';
							$output .= '<div class="aione-description">';
								$output .= '<h2 class="title">'.$slide['title'].'</h2>';
								$output .= '<h4 class="description">'.$slide['caption'].'</h4>';
							$output .= '</div>';
						$output .= '</div>';
					}
					$output .= '</div>';

				endif;
			$output .='<div class="aione-clear"></div><!-- .aione-clear -->
			</div><!-- .wrapper -->
		</div><!-- .aione-slider -->
		<style type="text/css">
			.aione-slider{
				background-color: #f2f2f2;
			}
			.aione-description{ 
				display:none;
			}

		</style>';
	echo $output;	

}
add_shortcode( 'aione-slider', 'aione_slider_shortcode_callback' );

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_slider',
		'title' => 'Slider',
		'fields' => array (
			array (
				'key' => 'field_5ae2b58c4b319',
				'label' => 'Images',
				'name' => 'images',
				'type' => 'gallery',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'aione-slider',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}

