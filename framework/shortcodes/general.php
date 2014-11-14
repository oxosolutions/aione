<?php
function theme_shortcode_theme_options($atts, $content = null, $code) {
	global $theme_options;
    echo "<pre>";
    print_r($theme_options);
    echo "</pre>";
	//return "<pre>".print_r($theme_options)."</pre>";
}
add_shortcode('theme_options','theme_shortcode_theme_options');


function theme_shortcode_theme($atts, $content = null, $code) {
    $theme = wp_get_theme();
    return $theme->get('Version');
}
add_shortcode('theme','theme_shortcode_theme');