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

function aione_slider_settings_callback($post){
	wp_nonce_field( 'aione_slider_settings_form_metabox_nonce', 'aione_slider_settings_form_nonce' ); 
	echo aione_slider_settings_form($post);
}
add_action('save_post', 'aione_slider_settings_save_meta');
function aione_slider_settings_save_meta($post_id ){
	if( !isset( $_POST['aione_slider_settings_form_nonce'] ) || !wp_verify_nonce( $_POST['aione_slider_settings_form_nonce'],'aione_slider_settings_form_metabox_nonce') ) 
    return;
	if ( !current_user_can( 'edit_post', $post_id ))
	    return;

	update_post_meta( $post_id, 'aione-slider-settings', $_POST['aione_slider_settings']);

}

function aione_slider_settings_form($post){
	$settings   = get_post_meta( $post->ID, 'aione-slider-settings', true );
	echo "<pre>";print_r($settings);echo "</pre>";
	$aione_slider_settings = array();
	$output = '';	
	$output .= '
		<form name="" class="" id="" method="post" action="" enctype="multipart/form-data">
			<table class="form-table">
				<tbody>
					<tr>
					<th scope="row"><label for="aione_slider_items">Items</label></th>
					<td><input name="aione_slider_settings[items]" type="number" id="aione_slider_items" value="3" class=""><p class="description">The number of items you want to see on the screen.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_margin">Margin</label></th>
					<td><input name="aione_slider_settings[margin]" type="number" id="aione_slider_margin" value="0" class=""><p class="description">margin-right(px) on item.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_loop">Loop</label></th>
					<td><select name="aione_slider_settings[loop]" id="aione_slider_loop">						
						<option value="false">False</option>
						<option value="true">True</option>
						</select><p class="description">Infinity loop. Duplicate last and first items to get loop illusion.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_center">Center</label></th>
					<td><select name="aione_slider_settings[center]" id="aione_slider_center">						
						<option value="false">False</option>
						<option value="true">True</option>
						</select><p class="description">Center item. Works well with even an odd number of items.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_mouseDrag">mouseDrag</label></th>
					<td><select name="aione_slider_settings[mouseDrag]" id="aione_slider_mouseDrag">					
						<option value="true">True</option>
						<option value="false">False</option>
						</select><p class="description">Mouse drag enabled.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_touchDrag">touchDrag</label></th>
					<td><select name="aaione_slider_settings[touchDrag]" id="aione_slider_touchDrag">					
						<option value="true">True</option>
						<option value="false">False</option>
						</select><p class="description">Touch drag enabled.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_pullDrag">pullDrag</label></th>
					<td><select name="aione_slider_settings[pullDrag]" id="aione_slider_pullDrag">					
						<option value="true">True</option>
						<option value="false">False</option>
						</select><p class="description">Stage pull to edge.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_freeDrag">freeDrag</label></th>
					<td><select name="aione_slider_settings[freeDrag]" id="aione_slider_freeDrag">					
						<option value="false">False</option>
						<option value="true">True</option>
						</select><p class="description">Item pull to edge.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_stagePadding">stagePadding</label></th>
					<td><input name="aione_slider_settings[stagePadding]" type="number" id="aione_slider_stagePadding" value="0" class=""><p class="description">Padding left and right on stage (can see neighbours).</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_merge">Merge</label></th>
					<td><select name="aione_slider_settings[merge]" id="aione_slider_merge">						
						<option value="false">False</option>
						<option value="true">True</option>
						</select><p class="description">Merge items. Looking for data-merge="{number}" inside item..</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_mergeFit">mergeFit</label></th>
					<td><select name="aione_slider_settings[mergeFit]" id="aione_slider_mergeFit">					
						<option value="true">True</option>
						<option value="false">False</option>
						</select><p class="description">Fit merged items if screen is smaller than items value.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_autoWidth">autoWidth</label></th>
					<td><select name="aione_slider_settings[autoWidth]" id="aione_slider_autoWidth">					
						<option value="false">False</option>
						<option value="true">True</option>
						</select><p class="description">Set non grid content. Try using width style on divs.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_startPosition">startPosition</label></th>
					<td><input name="aione_slider_settings[startPosition]" type="text" id="aione_slider_startPosition" value="0" class=""><p class="description">Start position or URL Hash string like "#id".</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_URLhashListener">URLhashListener</label></th>
					<td><select name="aione_slider_settings[URLhashListener]" id="aione_slider_URLhashListener">		
						<option value="false">False</option>
						<option value="true">True</option>
						</select><p class="description">Listen to url hash changes. data-hash on items is required.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_nav">Nav</label></th>
					<td><select name="aione_slider_settings[nav]" id="aione_slider_nav">					
						<option value="false">False</option>
						<option value="true">True</option>
						</select><p class="description">Show next/prev buttons.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_rewind">Rewind</label></th>
					<td><select name="aione_slider_settings[rewind]" id="aione_slider_rewind">						
						<option value="true">True</option>
						<option value="false">False</option>
						</select><p class="description">Go backwards when the boundary has reached.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_navText">navText</label></th>
					<td><input name="aione_slider_settings[navText]" type="text" id="aione_slider_navText" value="[&#x27;next&#x27;,&#x27;prev&#x27;]" class=""><p class="description">HTML allowed.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_navElement">navElement</label></th>
					<td><input name="aione_slider_settings[navElement]" type="text" id="aione_slider_navElement" value="div" class=""><p class="description">DOM element type for a single directional navigation link.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_slideBy">slideBy</label></th>
					<td><input name="aione_slider_settings[slideBy]" type="text" id="aione_slider_slideBy" value="1" class=""><p class="description">Navigation slide by x. "page" string can be set to slide by page.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_slideTransition">slideTransition</label></th>
					<td><input name="aione_slider_settings[slideTransition]" type="text" id="aione_slider_slideTransition" value="" class=""><p class="description">You can define the transition for the stage you want to use eg. linear.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_dots">Dots</label></th>
					<td><select name="aione_slider_settings[dots]" id="aione_slider_dots">						
						<option value="true">True</option>
						<option value="false">False</option>
						</select><p class="description">Show dots navigation.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_dotsEach">dotsEach</label></th>
					<td><input name="aione_slider_settings[dotsEach]" type="text" id="aione_slider_dotsEach" value="false" class=""><p class="description">Show dots each x item.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_dotsData">dotsData</label></th>
					<td><select name="aione_slider_settings[dotsData]" id="aione_slider_dotsData">					
						<option value="false">False</option>
						<option value="true">True</option>
						</select><p class="description">Used by data-dot content.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_lazyLoad">lazyLoad</label></th>
					<td><select name="aione_slider_settings[lazyLoad]" id="aione_slider_lazyLoad">					
						<option value="false">False</option>
						<option value="true">True</option>
						</select><p class="description">Lazy load images. data-src and data-src-retina for highres. Also load images into background inline style if element is not <img></p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_lazyLoadEager">lazyLoadEager</label></th>
					<td><input name="aione_slider_settings[lazyLoadEager]" type="number" id="aione_slider_lazyLoadEager" value="0" class=""><p class="description">Eagerly pre-loads images to the right (and left when loop is enabled) based on how many items you want to preload.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_autoplay">autoplay</label></th>
					<td><select name="aione_slider_settings[autoplay]" id="aione_slider_autoplay">					
						<option value="false">False</option>
						<option value="true">True</option>
						</select><p class="description">Autoplay.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_autoplayTimeout">autoplayTimeout</label></th>
					<td><input name="aione_slider_settings[autoplayTimeout]" type="number" id="aione_slider_autoplayTimeout" value="5000" class=""><p class="description">Autoplay interval timeout.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_autoplayHoverPause">autoplayHoverPause</label></th>
					<td><select name="aione_slider_settings[autoplayHoverPause]" id="aione_slider_autoplayHoverPause">
						<option value="false">False</option>
						<option value="true">True</option>
						</select><p class="description">Pause on mouse hover.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_smartSpeed">smartSpeed</label></th>
					<td><input name="aione_slider_settings[smartSpeed]" type="number" id="aione_slider_smartSpeed" value="250" class=""><p class="description">Speed Calculate. More info to come..</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_autoplaySpeed">autoplaySpeed</label></th>
					<td><input name="aione_slider_settings[autoplaySpeed]" type="text" id="aione_slider_autoplaySpeed" value="false" class=""><p class="description">autoplay speed.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_navSpeed">navSpeed</label></th>
					<td><input name="aione_slider_settings[navSpeed]" type="text" id="aione_slider_navSpeed" value="false" class=""><p class="description">Navigation speed.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_dotsSpeed">dotsSpeed</label></th>
					<td><input name="aione_slider_settings[dotsSpeed]" type="text" id="aione_slider_dotsSpeed" value="false" class=""><p class="description">Pagination speed.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_dragEndSpeed">dragEndSpeed</label></th>
					<td><input name="aione_slider_settings[dragEndSpeed]" type="text" id="aione_slider_dragEndSpeed" value="false" class=""><p class="description">Drag end speed.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_callbacks">Callbacks</label></th>
					<td><select name="aione_slider_settings[callbacks]" id="aione_slider_callbacks">			
						<option value="true">True</option>
						<option value="false">False</option>						
						</select><p class="description">Enable callback events.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_video">Video</label></th>
					<td><select name="aione_slider_settings[video]" id="aione_slider_video">			
						<option value="false">False</option>
						<option value="true">True</option>												
						</select><p class="description">Enable fetching YouTube/Vimeo/Vzaar videos.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_videoHeight">videoHeight</label></th>
					<td><input name="aione_slider_settings[videoHeight]" type="text" id="aione_slider_videoHeight" value="false" class=""><p class="description">Set height for videos.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_videoWidth">videoWidth</label></th>
					<td><input name="aione_slider_settings[videoWidth]" type="text" id="aione_slider_videoWidth" value="false" class=""><p class="description">Set width for videos.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_animateOut">animateOut</label></th>
					<td><input name="aione_slider_settings[animateOut]" type="text" id="aione_slider_animateOut" value="false" class=""><p class="description">Class for CSS3 animation out.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_animateIn">animateIn</label></th>
					<td><input name="aione_slider_settings[animateIn]" type="text" id="aione_slider_animateIn" value="false" class=""><p class="description">Class for CSS3 animation in.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_fallbackEasing">fallbackEasing</label></th>
					<td><input name="aione_slider_settings[fallbackEasing]" type="text" id="aione_slider_fallbackEasing" value="swing" class=""><p class="description">Easing for CSS2 $.animate.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_itemElement">itemElement</label></th>
					<td><input name="aione_slider_settings[itemElement]" type="text" id="aione_slider_itemElement" value="div" class=""><p class="description">DOM element type for aione-slider-item.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_stageElement">stageElement</label></th>
					<td><input name="aione_slider_settings[stageElement]" type="text" id="aione_slider_stageElement" value="div" class=""><p class="description">DOM element type for aione-slider-stage.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_navContainer">navContainer</label></th>
					<td><input name="aione_slider_settings[navContainer]" type="text" id="aione_slider_navContainer" value="false" class=""><p class="description">Set your own container for nav.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_dotsContainer">dotsContainer</label></th>
					<td><input name="aione_slider_settings[dotsContainer]" type="text" id="aione_slider_dotsContainer" value="false" class=""><p class="description">Set your own container for nav.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_checkVisible">checkVisible</label></th>
					<td><select name="aione_slider_settings[checkVisible]" id="aione_slider_checkVisible">			
						<option value="true">True</option>
						<option value="false">False</option>												
						</select><p class="description">If you know the carousel will always be visible you can set `checkVisibility` to `false` to prevent the expensive browser layout forced reflow the $element.is(":visible") does.</p></td>
					</tr>


				</tbody>
			</table>
			<p class="submit"><input type="submit" id="submit_button" name="app_setting_save" class="button button-primary" value="Save Settings"></p>
		</form>
		';

	return $output;	
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
		'autoplay' => true,
		'singleitem' => true,
	), $atts, 'aione-slider' );

	$slides = get_field('images', $atts['id']);
	$output = '';
	$output .= '<div id="aione_slider" class="aione-slider">
			<div class="wrapper">';
				if(!empty($slides)):
					
					$output .=  '<div id="aione_slider_'.$atts['id'].'" class="slider owl-carousel owl-theme gallery aione-theme" data-items="'.$atts['items'].'" data-autoplay="'.$atts['autoplay'].'" data-singleitem="'.$atts['singleitem'].'">';
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

