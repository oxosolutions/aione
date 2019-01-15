<?php

$this->select(
	'slider_enable',
	__( 'Show Slider on Page', 'aione' ),
	array(
		'default' => __( 'Default', 'aione' ),
		'yes'     => __( 'Yes', 'aione' ),
		'no'      => __( 'No', 'aione' )
	),
	__( 'Show Slider on Page', 'aione' )
);
$this->select(
	'slider_100_width',
	__( '100% Slider Width', 'aione' ),
	array(
		'default' => __( 'Default', 'aione' ),
		'yes'     => __( 'Yes', 'aione' ),
		'no'      => __( 'No', 'aione' )
	),
	__( 'Enables 100% Slider Width.', 'aione' )
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
	__( 'Select Slider', 'aione' ),
	$slider_select,
	__( 'Select Slider on this page.', 'aione' )
);

// Omit closing PHP tag to avoid "Headers already sent" issues.
