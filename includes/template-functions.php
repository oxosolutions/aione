<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Gutenbergtheme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function gutenbergtheme_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'gutenbergtheme_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function gutenbergtheme_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'gutenbergtheme_pingback_header' );


/**
 * Add a custom Title Tag data.
 */
add_filter('document_title_parts', 'aione_filter_title_tag');
function aione_filter_title_tag($title) {
    global $post;
    //$pyre_title_tag = get_aione_page_option($post->ID,'pyre_title_tag');
    $pyre_title_tag = get_aione_page_settings($post->ID,'aione_per_page_setting','pyre_title_tag');
	if($pyre_title_tag != "") :
		$title['title']= sanitize_text_field($pyre_title_tag);
	endif;
	return $title;
}
