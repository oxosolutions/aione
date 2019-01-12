<?php

$this->select(
	'slider_enable',
	__( 'Show Slider on Page', 'gutenbergtheme' ),
	array(
		'default' => __( 'Default', 'gutenbergtheme' ),
		'yes'     => __( 'Yes', 'gutenbergtheme' ),
		'no'      => __( 'No', 'gutenbergtheme' )
	),
	__( 'Show Slider on Page', 'gutenbergtheme' )
);
$this->select(
	'slider_100_width',
	__( '100% Slider Width', 'gutenbergtheme' ),
	array(
		'default' => __( 'Default', 'gutenbergtheme' ),
		'yes'     => __( 'Yes', 'gutenbergtheme' ),
		'no'      => __( 'No', 'gutenbergtheme' )
	),
	__( 'Enables 100% Slider Width.', 'gutenbergtheme' )
);
$args = array(
  'post_type'      => 'aione-slider', 
  'posts_per_page' => '-1', 
  'orderby'        => 'date', 
  'order'          => 'DESC',
);
$sliders = get_posts( $args );
$slider_select['default'] = 'Default Slider';

foreach ( $sliders as $slider ) {
	$slider_select[$slider->ID] = $slider->post_title;
}

$this->select(
	'select_slider',
	__( 'Select Slider', 'gutenbergtheme' ),
	$slider_select,
	__( 'Select Slider on this page.', 'gutenbergtheme' )
);

// Omit closing PHP tag to avoid "Headers already sent" issues.
